@extends('errors.layout')
@section('content')
    <!--error  start-->
    <div class="ps-page--404">
        <div class="container">
            <div class="ps-block--404">
                <div class="ps-block__image"><img src="{{asset('frontend/img/404.png')}}" alt=""></div>
                <div class="ps-block__content">
                    <h3>@yield('code') | @yield('message')</h3>
                    <p>Sorry, it seems we were unable to fetch what you are looking for!</p><a class="ps-btn" href="/">Back To Hompage</a>
                </div>
            </div>
        </div>
    </div>
    <!--error ends-->
@endsection
