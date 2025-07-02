<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
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
        if(!session()->has("verifEmail") || !session()->has("user_id") && !session()->has("perusahaan_id") || !session()->has("email_expired_at")){
            return redirect()->back()->withErrors(["gagal" => "anda tidak dapat mengakses halaman ini"]);
        }
        return $next($request);
    }
}
