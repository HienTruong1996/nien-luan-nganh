<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\shop_sanpham;

class shop_chude extends Model
{
    protected $table = "shop_chude";
    protected $primaryKey ='cd_ma';
    const updated_at = 'cd_capNhat';
    const created_at = 'cd_taoMoi';
    protected $fillable=['cd_capNhat','cd_trangThai'];
    
    protected $dates  = ['cd_taoMoi','cd_capNhat'];
   
    public function getsanpham()
    {
    	return $this->hasMany('App\shop_sanpham','cd_ma','cd_ma');
    }
}
