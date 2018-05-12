<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_nhanvien', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('nv_ma');
            $table->string('nv_ten',100);
            $table->integer('nv_gioiTinh')->default('1')->comment('1-nam ,2-nu');
            $table->string('nv_email',100);
            $table->date('nv_ngaySinh');
            $table->string('nv_diaChi',100);
            $table->integer('nv_dienThoai');
            $table->timestamp('nv_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('nv_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('nv_trangThai')->default('2')->comment('1-bị khóa,2-khả dụng');
        });
        DB::statement("ALTER TABLE `shop_nhanvien` comment 'thông tin nhân viên'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_nhanvien');
    }
}
