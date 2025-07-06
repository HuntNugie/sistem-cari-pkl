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
            "gagalEmail" => App\Http\Middleware\gagalEmail::class,
            "cekTerkonfirmasi" => App\Http\Middleware\cekTerkonfirmasi::class,
            "terkonfirmasi" => App\Http\Middleware\terkonfirmasi::class,
            "superadmin" => App\Http\Middleware\superadmin::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
