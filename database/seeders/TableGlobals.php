<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TableGlobals extends Seeder
{
    /**
     * 全局信息初始化
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('globals')->delete();

        \DB::table('globals')->insert(array(
            array(
                'fields' => 'site_name',    // 网站名称
                'value'  => null,
            ),
            array(
                'fields' => 'download_link',    //  APP下载地址
                'value'  => null,
            ),
            array(
                'fields' => 'kf_address', // 客服连接地址
                'value'  => null,
            ),
            array(
                'fields' => 'invitation_code', // 邀请码开关 1：开启，0：关闭
                'value'  => 1,
            ),
            array(
                'fields' => 'withdrawal_fees', // 提现手续费 请填写百分比%
                'value'  => 5,
            ),
            array(
                'fields' => 'min_amount', // 最低提现额
                'value'  => null,
            ),
            array(
                'fields' => 'is_withdraw', // 是否开启提现  1：开启，0：关闭
                'value'  => 1,
            ),
            array(
                'fields' => 'increase_list', // 首页3+涨幅榜 例如：btcusdt,ethusdt,etcusdt
                'value'  => "btcusdt,ethusdt,etcusdt",
            ),
            array(
                'fields' => 'omni_wallet_address',  // OMNI协议钱包地址
                'value'  => '1',
            ),
            array(
                'fields' => 'erc20_wallet_address', // ERC20协议钱包地址
                'value'  => '2',
            ),
            array(
                'fields' => 'trc20_wallet_address', // TRC20协议钱包地址
                'value'  => '3',
            ),
        ));
    }
}
