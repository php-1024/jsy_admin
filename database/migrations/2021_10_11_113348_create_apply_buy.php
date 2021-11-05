<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyBuy extends Migration
{
    /**
     * 申购币种记录
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_buy', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('email')->comment('申购用户');
            $table->integer('get_currency_id')->comment('购买币种id');
            $table->string('get_currency_name')->nullable()->comment('购买币种名称');
            $table->integer('get_currency_num')->comment('购买数量');
            $table->integer('trading_pair_id')->nullable()->comment('交易对ID');
            $table->string('trading_pair_name')->nullable()->comment('交易对名称');
            $table->string('issue_price')->comment('发行价 1 = 多少个USDT');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}apply_buy` comment '申购币种记录'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apply_buy');
    }
}
