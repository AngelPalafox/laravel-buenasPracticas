<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class ActivateUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Generamos la URL firmada usando 'temporarySignedRoute'
        $activationUrl = URL::temporarySignedRoute(
            'activate.user', // Nombre de la ruta
            Carbon::now()->addMinutes(5), // Tiempo de expiración
            ['user' => $this->user->id] // Parámetro de usuario
        );

        return $this->subject('Activar tu cuenta')
            ->view('email.activate_user') // Vista para el contenido del correo
            ->with(['activationUrl' => $activationUrl]);
    }
}
