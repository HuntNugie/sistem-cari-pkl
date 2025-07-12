<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class jagaSertifikat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->guard("web")->user();
        if(!$user->lamaran()->where("status","selesai")->exists()){
            return redirect()->back()->with("gagal","anda tidak dapat mengakses halaman ini");
        }
        if($request->route("lamaran")){
            $lamaran = $request->route("lamaran");
            if(!$lamaran || $lamaran->user_id !== $user->id || $lamaran->status !== "selesai" ){
                return redirect()->back()->with("gagal","anda tidak dapat mengakses halaman ini");
            }
        }
        
        return $next($request);
    }
}
