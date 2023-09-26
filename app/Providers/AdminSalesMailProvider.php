<?php

namespace App\Providers;

use App\Services\Contracts\AdminSalesMailInterface;
use App\Services\AdminSalesMailService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AdminSalesMailProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdminSalesMailInterface::class, AdminSalesMailService::class);
    }

    /**
     * @return string[]
     */
    public function provides()
    {
        return [
            AdminSalesMailInterface::class,
        ];
    }
}
