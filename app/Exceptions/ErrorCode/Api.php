<?php

namespace App\Exceptions\ErrorCode;

interface Api
{
    const EMAIL_EXIST = 'LG_001';
    const EMAIL_CODE_SEND = 'LG_002';
    const LG_EmailCodeError = 'LG_003';
    const LG_UserNotFind = 'LG_004';
    const LG_PassWordError = 'LG_005';
    const LG_ShareCodeError = 'LG_006';
    const LG_EmailError = 'LG_007';


    const WL_RechargeExist = 'WL_001';
    const WL_WithdrawalError = 'WL_002';
    const WL_PayPassError = 'WL_003';
    const MC_CurrencyError = 'MC_001';
    const MC_SecondsError = 'MC_002';
    const MC_WalletError = 'MC_003';
    const MC_NumberError = 'MC_004';
    const MC_MaxOrderError = 'MC_005';
    const MC_MoneyError = 'MC_006';
    const MC_CurrencyQuotationError = 'MC_007';
    const MC_ChangeError = 'MC_008';
    const ML_LeverError1 = 'ML_001';
    const ML_LeverError2 = 'ML_002';
    const ML_LeverError3 = 'ML_003';
    const ML_LeverError4 = 'ML_004';
    const ML_LeverError5 = 'ML_005';
    const ML_LeverError6 = 'ML_006';
    const ML_LeverError7 = 'ML_007';
    const ML_LeverError8 = 'ML_008';
    const ML_LeverError9 = 'ML_009';
    const ML_LeverError10 = 'ML_010';
    const ML_LeverError11 = 'ML_011';


    // 权限模块错误代码
    const PERR_RolesNotFind = 'PERR0101';
    const PERR_PerMissNotFind = 'PERR0102';
    const PERR_AdminUserNotFind = 'PERR0103';
    const PERR_Error1 = 'PERR0104';

    // 用户相关错误代码
    const MM_NotFind = 'MM0101';
    const MM_ConfigNotFind = 'MM0201';

    // 后台登录错误码
    const MLG_UserNotFind = 'MLG0101';
    const MLG_PasswordError = 'MLG0102';
}
