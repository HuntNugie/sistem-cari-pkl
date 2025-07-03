<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cekAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$guard = null): Response
    {
        // middleware untuk mengecek apakah sudah login
        $guard = $guard ?? "web";
        if(Auth::guard($guard)->check()){
            switch ($guard) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'perusahaan':
                    return redirect()->route('perusahaan.dashboard');
                default:
                    return redirect()->route('beranda');
            }
        }
        return $next($request);
    }
}
