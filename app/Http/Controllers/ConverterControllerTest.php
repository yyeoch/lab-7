<?php


namespace App\Http\Controllers;

use App\Http\Requests\ConvertRequestTest;
use App\Services\Currencies\Contracts\CurrencyExchangeInterface;
use Illuminate\Http\Request;

class ConverterControllerTest extends Controller
{
    /**
     * @var CurrencyExchangeInterface
     */
    protected $currencyExchangeService;

    public function __construct(CurrencyExchangeInterface $currencyExchangeService)
    {
        $this->currencyExchangeService = $currencyExchangeService;
    }

    public function index()
    {
        return view("converter-test.index", [
            "currencies" => $this->currencyExchangeService->list(),
        ]);
    }

    public function callConvertApi(ConvertRequestTest $request)
    {
        $result = $this->currencyExchangeService->convert($request->currency_from, $request->currency_to, $request->sum);
        $request->session()->flash("Converted", $result);
        return redirect(route("converter-test.index"));
    }
}
