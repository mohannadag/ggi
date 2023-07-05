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

function currencyConvertDisplay($price, $cur)
{
    $i = \Illuminate\Support\Facades\Session::get('currency');

    if($cur == null)
    {
        $cur = 'USD';
    }
    else {
        $cur = $cur->name;
    }

    switch ($i) {
        case 'EUR':
            $amount = Currency::convert()
                ->from($cur)
                ->to('EUR')
                ->amount($price)
                ->round(2)
                ->throw()
                ->get();
            return '€' . ' ' . number_format($amount);
        case 'USD':
            $amount = Currency::convert()
                ->from($cur)
                ->to('USD')
                ->amount($price)
                ->round(2)
                ->throw()
                ->get();
            return '$' . ' ' . number_format($amount);
        case 'GBP':
            $amount = Currency::convert()
                ->from($cur)
                ->to('GBP')
                ->amount($price)
                ->round(2)
                ->throw()
                ->get();
            return '£' . ' ' . number_format($amount);
        case 'TRY':
            $amount = Currency::convert()
                ->from($cur)
                ->to('TRY')
                ->amount($price)
                ->throw()
                ->get();
            return '₺' . ' ' . number_format($amount);
    }
}


function priceConvert($price)
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
            return ceil($amount * 0.1)/0.1;
        case 'USD':
            return ceil($price * 0.1)/0.1;
        case 'GBP':
            $amount = Currency::convert()
                ->from('USD')
                ->to('GBP')
                ->amount($price)
                ->round(2)
                ->throw()
                ->get();
            return ceil($amount * 0.1)/0.1;
        case 'TRY':
            $amount = Currency::convert()
                ->from('USD')
                ->to('TRY')
                ->amount($price)
                ->throw()
                ->get();
            return ceil($amount * 0.1)/0.1;
    }
}


function convert($price, $cur)
{
    $currencies = \Illuminate\Support\Facades\Cache::remember('currencies', now()->addHours(1), function () {
        return \App\Models\Currency::all();
    });

    $USD = $currencies->where('name', '==', 'USD')->first();
    $EUR = $currencies->where('name', '==', 'EUR')->first();
    $TRY = $currencies->where('name', '==', 'TRY')->first();

    $i = \Illuminate\Support\Facades\Session::get('currency');

    if($cur == null)
    {
        $cur = 'USD';
    }
    else {
        $cur = $cur->name;
    }

    if($cur == 'USD')
        $inEur = $price / $USD->value;
    elseif($cur == 'TRY')
        $inEur = $price / $TRY->value;
    else
        $inEur = $price / $EUR->value;

    switch ($i) {
        case 'EUR':
            $amount = $inEur * $EUR->value;
            return '€' . ' ' . number_format($amount);
        case 'USD':
            $amount = $inEur * $USD->value;

            return '$' . ' ' . number_format($amount);

        case 'TRY':
            $amount = $inEur * $TRY->value;

            return '₺' . ' ' . number_format($amount);
    }
}

function updateCurrencies()
{
    $currencies = Currency::rates()
                        ->latest()
                        ->get();
    $baseCurrencies = \App\Models\Currency::all();
    $USD = $baseCurrencies->where('name', '==', 'USD')->first();
    $TRY = $baseCurrencies->where('name', '==', 'TRY')->first();
    $EUR = $baseCurrencies->where('name', '==', 'EUR')->first();
    $USD->value = $currencies['USD'];
    $TRY->value = $currencies['TRY'];
    $EUR->value = $currencies['EUR'];
    $USD->update();
    $TRY->update();
    $EUR->update();
}
