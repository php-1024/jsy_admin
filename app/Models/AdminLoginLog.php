<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\AdminLoginLog
 *
 * @property int $id 主键id
 * @property int $account_id 登录ID
 * @property string $account 登录账号
 * @property string $token 登录凭证
 * @property string $ip 登录IP
 * @property string|null $address 登录地址
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminLoginLog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|AdminLoginLog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdminLoginLog withoutTrashed()
 * @mixin \Eloquent
 */
class AdminLoginLog extends Base
{
    use SoftDeletes;
    // 表名
    protected $table = 'admin_login_log';
    // 主键
    protected $primaryKey = 'id';
    //过滤黑名单字段
    public $guarded = [];

}
