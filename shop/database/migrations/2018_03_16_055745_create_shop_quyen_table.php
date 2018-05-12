    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('shop_quyen', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->increments('q_ma');
            $table->string('q_ten',100);
            $table->integer('q_trangThai')->default('2')->comment('1-đã khóa,2-khả dụng');
        });
        DB::statement("ALTER TABLE `shop_quyen` comment 'thông tin quyền'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_quyen');
    }
}
