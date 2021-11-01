<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attributeDebe aceptar',
    'active_url'           => ':attributeDebe ser legal URL',
    'after'                => ':attributedebe ser :date Una cita despues',
    'after_or_equal'       => ':attributedebe ser :date Después o en la misma fecha',
    'alpha'                => ':attributeSolo puede contener letras',
    'alpha_dash'           => ':attributeSolo puede contener letras, números, guiones bajos o guiones bajos',
    'alpha_num'            => ':attributeSolo puede contener letras y números',
    'array'                => ':attributeDebe ser una matriz',
    'before'               => ':attributedebe ser :date Una cita antes',
    'before_or_equal'      => ':attributedebe ser :date Fecha anterior o misma',
    'between'              => [
        'numeric' => ':attributetiene que ser :min llegar :max Entre',
        'file'    => ':attributetiene que ser :min llegar :max KB Entre',
        'string'  => ':attributetiene que ser :min llegar :max Entre personajes',
        'array'   => ':attributetiene que ser :min llegar :max Entre elementos',
    ],
    'boolean'              =>':attributeLos personajes deben ser true ofalse, 1 o 0 ',
    'confirmed'            => ':attributeLa segunda confirmación no coincide',
    'date'                 => ':attributeDebe ser una fecha legal',
    'date_equals'          => ':attributeDebe ser igual a :date',
    'date_format'          => ':attributeCon el formato dado :format incompatible',
    'different'            => ':attributeDebe ser diferente de :other',
    'digits'               => ':attributedebe ser :digits Poco.',
    'digits_between'       => ':attributetiene que ser :min con :max Entre bits',
    'dimensions'           => ':attributeTiene un tamaño de imagen no válido',
    'distinct'             => ':attributeEl campo tiene valores duplicados',
    'email'                => ':attributeDebe ser una dirección de correo electrónico válida',
    'ends_with'            => ':attributeDebe terminar con uno de los siguientes: :values.',
    'exists'               => 'Seleccionado:attributeno es válido.',
    'file'                 => ':attribute必须是一个文件',
    'filled'               => ':attribute的字段是必填的',
    'gt' => [
        'numeric'   => ':attributeDebe ser mayor que :value.',
        'file'      => ':attributeDebe ser mayor que :value KB.',
        'string'    => ':attributeDebe ser mayor que :value personaje.',
        'array'     => ':attributeDebe ser mayor que :value proyecto.',
    ],
    'gte' => [
        'numeric'   => ':attributeDebe ser mayor o igual que :value.',
        'file'      => ':attributeDebe ser mayor o igual que :value kb.',
        'string'    => ':attributeDebe ser mayor o igual que :value personaje.',
        'array'     => ':attributeDebe ser mayor o igual que :value proyecto.',
    ],
    'image'                => ':attributedebe ser jpeg, png, bmp o gif o Imagen en formato',
    'in'                   => 'Seleccionado :attributeno es válido',
    'in_array'             => ':attributeEl campo no existe en :other',
    'integer'              => ':attributeDebe ser un entero',
    'ip'                   => ':attributeDebe ser una dirección IP legal。',
    'ipv4'                 => ':attributeDebe ser una dirección IPv4 válida。',
    'ipv6'                 => ':attributeDebe ser una dirección IPv6 válida。',
    'json'                 => ':attributeDebe ser una cadena JSON válida',
    'lt' => [
        'numeric'   => ':attributeDebe ser menor que :value.',
        'file'      => ':attributeDebe ser menor que :value KB.',
        'string'    => ':attributeDebe ser menor que :value personaje.',
        'array'     => ':attributeDebe ser menor que :value proyecto.',
    ],
    'lte' => [
        'numeric'   => ':attributeDebe ser menor o igual que :value.',
        'file'      => ':attributeDebe ser menor o igual que :value KB.',
        'string'    => ':attributeDebe ser menor o igual que :value personaje.',
        'array'     => ':attributeDebe ser menor o igual que :value proyecto.',
    ],
    'max'                  => [
        'numeric' => ':attributeEl valor máximo es :max',
        'file'    => ':attributeEl máximo es :max KB',
        'string'  => ':attributeLa longitud máxima es :max Caracteres',
        'array'   => ':attributeEl número máximo de es :max individual.',
    ],
    'mimes'                => ':attributeEl tipo de archivo debe ser :values',
    'mimetypes'            => ':attributeEl tipo de archivo debe ser :values',
    'min'                  => [
        'numeric' => ':attributeEl valor mínimo es :min',
        'file'    => ':attributeTamaño al menos :min KB',
        'string'  => ':attributeLa longitud mínima es :min personaje',
        'array'   => ':attributePor lo menos :min artículo',
    ],
    'multiple_of' => ':attributedebe ser :value Múltiple de.',
    'not_in'               => 'Seleccionado :attributeno es válido',
    'not_regex'   => ':attributeFormato inválido',
    'numeric'              => ':attributeTiene que ser un número',
    'password'    => 'contraseña incorrecta',
    'present'              => ':attributeEl campo debe existir',
    'regex'                => ':attributeEl formato no es válido',
    'required'             => ':attributeSe requiere campo',
    'required_if'          => ':attributeSe requiere campo :other sí :value',
    'required_unless'      => ':attributeEl campo es obligatorio a menos que :other Es en :values medio',
    'required_with'        => ':attributeSe requiere campo :values Existe',
    'required_with_all'    => ':attributeSe requiere campo :values Existe',
    'required_without'     => ':attributeSe requiere campo :values No existe',
    'required_without_all' => ':attributeSe requiere campo ninguno :values Existe',
    'same'                 => ':attributecon:otherDebe coincidir con',
    'size'                 => [
        'numeric' => ':attributedebe ser :size Poco',
        'file'    => ':attributedebe ser :size KB',
        'string'  => ':attributedebe ser :size Caracteres',
        'array'   => ':attributeDebe incluir :size artículo',
    ],
    'starts_with' => ':attributeDebe comenzar con uno de los siguientes: :values.',
    'string'               => ':attributeDebe ser una cuerda',
    'timezone'             => ':attributeDebe ser una zona horaria válida.',
    'unique'               => ':attributeexistió',
    'uploaded' => ':attributesubida fallida',
    'url'                  => ':attributeFormato inválido',
    'uuid' => ':attributeDebe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [

    ],

];
