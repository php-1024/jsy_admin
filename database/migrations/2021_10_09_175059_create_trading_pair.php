<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 交易对
 */
class CreateTradingPair extends Migration
{
    /**
     * 钱包对管理
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trading_pair', function (Blueprint $table) {
            $table->increments('id')->comment('钱包id');
            $table->string('name', 60)->comment('钱包对名称');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}trading_pair` comment '钱包对管理'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trading_pair');
    }
}
