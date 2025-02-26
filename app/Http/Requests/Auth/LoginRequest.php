<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Rules\ReCaptcha;
use App\Rules\SecurePassword;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'token_captcha' => ['required', 'string', new Recaptcha],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        
        if (! Auth::once($this->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'El email es requerido',
            'email.string' => 'El email debe ser un string',
            'email.email' => 'El email debe ser un email',
            'password.required' => 'La contraseña es requerida',
            'password.string' => 'La contraseña debe ser un string',
            'token_captcha.required' => 'El Captcha es requerido',
            'token_captcha.string' => 'El Captcha debe ser un string',
            'confirmed' => ' :attribute de confirmación no coincide',
            'unique' => ' :attribute ya existe',
        ];
    }
}
