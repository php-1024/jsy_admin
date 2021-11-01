<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\ApplyBuySetup
 *
 * @property int $id 主键id
 * @property string $name 币种名称
 * @property int|null $trading_pair_id 交易对ID
 * @property string|null $trading_pair_name 交易对名称
 * @property string $ratio 购买比例
 * @property string $estimated_time 预计上线时间
 * @property string $start_time 开始申购时间
 * @property string $end_time 结束申购时间
 * @property string|null $code 申购码
 * @property int|null $code_status 申购码开关  0 关闭 1 开启
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup newQuery()
 * @method static \Illuminate\Database\Query\Builder|ApplyBuySetup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereCodeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereEstimatedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereTradingPairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereTradingPairName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ApplyBuySetup withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ApplyBuySetup withoutTrashed()
 * @mixin \Eloquent
 */
class ApplyBuySetup extends Base
{
    use SoftDeletes;

    //表名
    protected $table = 'apply_buy_setup';
    //主键
    protected $primaryKey = 'id';
    //过滤黑名单字段
    public $guarded = [];
}
