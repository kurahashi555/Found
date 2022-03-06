<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*fill関数とsave関数はモデルクラスが継承している
Modelクラスのメソッドを参照して利用が可能*/
class Product extends Model
{
  protected $fillable = [
    'name',
    'body',
    'photo',
    'category_id',
    'user_id'
    ];
     /*クラス変数$fillableを定義.fillが可能なプロパティを指定している
    「保存ができない」と思った時にfillableを指定していないのはありがちなミス
    */

  public function getPaginateByLimit(int $limit_count = 30)
  {
    // created_atで降順に並べたあと、limitで件数制限をかける
     return $this::with('user')->orderBy('created_at', 'DESC')->paginate($limit_count);
  } /**モデル :: with(リレーション名) の形は、Eagerローディングという機能を使う書き方で、
     *リレーションによって増えるデータベースアクセスの回数を減らすの機能。
     */

  public function category()
  {
    return $this->belongsTo('App\Category');//Categoryに対するリレーション
  }
  
  public function user()
  {
    return $this->belongsTo('App\User');//Userに対するリレーション
  }
  
} 