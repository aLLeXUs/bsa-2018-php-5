<?php

namespace App\Services;

class GetMostChangedCurrencyCommandHandler
{
    private $repository;

    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(): Currency
    {
        $currencies = $this->repository->findAll();
        $mostChangedId = 0;
        $mostChangedPercent = 0;
        foreach ($currencies as $key => $currency) {
            if (abs($currency->getDailyChangePercent()) > $mostChangedPercent) {
                $mostChangedPercent = $currency->getDailyChangePercent();
                $mostChangedId = $key;
            }
        }
        return $currencies[$mostChangedId];
    }
}