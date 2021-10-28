<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * 初始化入口
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TableAdmin::class);
        $this->call(TableAdminMenus::class);
        $this->call(TableGlobals::class);
        $this->call(TableTradingPair::class);
        $this->call(TableCurrency::class);
        $this->call(TableUser::class);
        $this->call(TableUserWallet::class);
        $this->call(TableOptionContract::class);
        $this->call(TablePerpetualContract::class);
    }
}
