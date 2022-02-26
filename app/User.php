<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;  

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getOwnPaginateByLimit(int $limit_count = 5)
    {
      return $this::with('products')->find(Auth::id())->products()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }/**find(Auth::id())で現在ログインしているユーザーと同じidのUserインスタンスを取り出している。
      *リレーションで定義したproducts()を使って、取り出したUserインスタンスに関連する投稿の情報を取り出す。
      */
    public function products()
    {
      return $this->hasMany('App/Product'); //productに対するリレーション
    }
}
