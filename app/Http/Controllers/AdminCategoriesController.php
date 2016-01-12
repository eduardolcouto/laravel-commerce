<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();
        return view('categories',compact('categories'));
    }
    
    public function create(){
        return 'create';
    }
    
    public function store(Request $request){
        return 'store';
    }
    
     public function edit(\CodeCommerce\Category $category){
        return 'edit';
    }
    
     public function update(Request $request, \CodeCommerce\Category $category){
        return 'update';
    }
    
     public function destroy(\CodeCommerce\Category $category){
        return 'destroy';
    }
    
     public function delete(Request $request, \CodeCommerce\Category $category){
        return 'delete';
    }
    
 
}
