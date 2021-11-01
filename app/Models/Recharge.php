<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Recharge
 *
 * @property int $id
 * @property int|null $user_id 用户id
 * @property string|null $email 用户邮箱
 * @property string|null $address 充币地址
 * @property int|null $type 币链类型：1-OMNI  2-ERC20  3-TRC20
 * @property int|null $trading_pair_id 充值的交易对id
 * @property string|null $trading_pair_name 充值的交易对name
 * @property string|null $recharge_num 充值数量
 * @property string|null $status 状态：0-未确认：1-已确认
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge newQuery()
 * @method static \Illuminate\Database\Query\Builder|Recharge onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge query()
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge whereRechargeNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge whereTradingPairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge whereTradingPairName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recharge whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Recharge withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Recharge withoutTrashed()
 * @mixin \Eloquent
 */
class Recharge extends Base
{
    use SoftDeletes;

    // 表名
    protected $table = 'recharge';
    // 主键
    protected $primaryKey = 'id';
    // 过滤黑名单字段
    public $guarded = [];
}
