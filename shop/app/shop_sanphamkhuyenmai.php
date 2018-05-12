<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop_sanphamkhuyenmai extends Model
{
    protected $table = "shop_sanphamkhuyenmai";
    protected $primaryKey ='spkm_ma';
    const CREATE_AT = 'spkm_taoMoi';
    const UPDATE_AT = 'spkm_capNhat';
    protected $fillable=['spkm_capNhat'];
    protected $dates  = ['spkm_taoMoi','spkm_capNhat'];
    public $timestamps = false;
}
