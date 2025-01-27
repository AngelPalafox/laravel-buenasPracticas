<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class SecurePassword implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/', $value)) {
            $fail('La contraseña debe tener al menos 8 caracteres, incluyendo al menos un número, 
                    una letra minúscula, una letra mayúscula y un carácter especial.');
        }
    }
}
