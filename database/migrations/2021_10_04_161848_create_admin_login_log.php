<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminLoginLog extends Migration
{
    /**
     * 后台登录记录管理
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 登录日志
        Schema::create('admin_login_log', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->integer('account_id', false)->comment('登录ID');
            $table->string('account', 20)->comment('登录账号');
            $table->string('token', 36)->comment('登录凭证');
            $table->string('ip')->comment('登录IP');
            $table->string('address', 120)->nullable()->comment('登录地址');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}admin_login_log` comment '后台登录记录管理'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_login_log');
    }
}
