<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(User $user)
    {
     return view('User.index')->with([
      'own_products' => $user->getOwnPaginateByLimit(),
      'user' => $user
      ]);
    }
 
    public function edit(User $user)
    {
     return view('User.edit')->with([
      'user' => $user
      ]);
    }
    
    public function update(User $user , UserRequest $request)
    {
     $input_profile = $request['user'];
     $user->fill($input_profile)->save();
     
     return redirect()->route('user',[$user]);
    }
    
    public function url(User $user , UserRequest $request)
    {
     return redirect()->away($user->web_url);
    }
    
}