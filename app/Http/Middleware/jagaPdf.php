<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class jagaPdf
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lamaran = $request->route("lamaran");
        $user = auth()->guard("web")->user();
        if(!$lamaran || $lamaran->user_id !== $user->id){
            return redirect()->back()->with("gagal","anda tidak dapat mengakses halaman ini");
        }
        return $next($request);
    }
}
