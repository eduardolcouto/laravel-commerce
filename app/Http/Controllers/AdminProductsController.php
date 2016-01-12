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

        return view('products',compact('products'));
    }
    
    public function create(){
        return 'create';
    }
    
    public function store(){
        return 'store';
    }
    
     public function edit(\CodeCommerce\Product $product){
        return 'edit';
    }
    
     public function update(Request $request, \CodeCommerce\Product $product){
        return 'update';
    }
    
     public function destroy(\CodeCommerce\Product $product){
        return 'destroy';
    }
    
     public function delete(Request $request, \CodeCommerce\Product $product){
        return 'delete';
    }
}
