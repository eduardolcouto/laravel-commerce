<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;

class StoreController extends Controller
{
    public function index(\CodeCommerce\Category $category, \CodeCommerce\Product $product)
    {
    	$categories = $category->all();
    	$pFeatureds = $product->featured()->limit(3)->get();
    	$pRecommends = $product->recommend()->limit(3)->get();

    	return view('store.index',compact('categories','pFeatureds','pRecommends'));
    }
    public function categoryProducts(\CodeCommerce\Category $category)
    {
       $categories = Category::all();
       return view('store.category_products',compact('category','categories'));
    }
}
