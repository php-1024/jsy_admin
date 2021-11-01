<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerDel;
use App\Http\Requests\Admin\BannerEdit;
use App\Http\Requests\Admin\HelpAdd;
use App\Http\Requests\Admin\HelpDel;
use App\Http\Requests\Admin\HelpEdit;
use App\Library\Response;
use App\Models\AdminOperationLog;
use App\Models\Help;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelpController extends Controller
{

    /**
     * 添加帮助
     * @param HelpAdd $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 21:21
     */
    public function add(HelpAdd $request): array
    {
        $info     = $request->get('info');
        $add_data = [
            'title'       => $request->get('title'),
            'category_id' => $request->get('category_id'),
            'language'    => $request->get('language'),
            'sort'        => $request->get('sort') ?? 0,
            'is_hidden'   => $request->get('is_hidden') ?? 0,
            'content'     => $request->get('content'),
        ];
        DB::beginTransaction();
        try {
            $help = Help::AddData($add_data);
            AdminOperationLog::Info($request, "添加了一条帮助,ID为{$help['id']}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "添加帮助失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }


    /**
     * 删除帮助
     * @param HelpDel $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 21:30
     */
    public function del(HelpDel $request): array
    {
        $id = $request->get('id');
        DB::beginTransaction();
        try {
            $tips = "";
            if (is_numeric($id)) {
                $tips = $id;
                Help::selected_delete(['id' => $id]);
            }
            if (is_array($id)) {
                $tips = implode(',', $id);
                foreach ($id as $val) {
                    Help::selected_delete(['id' => $val]);
                }
            }
            AdminOperationLog::Info($request, "删除了一条帮助,ID为{$tips}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "删除帮助失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 编辑帮助
     * @param HelpEdit $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 21:31
     */
    public function edit(HelpEdit $request): array
    {
        $id        = $request->get('id');
        $edit_data = [
            'title'       => $request->get('title'),
            'category_id' => $request->get('category_id'),
            'language'    => $request->get('language'),
            'sort'        => $request->get('sort') ?? 0,
            'is_hidden'   => $request->get('is_hidden') ?? 0,
            'content'     => $request->get('content'),
        ];
        DB::beginTransaction();
        try {
            Help::EditData(['id' => $id], $edit_data);
            AdminOperationLog::Info($request, "编辑了一条帮助,ID为{$id}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "编辑帮助失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 获取帮助信息
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 21:32
     */
    public function get(Request $request): array
    {
        $id   = $request->get('id');
        $help = Help::getOne(['id' => $id]);
        return Response::success(['help' => $help]);
    }

    /**
     * 获取帮助列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 21:32
     */
    public function list(Request $request): array
    {
        $limit = $request->get('limit', 10);
        $list  = Help::getPaginate('', '0', $limit, 'id', 'asc');
        return Response::success(['list' => $list]);
    }
}
