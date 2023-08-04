@extends('frontend.main')
@section('title'){{ 'GGI-'. $property->property_id}}@endsection
@section('meta'){{$property->description}}@endsection
@section('image'){{ URL::asset('/images/thumbnail/'.$property->thumbnail) }}@endsection
@section('content')
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
                    <h1 class="font-lora text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium">{{$property->property_id}}</h1>
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
        <div class="grid grid-cols-12 mb-[-30px] gap-[30px] xl:gap-[50px]">
            <div class="col-span-12 md:col-span-9 lg:col-span-9 mb-[30px]">
                <div class="col-span-12 flex flex-wrap flex-col md:flex-row items-start justify-between property-list">
                    <div class="mb-5 lg:mb-0">
                        <h2 class="font-lora text-primary text-4xl leading-[1.277] capitalize font-medium mb-3">
                            {{$property->property_id}}
                        </h2>
                        <p class="p-2">{{ $property->propertyTranslation->description ?? $property->description ?? '' }}</p>
                    </div>

                </div>
                <div class="m-3">
                    <ul class="all-properties flex flex-wrap" style="justify-content: space-between;margin-block-start: 1em;
                    margin-block-end: 1em;">
                        <li data-tab="gallery" class="mb-4 lg:mb-0 leading-none property-list-item md:w-5/12 w-screen">
                            <button class="leading-none capitalize hover:text-secondary transition-all text-[16px] sm:text-[28px] ease-out w-full">{{trans('file.gallery')}}</button>
                        </li>
                        @if($property->propertyDetails->ivr !== NULL)
                        {{-- <li data-tab="ivr" class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none property-list-item"><button class="leading-none capitalize hover:text-secondary transition-all text-[16px] ease-out"><img style="max-width: 31px; height: auto;" src="{{URL::asset('/frontend/images/360-degrees.png')}}"></button></li> --}}
                        <li data-tab="ivr" class="mb-4 lg:mb-0 leading-none property-list-item md:w-5/12 w-screen">
                            <button class="leading-none capitalize hover:text-secondary transition-all text-[16px] sm:text-[28px] ease-out w-full">{{trans('file.ivr')}}</button>
                        </li>
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
                                        <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/thumbnail/' . $property->thumbnail) }}" alt="gallery image" loading="lazy" width="770" height="465">
                                    </a>
                                </div>
                                @if ($pic)
                                @foreach ($pic as $key => $p)
                                <div class="swiper-slide">
                                    <a href="{{ URL::asset('images/gallery/' . $p) }}" class="gallery-image">
                                        <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('images/gallery/' . $p) }}" alt="gallery image" loading="lazy" width="770" height="465">
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
                @if($property->propertyDetails->ivr !== NULL)
                <div class="ivr properties-tab-content">
                    <div class="mt-[25px] mb-[35px]">
                        <div class="relative">
                            <iframe src="{{ $property->propertyDetails->ivr }}" title="Virtual reality" height="600px" width="100%"></iframe>
                            {{-- <div data-relative-input="true">
                                <img data-depth="0.1" src="{{URL::asset('images/thumbnail/' . $property->thumbnail)}}" class="w-full rounded-[8px]" width="100%" height="300px" alt="video image">
                            </div>
                            <a href="{{$property->propertyDetails->ivr}}" target="_blank" class="bg-white text-white hover:text-primary absolute left-0 right-0 mx-auto top-1/2 -translate-y-1/2 hover:scale-105 hover:bg-primary w-[120px] h-[120px] flex flex-wrap z-[1] items-center justify-center opacity-100 shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] transition-all rounded-full group before:block before:absolute  before:bg-white before:opacity-80 before:shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] hover:before:bg-primary hover:before:opacity-80 before:w-[70px] before:h-[70px] before:rounded-full before:z-[-1]">
                                <img style="max-width: 70px;height: auto;" src="{{URL::asset('/frontend/images/360-degrees.png')}}">
                            </a> --}}
                        </div>
                    </div>
                </div>
                @endif
                <div class="mt-[45px] mb-[35px]">
                    {{-- <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 px-[15px] mx-[-15px] mt-[40px]">
                        <li class="flex flex-wrap items-center mb-[25px]">
                            @if($property->price !== '')
                            <h2 class="font-lora text-primary text-[24px] sm:text-[28px] leading-[1.277] capitalize lg font-medium">{{trans('file.starts_from')}}: <span class="text-secondary"> {{ currencyConvert($property->price) }}</span></h2>
                            @else
                            <h2 class="font-lora text-primary text-[24px] sm:text-[28px] leading-[1.277] capitalize lg font-medium">{{trans('file.starts_from')}}: <span class="text-secondary">No Price Given</span></h2>
                            @endif
                        </li>
                    </ul> --}}

                    <div>
                        <dl class="mt-5 text-center grid grid-cols-3 gap-4 sm:grid-cols-3">
                            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-2">
                                <dt class="truncate text-sm font-medium text-gray-500">{{trans('file.city')}}</dt>
                                <dd class="mt-1 font-semibold tracking-tight text-gray-900">{{ $property->state->stateTranslation->name ?? ($property->state->stateTranslationEnglish->name ?? null) }}</dd>
                            </div>

                            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-2">
                                <dt class="truncate text-sm font-medium text-gray-500">{{trans('file.state_area')}}</dt>
                                <dd class="mt-1 font-semibold tracking-tight text-gray-900"> {{ $property->city->cityTranslation->name ?? ($property->city->cityTranslationEnglish->name ?? null) }}</dd>
                            </div>

                            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-2">
                                <dt class="truncate text-sm font-medium text-gray-500">{{trans('file.property_type')}}</dt>
                                <dd class="mt-1 font-semibold tracking-tight text-gray-900">{{ $property->category->categoryTranslation->name }}</dd>
                            </div>
                            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-2">
                                <dt class="truncate text-sm font-medium text-gray-500">{{trans('file.status')}}</dt>
                                @if($property->propertyDetails->deliver_year <= '2022')
                                <dd class="mt-1 font-semibold tracking-tight text-gray-900">{{trans('file.ready_project')}}</dd>
                                @elseif($property->propertyDetails->deliver_year >= '2023')
                                <dd class="mt-1 font-semibold tracking-tight text-gray-900">{{trans('file.under_construction')}}</dd>
                                @endif
                            </div>
                            @if($property->propertyDetails->deliver_year !== '')
                            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-2">
                                <dt class="truncate text-sm font-medium text-gray-500">{{trans('file.construction_year')}}</dt>
                                <dd class="mt-1 font-semibold tracking-tight text-gray-900">{{$property->propertyDetails->deliver_year}}</dd>
                            </div>
                            @endif
                        </dl>
                    </div>


                    @if($property->category_id == '5')
                    <h4 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium my-5"> {{trans('file.features')}}
                    </h4>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 px-[15px] mx-[-15px] mt-[40px]">
                        @if($property->propertyDetails->heating == 2)
                        <li class="flex flex-wrap items-center mb-[25px]">
                            <img class="mr-[15px]" src="{{ url('frontend/images/interior/heating.png') }}" loading="lazy" alt="icon" width="30" height="20">
                            &nbsp; <span>{{trans('file.central_heating')}}</span>
                        </li>
                        @endif
                        @if($property->propertyDetails->heating == 3)
                        <li class="flex flex-wrap items-center mb-[25px]">
                            <img class="mr-[15px]" src="{{ url('frontend/images/interior/heating.png') }}" loading="lazy" alt="icon" width="30" height="20">
                            &nbsp;<span>{{trans('file.natural_gas')}}</span>
                        </li>
                        @endif
                        @if($property->propertyDetails->view == "2")
                        <li class="flex flex-wrap items-center mb-[25px]">
                            <img class="mr-[15px]" src="{{ url('frontend/images/interior/view.png') }}" loading="lazy" alt="icon" width="30" height="20">
                            &nbsp;<span>{{trans('file.view_sea')}}</span>
                        </li>
                        @endif
                        @if($property->propertyDetails->view == "3")
                        <li class="flex flex-wrap items-center mb-[25px]">
                            <img class="mr-[15px]" src="{{ url('frontend/images/interior/view.png') }}" loading="lazy" alt="icon" width="30" height="20">
                            &nbsp;<span>{{trans('file.view_forest')}}</span>
                        </li>
                        @endif
                        @if($property->propertyDetails->view == "4")
                        <li class="flex flex-wrap items-center mb-[25px]">
                            <img class="mr-[15px]" src="{{ url('frontend/images/interior/view.png') }}" loading="lazy" alt="icon" width="30" height="20">
                            &nbsp;<span>{{trans('file.view_street')}}</span>
                        </li>
                        @endif
                        @if($property->propertyDetails->view == "5")
                        <li class="flex flex-wrap items-center mb-[25px]">
                            <img class="mr-[15px]" src="{{ url('frontend/images/interior/view.png') }}" loading="lazy" alt="icon" width="30" height="20">
                            &nbsp;<span>{{trans('file.view_landscape')}}</span>
                        </li>
                        @endif
                        @if($property->propertyDetails->view == "6")
                        <li class="flex flex-wrap items-center mb-[25px]">
                            <img class="mr-[15px]" src="{{ url('frontend/images/interior/view.png') }}" loading="lazy" alt="icon" width="30" height="20">
                            &nbsp;<span>{{trans('file.view_lack')}}</span>
                        </li>
                        @endif
                        @if($property->propertyDetails->view == "7")
                        <li class="flex flex-wrap items-center mb-[25px]">
                            <img class="mr-[15px]" src="{{ url('frontend/images/interior/view.png') }}" loading="lazy" alt="icon" width="30" height="20">
                            &nbsp;<span>{{trans('file.view_panorama')}}</span>
                        </li>
                        @endif
                        @if($property->propertyDetails->view == "8")
                        <li class="flex flex-wrap items-center mb-[25px]">
                            <img class="mr-[15px]" src="{{ url('frontend/images/interior/view.png') }}" loading="lazy" alt="icon" width="30" height="20">
                            &nbsp;<span>{{trans('file.view_garden')}}</span>
                        </li>
                        @endif
                        @if($property->propertyDetails->title_deed_type == "1")
                        <li class="flex flex-wrap items-center mb-[25px]">
                            <img class="mr-[15px]" src="{{ url('frontend/images/interior/titledeed.png') }}" loading="lazy" alt="icon" width="30" height="20">
                            &nbsp;<span>{{trans('file.ready_title')}}</span>
                        </li>
                        @endif
                        @if($property->propertyDetails->deliver_year <= date("Y")) <li class="flex flex-wrap items-center mb-[25px]">
                            <img class="mr-[15px]" src="{{ url('frontend/images/interior/ready.png') }}" loading="lazy" alt="icon" width="30" height="20">
                            &nbsp;<span>{{trans('file.ready_project')}}</span>
                            </li>
                            @elseif($property->propertyDetails->deliver_year >= date("Y"))
                            <li class="flex flex-wrap items-center mb-[25px]">
                                <img class="mr-[15px]" src="{{ url('frontend/images/interior/construction.png') }}" loading="lazy" alt="icon" width="30" height="20">
                                &nbsp;<span>{{trans('file.under_construction')}}</span>
                            </li>
                            @endif
                    </ul>
                    @endif
                    <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium my-5">{{trans('file.project_details')}}<span class="text-secondary">{{trans('file.q-mark')}}</span></h5>
                    <div class="blog-body">
                        {!! $property->propertyDetails->propertyDetailTranslation->content ?? ($property->propertyDetails->propertyDetailTranslationEnglish->content ?? null) !!}
                    </div>
                </div>
                @if($property->propertyDetails->video !== Null)
                <div class="w-auto h-auto">
                    <div class="mt-[25px] mb-[35px]">
                        <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium my-5">{{trans('file.video')}}</h5>
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

                {{-- @if ($property->propertyDetails->first_floor_title !== NULL) --}}
                <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium my-5">{{trans('file.available_units')}}</h5>
                <div class="flex flex-wrap items-center mb-[25px]">
                    <h2 class="font-lora text-primary leading-[1.277] capitalize lg font-medium my-5">{{trans('file.payment_options')}}:</h2>
                    <p class="text-secondary">
                        @if($property->propertyDetails->cash == 2) <span class="mx-4">{{trans('file.cash')}}</span> @endif
                        @if($property->propertyDetails->installments == 2) <span class="mx-4">{{trans('file.installments')}}</span> @endif
                    </p>
                </div>
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
                                            <!-- <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                                {{trans('file.max_size')}}
                                            </th> -->
                                            <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                                {{trans('file.min_price')}}
                                            </th>
                                            <!-- <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                                {{trans('file.max_price')}}
                                            </th> -->
                                            <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                                {{trans('file.notes')}}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($property->propertyDetails->floors as $floor)
                                            @if($floor->is_sold == 1)
                                                <tr class="border-b bg-[#E9F1FF]">
                                                    <td class="px-6 py-4 whitespace-nowrap text-base font-large text-gray-900">
                                                        <s>{{$floor->unit_id}}</s>
                                                        <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-primary px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-white">
                                                            {{trans('file.sold')}}</span>
                                                        {{-- @if((App::isLocale('ar') ? $floor->note_ar : $floor->note_en != '') || (App::isLocale('ar') ? $floor->note_ar : $floor->note_en != null))
                                                            <i data-tooltip-target="tooltip-default" data-tooltip-placement="right" class="fa-solid fa-circle-question"></i>
                                                            <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                                                {{ App::isLocale('ar') ? $floor->note_ar : $floor->note_en }}
                                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                                            </div>
                                                        @endif --}}
                                                </td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        <s> {{$floor->min_size}} {{trans('file.sq-ft')}}</s>
                                                    </td>
                                                    <!-- <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        <s>{{$floor->max_size}} {{trans('file.sq-ft')}}</s>
                                                    </td> -->
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        <s>{{ convert($floor->min_price, $property->currency) }}</s>
                                                    </td>
                                                    <!-- <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        <s>{{ convert($floor->max_price, $property->currency) }}</s>
                                                    </td> -->
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{-- <s>{{$floor->baths}}</s> --}}
                                                        @if((App::isLocale('ar') ? $floor->note_ar : $floor->note_en != '') || (App::isLocale('ar') ? $floor->note_ar : $floor->note_en != null))
                                                        <s>{{ App::isLocale('ar') ? $floor->note_ar : $floor->note_en }}</s>
                                                        @else
                                                        <s>-</s>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @else
                                                <tr class="border-b bg-[#E9F1FF]">
                                                    <td class="px-6 py-4 whitespace-nowrap text-base font-large text-gray-900">
                                                        {{$floor->unit->name}}
                                                        {{-- @if((App::isLocale('ar') ? $floor->note_ar : $floor->note_en != '') || (App::isLocale('ar') ? $floor->note_ar : $floor->note_en != null))
                                                            <i data-tooltip-target="tooltip-default" data-tooltip-placement="bottom" class="fa-solid fa-circle-question"></i>
                                                            <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                                                {{ App::isLocale('ar') ? $floor->note_ar : $floor->note_en }}
                                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                                            </div>
                                                        @endif --}}
                                                    </td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{$floor->min_size}} {{trans('file.sq-ft')}}
                                                    </td>
                                                    <!-- <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{$floor->max_size}} {{trans('file.sq-ft')}}
                                                    </td> -->
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ convert($floor->min_price, $property->currency) }}
                                                    </td>
                                                    <!-- <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ convert($floor->max_price, $property->currency) }}
                                                    </td> -->
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{-- {{$floor->baths}} --}}
                                                        @if((App::isLocale('ar') ? $floor->note_ar : $floor->note_en != '') || (App::isLocale('ar') ? $floor->note_ar : $floor->note_en != null))
                                                            {{ App::isLocale('ar') ? $floor->note_ar : $floor->note_en }}
                                                        @else
                                                            -
                                                        @endif
                                                        @if(isset($floor->ivr_link))
                                                            <a class="leading-none capitalize hover:text-secondary transition-all ease-out w-full floor-ivr" id="{{$floor->id}}"
                                                            style="background-color: gold;
                                                                   border:1px solid gold;
                                                                   border-radius:10px;
                                                                   padding: 5px;
                                                                   cursor: pointer;">
                                                                    {{trans('file.ivr')}}</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                                <span class="text-start text-gray-700">{{trans('file.last-update')}} : {{ count($property->propertyDetails->floors) > 0 ?  date("d/m/Y", strtotime($property->propertyDetails->floors->max('updated_at'))) : '-' }}</span>

                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($property->propertyDetails->floors as $floor)
                    @if(isset($floor->ivr_link))
                        <div class="mt-[25px] mb-[35px] ivrs ivr-{{$floor->id}}" hidden id="ivr-{{$floor->id}}">
                            <div class="relative">
                                <iframe src="{{ $floor->ivr_link }}" title="Virtual reality" height="600px" width="100%"></iframe>
                            </div>
                        </div>
                    @endif
                @endforeach

                {{-- @endif --}}
                @if($property->propertyDetails->location_info !== NULL)
                <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium my-5">{{trans('file.location_info')}}</h5>
                @endif
                <div class="blog-body">
                    {!! $property->propertyDetails->propertyDetailTranslation->location_info ?? ($property->propertyDetails->propertyDetailTranslationEnglish->location_info ?? null) !!}
                </div>

                @if($property->facilities->count() > 0 )
                <h4 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium my-5"> {{trans('file.amenities')}}
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

                <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium my-5">{{trans('file.floor_plans')}}</h5>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-[30px]">
                    @foreach ($property->propertyDetails->floors as $floor)
                        @if($floor->image != null || $floor->image != '')
                                <div class="text-center plan-image">
                                    <a href="{{ URL::asset('/images/floors/'.$floor->image)  }}" class="floor-image">
                                        <img class="object-cover rounded-[8px] w-full h-full" src="{{ URL::asset('/images/floors/'.$floor->image)  }}" alt="{{ $floor->image }}" loading="lazy" >
                                    </a>
                                    <p>{{ $floor->unit->name }}</p>
                                </div>
                        @endif
                    @endforeach
                </div>



            </div>

            <div class="col-span-12 md:col-span-3 lg:col-span-3 mb-[30px]">
                <aside class="mb-[-60px] asidebar">
                    <div class="mb-[60px]">
                        <h3 class="text-primary leading-none text-[24px] font-lora mb-[40px] font-medium">{{trans('file.get_touch')}}<span class="text-secondary">!</span></h3>

                        <form id="SubmitFormAgent" class="relative">
                            <input type="hidden" name="id" value="1" id="Id">
                            @csrf
                            <div class="mb-6">
                                <input type="text" name="name" id="Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('file.name') }}" required>
                            </div>
                            <div class="mb-6">
                                <input type="text" name="phone" id="Phone" class="phoneInput bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('file.phone') }}" required>
                            </div>
                            <div class="mb-6">
                                <input type="email" name="email" id="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('file.email') }}" required>
                            </div>
                            <div class="mb-6">
                                <textarea type="text" rows="2" id="send-message" name="message" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('file.message') }}" required></textarea>
                            </div>
                            <div class="flex items-center mb-4">
                                <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ trans('file.by_submitting') }} <a href="{{ URL::asset('/terms') }}" class="text-blue-600 hover:underline dark:text-blue-500">{{ trans('file.terms') }}</a>.</label>
                            </div>

                            <button type="submit" class="block z-[1] before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:z-[-1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[30px] py-[12px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:z-[-2] after:bg-primary after:rounded-md after:transition-all">{{trans('file.submit')}}</button>
                        </form>
                    </div>

                    <div class="mb-[60px]">
                        <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[40px] font-medium">{{trans('file.similar_listing')}}</h3>
                        <div class="sidebar-carousel relative">
                            <div class="swiper p-1">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    {{-- @foreach ($properties->where('moderation_status', 1)->shuffle() as $similarListing) --}}
                                    @foreach ($properties->where('is_featured', 1)->shuffle() as $similarListing)
                                    {{-- @if ($property->city_id == $similarListing->city_id) --}}
                                    <div class="swiper-slide">
                                        <div class="overflow-hidden rounded-md drop-shadow-[0px_2px_3px_rgba(0,0,0,0.1)] bg-[#FFFDFC] text-center">
                                            <div class="relative">
                                                <a href="{{ route('front.property', ['property' => $similarListing->id]) }}" class="block">
                                                    <img src="{{ URL::asset('/images/thumbnail/' . $similarListing->thumbnail) }}" class="w-full h-full" loading="lazy" width="370" height="266" alt="@@title">
                                                </a>
                                            </div>

                                            <div class="pt-[15px] pb-[20px] px-[20px] text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                                <h3><a href="{{ route('front.property', ['property' => $similarListing->id]) }}" class="font-lora leading-tight text-[18px] text-primary">{{ $similarListing->property_id}}</a></h3>
                                                <h4 class="leading-none"><a href="{{ route('front.property', ['property' => $similarListing->id]) }}" class="font-light text-[14px] leading-[1.75] text-primary underline">{{ $similarListing->country->countryTranslation->name ?? ($similarListing->country->countryTranslationEnglish->name ?? null) }},
                                                        {{ $similarListing->state->stateTranslation->name ?? ($similarListing->state->stateTranslationEnglish->name ?? null) }},
                                                        {{ $similarListing->city->cityTranslation->name ?? ($similarListing->city->cityTranslationEnglish->name ?? null) }}</a></h4>
                                                <ul class="mt-[10px]">
                                                    <li class="flex flex-wrap items-center justify-between">
                                                        @if($similarListing->price !== '')
                                                        <span class="font-lora text-[14px] text-secondary leading-none">{{trans('file.starts_from')}}: {{ convert($similarListing->price, $similarListing->currency) }}</span>
                                                        @else
                                                        <span class="font-lora text-[14px] text-secondary leading-none">No Price Given</span>
                                                        @endif

                                                        <span class="flex flex-wrap items-center">
                                                            <button class="mr-[15px] text-[#B1AEAE] hover:text-secondary">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1667 11.6667C12.8572 11.6667 12.5605 11.7896 12.3417 12.0084C12.1229 12.2272 12 12.5239 12 12.8334C12 13.1428 12.1229 13.4395 12.3417 13.6583C12.5605 13.8771 12.8572 14 13.1667 14C13.4761 14 13.7728 13.8771 13.9916 13.6583C14.2104 13.4395 14.3333 13.1428 14.3333 12.8334C14.3333 12.5239 14.2104 12.2272 13.9916 12.0084C13.7728 11.7896 13.4761 11.6667 13.1667 11.6667ZM11 12.8334C11 12.2587 11.2283 11.7076 11.6346 11.3013C12.0409 10.895 12.592 10.6667 13.1667 10.6667C13.7413 10.6667 14.2924 10.895 14.6987 11.3013C15.1051 11.7076 15.3333 12.2587 15.3333 12.8334C15.3333 13.408 15.1051 13.9591 14.6987 14.3654C14.2924 14.7717 13.7413 15 13.1667 15C12.592 15 12.0409 14.7717 11.6346 14.3654C11.2283 13.9591 11 13.408 11 12.8334Z" fill="currentColor" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.26984 1.14667C9.36347 1.24042 9.41606 1.3675 9.41606 1.5C9.41606 1.6325 9.36347 1.75958 9.26984 1.85333L8.4565 2.66667H11.1665C11.8295 2.66667 12.4654 2.93006 12.9343 3.3989C13.4031 3.86774 13.6665 4.50363 13.6665 5.16667V11C13.6665 11.1326 13.6138 11.2598 13.5201 11.3536C13.4263 11.4473 13.2991 11.5 13.1665 11.5C13.0339 11.5 12.9067 11.4473 12.813 11.3536C12.7192 11.2598 12.6665 11.1326 12.6665 11V5.16667C12.6665 4.96968 12.6277 4.77463 12.5523 4.59264C12.4769 4.41065 12.3665 4.24529 12.2272 4.10601C12.0879 3.96672 11.9225 3.85623 11.7405 3.78085C11.5585 3.70547 11.3635 3.66667 11.1665 3.66667H8.45717L9.2705 4.48C9.36154 4.57434 9.41188 4.70067 9.41068 4.83177C9.40948 4.96287 9.35683 5.08825 9.26409 5.18091C9.17134 5.27357 9.04591 5.32609 8.91481 5.32717C8.78371 5.32825 8.65743 5.27779 8.56317 5.18667L6.8965 3.52C6.80287 3.42625 6.75028 3.29917 6.75028 3.16667C6.75028 3.03417 6.80287 2.90708 6.8965 2.81333L8.56317 1.14667C8.65692 1.05303 8.784 1.00044 8.9165 1.00044C9.049 1.00044 9.17609 1.05303 9.26984 1.14667ZM2.83317 4.33333C2.98638 4.33333 3.13809 4.30316 3.27963 4.24453C3.42118 4.1859 3.54979 4.09996 3.65813 3.99162C3.76646 3.88329 3.8524 3.75468 3.91103 3.61313C3.96966 3.47158 3.99984 3.31988 3.99984 3.16667C3.99984 3.01346 3.96966 2.86175 3.91103 2.7202C3.8524 2.57866 3.76646 2.45004 3.65813 2.34171C3.54979 2.23337 3.42118 2.14744 3.27963 2.08881C3.13809 2.03018 2.98638 2 2.83317 2C2.52375 2 2.22701 2.12292 2.00821 2.34171C1.78942 2.5605 1.6665 2.85725 1.6665 3.16667C1.6665 3.47609 1.78942 3.77283 2.00821 3.99162C2.22701 4.21042 2.52375 4.33333 2.83317 4.33333ZM4.99984 3.16667C4.99984 3.7413 4.77156 4.2924 4.36524 4.69873C3.95891 5.10506 3.40781 5.33333 2.83317 5.33333C2.25853 5.33333 1.70743 5.10506 1.30111 4.69873C0.894777 4.2924 0.666504 3.7413 0.666504 3.16667C0.666504 2.59203 0.894777 2.04093 1.30111 1.6346C1.70743 1.22827 2.25853 1 2.83317 1C3.40781 1 3.95891 1.22827 4.36524 1.6346C4.77156 2.04093 4.99984 2.59203 4.99984 3.16667Z" fill="currentColor" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.73016 14.8533C6.63653 14.7596 6.58394 14.6325 6.58394 14.5C6.58394 14.3675 6.63653 14.2404 6.73016 14.1467L7.5435 13.3333H4.8335C4.17046 13.3333 3.53457 13.0699 3.06573 12.6011C2.59689 12.1323 2.3335 11.4964 2.3335 10.8333V5C2.3335 4.86739 2.38617 4.74021 2.47994 4.64645C2.57371 4.55268 2.70089 4.5 2.8335 4.5C2.9661 4.5 3.09328 4.55268 3.18705 4.64645C3.28082 4.74021 3.3335 4.86739 3.3335 5V10.8333C3.3335 11.2312 3.49153 11.6127 3.77284 11.894C4.05414 12.1753 4.43567 12.3333 4.8335 12.3333H7.54283L6.7295 11.52C6.68176 11.4739 6.6437 11.4187 6.61752 11.3576C6.59135 11.2966 6.57759 11.231 6.57704 11.1646C6.5765 11.0982 6.58918 11.0324 6.61435 10.971C6.63952 10.9095 6.67667 10.8537 6.72364 10.8068C6.77061 10.7599 6.82645 10.7228 6.88791 10.6977C6.94937 10.6726 7.01521 10.6599 7.0816 10.6605C7.14799 10.6612 7.2136 10.675 7.27459 10.7012C7.33557 10.7274 7.39073 10.7656 7.43683 10.8133L9.1035 12.48C9.19713 12.5738 9.24972 12.7008 9.24972 12.8333C9.24972 12.9658 9.19713 13.0929 9.1035 13.1867L7.43683 14.8533C7.34308 14.947 7.216 14.9996 7.0835 14.9996C6.951 14.9996 6.82391 14.947 6.73016 14.8533Z" fill="currentColor" />
                                                                </svg>
                                                            </button>
                                                            <button class="text-[#B1AEAE] hover:text-secondary">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(.clip0_656_640)">
                                                                        <path d="M7.9999 2.74799L7.2829 2.01099C5.5999 0.280988 2.5139 0.877988 1.39989 3.05299C0.876895 4.07599 0.758895 5.55299 1.71389 7.43799C2.63389 9.25299 4.5479 11.427 7.9999 13.795C11.4519 11.427 13.3649 9.25299 14.2859 7.43799C15.2409 5.55199 15.1239 4.07599 14.5999 3.05299C13.4859 0.877988 10.3999 0.279988 8.7169 2.00999L7.9999 2.74799ZM7.9999 15C-7.33311 4.86799 3.27889 -3.04001 7.82389 1.14299C7.88389 1.19799 7.94289 1.25499 7.9999 1.31399C8.05632 1.25504 8.11503 1.19833 8.17589 1.14399C12.7199 -3.04201 23.3329 4.86699 7.9999 15Z" fill="currentColor" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath class="clip0_656_640">
                                                                            <rect width="16" height="16" fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </button>
                                                        </span>
                                                    </li>
                                                </ul>


                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endif --}}
                                    @endforeach
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="flex flex-wrap items-center justify-center mt-[25px]">
                                <div class="swiper-button-{{ App::isLocale('ar') ? 'next' : 'prev' }} w-[26px] h-[26px] rounded-full bg-primary  text-white hover:bg-secondary static mx-[5px] mt-[0px]" style="z-index: 1;">
                                </div>
                                <div class="swiper-button-{{ App::isLocale('ar') ? 'prev' : 'next' }} w-[26px] h-[26px] rounded-full bg-primary  text-white hover:bg-secondary static mx-[5px] mt-[0px]" style="z-index: 1;">
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="mb-[60px]">
                        <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[40px] font-medium">
                            {{trans('file.tags')}}
                        </h3>
                        <ul class="flex flex-wrap my-[-7px] mx-[-5px] font-light text-[12px]">
                        @foreach($tags as $tag)
                            <li class="my-[7px] mx-[5px]"><a href="{{route('tags',$tag)}}" class="leading-none border border-[#E0E0E0] py-[8px] px-[10px] block rounded-[4px] hover:text-secondary">{{$tag->tagTranslation->name ?? $tag->tagTranslationEnglish->name  ?? null }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>

    </div>
</section>
@endsection
@push('script')
<script type="text/javascript">
    $('.floor-ivr').on('click', function(){
        var id = this.id;
        // console.log(id);
        // $('.ivr-'+ id).slideUp( "slow" );

        var all = $(".ivrs").map(function() {
            $(this).slideUp( "slow" );
            // $(this).toggle();
            //return this.innerHTML;
        });
        $('#ivr-'+ id).slideToggle( "slow" );
        // $('#'+ id).show();
        // $('.ivr-'+ id).slideDown( "slow" );
    });


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
<script>
    document.addEventListener('DOMContentLoaded', () => {
        $(".phoneInput").intlTelInput({
            utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.18/js/utils.js",
            nationalMode: false,
            separateDialCode: false,
            autoHideDialCode: false,
            initialCountry: "TR",
            preferredCountries: [
                "SA",
                "QA",
                "TR",
                "IQ",
                "KW",
                "BH",
                "AE",
                "YE",
                "JO",
                "DZ",
                "TN",
                "LY",
                "EG",
                "SD",
                "OM",
                "SY",
            ],
        });

        $(".NumericOnly").keydown(function (event) {
            if (
                event.keyCode == 46 ||
                event.keyCode == 8 ||
                event.keyCode == 9 ||
                event.keyCode == 27 ||
                event.keyCode == 13 ||
                (event.keyCode == 65 && event.ctrlKey === true) ||
                (event.keyCode >= 35 && event.keyCode <= 39)
            ) {
                return;
            } else {
                if (
                    event.shiftKey ||
                    ((event.keyCode < 48 || event.keyCode > 57) &&
                        (event.keyCode < 96 || event.keyCode > 105))
                ) {
                    event.preventDefault();
                }
            }
        });

        counterInit();
        function counterInit() {
            $(".st-counter").tamjidCounter({
                duration: 3000,
            });
        }
    });
</script>
@endpush
