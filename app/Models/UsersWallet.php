<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * App\Models\UsersWallet
 *
 * @property int $id 主键id
 * @property int $user_id 用户id
 * @property int $trading_pair_id 币种id
 * @property string|null $trading_pair_name 交易对名称
 * @property string|null $address 钱包地址
 * @property int $status 0正常 1锁定
 * @property string $available 可用
 * @property string $freeze 冻结
 * @property string $total_assets 总资产
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet newQuery()
 * @method static \Illuminate\Database\Query\Builder|UsersWallet onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet whereAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet whereFreeze($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet whereTotalAssets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet whereTradingPairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet whereTradingPairName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersWallet whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|UsersWallet withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UsersWallet withoutTrashed()
 * @mixin \Eloquent
 */
class UsersWallet extends Base
{
    use HasFactory, SoftDeletes;

    // 表名
    protected $table = 'users_wallet';
    // 主键
    protected $primaryKey = 'id';
    // 过滤黑名单字段
    public $guarded = [];
}
