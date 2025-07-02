<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class cekTerkonfirmasi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->guard("perusahaan")->user()->status !== "terkonfirmasi"){
            return redirect()->back()->with("gagal","Anda tiidak dapat mengakses halaman ini");
        }
        return $next($request);
    }
}
