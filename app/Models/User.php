<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * App\Models\User
 *
 * @property int $id 主键id
 * @property string|null $language 语言：1-繁体 2-英文 3-日文 4-韩语 5 西班牙语
 * @property string $is_agent 是否代理： 0：不是   1：是
 * @property string|null $email 邮箱
 * @property string|null $nickname 昵称
 * @property string|null $password 登录密码
 * @property string|null $pay_password 支付密码
 * @property int|null $user_level 用户层级
 * @property string|null $user_path 用户关系
 * @property int|null $partner_level 合伙人等级
 * @property string|null $agent_dividend 代理红利
 * @property string|null $share_code 用户邀请码，每个用户唯一
 * @property int|null $risk_profit 风控概率
 * @property string|null $last_login_ip 登录IP
 * @property string $status 状态： 0正常 1，已锁定
 * @property string|null $lock_time 锁定时间
 * @property string|null $login_time 登录时间
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAgentDividend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLockTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePartnerLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePayPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRiskProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereShareCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserPath($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @mixin \Eloquent
 * @property int $parent_id 上级用户id
 * @method static \Illuminate\Database\Eloquent\Builder|User whereParentId($value)
 */
class User extends Base
{
    use HasFactory, SoftDeletes;

    // 表名
    protected $table = 'user';
    // 主键
    protected $primaryKey = 'id';
    // 过滤黑名单字段
    public $guarded = [];

//    /**
//     * @param $agent_dividend
//     * @return string
//     */
//    public function getAgentDividendAttribute($agent_dividend)
//    {
//        if ($agent_dividend) {
//            return $agent_dividend . "%";
//        } else {
//            return "0%";
//        }
//    }
    // 代理后台获取分页获取数据
    public static function getAgentPaginate($where = [], $field = [], $paginate = 1, $orderby = "", $sort = "DESC")
    {
        if (empty($field)) {
            $field = '*';
        }
        $model = self::select($field);
        if (!empty($where)) {
            $model = $model->where($where);
        }
        if (!empty($orderby)) {
            $model = $model->orderBy($orderby, $sort);
        }
        if (is_array($paginate)) {
            // 自定义分页
            $res = $model->paginate($paginate['limit'], $paginate['page']);
        } else {
            // 默认分页
            $res = $model->paginate($paginate);
        }
        if (!empty($res)) {
            return $res;
        } else {
            return false;
        }
    }


    // 获取代理列表数据
    public static function getAgentList($where = [], $like = [], $field = [], $offset = 0, $limit = 0, $orderby = "", $sort = 'DESC')
    {
        if (empty($field)) {
            $field = '*';
        }
        $model = self::select($field);
        if (!empty($where)) {
            $model = $model->where($where);
        }
        if (!empty($like)) {
            foreach ($like as $key => $val) {
                $model = $model->where($key, 'like', "%{$val}%");
            }
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
