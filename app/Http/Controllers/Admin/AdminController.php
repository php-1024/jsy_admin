<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Requests\Admin\AccountCreate;
use App\Http\Requests\Admin\AccountDel;
use App\Http\Requests\Admin\AccountEdit;
use App\Http\Requests\Admin\AccountStatus;
use App\Http\Requests\Admin\Id;
use App\Library\Response;
use App\Library\Tools;
use App\Models\Admin;
use App\Models\AdminMenus;
use App\Models\AdminOperationLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * 首页
     * @param Request $request
     * @return array
     */
    public function index(Request $request): array
    {
        $result = [];
        // 全部用户
        $result['all_user_count'] = 0;
        // 代理数
        $result['all_agent_count'] = 0;
        // 今日新增用户
        $result['today_add'] = 0;
        // 今日充值 USDT
        $result['today_charge'] = 0;
        // 总充值额
        $result['all_charge'] = 0;
        // 今日币币交易
        $result['currency_today'] = 0;
        // 币币总交易量
        $result['currency_all'] = 0;
        // 今日永续合约
        $result['perpetual_today'] = 0;
        // 永续合约总交易量
        $result['perpetual_all'] = 0;
        // 今日期权交易
        $result['option_today'] = 0;
        // 期权交易总交易量
        $result['option_all'] = 0;
        return Response::success($result);
    }

    /**
     * 获取登录用户信息
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/4 19:11
     */
    public function info(Request $request): array
    {
        $info = $request->get('info');
        $data = [
            'admin_id'     => $info['id'],
            'login_name'   => $info['account'],
            'avatar'       => config('app.url') . '/images/user.gif',
            'authoritys'   => $info['authoritys'],
            'token'        => $info['token'],
            'name'         => $info['name'],
            'status'       => $info['status'],
            'super'        => $info['super'],
            'login_time'   => $info['login_time'],
            'refresh_time' => $info['refresh_time']
        ];
        return Response::success($data);
    }


    /**
     * 获取菜单信息
     * @param Request $request
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/4 19:14
     */
    public function menus(Request $request): array
    {
        $info       = $request->get('info');
        $authoritys = $info['authoritys'];
        $where      = ['is_hidden' => '1'];
        $whereIn    = [];
        if ($authoritys != 'all') {
            $whereIn = explode($info['authoritys'], ',');
        }
        // 获取菜单列表
        $model = AdminMenus::where($where)->whereNotIn("type", [3, 4]);
        if ($whereIn) {
            $model->whereIn("id", $whereIn);
        }
        $menu_list = $model->select(['id', 'type', 'parent_id', 'icon', 'sort', 'name', 'cname', 'path_views'])->orderBy("sort", "asc")->get()->toArray();
        $list      = Tools::getTree($menu_list, 0);
        return Response::success($list);
    }

    /**
     * 添加管理员
     * @param AccountCreate $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/5 14:10
     */
    public function add(AccountCreate $request): array
    {
        $account    = $request->get('account');
        $password   = $request->get('password');
        $authoritys = $request->get('authoritys');
        $add_data   = array(
            'account'    => $account,
            'password'   => Tools::md5($password),
            'authoritys' => $authoritys,
            'token'      => $account,
            'name'       => '管理员',
            'avatar'     => 'Admin/yo1g3lao1615258422897',
            'status'     => "1",
            'super'      => "1",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        // 用户已存在
        if (Admin::checkRowExists(['account' => $account])) {
            return Response::error([], ErrorCode::AccountIsExists, "该用户已存在");
        }
        DB::beginTransaction();
        try {
            // 添加数据
            $admin = Admin::AddData($add_data);
            AdminOperationLog::Info($request, "创建了账户：{$account}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "创建账户：{$account}失败", $e->getMessage());
            // 创建账户失败！
            return Response::error([], ErrorCode::MLG_CreateError, $e->getMessage());
        }
        return Response::success(['admin' => $admin]);

    }


    /**
     * 删除管理员
     * @param AccountDel $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/5 14:28
     */
    public function del(AccountDel $request): array
    {
        $id = $request->get('id');
        if ($id == 1) {
            return Response::error([], ErrorCode::PERR_Error1);
        }
        DB::beginTransaction();
        try {
            // 删除数据
            Admin::selected_delete(['id' => $id]);
            AdminOperationLog::Info($request, "删除了账户id：{$id}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "删除账户id：{$id}失败", $e->getMessage());
            // 操作失败！
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }


    /**
     * 编辑管理员
     * @param AccountEdit $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/5 14:31
     */
    public function edit(AccountEdit $request): array
    {
        $id         = $request->get('id');
        $account    = $request->get('account');
        $password   = $request->get('password');
        $authoritys = $request->get('authoritys');
        $status     = $request->get('status');
        $edit_data  = array(
            'authoritys' => $authoritys,
            'status'     => $status,
        );
        if (strlen($account)) {
            $edit_data['account'] = $account;
        }
        if (strlen($password)) {
            $edit_data['password'] = Tools::md5($password);
        }
        DB::beginTransaction();
        try {
            // 编辑数据
            Admin::EditData(['id' => $id], $edit_data);
            AdminOperationLog::Info($request, "编辑了账户ID：{$id}，的信息");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "编辑账户ID：{$id}失败", $e->getMessage());
            // 操作失败！
            return Response::error([], ErrorCode::MLG_Error, $e->getMessage());
        }
        return Response::success();
    }


    /**
     * 获取管理员用户
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/5 13:40
     */
    public function list(Request $request): array
    {
        $limit = $request->get('limit', 10);
        $list  = Admin::getPaginate([], ['id', 'account', 'status', 'authoritys'], $limit, 'id', 'ASC');
        foreach ($list as $key => $val) {
            $admin      = Admin::getOne(['id' => $val['id']]);
            $authoritys = $admin['authoritys'];
            $where      = ['is_hidden' => '1'];
            $whereIn    = [];
            if ($authoritys != 'all') {
                $whereIn = explode(',', $authoritys);
            }
            DB::connection()->enableQueryLog();
            $menu_list           = AdminMenus::getList($where, $whereIn, ['id', 'type', 'parent_id', 'icon', 'sort', 'name', 'cname', 'path_views'], '', '', 'sort', 'ASC');
            $list[$key]['sql']   = DB::getQueryLog();
            $list[$key]['child'] = Tools::getTree($menu_list, 0);
        }
        return Response::success($list);
    }

    /**
     * 所有权限
     * @param Id $request
     * @return array[]
     */
    public function sys_authoritys(Request $request)
    {
        $where = ['is_hidden' => '1'];
        // 获取系统所有菜单列表
        $sys_authoritys   = AdminMenus::getList($where, [], ['id', 'type', 'parent_id', 'icon', 'sort', 'name', 'cname', 'path_views'], '', '', 'sort', 'ASC');
        $data['children'] = Tools::getTree($sys_authoritys, 0);
        return Response::success($data);
    }

    /**
     * 修改账号状态
     * @param AccountStatus $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/5 14:37
     */
    public function status(AccountStatus $request): array
    {
        $id        = $request->get('id');
        $status    = $request->get('status');
        $edit_data = array(
            'status' => $status,
        );
        DB::beginTransaction();
        try {
            // 编辑数据
            Admin::EditData(['id' => $id], $edit_data);
            AdminOperationLog::Info($request, "编辑了账户ID：{$id}，的状态为{$status}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "编辑账户ID：{$id}失败", $e->getMessage());
            // 操作失败！
            return Response::error([], ErrorCode::MLG_Error, $e->getMessage());
        }
        return Response::success();
    }
}
