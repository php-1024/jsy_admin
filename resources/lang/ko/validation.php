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

    'accepted'             => ':attribute수락해야 함',
    'active_url'           => ':attribute합법이어야 한다 URL',
    'after'                => ':attribute이어야 한다 :date 날짜 이후',
    'after_or_equal'       => ':attribute이어야 한다 :date 이후 또는 같은 날짜',
    'alpha'                => ':attribute문자만 포함할 수 있습니다.',
    'alpha_dash'           => ':attribute문자, 숫자, 밑줄 또는 밑줄만 포함할 수 있습니다.',
    'alpha_num'            => ':attribute문자와 숫자만 포함할 수 있습니다.',
    'array'                => ':attribute배열이어야 합니다.',
    'before'               => ':attribute必须是 :date 이전 날짜',
    'before_or_equal'      => ':attribute必须是 :date 이전 날짜 또는 같은 날짜',
    'between'              => [
        'numeric' => ':attribute될거야 :min 도착하다 :max ~ 사이',
        'file'    => ':attribute될거야 :min 도착하다 :max KB ~ 사이',
        'string'  => ':attribute될거야 :min 도착하다 :max 문자 사이',
        'array'   => ':attribute될거야 :min 도착하다 :max 항목 사이',
    ],
    'boolean'              =>':attribute문자는 다음과 같아야 합니다. true 또는false, 1 또는 0 ',
    'confirmed'            => ':attribute두 번째 확인이 일치하지 않습니다.',
    'date'                 => ':attribute법적 날짜여야 합니다.',
    'date_equals'          => ':attribute다음과 같아야 합니다. :date',
    'date_format'          => ':attribute주어진 형식으로 :format 호환되지 않는',
    'different'            => ':attribute와 달라야 합니다. :other',
    'digits'               => ':attribute이어야 한다 :digits 조금.',
    'digits_between'       => ':attribute될거야 :min ~와 함께 :max 비트 사이',
    'dimensions'           => ':attribute이미지 크기가 잘못되었습니다.',
    'distinct'             => ':attribute필드에 중복 값이있습니다.',
    'email'                => ':attribute유효한 이메일 주소이어야합니다',
    'ends_with'            => ':attribute다음 중 하나로 끝나야 합니다.: :values.',
    'exists'               => '选定的:attribute유효하지 않다.',
    'file'                 => ':attribute파일이어야 합니다.',
    'filled'               => ':attribute필드는 필수 항목입니다.',
    'gt' => [
        'numeric'   => ':attribute다음보다 커야 합니다. :value.',
        'file'      => ':attribute다음보다 커야 합니다. :value KB.',
        'string'    => ':attribute다음보다 커야 합니다. :value 캐릭터.',
        'array'     => ':attribute다음보다 커야 합니다. :value 프로젝트.',
    ],
    'gte' => [
        'numeric'   => ':attribute다음보다 크거나 같아야 합니다. :value.',
        'file'      => ':attribute다음보다 크거나 같아야 합니다. :value kb.',
        'string'    => ':attribute다음보다 크거나 같아야 합니다. :value 캐릭터.',
        'array'     => ':attribute다음보다 크거나 같아야 합니다. :value 프로젝트.',
    ],
    'image'                => ':attribute이어야 한다 jpeg, png, bmp 또는 gif 그림 형식 지정',
    'in'                   => '선택된 :attribute유효하지 않다',
    'in_array'             => ':attribute필드가 에 존재하지 않습니다. :other',
    'integer'              => ':attribute정수여야 합니다.',
    'ip'                   => ':attribute합법이어야 한다 IP 주소。',
    'ipv4'                 => ':attribute합법이어야 한다 IPv4 주소',
    'ipv6'                 => ':attribute합법이어야 한다 IPv6 주소',
    'json'                 => ':attribute합법이어야 한다 JSON 캐릭터',
    'lt' => [
        'numeric'   => ':attribute다음보다 작아야 합니다. :value.',
        'file'      => ':attribute다음보다 작아야 합니다. :value KB.',
        'string'    => ':attribute다음보다 작아야 합니다. :value 다음보다야..',
        'array'     => ':attribute다음보다 작아야 합니다. :value 프로젝트.',
    ],
    'lte' => [
        'numeric'   => ':attribute다음보다 작거나 같아야 합니다. :value.',
        'file'      => ':attribute다음보다 작거나 같아야 합니다. :value KB.',
        'string'    => ':attribute다음보다 작거나 같아야 합니다. :value 캐릭터.',
        'array'     => ':attribute다음보다 작거나 같아야 합니다. :value 프로젝트.',
    ],
    'max'                  => [
        'numeric' => ':attribute최대값은 :max',
        'file'    => ':attribute최대값은 :max KB',
        'string'  => ':attribute최대 길이는 :max 캐릭터',
        'array'   => ':attribute的최대 수는 :max 개인.',
    ],
    'mimes'                => ':attribute파일 형식은 다음과 같아야 합니다. :values',
    'mimetypes'            => ':attribute파일 형식은 다음과 같아야 합니다. :values',
    'min'                  => [
        'numeric' => ':attribute최소값은 :min',
        'file'    => ':attribute크기 이상 :min KB',
        'string'  => ':attribute최소 길이는 :min 캐릭터',
        'array'   => ':attribute적어도 :min 안건',
    ],
    'multiple_of' => ':attribute이어야 한다 :value 여러.',
    'not_in'               => '선택된 :attribute유효하지 않다',
    'not_regex'   => ':attribute잘못된 형식',
    'numeric'              => ':attribute숫자여야 합니다.',
    'password'    => '잘못된 비밀번호',
    'present'              => ':attribute필드가 있어야 합니다.',
    'regex'                => ':attribute형식이 잘못되었습니다.',
    'required'             => ':attribute필드는 필수 항목입니다.',
    'required_if'          => ':attribute필드는 필수 항목입니다. :other 예 :value',
    'required_unless'      => ':attribute다음을 제외하고 필드는 필수입니다. :other 에 있음 :values 가운데',
    'required_with'        => ':attribute필드는 필수 항목입니다. :values 존재한다',
    'required_with_all'    => ':attribute필드는 필수 항목입니다. :values 존재한다',
    'required_without'     => ':attribute필드는 필수 항목입니다. :values 존재하지 않는다',
    'required_without_all' => ':attribute필드가 없을 때 필수 필드입니다. :values 존재한다',
    'same'                 => ':attribute和:other일치해야합니다',
    'size'                 => [
        'numeric' => ':attribute이어야 한다 :size 조금',
        'file'    => ':attribute이어야 한다 :size KB',
        'string'  => ':attribute이어야 한다 :size 캐릭터',
        'array'   => ':attribute포함해야 함 :size 안건',
    ],
    'starts_with' => ':attribute다음 중 하나로 시작해야 합니다.: :values.',
    'string'               => ':attribute문자열이어야 합니다.',
    'timezone'             => ':attribute유효한 시간대여야 합니다.',
    'unique'               => ':attribute존재했다',
    'uploaded' => ':attribute업로드 실패',
    'url'                  => ':attribute잘못된 형식',
    'uuid' => ':attribute효율적이어야 한다UUID.',

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
