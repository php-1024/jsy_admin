<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\AdminMenus
 *
 * @property int $id 主键id
 * @property string $is_hidden 是否显示 0否 1是
 * @property string $type 类型，1目录  2菜单 3按钮 4接口
 * @property int $parent_id 父级id
 * @property string $icon 菜单图标，按钮图标为空
 * @property int $sort 排序值，数字越大越后面
 * @property string $name 菜单name
 * @property string $cname 菜单中文名
 * @property string $path_views 路径
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminMenus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus whereCname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus wherePathViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMenus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|AdminMenus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdminMenus withoutTrashed()
 * @mixin \Eloquent
 */
class AdminMenus extends Base
{
    use SoftDeletes;

    // 表名
    protected $table = 'admin_menus';
    // 主键
    protected $primaryKey = 'id';
    //过滤黑名单字段
    public $guarded = [];


    //获取列表数据
    public static function getList($where = [], $whereIn = [], $field = [], $offset = 0, $limit = 0, $orderby = "", $sort = 'DESC')
    {
        if (empty($field)) {
            $field = '*';
        }
        $model = self::select($field);
        if (!empty($where)) {
            $model = $model->where($where);
        }
        if (!empty($whereIn)) {
            $model = $model->whereIn('id', $whereIn);
        }
        if (!empty($orderby)) {
            $model = $model->orderBy($orderby, $sort);
        }
        if (!empty($offset)) {
            $model = $model->offset($offset);
        }
        if (!empty($limit)) {
            $model = $model->limit($limit);
        }
        $res = $model->get();

        if (!empty($res)) {
            return $res->toArray();
        } else {
            return false;
        }
    }

}
