<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verification_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mutador para encriptar el verification_code antes de guardarlo.
     *
     * @param  string  $value
     * @return void
     */
    public function setVerificationCodeAttribute($value)
    {
        // Hashear el valor solo si es un valor no vacío
        if (!empty($value)) {
            $this->attributes['verification_code'] = Hash::make($value);
        }
    }

    /**
     * Mutador para encriptar el password antes de guardarlo.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        // Solo hashear el password si se está estableciendo un nuevo valor
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
    
    // Método para generar un enlace firmado para activar la cuenta
    public function generateActivationSignature()
    {
        return URL::temporarySignedRoute(
            'activate.user', now()->addMinutes(5), ['user' => $this->id]
        );
    }
}
