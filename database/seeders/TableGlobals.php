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
                'fields' => 'site_name',
                'value'  => '星风网络',
            ),
            array(
                'fields' => 'omni_wallet_address',
                'value'  => '1',
            ),
            array(
                'fields' => 'erc20_wallet_address',
                'value'  => '2',
            ),
            array(
                'fields' => 'trc20_wallet_address',
                'value'  => '3',
            ),
            array(
                'fields' => 'withdrawal_fees',
                'value'  => '5',
            ),
        ));
    }
}
