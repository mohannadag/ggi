<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // app()->setLocale($request->route('locale'));

        // dd($request->route('locale'));
        $local = Session::get('currentLocal', 'ar');

        Session::put('currentLocal', $local);
        App::setLocale($local);
        // dd($local);
        // $locale   = Session::get('currentLocal', 'ar');
        // dd($locale);
        // if ($request->route('locale') != null || $request->route('locale') != '') {
        //     App::setLocale(Session::put('currentLocal', $request->route('locale')));
        // }
        // else {
        //     App::setLocale(Session::put('currentLocal', 'ar'));
        // }

        // // forget the 'locale' parameter
        // $request->route()->forgetParameter('locale');
        return $next($request);
    }
}
