<section class="hero-section bg-white">
    <div class="hero-slider2 overflow-hidden">
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- swiper-slide start -->
                @foreach($sliders as $slider)
                <div class="swiper-slide bg-cover bg-center bg-sky-100 z-[1] relative before:absolute before:w-full before:h-full before:inset-0 before:content-[''] before:bg-[#000000] before:opacity-[40%] before:z-[-1] py-[80px] lg:py-[350px]" style="background-image: url('{{URL::asset('/images/images/'.$slider->file)}}');">
                    <div class="container">
                        <div class="grid grid-cols-12">
                            <div class="col-span-12">
                                <div class="slider-content">
                                    <div class="relative mb-5 sub_title">
                                        <span class="text-base text-white block mt-[80px] mb-[150px]">{!! $slider->address !!}</span>
                                    </div>
                                    <h1 class="font-lora text-white text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl title">
                                        <span>{!! $slider->name !!}</span>
                                    </h1>

                                    <p class="text-base text-white mt-8 mb-12 text max-w-[570px]">
                                        {!! $slider->description !!}
                                    </p>
                                    {{-- <span class="text-white inline-block font-lora leading-none border-b-2 border-secondary bg-primary  mt-[40px] mb-[75px] hero_btn text-center"></span> --}}

                                </div>
                            </div>


                            <div class="col-span-12 xl:col-span-10">
                                {{-- <ul class="flex flex-wrap items-center sm:justify-between text-white mt-[-20px] mb-[10px] lg:mb-[60px]">

                                    <li class="pr-[30px] sm:pr-[35px] lg:pr-[70px] sm:border-r sm:border-[#E0E0E0] my-[20px]">
                                        <img class="mb-[15px]" src="assets/images/icon/home.png" width="33" height="33" alt="icon">
                                        <span>2350 Sq.fit</span>
                                    </li>


                                    <li class="pr-[30px] sm:pr-[35px] lg:pr-[70px] sm:border-r sm:border-[#E0E0E0] my-[20px]">
                                        <img class="mb-[15px]" src="assets/images/icon/bed.png" width="33" height="31" alt="icon">
                                        <span>Bedrooms</span>
                                    </li>

                                    <li class="pr-[30px] sm:pr-[35px] lg:pr-[70px] sm:border-r sm:border-[#E0E0E0] my-[20px]">
                                        <img class="mb-[15px]" src="assets/images/icon/bathroom.png" width="32" height="33" alt="icon">
                                        <span>Bathroom</span>
                                    </li>

                                    <li class="pr-[30px] sm:pr-[35px] lg:pr-[70px] sm:border-r sm:border-[#E0E0E0] my-[20px]">
                                        <img class="mb-[15px]" src="assets/images/icon/kitchen.png" width="31" height="31" alt="icon">
                                        <span>2 Kitchen</span>
                                    </li>

                                    <li class="my-[20px]">
                                        <img class="mb-[15px]" src="assets/images/icon/garage.png" width="32" height="32" alt="icon">
                                        <span>3 Garage</span>
                                    </li>

                                </ul> --}}

                                <div class="inline-block hero_btn">
                                <a href="{{$slider->link}}" class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-white before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto hover:text-primary before:transition-all leading-none px-[20px] py-[15px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-secondary after:rounded-md after:transition-all block" style="z-index:1;">View Details</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                <!-- swiper-slide end-->


            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination home-pagination-six hidden lg:flex flex-wrap flex-col items-end"></div>
        </div>
    </div>
</section>

<!-- Addvanced search tab start -->
<div class="mt-[80px] lg:mt-[120px] xl:mt-[-100px] relative z-[2] pl-[40px] lg:pl-[50px] xl:pl-[0px]">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12 relative">

                <button class="tab-toggle-btn px-[10px] py-[15px] absolute bottom-[-56px] left-[-45px] border-l border-t border-b border-solid border-[#016450] bg-white text-primary border-opacity-25 rounded-tl-[10px] rounded-bl-[10px]" aria-label="svg icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 22V11" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M19 7V2" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 22V17" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 13V2" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5 22V11" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5 7V2" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3 11H7" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M17 11H21" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10 13H14" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="col-span-12 selectricc-border-none">
                <div id="buy" class="tab-content bg-white border border-solid border-[#016450] border-opacity-25 rounded-bl-[15px] rounded-br-[15px] rounded-tr-[15px] px-[15px] sm:px-[30px] py-[40px] active">
                    <form action="{{ route('search.property') }}" method="GET">
                        @csrf
                        <div class="advanced-searrch flex flex-wrap items-center -mb-[45px]">
                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/location.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="city_name" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Location</label>
                                    <input name="title" id="city_name" type="text" placeholder="Enter location" class="text-tiny placeholder:text-body leading-none font-light pr-3 focus:outline-none w-full">
                                </div>
                                <div id="cityList">
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/property.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="property" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">{{ trans('file.property_type') }}</label>
                                    <select id="category_id" name="category_id" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option value="">Select</option>
                                        @foreach ($categories->where('status', 1) as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->categoryTranslation->name ?? ($category->categoryTranslationEnglish->name ?? null) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/dollar-circle.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="price" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Price Range</label>
                                    <div class="price-slider">
                                        <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        </div>
                                        <span id="minPrice" data-currency="$" name="minPrice" class="slider-price">0</span> <span class="seperator">-</span> <span id="maxPrice" data-currency="$" data-max="1000000" name="maxPrice" class="slider-price">1000000 +</span>
                                    </div>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] relative">

                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/area.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="property-size" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Listing Size</label>
                                    <div class="price-slider">
                                        <div id="area-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        </div>
                                        <span id="min-area" data-currency="$" name="minArea" class="slider-price">0</span> <span class="seperator">-</span> <span id="max-area" data-currency="$" data-max="1000000" name="maxArea" class="slider-price">1000000 +</span>
                                    </div>
                                </div>
                                <button class="search-btn absolute right-0 lg:right-[-60px] xl:right-[-70px]">
                                    <img src="{{asset('frontend/images/icon/search-outline.svg')}}" class="max-w-[30px] xl:w-auto" width="40" height="40" alt="svg icon">
                                    <span class="hidden">Search Properties</span>
                                </button>
                            </div>
                        </div>


                        <div class="advanced-searrch-hidden flex flex-wrap items-center mt-[45px] -mb-[45px]">
                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/location.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="bed" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">{{ trans('file.bedrooms') }}</label>
                                    <select name="bed" id="bed" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option value="">Select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/property.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="bath" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">{{ trans('file.bath') }}</label>
                                    <select name="bath" id="bath" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option value="">Select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/dollar-circle.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="garage" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Garage</label>
                                    <select name="garage" id="garage" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option>Select</option>
                                        <option value="1">1 Garage</option>
                                        <option value="2">2 Garage</option>
                                        <option value="3">3 Garage</option>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <button class="search-properties-btn">
                                    Search Properties
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="rent" class="tab-content bg-white border border-solid border-[#016450] border-opacity-25 rounded-bl-[15px] rounded-br-[15px] rounded-tr-[15px] px-[15px] sm:px-[30px] py-[40px]">
                    <form action="{{ route('search.rent') }}" method="GET">
                        @csrf
                        <div class="advanced-searrch flex flex-wrap items-center -mb-[45px]">
                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/location.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="location7" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Location</label>
                                    <input name="title" id="city_name" type="text" placeholder="Choose location" class="text-tiny placeholder:text-body leading-none font-light pr-3 focus:outline-none w-full">
                                </div>
                                <div id="cityList">
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/property.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="property8" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Property Type</label>
                                    <select name="property" id="property8" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option value="">{{ trans('file.property_type') }}</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->categoryTranslation->name ?? ($category->categoryTranslationEnglish->name ?? null) }}
                                                    </option>
                                                @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/dollar-circle.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="price7" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Price Range</label>
                                    <select name="price" id="price7" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option selected value="0">1500 USD</option>
                                        <option value="1">1600 USD</option>
                                        <option value="2">1700 USD</option>
                                        <option value="3">1800 USD</option>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] relative">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/area.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="property-size9" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Property Size</label>
                                    <select name="property-size" id="property-size9" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option selected value="0">2500 Sqft</option>
                                        <option value="1">2600 Sqft</option>
                                        <option value="2">2700 Sqft</option>
                                        <option value="3">2800 Sqft</option>
                                    </select>
                                </div>
                                <button class="search-btn absolute right-0 lg:right-[-60px] xl:right-[-70px]">
                                    <img src="{{asset('frontend/images/icon/search-outline.svg')}}" class="max-w-[30px] xl:w-auto" width="40" height="40" alt="svg icon">
                                    <span class="hidden">Search Properties</span>
                                </button>
                            </div>
                        </div>


                        <div class="advanced-searrch-hidden flex flex-wrap items-center mt-[45px] -mb-[45px]">
                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/location.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="bedrooms6" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Bedrooms</label>
                                    <select name="property" id="bedrooms6" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option selected value="0">Bedrooms</option>
                                        <option value="1">kitchen</option>
                                        <option value="2">dinning rooms</option>
                                        <option value="3">Duplex House 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/property.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="property7" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Bathrooms</label>
                                    <select name="property" id="property7" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option selected value="0">Duplex House</option>
                                        <option value="1">Duplex House 1</option>
                                        <option value="2">Duplex House 2</option>
                                        <option value="3">Duplex House 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="{{asset('frontend/images/icon/dollar-circle.svg')}}" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="garage20" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Garage</label>
                                    <select name="garage" id="garage20" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option selected value="0">2 Garage</option>
                                        <option value="1">2 Garage</option>
                                        <option value="2">3 Garage</option>
                                        <option value="3">4 Garage</option>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <button class="search-properties-btn">Search Properties </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Addvanced search tab end -->
