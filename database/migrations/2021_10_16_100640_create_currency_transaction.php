<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyTransaction extends Migration
{
    /**
     * 币币交易订单信息
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_transaction', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->integer('user_id')->comment('用户id');
            $table->string('email', 60)->nullable()->comment('用户邮箱');
            $table->string('order_number', 50)->unique("order_number")->comment('订单号');
            $table->integer('currency_id')->comment('币种');
            $table->string('currency_name', 100)->nullable()->comment('币种名称 例如：BTC/USDT（币种/交易对）');
            $table->enum('order_type', [1, 2])->comment('挂单类型：1-限价 2-市价');
            $table->string('limit_price', 100)->nullable()->comment('当前限价');
            $table->string('clinch_num', 100)->nullable()->comment('成交量');
            $table->enum('transaction_type', [1, 2])->comment('订单方向：1-买入 2-卖出');
            $table->string('price')->comment('挂单价格');
            $table->enum('status', [0, 1, 2])->comment('状态：0 交易中 1 已完成 2 已撤单');
            $table->string('remark', 100)->nullable()->comment('备注');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}currency_transaction` comment '币币交易订单信息'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_transaction');
    }
}
