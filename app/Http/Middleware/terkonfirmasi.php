<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class terkonfirmasi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->guard("perusahaan")->user()->perusahaanProfile->status === "terkonfirmasi"){
            return redirect()->back()->with("gagal","Anda tidak bisa mengakses halaman ini");
        }
        return $next($request);
    }
}
