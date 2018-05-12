<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopLohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_lohang', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('lh_ma');
            $table->integer('lh_giaMuaVao');
            $table->integer('lh_giaBanRa');
            $table->integer('lh_soLuongNhap');
            $table->integer('lh_soLuongDaBan');
            $table->integer('lh_trangThai')->default('2')->comment('1-đã nhập kho,2-khởi tạo');
            $table->timestamp('lh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('lh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('ncc_ma')->unsigned();
            $table->integer('sp_ma')->unsigned();
            $table->foreign('ncc_ma')->references('ncc_ma')->on('shop_nhacungcap')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sp_ma')->references('sp_ma')->on('shop_sanpham')->onUpdate('cascade')->onDelete('cascade');


        });
        DB::statement("ALTER TABLE `shop_lohang` comment 'thông tin lô hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_lohang');
    }
}
