<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ApplyBuySetupValidate;
use App\Http\Requests\Admin\Id;
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
     * 新建申购币种
     * @param ApplyBuySetupValidate $request
     * @return array
     * @throws \Throwable
     */
    public function add(ApplyBuySetupValidate $request): array
    {
        $params = $request->all();
        if (ApplyBuySetup::checkRowExists(['name' => $params['name']])) {
            return Response::error([], ErrorCode::MLG_Error, '申购币种名称已存在');
        }
        if ($params['code_status']) {
            if (strlen($params['code']) <= 0) {
                return Response::error([], ErrorCode::MLG_Error, '请设置申购码');
            }
        }
        DB::beginTransaction();
        try {
            $data = [
                'name'           => $params['name'],// 币种名称
                'issue_price'    => $params['issue_price'],// 发行价
                'estimated_time' => $params['estimated_time'],// 预计上线时间
                'start_time'     => $params['start_time'],// 开始申购时间
                'end_time'       => $params['end_time'],// 结束申购时间
                'code_status'    => $params['code_status'],// 申购码开关  0 关闭 1 开启
                'code'           => $params['code'],// 申购码
                'detail'         => $params['code'],// 项目详情
                'status'         => "0",// 币种状态  0 关闭 1 开启
            ];
            ApplyBuySetup::AddData($data);
            AdminOperationLog::Info($request, "申购币种创建成功");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "申购币种创建失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error, $e->getMessage());
        }
        return Response::success();
    }

    /**
     * 编辑申购币种
     * @param ApplyBuySetupValidate $request
     * @return array
     * @throws \Throwable
     */
    public function edit(ApplyBuySetupValidate $request): array
    {
        $params = $request->except('id');
        $id     = $request->get('id');
        $check  = ApplyBuySetup::getOne(['name' => $params['name']]);
        if (!strlen($id)) {
            return Response::error([], ErrorCode::MLG_Error, '请选择要编辑的币种，id未传输');
        }
        if ($params['code_status']) {
            return Response::error([], ErrorCode::MLG_Error, '请设置申购码');
        }
        if ($check && $id != $check['id']) {
            return Response::error([], ErrorCode::MLG_Error, '申购币种名称已存在，请重新设置其他名称');
        }
        DB::beginTransaction();
        try {
            $data = [
                'name'           => $params['name'],// 币种名称
                'issue_price'    => $params['issue_price'],// 发行价
                'estimated_time' => $params['estimated_time'],// 预计上线时间
                'start_time'     => $params['start_time'],// 开始申购时间
                'end_time'       => $params['end_time'],// 结束申购时间
                'code_status'    => $params['code_status'],// 申购码开关  0 关闭 1 开启
                'code'           => $params['code'],// 申购码
                'detail'         => $params['code'],// 项目详情
                'status'         => "0",// 币种状态  0 关闭 1 开启
            ];
            ApplyBuySetup::EditData(['id' => $id], $data);
            AdminOperationLog::Info($request, "申购币种编辑成功");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "申购币种编辑失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error, $e->getMessage());
        }
        return Response::success();
    }


    /**
     * 删除申购币种
     * @param Id $request
     * @return array[]|void
     * @throws \Throwable
     */
    public function del(Id $request)
    {
        $id = $request->get('id');
        DB::beginTransaction();
        try {
            ApplyBuySetup::selected_delete(['id' => $id]);
            AdminOperationLog::Info($request, "申购币种删除成功：{$id}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "申购币种删除失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error, $e->getMessage());
        }
        return Response::success();
    }


    /**
     * 申购币种状态修改
     * @param Id $request
     * @return array[]|void
     * @throws \Throwable
     */
    public function status(Id $request)
    {
        $id            = $request->get('id');
        $where         = ['id' => $id];
        $ApplyBuySetup = ApplyBuySetup::getOne($where);
        DB::beginTransaction();
        try {
            if ($ApplyBuySetup['status']) {
                ApplyBuySetup::EditData($where, ['status' => '0']);
            } else {
                ApplyBuySetup::EditData($where, ['status' => '1']);
            }
            AdminOperationLog::Info($request, "申购币种：{$id} 的状态变更了");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "申购币种状态修改失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error, $e->getMessage());
        }
        return Response::success();
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
     * 获取申购配置信息
     * @param Id $request
     * @return array
     */
    public function get(Id $request): array
    {
        $id     = $request->get('id');
        $result = ApplyBuySetup::getOne(['id' => $id]);
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
        $list  = ApplyBuySetup::getPaginate([], [], $limit);
        return Response::success($list);
    }
}
