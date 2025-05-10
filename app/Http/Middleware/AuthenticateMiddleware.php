<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    public function handle($request, Closure $next)
    {
        // dd($request);
        if (!Auth::check()) {
            // dd($request->fullUrl());
            $redirectUrl = route('login') . '?redirect_to=' . urlencode($request->fullUrl());
            // dd($redirectUrl);
            return redirect($redirectUrl)->with('error', 'Kamu harus login untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}