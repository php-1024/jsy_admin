<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Id;
use App\Http\Requests\Admin\OptionContractAdd;
use App\Http\Requests\Admin\OptionContractEdit;
use App\Library\Response;
use App\Models\AdminOperationLog;
use App\Models\OptionContract;
use App\Models\PerpetualContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OptionContractController extends Controller
{

    /**
     * 添加期权合约
     * @param OptionContractAdd $request
     * @return array
     * @throws \Throwable
     */
    public function add(OptionContractAdd $request): array
    {
        $add_data = $request->all();
        DB::beginTransaction();
        try {
            $option_contract = OptionContract::AddData($add_data);
            AdminOperationLog::Info($request, "添加了一条期权合约,ID为{$option_contract['id']}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "添加期权合约失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success(['option_contract' => $option_contract]);
    }

    /**
     * 编辑期权合约
     * @param OptionContractEdit $request
     * @return array
     * @throws \Throwable
     */
    public function edit(OptionContractEdit $request): array
    {
        $id        = $request->get('id');
        $edit_data = $request->except('id');
        DB::beginTransaction();
        try {
            OptionContract::EditData(['id' => $id], $edit_data);
            AdminOperationLog::Info($request, "编辑了一条期权合约,ID为{$id}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "编辑期权合约失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();

    }


    /**
     * 获取单条期权合约信息
     * @param Id $request
     * @return array
     */
    public function get_one(Id $request): array
    {
        $id   = $request->get('id');
        $data = OptionContract::getOne(['id' => $id]);
        return Response::success($data);
    }

    /**
     * 期权合约列表
     * @param Request $request
     * @return array
     */
    public function list(Request $request): array
    {
        $limit = $request->get('limit', 10);
        $list  = OptionContract::getPaginate([], [], $limit);
        return Response::success($list);
    }
}
