<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerAdd;
use App\Http\Requests\Admin\BannerDel;
use App\Http\Requests\Admin\BannerEdit;
use App\Library\Response;
use App\Models\AdminOperationLog;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * 添加banner
     * @param BannerAdd $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 17:20
     */
    public function add(BannerAdd $request): array
    {
        $add_data = [
            'name'     => $request->get('name'),
            'images'   => $request->get('images'),
            'redirect' => $request->get('redirect'),
            'sort'     => $request->get('sort') ?? 0,
            'type'     => $request->get('type'),
        ];
        DB::beginTransaction();
        try {
            $banner = Banner::AddData($add_data);
            AdminOperationLog::Info($request, "添加了一条banner,ID为{$banner['id']}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "添加banner失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();

    }


    /**
     * 删除banner
     * @param BannerDel $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 18:01
     */
    public function del(BannerDel $request): array
    {
        $id = $request->get('id');
        DB::beginTransaction();
        try {
            Banner::selected_delete(['id' => $id]);
            AdminOperationLog::Info($request, "删除了一条banner,ID为{$id}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "删除banner失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 编辑banner
     * @param BannerEdit $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 18:05
     */
    public function edit(BannerEdit $request): array
    {
        $id        = $request->get('id');
        $edit_data = [
            'name'     => $request->get('name'),
            'images'   => $request->get('images'),
            'redirect' => $request->get('redirect'),
            'sort'     => $request->get('sort') ?? 0,
            'type'     => $request->get('type'),
        ];
        DB::beginTransaction();
        try {
            Banner::EditData(['id' => $id], $edit_data);
            AdminOperationLog::Info($request, "编辑了一条banner,ID为{$id}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "编辑banner失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 获取单条banner信息
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 18:09
     */
    public function get(Request $request): array
    {
        $id     = $request->get('id');
        $banner = Banner::getOne(['id' => $id]);
        return Response::success(['banner' => $banner]);
    }

    /**
     * 获取banner列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 18:11
     */
    public function list(Request $request): array
    {
        $list = Banner::getPaginate('', '0', 10, 'id', 'asc');
        return Response::success(['list' => $list]);
    }
}
