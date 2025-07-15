<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class cekOtpForgot
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->has("email") || !session()->has("email_verified") || !session()->has("otp_verified")){
            return redirect()->back()->with("gagal","anda tidak dapat mengakses halaman ini");
        }
        return $next($request);
    }
}
