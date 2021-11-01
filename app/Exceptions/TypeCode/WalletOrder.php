<?php

namespace App\Exceptions\TypeCode;

interface WalletOrder
{

    const WO_RECHARGE_SUCCESS = 'Wo_0001';
    const WO_WITHDRAWAL_APPLY = 'Wo_0002';
    const WO_WITHDRAWAL_ERROR = 'Wo_0003';
    const WO_Micro_Fee = 'Wo_0004';
    const WO_Micro_Buy = 'Wo_0005';
    const WO_Micro_Buy_S = 'Wo_0006';
    const WO_Micro_Buy_E = 'Wo_0007';
    const WO_Micro_Buy_P = 'Wo_0008';
    const WO_Micro_Change = 'Wo_0009';
    const WO_Lever_Close = 'Wo_0010';
    const WO_Lever_Submit = 'Wo_0011';
    const WO_Lever_Price1 = 'Wo_0012';
    const WO_Lever_Price2 = 'Wo_0013';

    const WO_Balance_1 = 'Wo_B_0001';
    const WO_Balance_2 = 'Wo_B_0002';
    const WO_Balance_3 = 'Wo_B_0003';
    const WO_Balance_4 = 'Wo_B_0004';
}
