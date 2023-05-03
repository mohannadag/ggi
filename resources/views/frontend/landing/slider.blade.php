<section class="hero-section bg-white">
    <div class="hero-slider2 overflow-hidden">
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- swiper-slide start -->
                @foreach($sliders as $slider)
                <div class="swiper-slide bg-cover bg-center bg-sky-100 z-[1] relative before:absolute before:w-full before:h-full before:inset-0 before:content-[''] before:z-[-1] py-[80px] lg:py-[200px]" style="background-image: url('{{URL::asset('/images/images/'.$slider->sliderTranslation->file)}}')">
                    <div class="container">
                        <div class="grid grid-cols-12">
                            <div class="col-span-12">
                                <div class="slider-content">
                                    <div class="relative mb-5 sub_title">
                                        <span class="text-base text-white block mt-[80px] mb-[150px]">{!! $slider->sliderTranslation->name !!}</span>
                                    </div>
                                    <h1 class="font-lora text-white text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl title">
                                        <span>{!! $slider->sliderTranslation->description !!}</span>
                                    </h1>

                                    <p class="text-base text-white mt-8 mb-12 text max-w-[570px]">
                                        {!! $slider->sliderTranslation->address !!}
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
                                @if($slider->link == 'NULL' || $slider->link == '')
                                @else
                                <div class="inline-block hero_btn">
                                <a href="{{$slider->link}}" class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-white before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto hover:text-primary before:transition-all leading-none px-[20px] py-[15px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-secondary after:rounded-md after:transition-all block" style="z-index:1;">{{$slider->button_text}}</a>
                                </div>
                                @endif
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
