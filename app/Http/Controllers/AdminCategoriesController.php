<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

class AdminCategoriesController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->paginate(5);
        return view('categories.index',compact('categories'));
    }
    
    public function create()
    {
        return view('categories.create');
    }
    
    public function store(Requests\CategoryRequest $request)
    {
        $category = $this->category->fill($request->all());
        $category->save();
        return redirect()->route('categories.index');
    }
    
     public function edit(\CodeCommerce\Category $category)
     {
        return view('categories.edit',compact('category'));
    }
    
     public function update(Requests\CategoryRequest $request, \CodeCommerce\Category $category)
     {
         $category->update($request->all());
        return redirect()->route('categories.index');
     }
    
     public function destroy(\CodeCommerce\Category $category)
     {
         $category->delete();
         return redirect()->route('categories.index');
     }

}
