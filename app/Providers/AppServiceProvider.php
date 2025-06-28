<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\Authenticate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            Authenticate::redirectUsing(function ($request) {
                return match(true){
                    $request->is('admin/*') => route('admin.login'),
                    $request->is('perusahaan/*') => route('perusahaan.login'),
                    default => route('public.login'),
                };
         });
    }
}
