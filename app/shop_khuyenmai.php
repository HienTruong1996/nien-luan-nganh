<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop_khuyenmai extends Model
{
    protected $table = "shop_khuyenmai";
    protected $primaryKey ='km_ma';
    const CREATE_AT = 'km_taoMoi';
    const UPDATE_AT = 'km_capNhat';
    protected $fillable=['km_capNhat'];
    protected $dates  = ['km_taoMoi','km_capNhat'];
    public $timestamps = false;
}
