<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\CurrencyTransaction
 *
 * @property int $id 主键id
 * @property int $user_id 用户id
 * @property string|null $email 用户邮箱
 * @property string $order_number 订单号
 * @property int $currency_id 币种
 * @property string|null $currency_name 币种名称 例如：BTC/USDT（币种/交易对）
 * @property string|null $entrust_num 委托量
 * @property string $order_type 挂单类型：1-限价 2-市价
 * @property string|null $limit_price 当前限价
 * @property string|null $clinch_num 成交量
 * @property string $transaction_type 订单方向：1-买入 2-卖出
 * @property string $price 挂单价格
 * @property string $status 状态：0 交易中 1 已完成 2 已撤单
 * @property string|null $remark 备注
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|CurrencyTransaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereClinchNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereEntrustNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereLimitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereTransactionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyTransaction whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|CurrencyTransaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CurrencyTransaction withoutTrashed()
 * @mixin \Eloquent
 */
class CurrencyTransaction extends Base
{
    use HasFactory, SoftDeletes;

    // 表名
    protected $table = 'currency_transaction';
    // 主键
    protected $primaryKey = 'id';
    // 过滤黑名单字段
    public $guarded = [];
}
