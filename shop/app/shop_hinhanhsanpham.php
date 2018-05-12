<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop_hinhanhsanpham extends Model
{
    protected $table = "shop_hinhanhsanpham";
    protected $primaryKey ='hasp_ma';
    const CREATE_AT = 'hasp_taoMoi';
    const UPDATE_AT = 'hasp_capNhat';
    protected $fillable=['hasp_capNhat'];
    protected $dates  = ['hasp_taoMoi','hasp_capNhat'];
    public $timestamps = false;
}
