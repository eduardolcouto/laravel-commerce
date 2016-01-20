<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Category;
use Illuminate\Http\Request;

use Storage;

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
        $product = $this->product->fill($request->all());
        $product->save();
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
        $product->update($request->all());
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
                $productImage->id.'.'.$productImage->extension, 
               file_get_contents($image->getRealPath())
        );
        //$image->move(public_path('upload'),$imageName);
        return redirect()->route('products.images',$product->id);
     }

     public function destroyImages(ProductImage $productImage)
     {
        Storage::disk('public_local')->delete($productImage->id.'.'.$productImage->extension);

        $product = $productImage->product;
        $productImage->delete();

        return redirect()->route('products.images',['id'=>$product->id]);
     }


}
