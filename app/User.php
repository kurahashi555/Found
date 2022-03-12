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
    
    public function getOwnPaginateByLimit(int $limit_count = 30)
    {
      return $this->products()->orderBy('created_at', 'DESC')->paginate($limit_count);
    }/**$thisはコントローラーでgetOwnPaginateByLimitを呼び出した$userインスタンスの事。
    　*/
    public function products()
    {
      return $this->hasMany('App\Product'); //productに対するリレーション
    }
    
    public function likes()
    {
      return $this->hasMany('App\Like');
    }
}
