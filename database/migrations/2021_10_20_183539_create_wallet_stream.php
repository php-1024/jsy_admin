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
            $table->enum('type', [1, 2, 3, 4, 5, 6, 7, 8])->comment('流转类型 0 未知 1 充值 2 提现 3 划转 4 快捷买币 5 空投 6 现货 7 合约 8 期权 9 手续费');
            $table->enum('type_detail', [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11])->nullable()->comment('流转详细类型 0 未知 1 USDT充值 2银行卡充值 3现货划转合约 4合约划转现货 5提现 6空投支出 7空投收入 8现货支出 9现货收入 10合约支出 11合约收入 12期权支出 13期权收入');
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
