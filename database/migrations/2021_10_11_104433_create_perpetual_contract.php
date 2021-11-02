<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerpetualContract extends Migration
{
    /**
     * 永续合约，合约信息
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpetual_contract', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->integer('currency_id')->comment('交易对id（从币种管理获取）');
            $table->string('multiple')->comment('倍数：10、25、50、100');
            $table->string('bail')->comment('保证金占比：100、50、25、10');
            $table->string('ratio')->comment('张数比例：1：？USDT');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}perpetual_contract` comment '永续合约，合约信息'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perpetual_contract');
    }
}
