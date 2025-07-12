<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TolakPending
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->guard("web")->user();
        foreach ($user->lamaran as $isi) {
             if($isi->status === "pending" || $isi->status === "diterima" || $isi->status === "selesai") {
                return redirect()->back()->with("gagal","Maaf anda tidak dapat melamar kembali ");
            }
        }

        return $next($request);
    }
}
