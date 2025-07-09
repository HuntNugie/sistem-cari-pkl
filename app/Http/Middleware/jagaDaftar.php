<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class jagaDaftar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();
        if(!$user->user_profile->sekolah_id || !$user->user_profile->jurusan_id || !$user->user_profile->kelas || !$user->user_profile->alamat || !$user->user_profile->telepon || !$user->user_profile->foto &&!$user->avatar || !$user->user_profile->tgl_lahir || !$user->user_profile->nis || !$user->user_profile->jk) {
            // Jika data tidak lengkap, redirect ke halaman profil
            return redirect()->back()->with('gagal', 'Lengkapi data profil Anda sebelum mendaftar PKL.');
        }
        return $next($request);
    }
}
