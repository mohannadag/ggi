@php

                     $languages = \Illuminate\Support\Facades\DB::table('languages')

                                ->select('id','name','locale')

                                // ->where('default','=',0)

                                ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))

                                ->orderBy('name','ASC')

                                ->get();

                 \Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

                @endphp

<form class="ps-form--projects-search" action="{{route('search.property')}}" method="GET">
    <input type="hidden" id="min" name="minPrice">
    <input type="hidden" id="max" name="maxPrice">
    <input type="hidden" id="maxPropPrice" value="{{$maxPrice}}">
    <input type="hidden" id="minPropPrice" value="{{$minPrice}}">

    <input type="hidden" id="minArea" name="minArea">
    <input type="hidden" id="maxArea" name="maxArea">
    <input type="hidden" id="minAreaSize" value="{{$minArea}}">
    <input type="hidden" id="maxAreaSize" value="{{$maxArea}}">
    @csrf
    <div class="ps-form__top">
        <div class="ps-form__top-left">
            {{-- <button class="ps-btn">Sell</button>
            <button class="ps-btn ps-btn--gray">Rent</button> --}}
        </div>
        <div class="ps-form__top-right">
            <div class="ps-form__items">
                <div class="ps-form underline with-icon"><i class="lnil lnil-map ps-form__icon"></i>
                    <div class="input-search autocomplete">
                        <input type="text" class="form-control" name="title" id="city_name" placeholder="{{trans('file.search')}}">
                        </div>
                    <div id="cityList">
                    </div>
                </div>
                <div class="ps-form underline with-icon select"><i class="lnil lnil-map ps-form__icon"></i>
                    <select class="form-control" name="city_id" id="city_id">
                        <option value="">{{trans('file.city')}}</option>
                        @foreach($city->where('status',1)->sortBy('name') as $city)
                            <option value="{{$city->id}}">{{$city->cityTranslation->name ?? $city->cityTranslationEnglish->name ?? null}}</option>
                            @endforeach
                    </select><i class="lnil lnil-chevron-down ps-form__select-toggle"></i>
                </div>
                <div class="ps-form underline with-icon select"><i class="lnil lnil-apartment ps-form__icon"></i>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">{{trans('file.property_type')}}</option>
                                @foreach($categories->sortBy('name') as $category)
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

