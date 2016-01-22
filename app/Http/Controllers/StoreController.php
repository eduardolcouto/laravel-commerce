<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index(\CodeCommerce\Category $category, \CodeCommerce\Product $product)
    {
    	$categories = $category->all();
    	$pFeatureds = $product->where('featured',1)->limit(3)->get();
    	$pRecommends = $product->where('recommend',1)->limit(3)->get();

    	return view('store.index',compact('categories','pFeatureds','pRecommends'));
    }
}
