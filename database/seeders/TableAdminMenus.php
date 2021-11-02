<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TableAdminMenus extends Seeder
{
    /**
     * 后台菜单路由权限初始化
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admin_menus')->delete();

        // 添加 VUE 菜单路由
        \DB::table('admin_menus')->insert(array(
            array(
                'id'         => 2,
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '1',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '0',                           // 父级id
                'icon'       => 'el-icon-s-tools',             // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'system',                      // 菜单name
                'cname'      => '系统管理',                     // 菜单中文名
                'path_views' => '/system',                     // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'id'         => 3,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '0',                            // 父级id
                'icon'       => 'el-icon-user-solid',           // 菜单图标，按钮图标为空
                'sort'       => '2',                            // 排序值，数字越大越后面
                'name'       => 'user',                         // 菜单name
                'cname'      => '用户管理',                      // 菜单中文名
                'path_views' => '/user',                        // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 4,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '1',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '0',                            // 父级id
                'icon'       => 'el-icon-s-finance',            // 菜单图标，按钮图标为空
                'sort'       => '3',                            // 排序值，数字越大越后面
                'name'       => 'finance',                      // 菜单name
                'cname'      => '财务管理',                      // 菜单中文名
                'path_views' => '/finance',                     // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 5,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '1',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '0',                            // 父级id
                'icon'       => 'el-icon-s-finance',            // 菜单图标，按钮图标为空
                'sort'       => '4',                            // 排序值，数字越大越后面
                'name'       => 'currency',                     // 菜单name
                'cname'      => '币种管理',                      // 菜单中文名
                'path_views' => '/currency',                    // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 6,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '2',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 0,                             // 排序值，数字越大越后面
                'name'       => 'adminUserList',                // 菜单name
                'cname'      => '管理员管理',                     // 菜单中文名
                'path_views' => '/permission/adminUserList',    // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 9,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '3',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 0,                             // 排序值，数字越大越后面
                'name'       => 'user',                         // 菜单name
                'cname'      => '用户列表',                      // 菜单中文名
                'path_views' => '/user/user_list',          // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 11,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '4',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 0,                             // 排序值，数字越大越后面
                'name'       => 'withdraw',               // 菜单name
                'cname'      => '提现订单列表',                   // 菜单中文名
                'path_views' => '/finance/withdraw',      // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 12,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '4',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 0,                             // 排序值，数字越大越后面
                'name'       => 'recharge',                 // 菜单name
                'cname'      => '充值订单列表',                   // 菜单中文名
                'path_views' => '/finance/recharge',        // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 13,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '4',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 0,                             // 排序值，数字越大越后面
                'name'       => 'walletGrid',                   // 菜单name
                'cname'      => '钱包流水列表',                // 菜单中文名
                'path_views' => '/finance/wallet_stream',          // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 14,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '4',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 0,                             // 排序值，数字越大越后面
                'name'       => 'option_transaction',               // 菜单name
                'cname'      => '期权交易列表',                 // 菜单中文名
                'path_views' => '/finance/option_transaction',           // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 15,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '4',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 0,                             // 排序值，数字越大越后面
                'name'       => 'perpetual_transaction',                    // 菜单name
                'cname'      => '永续交易列表',                // 菜单中文名
                'path_views' => '/finance/perpetual_transaction',           // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 20,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '2',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 0,                             // 排序值，数字越大越后面
                'name'       => 'global_manage',                // 菜单name
                'cname'      => '全局管理',                      // 菜单中文名
                'path_views' => '/system/global_manage',          // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 21,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '2',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 0,                             // 排序值，数字越大越后面
                'name'       => 'banner_manage',                // 菜单name
                'cname'      => 'Banner管理',                      // 菜单中文名
                'path_views' => '/system/banner_manage',          // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 22,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '2',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 0,                             // 排序值，数字越大越后面
                'name'       => 'bulletin_manage',                // 菜单name
                'cname'      => '公告管理',                      // 菜单中文名
                'path_views' => '/system/bulletin_manage',          // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 23,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '2',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 0,                              // 排序值，数字越大越后面
                'name'       => 'help_manage',                  // 菜单name
                'cname'      => '帮助管理',                      // 菜单中文名
                'path_views' => '/system/help_manage',          // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 24,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '2',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 0,                              // 排序值，数字越大越后面
                'name'       => 'news_manage',                  // 菜单name
                'cname'      => '新闻管理',                      // 菜单中文名
                'path_views' => '/system/news_manage',          // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 25,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '5',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 0,                              // 排序值，数字越大越后面
                'name'       => 'currency_list',                // 菜单name
                'cname'      => '币种管理',                      // 菜单中文名
                'path_views' => '/currency/list',              // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 26,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '5',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 1,                              // 排序值，数字越大越后面
                'name'       => 'perpetual_contract',           // 菜单name
                'cname'      => '永续合约',                      // 菜单中文名
                'path_views' => '/currency/perpetual_contract', // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 27,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '5',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 2,                              // 排序值，数字越大越后面
                'name'       => 'option_contract',              // 菜单name
                'cname'      => '期权合约',                      // 菜单中文名
                'path_views' => '/currency/option_contract',    // 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 28,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '5',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 3,                              // 排序值，数字越大越后面
                'name'       => 'currency_transaction',              // 菜单name
                'cname'      => '币币交易',                      // 菜单中文名
                'path_views' => '/currency/currency_transaction',// 路径
                'created_at' => date('Y-m-d H:i:s'),     // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),     // 更新时间
            ),
            array(
                'id'         => 29,
                'is_hidden'  => '1',                            // 是否显示 0否 1是
                'type'       => '2',                            // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '5',                            // 父级id
                'icon'       => '',                             // 菜单图标，按钮图标为空
                'sort'       => 4,                              // 排序值，数字越大越后面
                'name'       => 'apply_buy',                    // 菜单name
                'cname'      => '申购管理',                       // 菜单中文名
                'path_views' => '/currency/apply_buy',           // 路径
                'created_at' => date('Y-m-d H:i:s'),      // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),      // 更新时间
            ),
        ),
        );

        // 添加 API 路由
        \DB::table('admin_menus')->insert(array(
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '7',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'info',                        // 菜单name
                'cname'      => '用户信息',                     // 菜单中文名
                'path_views' => 'api/admin/user/info',         // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '7',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'admin_menus',                 // 菜单name
                'cname'      => '路由列表',                     // 菜单中文名
                'path_views' => 'api/admin/menus',             // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '6',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '2',                           // 排序值，数字越大越后面
                'name'       => 'admin_add',                   // 菜单name
                'cname'      => '添加管理员',                    // 菜单中文名
                'path_views' => 'api/admin/add',               // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '6',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '3',                           // 排序值，数字越大越后面
                'name'       => 'admin_del',                   // 菜单name
                'cname'      => '删除管理员',                    // 菜单中文名
                'path_views' => 'api/admin/del',         // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '6',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '4',                           // 排序值，数字越大越后面
                'name'       => 'admin_edit',                   // 菜单name
                'cname'      => '编辑管理员',                    // 菜单中文名
                'path_views' => 'api/admin/edit',         // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '6',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '5',                           // 排序值，数字越大越后面
                'name'       => 'admin_status',                   // 菜单name
                'cname'      => '管理员状态',                    // 菜单中文名
                'path_views' => 'api/admin/status',         // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '6',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '6',                           // 排序值，数字越大越后面
                'name'       => 'admin_list',                   // 菜单name
                'cname'      => '管理员列表',                    // 菜单中文名
                'path_views' => 'api/admin/list',         // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '6',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '6',                           // 排序值，数字越大越后面
                'name'       => 'sys_authoritys',              // 菜单name
                'cname'      => '系统权限',                     // 菜单中文名
                'path_views' => 'api/admin/sys_authoritys',         // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '7',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'menus_add',                   // 菜单name
                'cname'      => '添加菜单',                    // 菜单中文名
                'path_views' => 'api/admin/menus/add',         // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '7',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'menus_del',                   // 菜单name
                'cname'      => '删除菜单',                    // 菜单中文名
                'path_views' => 'api/admin/menus/del',         // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '7',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '2',                           // 排序值，数字越大越后面
                'name'       => 'menus_edit',                  // 菜单name
                'cname'      => '编辑菜单',                     // 菜单中文名
                'path_views' => 'api/admin/menus/edit',        // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '7',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '3',                           // 排序值，数字越大越后面
                'name'       => 'menus_list',                  // 菜单name
                'cname'      => '菜单列表',                     // 菜单中文名
                'path_views' => 'api/admin/menus/list',        // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '20',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'global_set',                  // 菜单name
                'cname'      => '设置全局参数',                     // 菜单中文名
                'path_views' => 'api/admin/global/set',        // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '20',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'global_get',                  // 菜单name
                'cname'      => '获取全局参数',                     // 菜单中文名
                'path_views' => 'api/admin/global/get',        // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '21',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'banner_add',                  // 菜单name
                'cname'      => '新增banner',                     // 菜单中文名
                'path_views' => 'api/admin/banner/add',        // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '21',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'banner_del',                  // 菜单name
                'cname'      => '删除banner',                     // 菜单中文名
                'path_views' => 'api/admin/banner/del',        // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '21',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '2',                           // 排序值，数字越大越后面
                'name'       => 'banner_edit',                  // 菜单name
                'cname'      => '编辑banner',                     // 菜单中文名
                'path_views' => 'api/admin/banner/edit',        // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '21',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '3',                           // 排序值，数字越大越后面
                'name'       => 'banner_get',                  // 菜单name
                'cname'      => '获取单条banner',               // 菜单中文名
                'path_views' => 'api/admin/banner/get',        // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '21',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '4',                           // 排序值，数字越大越后面
                'name'       => 'banner_list',                 // 菜单name
                'cname'      => '获取banner列表',               // 菜单中文名
                'path_views' => 'api/admin/banner/list',       // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '22',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'bulletin_add',                // 菜单name
                'cname'      => '添加公告',                     // 菜单中文名
                'path_views' => 'api/admin/bulletin/add',      // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '22',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'bulletin_del',                // 菜单name
                'cname'      => '删除公告',                     // 菜单中文名
                'path_views' => 'api/admin/bulletin/del',      // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '22',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '2',                           // 排序值，数字越大越后面
                'name'       => 'bulletin_edit',                // 菜单name
                'cname'      => '编辑公告',                     // 菜单中文名
                'path_views' => 'api/admin/bulletin/edit',      // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '22',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '3',                           // 排序值，数字越大越后面
                'name'       => 'bulletin_get',                // 菜单name
                'cname'      => '获取公告信息',                     // 菜单中文名
                'path_views' => 'api/admin/bulletin/get',      // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '22',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '4',                           // 排序值，数字越大越后面
                'name'       => 'bulletin_list',                // 菜单name
                'cname'      => '获取公告列表',                     // 菜单中文名
                'path_views' => 'api/admin/bulletin/list',      // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '23',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'help_add',                // 菜单name
                'cname'      => '添加帮助',                     // 菜单中文名
                'path_views' => 'api/admin/help/add',      // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '23',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'help_del',                    // 菜单name
                'cname'      => '删除帮助',                     // 菜单中文名
                'path_views' => 'api/admin/help/del',          // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '23',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '2',                           // 排序值，数字越大越后面
                'name'       => 'help_edit',                   // 菜单name
                'cname'      => '编辑帮助',                     // 菜单中文名
                'path_views' => 'api/admin/help/edit',         // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '23',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '3',                           // 排序值，数字越大越后面
                'name'       => 'help_get',                    // 菜单name
                'cname'      => '获取帮助信息',                  // 菜单中文名
                'path_views' => 'api/admin/help/get',          // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '23',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '4',                           // 排序值，数字越大越后面
                'name'       => 'help_list',                   // 菜单name
                'cname'      => '获取帮助列表',                  // 菜单中文名
                'path_views' => 'api/admin/help/list',         // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '3',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'user_list',                   // 菜单name
                'cname'      => '用户列表',                     // 菜单中文名
                'path_views' => 'api/admin/user/list',         // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '3',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'user_status',                   // 菜单name
                'cname'      => '修改用户状态',                     // 菜单中文名
                'path_views' => 'api/admin/user/status',         // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '3',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'user_grade_setup',            // 菜单name
                'cname'      => '用户等级设置',                  // 菜单中文名
                'path_views' => 'api/admin/user/grade_setup',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '3',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'user_wallet_recharge',            // 菜单name
                'cname'      => '钱包充值',                  // 菜单中文名
                'path_views' => 'api/admin/user/wallet_recharge',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '3',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'user_wwallet_empty',            // 菜单name
                'cname'      => '钱包清空',                  // 菜单中文名
                'path_views' => 'api/admin/user/wallet_empty',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '3',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'user_wallet_reset',            // 菜单name
                'cname'      => '重制地址',                  // 菜单中文名
                'path_views' => 'api/admin/user/wallet_reset',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '3',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'user_edit',                   // 菜单name
                'cname'      => '编辑用户',                     // 菜单中文名
                'path_views' => 'api/admin/user/edit',         // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '3',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '2',                           // 排序值，数字越大越后面
                'name'       => 'get_sub',                     // 菜单name
                'cname'      => '获取下级信息',                  // 菜单中文名
                'path_views' => 'api/admin/user/get_sub',      // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '3',                           // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '3',                           // 排序值，数字越大越后面
                'name'       => 'wallet_list',                 // 菜单name
                'cname'      => '钱包列表',                     // 菜单中文名
                'path_views' => 'api/admin/user/wallet_list',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '27',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'option_contract_add',             // 菜单name
                'cname'      => '新增期权合约',                     // 菜单中文名
                'path_views' => 'api/admin/currency/option_contract/add',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '27',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'option_contract_get_one',             // 菜单name
                'cname'      => '获取单条期权合约信息',                     // 菜单中文名
                'path_views' => 'api/admin/currency/option_contract/get_one',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '27',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'option_contract_edit',             // 菜单name
                'cname'      => '编辑期权合约',                     // 菜单中文名
                'path_views' => 'api/admin/currency/option_contract/edit',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '27',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'option_contract_list',             // 菜单name
                'cname'      => '期权列表',                     // 菜单中文名
                'path_views' => 'api/admin/currency/option_contract/list',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '25',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'trading_pair_add',                // 菜单name
                'cname'      => '新增交易对',                     // 菜单中文名
                'path_views' => 'api/admin/currency/trading_pair/add', // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '25',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'trading_pair_list',           // 菜单name
                'cname'      => '交易对管理',                    // 菜单中文名
                'path_views' => 'api/admin/currency/trading_pair/list',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '25',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '2',                           // 排序值，数字越大越后面
                'name'       => 'currency_add',                // 菜单name
                'cname'      => '添加币种',                    // 菜单中文名
                'path_views' => 'api/admin/currency/manage/add',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '25',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '2',                           // 排序值，数字越大越后面
                'name'       => 'currency_edit',                // 菜单name
                'cname'      => '编辑币种',                    // 菜单中文名
                'path_views' => 'api/admin/currency/manage/edit',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '25',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '2',                           // 排序值，数字越大越后面
                'name'       => 'currency_get',                // 菜单name
                'cname'      => '获取单条币种信息',                    // 菜单中文名
                'path_views' => 'api/admin/currency/manage/get',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '25',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '2',                           // 排序值，数字越大越后面
                'name'       => 'currency_list',               // 菜单name
                'cname'      => '币种列表',                     // 菜单中文名
                'path_views' => 'api/admin/currency/manage/list',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '26',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'perpetual_contract_add',               // 菜单name
                'cname'      => '永续合约添加',                     // 菜单中文名
                'path_views' => 'api/admin/currency/perpetual_contract/add',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '26',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'perpetual_contract_get_one',               // 菜单name
                'cname'      => '获取单条永续合约信息',                     // 菜单中文名
                'path_views' => 'api/admin/currency/perpetual_contract/get_one',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '26',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'perpetual_contract_edit',               // 菜单name
                'cname'      => '永续合约编辑',                     // 菜单中文名
                'path_views' => 'api/admin/currency/perpetual_contract/edit',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '26',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '2',                           // 排序值，数字越大越后面
                'name'       => 'perpetual_contract_get_currency',               // 菜单name
                'cname'      => '获取币种信息列表',                     // 菜单中文名
                'path_views' => 'api/admin/currency/perpetual_contract/get_currency',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '26',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '3',                           // 排序值，数字越大越后面
                'name'       => 'perpetual_contract_list',               // 菜单name
                'cname'      => '永续合约列表',                     // 菜单中文名
                'path_views' => 'api/admin/currency/perpetual_contract/list',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '29',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'apply_buy_setup',               // 菜单name
                'cname'      => '申购币种设置',                     // 菜单中文名
                'path_views' => 'api/admin/currency/apply_buy/setup',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '29',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'apply_buy_get_code',               // 菜单name
                'cname'      => '获取申购吗',                     // 菜单中文名
                'path_views' => 'api/admin/currency/apply_buy/get_code',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '29',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '0',                           // 排序值，数字越大越后面
                'name'       => 'apply_buy_get_setup',               // 菜单name
                'cname'      => '获取申购配置',                     // 菜单中文名
                'path_views' => 'api/admin/currency/apply_buy/get_setup',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '29',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'apply_buy_list',              // 菜单name
                'cname'      => '申购列表',                      // 菜单中文名
                'path_views' => 'api/admin/currency/apply_buy/list',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '13',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'wallet_stream',              // 菜单name
                'cname'      => '钱包流水',                      // 菜单中文名
                'path_views' => 'api/admin/finance/wallet_stream',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '11',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'withdraw_order_list',              // 菜单name
                'cname'      => '提现订单列表',                      // 菜单中文名
                'path_views' => 'api/admin/finance/withdraw_order_list',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '11',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'withdraw_order_confirm',              // 菜单name
                'cname'      => '提现订单确认',                      // 菜单中文名
                'path_views' => 'api/admin/finance/withdraw_order_confirm',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '12',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'recharge_order_list',              // 菜单name
                'cname'      => '充值订单列表',                      // 菜单中文名
                'path_views' => 'api/admin/finance/recharge_order_list',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '12',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'recharge_order_confirm',              // 菜单name
                'cname'      => '确认充值订单',                      // 菜单中文名
                'path_views' => 'api/admin/finance/recharge_order_confirm',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '14',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'option_contract_list',              // 菜单name
                'cname'      => '期权交易列表',                      // 菜单中文名
                'path_views' => 'api/admin/finance/option_contract_list',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '15',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'perpetual_contract_list',              // 菜单name
                'cname'      => '永续交易列表',                      // 菜单中文名
                'path_views' => 'api/admin/finance/perpetual_contract_list',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '28',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'currency_order_list',              // 菜单name
                'cname'      => '币币交易列表',                      // 菜单中文名
                'path_views' => 'api/admin/finance/currency_order_list',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
            array(
                'is_hidden'  => '1',                           // 是否显示 0否 1是
                'type'       => '4',                           // 类型，1目录  2菜单 3按钮 4接口
                'parent_id'  => '28',                          // 父级id
                'icon'       => '',                            // 菜单图标，按钮图标为空
                'sort'       => '1',                           // 排序值，数字越大越后面
                'name'       => 'currency_order_confirm',              // 菜单name
                'cname'      => '币币交易订单状态操作',                      // 菜单中文名
                'path_views' => 'api/admin/finance/currency_order_confirm',  // 路径
                'created_at' => date('Y-m-d H:i:s'),    // 创建时间
                'updated_at' => date('Y-m-d H:i:s'),    // 更新时间
            ),
        ),
        );
    }
}
