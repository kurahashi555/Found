<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*fill関数とsave関数はモデルクラスが継承している
Modelクラスのメソッドを参照して利用が可能*/
class Product extends Model
{
   //クラス変数$fillableを定義.fillが可能なプロパティを指定している
   protected $fillable = [
       'name',
       'body',
       'photo',
       'category_id',
       'user_id',
       'photo_type'
   ];

   public function getPaginateByLimit(int $limit_count = 30)
   {
      // updated_atで降順に並べたあと、limitで件数制限をかける
     return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
   } 

   public function category()
   {
     return $this->belongsTo('App\Category');
   }
  
   public function user()
   {
     return $this->belongsTo('App\User');
   }
  
   public function likes()
   {
     return $this->hasMany('App\Like');
   }
} 