<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Requests\Admin\Id;
use App\Http\Requests\Admin\UserEdit;
use App\Http\Requests\Admin\UserGetSub;
use App\Http\Requests\Admin\UserGrade;
use App\Http\Requests\Admin\UserIsAgent;
use App\Http\Requests\Admin\UserStatus;
use App\Http\Requests\Admin\UserWalletCharge;
use App\Http\Requests\Admin\UserWalletList;
use App\Library\Response;
use App\Library\Tools;
use App\Models\AdminOperationLog;
use App\Models\User;
use App\Models\UsersWallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * 获取用户列表
     * @param Request $request
     * @return array
     */
    public function list(Request $request): array
    {
        $limit     = $request->get('limit', 10);
        $value     = $request->get('value');
        $userEmail = $request->get('userEmail');
        $fields    = [
            'id',
            'email',
            'is_agent',
            'parent_id',
            'share_code',
            'risk_profit',
            'agent_dividend',
            'last_login_ip',
            'created_at',
            'created_at',
            'updated_at',
            'status',
        ];
        $where     = [];
        if (!empty($userEmail)) {
            $where['email'] = $userEmail;
        }
        if (is_numeric($value)) {
            $where['is_agent'] = $value;
        }
        $list = User::getPaginate($where, $fields, $limit, 'id');
        return Response::success($list);
    }

    /**
     * 编辑用户
     * @param UserEdit $request
     * @return array
     * @throws \Throwable
     */
    public function edit(UserEdit $request): array
    {
        $id             = $request->get('id');
        $password       = $request->get('password');
        $pay_password   = $request->get('pay_password');
        $agent_dividend = $request->get('agent_dividend');
        $edit_data      = [];
        // 有传递密码则修改
        if (strlen($password)) {
            $edit_data['password'] = Tools::md5($password);
        }
        if (strlen($pay_password)) {
            $edit_data['pay_password'] = Tools::md5($pay_password);
        }
        if (strlen($agent_dividend)) {
            $edit_data['agent_dividend'] = Tools::md5($agent_dividend);
        }
        DB::beginTransaction();
        try {
            User::EditData(['id' => $id], $edit_data);
            AdminOperationLog::Info($request, "编辑了用户ID为{$id},的信息");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "编辑用户信息失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 编辑用户状态
     * @param UserStatus $request
     * @return array[]
     * @throws \Throwable
     */
    public function status(UserStatus $request): array
    {
        $id        = $request->get('id');
        $edit_data = [
            'status' => $request->get("status")
        ];
        DB::beginTransaction();
        try {
            User::EditData(['id' => $id], $edit_data);
            AdminOperationLog::Info($request, "编辑了用户id：{$id}，状态为：{$edit_data['status']}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "编辑用户状态失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 用户等级设置
     * @param UserGrade $request
     * @return array
     * @throws \Throwable
     */
    public function grade_setup(UserGrade $request): array
    {
        $id        = $request->get('id');
        $edit_data = [
            'is_agent' => $request->get("is_agent")
        ];
        DB::beginTransaction();
        try {
            User::EditData(['id' => $id], $edit_data);
            AdminOperationLog::Info($request, "编辑了用户id：{$id}，等级为：{$edit_data['is_agent']}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "编辑等级失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 获取下级信息
     * @param UserGetSub $request
     * @return array
     */
    public function get_sub(UserGetSub $request): array
    {
        $limit = $request->get('limit', 10);
        $id    = $request->get('id');
        $user  = User::find($id);
        $list  = User::whereRaw("find_in_set({$id},user_path)")
            ->select(['id','email'])
            ->where("user_level", $user->user_level + 1)
            ->where('status', '0')
            ->paginate($limit);
        return Response::success($list);
    }

    /**
     * 钱包列表
     * @param UserWalletList $request
     * @return array
     */
    public function wallet_list(UserWalletList $request): array
    {
        $user_id = $request->get('user_id');
        $limit   = $request->get('limit', 10);
        $list    = UsersWallet::getPaginate(['user_id' => $user_id], ['id', 'trading_pair_id', 'trading_pair_name', 'available', 'freeze', 'total_assets', 'address', 'status'], $limit);
        return Response::success($list);
    }

    /**
     * 充值钱包
     * @param UserWalletCharge $request
     * @return array[]
     * @throws \Throwable
     */
    public function wallet_recharge(UserWalletCharge $request): array
    {
        $id  = $request->get('id');
        $num = $request->get('num');
        if (UsersWallet::checkRowExists(['id' => $id])) {
            $UsersWallet = UsersWallet::getOne(['id' => $id], ['available']);
            $edit_data   = [
                'available' => $UsersWallet['available'] + $num
            ];
            DB::beginTransaction();
            try {
                UsersWallet::EditData(['id' => $id], $edit_data);
                AdminOperationLog::Info($request, "为钱包 ID：{$id}，充值了：{$num}");
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                AdminOperationLog::Info($request, "钱包充值失败", $e->getMessage());
                return Response::error([], ErrorCode::MLG_Error);
            }
        }
        return Response::success();
    }

    /**
     * 钱包锁定
     * @param UserStatus $request
     * @return array[]
     * @throws \Throwable
     */
    public function wallet_lock(UserStatus $request): array
    {
        $id     = $request->get('id');
        $status = $request->get('status');
        if (UsersWallet::checkRowExists(['id' => $id])) {
            $edit_data = [
                'status' => $status
            ];
            DB::beginTransaction();
            try {
                UsersWallet::EditData(['id' => $id], $edit_data);
                AdminOperationLog::Info($request, "修改了钱包 ID：{$id}，的状态为：{$status}");
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                AdminOperationLog::Info($request, "钱包锁定失败", $e->getMessage());
                return Response::error([], ErrorCode::MLG_Error);
            }
        }
        return Response::success();
    }

    /**
     * 重置地址
     * @param Id $request
     * @return array[]
     * @throws \Throwable
     */
    public function wallet_reset(Id $request)
    {
        $id = $request->get('id');
        if (UsersWallet::checkRowExists(['id' => $id])) {
            $edit_data = [
                'address' => null
            ];
            DB::beginTransaction();
            try {
                UsersWallet::EditData(['id' => $id], $edit_data);
                AdminOperationLog::Info($request, "重置了钱包 ID：{$id}，的地址");
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                AdminOperationLog::Info($request, "钱包地址重置失败", $e->getMessage());
                return Response::error([], ErrorCode::MLG_Error);
            }
        }
        return Response::success();
    }

}
