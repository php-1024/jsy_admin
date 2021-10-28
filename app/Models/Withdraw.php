<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Withdraw
 *
 * @property int $id
 * @property int|null $user_id 用户id
 * @property string|null $email 用户邮箱
 * @property string|null $address 提币地址
 * @property int|null $trading_pair_id 提现的交易对id
 * @property string|null $trading_pair_name 提现的交易对name
 * @property int|null $type 币链类型 1-OMNI 2-ERC20 3-TRC20
 * @property string|null $withdraw_num 提现数量
 * @property string|null $handling_fee 手续费
 * @property string|null $actually_arrived 实际到账
 * @property string|null $status 状态：0-未确认：1-已确认 2-已拒绝
 * @property string|null $remark 备注
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw newQuery()
 * @method static \Illuminate\Database\Query\Builder|Withdraw onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw query()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereActuallyArrived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereHandlingFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereTradingPairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereTradingPairName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereWithdrawNum($value)
 * @method static \Illuminate\Database\Query\Builder|Withdraw withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Withdraw withoutTrashed()
 * @mixin \Eloquent
 */
class Withdraw extends Base
{
    use SoftDeletes;

    // 表名
    protected $table = 'withdraw';
    // 主键
    protected $primaryKey = 'id';
    // 过滤黑名单字段
    public $guarded = [];
}
