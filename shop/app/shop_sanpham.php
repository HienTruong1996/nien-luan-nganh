<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class shop_sanpham extends Model
{
    protected $table = "shop_sanpham";
    protected $primaryKey ='sp_ma';
    const CREATED_AT = 'sp_taoMoi';
    const UPDATED_AT = 'sp_capNhat';
    protected $fillable=['sp_capNhat'];
    protected $dates  = ['sp_taoMoi','sp_capNhat'];
    public function getsanpham1($ma)
    {
        return $this->has('App\shop_sanpham','sp_ma',$ma);
    }
}
