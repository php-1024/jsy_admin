<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 这里是您可以为应用程序注册Admin路由的地方。这些
| 路由由RouteServiceProvider在分配了“Admin”中间件组的组中加载。享受构建Admin的乐趣！
|
*/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {


    // 登录 管理员
    Route::post('login', 'LoginController@login');
    // 退出
    Route::post('logout', 'LoginController@logout');
    // 清除服务器上的所有Cache缓存
    Route::post('flush', 'LoginController@flush');

    // 获取用户信息
    Route::post('info', 'AdminController@info');
    // todo::首页
    Route::post('index', 'AdminController@index');
    // 获取菜单路径
    Route::post('menus', 'AdminController@menus');
    // 添加管理员
    Route::post('add', 'AdminController@add');
    // 删除管理员
    Route::post('del', 'AdminController@del');
    // 编辑管理员
    Route::post('edit', 'AdminController@edit');
    // 修改用户状态
    Route::post('status', 'AdminController@status');
    // 获取管理员列表
    Route::post('list', 'AdminController@list');
    // 系统权限
    Route::post('sys_authoritys', 'AdminController@sys_authoritys');


    // 菜单管理
    Route::group(['prefix' => 'menus'], function () {
        // 添加菜单
        Route::post('add', 'MenusController@add');
        // 删除菜单
        Route::post('del', 'MenusController@del');
        // 编辑菜单
        Route::post('edit', 'MenusController@edit');
        // 获取菜单列表
        Route::post('list', 'MenusController@list');
    });

    // v3 全局管理
    Route::group(['prefix' => 'global'], function () {
        // 设置全局参数
        Route::post('set', 'GlobalsController@set');
        // 获取全局参数
        Route::post('get', 'GlobalsController@get');
    });

    // Banner管理
    Route::group(['prefix' => 'banner'], function () {
        // 新增banner
        Route::post('add', 'BannerController@add');
        // 删除banner
        Route::post('del', 'BannerController@del');
        // 编辑banner
        Route::post('edit', 'BannerController@edit');
        // 获取单条信息
        Route::post('get', 'BannerController@get');
        // 获取banner列表
        Route::post('list', 'BannerController@list');
    });

    // 公告管理
    Route::group(['prefix' => 'bulletin'], function () {
        // 添加公告
        Route::post('add', 'BulletinController@add');
        // 删除公告
        Route::post('del', 'BulletinController@del');
        // 编辑公告
        Route::post('edit', 'BulletinController@edit');
        // 获取公告信息
        Route::post('get', 'BulletinController@get');
        // 获取公告列表
        Route::post('list', 'BulletinController@list');
    });


    // 用户管理
    Route::group(['prefix' => 'user'], function () {
        // 用户列表
        Route::post('list', 'UserController@list');
        // 编辑用户
        Route::post('edit', 'UserController@edit');
        // 修改用户状态
        Route::post('status', 'UserController@status');
        // 用户等级设置
        Route::post('grade_setup', 'UserController@grade_setup');
        // 获取下级信息
        Route::post('get_sub', 'UserController@get_sub');
        // 钱包列表
        Route::post('wallet_list', 'UserController@wallet_list');
        // 钱包充值
        Route::post('wallet_recharge', 'UserController@wallet_recharge');
        // 钱包清空
        Route::post('wallet_empty', 'UserController@wallet_empty');
        // 重制地址
        Route::post('wallet_reset', 'UserController@wallet_reset');
        // todo::提币地址
        Route::post('wallet_address', 'UserController@wallet_address');
    });


    // 币种管理
    Route::group(['prefix' => 'currency'], function () {
        // 钱包管理
        Route::group(['prefix' => 'trading_pair'], function () {
            // 添加钱包
            Route::post('add', 'TradingPairController@add');
            // 钱包列表
            Route::post('list', 'TradingPairController@list');
        });

        // 交易对管理
        Route::group(['prefix' => 'manage'], function () {
            // 添加交易对
            Route::post('add', 'CurrencyController@add');
            // 编辑交易对
            Route::post('edit', 'CurrencyController@edit');
            // 获取交易对信息
            Route::post('get', 'CurrencyController@get');
            // 交易对列表
            Route::post('list', 'CurrencyController@list');
        });

        // 永续合约管理
        Route::group(['prefix' => 'perpetual_contract'], function () {
            // 添加
            Route::post('add', 'PerpetualContractController@add');
            // 编辑
            Route::post('edit', 'PerpetualContractController@edit');
            // 获取币种信息列表
            Route::post('get_currency', 'PerpetualContractController@get_currency');
            // 获取单条永续合约信息
            Route::post('get_one', 'PerpetualContractController@get_one');
            // 列表
            Route::post('list', 'PerpetualContractController@list');
        });

        // 期权合约管理
        Route::group(['prefix' => 'option_contract'], function () {
            // 添加
            Route::post('add', 'OptionContractController@add');
            // 编辑
            Route::post('edit', 'OptionContractController@edit');
            // 列表
            Route::post('list', 'OptionContractController@list');
            // 获取单条期权合约信息
            Route::post('get_one', 'OptionContractController@get_one');
        });

        // 申购管理
        Route::group(['prefix' => 'apply_buy'], function () {
            // 申购币种设置
            Route::post('setup', 'ApplyBuyController@setup');
            // 获取申购吗
            Route::post('get_code', 'ApplyBuyController@get_code');
            // 获取申购配置
            Route::post('get_setup', 'ApplyBuyController@get_setup');
            // 列表
            Route::post('list', 'ApplyBuyController@list');
        });
    });

    // 财务管理
    Route::group(['prefix' => 'finance'], function () {
        // 钱包流水
        Route::post('wallet_stream', 'FinanceController@wallet_stream');
        // 提现订单列表
        Route::post('withdraw_order_list', 'FinanceController@withdraw_order_list');
        // 提现订单确认
        Route::post('withdraw_order_confirm', 'FinanceController@withdraw_order_confirm');
        // 充值订单列表
        Route::post('recharge_order_list', 'FinanceController@recharge_order_list');
        // 确认充值订单
        Route::post('recharge_order_confirm', 'FinanceController@recharge_order_confirm');
        // 期权交易列表
        Route::post('option_contract_list', 'FinanceController@option_contract_list');
        // 永续交易列表
        Route::post('perpetual_contract_list', 'FinanceController@perpetual_contract_list');
        // 币币交易列表
        Route::post('currency_order_list', 'FinanceController@currency_order_list');
        // 币币交易订单状态操作
        Route::post('currency_order_confirm', 'FinanceController@currency_order_confirm');
    });

});
