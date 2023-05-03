<!-- <section class="recent-property-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="section-title">
                    <span class="sub-heading">Properties</span>
                    <h2 class="heading-title">Recently Added</h2>
                    <p>Dramatically harness real-time portals whereas distinctive services. Conveniently seize standardized best practices.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="recent-property-slider">
                    @foreach($properties->shuffle() as $property)
                    <div class="single-p-slider">
                        <div class="single-recent-property">
                            <div class="single-r-property-top">
                                <div class="single-r-property-img">
                                    <img src="{!! $property->photo() !!}" alt="#">
                                </div>
                                <div class="property-for-sale">
                                    <ul class="list-none">
                                        @if($property->is_featured == 1)<li class="active"><a href="#">{{trans('file.featured')}}</a></li>@endif
                                        @if($property->type == 'sale')<li class="active"><a href="#">{{trans('file.for_sale')}}</a></li>@endif
                                        @if($property->type == 'rent')<li class="active"><a href="#">{{trans('file.for_rent')}}</a></li>@endif
                                    </ul>
                                </div>
                                @php

                                            $pic = json_decode($property->image->name);

                                        @endphp
							<div class="property-ratting">
								<div class="property-ratting-left popup-gallery">
									<span class="p-ratting-point">
                                        @foreach($pic as $key=>$p)<a href="{{ URL::asset('images/gallery/'.$p)}}" data-fancybox="photo" class="image-view">
                                            @endforeach<i class="fa fa-image"></i></a></span>
								</div>
							</div>
                            </div>
                            <div class="s-property-content">
                                <h3 class="srp-title hs-4"><a href="{{route('front.property',['property'=>$property->id])}}">{{isset($property->propertyTranslation->title) ? $property->propertyTranslation->title : 'title'}}</a></h3>
                                <p class="property-location mb-0"><i class="fa fa-map-marker-alt"></i>{{$property->country->countryTranslation->name ?? $property->country->countryTranslationEnglish->name ?? null}} , {{$property->state->stateTranslation->name ?? $property->state->stateTranslationEnglish->name ?? null}}, {{$property->city->cityTranslation->name ?? $property->city->cityTranslationEnglish->name ?? null}}</p>
                                <div class="single-r-property-bed">
                                    <ul class="single-bed-property list-none">
                                        <li><b>{{$property->propertyDetails->bed}}</b><span><i class="fa fa-bed"></i></span></li>
                                        <li><b>{{$property->propertyDetails->bath}}</b><span><i class="fa fa-shower"></i></span></li>
                                        <li><b>{{$property->propertyDetails->garage}}</b><span><i class="fa fa-warehouse"></i></span></li>
                                    </ul>
                                </div>
                                <div class="property-user">
                                    <div class="property-user-left">
                                        <div class="property-user-title">
                                            <p class="at-title mb-0 hs-6"><a href="#">{{$property->category->categoryTranslation->name ?? $property->category->categoryTranslationEnglish->name ?? null}}</a></p>
                                        </div>
                                    </div>
                                    <div class="property-user-price">
                                        @if($property->type == 'sale')<p>{{$property->currency->icon}} {{number_format($property->price)}}</p>@endif
                                        @if($property->type == 'rent')<p>{{$property->currency->icon}} {{number_format($property->price)}} / {{trans('file.month')}}</p>@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section> -->
