<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class jagaOtp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->has("verifEmail") || !session()->has("user_id")){
            return redirect()->back()->withErrors(["gagal" => "anda tidak dapat mengakses halaman ini"]);
        }
        return $next($request);
    }
}
