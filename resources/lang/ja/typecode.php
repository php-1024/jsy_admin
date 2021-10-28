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


    TypeCode::WO_RECHARGE_SUCCESS => "充電記録に合格",
    TypeCode::WO_WITHDRAWAL_APPLY => "撤退を申請する",
    TypeCode::WO_WITHDRAWAL_ERROR => "撤回の申請に失敗しました",
    TypeCode::WO_Micro_Fee => "秒単位で差し引かれる取引手数料",
    TypeCode::WO_Micro_Buy => "2番目のトランザクションは購入数量を差し引きます",
    TypeCode::WO_Micro_Buy_S => "2回目の契約締結、利益決済",
    TypeCode::WO_Micro_Buy_E => "2回目の契約注文、損失決済",
    TypeCode::WO_Micro_Buy_P => "二次契約注文決済決済、ネクタイ決済",
    TypeCode::WO_Micro_Change => "移行",

    TypeCode::WO_Lever_Close => "清算資金処理",
    TypeCode::WO_Lever_Submit => "参加する",
    TypeCode::WO_Lever_Price1 => "証拠金取引控除",
    TypeCode::WO_Lever_Price2 => "証拠金取引手数料",
    TypeCode::WO_Balance_1 => "法定通貨",
    TypeCode::WO_Balance_2 => "通貨取引",
    TypeCode::WO_Balance_3 => "レバレッジ取引",
    TypeCode::WO_Balance_4 => "2番目の契約",


];
