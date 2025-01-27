<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;
use App\Mail\CodeVerification;
use App\Models\User;

class ProcessCodeVerification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected CodeVerification $correo;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        // protected CodeVerification $correo,
        String $code,
        protected User $user
    )
    {
        $this->correo = new CodeVerification($code);
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Enviar el correo con el código de verificación
        Mail::to($this->user->email)->send($this->correo);
    }
}
