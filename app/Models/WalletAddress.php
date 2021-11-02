<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\WalletAddress
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property string $email 用户邮箱
 * @property string $name 地址名称
 * @property int $pact 协议： 1-OMNI 2-ERC20 3-TRC20
 * @property string $address 提币地址
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|WalletAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletAddress newQuery()
 * @method static \Illuminate\Database\Query\Builder|WalletAddress onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletAddress whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletAddress whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletAddress whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletAddress whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletAddress wherePact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletAddress whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|WalletAddress withTrashed()
 * @method static \Illuminate\Database\Query\Builder|WalletAddress withoutTrashed()
 * @mixin \Eloquent
 */
class WalletAddress extends Base
{
    use SoftDeletes;

    //表名
    protected $table = 'wallet_address';
    //主键
    protected $primaryKey = 'id';
    //过滤黑名单字段
    public $guarded = [];
}
