<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\OptionContractTransaction
 *
 * @property int $id 主键id
 * @property int $user_id 用户id
 * @property string|null $email 用户邮箱
 * @property string $order_number 订单号
 * @property int $option_contract_id 期权合约id
 * @property int $seconds 秒数
 * @property string $profit_ratio 收益率
 * @property string $price 交易金额
 * @property string $buy_price 购买价格
 * @property string $handle_fee 手续费，单位百分比
 * @property string $clinch_price 成交价格
 * @property int $currency_id 购买币种id
 * @property string|null $currency_name 币种名称 例如：BTC/USDT（币种/交易对）
 * @property int|null $trading_pair_id 交易对id
 * @property string|null $trading_pair_name 交易对名称
 * @property string $order_type 订单类型：1-买涨 2-买跌
 * @property int|null $order_result 交割结果：1-涨 2-跌
 * @property string|null $result_profit 预计最终盈利金额
 * @property string $status 状态：0 交易中 1 已完成 2 已撤单
 * @property string|null $remark 备注
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|OptionContractTransaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereBuyPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereClinchPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereHandleFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereOptionContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereOrderResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereProfitRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereResultProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereSeconds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereTradingPairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereTradingPairName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContractTransaction whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|OptionContractTransaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OptionContractTransaction withoutTrashed()
 * @mixin \Eloquent
 */
class OptionContractTransaction extends Base
{
    use HasFactory, SoftDeletes;

    // 表名
    protected $table = 'option_contract_transaction';
    // 主键
    protected $primaryKey = 'id';
    // 过滤黑名单字段
    public $guarded = [];
}
