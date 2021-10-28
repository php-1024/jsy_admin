<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Help
 *
 * @property int $id 主键id
 * @property string|null $title 标题
 * @property int|null $category_id 分类
 * @property string|null $language 语言：1-繁体 2-英文 3-日文 4-韩语 5 西班牙语
 * @property int $sort 排序
 * @property string|null $is_hidden 显示：0-否 1-是
 * @property string $content 内容
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|Help newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Help newQuery()
 * @method static \Illuminate\Database\Query\Builder|Help onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Help query()
 * @method static \Illuminate\Database\Eloquent\Builder|Help whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Help whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Help whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Help whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Help whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Help whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Help whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Help whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Help whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Help whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Help withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Help withoutTrashed()
 * @mixin \Eloquent
 */
class Help extends Base
{
    use SoftDeletes;

    // 表名
    protected $table = 'help';
    // 主键
    protected $primaryKey = 'id';
    // 过滤黑名单字段
    public $guarded = [];
}
