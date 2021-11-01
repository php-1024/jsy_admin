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


    TypeCode::WO_RECHARGE_SUCCESS => "Recharge record passed",
    TypeCode::WO_WITHDRAWAL_APPLY => "Apply for withdrawal",
    TypeCode::WO_WITHDRAWAL_ERROR => "Application for withdrawal failed",
    TypeCode::WO_Micro_Fee => "Transaction fee deducted in seconds",
    TypeCode::WO_Micro_Buy => "Second transaction deducts the purchase quantity",
    TypeCode::WO_Micro_Buy_S => "Second contract order closing, profit settlement",
    TypeCode::WO_Micro_Buy_E => "Second contract order, loss settlement",
    TypeCode::WO_Micro_Buy_P => "Second contract order settlement settlement, tie settlement",
    TypeCode::WO_Micro_Change => "Transfer",

    TypeCode::WO_Lever_Close => "Liquidation funds processing",
    TypeCode::WO_Lever_Submit => "submit",
    TypeCode::WO_Lever_Price1 => "Margin trading deduction",
    TypeCode::WO_Lever_Price2 => "Margin trading deduction fee",

    TypeCode::WO_Balance_1 => "Fiat currency",
    TypeCode::WO_Balance_2 => "Currency transaction",
    TypeCode::WO_Balance_3 => "Leveraged trading",
    TypeCode::WO_Balance_4 => "Second contract",


];
