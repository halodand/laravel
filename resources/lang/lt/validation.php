<?php

return [
    'accepted'                       => 'Turite sutikti su :attribute.',
    'active_url'                     => ':attribute netinkamas URL.',
    'after'                          => 'Laukas :attribute turi būti data po :date.',
    'after_or_equal'                 => 'Laukas :attribute turi būti didesnės datos arba lygus datai :date.',
    'alpha'                          => 'Laukas :attribute gali būti sudarytas tik iš raidžių.',
    'alpha_dash'                     => 'Laukas :attribute gali būti sudarytas tik iš raidžių, skaičių ir brūkšnių.',
    'alpha_num'                      => 'Laukas :attribute gali būti sudarytas tik iš raidžių ir skaičių.',
    'latin'                          => 'The :attribute may only contain ISO basic Latin alphabet letters.',
    'latin_dash_space'               => 'The :attribute may only contain ISO basic Latin alphabet letters, numbers, dashes, hyphens and spaces.',
    'array'                          => 'Laukas :attribute turi būti masyvas.',
    'before'                         => 'Laukas :attribute turi būti data prieš :date.',
    'before_or_equal'                => 'Laukas :attribute turi būti ankstesnis arba lygus datai :date.',
    'between'                        => [
        'numeric' => 'Lauko :attribute reikšmė turi būti tarp :min ir :max.',
        'file'    => ':attribute dydis turi būti tarp :min ir :max  kilobaitų',
        'string'  => ':attribute turi būti tarp :min ir :max simbolių',
        'array'   => 'Laukas :attribute turi būti tarp :min ir :max items.',
    ],
    'boolean'                        => ':atributo laukas turi būti teisingas arba klaidingas.',
    'confirmed'                      => 'The :attribute confirmation does not match.',
    'date'                           => 'The :attribute is not a valid date.',
    'date_format'                    => ':attribute neatitinka formato :format',
    'different'                      => 'The :attribute and :other must be different.',
    'digits'                         => 'The :attribute must be :digits digits.',
    'digits_between'                 => 'The :attribute must be between :min and :max digits.',
    'dimensions'                     => 'The :attribute has invalid image dimensions.',
    'distinct'                       => 'Toks :attribute jau yra naudojamas.',
    'email'                          => ':attribute turi būti validaus formato.',
    'exists'                         => 'The selected :attribute is invalid.',
    'file'                           => 'The :attribute must be a file.',
    'filled'                         => ':attribute yra privalomas.',
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
    'image'                          => 'The :attribute must be an image.',
    'in'                             => 'The selected :attribute is invalid.',
    'in_array'                       => 'The :attribute field does not exist in :other.',
    'integer'                        => 'The :attribute must be an integer.',
    'ip'                             => 'The :attribute must be a valid IP address.',
    'ipv4'                           => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                           => 'The :attribute must be a valid IPv6 address.',
    'json'                           => 'The :attribute must be a valid JSON string.',
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
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                          => 'The :attribute must be a file of type: :values.',
    'mimetypes'                      => 'The :attribute must be a file of type: :values.',
    'min'                            => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'                         => 'The selected :attribute is invalid.',
    'not_regex'                      => 'The :attribute format is invalid.',
    'numeric'                        => 'The :attribute must be a number.',
    'password'                       => 'The password is incorrect.',
    'present'                        => 'The :attribute field must be present.',
    'regex'                          => 'The :attribute format is invalid.',
    'required'                       => 'The :attribute field is required.',
    'required_if'                    => 'The :attribute field is required when :other is :value.',
    'required_unless'                => 'The :attribute field is required unless :other is in :values.',
    'required_with'                  => 'The :attribute field is required when :values is present.',
    'required_with_all'              => 'The :attribute field is required when :values is present.',
    'required_without'               => 'The :attribute field is required when :values is not present.',
    'required_without_all'           => 'The :attribute field is required when none of :values are present.',
    'same'                           => 'The :attribute and :other must match.',
    'size'                           => [
        'numeric' => 'Laukelis :attribute turi būti :size dydžio.',
        'file'    => 'Laukelis :attribute must be :size kilobytes.',
        'string'  => 'Laukelis :attribute turi būti :size simbolių ilgio.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'                         => 'Laukas :attribute turi būti tekstas.',
    'timezone'                       => 'Laukelis :attribute turi būti su teisingai parinkta zona.',
    'unique'                         => 'Laukelis :attribute jau egzistuoja.',
    'uploaded'                       => 'Laukelyje :attribute nepavyko įkelti failo.',
    'url'                            => 'Lauko :attribute formatas yra neteisingas.',
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
