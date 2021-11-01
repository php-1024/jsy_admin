<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletins extends Migration
{
    /**
     * 公告管理
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletins', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->text('content_1')->comment('繁体公告');
            $table->text('content_2')->comment('英文公告');
            $table->text('content_3')->comment('日文公告');
            $table->text('content_4')->comment('西班牙公告');
            $table->text('content_5')->comment('韩语公告');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}bulletins` comment '公告管理'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulletins');
    }
}
