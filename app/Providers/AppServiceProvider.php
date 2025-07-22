<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\Authenticate;
use URL;

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

        if(app()->environment('production') || str_contains(request()->getHost(),'ngrok')){
            URL::forceScheme('https');
        }
        Authenticate::redirectUsing(function ($request) {
                return match(true){
                    $request->is('admin/*') => route('admin.login'),
                    $request->is('perusahaan/*') => route('perusahaan.login'),
                    default => route('public.login'),
                };
         });


    }
}
