<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
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
        $products = $this->product->all();

        return view('products.index',compact('products'));
    }
    
    public function create()
    {
        return view('products.create');
    }
    
    public function store(Requests\ProductRequest $request)
    {
        $product = $this->product->fill($request->all());
        $product->save();
        return redirect()->route('products.index');
    }
    
     public function edit(\CodeCommerce\Product $product)
     {
        return view('products.edit',compact('product'));
    }
    
     public function update(Requests\ProductRequest $request, \CodeCommerce\Product $product)
     {
         dd($request->all());
         $product->update($request->all());
         return redirect()->route('products.index');
     }
    
     public function destroy(\CodeCommerce\Product $product)
     {
         $product->delete();
         return redirect()->route('products.index');
     }

}
