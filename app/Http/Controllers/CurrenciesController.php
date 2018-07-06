<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CurrencyPresenter;
use App\Services\CurrencyRepositoryInterface;
use App\Services\GetMostChangedCurrencyCommandHandler;
use App\Services\GetPopularCurrenciesCommandHandler;

class CurrenciesController extends Controller
{
    public function index()
    {
        $currencies = app(CurrencyRepositoryInterface::class)->findAll();
        $presentedCurrencies = [];
        foreach ($currencies as $currency) {
            $presentedCurrencies[] = CurrencyPresenter::present($currency);
        }
        return response()->json($presentedCurrencies);
    }

    public function unstable()
    {
        $repository = app(CurrencyRepositoryInterface::class);
        $command = new GetMostChangedCurrencyCommandHandler($repository);
        $currency = $command->handle();
        return response()->json(CurrencyPresenter::present($currency));
    }

    public function popular()
    {
        $repository = app(CurrencyRepositoryInterface::class);
        $command = new GetPopularCurrenciesCommandHandler($repository);
        $currencies = $command->handle();
        $presentedCurrencies = [];
        foreach ($currencies as $currency) {
            $presentedCurrencies[] = CurrencyPresenter::present($currency);
        }
        return view('popular_currencies', ['currencies' => $presentedCurrencies]);
    }
}
