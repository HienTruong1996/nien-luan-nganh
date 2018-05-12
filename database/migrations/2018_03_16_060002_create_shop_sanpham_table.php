<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_sanpham', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('sp_ma');
            $table->string('sp_ten',100);
            $table->string('sp_hinhAnh',150);
            $table->text('sp_moTa');
            $table->integer('sp_giaGoc');
            $table->integer('sp_giaBan');
            $table->integer('sp_trangThai')->default('2')->comment('1-hết hàng,2-còn');
            $table->timestamp('sp_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('sp_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->integer('cd_ma')->unsigned();
            $table->integer('l_ma')->unsigned();
            $table->integer('mcd_ma')->unsigned();
            

            $table->foreign('l_ma')->references('l_ma')->on('shop_loai')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('mcd_ma')->references('mcd_ma')->on('shop_mauchudao')->onDelete('cascade')->onUpdate('cascade');

           
            
            $table->foreign('cd_ma')->references('cd_ma')->on('shop_chude')->onDelete('cascade')->onUpdate('cascade');


        });
        DB::statement("ALTER TABLE `shop_sanpham` comment 'thông tin sản phẩm'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_sanpham');
    }
}
