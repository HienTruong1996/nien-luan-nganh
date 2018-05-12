<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop_chitietdonhang extends Model
{
    protected $table = "shop_chitietdonhang";
    protected $primaryKey ='ctdh_ma';
    const CREATE_AT = 'ctdh_capNhat ';
    const UPDATE_AT = 'ctdh_taoMoi';
    protected $fillable=['ctdh_capNhat'];
    protected $dates  = ['ctdh_taoMoi','ctdh_capNhat'];
    public $timestamps = false;
    public function sanpham()
    {
    	return $this->hasMany('App\shop_sanpham','sp_ma','sp_ma');
    }
    public function donhang()
    {
    	return $this->belongsTo('App\shop_donhang','dh_ma','dh_ma');
    }
    
}
