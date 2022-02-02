<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//fill関数とsave関数はモデルクラスが継承しているModelクラスのメソッドを参照して利用が可能
class Product extends Model
{
    protected $fillable = [
    'name',
    'photo',
    'body',
　];
    /*クラス変数$fillableを定義.fillが可能なプロパティを指定している
    「保存ができない」と思った時にfillableを指定していないのはありがちなミス
    */
}