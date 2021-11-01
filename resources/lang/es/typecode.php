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


    TypeCode::WO_RECHARGE_SUCCESS => "Recargar record pasado",
    TypeCode::WO_WITHDRAWAL_APPLY => "Solicitar retiro",
    TypeCode::WO_WITHDRAWAL_ERROR => "La solicitud de retiro falló",
    TypeCode::WO_Micro_Fee => "Tarifa de transacción deducida en segundos",
    TypeCode::WO_Micro_Buy => "La segunda transacción deduce la cantidad de compra",
    TypeCode::WO_Micro_Buy_S => "Cierre de la segunda orden de contrato, liquidación de beneficios",
    TypeCode::WO_Micro_Buy_E => "Segunda orden de contrato, liquidación de pérdidas",
    TypeCode::WO_Micro_Buy_P => "Liquidación de segunda orden de contrato, liquidación de empate",
    TypeCode::WO_Micro_Change => "Transferir",


    TypeCode::WO_Lever_Close => "Procesamiento de fondos de liquidación",
    TypeCode::WO_Lever_Submit => "enviar",
    TypeCode::WO_Lever_Price1 => "Deducción de margen comercial",
    TypeCode::WO_Lever_Price2 => "Tarifa de deducción por negociación de margen",
    TypeCode::WO_Balance_1 => "moneda fiduciaria",
    TypeCode::WO_Balance_2 => "Transacción de moneda",
    TypeCode::WO_Balance_3 => "Trading apalancado",
    TypeCode::WO_Balance_4 => "Segundo contrato",


];
