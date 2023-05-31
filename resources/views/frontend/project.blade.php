@extends('frontend.ivr')
@section('meta'){{$property->description}}@endsection
@section('image'){{ URL::asset('/images/thumbnail/'.$property->thumbnail) }}@endsection
@section('content')
{{-- @include('frontend.includes.header-ivr') --}}
@include('frontend.includes.header1')
    @php

        $languages = \Illuminate\Support\Facades\DB::table('languages')

            ->select('id', 'name', 'locale')

            // ->where('default','=',0)

            ->where('locale', '!=', \Illuminate\Support\Facades\Session::get('currentLocal'))

            ->orderBy('name', 'ASC')

            ->get();

        \Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

    @endphp


    <!-- Hero section start -->
    <section class="bg-no-repeat bg-center bg-cover bg-[#FFF6F0] h-[350px] lg:h-[513px] flex flex-wrap items-center relative before:absolute before:inset-0 before:content-[''] before:bg-[#000000] before:opacity-[70%]" style="background-image: url('{{ URL::asset('/images/thumbnail/'.$property->thumbnail) }}');">
        <div class="container">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="max-w-[600px]  mx-auto text-center text-white relative z-[1]">
                        <div class="mb-5"><span class="text-base block">{{trans('file.ggi_listings')}}</span></div>
                        <h1 class="font-lora text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium">{{ $property->property_id ?? ($property->property_id ?? null) }}</h1>
                        <p class="text-base mt-5 max-w-[500px] mx-auto text-center">
                            {{ $property->country->countryTranslation->name ?? ($property->country->countryTranslationEnglish->name ?? null) }},
                            {{ $property->state->stateTranslation->name ?? ($property->state->stateTranslationEnglish->name ?? null) }},
                            {{ $property->city->cityTranslation->name ?? ($property->city->cityTranslationEnglish->name ?? null) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->

    <!-- Popular Properties start -->
    <section class="popular-properties py-[80px] lg:py-[120px]">
        <div class="container">
            <div class="grid grid-cols-1 mb-[-30px] gap-[30px] xl:gap-[50px]">
                <div class="col-span-12 md:col-span-6 lg:col-span-8 mb-[30px]">
                    <div class="col-span-12 flex flex-wrap flex-col md:flex-row items-start justify-between">
                        <div class="mb-5 lg:mb-0">
                            <h2 class="font-lora text-primary text-[24px] sm:text-[28px] leading-[1.277] capitalize lg font-medium">{{$property->title}}<span class="text-secondary">.</span></h2>
                        </div>
                        <ul class="all-properties flex flex-wrap lg:pt-[10px]">
                            <li data-tab="gallery" class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><button class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px] ease-out">{{trans('file.gallery')}}</button></li>
                            @if($property->propertyDetails->plans_link !== NULL)
                            <li class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><a href="{{$property->propertyDetails->plans_link ?? ($property->propertyDetails->plans_link ?? null)}}" class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px]">Plans</a></li>
                            @endif
                            @if($property->propertyDetails->video !== NULL)
                            <li data-tab="video" class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><button class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px] ease-out">{{trans('file.video')}}</button></li>
                            @endif
                            @if($property->propertyDetails->ivr !== NULL)
                            <li data-tab="ivr" class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><button class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px] ease-out"><img style="max-width: 31px; height: auto;" src="{{URL::asset('/frontend/images/360-degrees.png')}}"></button></li>
                            @endif
                            @if($property->propertyDetails->presentation !== NULL)
                            <li class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><a href="{{$property->propertyDetails->propertyDetailTranslation->presentation ?? ($property->propertyDetails->propertyDetailTranslationEnglish->presentation ?? null)}}" class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px]">PDF</a></li>
                            @endif
                            @if($property->propertyDetails->word_link !== NULL)
                            <li class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><a href="{{$property->propertyDetails->word_link ?? ($property->propertyDetails->word_link ?? null)}}" class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px]">Word</a></li>
                            @endif
                            @if($property->propertyDetails->drive_link !== NULL)
                            <li class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><a href="{{$property->propertyDetails->drive_link ?? ($property->propertyDetails->drive_link ?? null)}}" class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px]">Drive Link</a></li>
                            @endif
                            @if($property->propertyDetails->prices_link !== NULL)
                            <li class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><a href="{{$property->propertyDetails->prices_link ?? ($property->propertyDetails->prices_link ?? null)}}" class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px]">Prices</a></li>
                            @endif
                            @if($property->propertyDetails->whatsapp_link !== NULL)
                            <li class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><a href="{{$property->propertyDetails->whatsapp_link ?? ($property->propertyDetails->whatsapp_link ?? null)}}" class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px]">Whatsapp</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="gallery properties-tab-content active">
                        <div class="mt-[25px] mb-[35px]">
                        @php
                        $pic = json_decode($property->image->name);
                        @endphp
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                <a href="{{ URL::asset('/images/thumbnail/' . $property->thumbnail) }}" class="gallery-image">
                                    <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/thumbnail/' . $property->thumbnail) }}"  alt="gallery image" loading="lazy" ">
                                </a>
                            </div>
                                @if ($pic)
                            @foreach ($pic as $key => $p)
                            <div class="swiper-slide">
                                <a href="{{ URL::asset('images/gallery/' . $p) }}" class="gallery-image">
                                    <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('images/gallery/' . $p) }}"  alt="gallery image" loading="lazy" ">
                                </a>
                            </div>
                            @endforeach
                            @endif
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                         </div>
                    </div>
                    @if($property->propertyDetails->video !== NULL)
                    <div class="video properties-tab-content">
                        <div class="mt-[25px] mb-[35px]">
                            <div class="relative">
                                <div data-relative-input="true">
                                    <img data-depth="0.1" src="{{URL::asset('images/thumbnail/' . $property->thumbnail)}}" class="object-cover rounded-[8px] w-full h-full" width="100%" height="300px" alt="video image">
                                </div>
                                <a href="{{$property->propertyDetails->video}}" target="_blank" class="play-button bg-white text-white hover:text-primary absolute left-0 right-0 mx-auto top-1/2 -translate-y-1/2 hover:scale-105 hover:bg-primary w-[120px] h-[120px] flex flex-wrap z-[1] items-center justify-center opacity-100 shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] transition-all rounded-full group before:block before:absolute  before:bg-white before:opacity-80 before:shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] hover:before:bg-primary hover:before:opacity-80 before:w-[70px] before:h-[70px] before:rounded-full before:z-[-1]" aria-label="play button">
                                    <svg width="35" height="35" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="stroke-primary group-hover:stroke-white" d="M1.63861 10.764V6.70324C1.63861 1.66145 5.20893 -0.403178 9.57772 2.11772L13.1024 4.14812L16.6271 6.17853C20.9959 8.69942 20.9959 12.8287 16.6271 15.3496L13.1024 17.38L9.57772 19.4104C5.20893 21.9313 1.63861 19.8666 1.63861 14.8249V10.764Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                         </div>
                    </div>
                    @endif
                    @if($property->propertyDetails->ivr !== NULL)
                    <div class="ivr properties-tab-content">
                        <div class="mt-[25px] mb-[35px]">
                            <div class="relative">
                                <div data-relative-input="true">
                                    <img data-depth="0.1" src="{{URL::asset('images/thumbnail/' . $property->thumbnail)}}" class="w-full rounded-[8px]" width="100%" height="300px" alt="video image">
                                </div>
                                <a href="{{$property->propertyDetails->ivr}}" target="_blank" class="bg-white text-white hover:text-primary absolute left-0 right-0 mx-auto top-1/2 -translate-y-1/2 hover:scale-105 hover:bg-primary w-[120px] h-[120px] flex flex-wrap z-[1] items-center justify-center opacity-100 shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] transition-all rounded-full group before:block before:absolute  before:bg-white before:opacity-80 before:shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] hover:before:bg-primary hover:before:opacity-80 before:w-[70px] before:h-[70px] before:rounded-full before:z-[-1]">
                                    <img style="max-width: 70px;height: auto;" src="{{URL::asset('/frontend/images/360-degrees.png')}}">
                                </a>
                            </div>
                         </div>
                    </div>
                    @endif
                    <div class="mt-[45px] mb-[35px]">
                        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 px-[15px] mx-[-15px] mt-[40px]">
                            <li class="flex flex-wrap items-center mb-[25px]">
                                @if($property->price !== '')
                                <h2 class="font-lora text-primary text-[24px] sm:text-[28px] leading-[1.277] capitalize lg font-medium">{{trans('file.starts_from')}}: <span class="text-secondary"> {{ currencyConvert($property->price) }}</span></h2>
                                @else
                                <h2 class="font-lora text-primary text-[24px] sm:text-[28px] leading-[1.277] capitalize lg font-medium">{{trans('file.starts_from')}}: <span class="text-secondary">No Price Given</span></h2>
                                @endif
                            </li>
                        </ul>
                        <h3 class="font-light text-[18px] text-secondary mb-[20px]"> {{ $property->country->countryTranslation->name ?? ($property->country->countryTranslationEnglish->name ?? null) }}, {{ $property->state->stateTranslation->name ?? ($property->state->stateTranslationEnglish->name ?? null) }}, {{ $property->city->cityTranslation->name ?? ($property->city->cityTranslationEnglish->name ?? null) }}</h3>

                        <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium">{{trans('file.property_details')}}<span class="text-secondary">.</span></h5>
                        <div class="project-body">
                            <p>{!! $property->propertyDetails->propertyDetailTranslation->content ?? ($property->propertyDetails->propertyDetailTranslationEnglish->content ?? null) !!}</p>
                        </div>
                    </div>
                    @if ($property->propertyDetails->first_floor_title !== NULL)
                <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium">{{trans('file.available_units')}}<span class="text-secondary">.</span></h5>
                <li class="flex flex-wrap items-center mb-[25px]">
                    <h2 class="font-lora text-primary leading-[1.277] capitalize lg font-medium">{{trans('file.payment_options')}}: <span class="text-secondary">@if($property->propertyDetails->cash == 2) {{trans('file.cash')}} @endif @if($property->propertyDetails->installments == 2) ,{{trans('file.installments')}} @endif </span></h2>
                </li>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead class="border-b">
                                        <tr>
                                            <th scope="col" class="text-base {{ App::isLocale('ar') ? 'rounded-r' : 'rounded-l' }} bg-primary font-medium text-white px-6 py-4 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                                {{trans('file.type')}}
                                            </th>
                                            <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                                {{trans('file.min_size')}}
                                            </th>
                                            <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                                {{trans('file.max_size')}}
                                            </th>
                                            <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                                {{trans('file.min_price')}}
                                            </th>
                                            <th scope="col" class="text-base {{ App::isLocale('ar') ? 'rounded-l' : 'rounded-r' }} font-medium bg-primary text-white px-6 py-4 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                                {{trans('file.max_price')}}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($property->propertyDetails->first_floor_price !== '0.00')
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-large text-gray-900">{{$property->propertyDetails->first_floor_title}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->first_floor_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->first_floor_max_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->first_floor_price) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->first_floor_max_price) }}
                                            </td>
                                        </tr>
                                        @endif
                                        @if ($property->propertyDetails->second_floor_price !== '0.00')
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->second_floor_title}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->second_floor_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->second_floor_max_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->second_floor_price) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->second_floor_max_price) }}
                                            </td>
                                        </tr>
                                        @endif
                                        @if ($property->propertyDetails->third_floor_price !== '0.00')
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->third_floor_title}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->third_floor_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->third_floor_max_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->third_floor_price) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->third_floor_max_price) }}
                                            </td>
                                        </tr>
                                        @endif
                                        @if ($property->propertyDetails->fourth_floor_price !== '0.00')
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->fourth_floor_title}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->fourth_floor_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->fourth_floor_max_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->fourth_floor_price) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->fourth_floor_max_price) }}
                                            </td>
                                        </tr>
                                        @endif
                                        @if ($property->propertyDetails->fifth_floor_price !== '0.00')
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->fifth_floor_title}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->fifth_floor_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->fifth_floor_max_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->fifth_floor_price) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->fifth_floor_max_price) }}
                                            </td>
                                        </tr>
                                        @endif
                                        @if ($property->propertyDetails->sixth_floor_price !== '0.00')
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->sixth_floor_title}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->sixth_floor_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->sixth_floor_max_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->sixth_floor_price) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->sixth_floor_max_price) }}
                                            </td>
                                        </tr>
                                        @endif
                                        @if ($property->propertyDetails->seventh_floor_price !== '0.00')
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->seventh_floor_title}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->seventh_floor_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->seventh_floor_max_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->seventh_floor_price) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->seventh_floor_max_price) }}
                                            </td>
                                        </tr>
                                        @endif
                                        @if ($property->propertyDetails->eighth_floor_price !== '0.00')
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->eighth_floor_title}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->eighth_floor_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->eighth_floor_max_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->eighth_floor_price) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->eighth_floor_max_price) }}
                                            </td>
                                        </tr>
                                        @endif
                                        @if ($property->propertyDetails->ninth_floor_price !== '0.00')
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->ninth_floor_title}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->ninth_floor_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->ninth_floor_max_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->ninth_floor_price) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->ninth_floor_max_price) }}
                                            </td>
                                        </tr>
                                        @endif
                                        @if ($property->propertyDetails->tenth_floor_price !== '0.00')
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->tenth_floor_title}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->tenth_floor_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->tenth_floor_max_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->tenth_floor_price) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->tenth_floor_max_price) }}
                                            </td>
                                        </tr>
                                        @endif
                                        @if ($property->propertyDetails->eleventh_floor_price !== '0.00')
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->eleventh_floor_title}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->eleventh_floor_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->eleventh_floor_max_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->eleventh_floor_price) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->eleventh_floor_max_price) }}
                                            </td>
                                        </tr>
                                        @endif
                                        @if ($property->propertyDetails->twelfth_floor_price !== '0.00')
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->twelfth_floor_title}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->twelfth_floor_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$property->propertyDetails->twelfth_floor_max_size}} {{trans('file.sq-ft')}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->twelfth_floor_price) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ currencyConvert($property->propertyDetails->twelfth_floor_max_price) }}
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($property->facilities->count() > 0 )
                <h4 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium"> {{trans('file.amenities')}}<span class="text-secondary">.</span>
                </h4>
                @endif

                <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 px-[15px] mx-[-15px] mt-[40px]">
                    @foreach ($property->facilities as $facility)
                    <li class="flex flex-wrap items-center mb-[25px]">
                        <img class="mr-[15px]" src="{{ url('frontend/images/about/check.png') }}" loading="lazy" alt="icon" width="20" height="20">
                        &nbsp;<span>{{ $facility->facilityTranslation->name ?? ($facility->facilityTranslationEnglish->name ?? null) }}</span>
                    </li>
                    @endforeach
                </ul>
                    <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium">{{trans('file.floor_plans')}}<span class="text-secondary">.</span></h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-[30px]">
                        @if ($property->propertyDetails->first_floor_picture !== 'default.png' && $property->propertyDetails->first_floor_picture !== '')

                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->first_floor_picture)  }}" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/floors/'.$property->propertyDetails->first_floor_picture)  }}"  alt="{{ $property->propertyDetails->first_floor_picture }}" loading="lazy">
                            </a>
                            <p>{{ $property->propertyDetails->first_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->second_floor_picture !== 'default.png' && $property->propertyDetails->second_floor_picture !== '')
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->second_floor_picture)  }}" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/floors/'.$property->propertyDetails->second_floor_picture)  }}"  alt="{{ $property->propertyDetails->second_floor_title }}" loading="lazy" ">
                            </a>
                            <p>{{ $property->propertyDetails->second_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->third_floor_picture !== 'default.png' && $property->propertyDetails->third_floor_picture !== '')
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->third_floor_picture)  }}" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/floors/'.$property->propertyDetails->third_floor_picture)  }}"  alt="{{ $property->propertyDetails->third_floor_title }}" loading="lazy" ">
                            </a>
                            <p>{{ $property->propertyDetails->third_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->fourth_floor_picture !== 'default.png' && $property->propertyDetails->fourth_floor_picture !== '')
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->fourth_floor_picture)  }}" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/floors/'.$property->propertyDetails->fourth_floor_picture)  }}"  alt="{{ $property->propertyDetails->fourth_floor_title }}" loading="lazy" ">
                            </a>
                            <p>{{ $property->propertyDetails->fourth_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->fifth_floor_picture !== 'default.png' && $property->propertyDetails->fifth_floor_picture !== '')
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->fifth_floor_picture)  }}" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/floors/'.$property->propertyDetails->fifth_floor_picture)  }}"  alt="{{ $property->propertyDetails->fifth_floor_title }}" loading="lazy" ">
                            </a>
                            <p>{{ $property->propertyDetails->fifth_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->sixth_floor_picture !== 'default.png' && $property->propertyDetails->sixth_floor_picture !== '')
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->sixth_floor_picture)  }}" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/floors/'.$property->propertyDetails->sixth_floor_picture)  }}"  alt="{{ $property->propertyDetails->sixth_floor_title }}" loading="lazy" ">
                            </a>
                            <p>{{ $property->propertyDetails->sixth_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->seventh_floor_picture !== 'default.png' && $property->propertyDetails->seventh_floor_picture !== '')
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->seventh_floor_picture)  }}" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/floors/'.$property->propertyDetails->seventh_floor_picture)  }}"  alt="{{ $property->propertyDetails->seventh_floor_title }}" loading="lazy" ">
                            </a>
                            <p>{{ $property->propertyDetails->seventh_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->eighth_floor_picture !== 'default.png' && $property->propertyDetails->eighth_floor_picture !== '')
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->eighth_floor_picture)  }}" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/floors/'.$property->propertyDetails->eighth_floor_picture)  }}"  alt="{{ $property->propertyDetails->eighth_floor_title }}" loading="lazy" ">
                            </a>
                            <p>{{ $property->propertyDetails->eighth_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->ninth_floor_picture !== 'default.png' && $property->propertyDetails->ninth_floor_picture !== '')
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->ninth_floor_picture)  }}" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/floors/'.$property->propertyDetails->ninth_floor_picture)  }}"  alt="{{ $property->propertyDetails->ninth_floor_title }}" loading="lazy" ">
                            </a>
                            <p>{{ $property->propertyDetails->ninth_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->tenth_floor_picture !== 'default.png' && $property->propertyDetails->tenth_floor_picture !== '')
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->tenth_floor_picture)  }}" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/floors/'.$property->propertyDetails->tenth_floor_picture)  }}"  alt="{{ $property->propertyDetails->tenth_floor_title }}" loading="lazy" ">
                            </a>
                            <p>{{ $property->propertyDetails->tenth_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->eleventh_floor_picture !== 'default.png' && $property->propertyDetails->eleventh_floor_picture !== '')
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->eleventh_floor_picture)  }}" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/floors/'.$property->propertyDetails->eleventh_floor_picture)  }}"  alt="{{ $property->propertyDetails->eleventh_floor_title }}" loading="lazy" ">
                            </a>
                            <p>{{ $property->propertyDetails->eleventh_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->twelfth_floor_picture !== 'default.png' && $property->propertyDetails->twelfth_floor_picture !== '')
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->twelfth_floor_picture)  }}" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/floors/'.$property->propertyDetails->twelfth_floor_picture)  }}"  alt="{{ $property->propertyDetails->twelfth_floor_title }}" loading="lazy" ">
                            </a>
                            <p>{{ $property->propertyDetails->twelfth_floor_title }}</p>
                        </div>
                        @endif
                    </div>

</div>
            </div>

        </div>
    </section>
@endsection
@push('script')
<script type="text/javascript">
        $('#SubmitFormAgent').on('submit', function(e) {
            e.preventDefault();

            let id = $('#Id').val();
            let name = $('#Name').val();
            let email = $('#Email').val();
            let phone = $('#Phone').val();
            let message = $('#send-message').val();

            $.ajax({
                url: "{{ route('messages.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    name: name,
                    email: email,
                    phone: phone,
                    message: message,
                },
                success: function(response) {
                    // $('#successMsg').show();
                    // alert(response.errors);
                    let html = '';
                    if (response.errors) {
                        html = '<div class="alert alert-danger">';
                        for (let count = 0; count < response.errors.length; count++) {
                            html += '<p>' + response.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#alert_message').fadeIn("slow");
                        $('#alert_message').html(html);
                        setTimeout(function() {
                            $('#alert_message').fadeOut("slow");
                        }, 3000);
                    } else if (response.success) {
                        // alert('submitted');
                        $('#InputName').val("");
                        $('#InputEmail').val("");
                        $('#InputPhone').val("");
                        $('#message').val("");

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Message Sent!',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        console.log(response);
                    }

                }
            });
        });
    </script>
@endpush
