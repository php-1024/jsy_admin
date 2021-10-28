<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionContract extends Migration
{
    /**
     * 期权合约信息
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_contract', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->integer('seconds')->comment('秒数');
            $table->tinyInteger('status')->default(0)->comment('状态:0.禁用,1.启用');
            $table->decimal('profit_ratio', 10, 2)->default(0)->comment('收益率');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}option_contract` comment '期权合约信息'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_contract');
    }
}
