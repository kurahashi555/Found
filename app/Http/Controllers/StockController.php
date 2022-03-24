<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StockController extends Controller
{
    
    public function sale(Product $product, Request $request)
    {
       $stock=NEW stock();
       $stock->product_id=$product->id;
       $stock->user_id=Auth::user()->id;
       $stock->save();
       
       return  back();
    }
    
    public function sold(Product $product, Request $request)
    {
       $user=Auth::user()->id;
       $stock=stock::where('product_id', $product->id)->where('user_id', $user)->first();
       $stock->delete();
      
       return back();
    }
}