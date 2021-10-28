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

    'accepted'             => ':attribute必須接受',
    'active_url'           => ':attribute必須是一個合法的 URL',
    'after'                => ':attribute必須是 :date 之後的一個日期',
    'after_or_equal'       => ':attribute必須是 :date 之後或相同的一個日期',
    'alpha'                => ':attribute只能包含字母',
    'alpha_dash'           => ':attribute只能包含字母、數字、中劃線或下劃線',
    'alpha_num'            => ':attribute只能包含字母和數字',
    'array'                => ':attribute必須是一個數組',
    'before'               => ':attribute必須是 :date 之前的一個日期',
    'before_or_equal'      => ':attribute必須是 :date 之前或相同的一個日期',
    'between'              => [
        'numeric' => ':attribute必須在 :min 到 :max 之間',
        'file'    => ':attribute必須在 :min 到 :max KB 之間',
        'string'  => ':attribute必須在 :min 到 :max 個字符之間',
        'array'   => ':attribute必須在 :min 到 :max 項之間',
    ],
    'boolean'              =>':attribute字符必須是 true 或false, 1 或 0 ',
    'confirmed'            => ':attribute二次確認不匹配',
    'date'                 => ':attribute必須是一個合法的日期',
    'date_equals'          => ':attribute必須等於 :date',
    'date_format'          => ':attribute與給定的格式 :format 不符合',
    'different'            => ':attribute必須不同於 :other',
    'digits'               => ':attribute必須是 :digits 位.',
    'digits_between'       => ':attribute必須在 :min 和 :max 位之間',
    'dimensions'           => ':attribute具有無效的圖片尺寸',
    'distinct'             => ':attribute字段具有重復值',
    'email'                => ':attribute必須是一個合法的電子郵件地址',
    'ends_with'            => ':attribute必須以下列之一結尾: :values.',
    'exists'               => '選定的:attribute是無效的.',
    'file'                 => ':attribute必須是一個文件',
    'filled'               => ':attribute的字段是必填的',
    'gt' => [
        'numeric'   => ':attribute必須大於 :value.',
        'file'      => ':attribute必須大於 :value KB.',
        'string'    => ':attribute必須大於 :value 字符.',
        'array'     => ':attribute必須大於 :value 項目.',
    ],
    'gte' => [
        'numeric'   => ':attribute必須大於或等於 :value.',
        'file'      => ':attribute必須大於或等於 :value kb.',
        'string'    => ':attribute必須大於或等於 :value 字符.',
        'array'     => ':attribute必須大於或等於 :value 項目.',
    ],
    'image'                => ':attribute必須是 jpeg, png, bmp 或者 gif 格式的圖片',
    'in'                   => '選定的 :attribute是無效的',
    'in_array'             => ':attribute字段不存在於 :other',
    'integer'              => ':attribute必須是個整數',
    'ip'                   => ':attribute必須是一個合法的 IP 地址。',
    'ipv4'                 => ':attribute必須是一個合法的 IPv4 地址。',
    'ipv6'                 => ':attribute必須是一個合法的 IPv6 地址。',
    'json'                 => ':attribute必須是一個合法的 JSON 字符串',
    'lt' => [
        'numeric'   => ':attribute必須小於 :value.',
        'file'      => ':attribute必須小於 :value KB.',
        'string'    => ':attribute必須小於 :value 字符.',
        'array'     => ':attribute必須小於 :value 項目.',
    ],
    'lte' => [
        'numeric'   => ':attribute必須小於或等於 :value.',
        'file'      => ':attribute必須小於或等於 :value KB.',
        'string'    => ':attribute必須小於或等於 :value 字符.',
        'array'     => ':attribute必須小於或等於 :value 項目.',
    ],
    'max'                  => [
        'numeric' => ':attribute的最大值為 :max',
        'file'    => ':attribute的最大為 :max KB',
        'string'  => ':attribute的最大長度為 :max 個字符',
        'array'   => ':attribute的最大個數為 :max 個.',
    ],
    'mimes'                => ':attribute的文件類型必須是 :values',
    'mimetypes'            => ':attribute的文件類型必須是 :values',
    'min'                  => [
        'numeric' => ':attribute的最小值為 :min',
        'file'    => ':attribute大小至少為 :min KB',
        'string'  => ':attribute的最小長度為 :min 字符',
        'array'   => ':attribute至少有 :min 項',
    ],
    'multiple_of' => ':attribute必須是 :value 的倍數.',
    'not_in'               => '選定的 :attribute是無效的',
    'not_regex'   => ':attribute格式無效',
    'numeric'              => ':attribute必須是數字',
    'password'    => '密碼錯誤',
    'present'              => ':attribute字段必須存在',
    'regex'                => ':attribute格式是無效的',
    'required'             => ':attribute字段是必須的',
    'required_if'          => ':attribute字段是必須的當 :other 是 :value',
    'required_unless'      => ':attribute字段是必須的，除非 :other 是在 :values 中',
    'required_with'        => ':attribute字段是必須的當 :values 是存在的',
    'required_with_all'    => ':attribute字段是必須的當 :values 是存在的',
    'required_without'     => ':attribute字段是必須的當 :values 是不存在的',
    'required_without_all' => ':attribute字段是必須的當 沒有一個 :values 是存在的',
    'same'                 => ':attribute和:other必須匹配',
    'size'                 => [
        'numeric' => ':attribute必須是 :size 位',
        'file'    => ':attribute必須是 :size KB',
        'string'  => ':attribute必須是 :size 個字符',
        'array'   => ':attribute必須包括 :size 項',
    ],
    'starts_with' => ':attribute必須以下列之一開頭: :values.',
    'string'               => ':attribute必須是一個字符串',
    'timezone'             => ':attribute必須是個有效的時區.',
    'unique'               => ':attribute已存在',
    'uploaded' => ':attribute上傳失敗',
    'url'                  => ':attribute無效的格式',
    'uuid' => ':attribute必須是有效地UUID.',

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
