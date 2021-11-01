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
            $table->integer('currency_id')->comment('币种id');
            $table->tinyInteger('type')->default(1)->comment('类型:1.手数,2.倍数');
            $table->string('value')->comment('值');
            $table->tinyInteger('status')->default(0)->comment('状态:0.禁用,1.启用');
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
