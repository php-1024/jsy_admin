<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyBuySetup extends Migration
{
    /**
     * 申购币种设置
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_buy_setup', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('name')->comment('币种名称');
            $table->integer('issue_price')->nullable()->comment('发行价 1 = 多少个USDT');
            $table->dateTime('estimated_time')->comment('预计上线时间');
            $table->dateTime('start_time')->comment('开始申购时间');
            $table->dateTime('end_time')->comment('结束申购时间');
            $table->string('code', 100)->nullable()->comment('申购码');
            $table->tinyInteger('code_status')->nullable()->comment('申购码开关  0 关闭 1 开启');
            $table->text('detail')->nullable()->comment('项目详情');
            $table->tinyInteger('status')->default('0')->comment('币种状态  0 关闭 1 开启');
            $table->dateTime('created_at')->comment('创建时间');
            $table->dateTime('updated_at')->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}apply_buy_setup` comment '申购币种设置'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apply_buy_setup');
    }
}
