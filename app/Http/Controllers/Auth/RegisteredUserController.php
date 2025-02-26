<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Rules\SecurePassword;
use App\Rules\ReCaptcha;
use App\Mail\ActivateUserMail;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', new SecurePassword],
            'token_captcha' => ['required', 'string', new Recaptcha],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        // Enviar el correo de activación
        Mail::to($user->email)->send(new ActivateUserMail($user));
        return redirect()->route('register')->with('status', __('Registro exitoso. Revisa tu correo para activar tu cuenta.'));

    }
}
