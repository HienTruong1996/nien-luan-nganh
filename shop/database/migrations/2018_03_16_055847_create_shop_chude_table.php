<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopChudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_chude', function (Blueprint $table) {
            $table->engine='InnoDB';                                                       
            $table->increments('cd_ma')->comment('mã chủ đề');
            $table->string('cd_ten',100);
            $table->timestamp('cd_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày tạo mới');
            $table->timestamp('cd_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày cập nhật');
            $table->integer('cd_trangThai')->default('2')->comment('1-khóa,2-khả dụng');
        });
        DB::statement("ALTER TABLE `shop_chude` comment 'thông tin chủ đề'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_chude');
    }
}
