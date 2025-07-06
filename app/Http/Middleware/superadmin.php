<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class superadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // middleware untuk superadmin
        $role = auth()->guard("admin")->user()->role;

        if($role !== "super_admin"){
            return redirect()->back()->with("gagal","anda tidak mempunyai akses kesini");
        }
        return $next($request);
    }
}
