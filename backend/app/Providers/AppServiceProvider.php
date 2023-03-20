<?php

namespace App\Providers;

use App\Services\Exchanges\Okx\Http\HttpClient;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Http::macro('products', function () {
            return Http::baseUrl( \config('services.product_api.base_uri') );
        });
    }
}
