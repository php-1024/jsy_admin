<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminMenus extends Migration
{
    /**
     * 后台菜单路由管理
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->enum('is_hidden', [0, 1])->comment('是否显示 0否 1是');
            $table->enum('type', [1, 2, 3, 4])->comment('类型，1目录  2菜单 3按钮 4接口');
            $table->unsignedInteger('parent_id')->default(0)->index('parent_id')->comment('父级id');
            $table->string('icon')->default('')->comment('菜单图标，按钮图标为空');
            $table->unsignedInteger('sort')->default(0)->comment('排序值，数字越大越后面');
            $table->string('name')->default('')->comment('菜单name');
            $table->string('cname')->default('')->comment('菜单中文名');
            $table->string('path_views')->default('')->comment('路径');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'))->comment('创建时间');
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'))->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间，为 null 则是没删除');
            $table->index(['parent_id', 'deleted_at'], 'ydz_menu_parentid');
        });
        $prefix = DB::getConfig('prefix');
        \DB::statement("ALTER TABLE `{$prefix}admin_menus` comment '后台菜单路由管理'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_menus');
    }
}
