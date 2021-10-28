<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GlobalSet;
use App\Library\Response;
use App\Models\AdminOperationLog;
use App\Models\Globals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GlobalsController extends Controller
{
    /**
     * 设置全局参数
     * @param GlobalSet $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 15:31
     */
    public function set(GlobalSet $request): array
    {
        $site_name            = $request->get('site_name');          // 网站名称
        $download_link        = $request->get('download_link');      // 下载地址
        $kf_address           = $request->get('kf_address');         // 客服地址
        $invitation_code      = $request->get('invitation_code');    // 邀请码开关 1：开启，0：关闭
        $transaction_fees     = $request->get('transaction_fees');   // 交易手续费 请填写百分比%
        $withdrawal_fees      = $request->get('withdrawal_fees');    // 提现手续费 请填写百分比%
        $min_amount           = $request->get('min_amount');         // 最低提现额
        $max_amount           = $request->get('max_amount');         // 最大提现额
        $daily_cumulative     = $request->get('daily_cumulative');   // 日累计提现
        $max_number           = $request->get('max_number');         // 最大提现次数
        $is_withdraw          = $request->get('is_withdraw');        // 是否开启提现  1：开启，0：关闭
        $proxy_ratio          = $request->get('proxy_ratio');         // 代理红利比例  请填写百分比%
        $omni_wallet_address  = $request->get('omni_wallet_address'); // 钱包收款地址
        $erc20_wallet_address = $request->get('erc20_wallet_address');// 钱包收款地址
        $trc20_wallet_address = $request->get('trc20_wallet_address');// 钱包收款地址
        $set_data             = [
            'site_name'            => $site_name,
            'download_link'        => $download_link,
            'kf_address'           => $kf_address,
            'invitation_code'      => $invitation_code ? 1 : 0,
            'transaction_fees'     => $transaction_fees,
            'withdrawal_fees'      => $withdrawal_fees,
            'min_amount'           => $min_amount,
            'max_amount'           => $max_amount,
            'daily_cumulative'     => $daily_cumulative,
            'max_number'           => $max_number,
            'is_withdraw'          => $is_withdraw,
            'proxy_ratio'          => $proxy_ratio,
            'omni_wallet_address'  => $omni_wallet_address,
            'erc20_wallet_address' => $erc20_wallet_address,
            'trc20_wallet_address' => $trc20_wallet_address,
        ];
        DB::beginTransaction();
        try {
            foreach ($set_data as $key => $val) {
                if (strlen($val) > 0) {
                    if (Globals::checkRowExists(['fields' => $key])) {
                        Globals::EditData(['fields' => $key], ['value' => $val]);
                    } else {
                        Globals::AddData([
                            'fields' => $key,
                            'value'  => $val
                        ]);
                    }
                }
            }
            AdminOperationLog::Info($request, "修改设置了全局参数");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "设置全局参数失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 获取全局参数
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 16:20
     */
    public function get(Request $request): array
    {
        $whereIn = [
            'site_name'            => null,
            'download_link'        => null,
            'kf_address'           => null,
            'invitation_code'      => null,
            'transaction_fees'     => null,
            'withdrawal_fees'      => null,
            'min_amount'           => null,
            'max_amount'           => null,
            'daily_cumulative'     => null,
            'max_number'           => null,
            'is_withdraw'          => null,
            'proxy_ratio'          => null,
            'omni_wallet_address'  => null,
            'erc20_wallet_address' => null,
            'trc20_wallet_address' => null,
        ];
        $whereIn = array_keys($whereIn);
        $globals = Globals::whereIn('fields', $whereIn)->select(['fields', 'value'])->get()->toArray();
        $list    = [];
        foreach ($globals as $val) {
            $list[$val['fields']] = $val['value'];
        }
        return Response::success(['globals' => $list]);
    }
}
