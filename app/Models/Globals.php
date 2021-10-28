<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Globals
 *
 * @property int $id 主键id
 * @property string $fields 字段名称
 * @property string|null $value 字段值
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|Globals newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Globals newQuery()
 * @method static \Illuminate\Database\Query\Builder|Globals onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Globals query()
 * @method static \Illuminate\Database\Eloquent\Builder|Globals whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Globals whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Globals whereFields($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Globals whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Globals whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Globals whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|Globals withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Globals withoutTrashed()
 * @mixin \Eloquent
 */
class Globals extends Base
{
    use SoftDeletes;

    //表名
    protected $table = 'globals';
    //主键
    protected $primaryKey = 'id';
    //过滤黑名单字段
    public $guarded = [];
}
