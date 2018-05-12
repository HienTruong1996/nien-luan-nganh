<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopLoaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_loai', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('l_ma');
            $table->string('l_ten',100);
            $table->integer('l_trangThai')->default('2')->comment('2-khả dụng ,1-bị khóa');
        });
        DB::statement("ALTER TABLE `shop_loai` comment 'thông tin loại'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_loai');
    }
}
