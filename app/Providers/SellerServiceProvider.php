<?php

namespace App\Providers;

use App\Services\Contracts\SellerServiceInterface;
use App\Services\SellerService;
use Illuminate\Support\ServiceProvider;

class SellerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SellerServiceInterface::class, SellerService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
