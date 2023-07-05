@extends('frontend.ivr')
@section('meta'){{$property->description}}@endsection
@section('image'){{ URL::asset('/images/thumbnail/'.$property->thumbnail) }}@endsection
@section('content')
@include('frontend.includes.header-ivr')
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
                        <div class="mb-5"><span class="text-base block">Our Properties</span></div>
                        <h1 class="font-lora text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium">{{ $property->property_id }}</h1>
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
            <div class="grid grid-cols-2 mb-[-30px] gap-[30px] xl:gap-[50px]">
                <div class="col-span-12 md:col-span-6 lg:col-span-8 mb-[30px]">
                    <div class="col-span-12 flex flex-wrap flex-col md:flex-row items-start justify-between">
                        <div class="mb-5 lg:mb-0">
                            <h2 class="font-lora text-primary text-[24px] sm:text-[28px] leading-[1.277] capitalize lg font-medium">{{$property->property_id}}<span class="text-secondary">.</span></h2>
                        </div>
                        <ul class="all-properties flex flex-wrap lg:pt-[10px]">
                            <li data-tab="gallery" class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><button class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px] ease-out">{{trans('file.gallery')}}</button></li>
                            @if($property->propertyDetails->video !== NULL)
                            <li data-tab="video" class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><button class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px] ease-out">{{trans('file.video')}}</button></li>
                            @endif
                            @if($property->propertyDetails->ivr !== NULL)
                            <li data-tab="ivr" class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><button class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px] ease-out"><img style="max-width: 31px; height: auto;" src="{{URL::asset('/frontend/images/360-degrees.png')}}"></button></li>
                            @endif
                        </ul>
                    </div>
                    <div class="gallery properties-tab-content active">
                        <div class="mt-[25px] mb-[35px]">
                        @php
                        $pic = json_decode($property->image->name);
                        @endphp
                        <div class="swiper mySwiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                            @foreach ($pic as $key => $p)
                            <div class="swiper-slide">
                                <a href="{{ URL::asset('images/gallery/' . $p) }}" class="gallery-image">
                                    <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('images/gallery/' . $p) }}"  alt="gallery image" loading="lazy" width="770" height="465">
                                </a>
                            </div>
                            @endforeach
                            </div>
                        </div>
                         </div>
                    </div>
                    @if($property->propertyDetails->video !== NULL)
                    <div class="video properties-tab-content">
                        <div class="mt-[45px] mb-[35px]">
                            <div class="relative">
                                <div data-relative-input="true">
                                    <img data-depth="0.1" src="{{URL::asset('images/thumbnail/' . $property->thumbnail)}}" class="w-full" width="100%" height="300px" alt="video image">
                                </div>
                                <a href="{{$property->propertyDetails->video}}" class="play-button bg-white text-white hover:text-primary absolute left-0 right-0 mx-auto top-1/2 -translate-y-1/2 hover:scale-105 hover:bg-primary w-[55px] h-[55px] flex flex-wrap z-[1] items-center justify-center opacity-100 shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] transition-all rounded-full group before:block before:absolute  before:bg-white before:opacity-80 before:shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] hover:before:bg-primary hover:before:opacity-80 before:w-[70px] before:h-[70px] before:rounded-full before:z-[-1]" aria-label="play button">
                                    <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                    <img data-depth="0.1" src="{{URL::asset('images/thumbnail/' . $property->thumbnail)}}" class="w-full" width="100%" height="300px" alt="video image">
                                </div>
                                <a href="{{$property->propertyDetails->ivr}}" class="play-button bg-white text-white hover:text-primary absolute left-0 right-0 mx-auto top-1/2 -translate-y-1/2 hover:scale-105 hover:bg-primary w-[55px] h-[55px] flex flex-wrap z-[1] items-center justify-center opacity-100 shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] transition-all rounded-full group before:block before:absolute  before:bg-white before:opacity-80 before:shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] hover:before:bg-primary hover:before:opacity-80 before:w-[70px] before:h-[70px] before:rounded-full before:z-[-1]" aria-label="play button">
                                    <img style="max-width: 31px; height: auto;" src="{{URL::asset('/frontend/images/360-degrees.png')}}">
                                </a>
                            </div>
                         </div>
                    </div>
                    @endif
                    <div class="mt-[45px] mb-[35px]">
                        <h2 class="font-lora text-primary text-[24px] sm:text-[28px] leading-[1.277] capitalize lg font-medium">{{trans('file.starts_from')}}: <span class="text-secondary">{{ convert($property->price, $property->currency) }}</span></h2>
                        <h3 class="font-light text-[18px] text-secondary mb-[20px]"> {{ $property->country->countryTranslation->name ?? ($property->country->countryTranslationEnglish->name ?? null) }}, {{ $property->state->stateTranslation->name ?? ($property->state->stateTranslationEnglish->name ?? null) }}, {{ $property->city->cityTranslation->name ?? ($property->city->cityTranslationEnglish->name ?? null) }}</h3>
                        <p>{!! $property->propertyDetails->propertyDetailTranslation->content ?? ($property->propertyDetails->propertyDetailTranslationEnglish->content ?? null) !!}</p>
                    </div>
                    {{-- <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium">Available Units<span class="text-secondary">.</span></h5> --}}
                    {{-- <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                              <table class="min-w-full">
                                <thead class="border-b">
                                  <tr>
                                    <th scope="col" class="text-base font-medium text-gray-900 px-6 py-4 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                      {{trans('file.type')}}
                                    </th>
                                    <th scope="col" class="text-base font-medium text-gray-900 px-6 py-4 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                        {{trans('file.size')}}
                                    </th>
                                    <th scope="col" class="text-base font-medium text-gray-900 px-6 py-4 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                        {{trans('file.baths')}}
                                    </th>
                                    <th scope="col" class="text-base font-medium text-gray-900 px-6 py-4 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                        {{trans('file.starting_price')}}
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                @if ($property->propertyDetails->first_floor_price !== '0.00')
                                  <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-md font-large text-gray-900">{{$property->propertyDetails->first_floor_title}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->first_floor_size}} {{trans('file.sq-ft')}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->first_floor_baths}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ currencyConvert($property->propertyDetails->first_floor_price) }}
                                    </td>
                                  </tr>
                                  @endif
                                  @if ($property->propertyDetails->second_floor_price !== '0.00')
                                  <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->second_floor_title}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->second_floor_size}} {{trans('file.sq-ft')}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->second_floor_baths}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ currencyConvert($property->propertyDetails->second_floor_price) }}
                                    </td>
                                  </tr>
                                  @endif
                                  @if ($property->propertyDetails->third_floor_price !== '0.00')
                                  <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->third_floor_title}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->third_floor_size}} {{trans('file.sq-ft')}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->third_floor_baths}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ currencyConvert($property->propertyDetails->third_floor_price) }}
                                    </td>
                                  </tr>
                                  @endif
                                  @if ($property->propertyDetails->fourth_floor_price !== '0.00')
                                  <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->fourth_floor_title}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->fourth_floor_size}} {{trans('file.sq-ft')}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->fourth_floor_baths}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ currencyConvert($property->propertyDetails->fourth_floor_price) }}
                                    </td>
                                  </tr>
                                  @endif
                                  @if ($property->propertyDetails->fifth_floor_price !== '0.00')
                                  <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->fifth_floor_title}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->fifth_floor_size}} {{trans('file.sq-ft')}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->fifth_floor_baths}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ currencyConvert($property->propertyDetails->fifth_floor_price) }}
                                    </td>
                                  </tr>
                                  @endif
                                  @if ($property->propertyDetails->sixth_floor_price !== '0.00')
                                  <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->sixth_floor_title}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->sixth_floor_size}} {{trans('file.sq-ft')}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->sixth_floor_baths}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ currencyConvert($property->propertyDetails->sixth_floor_price) }}
                                    </td>
                                  </tr>
                                  @endif
                                  @if ($property->propertyDetails->seventh_floor_price !== '0.00')
                                  <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->seventh_floor_title}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->seventh_floor_size}} {{trans('file.sq-ft')}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->seventh_floor_baths}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ currencyConvert($property->propertyDetails->seventh_floor_price) }}
                                    </td>
                                  </tr>
                                  @endif
                                  @if ($property->propertyDetails->eighth_floor_price !== '0.00')
                                  <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->eighth_floor_title}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->eighth_floor_size}} {{trans('file.sq-ft')}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->eighth_floor_baths}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ currencyConvert($property->propertyDetails->eighth_floor_price) }}
                                    </td>
                                  </tr>
                                  @endif
                                  @if ($property->propertyDetails->ninth_floor_price !== '0.00')
                                  <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->ninth_floor_title}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->ninth_floor_size}} {{trans('file.sq-ft')}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->ninth_floor_baths}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ currencyConvert($property->propertyDetails->ninth_floor_price) }}
                                    </td>
                                  </tr>
                                  @endif
                                  @if ($property->propertyDetails->tenth_floor_price !== '0.00')
                                  <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->tenth_floor_title}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->tenth_floor_size}} {{trans('file.sq-ft')}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->tenth_floor_baths}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ currencyConvert($property->propertyDetails->tenth_floor_price) }}
                                    </td>
                                  </tr>
                                  @endif
                                  @if ($property->propertyDetails->eleventh_floor_price !== '0.00')
                                  <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->eleventh_floor_title}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->eleventh_floor_size}} {{trans('file.sq-ft')}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->eleventh_floor_baths}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ currencyConvert($property->propertyDetails->eleventh_floor_price) }}
                                    </td>
                                  </tr>
                                  @endif
                                  @if ($property->propertyDetails->twelfth_floor_price !== '0.00')
                                  <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">{{$property->propertyDetails->twelfth_floor_title}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->twelfth_floor_size}} {{trans('file.sq-ft')}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$property->propertyDetails->twelfth_floor_baths}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ currencyConvert($property->propertyDetails->twelfth_floor_price) }}
                                    </td>
                                  </tr>
                                  @endif
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                    <h4 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium"> {{trans('file.amenities')}}<span class="text-secondary">.</span>
                    </h4> --}}
                    @if($property->propertyDetails->video !== Null)
                    <div class="w-auto h-auto">
                        <div class="mt-[25px] mb-[35px]">
                            <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium">{{trans('file.video')}}<span class="text-secondary">.</span></h5>
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
                    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 px-[15px] mx-[-15px] mt-[40px]">
                        @foreach ($property->facilities as $facility)
                        <li class="flex flex-wrap items-center mb-[25px]">
                            <img class="mr-[15px]" src="{{ url('frontend/images/about/check.png') }}" loading="lazy" alt="icon" width="20" height="20">
                            <span>{{ $facility->facilityTranslation->name ?? ($facility->facilityTranslationEnglish->name ?? null) }}</span>
                        </li>
                        @endforeach
                    </ul>

                    <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium">Floor Plans<span class="text-secondary">.</span></h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-[30px]">
                        @if ($property->propertyDetails->first_floor_size !== null)
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->first_floor_picture) }}" class="floor-image">
                                <img src="{{ URL::asset('/images/floors/'.$property->propertyDetails->first_floor_picture) }}" alt="{{ $property->propertyDetails->first_floor_title }}">
                            </a>

                            <p>{{ $property->propertyDetails->first_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->second_floor_size !== null)
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->second_floor_picture) }}" class="floor-image">
                                <img src="{{ URL::asset('/images/floors/'.$property->propertyDetails->second_floor_picture) }}" alt="{{ $property->propertyDetails->second_floor_title }}">
                            </a>

                            <p>{{ $property->propertyDetails->second_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->third_floor_size !== null)
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->third_floor_picture) }}" class="floor-image">
                                <img src="{{ URL::asset('/images/floors/'.$property->propertyDetails->third_floor_picture) }}" alt="{{ $property->propertyDetails->third_floor_title }}">
                            </a>

                            <p>{{ $property->propertyDetails->third_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->fourth_floor_size !== null)
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->fourth_floor_picture) }}" class="floor-image">
                                <img src="{{ URL::asset('/images/floors/'.$property->propertyDetails->fourth_floor_picture) }}" alt="{{ $property->propertyDetails->fourth_floor_title }}">
                            </a>

                            <p>{{ $property->propertyDetails->fourth_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->fifth_floor_size !== null)
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->fifth_floor_picture) }}" class="floor-image">
                                <img src="{{ URL::asset('/images/floors/'.$property->propertyDetails->fifth_floor_picture) }}" alt="{{ $property->propertyDetails->fifth_floor_title }}">
                            </a>

                            <p>{{ $property->propertyDetails->fifth_floor_title }}</p>
                        </div>
                        @endif
                        @if ($property->propertyDetails->sixth_floor_size !== null)
                        <div class="text-center">
                            <a href="{{ URL::asset('/images/floors/'.$property->propertyDetails->sixth_floor_picture) }}" class="floor-image">
                                <img src="{{ URL::asset('/images/floors/'.$property->propertyDetails->sixth_floor_picture) }}" alt="{{ $property->propertyDetails->sixth_floor_title }}">
                            </a>

                            <p>{{ $property->propertyDetails->sixth_floor_title }}</p>
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
        $('#SubmitForm').on('submit', function(e) {
            e.preventDefault();
            $('.v3').text("Submitting...");
            $('.v3').prop('disabled', true);
            let id = $('#InputId').val();
            let title = $('#InputTitle').val();
            let address = $('#InputAddress').val();
            let date = $('#InputDate').val();
            let time = $('#InputTime').val();
            let name = $('#InputName').val();
            let email = $('#InputEmail').val();
            let phone = $('#InputPhone').val();
            let message = $('#comment').val();
            let property_id = $('#PropertyId').val();
            let comment = $('#comment').val();

            $.ajax({
                url: "{{ route('booking.request') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    title: title,
                    address: address,
                    date: date,
                    time: time,
                    name: name,
                    email: email,
                    phone: phone,
                    message: message,
                    property_id: property_id,
                    comment: comment
                },
                success: function(response) {
                    $('#InputDate').val("");
                    $('#InputTime').val("");
                    $('#InputName').val("");
                    $('#InputEmail').val("");
                    $('#InputPhone').val("");
                    $('#comment').val("");

                    $('.v3').text("Submit");
                    $('.v3').prop('disabled', false);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Booking Request Submitted!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                error: function(response) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout(function() {
                        $('#timeErrorMsg').fadeOut("slow");
                        $('#dateErrorMsg').fadeOut("slow");
                        $('#nameErrorMsg').fadeOut("slow");
                        $('#phoneErrorMsg').fadeOut("slow");
                        $('#emailErrorMsg').fadeOut("slow");
                        $('#messageErrorMsg').fadeOut("slow");
                    }, 3000);
                    $('.v3').text("Submit");
                    $('.v3').prop('disabled', false);
                },
            });
        });

        // Add remove loading class on body element based on Ajax request status
        $(document).on({
            ajaxStart: function() {
                $("body").addClass("loading");
            },
            ajaxStop: function() {
                $("body").removeClass("loading");
            }
        });
    </script>
    <script type="text/javascript">
        $('#SubmitForm').on('submit', function(e) {
            e.preventDefault();

            let id = $('#InputId').val();
            let name = $('#InputName').val();
            let email = $('#InputEmail').val();
            let phone = $('#InputPhone').val();
            let message = $('#message').val();

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
