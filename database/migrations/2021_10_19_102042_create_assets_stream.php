<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsStream extends Migration
{
    /**
     * 资产流水记录表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets_stream', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('用户id');
            $table->string('email', 60)->comment('用户邮箱');
            $table->integer('currency_id')->comment('交易币种');
            $table->string('currency_name', 100)->nullable()->comment('币种名称 例如：BTC/USDT（币种/交易对）');
            $table->integer('trading_pair_id')->nullable()->comment('交易对ID');
            $table->string('trading_pair_name')->nullable()->comment('交易对名称');
            $table->integer('order_type')->comment('订单类型 1 币币交易 2 永续合约 3 期权合约');
            $table->string('order_id')->comment('订单id');
            $table->string('order_num')->comment('订单编号');
            $table->dateTime('order_time')->comment('订单时间');
            $table->string('order_price')->nullable()->comment('交易金额');
            $table->string('status')->comment('状态：0 交易中 1 已完成 2 已撤单');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}assets_stream` comment '资产流水记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets_stream');
    }
}
