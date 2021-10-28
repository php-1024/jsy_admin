<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\PerpetualContract
 *
 * @property int $id 主键id
 * @property int $currency_id 币种id
 * @property int $type 类型:1.手数,2.倍数
 * @property string $value 值
 * @property int $status 状态:0.禁用,1.启用
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract newQuery()
 * @method static \Illuminate\Database\Query\Builder|PerpetualContract onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract query()
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|PerpetualContract withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PerpetualContract withoutTrashed()
 * @mixin \Eloquent
 */
class PerpetualContract extends Base
{
    use HasFactory, SoftDeletes;

    // 表名
    protected $table = 'perpetual_contract';
    // 主键
    protected $primaryKey = 'id';
    // 过滤黑名单字段
    public $guarded = [];
}
