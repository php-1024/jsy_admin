<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminOperationLog extends Migration
{
    /**
     * 后台操作记录管理
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 登录日志
        Schema::create('admin_operation_log', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->integer('account_id')->comment('登录ID');
            $table->string('token', 50)->nullable()->comment('token');
            $table->text('headers')->nullable()->comment('headers');
            $table->string('ip', 20)->nullable()->comment('ip');
            $table->string('path', 100)->nullable()->comment('请求路径');
            $table->text('data')->nullable()->comment('发送数据');
            $table->text('content')->comment('操作记录');
            $table->text('abnormal', 500)->nullable()->comment('异常信息');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}admin_operation_log` comment '后台操作记录管理'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_operation_log');
    }
}
