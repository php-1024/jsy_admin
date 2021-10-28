<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletStream extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_stream', function (Blueprint $table) {
            $table->id();
            $table->integer('trading_pair_id')->nullable()->comment('交易对ID');
            $table->string('trading_pair_name')->nullable()->comment('交易对名称');
            $table->integer('user_id')->comment('用户id');
            $table->string('email', 60)->comment('用户邮箱');
            $table->string('amount', 60)->comment('流转金额');
            $table->string('amount_before', 60)->comment('流转前的余额');
            $table->string('amount_after', 60)->comment('流转后的余额');
            $table->enum('way', [1, 2])->comment('流转方式 1 收入 2 支出');
            $table->enum('type', [1, 2, 3, 4, 5, 6, 7, 8])->comment('流转类型 1 币币交易 2 永续合约 3 期权合约 4 申购交易 5 划转 6 充值 7 提现 8 冻结');
            $table->enum('type_detail', [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11])->nullable()->comment('流转详细类型 0 提现 1 USDT充值  2 银行卡充值  3 币币交易手续费  4 永续合约手续费  5 期权合约手续费  6 币币账户划转到合约账户  7 合约账户划转到币币账户  8 申购冻结  9 币币交易  10 永续合约  11 期权合约');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}wallet_stream` comment '钱包流水'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_stream');
    }
}
