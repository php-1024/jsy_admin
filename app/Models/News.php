<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\News
 *
 * @property int $id 主键id
 * @property string|null $title 标题
 * @property string|null $language 语言：1-繁体 2-英文 3-日文 4-韩语 5 西班牙语
 * @property int $sort 排序
 * @property string|null $is_hidden 显示：0-否 1-是
 * @property string $content 内容
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Query\Builder|News onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|News withTrashed()
 * @method static \Illuminate\Database\Query\Builder|News withoutTrashed()
 * @mixin \Eloquent
 */
class News extends Base
{
    use HasFactory, SoftDeletes;

    // 表名
    protected $table = 'news';
    // 主键
    protected $primaryKey = 'id';
    // 过滤黑名单字段
    public $guarded = [];
}
