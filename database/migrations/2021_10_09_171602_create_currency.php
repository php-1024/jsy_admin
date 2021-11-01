<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrency extends Migration
{
    /**
     * 货币管理
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('name', 60)->comment('名称');
            $table->integer('trading_pair_id')->comment('交易对');
            $table->string('k_line_code', 120)->comment('K线图代码');
            $table->integer('decimal_scale')->default(0)->comment('自有币位数');
            $table->string('type', 60)->nullable()->comment('交易显示：（币币交易，永续合约，期权合约）');
            $table->tinyInteger('sort')->default(0)->comment('排序');
            $table->tinyInteger('is_hidden')->default(0)->comment('是否展示：0-否，1-展示');
            $table->decimal('fluctuation_min', 10, 5)->default(0)->comment('行情波动值（小）');
            $table->decimal('fluctuation_max', 10, 5)->default(0)->comment('行情波动值（大）');
            $table->string('fee_currency_currency')->default(0)->comment('币币交易手续费%');
            $table->string('fee_perpetual_contract')->default(0)->comment('永续合约手续费%');
            $table->string('fee_option_contract')->default(0)->comment('期权合约手续费%');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}currency` comment '货币管理'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency');
    }
}
