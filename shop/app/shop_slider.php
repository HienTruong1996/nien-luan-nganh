<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop_slider extends Model
{
   protected $table = "shop_slider";
    protected $primaryKey ='sli_ma';
    const created_at = 'sli_taoMoi';
    const updated_at = 'sli_capNhat';
    protected $fillable=['sli_capNhat'];
    protected $dates  = ['sli_taoMoi','sli_capNhat'];
    public $timestamps = false;
 
}
