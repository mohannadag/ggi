
<!-- Brand section Start-->
<section class="brand-section pt-[80px] lg:pt-[125px] pb-[80px] lg:pb-[125px]">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="mb-[60px] text-center">
                    <span class="text-secondary text-tiny inline-block mb-2">{{trans('file.partners')}}</span>
                    <h2 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium">
                        {{trans('file.reliable')}}<span class="text-secondary">.</span>
                    </h2>
                </div>
            </div>
            <div class="col-span-12">
                <div class="brand-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <!-- swiper-slide start -->
                            @foreach($partners as $partner)
                            <div class="swiper-slide text-center">
                                <a class="block">
                                    <img src="{{URL::asset('/images/images/'.$partner->image)}}" class="w-auto h-auto block mx-auto" loading="lazy" width="125" height="109" alt="{{$partner->name}}">
                                </a>
                            </div>
                            @endforeach
                            <!-- swiper-slide end-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Brand section End-->
