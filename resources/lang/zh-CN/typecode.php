<?php

use App\Exceptions\ErrorCode;
use App\Exceptions\TypeCode;

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

    TypeCode::WO_RECHARGE_SUCCESS => "充值記錄通過",
    TypeCode::WO_WITHDRAWAL_APPLY => "申請提現",
    TypeCode::WO_WITHDRAWAL_ERROR => "申請提現失敗",
    TypeCode::WO_Micro_Fee => "秒交易扣除手續費",
    TypeCode::WO_Micro_Buy => "秒交易扣除購買數量",
    TypeCode::WO_Micro_Buy_S => "秒合約訂單平倉,盈利結算",
    TypeCode::WO_Micro_Buy_E => "秒合約訂單,虧損結算",
    TypeCode::WO_Micro_Buy_P => "秒合約訂單平倉結算,平局結算",
    TypeCode::WO_Micro_Change => "劃轉",

    TypeCode::WO_Lever_Close => "平倉資金處理",
    TypeCode::WO_Lever_Submit => "提交",
    TypeCode::WO_Lever_Price1 => "槓桿交易扣除保證金",
    TypeCode::WO_Lever_Price2 => "槓桿交易扣除手續費",
    TypeCode::WO_Balance_1 => "法幣",
    TypeCode::WO_Balance_2 => "幣幣交易",
    TypeCode::WO_Balance_3 => "槓桿交易",
    TypeCode::WO_Balance_4 => "秒合約",


];
