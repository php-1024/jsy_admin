<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionContractTransaction extends Migration
{
    /**
     * 期权合约交易订单信息
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_contract_transaction', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->integer('user_id')->comment('用户id');
            $table->string('email', 60)->nullable()->comment('用户邮箱');
            $table->string('order_number', 50)->unique("order_number")->comment('订单号');
            $table->integer('option_contract_id')->comment('期权合约id');
            $table->integer('seconds')->comment('秒数');
            $table->decimal('profit_ratio', 10, 2)->comment('收益率');
            $table->string('price')->comment('交易金额');
            $table->string('buy_price')->comment('购买价格');
            $table->string('handle_fee', 15)->comment('手续费，单位百分比');
            $table->string('clinch_price')->comment('成交价格');
            $table->integer('currency_id')->comment('购买币种id');
            $table->string('currency_name', 100)->nullable()->comment('币种名称 例如：BTC/USDT（币种/交易对）');
            $table->integer('trading_pair_id')->nullable()->comment('交易对id');
            $table->string('trading_pair_name', 50)->nullable()->comment('交易对名称');
            $table->enum('order_type', [1, 2])->comment('订单类型：1-买涨 2-买跌');
            $table->tinyInteger('order_result')->nullable()->comment('交割结果：1-涨 2-跌');
            $table->string('result_profit', 100)->nullable()->comment('预计最终盈利金额');
            $table->enum('status', [0, 1, 2])->comment('状态：0 交易中 1 已完成 2 已撤单');
            $table->string('remark', 100)->nullable()->comment('备注');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}option_contract_transaction` comment '期权合约交易订单信息'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_contract_transaction');
    }
}
