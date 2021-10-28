<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecharge extends Migration
{
    /**
     * 用户充值订单记录表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharge', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('用户id');
            $table->string('email', 60)->nullable()->comment('用户邮箱');
            $table->string('address')->nullable()->comment('充币地址');
            $table->tinyInteger('type')->nullable()->comment('币链类型：1-OMNI  2-ERC20  3-TRC20');
            $table->tinyInteger('trading_pair_id')->nullable()->comment('充值的交易对id');
            $table->string('trading_pair_name')->nullable()->comment('充值的交易对name');
            $table->string('recharge_num')->nullable()->comment('充值数量');
            $table->enum('status', [0, 1])->nullable()->comment('状态：0-未确认：1-已确认');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}recharge` comment '用户充值订单记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recharge');
    }
}
