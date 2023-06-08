@extends('frontend.main')

@section('content')
@include('frontend.includes.header1')

        <!-- Hero section start -->


        <section class="bg-no-repeat bg-center bg-cover bg-[#E9F1FF] h-[350px] lg:h-[513px] flex flex-wrap items-center relative before:absolute before:inset-0 before:content-[''] before:bg-[#000000] before:opacity-[70%]" style="background-image: url('{{ URL::asset('/images/images/'.$service->file) }}');">
            <div class="container">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="max-w-[600px]  mx-auto text-center text-white relative z-[1]">
                            <div class="mb-5"><span class="text-base block">{{trans('file.Services')}}</span></div>
                            <h1 class="font-lora text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium">{{ $service->serviceTranslation->name ?? ($service->serviceTranslationEnglish->name ?? null) }}</h1>

                            <p class="text-base mt-5 max-w-[500px] mx-auto text-center">{{ $service->serviceTranslation->description ?? ($service->serviceTranslationEnglish->description ?? null) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Hero section end -->

        <!-- About Us Sectin Start -->
        <section class="about-section pt-[80px] lg:pt-[120px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-6 items-center">
                    <div class="col-span-12">
                        <span class="text-secondary text-tiny inline-block mb-2">{{trans('file.why-choose-us')}}</span>
                        <h2 class="font-lora text-primary text-[24px] sm:text-[30px] leading-[1.277] xl:text-xl capitalize mb-10 font-medium max-w-[500px]">We Provide Latest Properties for our valuable Clients<span class="text-secondary">.</span></h2>
                        <p class="mb-10">Golden Group Investiment</p>
                        <div class="scene" data-relative-input="true">
                            <img data-depth="0.1" src="{{ URL::asset('/images/images/'.$service->file) }}" class="" loading="lazy" alt="about Image" style="width:100%; max-height:530px">
                        </div>

                        <div class="py-[80px]">{!! $service->serviceTranslation->body ?? $service->serviceTranslation->body  ?? null !!}</div>

                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Sectin End -->


@endsection
