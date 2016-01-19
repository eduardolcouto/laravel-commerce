<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\Category;
use Illuminate\Http\Request;

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
        $products = $this->product->paginate(10);

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

}
