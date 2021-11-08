<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerpetualContractTransaction extends Migration
{
    /**
     * 永续合约交易订单信息
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpetual_contract_transaction', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->integer('user_id')->comment('用户id');
            $table->string('email', 60)->nullable()->comment('用户邮箱');
            $table->string('order_number', 50)->unique("order_number")->comment('订单号');
            $table->integer('currency_id')->comment('币种');
            $table->string('currency_name', 100)->nullable()->comment('币种名称 例如：BTC/USDT（币种/交易对）');
            $table->integer('trading_pair_id')->nullable()->comment('交易对id');
            $table->string('trading_pair_name', 50)->nullable()->comment('交易对名称');
            $table->string('k_line_code', 120)->comment('K线图代码');
            $table->enum('order_type', [1, 2])->comment('订单类型：1-限价 2-市价');
            $table->string('limit_price', 100)->nullable()->comment('当前限价');
            $table->enum('transaction_type', [1, 2])->comment('交易类型：1-开多 2-开空');
            $table->string('entrust_num', 100)->nullable()->comment('委托量');
            $table->string('entrust_price', 100)->nullable()->comment('委托价格');
            $table->string('clinch_price', 100)->nullable()->comment('成交价格');
            $table->string('ensure_amount', 100)->nullable()->comment('保证金');
            $table->string('handle_fee', 15)->comment('手续费，单位百分比');
            $table->integer('multiple')->comment('倍数值');
            $table->string('price')->comment('交易金额');
            $table->string('income')->nullable()->comment('最终收益');
            $table->enum('status', [0, 1, 2])->comment('状态：0 交易中 1 已完成 2 已撤单');
            $table->string('remark', 100)->nullable()->comment('备注');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}perpetual_contract_transaction` comment '永续合约交易订单信息'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perpetual_contract_transaction');
    }
}
