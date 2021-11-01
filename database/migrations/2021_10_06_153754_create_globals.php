<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobals extends Migration
{
    /**
     * 全局配置管理
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('globals', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('fields', 20)->comment('字段名称');
            $table->string('value', 300)->nullable()->comment('字段值');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
            $table->unique(['fields'], 'xf_globals_uindex');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}globals` comment '全局配置管理'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('globals');
    }
}
