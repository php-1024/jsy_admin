<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNews extends Migration
{
    /**
     * 新闻表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('title')->nullable()->comment('标题');
            $table->enum('language', [1, 2, 3, 4, 5])->nullable()->comment('语言：1-繁体 2-英文 3-日文 4-韩语 5 西班牙语');
            $table->integer('sort')->default(0)->comment('排序');
            $table->enum('is_hidden', [0, 1])->nullable()->comment('显示：0-否 1-是');
            $table->text('content')->comment('内容');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}news` comment '新闻表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
