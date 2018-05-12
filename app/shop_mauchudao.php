<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop_mauchudao extends Model
{
    protected $table = "shop_mauchudao";
    protected $primaryKey ='mcd_ma';
    const CREATE_AT = 'mcd_taoMoi';
    const UPDATE_AT = 'mcd_capNhat';
    protected $fillable=['mcd_capNhat'];
    protected $dates  = ['mcd_taoMoi','mcd_capNhat'];
    public $timestamps = false;
}
