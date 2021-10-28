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

    'accepted'             => ':attribute受け入れる必要があります',
    'active_url'           => ':attribute合法である必要があります URL',
    'after'                => ':attributeでなければなりません :date 後の日付',
    'after_or_equal'       => ':attributeでなければなりません :date 後または同じ日付',
    'alpha'                => ':attribute文字のみを含めることができます',
    'alpha_dash'           => ':attribute文字、数字、アンダースコア、またはアンダースコアのみを含めることができます',
    'alpha_num'            => ':attribute文字と数字のみを含めることができます',
    'array'                => ':attribute配列である必要があります',
    'before'               => ':attributeでなければなりません :date 前の日付',
    'before_or_equal'      => ':attributeでなければなりません :date 前または同じ日付',
    'between'              => [
        'numeric' => ':attributeお奨め :min 到着 :max の間に',
        'file'    => ':attributeお奨め :min 到着 :max KB の間に',
        'string'  => ':attributeお奨め :min 到着 :max 文字間',
        'array'   => ':attributeお奨め :min 到着 :max アイテム間',
    ],
    'boolean'              =>':attribute文字は true またfalse, 1 また 0 ',
    'confirmed'            => ':attribute2番目の確認が一致しません',
    'date'                 => ':attribute法定日である必要があります',
    'date_equals'          => ':attribute等しい必要があります :date',
    'date_format'          => ':attribute与えられたフォーマットで :format 非互換',
    'different'            => ':attributeとは異なる必要があります :other',
    'digits'               => ':attributeでなければなりません :digits 少し.',
    'digits_between'       => ':attributeお奨め :min と :max ビット間',
    'dimensions'           => ':attribute画像サイズが無効です',
    'distinct'             => ':attributeフィールドの値が重複しています',
    'email'                => ':attribute有効な電子メールアドレスでなければなりません',
    'ends_with'            => ':attribute次のいずれかで終了する必要があります: :values.',
    'exists'               => '選択済み:attribute無効です.',
    'file'                 => ':attributeファイルである必要があります',
    'filled'               => ':attributeフィールドは必須です',
    'gt' => [
        'numeric'   => ':attributeより大きい必要があります :value.',
        'file'      => ':attributeより大きい必要があります :value KB.',
        'string'    => ':attributeより大きい必要があります :value キャラクター.',
        'array'     => ':attributeより大きい必要があります :value 事業.',
    ],
    'gte' => [
        'numeric'   => ':attribute以上である必要があります :value.',
        'file'      => ':attribute以上である必要があります :value kb.',
        'string'    => ':attribute以上である必要があります :value キャラクター.',
        'array'     => ':attribute以上である必要があります :value 事業.',
    ],
    'image'                => ':attributeでなければなりません jpeg, png, bmp また gif 形式の画像',
    'in'                   => '選択済み :attribute無効です',
    'in_array'             => ':attributeフィールドはに存在しません :other',
    'integer'              => ':attribute整数である必要があります',
    'ip'                   => ':attribute正当なIPアドレスである必要があります。',
    'ipv4'                 => ':attribute有効なIPv4アドレスである必要があります。',
    'ipv6'                 => ':attribute有効なIPv6アドレスである必要があります。',
    'json'                 => ':attribute有効なJSON文字列である必要があります',
    'lt' => [
        'numeric'   => ':attribute未満である必要があります :value.',
        'file'      => ':attribute未満である必要があります :value KB.',
        'string'    => ':attribute未満である必要があります :value キャラクター.',
        'array'     => ':attribute未満である必要があります :value 事業.',
    ],
    'lte' => [
        'numeric'   => ':attribute以下である必要があります :value.',
        'file'      => ':attribute以下である必要があります :value KB.',
        'string'    => ':attribute以下である必要があります :value キャラクター.',
        'array'     => ':attribute以下である必要があります :value 事業.',
    ],
    'max'                  => [
        'numeric' => ':attribute最大値は :max',
        'file'    => ':attribute最大値は :max KB',
        'string'  => ':attribute最大値は :max キャラクター',
        'array'   => ':attribute最大値は :max 個.',
    ],
    'mimes'                => ':attributeファイルタイプは次のようにする必要があります :values',
    'mimetypes'            => ':attributeファイルタイプは次のようにする必要があります :values',
    'min'                  => [
        'numeric' => ':attribute最小値は :min',
        'file'    => ':attribute少なくともサイズ :min KB',
        'string'  => ':attribute最小の長さは :min キャラクター',
        'array'   => ':attribute少なくとも :min アイテム',
    ],
    'multiple_of' => ':attributeでなければなりません :value の倍数.',
    'not_in'               => '選択済み :attribute無効です',
    'not_regex'   => ':attribute無効な形式',
    'numeric'              => ':attribute数字でなければなりません',
    'password'    => '間違ったパスワード',
    'present'              => ':attributeフィールドが存在する必要があります',
    'regex'                => ':attributeフォーマットが無効です',
    'required'             => ':attributeフィールドは必須項目です',
    'required_if'          => ':attributeフィールドは必須項目です :other はい :value',
    'required_unless'      => ':attribute場合を除いてフィールドは必須です :other にあります :values 真ん中',
    'required_with'        => ':attributeフィールドは必須項目です :values それが存在します',
    'required_with_all'    => ':attributeフィールドは必須項目です :values それが存在します',
    'required_without'     => ':attributeフィールドは必須項目です :values 存在しません',
    'required_without_all' => ':attributeなしの場合はフィールドが必要です :values それが存在します',
    'same'                 => ':attributeと:other一致している必要があります',
    'size'                 => [
        'numeric' => ':attributeでなければなりません :size 少し',
        'file'    => ':attributeでなければなりません :size KB',
        'string'  => ':attributeでなければなりません :size キャラクター',
        'array'   => ':attribute含める必要があります :size アイテム',
    ],
    'starts_with' => ':attribute次のいずれかで開始する必要があります: :values.',
    'string'               => ':attribute文字列である必要があります',
    'timezone'             => ':attribute有効なタイムゾーンである必要があります.',
    'unique'               => ':attribute存在した',
    'uploaded' => ':attributeアップロードに失敗しました',
    'url'                  => ':attribute無効な形式',
    'uuid' => ':attribute効果的でなければなりませんUUID.',

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
