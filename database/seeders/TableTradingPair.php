<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TableTradingPair extends Seeder
{
    /**
     * 交易对信息初始化
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('trading_pair')->delete();

        \DB::table('trading_pair')->insert(array(
            array(
                'id'   => 1,
                'name' => 'USDT',
            ),
            array(
                'id'   => 2,
                'name' => 'BTC',
            ),
            array(
                'id'   => 3,
                'name' => 'ETH',
            ),
        ));
    }
}
