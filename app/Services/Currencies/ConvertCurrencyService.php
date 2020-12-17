<?php

namespace App\Services\Currencies;

use App\Services\Currencies\Contracts\CurrencyExchangeInterface;
use Illuminate\Support\Facades\Http;

class ConvertCurrencyService implements CurrencyExchangeInterface
{
    protected $base_url;
    public function __construct()
    {
        $this->base_url = config("currency.exchangeratesapi.base_url");
    }

    public function callApi($params = [])
    {
        return Http::withOptions(['verify' => false])->get($this->base_url, $params)->json();
    }

    public function fetchRate($currency_from, $currency_to, $sum)
    {
        $response = $this->callApi([
            'base' => $currency_from
        ]);
        $rate = $response['rates'][$currency_to];

        return $sum * $rate;
    }

    public function fetchCurrencies()
    {
        $response = $this->callApi();
        return array_keys($response['rates']);
    }

    public function list()
    {
        return $this->fetchCurrencies();
    }

    public function convert($currency_from, $currency_to, $sum)
    {
        return $this->fetchRate($currency_from, $currency_to, $sum);
    }
}
