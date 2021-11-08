<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TradingPairAdd;
use App\Library\Response;
use App\Models\AdminOperationLog;
use App\Models\Currency;
use App\Models\TradingPair;
use App\Models\User;
use App\Models\UsersWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TradingPairController extends Controller
{
    // 生成钱包信息
    public function generate_wallet(Request $request)
    {
        $limit = $request->get('limit');
        $data  = TradingPair::get()->toArray();
        $users = User::getPaginate([], [], $limit, 'id', 'asc');
        $num   = 0;
        foreach ($data as $val) {
            foreach ($users as $vv) {
                // 检查该用户是否存在该交易对钱包信息，如果存在则则跳过
                if (!UsersWallet::checkRowExists([
                    'user_id'           => $vv['id'],
                    'type'              => '1',
                    'trading_pair_id'   => $val['id'],
                    'trading_pair_name' => $val['name']
                ])) {
                    // 创建类型一的钱包
                    UsersWallet::AddData([
                        'user_id'           => $vv['id'],
                        'type'              => '1',
                        'trading_pair_id'   => $val['id'],
                        'trading_pair_name' => $val['name']
                    ]);
                    $num++;
                }
                if (!UsersWallet::checkRowExists([
                    'user_id'           => $vv['id'],
                    'type'              => '2',
                    'trading_pair_id'   => $val['id'],
                    'trading_pair_name' => $val['name']
                ])) {
                    // 创建类型二的钱包
                    UsersWallet::AddData([
                        'user_id'           => $vv['id'],
                        'type'              => '2',
                        'trading_pair_id'   => $val['id'],
                        'trading_pair_name' => $val['name']
                    ]);
                    $num++;
                }
            }
        }
        dump("本次生成了 {$num} 个钱包信息");
    }

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
            // 添加数据
            $trading_pair = TradingPair::AddData($add_data, $add_data);
            // 查询用户
            $users = User::getPluck();
            // 为所有用户创建对应交易对钱包
            foreach ($users as $user_id) {
                // 检查该用户是否存在该交易对钱包信息，如果存在则则跳过
                if (!UsersWallet::checkRowExists([
                    'user_id'           => $user_id,
                    'type'              => '1',
                    'trading_pair_id'   => $trading_pair['id'],
                    'trading_pair_name' => $trading_pair['name']
                ])) {
                    // 创建类型一的钱包
                    UsersWallet::AddData([
                        'user_id'           => $user_id,
                        'type'              => '1',
                        'trading_pair_id'   => $trading_pair['id'],
                        'trading_pair_name' => $trading_pair['name']
                    ]);
                }
                if (!UsersWallet::checkRowExists([
                    'user_id'           => $user_id,
                    'type'              => '2',
                    'trading_pair_id'   => $trading_pair['id'],
                    'trading_pair_name' => $trading_pair['name']
                ])) {
                    // 创建类型二的钱包
                    UsersWallet::AddData([
                        'user_id'           => $user_id,
                        'type'              => '2',
                        'trading_pair_id'   => $trading_pair['id'],
                        'trading_pair_name' => $trading_pair['name']
                    ]);
                }
            }
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
