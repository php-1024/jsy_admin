<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsAdd;
use App\Http\Requests\Admin\NewsDel;
use App\Http\Requests\Admin\NewsEdit;
use App\Library\Response;
use App\Models\AdminOperationLog;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * 添加新闻
     * @param NewsAdd $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/7 19:12
     */
    public function add(NewsAdd $request): array
    {
        $info     = $request->get('info');
        $add_data = [
            'title'     => $request->get('title'),
            'language'  => $request->get('language'),
            'sort'      => $request->get('sort') ?? 0,
            'is_hidden' => $request->get('is_hidden') ?? 0,
            'content'   => $request->get('content'),
        ];
        DB::beginTransaction();
        try {
            $news = News::AddData($add_data);
            AdminOperationLog::Info($request, "添加了一条新闻,ID为{$news['id']}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "添加新闻失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }


    /**
     * 删除新闻
     * @param NewsDel $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/7 19:13
     */
    public function del(NewsDel $request): array
    {
        $id = $request->get('id');
        DB::beginTransaction();
        try {
            $tips = "";
            if (is_numeric($id)) {
                $tips = $id;
                News::selected_delete(['id' => $id]);
            }
            if (is_array($id)) {
                $tips = implode(',', $id);
                foreach ($id as $val) {
                    News::selected_delete(['id' => $val]);
                }
            }
            AdminOperationLog::Info($request, "删除了一条新闻,ID为{$tips}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "删除新闻失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 编辑新闻
     * @param NewsEdit $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/7 19:14
     */
    public function edit(NewsEdit $request): array
    {
        $id        = $request->get('id');
        $edit_data = [
            'title'     => $request->get('title'),
            'language'  => $request->get('language'),
            'sort'      => $request->get('sort') ?? 0,
            'is_hidden' => $request->get('is_hidden') ?? 0,
            'content'   => $request->get('content'),
        ];
        DB::beginTransaction();
        try {
            News::EditData(['id' => $id], $edit_data);
            AdminOperationLog::Info($request, "编辑了一条新闻,ID为{$id}");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            AdminOperationLog::Info($request, "编辑新闻失败", $e->getMessage());
            return Response::error([], ErrorCode::MLG_Error);
        }
        return Response::success();
    }

    /**
     * 获取新闻信息
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 21:32
     */
    public function get(Request $request): array
    {
        $id   = $request->get('id');
        $news = News::getOne(['id' => $id]);
        return Response::success(['news' => $news]);
    }

    /**
     * 获取新闻列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/6 21:32
     */
    public function list(Request $request): array
    {
        $limit = $request->get('limit', 10);
        $list  = News::getPaginate('', '0', $limit, 'id', 'asc');
        return Response::success(['list' => $list]);
    }
}
