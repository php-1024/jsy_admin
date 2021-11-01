<?php

namespace App\Http\Controllers\Agent;

use App\Http\Requests\Agent\RechargeOrder;
use App\Http\Requests\Agent\WalletStream;
use App\Http\Requests\Agent\Email;
use App\Library\Response;
use App\Models\User;
use App\Http\Controllers\Controller;

class FinanceController extends Controller
{

    /**
     * 钱包流水列表
     * @param WalletStream $request
     * @return array[]
     */
    public function wallet_stream(WalletStream $request): array
    {
        $email       = $request->get('email');
        $way         = $request->get('way'); // 流转方式 1 收入 2 支出
        $type        = $request->get('type');
        $type_detail = $request->get('type_detail');
        $limit       = $request->get('limit', 10);
        $info        = $request->get('info');
        $where       = [];
        if (strlen($email)) {
            $where['email'] = $email;
        }
        if (strlen($way)) {
            $where['way'] = $way;
        }
        if (strlen($type)) {
            $where['type'] = $type;
        }
        if (strlen($type_detail)) {
            $where['type_detail'] = $type_detail;
        }
        $ids  = User::where('user_path', 'like', "%{$info['sub_user_path']}%")->where(['user_level' => $info['user_level'] + 1])->pluck('id')->toArray();
        $list = \App\Models\WalletStream::whereIn('user_id', $ids)
            ->where($where)
            ->orderBy('id', 'desc')
            ->paginate($limit);
        return Response::success($list);
    }


    /**
     * 提现订单列表
     * @param Email $request
     * @return array[]
     */
    public function withdraw_order(Email $request): array
    {
        $email = $request->get('email');
        $limit = $request->get('limit', 10);
        $info  = $request->get('info');
        $where = [];
        if (strlen($email)) {
            $where['email'] = $email;
        }
        $ids  = User::where('user_path', 'like', "%{$info['sub_user_path']}%")->where(['user_level' => $info['user_level'] + 1])->pluck('id')->toArray();
        $list = \App\Models\Withdraw::whereIn('user_id', $ids)
            ->where($where)
            ->orderBy('id', 'desc')
            ->paginate($limit);
        return Response::success($list);
    }


    /**
     * 充值订单列表
     * @param RechargeOrder $request
     * @return array
     */
    public function recharge_order(RechargeOrder $request): array
    {
        $email           = $request->get('email');
        $trading_pair_id = $request->get('trading_pair_id');
        $limit           = $request->get('limit', 10);
        $info            = $request->get('info');
        $where           = [];
        if (strlen($email)) {
            $where['email'] = $email;
        }
        if (strlen($trading_pair_id)) {
            $where['trading_pair_id'] = $trading_pair_id;
        }
        $ids  = User::where('user_path', 'like', "%{$info['sub_user_path']}%")->where(['user_level' => $info['user_level'] + 1])->pluck('id')->toArray();
        $list = \App\Models\Recharge::whereIn('user_id', $ids)
            ->where($where)
            ->orderBy('id', 'desc')
            ->paginate($limit);
        return Response::success($list);
    }


    /**
     * 期权交易列表
     * @param Email $request
     * @return array[]
     */
    public function option_contract_transaction(Email $request): array
    {
        $email = $request->get('email');
        $limit = $request->get('limit', 10);
        $info  = $request->get('info');
        $where = [];
        if (strlen($email)) {
            $where['email'] = $email;
        }
        $ids  = User::where('user_path', 'like', "%{$info['sub_user_path']}%")->where(['user_level' => $info['user_level'] + 1])->pluck('id')->toArray();
        $list = \App\Models\OptionContractTransaction::whereIn('user_id', $ids)
            ->where($where)
            ->orderBy('id', 'desc')
            ->paginate($limit);
        return Response::success($list);
    }


    /**
     * 永续交易列表
     * @param Email $request
     * @return array[]
     */
    public function perpetual_contract_transaction(Email $request): array
    {
        $email = $request->get('email');
        $limit = $request->get('limit', 10);
        $info  = $request->get('info');
        $where = [];
        if (strlen($email)) {
            $where['email'] = $email;
        }
        $ids  = User::where('user_path', 'like', "%{$info['sub_user_path']}%")->where(['user_level' => $info['user_level'] + 1])->pluck('id')->toArray();
        $list = \App\Models\PerpetualContractTransaction::whereIn('user_id', $ids)
            ->where($where)
            ->orderBy('id', 'desc')
            ->paginate($limit);
        return Response::success($list);
    }


}
