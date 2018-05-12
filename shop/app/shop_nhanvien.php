<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class shop_nhanvien extends Model
{
    protected $table = "shop_nhanvien";
    protected $primaryKey ='nv_ma';
    const CREATE_AT = 'nv_taoMoi';
    const UPDATE_AT = 'nv_capNhat';
    protected $fillable=['nv_capNhat','nv_matKhau','nv_taiKhoang'];
    protected $hidden = [
        'nv_matKhau', 'remember_token',
    ];
    protected $dates  = ['nv_taoMoi','nv_capNhat'];
    public $timestamps = false;

    use Notifiable;
}
