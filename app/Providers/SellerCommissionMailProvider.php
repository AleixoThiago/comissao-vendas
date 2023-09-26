<?php

namespace App\Providers;

use App\Services\Contracts\SellerCommissionMailInterface;
use App\Services\SellerCommissionMailService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class SellerCommissionMailProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SellerCommissionMailInterface::class, SellerCommissionMailService::class);
    }

    /**
     * @return string[]
     */
    public function provides()
    {
        return [
            SellerCommissionMailInterface::class,
        ];
    }
}
