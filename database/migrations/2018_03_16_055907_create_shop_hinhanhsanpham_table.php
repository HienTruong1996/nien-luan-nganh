<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopHinhanhsanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_hinhanhsanpham', function (Blueprint $table) {
            $table->engine='InnoDB';                                                                   
            $table->increments('hasp_ma');
            $table->string('hasp_ten',100);
        });
        DB::statement("ALTER TABLE `shop_hinhanhsanpham` comment 'thông tin hình ảnh sản phẩm'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_hinhanhsanpham');
    }
}
