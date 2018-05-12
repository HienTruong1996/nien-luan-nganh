<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_chitietdonhang', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('ctdh_ma');
            $table->integer('ctdh_soLuong');
            $table->integer('ctdh_donGia');
            $table->integer('sp_ma')->unsigned();
            $table->integer('dh_ma')->unsigned();
            $table->foreign('sp_ma')->references('sp_ma')->on('shop_sanpham')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dh_ma')->references('dh_ma')->on('shop_donhang')->onDelete('cascade')->onUpdate('cascade');

        });
        DB::statement("ALTER TABLE `shop_chitietdonhang` comment 'thông tin chi tiết đơn hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_chitietdonhang');
    }
}
