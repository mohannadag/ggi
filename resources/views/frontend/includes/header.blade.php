@php

$languages = \Illuminate\Support\Facades\DB::table('languages')

           ->select('id','name','locale')

           // ->where('default','=',0)

           ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))

           ->orderBy('name','ASC')

           ->get();

\Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

@endphp
<!-- header top start -->
        <div class="bg-primary font-lora text-white py-[11px]">
            <div class="container">
                <div class="grid items-center grid-cols-12 gap-x-[30px]">
                    <div class="col-span-12 sm:col-span-6 text-center sm:text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                        <p>{{trans('file.questionmark')}} <a class="hover:text-secondary" dir="ltr" href="tel:+90537 353 95 67">+90537 353 95 67</a></p>
                    </div>
                    <div class="col-span-12 sm:col-span-6 text-center sm:text-{{ App::isLocale('ar') ? 'left' : 'right' }}">
                        <p>{{trans('file.visit_us')}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top end -->


<!-- Header start -->
<header id="sticky-header" class="absolute left-0 top-[50px] lg:top-[50px] xl:top-[50px] w-full z-10">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="flex flex-wrap items-center justify-between">
                <a href="{{url('/')}}" class="block">
                        <img width="60px" src="{{ asset('frontend/images/logo/logo.png') }}" loading="lazy" alt="Golden Group Investment logo"> </a>
                    <nav class="flex flex-wrap items-center">
                        <ul class="hidden lg:flex flex-wrap items-center font-lora text-[12px] xl:text-[14px] leading-none text-black {{ App::isLocale('ar') ? 'lg:ml-[100px] xl:ml-[50px]' : '' }}">
                            <li class="mr-7 xl:mr-[40px] relative group py-[20px]">

                                <a href="{{ url('/') }}" id="sticky-color"
                                    class="sticky-dark transition-all text-white hover:text-secondary">{{ trans('file.home') }}</a>

                            </li>
                            <li class="mr-7 xl:mr-[40px] relative group py-[20px]">

                                <a href="{{ url('/about') }}" id="about-color" class="sticky-dark transition-all text-white hover:text-secondary">{{ trans('file.about') }}</a>

                            </li>
                            <li class="mr-7 xl:mr-[40px] relative group py-[20px]">

                                <a href="{{ url('/properties') }}" id="properties-color" class="sticky-dark transition-all text-white hover:text-secondary">{{trans('file.turkey_properties')}} <i class="fa-sharp fa-solid fa-caret-down"></i></a>
                                <ul class="list-none bg-white drop-shadow-[0px_6px_10px_rgba(0,0,0,0.2)] rounded-[12px] flex flex-wrap w-[890px] absolute top-[120%] left-1/2 translate-x-[-40%] xl:translate-x-[-45%] transition-all group-hover:top-[100%] invisible group-hover:visible opacity-0 group-hover:opacity-100 px-[40px] py-[45px] bg-contain bg-right-top bg-no-repeat "
                                    style="background-image: url('../images/states/europe.jpg'); ">

                                    <li class="{{ App::isLocale('ar') ? 'mr-[200px]' : 'mr-[70px]' }}">
                                        <ul>
                                            <li class="text-primary underline font-lora mb-[30px]">{{trans('file.states')}}</li>
                                            @foreach($states->where('status',1) as $state)
                                            <li class="mb-[25px] last:mb-0">
                                                <a href="{{url('/search-sale?&state='. $state->id)}}"
                                                    class="font-lora text-[14px] hover:text-secondary">{{ $state->stateTranslation->name ?? ($state->stateTranslationEnglish->name ?? null) }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="{{ App::isLocale('ar') ? 'mr-[200px]' : 'mr-[70px]' }}">
                                        <ul>
                                            <li class="text-primary underline font-lora mb-[30px]">{{trans('file.property_type')}}</li>
                                            <li class="mb-[25px] last:mb-0">
                                                <a href="{{url('/search-sale?&category_id=4')}}"
                                                    class="font-lora text-[14px] hover:text-secondary">{{trans('file.villas')}}</a>
                                            </li>
                                            <li class="mb-[25px] last:mb-0">
                                                <a href="{{url('/search-sale?&category_id=3')}}"
                                                    class="font-lora text-[14px] hover:text-secondary">{{trans('file.land')}}</a>
                                            </li>
                                            <li class="mb-[25px] last:mb-0">
                                                <a href="{{url('/search-sale?&category_id=5')}}"
                                                    class="font-lora text-[14px] hover:text-secondary">{{trans('file.project')}}</a>
                                            </li>

                                        </ul>
                                    </li>


                                    {{-- <li class="{{ App::isLocale('ar') ? 'mr-[200px]' : 'mr-[70px]' }}">
                                        <ul>
                                            <li class="text-primary underline font-lora mb-[30px]">{{trans('file.property_status')}}</li>
                                            <li class="mb-[25px] last:mb-0">
                                                <a href="{{url('/search-sale?_token=FjPsIGldRhfwRg2GZoTDxfn2A1sTfdJfHpMGWvXb&state=&city_id=&category_id=&minPrice=1&maxPrice=2000000&bed=&bath=&garage=')}}"
                                                    class="font-lora text-[14px] hover:text-secondary">{{trans('file.property_for_sale')}}</a>
                                            </li>

                                        </ul>
                                    </li> --}}

                                </ul>
                            </li>
                            <li class="mr-7 xl:mr-[40px] relative group py-[20px]">

                                <a href="{{url('/turkish-citizenship')}}" id="citizenship-color" class="sticky-dark transition-all text-white hover:text-secondary">{{trans('file.turkish_citizenship')}}</a>

                            </li>
                            <li class="mr-7 xl:mr-[40px] relative group py-[20px]">

                                <a href="{{url('/news')}}" id="news-color" class="sticky-dark transition-all text-white hover:text-secondary">{{trans('file.news')}}</a>



                            </li>

                            <li class="mr-7 xl:mr-[40px] relative group py-[20px]">

                                <a href="{{url('/contact')}}" id="contact-color" class="sticky-dark transition-all text-white hover:text-secondary">{{trans('file.contact')}}</a>

                            </li>
                            {{-- <li class="mr-7 xl:mr-[40px] relative group py-[20px]">

                                <a href="{{url('/virtual')}}" class="sticky-dark transition-all text-white hover:text-secondary"><img style="max-width: 31px; height: auto; filter: invert(0.5);" src="{{URL::asset('/frontend/images/360-degrees.png')}}"></a>

                            </li> --}}

                            <li class="mr-7 xl:mr-[40px] relative group py-[20px]">

                                <a class="sticky-dark transition-all text-white hover:text-secondary"><img style="max-width: 31px; height: auto; filter: invert(0.5);" src="{{URL::asset('/frontend/images/lang.svg')}}"></a>
                                <ul class="list-none bg-white drop-shadow-[0px_6px_10px_rgba(0,0,0,0.2)] rounded-[12px] flex flex-wrap flex-col w-[220px] absolute top-[120%] left-1/2 -translate-x-1/2 transition-all group-hover:top-[100%] invisible group-hover:visible opacity-0 group-hover:opacity-100">

                                    @foreach ($languages as $item)
                                    <li class="border-b border-dashed border-primary border-opacity-40 last:border-b-0 hover:border-solid transition-all">
                                        <a href="{{route('language.defaultChange',$item->id)}}" class="font-lora leading-[1.571] text-[14px] text-primary p-[10px] capitalize block transition-all hover:bg-primary hover:text-white text-center my-[-1px] rounded-t-[12px]">{{ strtoupper($item->name) }}</a>
                                    </li>
                                    @endforeach

                                </ul>


                            </li>

                            <li class="mr-7 xl:mr-[20px] relative group py-[20px]">
                                <a class="sticky-dark transition-all text-white hover:text-secondary"><img style="max-width: 31px; height: auto; filter: invert(0.5);" src="{{URL::asset('/frontend/images/currency.svg')}}"></a>
                                <ul class="list-none bg-white drop-shadow-[0px_6px_10px_rgba(0,0,0,0.2)] rounded-[12px] flex flex-wrap flex-col w-[220px] absolute top-[120%] left-1/2 -translate-x-1/2 transition-all group-hover:top-[100%] invisible group-hover:visible opacity-0 group-hover:opacity-100">

                                    @foreach(DB::table('currencies')->get() as $currency)
                                    <li class="border-b border-dashed border-primary border-opacity-40 last:border-b-0 hover:border-solid transition-all">
                                        <a href="{{route('switch_currency', $currency->name)}}" class="font-lora leading-[1.571] text-[14px] text-primary p-[10px] capitalize block transition-all hover:bg-primary hover:text-white text-center my-[-1px] rounded-t-[12px]" {{ Session::has('currency') ? ( Session::get('currency') == $currency->id ? 'selected' : '' ) : ( $currency->is_default == 1 ? 'selected' : '') }}>{{$currency->name}}</a>
                                    </li>
                                    @endforeach

                                </ul>


                            </li>
                        </ul>


                        <ul class="flex flex-wrap items-center">
                           @guest

                            <li class="ml-2 sm:ml-5 lg:hidden">
                                <a href="#offcanvas-mobile-menu" class="offcanvas-toggle flex text-[#016450] hover:text-secondary">
                                    <svg width="24" height="24" class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                            @else
                            @php

                            $user = auth()->user();

                            @endphp
                        <li class="sm:mr-5 xl:mr-[20px] sm:ml-5 xl:ml-[20px] relative group"><a>
                                    <img src="{{URL::asset('/images/users/'.$user->image)}}" loading="lazy" width="62" height="62" alt="avater"  style="border-radius:100%; margin: 0 auto; border:; overflow:hidden;">
                                </a>
                                <ul class="list-none bg-white drop-shadow-[0px_6px_10px_rgba(0,0,0,0.2)] rounded-[12px] flex flex-wrap flex-col w-[180px] absolute top-[120%]  transition-all group-hover:top-[60px] invisible group-hover:visible opacity-0 group-hover:opacity-100 right-0">
                                    <li class="">
                                        <a href="{{url('/admin/properties/create')}}" class="font-lora leading-[1.571] text-[14px] text-primary p-[10px] capitalize block transition-all hover:bg-primary hover:text-white text-left my-[-1px] rounded-t-[12px]">Add Property</a>
                                    </li>
                                    <li class="">
                                        <a href="{{url('/admin/sliders/create')}}" class="font-lora leading-[1.571] text-[14px] text-primary p-[10px] capitalize block transition-all hover:bg-primary hover:text-white text-left my-[-1px]">Add Slider</a>
                                    </li>
                                    <li class="">
                                        <a href="{{url('/admin/videos/create')}}" class="font-lora leading-[1.571] text-[14px] text-primary p-[10px] capitalize block transition-all hover:bg-primary hover:text-white text-left my-[-1px]">Add Video</a>
                                    </li>
                                    <li class="">
                                        <a href="{{url('/admin/testimonials/create')}}" class="font-lora leading-[1.571] text-[14px] text-primary p-[10px] capitalize block transition-all hover:bg-primary hover:text-white text-left my-[-1px]">Add Testimonial</a>
                                    </li>
                                    <li class="">
                                        <a href="{{url('/admin/users/')}}" class="font-lora leading-[1.571] text-[14px] text-primary p-[10px] capitalize block transition-all hover:bg-primary hover:text-white text-left my-[-1px]">Edit Profile</a>
                                    </li>
                                    <li class="border-b border-dashed border-primary border-opacity-40 last:border-b-0 hover:border-solid transition-all">
                                        <a href="{{url('/admin/dashboard')}}" class="font-lora leading-[1.571] text-[14px] text-primary p-[10px] capitalize block transition-all hover:bg-primary hover:text-white text-left my-[-1px]">Dashboard</a>
                                    </li>
                                    <li class="border-b border-dashed border-primary border-opacity-40 last:border-b-0 hover:border-solid transition-all">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="font-lora leading-[1.571] text-[14px] text-primary p-[10px] capitalize block transition-all hover:bg-primary hover:text-white text-center my-[-1px] rounded-b-[12px]">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                            @csrf

                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="ml-2 sm:ml-5 lg:hidden">
                                <a href="#offcanvas-mobile-menu" class="offcanvas-toggle flex text-[#016450] hover:text-secondary">
                                    <svg width="24" height="24" class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"></path>
                                    </svg>
                                </a>
                            </li>
                        @endguest
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- offcanvas-overlay start -->
<div class="offcanvas-overlay hidden fixed inset-0 bg-black opacity-50 z-50"></div>
<!-- offcanvas-overlay end -->
<!-- offcanvas-mobile-menu start -->
<div id="offcanvas-mobile-menu"
    class="offcanvas left-0 transform -translate-x-full fixed font-normal text-sm top-0 z-50 h-screen xs:w-[300px] lg:w-[380px] transition-all ease-in-out duration-300 bg-white">

    <div class="py-12 pr-5 h-[100vh] overflow-y-auto">
        <!-- close button start -->
        <button class="offcanvas-close text-primary text-[25px] w-10 h-10 absolute right-0 top-0 z-[1]"
            aria-label="offcanvas">x</button>
        <!-- close button end -->

        <!-- offcanvas-menu start -->

        <nav class="offcanvas-menu mr-[20px]">
            <ul>
                <li class="relative block border-b-primary border-b first:border-t first:border-t-primary">
                    <a href="{{url('/')}}"
                        class="block capitalize font-normal text-black hover:text-secondary text-base my-2 py-1 px-5">{{ trans('file.home') }}</a>
                </li>
                <li class="relative block border-b-primary border-b">
                    <a href="{{url('/about')}}"
                        class="block capitalize font-normal text-black hover:text-secondary text-base my-2 py-1 px-5">{{ trans('file.about') }}</a>


                </li>
                <li class="relative block border-b-primary border-b">
                    <a href="{{url('/properties')}}"
                        class="block capitalize font-normal text-black hover:text-secondary text-base my-2 py-1 px-5">{{trans('file.turkey_properties')}}</a>

                </li>
                <li class="relative block border-b-primary border-b"><a href="{{url('/page/turkish-citizenship')}}"
                        class="relative block capitalize font-normal text-black hover:text-secondary text-base my-2 py-1 px-5">{{trans('file.turkish_citizenship')}}</a>

                </li>


                <li class="relative block border-b-primary border-b"><a href="{{url('/news')}}" class="relative block capitalize text-black hover:text-secondary text-base my-2 py-1 px-5">{{trans('file.news')}}</a>
                </li>
                <li class="relative block border-b-primary border-b"><a href="{{url('/contact')}}" class="relative block capitalize text-black hover:text-secondary text-base my-2 py-1 px-5">{{trans('file.contact')}}</a>
                </li>
                        <li class="relative block border-b-primary border-b"><a href="#" class="relative block capitalize text-black hover:text-secondary text-base my-2 py-1 px-5"><img style="max-width: 31px; height: auto;" src="{{URL::asset('/frontend/images/lang.svg')}}"></a>

                            <ul class="offcanvas-submenu static top-auto hidden w-full visible opacity-100 capitalize">
                                @foreach ($languages as $item)
                               <li>
                                   <a href="{{route('language.defaultChange',$item->id)}}" class="text-sm py-2 px-[30px] text-black font-light block transition-all hover:text-secondary">{{ strtoupper($item->name) }}</a>
                               </li>
                               @endforeach
                           </ul>
                       </li>
                    <li class="relative block border-b-primary border-b"><a href="#" class="relative block capitalize text-black hover:text-secondary text-base my-2 py-1 px-5"><img style="max-width: 31px; height: auto;" src="{{URL::asset('/frontend/images/currency.svg')}}"></a>

                            <ul class="offcanvas-submenu static top-auto hidden w-full visible opacity-100 capitalize">
                                @foreach(DB::table('currencies')->get() as $currency)
                               <li>
                                   <a href="{{route('switch_currency', $currency->name)}}" class="text-sm py-2 px-[30px] text-black font-light block transition-all hover:text-secondary" {{ Session::has('currency') ? ( Session::get('currency') == $currency->id ? 'selected' : '' ) : ( $currency->is_default == 1 ? 'selected' : '') }}>{{$currency->name}}</a>
                               </li>
                               @endforeach
                           </ul>
                       </li>
            </ul>
        </nav>
        <!-- offcanvas-menu end -->

        <div class="px-5 flex flex-wrap mt-3 sm:hidden">
            <a href="#" class="sticky-btn before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-white before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto hover:text-primary before:transition-all leading-none px-[20px] py-[15px] capitalize font-medium text-white hidden sm:block text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-secondary after:rounded-md after:transition-all">Add Property</a>
        </div>



    </div>
</div>
