<?php

namespace App\Http\Controllers\Agent;

use App\Exceptions\ErrorCode;
use App\Http\Requests\Admin\Id;
use App\Http\Requests\Agent\UserEdit;
use App\Library\Response;
use App\Library\Tools;
use App\Models\Recharge;
use App\Models\User;
use App\Models\UsersWallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    /**
     * 首页统计
     */
    public function statistics(Request $request)
    {
//        $info                = $request->get('info');
//        $where['user_level'] = $info['user_level'] + 1;
//        $ids                 = User::where('user_path', 'like', "%{$info['sub_user_path']}%")->where($where)->pluck('id')->toArray();
        $today               = date('Y-m-d 00:00:00');
//        Recharge::whereIn('id', $ids)->where('created_at', '>=', $today)->count('recharge_num');
//        $data = [
//            // 全内用户
//            'all_user'        => count($ids),
//            // 今日新增
//            'today_user'      => User::whereIn('id', $ids)->where('created_at', '>=', $today)->count(),
//            // 今日充值
//            'all_recharge'    => count($ids),
//            // 总充值
//            'today_recharge'  => count($ids),
//            // 币币交易
//            'all_currency'    => count($ids),
//            // 交易总量
//            'today_currency'  => count($ids),
//            // 永续合约
//            'today_perpetual' => count($ids),
//            // 永续总交易
//            'all_perpetual'   => count($ids),
//            // 期权交易
//            'all_option'      => $ids,
//            // 期权交易
//            'today_option'    => $ids,
//        ];
//        return Response::success($data);
    }

    /**
     * 用户管理
     */
    public function user_manage(Request $request): array
    {
        $limit               = $request->get('limit', 10);
        $info                = $request->get('info');
        $where               = [];
        $like                = ['user_path' => $info['sub_user_path']];
        $email               = $request->get('email');
        $is_agent            = $request->get('is_agent');
        $where['user_level'] = $info['user_level'] + 1;
        if (strlen($email)) {
            $where['email'] = $email;
        }
        if (strlen($is_agent)) {
            $where['is_agent'] = $is_agent;
        }
        $list = User::getAgentPaginate($where, $like, [], $limit, 'id', 'desc');
        return Response::success($list);
    }


    /**
     * 设置是否代理
     * @param Id $request
     * @return array
     * @throws \Throwable
     */
    public function is_agent(Id $request): array
    {
        $id    = $request->get('id');
        $info  = $request->get('info');
        $user  = User::getOne(['id' => $id]);
        $check = strpos($user['user_path'], $info['sub_user_path']);
        if ($check === false) {
            return Response::error([], ErrorCode::MLG_Error, "权限不足，请检查该用户是否是您的下级");
        }
        $edit_data = [];
        if ($user['is_agent']) {
            $edit_data['is_agent'] = '0';
        } else {
            $edit_data['is_agent'] = '1';
        }
        DB::beginTransaction();
        try {
            User::EditData(['id' => $id], $edit_data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return Response::error([], ErrorCode::MLG_CreateError, $e->getMessage());
        }
        return Response::success();
    }

    /**
     * 锁定
     * @param Id $request
     * @return array
     * @throws \Throwable
     */
    public function status(Id $request): array
    {
        $id    = $request->get('id');
        $info  = $request->get('info');
        $user  = User::getOne(['id' => $id]);
        $check = strpos($user['user_path'], $info['sub_user_path']);
        if ($check === false) {
            return Response::error([], ErrorCode::MLG_Error, "权限不足，请检查该用户是否是您的下级");
        }
        $edit_data = [];
        if ($user['status']) {
            $edit_data['status'] = '0';
        } else {
            $edit_data['status'] = '1';
        }
        DB::beginTransaction();
        try {
            User::EditData(['id' => $id], $edit_data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return Response::error([], ErrorCode::MLG_CreateError, $e->getMessage());
        }
        return Response::success();
    }

    /**
     * 查看下级用户
     * @param Id $request
     * @return array
     */
    public function sub_detail(Id $request): array
    {
        $id   = $request->get('id');
        $info = $request->get('info');
        $user = User::getOne(['id' => $id]);
        if (!$user) {
            return Response::error([], ErrorCode::MLG_Error, "权限不足，请检查该用户是否是您的下级");
        }
        $check = strpos($user['user_path'], $info['sub_user_path']);
        if ($check === false) {
            return Response::error([], ErrorCode::MLG_Error, "权限不足，请检查该用户是否是您的下级");
        }
        $like                = ['user_path' => "{$user['id']},"];
        $where['user_level'] = $user['user_level'] + 1;
        $list                = User::getAgentList($where, $like, ['id', 'email']);
        return Response::success($list);
    }

    /**
     * 编辑下级信息
     * @param UserEdit $request
     * @return array
     * @throws \Throwable
     */
    public function edit(UserEdit $request): array
    {
        $id             = $request->get('id');
        $info           = $request->get('info');
        $password       = $request->get('password');
        $risk_profit    = $request->get('risk_profit');
        $partner_level  = $request->get('partner_level');
        $agent_dividend = $request->get('agent_dividend');
        $user           = User::getOne(['id' => $id]);
        $check          = strpos($user['user_path'], $info['sub_user_path']);
        if ($check === false) {
            return Response::error([], ErrorCode::MLG_Error, "权限不足，请检查该用户是否是您的下级");
        }
        $edit_data = [];
        if (strlen($password)) {
            $edit_data['password'] = Tools::md5($password);
        }
        if (strlen($risk_profit)) {
            $edit_data['risk_profit'] = $risk_profit;
        }
        if (strlen($partner_level)) {
            $edit_data['partner_level'] = $partner_level;
        }
        if (strlen($agent_dividend)) {
            $edit_data['agent_dividend'] = $agent_dividend;
        }
        DB::beginTransaction();
        try {
            User::EditData(['id' => $id], $edit_data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return Response::error([], ErrorCode::MLG_CreateError, $e->getMessage());
        }
        return Response::success();
    }


    /**
     * 钱包列表
     * @param Id $request
     * @return array
     */
    public function wallet_list(Id $request): array
    {
        $id    = $request->get('id');
        $info  = $request->get('info');
        $user  = User::getOne(['id' => $id]);
        $check = strpos($user['user_path'], $info['sub_user_path']);
        if ($check === false) {
            return Response::error([], ErrorCode::MLG_Error, "权限不足，请检查该用户是否是您的下级");
        }
        $list = UsersWallet::where(['user_id' => $id])->get()->toArray();
        return Response::success($list);
    }
}
