<?php

namespace Database\Seeders;

use App\Models\TradingPair;
use App\Models\User;
use Illuminate\Database\Seeder;

class TableUserWallet extends Seeder
{
    /**
     * 用户相关钱包初始化
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users_wallet')->delete();
        $this->command->line("开始迁移");
        // 迁移旧表数据
        $list = User::all()->toArray();
        $this->command->info("当前有" . count($list) . "条数据要迁移");
        $TradingPair = TradingPair::all()->toArray();
        $this->command->info("当前有" . count($TradingPair) . "种交易对");
        $inserts = [];
        // 整理数据格式，准备迁移
        foreach ($list as $vv) {
            foreach ($TradingPair as $key => $val) {
                $inserts[$key]['user_id']           = $vv['id'];  // 用户id
                $inserts[$key]['trading_pair_id']   = $val['id'];       // 交易对id
                $inserts[$key]['trading_pair_name'] = $val['name'];       // 交易对名称
                $inserts[$key]['status']            = 0;          // 0正常 1锁定
            }
            $inserts && \DB::table('users_wallet')->insert($inserts);
        }
        $this->command->line("迁移结束");
    }
}
