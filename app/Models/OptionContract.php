<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



/**
 * App\Models\OptionContract
 *
 * @property int $id 主键id
 * @property int $seconds 秒数
 * @property int $status 状态:0.禁用,1.启用
 * @property string $profit_ratio 收益率
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract newQuery()
 * @method static \Illuminate\Database\Query\Builder|OptionContract onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract query()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereProfitRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereSeconds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|OptionContract withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OptionContract withoutTrashed()
 * @mixin \Eloquent
 */
class OptionContract extends Base
{
    use HasFactory, SoftDeletes;

    // 表名
    protected $table = 'option_contract';
    // 主键
    protected $primaryKey = 'id';
    // 过滤黑名单字段
    public $guarded = [];
}
