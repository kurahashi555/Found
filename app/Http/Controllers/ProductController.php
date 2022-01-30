<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(Product $product)
    {
     return view('index')->with(['products' => $product->get()]);
    }
    
    public function display(Product $product)
    {
     return view('display')->with(['product' => $product]);
    }
}
