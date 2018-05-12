<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class shop_khachhang extends Authenticatable
{
    protected $table = "shop_khachhang";
    protected $primaryKey ='kh_ma';
    const CREATE_AT = 'kh_taoMoi';
    const UPDATE_AT = 'kh_capNhat';
    const email = 'kh_emai';
    protected $fillable=['name','email','password'];
    protected $hidden  = ['password'];

    protected $dates  = ['kh_taoMoi','kh_capNhat'];
    public $timestamps = false;
}
