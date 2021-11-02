<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_address', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('用户id');
            $table->string('email')->comment('用户邮箱');
            $table->string('name')->comment('地址名称');
            $table->integer('pact')->comment('协议： 1-OMNI 2-ERC20 3-TRC20');
            $table->string('address')->comment('提币地址');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}wallet_address` comment '提币地址'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_address');
    }
}
