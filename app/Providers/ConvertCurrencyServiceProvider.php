<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Currencies\Contracts\CurrencyExchangeInterface;
use App\Services\Currencies\ConvertCurrencyService;

class ConvertCurrencyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CurrencyExchangeInterface::class, ConvertCurrencyService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
