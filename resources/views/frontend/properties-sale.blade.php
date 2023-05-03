@extends('frontend.main')
@push('styles')
<link href="{{asset('css/leaflet.css')}}" rel="stylesheet" />
<style>
    .load-overlay{
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(255,255,255,0.8) url({{asset('images/breadcrumb/loader3.gif')}}) center no-repeat;
    }
    /* Turn off scrollbar when body element has the loading class */
    body.loading{
        overflow: hidden;
    }
    /* Make spinner image visible when body element has the loading class */
    body.loading .load-overlay{
        display: block;
    }
</style>
@endpush
@section('content')
    <!--Breadcrumb section starts-->
    <!--Breadcrumb section ends-->
    <!--Listing section starts-->
                        {{-- <div class="item-wrapper pt-20">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade  property-grid" id="grid-view">
                                    <div class="row">
                                        @foreach($properties as $property)

                                            <div class="col-md-6 col-sm-12">
                                                <div class="single-property-box">
                                                    <div class="property-item">
                                                        <a class="property-img" href="{{route('front.property',['property'=>$property->id])}}">
                                                            @if(file_exists( public_path() . '/images/thumbnail/'.$property->thumbnail))
                                                                <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$property->thumbnail) }}" alt="">
                                                            @else
                                                                <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                            @endif
                                                        </a>
                                                        <ul class="feature_text">
                                                            @if($property->is_featured == 1)<li class="feature_cb"><span> Featured</span></li>@endif
                                                            @if($property->type == 'sale')<li class="feature_or"><span>For Sale</span></li>@endif
                                                            @if($property->type == 'rent')<li class="feature_or"><span>For Rent</span></li>@endif
                                                        </ul>
                                                        <div class="property-author-wrap">
                                                            <a href="{{route('agents.show',$property->user_id)}}" class="property-author">
                                                                @if(file_exists( public_path() . '/users/'.$property->user->image))
                                                                    <img loading="lazy" src="{{ URL::asset('/images/users/'.$property->user->image) }}" alt="Image">
                                                                @else
                                                                    <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                                                @endif
                                                                <span>{{$property->user->f_name}} {{$property->user->l_name}}</span>
                                                            </a>
                                                            <ul class="save-btn">
                                                                <li data-toggle="tooltip" data-placement="top" title="Photos"><a href=".photo-gallery" class="btn-gallery"><i class="lnr lnr-camera"></i></a></li>
                                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="#"><i class="las la-arrows-alt-h"></i></a></li>
                                                            </ul>
                                                            <div class="hidden photo-gallery">
                                                                @php
                                                                    $pic = json_decode($property->image->name);
                                                                @endphp
                                                                @foreach($pic as $p)
                                                                    <a href="{{ URL::asset("storage/images/".$p)}}"></a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="property-title-box">
                                                        <h4><a href="{{route('front.property',['property'=>$property->id])}}">{{isset($property->propertyTranslation->title) ? $property->propertyTranslation->title : 'title'}}</a></h4>
                                                        <div class="property-location">
                                                            <i class="las la-map-marker-alt"></i>
                                                            <p>{{$property->country->countryTranslation->name}} , {{$property->state->stateTranslation->name}}, {{$property->city->cityTranslation->name}}</p>
                                                        </div>
                                                        <ul class="property-feature">
                                                            <li> <i class="las la-bed"></i>
                                                                <span>{{$property->propertyDetails->bed}} Bedrooms</span>
                                                            </li>
                                                            <li> <i class="las la-bath"></i>
                                                                <span>{{$property->propertyDetails->bath}} Bath</span>
                                                            </li>
                                                            <li> <i class="las la-arrows-alt"></i>
                                                                <span>{{$property->propertyDetails->room_size}} sq ft</span>
                                                            </li>
                                                            <li> <i class="las la-car"></i>
                                                                <span>{{$property->propertyDetails->garage}} Garage</span>
                                                            </li>
                                                        </ul>
                                                        <div class="trending-bottom">
                                                            <div class="trend-left float-left">
                                                                <ul class="product-rating">
                                                                    <li><i class="las la-star"></i></li>
                                                                    <li><i class="las la-star"></i></li>
                                                                    <li><i class="las la-star"></i></li>
                                                                    <li><i class="las la-star-half-alt"></i></li>
                                                                    <li><i class="las la-star-half-alt"></i></li>
                                                                </ul>
                                                            </div>
                                                            <a class="trend-right float-right">
                                                                <div class="trend-open">
                                                                    <p><span class="per_sale">starts from</span>${{$property->price}}</p>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade show active  property-list get-properties" id="list-view">
                                    @foreach($properties as $property)
                                        <div class="single-property-box">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="property-item">
                                                        <a class="property-img" href="{{route('front.property',['property'=>$property->id])}}">
                                                            @if(file_exists( public_path() . '/images/thumbnail/'.$property->thumbnail))
                                                                <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$property->thumbnail) }}" alt="">
                                                            @else
                                                                <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                            @endif
                                                        </a>
                                                        <ul class="feature_text">
                                                            @if($property->is_featured == 1)<li class="feature_cb"><span> Featured</span></li>@endif
                                                            @if($property->type == 'sale')<li class="feature_or"><span>For Sale</span></li>@endif
                                                            @if($property->type == 'rent')<li class="feature_or"><span>For Rent</span></li>@endif
                                                        </ul>
                                                        <div class="property-author-wrap">
                                                            <a href="{{route('agents.show',$property->user_id)}}" class="property-author">
                                                                @if(file_exists( public_path() . '/images/users/'.$property->user->image))
                                                                    <img loading="lazy" src="{{ URL::asset('/images/users/'.$property->user->image) }}" alt="Image">
                                                                @else
                                                                    <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                                                @endif
                                                                <span>{{$property->user->f_name}} {{$property->user->l_name}}</span>
                                                            </a>
                                                            <a href=".photo-gallery" class="btn-gallery" data-toggle="tooltip" data-placement="top" title="Photos"><i class="lnr lnr-camera"></i></a>
                                                            <div class="hidden photo-gallery">
                                                                @php
                                                                    $pic = json_decode($property->image->name);
                                                                @endphp
                                                                @foreach($pic as $p)
                                                                    <a href="{{ URL::asset("storage/images/".$p)}}"></a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="property-title-box">
                                                        <h4><a href="{{route('front.property',['property'=>$property->id])}}">{{isset($property->propertyTranslation->title) ? $property->propertyTranslation->title : 'title'}}</a></h4>
                                                        <div class="property-location no-pad-lr">
                                                            <i class="las la-map-marker-alt"></i>
                                                            <p>{{$property->country->countryTranslation->name}} , {{$property->state->stateTranslation->name}}, {{$property->city->cityTranslation->name}}</p>
                                                        </div>
                                                        <ul class="property-feature no-pad-lr">
                                                            <li> <i class="las la-bed"></i>
                                                                <span>{{$property->propertyDetails->bed}} Bedrooms</span>
                                                            </li>
                                                            <li> <i class="las la-bath"></i>
                                                                <span>{{$property->propertyDetails->bath}} Bath</span>
                                                            </li>
                                                            <li> <i class="las la-arrows-alt"></i>
                                                                <span>{{$property->propertyDetails->room_size}} sq ft</span>
                                                            </li>
                                                            <li> <i class="las la-car"></i>
                                                                <span>{{$property->propertyDetails->garage}} Garage</span>
                                                            </li>
                                                        </ul>
                                                        <div class="trending-bottom trend-open no-pad-lr">
                                                            <p><span class="per_sale">starts from</span>${{$property->price}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!--pagination starts-->
                            {{ $properties->links('vendor.pagination.custom') }}
                            <!--pagination ends-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="explore__map-side">
                    <!--Leaflet Map starts-->
                    <div id="map-container" class="fullwidth-home-map">
                        <div id="map" data-map-scroll="false">
                            <!-- map goes here -->
                        </div>
                    </div>
                    <!--Leaflet Map ends-->
                </div>
            </div>
        </div>
    </div>
    <!--Listing section ends-->
    <!--Blog section ends-->
    <div class="load-overlay"></div> --}}

    <div class="ps-page--inner ps-page--projects">
        <div class="ps-page__header">
            <div class="container">

                @include('frontend.includes.filter-form')
                <h1 class="ps-page__heading"></h1>
                <ul class="breadcrumb">
                    <li><a href="{{ URL::asset('/') }}">{{ trans('file.home') }}</a></li>
                    <li><a href="{{ URL::asset('/properties') }}">{{ trans('file.Properties') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="ps-page__content">
            <div class="ps-projects--with-map">
                <div class="ps-projects__left">

                    <div class="ps-projects__items ps-grid" data-columns="2">
                        @foreach ($properties->where('type', 'sale') as $property)
                            <div class="ps-grid__item">
                                <div class="ps-project ps-project--grid">
                                    <div class="ps-project__thumbnail">
                                        <div class="ps-project__image">
                                            <img src="{{URL::asset('images/thumbnail/' . $property->thumbnail)}}" alt="" />
                                        </div><a class="ps-project__overlay"
                                            href="{{ route('front.property', ['property' => $property->id]) }}"></a>
                                        @if ($property->is_featured == 1)
                                            <div class="ps-project__badges"><a class="ps-project__badge featured"
                                                    href="javascript:void(0)">{{ trans('file.featured') }}</a></div>
                                        @endif
                                        @if ($property->type == 'sale')
                                            <div class="ps-project__badges"><a class="ps-project__badge sale"
                                                    href="javascript:void(0)">{{ trans('file.for_sale') }}</a></div>
                                        @endif
                                    </div>
                                    <div class="ps-project__content">
                                        <h4 class="ps-project__name"><a
                                                href="{{ route('front.property', ['property' => $property->id]) }}">{{ $property->propertyTranslation->title ?? ($property->propertyTranslationEnglish->title ?? null) }}</a>
                                        </h4>
                                        <p class="ps-project__address">
                                            {{ $property->country->countryTranslation->name ?? ($property->country->countryTranslationEnglish->name ?? null) }}
                                            ,
                                            {{ $property->state->stateTranslation->name ?? ($property->state->stateTranslationEnglish->name ?? null) }},
                                            {{ $property->city->cityTranslation->name ?? ($property->city->cityTranslationEnglish->name ?? null) }}
                                        </p>
                                        @if ($property->type == 'sale')
                                            <p><span class="ps-project__price">{{ trans('file.starts_from') }}</span>
                                                {{ $property->currency->icon }}{{ number_format($property->price) }}</p>
                                        @endif
                                        </p>
                                        <div class="ps-project__meta"
                                            style="{{ App::isLocale('ar') ? 'text-align: right' : 'text-align: left' }}">
                                            <figure>
                                                <figcaption>{{ trans('file.property_status') }}</figcaption>
                                                @if ($property->type == 'sale')
                                                    <p class="ps-project__price"
                                                        style="{{ App::isLocale('ar') ? 'text-align: right' : 'text-align: left' }}">
                                                        {{ trans('file.for_sale') }}</p>
                                                @endif
                                            </figure>
                                            <figure>
                                                <figcaption>{{ trans('file.property_type') }}</figcaption>
                                                <p>{{ $property->category->categoryTranslation->name }}</p>
                                            </figure>
                                            @if ($property->category_id == '5')
                                                <figure>
                                                    <figcaption>{{ trans('file.delivery_status') }}</figcaption>
                                                    <p>{{ $property->propertyDetails->delivery_month }},
                                                        {{ $property->propertyDetails->deliver_year }}</p>
                                                </figure>
                                            @else
                                            @endif
                                        </div>
                                        <div class="ps-project__services">
                                            @if ($property->category_id == '5')
                                                <p><span><i class="lnil lnil-size"></i>{{ trans('file.project_size') }}:
                                                        {{ $property->propertyDetails->room_size }}
                                                        {{ trans('file.sq-ft') }}</span></p>
                                                <p><span><i class="lnil lnil-house-alt"></i>{{ trans('file.units') }}:
                                                        {{ $property->propertyDetails->total_units }}</span></p>
                                                @if ($property->propertyDetails->title_deed_type == '1')
                                                    <p><span><i
                                                                class="lnil lnil-certificate-alt"></i>{{ trans('file.title_deed') }}:<br>{{ trans('file.condominium') }}</span>
                                                    </p>
                                                @endif
                                                @if ($property->propertyDetails->title_deed_type == '2')
                                                    <p><span><i
                                                                class="lnil lnil-certificate-alt"></i>{{ trans('file.title_deed') }}:<br>{{ trans('file.easement') }}</span>
                                                    </p>
                                                @endif
                                                @if ($property->propertyDetails->title_deed_type == '3')
                                                    <p><span><i
                                                                class="lnil lnil-certificate-alt"></i>{{ trans('file.title_deed') }}:<br>{{ trans('file.shared') }}</span>
                                                    </p>
                                                @endif
                                            @elseif($property->category_id == '3')
                                                <p><span><i
                                                            class="lnil lnil-size"></i>{{ $property->propertyDetails->room_size }}
                                                        {{ trans('file.sq-ft') }}</span></p>
                                                @if ($property->propertyDetails->title_deed_type == '1')
                                                    <p><span><i
                                                                class="lnil lnil-certificate-alt"></i>{{ trans('file.title_deed') }}:<br>{{ trans('file.condominium') }}</span>
                                                    </p>
                                                @endif
                                                @if ($property->propertyDetails->title_deed_type == '2')
                                                    <p><span><i
                                                                class="lnil lnil-certificate-alt"></i>{{ trans('file.title_deed') }}:<br>{{ trans('file.easement') }}</span>
                                                    </p>
                                                @endif
                                                @if ($property->propertyDetails->title_deed_type == '3')
                                                    <p><span><i
                                                                class="lnil lnil-certificate-alt"></i>{{ trans('file.title_deed') }}:<br>{{ trans('file.shared') }}</span>
                                                    </p>
                                                @endif
                                                <p><span><i class="lnil lnil-door-alt"></i>Parcel No:
                                                        {{ $property->propertyDetails->parcel }}</span></p>
                                            @elseif($property->category_id == '7')
                                                <p><span><i
                                                            class="lnil lnil-size"></i>{{ $property->propertyDetails->room_size }}
                                                        {{ trans('file.sq-ft') }}</span></p>
                                                <p><span><i
                                                            class="lnil lnil-house-alt"></i>{{ $property->propertyDetails->total_units }}
                                                        {{ trans('file.units') }}</span></p>
                                                <p><span><i
                                                            class="lnil lnil-chevron-down-circle"></i>{{ $property->propertyDetails->building_age }}
                                                        {{ trans('file.years') }}</span></p>
                                                        <p><span><i
                                                            class="lnil lnil-layers"></i>{{ $property->propertyDetails->available_floors }}</span>
                                                </p>
                                            @else
                                                <p><span><i
                                                            class="lnil lnil-size"></i>{{ $property->propertyDetails->room_size }}
                                                        {{ trans('file.sq-ft') }}</span></p>
                                                <p><span><i
                                                            class="lnil lnil-hospital-bed"></i>{{ $property->propertyDetails->bed }}
                                                        {{ trans('file.bedrooms') }}</span></p>
                                                <p><span><i
                                                            class="icon icon-bathtub"></i>{{ $property->propertyDetails->bath }}
                                                        {{ trans('file.bath') }}</span></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="ps-projects__pagination">
                        {{ $properties->links('vendor.pagination.custom') }}
                    </div>
                </div>
                <div class="ps-projects__right">
                    <div id="map" style="width: 100%; height: 100%;"></div>
                    <script>
                        const locations = [
                            @foreach ($properties as $key => $property)
                                ["{{ $property->lat }}", "{{ $property->lon }}", "{{ $property->title }}"],
                            @endforeach
                        ];
                    </script>
                    <script>
                        //init map
                        let map = L.map('map').setView([40.9691998, 29.5727559], 8);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '',
                            maxZoom: 18
                        }).addTo(map);

                        //add markers
                        if (locations.length) {
                            locations.forEach(function(data, i) {
                                let [lat, lng] = [data[0], data[1]];
                                let label = data[2];
                                if (lat && lng) {
                                    marker = new L.marker([lat, lng])
                                        .bindPopup(label)
                                        .addTo(map);

                                } else {
                                    console.log('no geo data available for: ' + label)
                                }
                            })
                        }
                    </script>
                </div>
            </div>
        </div>

    </div>
    <div class="ps-dialog ps-dialog--search" id="search-extra-dialog">
        <div class="ps-dialog__wrapper">
            <form class="ps-form--projects-search ps-form--projects-search-extra" action="{{ route('search.property') }}"
                method="GET">
                @csrf
                <input type="hidden" id="min" name="minPrice">
                <input type="hidden" id="max" name="maxPrice">
                <input type="hidden" id="maxPropPrice" value="{{ $maxPrice }}">
                <input type="hidden" id="minPropPrice" value="{{ $minPrice }}">

                <input type="hidden" id="minArea" name="minArea">
                <input type="hidden" id="maxArea" name="maxArea">
                <input type="hidden" id="minAreaSize" value="{{ $minArea }}">
                <input type="hidden" id="maxAreaSize" value="{{ $maxArea }}">

                <div class="ps-form__extra">
                    <div class="ps-form__fields">
                        <div class="ps-form__block">
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-6">
                                    <div class="form-group">
                                        <div class="ps-form underline with-icon select"><i
                                                class="lnil lnil-map ps-form__icon"></i>
                                            <select class="form-control" name="state" id="state">
                                                <option value="">{{ trans('file.state') }}</option>
                                                @foreach ($states->where('status', 1)->sortBy('name') as $state)
                                                    <option value="{{ $state->id }}">
                                                        {{ $state->stateTranslation->name ?? ($state->stateTranslationEnglish->name ?? null) }}
                                                    </option>
                                                @endforeach
                                            </select><i class="lnil lnil-chevron-down ps-form__select-toggle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <div class="form-group">
                                        <div class="ps-form underline with-icon select"><i
                                                class="lnil lnil-map ps-form__icon"></i>
                                            <select class="form-control" name="city_id" id="city_id">
                                                <option value="">{{ trans('file.city_state') }}</option>
                                                @foreach ($city as $city)
                                                    <option value="{{ $city->id }}">
                                                        {{ $city->cityTranslation->name ?? ($city->cityTranslationEnglish->name ?? null) }}
                                                    </option>
                                                @endforeach
                                            </select><i class="lnil lnil-chevron-down ps-form__select-toggle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <div class="form-group">
                                        <div class="ps-form underline with-icon select"><i
                                                class="lnil lnil-apartment ps-form__icon"></i>
                                            <select class="form-control" id="category_id" name="category_id">
                                                <option value="">{{ trans('file.property_type') }}</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->categoryTranslation->name ?? ($category->categoryTranslationEnglish->name ?? null) }}
                                                    </option>
                                                @endforeach
                                            </select><i class="lnil lnil-chevron-down ps-form__select-toggle"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="ps-form underline with-icon select" id="bath"><i
                                                class="lnil lnil-hospital-bed ps-form__icon"></i>
                                            <select class="form-control" name="bath">
                                                <option value="">{{ trans('file.bath') }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select><i class="lnil lnil-chevron-down ps-form__select-toggle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="ps-form underline with-icon select" id="bed"><i
                                                class="icon icon-bathtub ps-form__icon"></i>
                                            <select class="form-control" name="bed">
                                                <option value="">{{ trans('file.bedrooms') }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select><i class="lnil lnil-chevron-down ps-form__select-toggle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-form__block row">
                            <div class="col-md-6 col-12">
                                <div class="form-group form-group--with-slider">
                                    <label><i class="lnil lnil-coin"></i>Price Range (US Dollar)</label>
                                    <div class="ps-form--slider">
                                        <div class="ps-form__range">
                                            <div class="ps-nouislider" id="dialog_price_range"></div>
                                        </div>
                                        <p class="ps-form__attributes"><span>From :</span><strong
                                                class="ps-form__attribute ps-form__min"><span
                                                    class="ps-form__unit">$</span><span
                                                    class="value">0</span></strong>-<strong
                                                class="ps-form__attribute ps-form__max"><span
                                                    class="ps-form__unit">$</span><span class="value">0</span></strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group form-group--with-slider">
                                    <label><i class="lnil lnil-size"></i>Land Area (SQFT)</label>
                                    <div class="ps-form--slider">
                                        <div class="ps-form__range">
                                            <div id="dialog_land_area_range"></div>
                                        </div>
                                        <p class="ps-form__attributes"><span>From :</span><strong
                                                class="ps-form__attribute ps-form__min"><span class="value">0</span><span
                                                    class="ps-form__unit">SQM</span></strong>-<strong
                                                class="ps-form__attribute ps-form__max"><span class="value">0</span><span
                                                    class="ps-form__unit">SQM</span></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="ps-form__actions">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <button class="ps-btn ps-btn--fullwidth ps-btn--gray"
                                    id="close-search-extra">Cancel</button>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <button class="ps-btn ps-btn--fullwidth ps-btn--gray" type="reset">Reset</button>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <button class="ps-btn ps-btn--fullwidth"
                                    type="submit">{{ trans('file.search') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
<!-- Leaflet js -->
<script src="{{asset('js/leaflet.min.js')}}"></script>
<!-- Leaflet Maps Scripts -->
<script src="{{asset('js/leaflet-markercluster.min.js')}}"></script>
<script>
    $(document).ready(function () {
        const api_url = window.location.href+'/../../api/properties/sale';

        if (document.getElementById("map") !== null) {
            var mapOptions = {
                scrollWheelZoom: false
            }
            window.map = L.map('map', mapOptions);
            $('#scrollEnabling').hide();



            function locationData(locationURL, locationImg, locationTitle, locationAddress, locationRating, location_bed, location_bath, location_garage, location_area) {
                return ('' +
                    '<div class="container map_container">' +
                    '<div class="row">' +
                    '<div class="col-md-12 px-0">' +
                    '<div class="marker-info" id="marker_info">' +
                    '<img src="' + locationImg + '" alt="..."/>' +

                    '<div class = "marker_price trend-open">' +
                    '<p>' + '$' + locationAddress +
                    '<span>month</span>' +
                    '</p>' +
                    '</div>' +
                    '<span class="featured_btn">' + locationRating + '</span>' +
                    '</div>' +
                    '<div class="marker-text">' +
                    '<h3 class="marker_title"><a href="' + locationURL + '">' + locationTitle + '</a></h3>' +
                    '<ul class ="map_property_info">' +
                    '<li>' + location_bed + '<span>Bed</span>' +
                    '</li>' +
                    '<li>' + location_bath + '<span>Bath</span>' +
                    '</li>' +
                    '<li>' + location_area + '<span>Sq Ft</span>' +
                    '</li>' +
                    '<li>' + location_garage + '<span>Garage</span>' +
                    '</li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>' +z
                    '</div>' +
                    '</div>'

                )
            }

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: " &copy;  <a href='https://www.mapbox.com/about/maps/'>Mapbox</a> &copy;  <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a>",
                maxZoom: 10,
                id: 'mapbox.streets',
                accessToken: 'pk.eyJ1IjoidmFzdGVyYWQiLCJhIjoiY2p5cjd0NTc1MDdwaDNtbnVoOGwzNmo4aSJ9.BnYb645YABOY2G4yWAFRVw'
            }).addTo(map);
            markers = L.markerClusterGroup({
                spiderfyOnMaxZoom: true,
                showCoverageOnHover: false,
            });

            async function getData(){
                const response = await fetch(api_url);
                const locations = await response.json();
                for (var i = 0; i < locations.length; i++) {
                    var listeoIcon = L.divIcon({
                        iconAnchor: [20, 51],
                        popupAnchor: [0, -51],
                        className: 'listeo-marker-icon',
                        html: '<div class="marker-container">' +
                        '<div class="marker-card">' +
                        '<img src="'+"{{url('/')}}"+'/images/others/marker.png" alt="..."/>' +
                        '</div>' +
                        '</div>'
                    });
                    var popupOptions = {
                        'maxWidth': '270',
                        'className': 'leaflet-infoBox'
                    }
                    var markerArray = [];
                    marker = new L.marker([locations[i].lat, locations[i].lon], {
                        icon: listeoIcon,
                    }).bindPopup( '<div class="container map_container">' +
                        '<div class="row">' +
                        '<div class="col-md-12 px-0">' +
                        '<div class="marker-info" id="marker_info">' +
                        '<img src="'+"{{url('/')}}"+'/images/thumbnail/' + locations[i].thumbnail + '" alt="..."/>' +

                        '<div class = "marker_price trend-open">' +
                        '<p>' + '$' + locations[i].price +
                        '<span>month</span>' +
                        '</p>' +
                        '</div>' +
                        '<span class="featured_btn">' + locations[i].type + '</span>' +
                        '</div>' +
                        '<div class="marker-text">' +
                        '<h3 class="marker_title"><a href="properties/' + locations[i].id + '">' + locations[i].title + '</a></h3>' +
                        '<ul class ="map_property_info">' +
                        '<li>' + locations[i].property_details.bed + '<span>Bed</span>' +
                        '</li>' +
                        '<li>' + locations[i].property_details.bath + '<span>Bath</span>' +
                        '</li>' +
                        '<li>' + locations[i].property_details.room_size + '<span>Sq Ft</span>' +
                        '</li>' +
                        '<li>' + locations[i].property_details.garage + '<span>Garage</span>' +
                        '</li>' +
                        '</ul>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>', popupOptions);
                    marker.on('click', function (e) {});
                    map.on('popupopen', function (e) {
                        L.DomUtil.addClass(e.popup._source._icon, 'clicked');
                    }).on('popupclose', function (e) {
                        if (e.popup) {
                            L.DomUtil.removeClass(e.popup._source._icon, 'clicked');
                        }
                    });
                    markers.addLayer(marker);
                }
                map.addLayer(markers);
                markerArray.push(markers);
                if (markerArray.length > 0) {
                    map.fitBounds(L.featureGroup(markerArray).getBounds().pad(0.2));
                }
                map.removeControl(map.zoomControl);
                var zoomOptions = {
                    zoomInText: '+',
                    zoomOutText: '-',
                };
                var zoom = L.control.zoom(zoomOptions);
                zoom.addTo(map);
            }

            getData();

        }
    });

</script>

<script>
    $('#place-event').on('keyup',function(){
        var search = $(this).val();
        $.ajax({
            method:'post',
            url: '{{route('search.properties')}}',
            data: {search:search,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
                $('.get-properties').html(response);
            }
        });
    });

    // Add remove loading class on body element based on Ajax request status
    $(document).on({
        ajaxStart: function(){
            $("body").addClass("loading");
        },
        ajaxStop: function(){
            $("body").removeClass("loading");
        }
    });
</script>
@endpush
