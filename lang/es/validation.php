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

    'accepted' => 'El :attribute debe ser aceptado.',
    'accepted_if' => 'El :attribute debe ser aceptado cuando :other es :value.',
    'active_url' => 'El :attribute no es una URL válida.',
    'after' => 'El :attribute debe ser una fecha después de :date.',
    'after_or_equal' => 'El :attribute debe ser una fecha después o igual a :date.',
    'alpha' => 'El :attribute debe contener solo letras.',
    'alpha_dash' => 'El :attribute debe contener solo letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El :attribute debe contener solo letras y números.',
    'array' => 'El :attribute debe ser un array.',
    'ascii' => 'El :attribute debe contener solo caracteres ASCII.',
    'before' => 'El :attribute debe ser una fecha antes de :date.',
    'before_or_equal' => 'El :attribute debe ser una fecha antes o igual a :date.',
    'between' => [
        'array' => 'El :attribute debe tener entre :min y :max elementos.',
        'file' => 'El :attribute debe tener entre :min y :max kilobytes.',
        'numeric' => 'El :attribute debe tener entre :min y :max.',
        'string' => 'El :attribute debe tener entre :min y :max caracteres.',
    ],
   
    'boolean' => 'El :attribute debe ser verdadero o falso.',
    'confirmed' => 'El :attribute de confirmación no coincide.',
    'current_password' => 'La contraseña actual es incorrecta.',
    'date' => 'La :attribute no es una fecha válida.',
    'date_equals' => 'La :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El :attribute no coincide con el formato :format.',
    'decimal' => 'El :attribute debe tener :decimal decimales.',
    'declined' => 'El :attribute debe ser rechazado.',
    'declined_if' => 'El :attribute debe ser rechazado cuando :other es :value.',
    'different' => 'El :attribute y :other deben ser diferentes.',
    'digits' => 'El :attribute debe ser de :digits dígitos.',
    'digits_between' => 'El :attribute debe tener entre :min y :max dígitos.',
    'dimensions' => 'El :attribute tiene dimensiones de imagen inválidas.',
    'distinct' => 'El :attribute campo tiene un valor duplicado.',
    'doesnt_end_with' => 'El :attribute no debe terminar con uno de los siguientes: :values.',
    'doesnt_start_with' => 'El :attribute no debe comenzar con uno de los siguientes: :values.',
    'email' => 'El :attribute debe ser un correo electrónico válido.',
    'ends_with' => 'El :attribute debe terminar con uno de los siguientes: :values.',
    'enum' => 'El :attribute seleccionado es inválido.',
    'exists' => 'El :attribute seleccionado es inválido.',
    'file' => 'El :attribute debe ser un archivo.',
    'filled' => 'El :attribute campo debe tener un valor.',
    'gt' => [
        'array' => 'El :attribute debe tener más de :value elementos.',
        'file' => 'El :attribute debe ser mayor que :value kilobytes.',
        'numeric' => 'El :attribute debe ser mayor que :value.',        
        'string' => 'El :attribute debe ser mayor que :value caracteres.',
    ],
    'gte' => [
        'array' => 'El :attribute debe tener :value elementos o más.',
        'file' => 'El :attribute debe ser mayor o igual que :value kilobytes.',
        'numeric' => 'El :attribute debe ser mayor o igual que :value.',
        'string' => 'El :attribute debe ser mayor o igual que :value caracteres.',
    ],
    'image' => ':attribute debe ser una imagen.',
    'in' => 'El :attribute seleccionado es inválido.',
    'in_array' => 'El :attribute campo no existe en :other.',
    'integer' => 'El :attribute debe ser un entero.',
    'ip' => 'El :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El :attribute debe ser una cadena JSON válida.',
    'lowercase' => ':attribute debe ser en minúsculas.',
    'lt' => [
        'array' => 'El :attribute debe tener menos de :value elementos.',
        'file' => 'El :attribute debe ser menor que :value kilobytes.',
        'numeric' => 'El :attribute debe ser menor que :value.',
        'string' => 'El :attribute debe ser menor que :value caracteres.',
    ],
    'lte' => [
        'array' => 'El :attribute no debe tener más de :value elementos.',
        'file' => 'El :attribute no debe ser mayor que :value kilobytes.',
        'numeric' => 'El :attribute no debe ser mayor que :value.',
        'string' => 'El :attribute no debe ser mayor que :value caracteres.',
    ],
    'mac_address' => 'El :attribute debe ser una dirección MAC válida.',
    'max' => [
        'array' => 'El :attribute no debe tener más de :max elementos.',
        'file' => 'El :attribute no debe ser mayor que :max kilobytes.',
        'numeric' => 'El :attribute no debe ser mayor que :max.',
        'string' => 'El :attribute no debe ser mayor que :max caracteres.',
    ],
    'max_digits' => 'El :attribute no debe tener más de :max dígitos.',
    'mimes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'array' => 'El :attribute debe tener al menos :min elementos.',
        'file' => 'El :attribute debe tener al menos :min kilobytes.',
        'numeric' => 'El :attribute debe tener al menos :min.',
        'string' => 'El :attribute debe tener al menos :min caracteres.',
        'file' => 'El :attribute debe tener al menos :min kilobytes.',
    ],
    'min_digits' => 'El :attribute debe tener al menos :min dígitos.',
    'missing' => 'El :attribute campo debe estar presente.',
    'missing_if' => 'El :attribute campo debe estar presente cuando :other es :value.',
    'missing_unless' => 'El :attribute campo debe estar presente a menos que :other es :value.',
    'missing_with' => 'El :attribute campo debe estar presente cuando :values está presente.',
    'missing_with_all' => 'El :attribute campo debe estar presente cuando :values están presentes.',
    'multiple_of' => 'El :attribute debe ser un múltiplo de :value.',
    'not_in' => 'El :attribute seleccionado es inválido.',
    'not_regex' => 'El :attribute formato es inválido.',
    'numeric' => 'El :attribute debe ser un número.',
    'password' => [
        'letters' => 'La :attribute debe contener al menos una letra.',
        'mixed' => 'La :attribute debe contener al menos una mayúscula y una minúscula.',
        'numbers' => 'La :attribute debe contener al menos un número.',
        'symbols' => 'La :attribute debe contener al menos un símbolo.',
        'uncompromised' => 'El :attribute dado ha aparecido en un violación de datos. Por favor elige un :attribute diferente.',
    ],
    'present' => 'El :attribute campo debe estar presente.',
    'prohibited' => 'El :attribute campo está prohibido.',
    'prohibited_if' => 'El :attribute campo está prohibido cuando :other es :value.',
    'prohibited_unless' => 'El :attribute campo está prohibido a menos que :other esté en :values.',
    'prohibits' => 'El :attribute campo prohibie :other de estar presente.',
    'regex' => 'El :attribute formato es inválido.',
    'required' => 'El :attribute campo es requerido.',
    'required_array_keys' => 'El :attribute campo debe contener entradas para: :values.',
    'required_if' => 'El :attribute campo es requerido cuando :other es :value.',
    'required_if_accepted' => 'El :attribute campo es requerido cuando :other es aceptado.',
    'required_unless' => 'El :attribute campo es requerido a menos que :other esté en :values.',
    'required_with' => 'El :attribute campo es requerido cuando :values está presente.',
    'required_with_all' => 'El :attribute campo es requerido cuando :values están presentes.',
    'required_without' => 'El :attribute campo es requerido cuando :values no está presente.',
    'required_without_all' => 'El :attribute campo es requerido cuando ninguno de :values están presentes.',    
    'same' => 'El :attribute y :other deben coincidir.',
    'size' => [
        'array' => 'El :attribute debe contener :size elementos.',        
        'file' => 'El :attribute debe ser :size kilobytes.',
        'numeric' => 'El :attribute debe ser :size.',
        'string' => 'El :attribute debe ser :size caracteres.',
    ],
    'starts_with' => 'El :attribute debe comenzar con uno de los siguientes: :values.',
    'string' => 'El :attribute debe ser una cadena.',
    'timezone' => 'El :attribute debe ser una zona válida.',
    'unique' => 'El :attribute ya ha sido tomado.',
    'uploaded' => 'El :attribute falló al cargar.',
    'uppercase' => 'El :attribute debe ser en mayúsculas.',
    'url' => 'El :attribute debe ser una URL válida.',
    'ulid' => 'El :attribute debe ser un ULID válido.',
    'uuid' => 'El :attribute debe ser un UUID válido.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
