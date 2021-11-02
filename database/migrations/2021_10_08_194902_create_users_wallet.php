<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersWallet extends Migration
{
    /**
     * 用户钱包表，多种币种的钱包
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_wallet', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->integer('user_id')->comment('用户id');
            $table->integer('type')->default(1)->comment('钱包类型：1现货 2合约');
            $table->integer('trading_pair_id')->default(0)->comment('币种id');
            $table->string('trading_pair_name', 50)->nullable()->comment('交易对名称');
            $table->string('address', 50)->nullable()->comment('钱包地址');
            $table->integer('status')->default(0)->comment('0正常 1锁定');
            $table->decimal('available', 25, 8)->default(0)->comment('可用');
            $table->decimal('freeze', 25, 8)->default(0)->comment('冻结');
            $table->decimal('total_assets', 25, 8)->default(0)->comment('总资产');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}users_wallet` comment '用户钱包表，多种币种的钱包'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_wallet');
    }
}
