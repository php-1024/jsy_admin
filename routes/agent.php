<?php

/*
|--------------------------------------------------------------------------
| Agent Routes
|--------------------------------------------------------------------------
|
| 这里是您可以为应用程序注册Admin路由的地方。这些
| 路由由RouteServiceProvider在分配了“Agent”中间件组的组中加载。享受构建Agent的乐趣！
|
*/
Route::group(['prefix' => 'agent', 'namespace' => 'Agent', 'middleware' => 'agent'], function () {
    // 登录 管理员
    Route::post('login', 'LoginController@login');
    // 退出
    Route::post('logout', 'LoginController@logout');
    // 清除服务器上的所有Cache缓存
    Route::post('flush', 'LoginController@flush');
    // 获取用户信息
    Route::post('info', 'LoginController@info');
    // 首页统计
    Route::post('statistics', 'AgentController@statistics');

    // 用户管理
    Route::group(['prefix' => 'user'], function () {
        // 用户列表
        Route::post('user_manage', 'AgentController@user_manage');
        // 代理开关
        Route::post('is_agent', 'AgentController@is_agent');
        // 锁定
        Route::post('status', 'AgentController@status');
        // 修改用户信息
        Route::post('edit', 'AgentController@edit');
        // 查看下级用户
        Route::post('sub_detail', 'AgentController@sub_detail');
        // 设置风控
        Route::post('risk_profit', 'AgentController@risk_profit');
        // 资产列表
        Route::post('wallet_list', 'AgentController@wallet_list');
        // 提币地址
        Route::post('wallet_address', 'AgentController@wallet_address');
    });

    // 财务管理
    Route::group(['prefix' => 'finance'], function () {
        // 钱包流水列表
        Route::post('wallet_stream', 'FinanceController@wallet_stream');
        // 提现订单列表
        Route::post('withdraw_order', 'FinanceController@withdraw_order');
        // 充值订单列表
        Route::post('recharge_order', 'FinanceController@recharge_order');
        // 期权交易列表
        Route::post('option_contract_transaction', 'FinanceController@option_contract_transaction');
        // 永续交易列表
        Route::post('perpetual_contract_transaction', 'FinanceController@perpetual_contract_transaction');
    });

});
