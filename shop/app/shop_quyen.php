<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop_quyen extends Model
{
    protected $table = "shop_quyen";
    protected $primaryKey ='q_ma';
    protected $fillable=['q_capNhat'];
    protected $dates  = ['q_taoMoi','q_capNhat'];
    public $timestamps = false;
}
