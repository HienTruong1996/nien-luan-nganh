<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopKhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_khuyenmai', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('km_ma');
            $table->string('km_tieuDe',100);
            $table->text('km_noiDung');
            $table->string('km_anh',150);
            $table->integer('km_phanTram');
            $table->integer('km_thoiGian');
            $table->integer('km_trangThai')->default('2')->comment('1-hết,2-còn');
        });
        DB::statement("ALTER TABLE `shop_khuyenmai` comment 'thông tin khuyến mãi'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_khuyenmai');
    }
}
