<?php

namespace App\Http\Controllers\Agent;

use App\Http\Requests\Agent\RechargeOrder;
use App\Http\Requests\Agent\WalletStream;
use App\Http\Requests\Agent\Email;
use App\Library\Response;
use App\Models\ApplyBuy;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinanceController extends Controller
{

    /**
     * 钱包流水列表
     * @param WalletStream $request
     * @return array[]
     */
    public function wallet_stream(WalletStream $request): array
    {
        $limit = $request->get('limit', 10);
        $info  = $request->get('info');
        $email = $request->get('email'); // 用户邮箱
        $type  = $request->get('type'); // 1 USDT充值 2银行卡充值 3现货划转合约 4合约划转现货 5提现 6空投支出 7空投收入 8现货支出 9现货收入 10合约支出 11合约收入 12期权支出 13期权收入
        $where = [];
        if (strlen($email)) {
            $where['email'] = $email;
        }
        if (strlen($type)) {
            $where['type_detail'] = $type;
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


    /**
     * 申购列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/11/7 23:02
     */
    public function apply_buy_list(Request $request): array
    {
        $limit = $request->get('limit', 10);
        $email = $request->get('email');
        $where = [];
        if (strlen($email)) {
            $where['email'] = $email;
        }
        $info = $request->get('info');
        $ids  = User::where('user_path', 'like', "%{$info['sub_user_path']}%")->where(['user_level' => $info['user_level'] + 1])->pluck('id')->toArray();
        $list = \App\Models\ApplyBuy::whereIn('user_id', $ids)
            ->where($where)
            ->orderBy('id', 'desc')
            ->paginate($limit);
        return Response::success($list);
    }


}
