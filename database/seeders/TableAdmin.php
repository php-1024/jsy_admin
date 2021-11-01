<?php

namespace Database\Seeders;

use App\Library\Tools;
use Illuminate\Database\Seeder;

class TableAdmin extends Seeder
{
    /**
     * 管理员信息初始化
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admin')->delete();

        \DB::table('admin')->insert(array(
            0 =>
                array(
                    'id'         => 1,
                    'account'    => 'admin',
                    'password'   => Tools::md5(123456),
                    'authoritys' => 'all',
                    'token'      => '0',
                    'name'       => '管理员',
                    'avatar'     => 'Admin/yo1g3lao1615258422897',
                    'status'     => 1,
                    'super'      => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            1 =>
                array(
                    'id'         => 2,
                    'account'    => 'iszmxw',
                    'password'   => Tools::md5(123456),
                    'authoritys' => '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21',
                    'token'      => 'iszmxw',
                    'name'       => '管理员',
                    'avatar'     => 'Admin/yo1g3lao1615258422897',
                    'status'     => 1,
                    'super'      => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
        ));
    }
}
