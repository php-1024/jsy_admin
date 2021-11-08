<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Requests\Admin\CurrencyOrderConfirm;
use App\Http\Requests\Admin\Id;
use App\Http\Requests\Admin\WithdrawOrderConfirm;
use App\Library\Response;
use App\Models\AdminOperationLog;
use App\Models\ApplyBuy;
use App\Models\CurrencyTransaction;
use App\Models\OptionContractTransaction;
use App\Models\PerpetualContractTransaction;
use App\Models\Recharge;
use App\Models\UsersWallet;
use App\Models\WalletStream;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    /**
     * 钱包流水
     */
    public function wallet_stream(Request $request): array
    {
        $limit = $request->get('limit', 10);
        $email = $request->get('email'); // 用户邮箱
        $type  = $request->get('type'); // 1 USDT充值 2银行卡充值 3现货划转合约 4合约划转现货 5提现 6空投支出 7空投收入 8现货支出 9现货收入 10合约支出 11合约收入 12期权支出 13期权收入
        $where = [];
        if (strlen($email)) {
            $where['email'] = $email;
        }
        if (strlen($type)) {
            $where['type_detail'] = $type;
        }
        $list = WalletStream::getPaginate($where, [], $limit, 'id', 'desc');
        return Response::success($list);
    }

    /**
     * 提现订单列表
     * @param Request $request
     * @return array
     */
    public function withdraw_order_list(Request $request): array
    {
        $email = $request->get('email');
        $limit = $request->get('limit', 10);
        $where = [];
        if ($email) {
            $where['email'] = $email;
        }
        $list = Withdraw::getPaginate($where, [], $limit);
        foreach ($list as $key => $val) {
            if ($val['handling_fee']) {
                $list[$key]['handling_fee'] = $val['handling_fee'] . "%";
            }
        }
        return Response::success($list);
    }

    /**
     * 提现订单确认
     * @param WithdrawOrderConfirm $request
     * @return array
     * @throws \Throwable
     */
    public function withdraw_order_confirm(WithdrawOrderConfirm $request): array
    {
        $id     = $request->get('id');
        $status = $request->get('status');
        DB::beginTransaction();
        try {
            $check = Withdraw::getOne(['id' => $id]);
            if ($check == false) {
                return Response::error([], ErrorCode::MLG_Error, "数据不存在！");
            }
            if (0 == $check['status'] && $status > 0) {// 状态为零的数据审核通过
                // 修改钱包余额
                $UsersWallet = UsersWallet::getOne(['user_id' => $check['user_id'], 'trading_pair_id' => $check['trading_pair_id']]);
                // 提现后的余额 = 对应钱包可用余额 + 提现金额
                $available = $UsersWallet['available'] - $check['withdraw_num'];
                if ($available < 0) {
                    return Response::error([], ErrorCode::MLG_Error, '钱包余额不足！');
                }
                UsersWallet::EditData(['id' => $UsersWallet['id']], ['available' => $available]);
                // 记录钱包流水
                WalletStream::AddData([
                    'trading_pair_id'   => $check['trading_pair_id'],     // 交易对ID
                    'trading_pair_name' => $check['trading_pair_name'],  // 交易对名称
                    'user_id'           => $check['user_id'],   // 用户id
                    'email'             => $check['email'], // 用户邮箱
                    'amount'            => $check['withdraw_num'],  // 流转金额
                    'amount_before'     => $UsersWallet['available'],  // 流转前的余额
                    'amount_after'      => $available,      // 流转后的余额
                    'way'               => '2', // 流转方式 1 收入 2 支出
                    'type'              => '7', // 流转类型 1 币币交易 2 永续合约 3 期权合约 4 申购交易 5 划转 6 充值 7 提现 8 冻结
                    'type_detail'       => '0', // 流转详细类型  0 提现 1 USDT充值  2 银行卡充值  3 币币交易手续费  4 永续合约手续费  5 期权合约手续费  6 币币账户划转到合约账户  7 合约账户划转到币币账户  8 申购冻结  9 币币交易  10 永续合约  11 期权合约
                ]);
                $Withdraw = Withdraw::EditData(['id' => $id], ['status' => (string)$status]);
                if ($Withdraw) {
                    AdminOperationLog::Info($request, "确认了，id为{$Withdraw['id']}，的提现状态为：{$status}");
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "确认提现状态失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error, $e->getMessage());
        }
        return Response::success();
    }

    /**
     * 充值订单列表
     * @param Request $request
     * @return array
     */
    public function recharge_order_list(Request $request): array
    {
        $email = $request->get('email');
        $limit = $request->get('limit', 10);
        $where = [];
        if ($email) {
            $where['email'] = $email;
        }
        $list = Recharge::getPaginate($where, [], $limit);
        return Response::success($list);
    }

    /**
     * 充值订单确认
     * @param Id $request
     * @return array
     * @throws \Throwable
     */
    public function recharge_order_confirm(Id $request): array
    {
        $id = $request->get('id');
        DB::beginTransaction();
        try {
            $check = Recharge::getOne(['id' => $id]);
            if (0 == $check['status']) {
                // 修改钱包余额
                $UsersWallet = UsersWallet::getOne(['user_id' => $check['user_id'], 'type' => $check['type'], 'trading_pair_id' => $check['trading_pair_id']]);
                // 充值后的余额 = 对应钱包可用余额 + 充值余额
                $available = $UsersWallet['available'] + $check['recharge_num'];
                UsersWallet::EditData(['id' => $UsersWallet['id']], ['available' => $available]);
                // 记录钱包流水
                WalletStream::AddData([
                    'trading_pair_id'   => $check['trading_pair_id'],     // 交易对ID
                    'trading_pair_name' => $check['trading_pair_name'],  // 交易对名称
                    'user_id'           => $check['user_id'],   // 用户id
                    'email'             => $check['email'], // 用户邮箱
                    'amount'            => $check['recharge_num'],  // 流转金额
                    'amount_before'     => $UsersWallet['available'],  // 流转前的余额
                    'amount_after'      => $available,      // 流转后的余额
                    'way'               => '1', // 流转方式 1 收入 2 支出
                    'type'              => '1', // 流转类型 0 未知 1 充值 2 提现 3 划转 4 快捷买币 5 空投 6 现货 7 合约 8 期权 9 手续费
                    'type_detail'       => '1', // 流转详细类型 0 未知 1 USDT充值 2银行卡充值 3现货划转合约 4合约划转现货 5提现 6空投支出 7空投收入 8现货支出 9现货收入 10合约支出 11合约收入 12期权支出 13期权收入
                ]);
                $Recharge = Recharge::EditData(['id' => $id], ['status' => '1']);
                if ($Recharge) {
                    AdminOperationLog::Info($request, "确认了，id为{$Recharge['id']}，的充值订单");
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "确认充值订单失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 期权交易列表
     */
    public function option_contract_list(Request $request): array
    {
        $email = $request->get('email');
        $limit = $request->get('limit', 10);
        $where = [];
        if ($email) {
            $where['email'] = $email;
        }
        $list = OptionContractTransaction::getPaginate($where, [], $limit);
        return Response::success($list);
    }

    /**
     * 永续交易列表
     * @param Request $request
     * @return array
     */
    public function perpetual_contract_list(Request $request): array
    {
        $email = $request->get('email');
        $limit = $request->get('limit', 10);
        $where = [];
        if ($email) {
            $where['email'] = $email;
        }
        $list = PerpetualContractTransaction::getPaginate($where, [], $limit);
        return Response::success($list);
    }

    /**
     * 币币交易列表
     * @param Request $request
     * @return array
     */
    public function currency_order_list(Request $request): array
    {
        $type  = $request->get('type'); // 搜索类型 1 订单号   2 用户邮箱
        $value = $request->get('value'); // 搜索值
        $other = $request->get('other'); // 其他 1 买入 2 卖出 3 交易中 4 已交易
        $limit = $request->get('limit', 10);
        $where = [];
        if (strlen($value)) {
            switch ($type) {
                case "1":
                    $where['order_number'] = $value;
                    break;
                case "2":
                    $where['email'] = $value;
                    break;
            }
        }
        switch ($other) {
            case "1":
                $where['transaction_type'] = "1";
                break;
            case "2":
                $where['transaction_type'] = "2";
                break;
            case "3":
                $where['status'] = "0";
                break;
        }
        $list = CurrencyTransaction::getPaginate($where, [], $limit, 'id', 'desc');
        foreach ($list as $key => $val) {
            unset($list[$key]['entrust_num']);
            if ($val['status'] == 0) {
                $list[$key]['clinch_num'] = "0.00";
            }
        }
        return Response::success($list);
    }


    /**
     * 币币交易订单状态操作
     * @param CurrencyOrderConfirm $request
     * @return array
     * @throws \Throwable
     */
    public function currency_order_confirm(CurrencyOrderConfirm $request): array
    {
        $id                  = $request->get('id');
        $status              = $request->get('status');
        $CurrencyTransaction = CurrencyTransaction::where(['currency_transaction.id' => $id])
            ->leftJoin("currency", function ($join) {
                $join->on('currency_transaction.currency_id', '=', 'currency.id');
            })
            ->select(['currency_transaction.*', 'currency.trading_pair_id', 'currency.name'])
            ->first();
        if ($CurrencyTransaction) {
            $CurrencyTransaction = $CurrencyTransaction->toArray();
        } else {
            return Response::error([], ErrorCode::MLG_Error, "未找到相关记录");
        }
        // 查找钱包
        $UsersWallet1 = UsersWallet::getOne(['user_id' => $CurrencyTransaction['user_id'], 'type' => '1', 'trading_pair_id' => $CurrencyTransaction['trading_pair_id']]);
        $UsersWallet2 = UsersWallet::getOne(['user_id' => $CurrencyTransaction['user_id'], 'type' => '1', 'trading_pair_name' => $CurrencyTransaction['name']]);
        if (empty($UsersWallet1)) {
            return Response::error([], ErrorCode::MLG_Error, "未找到用户id[{$CurrencyTransaction['user_id']}]，交易对id[{$CurrencyTransaction['trading_pair_id']}]的相关钱包！");
        }
        if (empty($UsersWallet2)) {
            return Response::error([], ErrorCode::MLG_Error, "未找到用户id[{$CurrencyTransaction['user_id']}]，交易对name[{$CurrencyTransaction['name']}]的相关钱包！");
        }
        DB::beginTransaction();
        try {
            if ($status == '1' && $CurrencyTransaction['status'] <= 0) {// 币币交易会产生支出，和收入（例如钱包1的余额换算后流转到钱包2的余额，这期间，产生了一笔支出和收入）
                // 订单方向
                if ($CurrencyTransaction['transaction_type'] == "1") {
                    // 1-买入
                    // 收入操作
                    $amount_before = $UsersWallet2['available'];                           // 流转前的余额
                    $amount_after  = $amount_before + $CurrencyTransaction['clinch_num'];  // 流转后的余额
                    // 收入流水
                    $walletStream = [
                        'trading_pair_id'   => $UsersWallet2['trading_pair_id'],// 交易对ID
                        'trading_pair_name' => $UsersWallet2['trading_pair_name'],// 交易对名称
                        'user_id'           => $CurrencyTransaction['user_id'], // 用户id
                        'email'             => $CurrencyTransaction['email'],   // 用户邮箱
                        'amount'            => $CurrencyTransaction['price'],   // 流转金额
                        'amount_before'     => $amount_before,                  // 流转前的余额
                        'amount_after'      => $amount_after,                   // 流转后的余额
                        'way'               => '1',                             // 流转方式 1 收入 2 支出
                        'type'              => '6',                             // 流转类型 0 未知 1 充值 2 提现 3 划转 4 快捷买币 5 空投 6 现货 7 合约 8 期权 9 手续费
                        'type_detail'       => '9',                             // 流转详细类型 0 未知 1 USDT充值 2银行卡充值 3现货划转合约 4合约划转现货 5提现 6空投支出 7空投收入 8现货支出 9现货收入 10合约支出 11合约收入 12期权支出 13期权收入
                    ];
                    UsersWallet::EditData(['id' => $UsersWallet2['id']], ['available' => $amount_after]);
                    // 记录钱包流水--收入流水
                    WalletStream::AddData($walletStream);
                } else if ($CurrencyTransaction['transaction_type'] == "2") {
                    // 2-卖出
                    // 收入操作
                    $amount_before = $UsersWallet1['available'];                           // 流转前的余额
                    $amount_after  = $amount_before + $CurrencyTransaction['clinch_num'];  // 流转后的余额
                    // 收入流水
                    $walletStream = [
                        'trading_pair_id'   => $UsersWallet1['trading_pair_id'],// 交易对ID
                        'trading_pair_name' => $UsersWallet1['trading_pair_name'],// 交易对名称
                        'user_id'           => $CurrencyTransaction['user_id'], // 用户id
                        'email'             => $CurrencyTransaction['email'],   // 用户邮箱
                        'amount'            => $CurrencyTransaction['price'],   // 流转金额
                        'amount_before'     => $amount_before,                 // 流转前的余额
                        'amount_after'      => $amount_after,                  // 流转后的余额
                        'way'               => '1',                             // 流转方式 1 收入 2 支出
                        'type'              => '6',                             // 流转类型 0 未知 1 充值 2 提现 3 划转 4 快捷买币 5 空投 6 现货 7 合约 8 期权 9 手续费
                        'type_detail'       => '9',                             // 流转详细类型 0 未知 1 USDT充值 2银行卡充值 3现货划转合约 4合约划转现货 5提现 6空投支出 7空投收入 8现货支出 9现货收入 10合约支出 11合约收入 12期权支出 13期权收入
                    ];
                    UsersWallet::EditData(['id' => $UsersWallet1['id']], ['available' => $amount_after]);
                    // 记录钱包流水--收入流水
                    WalletStream::AddData($walletStream);
                }
                $CurrencyTransaction = CurrencyTransaction::EditData(['id' => $id], ['status' => $status]);
                if ($CurrencyTransaction) {
                    AdminOperationLog::Info($request, "确认了，id为{$CurrencyTransaction['id']}，的币币交易状态为：{$status}");
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "确认币币交易状态失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }


    /**
     * 申购列表
     * @param Request $request
     * @return array[]
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/11/7 1:18
     */
    public function apply_buy_list(Request $request): array
    {
        $limit = $request->get('limit', 10);
        $email = $request->get('email');
        $where = [];
        if (strlen($email)) {
            $where['email'] = $email;
        }
        $list = ApplyBuy::getPaginate($where, [], $limit, 'id', 'desc');
        return Response::success($list);
    }

}
