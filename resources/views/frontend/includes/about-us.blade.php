 <!-- About Us Sectin Start -->
<section class="about-section pt-[80px] lg:pt-[120px]">
    <div class="container">
        <div class="grid grid-cols-12 gap-6 items-center">
            <div class="col-span-12 lg:col-span-6">
                <span class="text-secondary text-tiny inline-block mb-2">{{trans('file.why_us')}}</span>
                <h2 class="font-lora text-primary text-[24px] sm:text-[30px] leading-[1.277] xl:text-xl capitalize font-medium max-w-[500px]">{{trans('file.why_us_title')}}<span class="text-secondary">.</span></h2>
                <p class="max-w-[448px]  mb-5 lg:mb-16">{{trans('file.why_us_desc1')}}</p>
                <div class="scene" data-relative-input="true">
                    <img data-depth="0.1" src="{{asset('frontend/images/about/about_us.jpg')}}" class="" loading="lazy" width="729" height="663" alt="about Image">
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 lg:pl-[70px]">
                <p class="mb-10"></p>

                <div class="-mb-10 mt-12 xl:mt-[70px] 2xl:mt-[100px]">
                    <div class="flex flex-wrap mb-5 lg:mb-10">
                        <div class="flex-1">
                            <p class="max-w-[448px] ">{{trans('file.why_us_desc')}}</p>
                        </div>

                    </div>
                    <div class="flex flex-wrap mb-5 lg:mb-10">
                        <img src="{{asset('frontend/images/interior/our_view.png')}}" class="self-start " style="margin-left: 10px;" loading="lazy" width="50" height="50" alt="about Image">
                        <div class="flex-1">
                            <h3 class="font-lora text-primary text-[22px] xl:text-lg capitalize mb-2">{{trans('file.our_view')}}</h3>
                            <p >{{trans('file.our_view_desc')}}</p>
                        </div>

                    </div>
                    <div class="flex flex-wrap mb-5 lg:mb-10">
                        <img src="{{asset('frontend/images/interior/construction.png')}}" class="self-start " style="margin-left: 10px;" loading="lazy" width="50" height="50" alt="about Image">
                        <div class="flex-1">
                            <h3 class="font-lora text-primary text-[22px] xl:text-lg capitalize mb-2">{{trans('file.our_projects')}}</h3>
                            <p >{{trans('file.our_projects_desc')}}</p>
                        </div>

                    </div>
                    <div class="flex flex-wrap mb-5 lg:mb-10">
                        <img src="{{asset('frontend/images/interior/services.png')}}" class="self-start " style="margin-left: 10px;" loading="lazy" width="50" height="50" alt="about Image">
                        <div class="flex-1">
                            <h3 class="font-lora text-primary text-[22px] xl:text-lg capitalize mb-2">{{trans('file.about_service_headline')}}</h3>
                            <p >{{trans('file.our_services_desc')}}</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- About Us Sectin End -->
