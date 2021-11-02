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
        $inserts_1 = $inserts_2 = [];
        // 整理数据格式，准备迁移
        foreach ($list as $vv) {
            // 现货钱包
            foreach ($TradingPair as $key => $val) {
                if (\DB::table('users_wallet')->where([
                    'user_id'         => $vv['id'],
                    'type'            => 1, // 现货钱包
                    'trading_pair_id' => $val['id']
                ])->first()) {
                    continue;
                }
                $inserts_1[$key]['user_id']           = $vv['id'];          // 用户id
                $inserts_1[$key]['trading_pair_id']   = $val['id'];         // 交易对id
                $inserts_1[$key]['trading_pair_name'] = $val['name'];       // 交易对名称
                $inserts_1[$key]['status']            = 0;                  // 0正常 1锁定
                $inserts_1[$key]['type']              = 1;                  // 现货钱包
            }
            // 合约钱包
            foreach ($TradingPair as $key => $val) {
                if (\DB::table('users_wallet')->where([
                    'user_id'         => $vv['id'],
                    'type'            => 2, // 合约钱包
                    'trading_pair_id' => $val['id']
                ])->first()) {
                    continue;
                }
                $inserts_2[$key]['user_id']           = $vv['id'];          // 用户id
                $inserts_2[$key]['trading_pair_id']   = $val['id'];         // 交易对id
                $inserts_2[$key]['trading_pair_name'] = $val['name'];       // 交易对名称
                $inserts_2[$key]['status']            = 0;                  // 0正常 1锁定
                $inserts_1[$key]['type']              = 2;                  // 合约钱包
            }
            $inserts_1 && \DB::table('users_wallet')->insert($inserts_1);
            $inserts_2 && \DB::table('users_wallet')->insert($inserts_2);
        }
        $this->command->line("迁移结束");
    }
}
