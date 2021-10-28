<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ApplyBuySetupValidate;
use App\Http\Requests\Admin\OptionContractAdd;
use App\Http\Requests\Admin\OptionContractEdit;
use App\Library\Response;
use App\Models\AdminOperationLog;
use App\Models\ApplyBuy;
use App\Models\ApplyBuySetup;
use App\Models\OptionContract;
use App\Models\TradingPair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ApplyBuyController extends Controller
{

    /**
     * 申购币种设置
     * @param ApplyBuySetupValidate $request
     * @return array
     * @throws \Throwable
     */
    public function setup(ApplyBuySetupValidate $request): array
    {
        $params = $request->all();
        $result = [];
        DB::beginTransaction();
        try {
            foreach ($params['currency_name'] as $val) {
                $id = TradingPair::getValue(['name' => $val['name']], 'id');
                if (empty($id)) {
                    return Response::error([], ErrorCode::MLG_Error, '交易对名称不正确');
                }
                $data = [
                    'name'              => $params['name'],
                    'trading_pair_id'   => $id,
                    'trading_pair_name' => $val['name'],
                    'ratio'             => $val[$val['name']],
                    'estimated_time'    => $params['estimated_time'],
                    'start_time'        => $params['start_time'],
                    'end_time'          => $params['end_time'],
                    'code_status'       => $params['code_status'],
                    'code'              => $params['code'],
                ];
                if (ApplyBuySetup::checkRowExists(['trading_pair_name' => $val['name']])) {
                    $result[] = ApplyBuySetup::EditData(['trading_pair_name' => $val['name']], $data);
                } else {
                    $result[] = ApplyBuySetup::AddData($data);
                }
            }
            AdminOperationLog::Info($request, "申购币种设置成功");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "申购币种设置失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error, $e->getMessage());
        }
        return Response::success(['apply_buy_setup' => $result]);
    }

    /**
     * 获取申购码
     * @param Request $request
     * @return array[]
     */
    public function get_code(Request $request): array
    {
        $code = Uuid::uuid1()->getHex();
        if ($code) {
            return Response::success(['code' => $code]);
        }
        return Response::error([]);
    }

    /**
     * 获取申购币种设置
     * @param Request $request
     * @return array
     */
    public function get_setup(Request $request): array
    {
        $list   = ApplyBuySetup::getList();
        $result = [];
        if (count($list)) {
            $result['name']           = $list[0]['name'];
            $result['estimated_time'] = $list[0]['estimated_time'];
            $result['start_time']     = $list[0]['start_time'];
            $result['end_time']       = $list[0]['end_time'];
            $result['code_status']    = $list[0]['code_status'];
            $result['code']           = $list[0]['code'];
            $result['currency_name']  = [];
            foreach ($list as $key => $val) {
                $result['currency_name'][$key]['name']                    = $val['trading_pair_name'];
                $result['currency_name'][$key][$val['trading_pair_name']] = $val['ratio'];
            }
        }
        return Response::success($result);
    }

    /**
     * 申购列表
     * @param Request $request
     * @return array
     */
    public function list(Request $request): array
    {
        $limit = $request->get('limit', 10);
        $list  = ApplyBuy::getPaginate([], [], $limit);
        return Response::success($list);
    }
}
