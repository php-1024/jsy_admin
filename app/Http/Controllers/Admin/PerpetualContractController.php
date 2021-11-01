<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Id;
use App\Http\Requests\Admin\PerpetualContractAdd;
use App\Http\Requests\Admin\PerpetualContractEdit;
use App\Library\Response;
use App\Models\AdminOperationLog;
use App\Models\Currency;
use App\Models\PerpetualContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerpetualContractController extends Controller
{


    /**
     * 添加永续合约
     * @param PerpetualContractAdd $request
     * @return array
     * @throws \Throwable
     */
    public function add(PerpetualContractAdd $request): array
    {
        $add_data = $request->all();
        DB::beginTransaction();
        try {
            $perpetual_contract = PerpetualContract::AddData($add_data);
            AdminOperationLog::Info($request, "添加了一条永续合约,ID为{$perpetual_contract['id']}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "添加永续合约失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success(['perpetual_contract' => $perpetual_contract]);
    }


    /**
     * 编辑永续合约
     * @param PerpetualContractEdit $request
     * @return array
     * @throws \Throwable
     */
    public function edit(PerpetualContractEdit $request): array
    {
        $id        = $request->get('id');
        $edit_data = $request->except('id');
        DB::beginTransaction();
        try {
            PerpetualContract::EditData(['id' => $id], $edit_data);
            AdminOperationLog::Info($request, "编辑了一条永续合约,ID为{$id}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "编辑永续合约失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 获取币种信息列表
     * @param Request $request
     * @return array
     */
    public function get_currency(Request $request): array
    {
        $list = Currency::leftJoin('trading_pair', function ($join) {
            $join->on('currency.trading_pair_id', '=', 'trading_pair.id');
        })
            ->select(['currency.id', 'currency.name', 'trading_pair.name as trading_pair_name'])
            ->get();
        return Response::success($list);
    }

    /**
     * 获取单条永续合约信息
     * @param Id $request
     * @return array
     */
    public function get_one(Id $request): array
    {
        $id   = $request->get('id');
        $data = PerpetualContract::getOne(['id' => $id]);
        return Response::success($data);

    }

    /**
     * 永续合约列表
     * @param Request $request
     * @return array
     */
    public function list(Request $request): array
    {
        $limit = $request->get('limit', 10);
        $list  = PerpetualContract::getPaginate([], [], $limit);
        return Response::success($list);
    }
}
