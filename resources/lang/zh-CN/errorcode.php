<?php

use App\Exceptions\ErrorCode;

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    '200'                            => 'success.',
    '419'                            => 'error.',
    /**
     * LG => Login 模塊
     */
    //    ErrorCode::LG_UserNotFind => '當前用戶不存在，請確認後重新輸入',
    //    ErrorCode::LG_UserCodeError => '連接微信失敗，請稍後重試',
    //    ErrorCode::LG_UserUnionidError => '連接微信失敗，請稍後重試',
    //    ErrorCode::LG_PhoneCodeError => '輸入的手機驗證碼有誤',
    //    ErrorCode::LG_SendCodeError => '發送短信信息失敗，請稍後再試',
    //    ErrorCode::LG_UserSaveError => '由於不可抗力的因素,授權失敗了噠',


    /**
     * MLG => 後臺 登錄模塊
     */
    ErrorCode::MLG_UserNotFind       => '用戶不存在',
    ErrorCode::MLG_PasswordError     => '密碼錯誤',


    /**
     * MM => 後臺 會員模塊
     */
    ErrorCode::MM_NotFind            => '用戶不存在',
    ErrorCode::MM_ConfigNotFind      => '用戶等級配置項不存在',


    /**
     * PERR => 後臺 權限模塊
     */
    ErrorCode::PERR_RolesNotFind     => '角色不存在',
    ErrorCode::PERR_PerMissNotFind   => '權限不存在',
    ErrorCode::PERR_AdminUserNotFind => '用戶不存在',


    ErrorCode::EMAIL_EXIST               => '郵箱已存在',
    ErrorCode::EMAIL_CODE_SEND           => '當前郵箱已發送驗證碼,請稍後再試',
    ErrorCode::LG_EmailCodeError         => '郵箱驗證碼錯誤',
    ErrorCode::LG_UserNotFind            => '用戶不存在',
    ErrorCode::LG_PassWordError          => '登陸密碼錯誤',
    ErrorCode::LG_ShareCodeError         => '分享邀請碼錯誤',
    ErrorCode::LG_EmailError             => '郵箱已存在',
    ErrorCode::WL_RechargeExist          => '當前已存在充值中的訂單',
    ErrorCode::WL_WithdrawalError        => '數量不能小於手續費',
    ErrorCode::WL_PayPassError           => '支付密碼錯誤',
    ErrorCode::MC_CurrencyError          => '幣種不存在',
    ErrorCode::MC_SecondsError           => '到期時間不允許',
    ErrorCode::MC_WalletError            => '用戶錢包不存在',
    ErrorCode::MC_NumberError            => '下單數量錯誤',
    ErrorCode::MC_MaxOrderError          => '下單失敗:超過最大持倉筆數限製',
    ErrorCode::MC_MoneyError             => '下單失敗:錢包余額不足',
    ErrorCode::MC_CurrencyQuotationError => '行情數據不存在',


    ErrorCode::ML_LeverError1  => '數據未找到',
    ErrorCode::ML_LeverError2  => '無權操作',
    ErrorCode::ML_LeverError3  => '交易狀態異常,請勿重復提交',
    ErrorCode::ML_LeverError4  => '平倉失敗,請重試',
    ErrorCode::ML_LeverError5  => '交易異常，無法平倉',
    ErrorCode::ML_LeverError6  => '您未開通本交易對的交易功能',
    ErrorCode::ML_LeverError7  => '手數必須是大於0的整數',
    ErrorCode::ML_LeverError8  => '手數不能低於',
    ErrorCode::ML_LeverError9  => '手數不能高於',
    ErrorCode::ML_LeverError10 => '選擇倍數不在系統範圍',
    ErrorCode::ML_LeverError11 => '余額不足,不能小於',


    // 繁体
    // 小窝新建-2021-10-04
    ErrorCode::LG_StatusError1 => '對不起您的賬戶已經被凍結，如有疑問請聯繫相關工作人員！',
    ErrorCode::LG_Error1       => '登录失败请刷新后再试！',
    ErrorCode::LG_Error2       => '账号密码不正确！',
    ErrorCode::LG_Error3       => '登录过期，无法获取用户详细信息。请您退出后重新登录',
    ErrorCode::PERR_Error1     => '抱歉！您不具备权限！',
    ErrorCode::MLG_CreateError => '创建账户失败！',
    ErrorCode::AccountIsExists => '该用户已存在！',
    ErrorCode::MLG_Error       => '操作失败！',
    ErrorCode::Vl_Error        => '参数验证失败！',

];
