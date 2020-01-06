<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | la following language lines contain la default error messages used by
    | la validator class. Some de lase rules have multiple versions such
    | as la size rules. Feel free to tweak each de lase messages here.
    |
    */
    'email' => 'la :attribute doit être a valide emailo addresso.',
    'exists' => 'la choisie :attribute est invalide.',
    'fichier' => 'la :attribute doit être a fichier.',
    'filled' => 'la :attribute champ must have a value.',
    'image' => 'la :attribute doit être un image.',

    'mimes' => 'la :attribute doit être a fichier de type: :values.',
    'mimetypes' => 'la :attribute doit être a fichier de type: :values.',
    'min' => [
        'numeric' => 'la :attribute doit être au moins :min.',
        'fichier' => 'la :attribute doit être au moins :min kilobytes.',
        'string' => 'la :attribute doit être au moins :min characters.',
        'array' => 'la :attribute must have au moins :min items.',
    ],
    'numeric' => 'la :attribute doit être a number.',
    'required' => 'la :attribute champ est obligatoire.',
    'size' => [
        'numeric' => 'la :attribute doit être :size.',
        'fichier' => 'la :attribute doit être :size kilobytes.',
        'string' => 'la :attribute doit être :size characters.',
        'array' => 'la :attribute must contain :size items.',
    ],
    'string' => 'la :attribute doit être a string.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using la
    | convention "attribute.rule" to name la lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | la following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | de "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
