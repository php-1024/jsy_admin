<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanner extends Migration
{
    /**
     * banner管理
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('name', 200)->comment('广告名称');
            $table->string('images', 200)->nullable()->comment('广告图片');
            $table->string('redirect', 200)->nullable()->comment('跳转地址');
            $table->integer('sort', false)->nullable()->default(0)->comment('排序');
            $table->enum('type', [1, 2, 3])->nullable()->comment('广告位置：1-pc 2-h5 3-app');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}banner` comment 'banner管理'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner');
    }
}
