{{-- <br><br>
<div class="ps-section ps-project-listing with-carousel">
    <div class="container">
        <div class="ps-section__header">
            @if(App::isLocale('tr'))
            <h3 class="ps-section__heading">{{trans('file.featured_property')}}&nbsp;&nbsp;&nbsp;<a class="ps-section__morelink active" href="/properties" >{{trans('file.featured_properties')}} {{$properties->where('type','rent')->count()}} {{trans('file.see_all')}}<i class="lnil lnil-arrow-top-right"></i></a></h3>
            @else
            <h3 class="ps-section__heading" style="{{(App::isLocale('ar') ? 'text-align-last: right' : 'text-align-last: left')}}">{{trans('file.featured_property')}}&nbsp;&nbsp;&nbsp;<a class="ps-section__morelink active" href="/properties" style="{{(App::isLocale('ar') ? 'text-align-last: right' : 'text-align-last: left')}}">{{trans('file.see_all')}} {{$properties->where('type', 'rent')->count()}} {{trans('file.featured_properties')}}<i class="lnil lnil-arrow-top-{{(App::isLocale('ar') ? 'left' : 'right')}}"></i></a></h3>
            @endif
            <div class="ps-section__carousel-navigation"><a class="ps-btn--carouse-arrow prev" href="#carousel-featured-properties"><i class="lnil lnil-chevron-{{(App::isLocale('ar') ? 'right' : 'left')}}"></i></a><a class="ps-btn--carouse-arrow next" href="#carousel-featured-properties"><i class="lnil lnil-chevron-{{(App::isLocale('ar') ? 'left' : 'right')}}"></i></a></div>
        </div>
        <div class="ps-section__content">
            <div class="owl-slider ps-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7500" data-owl-gap="30" data-owl-nav="true" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="false" id="carousel-featured-properties">
                @foreach($properties->where('type', 'rent')->shuffle()->take(10) as $property)
                <div class="ps-project ps-project--grid">
                    <div class="ps-project__thumbnail">
                        <div class="ps-project__image"><img src="{{URL::asset('/images/backgroundImage/'.$property->background_image)}}" alt="" /></div><a class="ps-project__overlay" href="{{route('front.property',['property'=>$property->id])}}"></a>
                        <div class="ps-project__badges"><a class="ps-project__badge featured" href="javascript:void(0)">{{trans('file.featured')}}</a></div>

                    </div>
                    <div class="ps-project__content">
                        <h4 class="ps-project__name" style="{{(App::isLocale('ar') ? 'text-align: right' : 'text-align: left')}}"><a href="{{route('front.property',['property'=>$property->id])}}">{{$propertyTranslation[$property->id]->title ?? $propertyTranslationEnglish[$property->id]->title ?? null}}</a></h4>
                        <p class="ps-project__address" style="{{(App::isLocale('ar') ? 'text-align: right' : 'text-align: left')}}">{{ $country[$property->country_id]->countryTranslation->name ?? $country[$property->country_id]->countryTranslationEnglish->name ?? null }} , {{$states[$property->state_id]->stateTranslation->name ?? $states[$property->state_id]->stateTranslationEnglish->name ?? null}}, {{$city[$property->city_id]->cityTranslation->name ?? $city[$property->city_id]->cityTranslationEnglish->name ?? null}}</p>
                        @if($property->type == 'sale')
                        <p class="ps-project__price" style="{{(App::isLocale('ar') ? 'text-align: right' : 'text-align: left')}}"><span>{{ trans('file.starts_from') }} </span><strong>{{$property->currency->icon}}{{ number_format($property->price)}}</strong>
                        @endif
                        @if($property->type == 'rent')
                        <p class="ps-project__price" style="{{(App::isLocale('ar') ? 'text-align: right' : 'text-align: left')}}"><p>{{$property->currency->icon}}{{ number_format($property->price)}} <span class="per_month" style="{{(App::isLocale('ar') ? 'text-align: right' : 'text-align: left')}}"> {{ trans('file.month') }}</span></p>
                        @endif
                        </p>
                        <div class="ps-project__meta" style="{{(App::isLocale('ar') ? 'text-align: right' : 'text-align: left')}}">
                            <figure>
                                <figcaption>{{trans('file.property_status')}}</figcaption>
                                @if($property->type == 'sale')
                        <p class="ps-project__price" style="{{(App::isLocale('ar') ? 'text-align: right' : 'text-align: left')}}"> {{trans('file.for_sale')}}</p>
                        @endif
                        @if($property->type == 'rent')
                        <p class="ps-project__price" style="{{(App::isLocale('ar') ? 'text-align: right' : 'text-align: left')}}">{{trans('file.for_rent')}}</p>
                        @endif

                            </figure>
                            <figure>
                                <figcaption>{{trans('file.property_type')}}</figcaption>
                                <p>{{$property->category->categoryTranslation->name}}</p>
                            </figure>
                            @if($property->category_id == '5')
                                        <figure>
                                            <figcaption>{{trans('file.delivery_status')}}</figcaption>
                                            <p>{{$property->propertyDetails->delivery_month}}, {{$property->propertyDetails->deliver_year}}</p>
                                        </figure>
                                        @else
                                        @endif
                        </div>
                        <div class="ps-project__services">
                            @if($property->category_id == '5')
                            <p><span><i class="lnil lnil-size"></i>{{trans('file.project_size')}}: {{$property->propertyDetails->room_size}} {{trans('file.sq-ft')}}</span></p>
                            <p><span><i class="lnil lnil-house-alt"></i>{{trans('file.units')}}: {{$property->propertyDetails->total_units}}</span></p>
                            @if($property->propertyDetails->title_deed_type == '1')
                            <p><span><i class="lnil lnil-certificate-alt"></i>{{trans('file.title_deed')}}:<br>{{trans('file.condominium')}}</span></p>
                            @endif
                            @if($property->propertyDetails->title_deed_type == '2')
                            <p><span><i class="lnil lnil-certificate-alt"></i>{{trans('file.title_deed')}}:<br>{{trans('file.easement')}}</span></p>
                            @endif
                            @if($property->propertyDetails->title_deed_type == '3')
                            <p><span><i class="lnil lnil-certificate-alt"></i>{{trans('file.title_deed')}}:<br>{{trans('file.shared')}}</span></p>
                            @endif
                            @elseif($property->category_id == '3')
                            <p><span><i class="lnil lnil-size"></i>{{$property->propertyDetails->room_size}} {{trans('file.sq-ft')}}</span></p>
                            @if($property->propertyDetails->title_deed_type == '1')
                            <p><span><i class="lnil lnil-certificate-alt"></i>{{trans('file.title_deed')}}:<br>{{trans('file.condominium')}}</span></p>
                            @endif
                            @if($property->propertyDetails->title_deed_type == '2')
                            <p><span><i class="lnil lnil-certificate-alt"></i>{{trans('file.title_deed')}}:<br>{{trans('file.easement')}}</span></p>
                            @endif
                            @if($property->propertyDetails->title_deed_type == '3')
                            <p><span><i class="lnil lnil-certificate-alt"></i>{{trans('file.title_deed')}}:<br>{{trans('file.shared')}}</span></p>
                            @endif
                            <p><span><i class="lnil lnil-door-alt"></i>Parcel No: {{$property->propertyDetails->parcel}}</span></p>
                            @elseif($property->category_id == '7')
                            <p><span><i class="lnil lnil-size"></i>{{$property->propertyDetails->room_size}} {{trans('file.sq-ft')}}</span></p>
                            <p><span><i class="lnil lnil-house-alt"></i>{{$property->propertyDetails->total_units}} {{trans('file.units')}}</span></p>
                            <p><span><i class="lnil lnil-chevron-down-circle"></i>{{$property->propertyDetails->building_age}} {{trans('file.years')}}</span></p>
                            @else
                            <p><span><i class="lnil lnil-size"></i>{{$property->propertyDetails->room_size}} {{trans('file.sq-ft')}}</span></p>
                            <p><span><i class="lnil lnil-hospital-bed"></i>{{$property->propertyDetails->bed}} {{trans('file.bedrooms')}}</span></p>
                            <p><span><i class="icon icon-bathtub"></i>{{$property->propertyDetails->bath}} {{trans('file.bath')}}</span></p>
                            <p><span><i class="lnil lnil-layers"></i>{{$property->propertyDetails->floor}}</span></p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div> --}}
