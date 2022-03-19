<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index(Category $category)
    { 
       return view('Category.index')->with([
           'product' => $category->getByCategory(),
           'category'=> $category
           ]);
    }
 
    public function search(Category $category)
    {
       return view('Category.search')->with([
           'categories' => $category->get()
       ]);
    }
 
    public function reference(Request $request , Category $category)
    {
       $input = $request->input('category');

       return redirect(route('category', [
           'category' => $input,
       ]));
    }
}
