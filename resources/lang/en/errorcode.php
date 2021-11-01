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
     * LG => Login Module
     */
//    ErrorCode::LG_UserNotFind => 'The current user does not exist, please confirm and re-enter',
//    ErrorCode::LG_UserCodeError => 'Failed to connect to WeChat, please try again later',
//    ErrorCode::LG_UserUnionidError => 'Failed to connect to WeChat, please try again later',
//    ErrorCode::LG_PhoneCodeError => 'The entered phone verification code is incorrect',
//    ErrorCode::LG_SendCodeError => 'Failed to send SMS message, please try again later',
//    ErrorCode::LG_UserSaveError => 'Due to force majeure, authorization failed',


    /**
     * MLG => Background login module
     */
    ErrorCode::MLG_UserNotFind       => 'User does not exist',
    ErrorCode::MLG_PasswordError     => 'wrong password',


    /**
     * MM => Backstage Membership Module
     */
    ErrorCode::MM_NotFind            => 'User does not exist',
    ErrorCode::MM_ConfigNotFind      => 'User level configuration item does not exist',


    /**
     * PERR => Background permission module
     */
    ErrorCode::PERR_RolesNotFind     => 'Role does not exist',
    ErrorCode::PERR_PerMissNotFind   => 'Permission does not exist',
    ErrorCode::PERR_AdminUserNotFind => 'User does not exist',


    ErrorCode::EMAIL_EXIST               => 'Email already exists',
    ErrorCode::EMAIL_CODE_SEND           => 'The verification code has been sent to the current mailbox, please try again later',
    ErrorCode::LG_EmailCodeError         => 'Email verification code error',
    ErrorCode::LG_UserNotFind            => 'User does not exist',
    ErrorCode::LG_PassWordError          => 'Incorrect login password',
    ErrorCode::LG_ShareCodeError         => 'Share invitation code error',
    ErrorCode::LG_EmailError             => 'Email already exists',
    ErrorCode::WL_RechargeExist          => 'There are currently existing orders in recharge',
    ErrorCode::WL_WithdrawalError        => 'The quantity cannot be less than the handling fee',
    ErrorCode::WL_PayPassError           => 'Incorrect payment password',
    ErrorCode::MC_CurrencyError          => 'Currency does not exist',
    ErrorCode::MC_SecondsError           => 'Expiration time not allowed',
    ErrorCode::MC_WalletError            => 'User wallet does not exist',
    ErrorCode::MC_NumberError            => 'Wrong number of orders',
    ErrorCode::MC_MaxOrderError          => 'Failed to place an order: Exceeded the limit of the maximum number of positions',
    ErrorCode::MC_MoneyError             => 'Order failed: insufficient wallet balance',
    ErrorCode::MC_CurrencyQuotationError => 'Market data does not exist',
    ErrorCode::MC_ChangeError            => 'The transfer type does not match',


    ErrorCode::ML_LeverError1  => 'Data not found',
    ErrorCode::ML_LeverError2  => 'No right to operate',
    ErrorCode::ML_LeverError3  => 'Abnormal transaction status,Do not submit repeatedly',
    ErrorCode::ML_LeverError4  => 'Unsuccessful,Please try again',
    ErrorCode::ML_LeverError5  => 'Abnormal transaction，Unable to close position',
    ErrorCode::ML_LeverError6  => 'You have not activated the trading function of this trading pair',
    ErrorCode::ML_LeverError7  => 'The lot size must be an integer greater than 0',
    ErrorCode::ML_LeverError8  => 'The number of hands cannot be less than',
    ErrorCode::ML_LeverError9  => 'The number of hands cannot be higher than',
    ErrorCode::ML_LeverError10 => 'Selection multiple is not in the system scope',
    ErrorCode::ML_LeverError11 => 'Insufficient balance,Cannot be less than',


    // 小窝新建-2021-10-04
    ErrorCode::LG_StatusError1 => 'Sorry that your account has been frozen, if you have any questions, please contact the relevant staff!',
];
