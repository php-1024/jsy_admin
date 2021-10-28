<?php

namespace Database\Seeders;

use App\Library\Tools;
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
        $types   = [1, 2];
        foreach ($types as $vv) {
            foreach ($ids as $key => $val) {
                $inserts[$key]['currency_id'] = $val;            // 币种id
                $inserts[$key]['type']        = $vv;             // 类型:1.手数,2.倍数
                if ($vv == 1) {
                    $inserts[$key]['value'] = "20,50,100,200"; // 手数值 （单位 % ）
                }
                if ($vv == 2) {
                    $inserts[$key]['value'] = "20,50,100,200"; // 倍数值 （数字）
                }
                $inserts[$key]['status'] = '1';             // 状态:0.禁用,1.启用
            }
            $inserts && \DB::table('perpetual_contract')->insert($inserts);
        }
        $this->command->line("永续合约信息初始化完毕");
    }
}
