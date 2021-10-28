<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\TradingPair
 *
 * @property int $id 主键id
 * @property string $name 交易对名称
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair newQuery()
 * @method static \Illuminate\Database\Query\Builder|TradingPair onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair query()
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|TradingPair withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TradingPair withoutTrashed()
 * @mixin \Eloquent
 */
class TradingPair extends Base
{
    use HasFactory, SoftDeletes;

    // 表名
    protected $table = 'trading_pair';
    // 主键
    protected $primaryKey = 'id';
    // 过滤黑名单字段
    public $guarded = [];
}
