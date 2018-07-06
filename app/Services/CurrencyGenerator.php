<?php

namespace App\Services;

class CurrencyGenerator
{
    public static function generate(): array
    {
        return [
            new Currency(
                1,
                'Bitcoin',
                6646.91,
                'https://s2.coinmarketcap.com/static/img/coins/16x16/1.png',
                -0.74
            ),
            new Currency(
                2,
                'Ethereum',
                472.37,
                'https://s2.coinmarketcap.com/static/img/coins/16x16/1027.png',
                -0.33
            ),
            new Currency(
                3,
                'NEO',
                41.05,
                'https://s2.coinmarketcap.com/static/img/coins/16x16/1376.png',
                5.27
            ),
            new Currency(
                4,
                'Monero',
                138.87,
                'https://s2.coinmarketcap.com/static/img/coins/16x16/328.png',
                -2.51
            ),
            new Currency(
                5,
                'Dash',
                244.37,
                'https://s2.coinmarketcap.com/static/img/coins/16x16/131.png',
                -1.19
            ),
        ];
    }
}