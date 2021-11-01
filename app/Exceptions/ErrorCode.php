<?php


namespace App\Exceptions;

use App\Exceptions\ErrorCode\Api;

class ErrorCode implements
    Api
{
    // 登录错误码
    const Login = 'LG';
    // 后台登录错误码
    const ManagerLogin = 'MLG';


    // 登录错误码
    const LG_StatusError1 = 'LG_008';
    const LG_Error1 = 'LG_009';
    const LG_Error2 = 'LG_010';
    const LG_Error3 = 'LG_011';

    const MLG_CreateError = 'MLG0103';
    const AccountIsExists = 'AE_0001';

    // 公共
    const MLG_Error = 'MLG0104';
    const Vl_Error = 'VL0101';

}
