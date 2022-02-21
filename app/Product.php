<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*fill関数とsave関数はモデルクラスが継承している
Modelクラスのメソッドを参照して利用が可能*/
class Product extends Model
{
  protected $fillable = [
    'name',
    'photo',
    'body',
    'category_id',
    ];
     /*クラス変数$fillableを定義.fillが可能なプロパティを指定している
    「保存ができない」と思った時にfillableを指定していないのはありがちなミス
    */
    
  public function getPaginateByLimit(int $limit_count = 30)
  {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);//ペジネーション
  }

  public function category()
  {
    return $this->belongsTo('App\Category');//Categoryに対するリレーション
  }
 
}