<?php

namespace App\Services;

class GetPopularCurrenciesCommandHandler
{
    const POPULAR_COUNT = 3;
    private $repository;

    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(int $count = self::POPULAR_COUNT): array
    {
        $currencies = $this->repository->findAll();
        $popularCurrencies = [];
        for ($i = 0; $i < $count; $i++) {
            $mostPopularId = 0;
            $mostPopularPrice = 0;
            foreach ($currencies as $key => $currency) {
                if ($currency->getPrice() > $mostPopularPrice) {
                    $mostPopularPrice = $currency->getPrice();
                    $mostPopularId = $key;
                }
            }
            $popularCurrencies[] = $currencies[$mostPopularId];
            unset($currencies[$mostPopularId]);
        }
        return $popularCurrencies;
    }
}