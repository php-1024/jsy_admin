<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser extends Migration
{
    /**
     * 用户信息表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $auto_increment = 500;
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->enum('language', [1, 2, 3, 4, 5])->nullable()->comment('语言：1-繁体 2-英文 3-日文 4-韩语 5 西班牙语');
            $table->enum('is_agent', [0, 1])->default(0)->comment('是否代理： 0：不是   1：是');
            $table->string('email', 60)->unique('xf_user_email_uindex')->nullable()->comment('邮箱');
            $table->string('nickname')->nullable()->comment('昵称');
            $table->string('password')->nullable()->comment('登录密码');
            $table->string('pay_password')->nullable()->comment('支付密码');
            $table->integer('user_level')->nullable()->comment('用户层级');
            $table->string('user_path')->nullable()->comment('用户关系');
            $table->integer('partner_level')->nullable()->comment('合伙人等级 0-普通 1-青铜 2-白银 3-黄金 4-铂金');
            $table->string('agent_dividend')->nullable()->comment('代理红利');
            $table->string('share_code', 30)->unique('xf_user_share_code_uindex')->nullable()->comment('用户邀请码，每个用户唯一');
            $table->integer('risk_profit')->nullable()->comment('风控概率');
            $table->string('last_login_ip', 30)->nullable()->comment('登录IP');
            $table->enum('status', [0, 1])->comment('状态： 0正常 1，已锁定');
            $table->dateTime('lock_time')->nullable()->comment('锁定时间');
            $table->dateTime('login_time')->nullable()->comment('登录时间');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });

        $prefix = DB::getConfig('prefix');
        $driver = DB::getConfig('driver');
        if ('mysql' == $driver) {
            DB::statement("ALTER TABLE {$prefix}user AUTO_INCREMENT={$auto_increment}");
        }
        if ('pgsql' == $driver) {
            DB::statement("alter sequence {$prefix}user_id_seq restart with {$auto_increment}");
        }
        \DB::statement("ALTER TABLE `{$prefix}user` comment '用户信息表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
