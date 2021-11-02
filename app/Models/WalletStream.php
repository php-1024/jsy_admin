<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\WalletStream
 *
 * @property int $id
 * @property int|null $trading_pair_id 交易对ID
 * @property string|null $trading_pair_name 交易对名称
 * @property int $user_id 用户id
 * @property string $email 用户邮箱
 * @property string $amount 流转金额
 * @property string $amount_before 流转前的余额
 * @property string $amount_after 流转后的余额
 * @property string $way 流转方式 1 收入 2 支出
 * @property string $type 流转类型 1 币币交易 2 永续合约 3 期权合约 4 申购交易 5 划转 6 充值 7 提现 8 冻结
 * @property string|null $type_detail 流转详细类型 0 提现 1 USDT充值  2 银行卡充值  3 币币交易手续费  4 永续合约手续费  5 期权合约手续费  6 币币账户划转到合约账户  7 合约账户划转到币币账户  8 申购冻结  9 币币交易  10 永续合约  11 期权合约
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream newQuery()
 * @method static \Illuminate\Database\Query\Builder|WalletStream onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream query()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereAmountAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereAmountBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereTradingPairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereTradingPairName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereTypeDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletStream whereWay($value)
 * @method static \Illuminate\Database\Query\Builder|WalletStream withTrashed()
 * @method static \Illuminate\Database\Query\Builder|WalletStream withoutTrashed()
 * @mixin \Eloquent
 */
class WalletStream extends Base
{
    use SoftDeletes;

    //表名
    protected $table = 'wallet_stream';
    //主键
    protected $primaryKey = 'id';
    //过滤黑名单字段
    public $guarded = [];
}
