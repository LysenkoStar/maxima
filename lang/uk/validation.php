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

    'accepted' => 'Поле :attribute має бути прийнятним.',
    'accepted_if' => 'Поле :attribute має бути прийнятним, якщо :other є :value.',
    'active_url' => 'Поле :attribute має бути дійсною URL-адресою.',
    'after' => 'Поле :attribute має бути датою після :date.',
    'after_or_equal' => 'Поле :attribute має бути датою після або дорівнювати :date.',
    'alpha' => 'Поле :attribute має містити лише літери.',
    'alpha_dash' => 'Поле :attribute має містити лише літери, цифри, тире та підкреслення.',
    'alpha_num' => 'Поле :attribute має містити лише літери та цифри.',
    'array' => 'Поле :attribute має бути масивом.',
    'ascii' => 'Поле :attribute має містити лише однобайтові буквено-цифрові знаки та символи.',
    'before' => 'Поле :attribute має передувати даті :date.',
    'before_or_equal' => 'Поле :attribute має передувати або дорівнювати даті :date.',
    'between' => [
        'array' => 'Поле :attribute має містити між елементами :min і :max.',
        'file' => 'Поле :attribute має бути між :min і :max кілобайтами.',
        'numeric' => 'Поле :attribute має бути між :min та :max.',
        'string' => 'Поле :attribute має бути між символами :min і :max.',
    ],
    'boolean' => 'Поле :attribute має мати значення true або false.',
    'can' => 'Поле :attribute містить недозволене значення.',
    'confirmed' => 'Підтвердження поля :attribute не збігається.',
    'current_password' => 'Пароль неправильний.',
    'date' => 'Поле :attribute має містити дійсну дату.',
    'date_equals' => 'Поле :attribute має бути датою, що дорівнює :date.',
    'date_format' => 'Поле :attribute має відповідати формату :format.',
    'decimal' => 'Поле :attribute має містити :decimal знаків після коми.',
    'declined' => 'Поле :attribute має бути відхилено.',
    'declined_if' => 'Поле :attribute має бути відхилено, якщо :other дорівнює :value.',
    'different' => 'Поля :attribute і :other мають відрізнятися.',
    'digits' => 'Поле :attribute має бути :digits цифр.',
    'digits_between' => 'Поле :attribute має бути між :min і :max цифрами.',
    'dimensions' => 'Поле :attribute містить недійсні розміри зображення.',
    'distinct' => 'Поле :attribute має повторюване значення.',
    'doesnt_end_with' => 'Поле :attribute не має закінчуватися одним із таких: :values.',
    'doesnt_start_with' => 'Поле :attribute не має починатися з одного з наступного: :values.',
    'email' => 'Поле :attribute має бути дійсною електронною адресою.',
    'ends_with' => 'Поле :attribute має закінчуватися одним із таких: :values.',
    'enum' => 'Вибраний :attribute недійсний.',
    'exists' => 'Вибраний :attribute недійсний.',
    'file' => 'Поле :attribute має бути файлом.',
    'filled' => 'Поле :attribute має містити значення.',
    'gt' => [
        'array' => 'Поле :attribute має містити більше елементів :value.',
        'file' => 'Поле :attribute має бути більшим за :value кілобайт.',
        'numeric' => 'Поле :attribute має бути більшим за :value.',
        'string' => 'Поле :attribute має містити більше символів, ніж :value.',
    ],
    'gte' => [
        'array' => 'The :attribute field must have :value items or more.',
        'file' => 'The :attribute field must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute field must be greater than or equal to :value.',
        'string' => 'The :attribute field must be greater than or equal to :value characters.',
    ],
    'image' => 'Поле :attribute має бути зображенням.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field must exist in :other.',
    'integer' => 'The :attribute field must be an integer.',
    'ip' => 'The :attribute field must be a valid IP address.',
    'ipv4' => 'The :attribute field must be a valid IPv4 address.',
    'ipv6' => 'The :attribute field must be a valid IPv6 address.',
    'json' => 'The :attribute field must be a valid JSON string.',
    'lowercase' => 'The :attribute field must be lowercase.',
    'lt' => [
        'array' => 'The :attribute field must have less than :value items.',
        'file' => 'The :attribute field must be less than :value kilobytes.',
        'numeric' => 'The :attribute field must be less than :value.',
        'string' => 'The :attribute field must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute field must not have more than :value items.',
        'file' => 'The :attribute field must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute field must be less than or equal to :value.',
        'string' => 'The :attribute field must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute field must be a valid MAC address.',
    'max' => [
        'array' => 'Поле :attribute не повинно містити більше ніж :max елементів.',
        'file' => 'Поле :attribute не має перевищувати :max кілобайт.',
        'numeric' => 'Поле :attribute не має перевищувати :max.',
        'string' => 'Поле :attribute не має перевищувати :max символів.',
    ],
    'max_digits' => 'Поле :attribute не повинно містити більше ніж :max цифр.',
    'mimes' => 'Поле :attribute має бути файлом типу: :values.',
    'mimetypes' => 'Поле :attribute має бути файлом типу: :values.',
    'min' => [
        'array' => 'Поле :attribute має містити принаймні :min елементів.',
        'file' => 'Поле :attribute має бути принаймні :min кілобайт.',
        'numeric' => 'Поле :attribute має бути не менше :min.',
        'string' => 'Поле :attribute має містити принаймні :min символів.',
    ],
    'min_digits' => 'The :attribute field must have at least :min digits.',
    'missing' => 'The :attribute field must be missing.',
    'missing_if' => 'The :attribute field must be missing when :other is :value.',
    'missing_unless' => 'The :attribute field must be missing unless :other is :value.',
    'missing_with' => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of' => 'The :attribute field must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute field format is invalid.',
    'numeric' => 'The :attribute field must be a number.',
    'password' => [
        'letters' => 'The :attribute field must contain at least one letter.',
        'mixed' => 'The :attribute field must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute field must contain at least one number.',
        'symbols' => 'The :attribute field must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'Поле :attribute має бути присутнім.',
    'prohibited' => 'Поле :attribute заборонено.',
    'prohibited_if' => 'Поле :attribute заборонено, якщо :other дорівнює :value.',
    'prohibited_unless' => 'Поле :attribute заборонено, якщо :other не міститься в :values.',
    'prohibits' => 'Поле :attribute забороняє присутність :other.',
    'regex' => 'Формат поля :attribute недійсний.',
    'regex_format' => 'Поле :attribute має бути у форматі :format.',
    'required' => 'Поле :attribute є обов’язковим.',
    'required_array_keys' => 'Поле :attribute має містити записи для: :values.',
    'required_if' => 'Поле :attribute є обов’язковим, якщо :other дорівнює :value.',
    'required_if_accepted' => 'Поле :attribute є обов’язковим, якщо прийнято :other.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'Поле :attribute має відповідати :other.',
    'size' => [
        'array' => 'Поле :attribute має містити елементи :size.',
        'file' => 'Поле :attribute має бути :size кілобайт.',
        'numeric' => 'Поле :attribute має бути :size.',
        'string' => 'Поле :attribute має містити символи :size.',
    ],
    'starts_with' => 'Поле :attribute має починатися з одного з наступного: :values.',
    'string' => 'Поле :attribute має бути рядком.',
    'timezone' => 'У полі :attribute має бути дійсний часовий пояс.',
    'unique' => 'Поле :attribute має бути унікальним.',
    'uploaded' => 'Не вдалося завантажити :attribute.',
    'uppercase' => 'Поле :attribute має бути у верхньому ркгістрі.',
    'url' => 'Поле :attribute має бути дійсною URL-адресою.',
    'ulid' => 'Поле :attribute має бути дійсним ULID.',
    'uuid' => 'Поле :attribute має бути дійсним UUID.',

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

    'attributes' => collect(config('app.available_locales'))
        ->mapWithKeys(function ($lang, $locale) {
            return [
                "name.{$locale}" => "назва ({$lang})",
                "description.{$locale}" => "опис ({$lang})",
                "slug" => "посилання",
                "product_category_id" => "категорія товару",
            ];

        })
        ->toArray(),

    /*
   |--------------------------------------------------------------------------
   | Custom Validation Messages
   |--------------------------------------------------------------------------
   |
   */

    'correct_errors' => 'Будь ласка, виправте наступні помилки',

];
