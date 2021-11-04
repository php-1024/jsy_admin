<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class TablePerpetualContract extends Seeder
{
    /**
     * 永续合约信息设置
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('perpetual_contract')->delete();
        $currency = Currency::all()->toArray();
        $this->command->info("当前有" . count($currency) . "种币种");
        $ids     = array_column($currency, "id");
        $inserts = [];
        foreach ($ids as $key => $val) {
            $inserts[$key]['currency_id'] = $val;            // 币种id
            $inserts[$key]['multiple']    = "20,50,100,200"; // 倍数：10,25,50,100
            $inserts[$key]['bail']        = '100,50,25,10';  // 保证金占比：100、50、25、10
            $inserts[$key]['ratio']       = '100';           // 张数比例：1：？USDT
        }
        $inserts && \DB::table('perpetual_contract')->insert($inserts);
        $this->command->line("永续合约信息初始化完毕");
    }
}
