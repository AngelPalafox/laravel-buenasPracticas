<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Routing\Middleware\ThrottleRequests;

class CustomThrottle extends ThrottleRequests
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int|string|null  $maxAttempts
     * @param  float|int  $decayMinutes
     * @param  string  $prefix
     * @return mixed
     */
    public function handle($request, \Closure $next, $maxAttempts = 60, $decayMinutes = 1, $prefix = '')
    {
        try {
            return parent::handle($request, $next, $maxAttempts, $decayMinutes, $prefix);
        } catch (ThrottleRequestsException $exception) {
            // Lanza una ValidationException
            throw ValidationException::withMessages([
                'email' => 'Demasiados intentos. Por favor intente en '.
                            ($exception->getHeaders()['Retry-After'] ?? $decayMinutes * 60).'.',
            ])->status(429);
        }
    }
}
