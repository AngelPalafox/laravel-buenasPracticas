<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Facades\Http;

class ReCaptcha implements InvokableRule
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
        $response = Http::asForm()
        ->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => '6LdQ7F0pAAAAAHrAkIqUnsOvJHkw3-B2FrpUFpHi',
            'response' => $value,
        ])->json();

        if(!$response['success'])
            $fail("Verifique y vuelva a hacer el Captcha");
    }
}
