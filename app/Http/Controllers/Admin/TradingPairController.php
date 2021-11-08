<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TradingPairAdd;
use App\Library\Response;
use App\Models\AdminOperationLog;
use App\Models\TradingPair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TradingPairController extends Controller
{
    /**
     * 添加交易对
     * @param TradingPairAdd $request
     * @return array
     * @throws \Throwable
     */
    public function add(TradingPairAdd $request): array
    {
        $add_data = $request->all();
        if (TradingPair::checkRowExists(['name' => $add_data['name']])) {
            return Response::error([], ErrorCode::MLG_Error, "该交易对已经存在，请换个名称");
        }
        DB::beginTransaction();
        try {
            // 查询钱包

            // 添加数据
            $trading_pair = TradingPair::AddData($add_data, $add_data);
            AdminOperationLog::Info($request, "添加了交易对ID{$trading_pair['id']}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "添加交易对失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success(['trading_pair' => $trading_pair]);
    }

    /**
     * 获取交易对列表
     * @param Request $request
     * @return array
     */
    public function list(Request $request): array
    {
        $list = TradingPair::getList([], ['id', 'name']);
        return Response::success($list);
    }
}
