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


    TypeCode::WO_RECHARGE_SUCCESS => "충전 기록 통과",
    TypeCode::WO_WITHDRAWAL_APPLY => "탈퇴 신청",
    TypeCode::WO_WITHDRAWAL_ERROR => "탈퇴 신청 실패",
    TypeCode::WO_Micro_Fee => "거래 수수료가 몇 초 만에 차감됨",
    TypeCode::WO_Micro_Buy => "2차 거래에서 구매수량 차감",
    TypeCode::WO_Micro_Buy_S => "2차 계약 체결, 수익 정산",
    TypeCode::WO_Micro_Buy_E => "2차 계약금, 손실 정산",
    TypeCode::WO_Micro_Buy_P => "2차 계약금 정산, 동점 정산",
    TypeCode::WO_Micro_Change => "옮기다",

    TypeCode::WO_Lever_Close => "청산 자금 처리",
    TypeCode::WO_Lever_Submit => "제출하다",
    TypeCode::WO_Lever_Price1 => "마진 거래 공제",
    TypeCode::WO_Lever_Price2 => "마진 거래 공제 수수료",
    TypeCode::WO_Balance_1 => "법정화폐",
    TypeCode::WO_Balance_2 => "통화 거래",
    TypeCode::WO_Balance_3 => "레버리지 거래",
    TypeCode::WO_Balance_4 => "두 번째 계약",


];
