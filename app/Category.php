<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   public function products()   
   {
     return $this->hasMany('App\Product');
   }
   
   public function getByCategory(int $limit_count = 30)
   {
     return $this->products()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
   }
}