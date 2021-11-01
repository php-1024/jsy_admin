<?php

namespace Database\Seeders;

use App\Library\Tools;
use Illuminate\Database\Seeder;

class TableUser extends Seeder
{
    /**
     * 用户信息初始化
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user')->delete();
        $inserts = [
            [
                'language'       => '2',
                'is_agent'       => '0',
                'email'          => 'liufack520@gmail.com',
                'nickname'       => 'liufack520@gmail.com',
                'password'       => Tools::md5(123456),
                'pay_password'   => Tools::md5(123456),
                'user_level'     => '2',
                'user_path'      => '8,9',
                'partner_level'  => '1',
                'agent_dividend' => '1',
                'risk_profit'    => '1',
                'last_login_ip'  => '10.10.10.6',
                'status'         => '0',
                'lock_time'      => null,
                'login_time'     => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
                'deleted_at'     => null,
            ], [
                'language'       => '2',
                'is_agent'       => '0',
                'email'          => '381648450@qq.com',
                'nickname'       => '381648450@qq.com',
                'password'       => Tools::md5(123456),
                'pay_password'   => Tools::md5(123456),
                'user_level'     => '2',
                'user_path'      => '8,10',
                'partner_level'  => '1',
                'agent_dividend' => '1',
                'risk_profit'    => '1',
                'last_login_ip'  => '10.10.10.14',
                'status'         => '0',
                'lock_time'      => null,
                'login_time'     => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
                'deleted_at'     => null,
            ], [
                'language'       => '2',
                'is_agent'       => '1',
                'email'          => '295740949@qq.com',
                'nickname'       => '295740949@qq.com',
                'password'       => Tools::md5(123456),
                'pay_password'   => Tools::md5(123456),
                'user_level'     => '1',
                'user_path'      => null,
                'partner_level'  => '1',
                'agent_dividend' => '1',
                'risk_profit'    => '50',
                'last_login_ip'  => '10.10.10.6',
                'status'         => '0',
                'lock_time'      => null,
                'login_time'     => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
                'deleted_at'     => null,
            ], [
                'language'       => '2',
                'is_agent'       => '0',
                'email'          => 'mail@54zm.com',
                'nickname'       => 'JohnYep',
                'password'       => Tools::md5(123456),
                'pay_password'   => Tools::md5(123456),
                'user_level'     => 1,
                'user_path'      => null,
                'partner_level'  => 1,
                'agent_dividend' => 1,
                'risk_profit'    => 1,
                'last_login_ip'  => null,
                'status'         => 1,
                'lock_time'      => null,
                'login_time'     => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
                'deleted_at'     => null,
            ]
        ];
        $inserts && \DB::table('user')->insert($inserts);
        $this->command->line("迁移结束");
    }
}
