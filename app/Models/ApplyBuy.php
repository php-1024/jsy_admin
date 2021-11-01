<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\ApplyBuy
 *
 * @property int $id 主键id
 * @property string $email 申购用户
 * @property int $get_currency_id 购买币种id
 * @property string|null $get_currency_name 购买币种名称
 * @property int $get_currency_num 购买数量
 * @property int|null $trading_pair_id 交易对ID
 * @property string|null $trading_pair_name 交易对名称
 * @property string $ratio 购买比例
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy newQuery()
 * @method static \Illuminate\Database\Query\Builder|ApplyBuy onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereGetCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereGetCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereGetCurrencyNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereTradingPairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereTradingPairName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ApplyBuy withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ApplyBuy withoutTrashed()
 * @mixin \Eloquent
 */
class ApplyBuy extends Base
{
    use SoftDeletes;

    //表名
    protected $table = 'apply_buy';
    //主键
    protected $primaryKey = 'id';
    //过滤黑名单字段
    public $guarded = [];
}
