<?php
use AmrShawky\LaravelCurrency\Facade\Currency;

function currencyConvert($price)
{
    $i = \Illuminate\Support\Facades\Session::get('currency');
    switch ($i) {
        case 'EUR':
            $amount = Currency::convert()
                ->from('USD')
                ->to('EUR')
                ->amount($price)
                ->round(2)
                ->throw()
                ->get();
            return '€' . ' ' . number_format($amount);
        case 'USD':
            return '$' . ' ' . number_format($price);
        case 'GBP':
            $amount = Currency::convert()
                ->from('USD')
                ->to('GBP')
                ->amount($price)
                ->round(2)
                ->throw()
                ->get();
            return '£' . ' ' . number_format($amount);
        case 'TRY':
            $amount = Currency::convert()
                ->from('USD')
                ->to('TRY')
                ->amount($price)
                ->throw()
                ->get();
            return '₺' . ' ' . number_format($amount);
    }
}
