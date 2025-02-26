<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Jobs\ProcessCodeVerification;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use App\Rules\ReCaptcha;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    /**
     * Mostrar vista de login.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Procesar login y generar código de verificación.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // Generar código de verificación
        $code = rand(100000, 999999);
        $user = $request->user();

        $user->verification_code = $code;
        $user->save();

        // Enviar código a la cola de procesamiento
        ProcessCodeVerification::dispatch(strval($code), $user)->onQueue('high');

        // Generar URL firmada con expiración de 5 minutos
        $signedUrl = URL::temporarySignedRoute(
            'code_verification.verify',
            Carbon::now()->addMinutes(5),
            ['id' => $user->id]
        );

        // Redirigir a la vista MFA con la URL firmada
        return redirect()->route('code_verification.index', ['signedUrl' => $signedUrl]);
    }

    /**
     * Mostrar vista de verificación con la URL firmada.
     */
    public function index(Request $request): Response
    {
        return Inertia::render('Auth/MFA', [
            'signedUrl' => $request->query('signedUrl'),  // Aquí se captura la URL firmada desde la query
        ]);
    }

    /**
     * Verificar código y reCAPTCHA.
     */
    public function verify_code(Request $request, $id): RedirectResponse
    {
        // Verificar que la URL firmada sea válida
        if (!$request->hasValidSignature()) {
            return redirect()->route('login')->with('error', 'El enlace ha expirado o es inválido.');
        }

        // Validar código y reCAPTCHA
        $request->validate([
            'code' => 'required|digits:6',
            'token_captcha' => ['required', 'string', new ReCaptcha()]
        ]);
        // Buscar al usuario
        $user = User::find($id);
        if (!$user || !$user->active) {
            return redirect()->route('login')->with('error', 'Usuario no encontrado.');
        }

        // Verificar código de autenticación (sin Hash::check)

        if (Hash::check($request->code, $user->verification_code)) {
            // Limpiar código y autenticar usuario
            $user->verification_code = null;
            $user->save();

            Auth::guard('web')->login($user);

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->with('error', 'El código de verificación no es correcto.');
    }

    /**
     * Cerrar sesión.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
