<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Category;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

use Storage;
use Image;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->paginate(7);

        return view('products.index',compact('products'));
    }
    
    public function create(Category $category)
    {
        $categories = $category->lists('name','id');

        return view('products.create', compact('categories'));
    }
    
    public function store(Requests\ProductRequest $request)
    {
        $tagIds = $this->getTagIds($request->get('tags'));

        $product = $this->product->fill($request->all());
        $product->save();

        $product->tags()->sync($tagIds);

        return redirect()->route('products.index');
    }
    
     public function edit(\CodeCommerce\Product $product, Category $category)
     {
        $categories = $category->lists('name','id');
        return view('products.edit',compact('product','categories'));
    }
    
     public function update(Requests\ProductRequest $request, \CodeCommerce\Product $product)
     {
        $product->featured = null;
        $product->recommend = null;

        $tagIds = $this->getTagIds($request->get('tags'));

        $product->update($request->all());
        $product->tags()->sync($tagIds);
        
        return redirect()->route('products.index');
     }
    
     public function destroy(\CodeCommerce\Product $product)
     {
         $product->delete();
         return redirect()->route('products.index');
     }

     public function images(Product $product)
     {
        return view('products.images',compact('product'));
     }

     public function createImages(Product $product)
     {
        return view('products.createImages',compact('product'));
     }

     public function storeImages(Requests\ProductImageRequest $request, Product $product, ProductImage  $productImage)
     {
        $image = $request->file('image');
        $productImage = $productImage::create(['product_id'=>$product->id,'extension'=>$image->getClientOriginalExtension()]);

        Storage::disk('public_local')->put(
                $productImage->imageName, 
               file_get_contents($image)
        );

        $thumb = Image::make(public_path('uploads').'/'.$productImage->imageName)->resize(100,null, function($a){
            $a->aspectRatio();
        });

        $thumb->save(public_path('uploads/thumb').'/'.$productImage->imageName);

        //Serviço Amazon S3
        //Storage::disk('s3')->put(
        //        'uploads/'.$productImage->id.'.'.$productImage->extension, 
        //       file_get_contents($image),
        //       'public'
        //);

        //$image->move(public_path('upload'),$imageName);
        return redirect()->route('products.images',$product->id);
     }

     public function destroyImages(ProductImage $productImage)
     {
        if(file_exists(public_path('uploads').'/'.$productImage->imageName))
        {
            Storage::disk('public_local')->delete($productImage->imageName);
            Storage::disk('public_local')->delete('thumb/'.$productImage->imageName);
        }
        //Serviço Amazon S3
        //Storage::disk('s3')->delete('uploads/'.$productImage->id.'.'.$productImage->extension);
        

        $product = $productImage->product;
        $productImage->delete();

        return redirect()->route('products.images',['id'=>$product->id]);
     }

    private function getTagIds($tags)
    {
        $tags = array_filter(array_map('trim',explode(',',$tags)));
        $tagIds = []; 
        foreach ($tags as $tagName) {
            $tagIds[] = Tag::firstOrCreate(['name'=>$tagName])->id;
        }

        return $tagIds;
    }

}
