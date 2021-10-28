<?php

namespace App\Http\Controllers\Proxy;

use App\Exceptions\ErrorCode;
use App\Http\Requests\Admin\Id;
use App\Http\Requests\Proxy\RiskSetup;
use App\Http\Requests\Proxy\UserEdit;
use App\Library\Response;
use App\Library\Tools;
use App\Models\User;
use App\Models\UsersWallet;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
 * 3.0版本预设
 */
class ProxyController extends Controller
{
    /**
     * 用户管理
     */
    public function user_manage(Request $request): array
    {
        $info  = $request->get('info');
        $type  = $request->get('type');
        $value = $request->get('value');
        $other = $request->get('other');
        $limit = $request->get('limit', 10);
        $where = [];
        $like  = ['user_path' => $info['sub_user_path']];
        if (strlen($value)) {
            switch ($type) {// 1-用户邮箱  2-上级代理id  3-用户邀请码
                case "1":
                    $where['email'] = $value;
                    break;
                case "2":
                    $user  = User::getOne(['id' => $value]);
                    $check = strpos($user['user_path'], $info['sub_user_path']);
                    if ($check !== false) {
                        $like = ['user_path' => "{$value},"];
                    }
                    break;
                case "3":
                    $where['share_code'] = $value;
                    break;
                default:
                    break;
            }
        }
        switch ($other) { //  1-代理  2-锁定
            case "1":
                $where['is_agent'] = 1;
                break;
            case "2":
                $where['status'] = 1;
                break;
            default:
                break;
        }
        $list = User::getAgentPaginate($where, $like, [], $limit, 'id', 'desc');
        foreach ($list as $key => $val) {
            $list[$key]['parent_id'] = Tools::getParentId($val['user_level'], $val['user_path']);
            if ($val['risk_profit'] > 50) {
                $list[$key]['risk'] = 1;
            } else {
                $list[$key]['risk'] = 0;
            }
        }
        return Response::success($list);
    }


    /**
     * 设置是否代理
     * @param Id $request
     * @return array[]
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
     * @return array[]
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
        $pay_password   = $request->get('pay_password');
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
        if (strlen($pay_password)) {
            $edit_data['pay_password'] = Tools::md5($pay_password);
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
     * 风险设置
     * @param RiskSetup $request
     * @return array
     * @throws \Throwable
     */
    public function risk_setup(RiskSetup $request): array
    {
        $id    = $request->get('id');
        $risk  = $request->get('risk');
        $info  = $request->get('info');
        $user  = User::getOne(['id' => $id]);
        $check = strpos($user['user_path'], $info['sub_user_path']);
        if ($check === false) {
            return Response::error([], ErrorCode::MLG_Error, "权限不足，请检查该用户是否是您的下级");
        }
        $edit_data = [];
        switch ($risk) {// 1 赢 2亏 3无
            case "1":
                $edit_data['risk_profit'] = "100";
                break;
            case "2":
                $edit_data['risk_profit'] = "1";
                break;
            default:
                $edit_data['risk_profit'] = "0";
                break;
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
     * 资产列表
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
        $list = UsersWallet::where(['user_id' => $id])->select(['id', 'trading_pair_name', 'available', 'freeze', 'total_assets'])->get()->toArray();
        return Response::success($list);
    }


    /**
     * 提币地址
     * @param Id $request
     * @return array
     */
    public function withdraw_address(Id $request): array
    {
        $id    = $request->get('id');
        $info  = $request->get('info');
        $user  = User::getOne(['id' => $id]);
        $check = strpos($user['user_path'], $info['sub_user_path']);
        if ($check === false) {
            return Response::error([], ErrorCode::MLG_Error, "权限不足，请检查该用户是否是您的下级");
        }
        $list = Withdraw::where(['user_id' => $id])->select(['id', 'address', 'trading_pair_name'])->get()->toArray();
        return Response::success($list);
    }
}
