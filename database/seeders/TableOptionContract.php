<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TableOptionContract extends Seeder
{
    /**
     * 期权合约信息初始化数据
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('option_contract')->delete();

        \DB::table('option_contract')->insert(array(
            array(
                'seconds'      => '60',
                'status'       => '1',
                'minimum'      => '1000',
                'profit_ratio' => '95.00',
            ),
            array(
                'seconds'      => '90',
                'status'       => '1',
                'minimum'      => '1000',
                'profit_ratio' => '97.00',
            ),
            array(
                'seconds'      => '120',
                'status'       => '1',
                'minimum'      => '1000',
                'profit_ratio' => '98.00',
            ),

        ));
    }
}
