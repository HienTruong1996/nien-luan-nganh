<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop_donhang extends Model
{
    protected $table = "shop_donhang";
    protected $primaryKey ='dh_ma';
    const update_at = 'dh_taoMoi';
    const create_at = 'dh_capNhat';
    protected $fillable=['dh_capNhat','dh_trangThai'];
    
    protected $dates  = ['dh_taoMoi','dh_capNhat'];
    public $timestamps = false; 
}
