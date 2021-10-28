<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Currency
 *
 * @property int $id 主键id
 * @property string $name 名称
 * @property int $trading_pair_id 交易对
 * @property string $k_line_code K线图代码
 * @property int $decimal_scale 自有币位数
 * @property string|null $type 交易显示：（币币交易，永续合约，期权合约）
 * @property int $sort 排序
 * @property int $is_hidden 是否展示：0-否，1-展示
 * @property string $fluctuation_min 行情波动值（小）
 * @property string $fluctuation_max 行情波动值（大）
 * @property string $fee_currency_currency 币币交易手续费%
 * @property string $fee_perpetual_contract 永续合约手续费%
 * @property string $fee_option_contract 期权合约手续费%
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Query\Builder|Currency onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereDecimalScale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereFeeCurrencyCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereFeeOptionContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereFeePerpetualContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereFluctuationMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereFluctuationMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereKLineCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereTradingPairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Currency withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Currency withoutTrashed()
 * @mixin \Eloquent
 */
class Currency extends Base
{
    use HasFactory, SoftDeletes;

    // 表名
    protected $table = 'currency';
    // 主键
    protected $primaryKey = 'id';
    // 过滤黑名单字段
    public $guarded = [];
}
