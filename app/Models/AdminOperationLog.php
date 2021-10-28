<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;


/**
 * App\Models\AdminOperationLog
 *
 * @property int $id 主键id
 * @property int $account_id 登录ID
 * @property string|null $token token
 * @property string|null $headers headers
 * @property string|null $ip ip
 * @property string|null $path 请求路径
 * @property string|null $data 发送数据
 * @property string $content 操作记录
 * @property string|null $abnormal 异常信息
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminOperationLog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereAbnormal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereHeaders($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|AdminOperationLog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdminOperationLog withoutTrashed()
 * @mixin \Eloquent
 */
class AdminOperationLog extends Base
{
    use SoftDeletes;

    // 表名
    protected $table = 'admin_operation_log';
    // 主键
    protected $primaryKey = 'id';
    //过滤黑名单字段
    public $guarded = [];


    /**
     * 添加日志
     * @param int $account_id
     * @param string $content
     * @param string $abnormal
     * @return array|false
     */
    public static function Info(Request $request, string $content = '', string $abnormal = '')
    {
        $data = [
            'account_id' => (string)$request->get('info')['id'],
            'content' => $content,
            'token' => (string)$request->get('info')['token'],
            'headers' => json_encode($request->headers->all()),
            'ip' => (string)$request->ip(),
            'path' => $request->path(),
            'data' => json_encode($request->all()),
            'abnormal' => $abnormal,
        ];
        $res = self::create($data);
        if (!empty($res)) {
            return $res->toArray();
        } else {
            return false;
        }
    }
}
