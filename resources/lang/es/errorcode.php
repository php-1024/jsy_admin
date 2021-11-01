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
     * LG => Login Módulo
     */
//    ErrorCode::LG_UserNotFind => 'El usuario actual no existe, confirme y vuelva a ingresar',
//    ErrorCode::LG_UserCodeError => 'No se pudo conectar a WeChat. Vuelve a intentarlo más tarde.',
//    ErrorCode::LG_UserUnionidError => 'No se pudo conectar a WeChat. Vuelve a intentarlo más tarde.',
//    ErrorCode::LG_PhoneCodeError => 'El código de verificación del teléfono ingresado es incorrecto',
//    ErrorCode::LG_SendCodeError => 'No se pudo enviar el mensaje SMS. Vuelve a intentarlo más tarde.',
//    ErrorCode::LG_UserSaveError => 'Por fuerza mayor, la autorización falló',


    /**
     * MLG => Módulo de inicio de sesión en segundo plano
     */
    ErrorCode::MLG_UserNotFind       => 'el usuario no existe',
    ErrorCode::MLG_PasswordError     => 'contraseña incorrecta',


    /**
     * MM => Módulo de membresía entre bastidores
     */
    ErrorCode::MM_NotFind            => 'el usuario no existe',
    ErrorCode::MM_ConfigNotFind      => 'El elemento de configuración de nivel de usuario no existe',


    /**
     * PERR => Módulo de permisos en segundo plano
     */
    ErrorCode::PERR_RolesNotFind     => 'El rol no existe',
    ErrorCode::PERR_PerMissNotFind   => 'El permiso no existe',
    ErrorCode::PERR_AdminUserNotFind => 'el usuario no existe',


    ErrorCode::EMAIL_EXIST               => 'el Email ya existe',
    ErrorCode::EMAIL_CODE_SEND           => 'El código de verificación se ha enviado al buzón actual. Vuelva a intentarlo más tarde.',
    ErrorCode::LG_EmailCodeError         => 'Error de código de verificación de correo electrónico',
    ErrorCode::LG_UserNotFind            => 'el usuario no existe',
    ErrorCode::LG_PassWordError          => 'Contraseña de inicio de sesión incorrecta',
    ErrorCode::LG_ShareCodeError         => 'Compartir error de código de invitación',
    ErrorCode::LG_EmailError             => 'el Email ya existe',
    ErrorCode::WL_RechargeExist          => 'Actualmente hay pedidos existentes en recarga',
    ErrorCode::WL_WithdrawalError        => 'La cantidad no puede ser menor que la tarifa de manejo.',
    ErrorCode::WL_PayPassError           => 'Contraseña de pago incorrecta',
    ErrorCode::MC_CurrencyError          => 'La moneda no existe',
    ErrorCode::MC_SecondsError           => 'Tiempo de vencimiento no permitido',
    ErrorCode::MC_WalletError            => 'La billetera de usuario no existe',
    ErrorCode::MC_NumberError            => 'Número incorrecto de pedidos',
    ErrorCode::MC_MaxOrderError          => 'Error al realizar un pedido: superó el límite del número máximo de posiciones',
    ErrorCode::MC_MoneyError             => 'Pedido fallido: saldo de cartera insuficiente',
    ErrorCode::MC_CurrencyQuotationError => 'Los datos de mercado no existen',
    ErrorCode::MC_ChangeError            => 'El tipo de transferencia no coincide',


    ErrorCode::ML_LeverError1  => 'Datos no encontrados',
    ErrorCode::ML_LeverError2  => 'Sin derecho a operar',
    ErrorCode::ML_LeverError3  => 'Estado de transacción anormal,No envíe repetidamente',
    ErrorCode::ML_LeverError4  => 'Fracasado,Inténtalo de nuevo',
    ErrorCode::ML_LeverError5  => 'Transacción anormal，Incapaz de cerrar la posición',
    ErrorCode::ML_LeverError6  => 'No ha activado la función comercial de este par comercial.',
    ErrorCode::ML_LeverError7  => 'El tamaño del lote debe ser un número entero mayor que 0',
    ErrorCode::ML_LeverError8  => 'El número de manos no puede ser menor que',
    ErrorCode::ML_LeverError9  => 'El número de manos no puede ser mayor que',
    ErrorCode::ML_LeverError10 => 'La selección múltiple no está en el alcance del sistema',
    ErrorCode::ML_LeverError11 => 'Saldo insuficiente,No puede ser menor que',


    // 西班牙语
    // 小窝新建-2021-10-04
    ErrorCode::LG_StatusError1 => 'Lamentamos que su cuenta se haya congelado. Si tiene alguna pregunta, comuníquese con el personal correspondiente.',
];
