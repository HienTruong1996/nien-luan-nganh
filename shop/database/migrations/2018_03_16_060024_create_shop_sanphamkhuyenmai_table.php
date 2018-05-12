<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopSanphamkhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_sanphamkhuyenmai', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('spkm_ma');
            $table->integer('sp_ma')->unsigned();
            $table->integer('km_ma')->unsigned();
            $table->foreign('sp_ma')->references('sp_ma')->on('shop_sanpham')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('km_ma')->references('km_ma')->on('shop_khuyenmai')->onDelete('cascade')->onUpdate('cascade');

        });
        DB::statement("ALTER TABLE `shop_sanphamkhuyenmai` comment 'thông tin sản phẩm khuyến mãi'");
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
