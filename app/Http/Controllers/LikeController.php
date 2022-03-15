<?php

namespace App\Http\Controllers;

use App\Product;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Product $product, Request $request)
    {
       $like=NEW like();
       $like->product_id=$product->id;
       $like->user_id=Auth::user()->id;
       $like->save();
       
       return  back();
    }
    
    public function unlike(Product $product, Request $request)
    {
       $user=Auth::user()->id;
       $like=like::where('product_id', $product->id)->where('user_id', $user)->first();
       $like->delete();
      
       return back();
    }
}
