<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoundController extends Controller
{
    public function index(Post $found)
  {
    return $found->get();
  }
}
