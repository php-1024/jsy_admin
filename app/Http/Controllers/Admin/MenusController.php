<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenusAdd;
use App\Http\Requests\Admin\MenusDel;
use App\Http\Requests\Admin\MenusEdit;
use App\Library\Response;
use App\Library\Tools;
use App\Models\AdminMenus;
use App\Models\AdminOperationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenusController extends Controller
{
    /**
     * 添加菜单
     * @param MenusAdd $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/5 23:04
     */
    public function add(MenusAdd $request): array
    {
        $is_hidden  = $request->get('is_hidden');
        $type       = $request->get('type');
        $parent_id  = $request->get('parent_id');
        $icon       = $request->get('icon');
        $sort       = $request->get('sort');
        $name       = $request->get('name');
        $cname      = $request->get('cname');
        $path_views = $request->get('path_views');
        $add_data   = array(
            'is_hidden'  => $is_hidden,                    // 是否显示 0否 1是
            'type'       => $type,                         // 类型，1目录  2菜单 3按钮 4接口
            'parent_id'  => $parent_id ?? 0,               // 父级id
            'icon'       => $icon ?? '',                   // 菜单图标，按钮图标为空
            'sort'       => $sort ?? 0,                    // 排序值，数字越大越后面
            'name'       => $name,                         // 菜单name
            'cname'      => $cname,                        // 菜单中文名
            'path_views' => $path_views,                   // 路径
        );
        DB::beginTransaction();
        try {
            // 添加数据
            $menus = AdminMenus::AddData($add_data);
            AdminOperationLog::Info($request, "添加了菜单ID{$menus['id']}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "添加菜单失败", $e->getMessage());
            // 创建账户失败！
            return Response::error([], ErrorCode::MLG_CreateError);
        }
        return Response::success(['menus' => $menus]);
    }


    /**
     * 删除菜单
     * @param MenusDel $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/5 23:09
     */
    public function del(MenusDel $request): array
    {
        $id = $request->get('id');
        DB::beginTransaction();
        try {
            // 删除数据
            AdminMenus::selected_delete(['id' => $id]);
            AdminOperationLog::Info($request, "删除了菜单ID：{$id}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "删除菜单ID：{$id}失败", $e->getMessage());
            // 删除菜单失败！
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 编辑菜单
     * @param MenusEdit $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/5 23:10
     */
    public function edit(MenusEdit $request): array
    {
        $id         = $request->get('id');
        $is_hidden  = $request->get('is_hidden');
        $type       = $request->get('type');
        $parent_id  = $request->get('parent_id');
        $icon       = $request->get('icon');
        $sort       = $request->get('sort');
        $name       = $request->get('name');
        $cname      = $request->get('cname');
        $path_views = $request->get('path_views');
        $edit_data  = array(
            'is_hidden'  => $is_hidden,                    // 是否显示 0否 1是
            'type'       => $type,                         // 类型，1目录  2菜单 3按钮 4接口
            'parent_id'  => $parent_id ?? 0,               // 父级id
            'icon'       => $icon ?? '',                   // 菜单图标，按钮图标为空
            'sort'       => $sort ?? 0,                    // 排序值，数字越大越后面
            'name'       => $name,                         // 菜单name
            'cname'      => $cname,                        // 菜单中文名
            'path_views' => $path_views,                   // 路径
        );
        DB::beginTransaction();
        try {
            // 添加数据
            $menus = AdminMenus::EditData(['id' => $id], $edit_data);
            AdminOperationLog::Info($request, "编辑了菜单ID{$menus['id']}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "编辑菜单失败", $e->getMessage());
            // 操作失败！
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success(['menus' => $menus]);
    }

    /**
     * 获取菜单列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/5 23:17
     */
    public function list(Request $request): array
    {
        // 获取菜单列表
        $menu_list = AdminMenus::getList(['is_hidden' => '1'], [], ['id', 'type', 'parent_id', 'icon', 'sort', 'name', 'cname', 'path_views']);
        $list      = Tools::getTree($menu_list, 0);
        return Response::success($list);
    }
}
