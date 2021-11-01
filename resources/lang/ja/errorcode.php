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
     * LG => Login モジュール
     */
//    ErrorCode::LG_UserNotFind => '現在のユーザーは存在しません。確認して再入力してください',
//    ErrorCode::LG_UserCodeError => 'WeChatに接続できませんでした。しばらくしてからもう一度お試しください',
//    ErrorCode::LG_UserUnionidError => 'WeChatに接続できませんでした。しばらくしてからもう一度お試しください',
//    ErrorCode::LG_PhoneCodeError => '入力した電話確認コードが正しくありません',
//    ErrorCode::LG_SendCodeError => 'SMSメッセージの送信に失敗しました。しばらくしてからもう一度お試しください',
//    ErrorCode::LG_UserSaveError => '不可抗力により、承認に失敗しました',


    /**
     * MLG => バックグラウンドログインモジュール
     */
    ErrorCode::MLG_UserNotFind       => 'ユーザーは存在しません',
    ErrorCode::MLG_PasswordError     => '間違ったパスワード',


    /**
     * MM => 舞台裏メンバーシップモジュール
     */
    ErrorCode::MM_NotFind            => 'ユーザーは存在しません',
    ErrorCode::MM_ConfigNotFind      => 'ユーザーレベルの構成アイテムが存在しません',


    /**
     * PERR => バックグラウンド許可モジュール
     */
    ErrorCode::PERR_RolesNotFind     => '役割は存在しません',
    ErrorCode::PERR_PerMissNotFind   => '許可がありません',
    ErrorCode::PERR_AdminUserNotFind => 'ユーザーは存在しません',


    ErrorCode::EMAIL_EXIST               => 'メールは既に存在します',
    ErrorCode::EMAIL_CODE_SEND           => '確認コードが現在のメールボックスに送信されました。しばらくしてからもう一度お試しください',
    ErrorCode::LG_EmailCodeError         => 'メール確認コードエラー',
    ErrorCode::LG_UserNotFind            => 'ユーザーは存在しません',
    ErrorCode::LG_PassWordError          => 'ログインパスワードが正しくありません',
    ErrorCode::LG_ShareCodeError         => '招待コードの共有エラー',
    ErrorCode::LG_EmailError             => 'メールは既に存在します',
    ErrorCode::WL_RechargeExist          => '現在、リチャージ中の既存の注文があります',
    ErrorCode::WL_WithdrawalError        => '数量は手数料を下回ることはできません',
    ErrorCode::WL_PayPassError           => '間違った支払いパスワード',
    ErrorCode::MC_CurrencyError          => '通貨は存在しません',
    ErrorCode::MC_SecondsError           => '有効期限は許可されていません',
    ErrorCode::MC_WalletError            => 'ユーザーウォレットが存在しません',
    ErrorCode::MC_NumberError            => '注文数が間違っています',
    ErrorCode::MC_MaxOrderError          => '注文に失敗しました：最大ポジション数の制限を超えました',
    ErrorCode::MC_MoneyError             => '注文に失敗しました：ウォレットの残高が不十分です',
    ErrorCode::MC_CurrencyQuotationError => '市場データは存在しません',
    ErrorCode::MC_ChangeError            => '転送タイプが一致しません',


    ErrorCode::ML_LeverError1  => 'データが見つかりません',
    ErrorCode::ML_LeverError2  => '操作する権利がありません',
    ErrorCode::ML_LeverError3  => '異常な取引状況，繰り返し提出しないでください',
    ErrorCode::ML_LeverError4  => '販売に失敗しました，もう一度やり直してください',
    ErrorCode::ML_LeverError5  => '異常な取引，ポジションを閉じることができません',
    ErrorCode::ML_LeverError6  => 'このトレーディングペアのトレーディング機能を有効にしていません',
    ErrorCode::ML_LeverError7  => 'ロットサイズは0より大きい整数である必要があります',
    ErrorCode::ML_LeverError8  => 'ハンドの数は以下にすることはできません',
    ErrorCode::ML_LeverError9  => 'ハンドの数はこれより多くすることはできません',
    ErrorCode::ML_LeverError10 => '複数選択はシステムスコープにありません',
    ErrorCode::ML_LeverError11 => '残高不足です,未満にすることはできません',


    // 日语
    // 小窝新建-2021-10-04
    ErrorCode::LG_StatusError1 => 'アカウントが凍結されて申し訳ありません。ご不明な点がございましたら、関係スタッフにお問い合わせください。',
];
