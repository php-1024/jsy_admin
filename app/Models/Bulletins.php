<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Bulletins
 *
 * @property int $id 主键id
 * @property string|null $language 语言：1-繁体 2-英文 3-日文 4-韩语 5 西班牙语
 * @property string $content 公告内容
 * @property string|null $redirect 跳转地址
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins newQuery()
 * @method static \Illuminate\Database\Query\Builder|Bulletins onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereRedirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Bulletins withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Bulletins withoutTrashed()
 * @mixin \Eloquent
 */
class Bulletins extends Base
{
    use SoftDeletes;

    //表名
    protected $table = 'bulletins';
    //主键
    protected $primaryKey = 'id';
    //过滤黑名单字段
    public $guarded = [];
}
