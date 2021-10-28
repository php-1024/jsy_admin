<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * 后台管理员用户表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('account', 20)->unique('xf_admin_account_uindex')->comment('登录账号');
            $table->string('password')->comment('登录密码');
            $table->string('authoritys', 500)->comment('用户权限，拥有的权力');
            $table->string('token', 36)->unique('xf_admin_token_uindex')->comment('登录凭证');
            $table->string('name', 10)->comment('姓名');
            $table->string('avatar', 100)->nullable()->comment('头像');
            $table->enum('status', [0, 1])->default(0)->comment('状态: 0,禁用 1,启用');
            $table->enum('super', [0, 1])->default(0)->comment('状态: 0,员工 1,管理员');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}admin` comment '后台管理员用户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
