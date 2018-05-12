<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_donhang', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('dh_ma');
            $table->string('dh_nguoiNhan',100);
            $table->integer('dh_dienThoai');
            $table->string('dh_diaChi',100);
            $table->string('dh_nguoiGui',100);
            $table->integer('dh_tongTien');
            $table->integer('dh_trangThai')->default('2')->comment('1-đã gữi,2-chưa gữi');
            $table->timestamp('dh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dh_capNhat')->default(DB::RAW('CURRENT_TIMESTAMP'));
            $table->integer('kh_ma')->unsigned();

            $table->foreign('kh_ma')->references('kh_ma')->on('shop_khachhang')->onDelete('cascade')->onUpdate('cascade');

        });
        DB::statement("ALTER TABLE `shop_donhang` comment 'thông tin đơn hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_donhang');
    }
}
