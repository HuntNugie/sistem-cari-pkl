<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            "jagaOtp" => App\Http\Middleware\jagaOtp::class,
            "cekAuth" => App\Http\Middleware\cekAuth::class,
            "jagaDaftar" => App\Http\Middleware\jagaDaftar::class,
            "cekTerkonfirmasi" => App\Http\Middleware\cekTerkonfirmasi::class,
            "terkonfirmasi" => App\Http\Middleware\terkonfirmasi::class,
            "superadmin" => App\Http\Middleware\superadmin::class,
            "jagaRegister" => App\Http\Middleware\jagaRegister::class,
            "tolakPending" => App\Http\Middleware\TolakPending::class,
            "jagaPdf" => App\Http\Middleware\jagaPdf::class,
            "jagaPdfTolak" => App\Http\Middleware\jagaPdfTolak::class,
            "jagaSertifikat" => App\Http\Middleware\jagaSertifikat::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
