@extends('frontend.main')
@section('content')
    <div class="ps-page--inner ps-page--projects">
        <div class="ps-page__header">
            <div class="container">
                <form class="ps-form--projects-search" action="{{route('search.property')}}" method="GET">
                    <input type="hidden" id="min" name="minPrice">
                    <input type="hidden" id="max" name="maxPrice">
                    <input type="hidden" id="maxPropPrice" value="{{ $maxPrice }}">
                    <input type="hidden" id="minPropPrice" value="{{ $minPrice }}">

                    <input type="hidden" id="minArea" name="minArea">
                    <input type="hidden" id="maxArea" name="maxArea">
                    <input type="hidden" id="minAreaSize" value="{{ $minArea }}">
                    <input type="hidden" id="maxAreaSize" value="{{ $maxArea }}">
                    @csrf
                    <div class="ps-form__top">
                        <div class="ps-form__top-left">
                            {{-- <button class="ps-btn">Sell</button>
                            <button class="ps-btn ps-btn--gray">Rent</button> --}}
                        </div>
                        <div class="ps-form__top-right">
                            <div class="ps-form__items">
                                <div class="ps-form underline with-icon select"><i class="lnil lnil-map ps-form__icon"></i>
                                    <div class="input-search autocomplete">
                                        <input type="text" class="form-control" name="title" id="city_name" placeholder="{{trans('file.search')}}">
                                        </div>
                                    <div id="cityList">
                                    </div>
                                </div>
                                <div class="ps-form underline with-icon select"><i class="lnil lnil-map ps-form__icon"></i>
                                    <select class="form-control" name="city_id" id="city_id">
                                        <option value="">{{trans('file.city')}}</option>
                                        @foreach($city->where('status',1) as $city)
                                            <option value="{{$city->id}}">{{$city->cityTranslation->name ?? $city->cityTranslationEnglish->name ?? null}}</option>
                                            @endforeach
                                    </select><i class="lnil lnil-chevron-down ps-form__select-toggle"></i>
                                </div>
                                <div class="ps-form underline with-icon select"><i class="lnil lnil-apartment ps-form__icon"></i>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">{{trans('file.property_type')}}</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->categoryTranslation->name ?? $category->categoryTranslationEnglish->name ?? null}}</option>
                                                @endforeach
                                    </select><i class="lnil lnil-chevron-down ps-form__select-toggle"></i>
                                </div>
                            </div>
                            <div class="ps-form__actions"><a class="ps-form__toggle ps-btn ps-btn--gray ps-form__toggle-btn" href="#">{{trans('file.advanced_search')}}<i class="lnil lnil-chevron-down"></i></a>
                                <button class="ps-btn">{{trans('file.search')}}</button>
                            </div>
                        </div>
                    </div>
                    <div class="ps-form__bottom">
                        <div class="ps-form__block">
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="ps-form underline with-icon select" id="bath"><i class="lnil lnil-hospital-bed ps-form__icon"></i>
                                            <select class="form-control" name="bath">
                                                <option value="">{{trans('file.bath')}}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select><i class="lnil lnil-chevron-down ps-form__select-toggle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="ps-form underline with-icon select" id="bed"><i class="icon icon-bathtub ps-form__icon"></i>
                                            <select class="form-control" name="bed">
                                                <option value="">{{trans('file.bedrooms')}}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select><i class="lnil lnil-chevron-down ps-form__select-toggle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-form__block row">
                            <div class="col-md-6 col-12">
                                <div class="form-group form-group--with-slider">
                                    <label for="amount"><i class="lnil lnil-coin"></i>Price Range (US Dollar)</label>
                                    <div class="ps-form--slider">
                                        <div class="ps-form__range" id="slider-range">
                                            <div class="ps-nouislider" id="price_range"></div>
                                        </div>
                                        <p class="ps-form__attributes"><span>From :</span><strong class="ps-form__attribute ps-form__min"><span class="ps-form__unit">$</span><span class="value" id="minPrice">0</span></strong>-<strong class="ps-form__attribute ps-form__max"><span class="ps-form__unit">$</span><span class="value" id="maxPrice">0</span></strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group form-group--with-slider">
                                    <label><i class="lnil lnil-size"></i>Land Area (SQFT)</label>
                                    <div class="ps-form--slider">
                                        <div class="ps-form__range">
                                            <div id="land_area_range"></div>
                                        </div>
                                        <p class="ps-form__attributes"><span>From :</span><strong class="ps-form__attribute ps-form__min"><span class="value">0</span><span class="ps-form__unit">sqft</span></strong>-<strong class="ps-form__attribute ps-form__max"><span class="value">0</span><span class="ps-form__unit">sqft</span></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-form__submit">
                            <button class="ps-btn ps-btn--gray" type="reset">{{trans('file.reset')}}</button>
                            <button class="ps-btn ps-btn--gray" type="submit">{{trans('file.search')}}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="ps-page__content">
            <div class="container">
                <div class="ps-projects ps-projects--with-sidebar">
                    <div class="ps-projects__left">
                        {{-- <aside class="ps-widget ps-widget--project">
                            <h4 class="ps-widget__heading">Property Types</h4>
                            <div class="ps-widget__content">
                                <div class="ps-widget__attributes">
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="type-0" name="type" />
                                        <label for="type-0">The Grounds<span>628</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="type-1" name="type" />
                                        <label for="type-1">Private Houses<span>1250</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="type-2" name="type" />
                                        <label for="type-2">Apartments<span>950</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="type-3" name="type" />
                                        <label for="type-3">Detached Villas<span>95</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="type-4" name="type" />
                                        <label for="type-4">Duplex Villas<span>175</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="type-5" name="type" />
                                        <label for="type-5">Townhouses<span>2539</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="type-6" name="type" />
                                        <label for="type-6">Warehouses<span>205</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="type-7" name="type" />
                                        <label for="type-7">Shophouses<span>129</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="type-8" name="type" />
                                        <label for="type-8">Farms<span>92</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="type-9" name="type" />
                                        <label for="type-9">Motels<span>119</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="type-10" name="type" />
                                        <label for="type-10">Hotels &amp; Resorts<span>998</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="type-11" name="type" />
                                        <label for="type-11">Office<span>184</span></label>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <aside class="ps-widget ps-widget--project">
                            <h4 class="ps-widget__heading">Price</h4>
                            <div class="ps-widget__content">
                                <div class="ps-widget__attributes">
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="price-0" name="price" />
                                        <label for="price-0">Under $500<span>1245</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="price-1" name="price" />
                                        <label for="price-1">$500 - $1K<span>923</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="price-2" name="price" />
                                        <label for="price-2">$1K - $2K<span>334</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="price-3" name="price" />
                                        <label for="price-3">$2K - $5K<span>612</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="price-4" name="price" />
                                        <label for="price-4">$5K - $10K<span>501</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="price-5" name="price" />
                                        <label for="price-5">$10K - $100K<span>184</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="price-6" name="price" />
                                        <label for="price-6">$100K - $1M<span>184</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="price-7" name="price" />
                                        <label for="price-7">$1M - $5M<span>92</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="price-8" name="price" />
                                        <label for="price-8">Over $5M<span>11</span></label>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <aside class="ps-widget ps-widget--project">
                            <h4 class="ps-widget__heading">Land Area</h4>
                            <div class="ps-widget__content">
                                <div class="ps-widget__attributes">
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="area-0" name="area" />
                                        <label for="area-0">Under 100 sqft<span>2450</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="area-1" name="area" />
                                        <label for="area-1">100 sqft - 500 sqft<span>2450</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="area-2" name="area" />
                                        <label for="area-2">500 sqft - 1000 sqft<span>992</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="area-3" name="area" />
                                        <label for="area-3">1000 sqft - 5000 sqft<span>123</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="area-4" name="area" />
                                        <label for="area-4">5000 sqft - 10,000 sqft<span>92</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="area-5" name="area" />
                                        <label for="area-5">Over 10,000 sqft<span>92</span></label>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <aside class="ps-widget ps-widget--project">
                            <h4 class="ps-widget__heading">Location</h4>
                            <div class="ps-widget__content">
                                <div class="ps-widget__attributes">
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="location-0" name="location" />
                                        <label for="location-0">Los Angeles<span>151</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="location-1" name="location" />
                                        <label for="location-1">California<span>262</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="location-2" name="location" />
                                        <label for="location-2">Miami<span>99</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="location-3" name="location" />
                                        <label for="location-3">San Jose<span>315</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="location-4" name="location" />
                                        <label for="location-4">Wasington<span>923</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="location-5" name="location" />
                                        <label for="location-5">New York<span>105</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="location-6" name="location" />
                                        <label for="location-6">Mahattan<span>21</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="location-7" name="location" />
                                        <label for="location-7">Capri<span>11</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="location-8" name="location" />
                                        <label for="location-8">Metropolis<span>9</span></label>
                                    </div>
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="location-9" name="location" />
                                        <label for="location-9">Oakland<span>2</span></label>
                                    </div>
                                </div>
                            </div>
                        </aside> --}}
                    </div>
                    <div class="ps-projects__right">
                        <div class="ps-projects__top">
                            <div class="ps-projects__top-left">

                            </div>

                        </div>
                        <div class="ps-projects__items ps-grid" data-columns="3">
                            @foreach ($city->properties as $property)
                                <div class="ps-grid__item">
                                    <div class="ps-project ps-project--grid">
                                        <div class="ps-project__thumbnail">
                                            <div class="ps-project__image"><img src="{{ URL::asset('/images/thumbnail/'.$property->thumbnail) }}"
                                                    alt="" /></div><a class="ps-project__overlay"
                                                href="{{ route('front.property', ['property' => $property->id]) }}"></a>
                                            @if ($property->is_featured == 1)
                                                <div class="ps-project__badges"><a class="ps-project__badge featured"
                                                        href="javascript:void(0)">Featured</a></div>
                                            @endif
                                            @if ($property->type == 'sale')
                                                <div class="ps-project__badges"><a class="ps-project__badge sale"
                                                        href="javascript:void(0)">Sale</a></div>
                                            @endif
                                            @if ($property->type == 'rent')
                                                <div class="ps-project__badges"><a class="ps-project__badge rent"
                                                        href="javascript:void(0)">Rent</a></div>
                                            @endif
                                            <div class="ps-project__actions"><a href="javascript:void(0)"><i
                                                        class="lnil lnil-switch"></i></a><a href="javascript:void(0)"><i
                                                        class="lnil lnil-star-fill"></i></a></div>
                                        </div>

                                        <div class="ps-project__content">
                                            <h4 class="ps-project__name"
                                                style="{{ App::isLocale('ar') ? 'text-align: right' : 'text-align: left' }}">
                                                <a
                                                    href="{{ route('front.property', ['property' => $property->id]) }}">{{ $property->propertyTranslation->title ?? ($property->propertyTranslationEnglish->title ?? null) }}</a>
                                            </h4>
                                            <p class="ps-project__address"
                                                style="{{ App::isLocale('ar') ? 'text-align: right' : 'text-align: left' }}">
                                                {{ $property->country->countryTranslation->name ?? ($property->country->countryTranslationEnglish->name ?? null) }}
                                                ,
                                                {{ $property->state->stateTranslation->name ?? ($property->state->stateTranslationEnglish->name ?? null) }},
                                                {{ $property->city->cityTranslation->name ?? ($property->city->cityTranslationEnglish->name ?? null) }}
                                            </p>
                                            @if ($property->type == 'sale')
                                                <p
                                                    style="{{ App::isLocale('ar') ? 'text-align: right' : 'text-align: left' }}">
                                                    <span
                                                        class="ps-project__price">{{ trans('file.property_starting') }}</span>
                                                        {{$property->currency->icon}}{{ number_format($property->price)}}</p>
                                            @endif
                                            @if ($property->type == 'rent')
                                                <p
                                                    style="{{ App::isLocale('ar') ? 'text-align: right' : 'text-align: left' }}">
                                                    {{$property->currency->icon}}{{ number_format($property->price)}}<span class="ps-project__price"> /
                                                        {{ trans('file.property_month') }}</span></p>
                                            @endif

                                            {{-- <p class="ps-project__price"><strong>$7,250</strong> / <span>month</span> --}}
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
                                                    @if ($property->type == 'rent')
                                                        <p class="ps-project__price"
                                                            style="{{ App::isLocale('ar') ? 'text-align: right' : 'text-align: left' }}">
                                                            {{ trans('file.for_rent') }}</p>
                                                    @endif

                                                </figure>
                                                <figure>
                                                    <figcaption>{{ trans('file.property_type') }}</figcaption>
                                                    <p>{{ $property->category->name }}</p>
                                                </figure>
                                            </div>
                                            <div class="ps-project__services"
                                                style="{{ App::isLocale('ar') ? 'text-align: right' : 'text-align: left' }}">
                                                <p><span><i class="lnil lnil-size"></i>
                                                        {{ $property->propertyDetails->room_size }}
                                                        {{ trans('file.sq-ft') }}</span></p>
                                                <p><span><i class="lnil lnil-hospital-bed"></i>
                                                        {{ $property->propertyDetails->bed }}
                                                        {{ trans('file.bedrooms') }}</span></p>
                                                <p><span><i class="icon icon-bathtub"></i>
                                                        {{ $property->propertyDetails->bath }}
                                                        {{ trans('file.bath') }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
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
                                            <select class="form-control" name="title" id="city_name">
                                                <option value="">{{ trans('file.city_state') }}</option>
                                                @foreach ($cit as $cit)
                                                    <option value="{{ $cit}}">
                                                        {{ $cit->cityTranslation->name ?? ($cit->cityTranslationEnglish->name ?? null) }}
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
                                            <select class="form-control">
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

                                <div class="col-lg-4 col-md-6 col-6">
                                    <div class="form-group">
                                        <div class="ps-form underline with-icon select" id="bath"><i
                                                class="lnil lnil-hospital-bed ps-form__icon"></i>
                                            <select class="form-control" name="bath">
                                                <option value="">Bathroom</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select><i class="lnil lnil-chevron-down ps-form__select-toggle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6">
                                    <div class="form-group">
                                        <div class="ps-form underline with-icon select" id="bed"><i
                                                class="icon icon-bathtub ps-form__icon"></i>
                                            <select class="form-control" name="bed">
                                                <option value="">Bedroom</option>
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
    <script src="{{ asset('js/leaflet.min.js') }}"></script>
    <!-- Leaflet Maps Scripts -->
    <script src="{{ asset('js/leaflet-markercluster.min.js') }}"></script>
    <script src="{{ asset('js/leaflet-gesture-handling.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var cityId = $("#cityName").val();
            const api_url = window.location.href + '/../../../api/properties/search-properties/cities/' + cityId;
            //var api_url1 = window.location.href+'/../../api/properties/search-properties/'+allData.category_id;
            //var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/'+allData.category_id;


            if (document.getElementById("map") !== null) {
                var mapOptions = {
                    scrollWheelZoom: false
                }
                window.map = L.map('map', mapOptions);
                $('#scrollEnabling').hide();



                function locationData(locationURL, locationImg, locationTitle, locationAddress, locationRating,
                    location_bed, location_bath, location_garage, location_area) {
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
                        '<h3 class="marker_title"><a href="' + locationURL + '">' + locationTitle +
                        '</a></h3>' +
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
                        '</div>' +
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

                async function getData() {
                    const response = await fetch(api_url);
                    console.log(response);
                    const locations = await response.json();

                    for (var i = 0; i < locations.length; i++) {

                        var listeoIcon = L.divIcon({
                            iconAnchor: [20, 51],
                            popupAnchor: [0, -51],
                            className: 'listeo-marker-icon',
                            html: '<div class="marker-container">' +
                                '<div class="marker-card">' +
                                '<img src="' + "{{ url('/') }}" +
                                '/images/others/marker.png" alt="..."/>' +
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
                        }).bindPopup('<div class="container map_container">' +
                            '<div class="row">' +
                            '<div class="col-md-12 px-0">' +
                            '<div class="marker-info" id="marker_info">' +
                            '<img src="' + "{{ url('/') }}" + '/images/thumbnail/' + locations[i]
                            .thumbnail + '" alt="..."/>' +

                            '<div class = "marker_price trend-open">' +
                            '<p>' + '$' + locations[i].price +
                            '<span>month</span>' +
                            '</p>' +
                            '</div>' +
                            '<span class="featured_btn">' + locations[i].type + '</span>' +
                            '</div>' +
                            '<div class="marker-text">' +
                            '<h3 class="marker_title"><a href="properties/' + locations[i].id + '">' +
                            locations[i].title + '</a></h3>' +
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
                        marker.on('click', function(e) {});
                        map.on('popupopen', function(e) {
                            L.DomUtil.addClass(e.popup._source._icon, 'clicked');
                        }).on('popupclose', function(e) {
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
    <script src="{{ asset('js/leaflet-autocomplete.js') }}"></script>
    <script src="{{ asset('js/leaflet-control-geocoder.js') }}"></script>

    <script>
        $('#place-event').on('keyup', function() {
            var search = $(this).val();
            $.ajax({
                method: 'post',
                url: '{{ route('search.properties') }}',
                data: {
                    search: search,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'html',
                success: function(response) {
                    $('.get-properties').html(response);
                }
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
    <script>
        $(document).on('change', '#category_id', function() {
            var propertyType = $(this).val();
            // alert(propertyType);
            if (propertyType == 1) {
                $("#bed").show();
                $("#bath").show();
            } else {
                $("#bed").hide();
                $("#bath").hide();
            }
        });

        $(function() {
            var minPrice = 0;
            var maxPrice = 20000;
            var minArea = 0;
            var maxArea = 500;
            var currentMinArea = $("#minAreaSize").val();;
            var currentMaxArea = $("#maxAreaSize").val();;
            var currentMinValue = $("#minPropPrice").val();
            var currentMaxValue = $("#maxPropPrice").val();

            $("#slider-range").slider({
                range: true,
                min: minPrice,
                max: maxPrice,
                values: [currentMinValue, currentMaxValue],
                slide: function(event, ui) {
                    $("#amount").val(ui.values[0] + " - " + ui.values[1]);
                    $("#min").val(ui.values[0]);
                    $("#max").val(ui.values[1]);
                    currentMinValue = ui.values[0];
                    currentMaxValue = ui.values[1];
                    // alert(currentMinValue,currentMaxValue);
                },
                stop: function(event, ui) {
                    currentMinValue = ui.values[0];
                    currentMaxValue = ui.values[1];

                    // console.log(currentMaxValue,currentMinValue);
                }
            });

            $("#slider-range_area").slider({
                range: true,
                min: minArea,
                max: maxArea,
                values: [currentMinArea, currentMaxArea],
                slide: function(event, ui) {
                    $("#area").val(ui.values[0] + " - " + ui.values[1]);
                    $("#minArea").val(ui.values[0]);
                    $("#maxArea").val(ui.values[1]);
                    currentMinArea = ui.values[0];
                    currentMaxArea = ui.values[1];
                    // alert(currentMinValue,currentMaxValue);
                },
                stop: function(event, ui) {
                    currentMinArea = ui.values[0];
                    currentMaxArea = ui.values[1];
                }
            });

            $("#amount").val($("#slider-range").slider("values", 0) +
                "-" + $("#slider-range").slider("values", 1));


            $("#area").val($("#slider-range_area").slider("values", 0) +
                "-" + $("#slider-range_area").slider("values", 1));

        });
    </script>

    <script>
        $(document).ready(function() {

            $('#city_name').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('autocomplete.fetch') }}",
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#cityList').fadeIn();
                            $('#cityList').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function() {
                var text = $(this).text();
                var city = text.substring(0, text.indexOf(','));

                $('#city_name').val(city);
                $('#cityList').fadeOut();
            });

        });
    </script>
@endpush
