<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_nhacungcap', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('ncc_ma');
            $table->string('ncc_ten',100);
            $table->string('ncc_diaChi',100);
            $table->integer('ncc_dienThoai');
        });
        DB::statement("ALTER TABLE `shop_nhacungcap` comment 'thông tin nhà cung cấp'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_nhacungcap');
    }
}
