<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop_loai extends Model
{
    protected $table = "shop_loai";
    protected $primaryKey ='l_ma';
    protected $fillable=['l_capNhat'];
    protected $dates  = ['l_taoMoi','l_capNhat'];
    public $timestamps = false;
}
