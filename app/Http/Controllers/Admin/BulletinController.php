<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerDel;
use App\Http\Requests\Admin\BannerEdit;
use App\Http\Requests\Admin\BulletinAdd;
use App\Http\Requests\Admin\BulletinDel;
use App\Http\Requests\Admin\BulletinEdit;
use App\Library\Response;
use App\Models\AdminOperationLog;
use App\Models\Banner;
use App\Models\Bulletins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BulletinController extends Controller
{

    /**
     * 添加公告
     * @param BulletinAdd $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 20:00
     */
    public function add(BulletinAdd $request): array
    {
        $content = $request->get('content');
        if (count($content) != 5) {
            return Response::error([], ErrorCode::Vl_Error, '五种语言缺一不可');
        }
        $add_data = [
            'content_1' => $content[0],
            'content_2' => $content[1],
            'content_3' => $content[2],
            'content_4' => $content[3],
            'content_5' => $content[4],
        ];
        DB::beginTransaction();
        try {
            $bulletins = Bulletins::AddData($add_data);
            AdminOperationLog::Info($request, "添加了一条公告,ID为{$bulletins['id']}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "添加公告失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }


    /**
     * 删除公告
     * @param BulletinDel $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 20:01
     */
    public function del(BulletinDel $request): array
    {
        $id = $request->get('id');
        DB::beginTransaction();
        try {
            $tips = "";
            if (is_numeric($id)) {
                $tips = $id;
                Bulletins::selected_delete(['id' => $id]);
            }
            if (is_array($id)) {
                $tips = implode(',', $id);
                foreach ($id as $val) {
                    Bulletins::selected_delete(['id' => $val]);
                }
            }
            AdminOperationLog::Info($request, "删除了一条公告,ID为{$tips}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "删除公告失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }


    /**
     * 编辑公告
     * @param BulletinEdit $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 20:02
     */
    public function edit(BulletinEdit $request): array
    {
        $id      = $request->get('id');
        $content = $request->get('content');
        if (count($content) != 5) {
            return Response::error([], ErrorCode::Vl_Error, '五种语言缺一不可');
        }
        $edit_data = [
            'content_1' => $content[0],
            'content_2' => $content[1],
            'content_3' => $content[2],
            'content_4' => $content[3],
            'content_5' => $content[4],
        ];
        DB::beginTransaction();
        try {
            Bulletins::EditData(['id' => $id], $edit_data);
            AdminOperationLog::Info($request, "编辑了一条公告,ID为{$id}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "编辑公告失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 获取公告信息
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 20:03
     */
    public function get(Request $request): array
    {
        $id        = $request->get('id');
        $bulletins = Bulletins::getOne(['id' => $id]);
        return Response::success($bulletins);
    }

    /**
     * 获取公告列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 20:03
     */
    public function list(Request $request): array
    {
        $limit = $request->get('limit', 10);
        $list  = Bulletins::getPaginate('', '0', $limit, 'id', 'asc');
        return Response::success(['list' => $list]);
    }
}
