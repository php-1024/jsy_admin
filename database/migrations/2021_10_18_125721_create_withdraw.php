<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdraw extends Migration
{
    /**
     * 用户提现订单记录表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('用户id');
            $table->string('email', 60)->nullable()->comment('用户邮箱');
            $table->string('address')->nullable()->comment('提币地址');
            $table->tinyInteger('trading_pair_id')->nullable()->comment('提现的交易对id');
            $table->string('trading_pair_name')->nullable()->comment('提现的交易对name');
            $table->tinyInteger('type')->nullable()->comment('币链类型 1-OMNI 2-ERC20 3-TRC20');
            $table->string('withdraw_num')->nullable()->comment('提现数量');
            $table->string('handling_fee')->nullable()->comment('手续费');
            $table->string('actually_arrived')->nullable()->comment('实际到账');
            $table->enum('status', [0, 1, 2])->nullable()->comment('状态：0-未确认：1-已确认 2-已拒绝');
            $table->string('remark')->nullable()->comment('备注');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}withdraw` comment '用户提现订单记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdraw');
    }
}
