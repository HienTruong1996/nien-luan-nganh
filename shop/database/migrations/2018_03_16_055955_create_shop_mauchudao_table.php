<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopMauchudaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_mauchudao', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('mcd_ma');
            $table->string('mcd_ten',100); 
            $table->integer('mcd_trangThai')->default('2')->comment('1-khóa ,2-khả dụng');  
            
        });
         DB::statement("ALTER TABLE `shop_mauchudao` comment 'thông tin màu chủ đạo'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_mauchudao');
    }
}
