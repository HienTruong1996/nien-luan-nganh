<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop_lohang extends Model
{
    protected $table = "shop_lohang";
    protected $primaryKey ='lh_ma';
    const CREATED_AT = 'lh_taoMoi';
    const UPDATED_AT = 'lh_capNhat';
    protected $fillable=['lh_capNhat'];
    protected $dates  = ['lh_taoMoi','lh_capNhat'];

}
