<?php


namespace App\Services\Currencies\Contracts;

interface CurrencyExchangeInterface
{
    public function fetchRate($currency_from, $currency_to, $sum);

    public function convert($currency_from, $currency_to, $sum);

    public function list();
}
