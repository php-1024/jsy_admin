<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\PerpetualContractTransaction
 *
 * @property int $id 主键id
 * @property int $user_id 用户id
 * @property string|null $email 用户邮箱
 * @property string $order_number 订单号
 * @property int $currency_id 币种
 * @property string|null $currency_name 币种名称 例如：BTC/USDT（币种/交易对）
 * @property int|null $trading_pair_id 交易对id
 * @property string|null $trading_pair_name 交易对名称
 * @property string $k_line_code K线图代码
 * @property string $order_type 订单类型：1-限价 2-市价
 * @property string|null $limit_price 当前限价
 * @property string $transaction_type 交易类型：1-开多 2-开空
 * @property string|null $entrust_num 委托量
 * @property string|null $entrust_price 委托价格
 * @property string|null $ensure_amount 保证金
 * @property string $handle_fee 手续费，单位百分比
 * @property int $hand_num 手数值
 * @property int $multiple 倍数值
 * @property string $price 交易金额
 * @property string|null $income 最终收益
 * @property string $status 状态：0 交易中 1 已完成 2 已撤单
 * @property string|null $remark 备注
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|PerpetualContractTransaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereEnsureAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereEntrustNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereEntrustPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereHandNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereHandleFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereIncome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereKLineCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereLimitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereMultiple($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereTradingPairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereTradingPairName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereTransactionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContractTransaction whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|PerpetualContractTransaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PerpetualContractTransaction withoutTrashed()
 * @mixin \Eloquent
 */
class PerpetualContractTransaction extends Base
{
    use HasFactory, SoftDeletes;

    // 表名
    protected $table = 'perpetual_contract_transaction';
    // 主键
    protected $primaryKey = 'id';
    // 过滤黑名单字段
    public $guarded = [];
}
