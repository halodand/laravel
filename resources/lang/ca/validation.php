<?php

return [
    'accepted'                       => ':attribute ha de ser acceptat.',
    'active_url'                     => ':attribute no és una adreça vàlida',
    'after'                          => ':attribute ha de ser una data més recent que :date',
    'after_or_equal'                 => 'The :attribute must be a date after or equal to :date.',
    'alpha'                          => ':attribute només pot contenir lletres.',
    'alpha_dash'                     => ':attribute només pot contenir lletres, números i guions',
    'alpha_num'                      => ':attribute només pot contenir lletres i números',
    'latin'                          => 'The :attribute may only contain ISO basic Latin alphabet letters.',
    'latin_dash_space'               => 'The :attribute may only contain ISO basic Latin alphabet letters, numbers, dashes, hyphens and spaces.',
    'array'                          => ':attribute ha de ser una matriu',
    'before'                         => ':attribute ha  de ser una data anterior a :date',
    'before_or_equal'                => 'The :attribute must be a date before or equal to :date.',
    'between'                        => [
        'numeric' => ':attribute ha de tenir un valor entre :min i :max',
        'file'    => ':attribute ha de tenir una mida entre :min i :max kilobytes',
        'string'  => ':attribute ha de tenir entre :min i :max caràcters',
        'array'   => ':attribute ha de tenir entre :min i :max elements',
    ],
    'boolean'                        => 'El camp :attribute ha de ser veritat o fals',
    'confirmed'                      => 'la confirmació de :attribute no coincideix',
    'date'                           => ':attribute no és una data vàlida',
    'date_format'                    => ':attribute no coincideix amb el format :format',
    'different'                      => ':attribute i :other han de ser diferents',
    'digits'                         => ':attribute ha de tenir :digits digits',
    'digits_between'                 => ':attribute ha de estar entre :min i :max digits',
    'dimensions'                     => 'Les dimensions de la imatge :attribute són invàlides',
    'distinct'                       => 'El valor del camp :attribute està duplicat',
    'email'                          => ':attribute ha de ser una adreça de correu vàlida',
    'exists'                         => 'El :attribute seleccionat és invàlid',
    'file'                           => ':attribute ha de ser un fitxer',
    'filled'                         => 'el camp :attribute es obligatori',
    'gt'                             => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file'    => 'The :attribute must be greater than :value kilobytes.',
        'string'  => 'The :attribute must be greater than :value characters.',
        'array'   => 'The :attribute must have more than :value items.',
    ],
    'gte'                            => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file'    => 'The :attribute must be greater than or equal :value kilobytes.',
        'string'  => 'The :attribute must be greater than or equal :value characters.',
        'array'   => 'The :attribute must have :value items or more.',
    ],
    'image'                          => ':attribute ha de ser una imatge',
    'in'                             => 'El :attribute seleccionat és invàlid',
    'in_array'                       => 'El camp :attribute no existeix a :other',
    'integer'                        => ':attribute ha de ser un enter',
    'ip'                             => ':attribute ha de ser una IP vàlida',
    'ipv4'                           => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                           => 'The :attribute must be a valid IPv6 address.',
    'json'                           => ':attribute ha de ser un JSON vàlid',
    'lt'                             => [
        'numeric' => 'The :attribute must be less than :value.',
        'file'    => 'The :attribute must be less than :value kilobytes.',
        'string'  => 'The :attribute must be less than :value characters.',
        'array'   => 'The :attribute must have less than :value items.',
    ],
    'lte'                            => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file'    => 'The :attribute must be less than or equal :value kilobytes.',
        'string'  => 'The :attribute must be less than or equal :value characters.',
        'array'   => 'The :attribute must not have more than :value items.',
    ],
    'max'                            => [
        'numeric' => ':attribute no pot ser més gran que :max',
        'file'    => ':attribute no pot ser més gran de :max kilobytes',
        'string'  => ':attribute no pot tenir més de :max caràcters',
        'array'   => ':attribute no pot tenir més de :max elements',
    ],
    'mimes'                          => ':attribute ha de ser un fitxer del tipus :values',
    'mimetypes'                      => 'The :attribute must be a file of type: :values.',
    'min'                            => [
        'numeric' => ':attribute ha de ser almenys :min',
        'file'    => ':attribute ha de tenir almenys :min kilobytes',
        'string'  => ':attribute ha de tenir almenys :min caràcters',
        'array'   => ':attribute ha de tenir almenys :min elements',
    ],
    'not_in'                         => 'El :attribute seleccionat és invàlid',
    'not_regex'                      => 'The :attribute format is invalid.',
    'numeric'                        => ':attribute ha de ser un número',
    'password'                       => 'The password is incorrect.',
    'present'                        => 'El camp :attribute ha d\'estar present',
    'regex'                          => 'El format de :attribute és invàlid',
    'required'                       => 'El camp :attribute es requereix',
    'required_if'                    => 'El camp :attribute es requereix quan :other és :value',
    'required_unless'                => 'El camp :attribute es rquereix a menys que :other estigui dins :values',
    'required_with'                  => 'El camp :attribute es requereix quan :values existeixen',
    'required_with_all'              => 'El camp :attribute es requereix quan :values existeixen',
    'required_without'               => 'El camp :attribute es requereix quan no hi cap dels :values',
    'required_without_all'           => 'El camp :attribute es requereix quan cap dels :values està present',
    'same'                           => ':attribute i :other han de coincidir',
    'size'                           => [
        'numeric' => ':attribute ha de ser :size',
        'file'    => ':attribute ha de ser de :size kilobytes',
        'string'  => ':attribute ha de tenir :size caràcters',
        'array'   => ':attribute ha de contenir :size elements',
    ],
    'string'                         => ':attribute ha de ser una cadena',
    'timezone'                       => ':attribute ha de ser una zona vàlida',
    'unique'                         => ':attribute ja ha estat agafat',
    'uploaded'                       => 'The :attribute failed to upload.',
    'url'                            => 'El format de :attribute és invàlid',
    'custom'                         => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'reserved_word'                  => 'The :attribute contains reserved word',
    'dont_allow_first_letter_number' => 'The \":input\" field can\'t have first letter as a number',
    'exceeds_maximum_number'         => 'The :attribute exceeds maximum model length',
    'db_column'                      => 'The :attribute may only contain ISO basic Latin alphabet letters, numbers, dash and cannot start with number.',
    'attributes'                     => [],
];