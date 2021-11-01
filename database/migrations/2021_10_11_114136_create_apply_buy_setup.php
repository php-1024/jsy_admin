<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyBuySetup extends Migration
{
    /**
     * 申购币种设置
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_buy_setup', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('name')->comment('币种名称');
            $table->integer('trading_pair_id')->nullable()->comment('交易对ID');
            $table->string('trading_pair_name')->nullable()->comment('交易对名称');
            $table->string('ratio')->default(1)->comment('购买比例');
            $table->dateTime('estimated_time')->comment('预计上线时间');
            $table->dateTime('start_time')->comment('开始申购时间');
            $table->dateTime('end_time')->comment('结束申购时间');
            $table->string('code', 100)->nullable()->comment('申购码');
            $table->tinyInteger('code_status')->nullable()->comment('申购码开关  0 关闭 1 开启');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}apply_buy_setup` comment '申购币种设置'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apply_buy_setup');
    }
}
