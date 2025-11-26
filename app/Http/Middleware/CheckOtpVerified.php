<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOtpVerified
{
    public function handle($request, Closure $next)
    {
        if (!session('otp_verified')) {
            return redirect('resetPassword')->with('error', 'Akses ditolak!');
        }

        return $next($request);
    }
}