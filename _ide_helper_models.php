<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id 主键id
 * @property string $account 登录账号
 * @property string $password 登录密码
 * @property string $authoritys 用户权限，拥有的权力
 * @property string $token 登录凭证
 * @property string $name 姓名
 * @property string|null $avatar 头像
 * @property string $status 状态: 0,禁用 1,启用
 * @property string $super 状态: 0,员工 1,管理员
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Query\Builder|Admin onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAuthoritys($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereSuper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Admin withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Admin withoutTrashed()
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AdminLoginLog
 *
 * @property int $id 主键id
 * @property int $account_id 登录ID
 * @property string $account 登录账号
 * @property string $token 登录凭证
 * @property string $ip 登录IP
 * @property string|null $address 登录地址
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminLoginLog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLoginLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|AdminLoginLog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdminLoginLog withoutTrashed()
 */
	class AdminLoginLog extends \Eloquent {}
}

namespace App\Models{
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
 */
	class AdminMenus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AdminOperationLog
 *
 * @property int $id 主键id
 * @property int $account_id 登录ID
 * @property string|null $token token
 * @property string|null $headers headers
 * @property string|null $ip ip
 * @property string|null $path 请求路径
 * @property string|null $data 发送数据
 * @property string $content 操作记录
 * @property string|null $abnormal 异常信息
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminOperationLog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereAbnormal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereHeaders($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOperationLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|AdminOperationLog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdminOperationLog withoutTrashed()
 */
	class AdminOperationLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ApplyBuy
 *
 * @property int $id 主键id
 * @property string $email 申购用户
 * @property int $get_currency_id 购买币种id
 * @property string|null $get_currency_name 购买币种名称
 * @property int $get_currency_num 购买数量
 * @property int|null $trading_pair_id 交易对ID
 * @property string|null $trading_pair_name 交易对名称
 * @property string $ratio 购买比例
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy newQuery()
 * @method static \Illuminate\Database\Query\Builder|ApplyBuy onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereGetCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereGetCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereGetCurrencyNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereTradingPairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereTradingPairName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ApplyBuy withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ApplyBuy withoutTrashed()
 */
	class ApplyBuy extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ApplyBuySetup
 *
 * @property int $id 主键id
 * @property string $name 币种名称
 * @property int|null $trading_pair_id 交易对ID
 * @property string|null $trading_pair_name 交易对名称
 * @property string $ratio 购买比例
 * @property string $estimated_time 预计上线时间
 * @property string $start_time 开始申购时间
 * @property string $end_time 结束申购时间
 * @property string|null $code 申购码
 * @property int|null $code_status 申购码开关  0 关闭 1 开启
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup newQuery()
 * @method static \Illuminate\Database\Query\Builder|ApplyBuySetup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereCodeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereEstimatedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereTradingPairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereTradingPairName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplyBuySetup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ApplyBuySetup withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ApplyBuySetup withoutTrashed()
 */
	class ApplyBuySetup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Banner
 *
 * @property int $id 主键id
 * @property string $name 广告名称
 * @property string|null $images 广告图片
 * @property string|null $redirect 跳转地址
 * @property int|null $sort 排序
 * @property string|null $type 广告位置：1-pc 2-h5 3-app
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newQuery()
 * @method static \Illuminate\Database\Query\Builder|Banner onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereRedirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Banner withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Banner withoutTrashed()
 */
	class Banner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Base
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Base newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Base newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Base query()
 */
	class Base extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bulletins
 *
 * @property int $id 主键id
 * @property string|null $language 语言：1-繁体 2-英文 3-日文 4-韩语 5 西班牙语
 * @property string $content 公告内容
 * @property string|null $redirect 跳转地址
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins newQuery()
 * @method static \Illuminate\Database\Query\Builder|Bulletins onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereRedirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulletins whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Bulletins withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Bulletins withoutTrashed()
 */
	class Bulletins extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Currency
 *
 * @property int $id 主键id
 * @property string $name 名称
 * @property int $trading_pair_id 交易对
 * @property string $k_line_code K线图代码
 * @property int $decimal_scale 自有币位数
 * @property string|null $type 交易显示：（币币交易，永续合约，期权合约）
 * @property int $sort 排序
 * @property int $is_hidden 是否展示：0-否，1-展示
 * @property string $fluctuation_min 行情波动值（小）
 * @property string $fluctuation_max 行情波动值（大）
 * @property string $fee_currency_currency 币币交易手续费%
 * @property string $fee_perpetual_contract 永续合约手续费%
 * @property string $fee_option_contract 期权合约手续费%
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Query\Builder|Currency onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereDecimalScale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereFeeCurrencyCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereFeeOptionContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereFeePerpetualContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereFluctuationMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereFluctuationMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereKLineCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereTradingPairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Currency withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Currency withoutTrashed()
 */
	class Currency extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Globals
 *
 * @property int $id 主键id
 * @property string $fields 字段名称
 * @property string|null $value 字段值
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|Globals newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Globals newQuery()
 * @method static \Illuminate\Database\Query\Builder|Globals onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Globals query()
 * @method static \Illuminate\Database\Eloquent\Builder|Globals whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Globals whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Globals whereFields($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Globals whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Globals whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Globals whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|Globals withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Globals withoutTrashed()
 */
	class Globals extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Help extends \Eloquent {}
}

namespace App\Models\Jys{
/**
 * App\Models\Jys\JysUser
 *
 * @property int $uid
 * @property int $agent_id 0表示不是代理商，1以上表示该代理商id
 * @property int $agent_note_id 代理商节点id。当该用户是代理商时该值等于上级代理商Id，当该用户不是代理商时该值等于节点代理商id
 * @property string $email 邮箱
 * @property string|null $identifier
 * @property string $password 登陆密码
 * @property string $pay_password 支付密码
 * @property int $status 0正常 1，已锁定
 * @property string|null $locale 用户使用语言
 * @property string $nickname 昵称
 * @property int $lock_time 锁定时间
 * @property int $login_time 登陆时间
 * @property string|null $nationality 国家
 * @property string|null $last_login_ip 最后登陆ip
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property string|null $share_code 邀请码
 * @property int $user_level 用户分享等级
 * @property string|null $user_path 用户关系
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property int $deleted_at 删除时间, 软删除标记
 * @property int $risk_profit 单控概率
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereAgentNoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereLockTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser wherePayPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereRiskProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereShareCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereUserLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUser whereUserPath($value)
 */
	class JysUser extends \Eloquent {}
}

namespace App\Models\Jys{
/**
 * App\Models\Jys\JysUserWallet
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $currency 币种id
 * @property string|null $address
 * @property string|null $address_2 第二类型地址usdt
 * @property string $legal_balance 法币交易余额
 * @property string $lock_legal_balance 锁定法币交易余额
 * @property string $change_balance 币币交易余额
 * @property string $lock_change_balance 锁定币币交易余额
 * @property string $lever_balance 杠杆交易余额
 * @property string $lever_balance_add_allnum 资产兑换累加产生的杠杆值(作为入金的一部分）
 * @property string $lock_lever_balance 锁定杠杆交易余额
 * @property string $micro_balance 微盘余额
 * @property string $lock_micro_balance 锁定微盘余额
 * @property int $status 0正常 1锁定
 * @property string $old_balance
 * @property string $private
 * @property string $cost 持仓成本
 * @property string|null $gl_time
 * @property string $txid 交易哈希
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property int $deleted_at 删除时间, 软删除标记
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereChangeBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereGlTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereLegalBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereLeverBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereLeverBalanceAddAllnum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereLockChangeBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereLockLegalBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereLockLeverBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereLockMicroBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereMicroBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereOldBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet wherePrivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereTxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JysUserWallet whereUserId($value)
 */
	class JysUserWallet extends \Eloquent {}
}

namespace App\Models{
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
 */
	class News extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OptionContract
 *
 * @property int $id 主键id
 * @property int $seconds 秒数
 * @property int $status 状态:0.禁用,1.启用
 * @property string $profit_ratio 收益率
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract newQuery()
 * @method static \Illuminate\Database\Query\Builder|OptionContract onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract query()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereProfitRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereSeconds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionContract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|OptionContract withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OptionContract withoutTrashed()
 */
	class OptionContract extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PerpetualContract
 *
 * @property int $id 主键id
 * @property int $currency_id 币种id
 * @property int $type 类型:1.手数,2.倍数
 * @property string $value 值
 * @property int $status 状态:0.禁用,1.启用
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract newQuery()
 * @method static \Illuminate\Database\Query\Builder|PerpetualContract onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract query()
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerpetualContract whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|PerpetualContract withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PerpetualContract withoutTrashed()
 */
	class PerpetualContract extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TradingPair
 *
 * @property int $id 主键id
 * @property string $name 交易对名称
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair newQuery()
 * @method static \Illuminate\Database\Query\Builder|TradingPair onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair query()
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradingPair whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|TradingPair withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TradingPair withoutTrashed()
 */
	class TradingPair extends \Eloquent {}
}

namespace App\Models{
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
 */
	class User extends \Eloquent {}
}

namespace App\Models{
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
 */
	class UsersWallet extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Withdraw
 *
 * @property int $id
 * @property int|null $user_id 用户id
 * @property string|null $email 用户邮箱
 * @property string|null $address 提币地址
 * @property int|null $trading_pair_id 提现的交易对id
 * @property string|null $trading_pair_name 提现的交易对name
 * @property int|null $type 币链类型 1-OMNI 2-ERC20 3-TRC20
 * @property string|null $withdraw_num 提现数量
 * @property string|null $handling_fee 手续费
 * @property string|null $actually_arrived 实际到账
 * @property string|null $status 状态：0-未确认：1-已确认 2-已拒绝
 * @property string|null $remark 备注
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 * @property \Illuminate\Support\Carbon|null $deleted_at 删除时间，为 null 则是没删除
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw newQuery()
 * @method static \Illuminate\Database\Query\Builder|Withdraw onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw query()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereActuallyArrived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereHandlingFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereTradingPairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereTradingPairName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereWithdrawNum($value)
 * @method static \Illuminate\Database\Query\Builder|Withdraw withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Withdraw withoutTrashed()
 */
	class Withdraw extends \Eloquent {}
}

