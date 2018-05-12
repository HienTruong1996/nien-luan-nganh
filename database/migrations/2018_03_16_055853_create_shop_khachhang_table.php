<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_khachhang', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('kh_ma');
            $table->string('kh_ten',100);
            $table->string('kh_taiKhoang',100);
            $table->string('kh_matKhau',100);
            $table->integer('kh_gioiTinh')->default('1')->comment('1-nam,2-nu');
            $table->string('kh_email',100);
            $table->date('kh_ngaySinh');
            $table->string('kh_diaChi',100);
            $table->integer('kh_dienThoai');
        });
        DB::statement("ALTER TABLE `shop_khachhang` comment 'thông tin khách hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_khachhang');
    }
}
