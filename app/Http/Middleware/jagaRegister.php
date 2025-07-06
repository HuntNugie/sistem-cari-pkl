<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class jagaRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->has("verifRegister") || !session()->has("user_id") && !session()->has("perusahaan_id") ){
            return redirect()->back()->with("gagal","anda gagal mengakses halaman ini");
        }
        return $next($request);
    }
}
