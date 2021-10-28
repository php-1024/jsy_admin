<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CurrencyAdd;
use App\Http\Requests\Admin\CurrencyEdit;
use App\Http\Requests\Admin\CurrencyGet;
use App\Library\Response;
use App\Models\AdminOperationLog;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    /**
     * 添加币种
     * @param CurrencyAdd $request
     * @return array
     * @throws \Throwable
     */
    public function add(CurrencyAdd $request): array
    {
        $add_data = $request->all();
        DB::beginTransaction();
        try {
            if (is_array($add_data['type'])) {
                $add_data['type'] = implode(',', $add_data['type']);
            }
            $Currency = Currency::AddData($add_data);
            AdminOperationLog::Info($request, "添加了一个币种，id为{$Currency['id']}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "添加币种失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 编辑币种
     * @param CurrencyEdit $request
     * @return array
     * @throws \Throwable
     */
    public function edit(CurrencyEdit $request): array
    {
        $id        = $request->get('id');
        $edit_data = $request->except('id');
        DB::beginTransaction();
        try {
            if (is_array($edit_data['type'])) {
                $edit_data['type'] = implode(',', $edit_data['type']);
            }
            Currency::EditData(['id' => $id], $edit_data);
            AdminOperationLog::Info($request, "编辑了一条币种信息,ID为{$id}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "编辑币种信息失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 获取币种信息
     * @param CurrencyGet $request
     * @return array
     */
    public function get(CurrencyGet $request): array
    {
        $id       = $request->get('id');
        $currency = Currency::getOne(['id' => $id]);
        return Response::success($currency);
    }


    /**
     * 获取数据列表
     * @param Request $request
     * @return array
     */
    public function list(Request $request): array
    {
        $list             = Currency::getList([]);
        $transaction_show = [
            [
                'id'   => 1,
                'name' => '币币交易',
            ], [
                'id'   => 2,
                'name' => '永续合约',
            ], [
                'id'   => 3,
                'name' => '期权合约',
            ]
        ];
        foreach ($list as $key => $val) {
            $result                       = array_filter($transaction_show, function ($data) use ($val) {
                if (in_array($data['id'], explode(',', $val['type']))) {
                    return true;
                }
            });
            $list[$key]['type_data'] = $result;
            $list[$key]['fluctuation']    = [$val['fluctuation_min'], $val['fluctuation_max']];
        }
        return Response::success($list);
    }
}
