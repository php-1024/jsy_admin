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

    '200' => 'success.',
    '419' => 'error.',
    /**
     * LG => Login 기준 치수
     */
//    ErrorCode::LG_UserNotFind => '현재 사용자가 존재하지 않습니다. 확인하고 다시 입력하십시오.',
//    ErrorCode::LG_UserCodeError => 'WeChat에 연결하지 못했습니다. 나중에 다시 시도해 주세요.',
//    ErrorCode::LG_UserUnionidError => 'WeChat에 연결하지 못했습니다. 나중에 다시 시도해 주세요.',
//    ErrorCode::LG_PhoneCodeError => '입력한 전화 인증 코드가 잘못되었습니다.',
//    ErrorCode::LG_SendCodeError => 'SMS 메시지를 보내지 못했습니다. 나중에 다시 시도해 주세요.',
//    ErrorCode::LG_UserSaveError => '불가항력으로 인해 승인에 실패했습니다.',



    /**
     * MLG => 백그라운드 로그인 모듈
     */
    ErrorCode::MLG_UserNotFind => '사용자가 존재하지 않습니다',
    ErrorCode::MLG_PasswordError => '잘못된 비밀번호',



    /**
     * MM => 백스테이지 멤버십 모듈
     */
    ErrorCode::MM_NotFind => '사용자가 존재하지 않습니다',
    ErrorCode::MM_ConfigNotFind => '사용자 수준 구성 항목이 존재하지 않습니다',


    /**
     * PERR => 백그라운드 권한 모듈
     */
    ErrorCode::PERR_RolesNotFind => '역할이 존재하지 않습니다',
    ErrorCode::PERR_PerMissNotFind => '권한이 존재하지 않습니다',
    ErrorCode::PERR_AdminUserNotFind => '사용자가 존재하지 않습니다',



    ErrorCode::EMAIL_EXIST => '이메일이 이미 존재합니다',
    ErrorCode::EMAIL_CODE_SEND => '인증 코드가 현재 사서함으로 전송되었습니다. 나중에 다시 시도해 주세요.',
    ErrorCode::LG_EmailCodeError => '이메일 인증 코드 오류',
    ErrorCode::LG_UserNotFind => '사용자가 존재하지 않습니다',
    ErrorCode::LG_PassWordError => '잘못된 로그인 비밀번호',
    ErrorCode::LG_ShareCodeError => '공유 초대 코드 오류',
    ErrorCode::LG_EmailError => '이메일이 이미 존재합니다',
    ErrorCode::WL_RechargeExist => '현재 충전 중인 기존 주문이 있습니다.',
    ErrorCode::WL_WithdrawalError => '수량은 수수료보다 작을 수 없습니다.',
    ErrorCode::WL_PayPassError => '잘못된 결제 비밀번호',
    ErrorCode::MC_CurrencyError => '통화가 존재하지 않습니다',
    ErrorCode::MC_SecondsError => '만료 시간이 허용되지 않음',
    ErrorCode::MC_WalletError => '사용자 지갑이 존재하지 않습니다',
    ErrorCode::MC_NumberError => '잘못된 주문 수',
    ErrorCode::MC_MaxOrderError => '주문 실패: 최대 포지션 수 한도 초과',
    ErrorCode::MC_MoneyError => '주문 실패: 지갑 잔액 부족',
    ErrorCode::MC_CurrencyQuotationError => '시장 데이터가 존재하지 않습니다',
    ErrorCode::MC_ChangeError => '전송 유형이 일치하지 않습니다.',

    ErrorCode::ML_LeverError1 => '데이터를 찾을 수 없음',
    ErrorCode::ML_LeverError2 => '운영할 권리가 없음',
    ErrorCode::ML_LeverError3 => '비정상적인 거래 상태，반복적으로 제출하지 마십시오',
    ErrorCode::ML_LeverError4 => '실패，다시 시도하십시오',
    ErrorCode::ML_LeverError5 => '비정상적인 거래，포지션을 청산할 수 없음',
    ErrorCode::ML_LeverError6 => '이 거래 쌍의 거래 기능을 활성화하지 않았습니다',
    ErrorCode::ML_LeverError7 => '로트 크기는 0보다 큰 정수여야 합니다',
    ErrorCode::ML_LeverError8 => '손의 수는 다음보다 작을 수 없습니다',
    ErrorCode::ML_LeverError9 => '손의 수는 다음보다 높을 수 없습니다',
    ErrorCode::ML_LeverError10 => '선택 배수가 시스템 범위에 없습니다',
    ErrorCode::ML_LeverError11 => '잔액 불충분，보다 작을 수 없음',



    // 韩语
    // 小窝新建-2021-10-04
    ErrorCode::LG_StatusError1 => '계정이 동결되어 죄송합니다. 궁금한 사항이 있으시면 담당 직원에게 문의해주세요!',

];
