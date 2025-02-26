<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserActivationController extends Controller
{
    public function activate(Request $request, $userId)
    {
        if (! $request->hasValidSignature()) {
            abort(403, 'Invalid signature.');
        }

        // Proceder con la activación del usuario
        $user = User::findOrFail($userId);
        $user->active=true;
        $user->save();

        return redirect()->route('login')->with('status', 'Cuenta activada correctamente.');
    }
}
