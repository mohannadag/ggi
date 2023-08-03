@extends('frontend.citizenshipmain')

@php

$languages = \Illuminate\Support\Facades\DB::table('languages')

->select('id', 'name', 'locale')

// ->where('default','=',0)

->where('locale', '!=', \Illuminate\Support\Facades\Session::get('currentLocal'))

->orderBy('name', 'ASC')

->get();

\Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

@endphp

<style>

.swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      font-size: 18px;
      height: auto;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      padding: 30px;
    }
  </style>

@section('content')
@include('frontend.includes.header1')
{{-- @include('frontend.citizenship.header') --}}
@include('frontend.citizenship.slider')

@include('frontend.citizenship.intro')
@include('frontend.citizenship.obtaining')
@include('frontend.citizenship.documents')
@include('frontend.citizenship.featured')
@include('frontend.citizenship.stages-new')
@include('frontend.citizenship.papers')
@include('frontend.citizenship.form')
@include('frontend.citizenship.services')
@include('frontend.citizenship.faq')







<!-- contact form start -->
<section class="py-[80px] lg:py-[120px]">
    <div class="container">
        <div class="grid col-span-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-[30px] mb-[-30px]">

            <div class="flex hover:drop-shadow-[0px_16px_10px_rgba(0,0,0,0.1)] hover:bg-[#F5F9F8] transition-all p-[20px] xl:p-[35px] rounded-[8px] mb-[30px] group">
                <img class="self-center mx-4 lg:mr-[20px] xl:mr-[40px] sm:mb-[15px] lg:mb-0" src="{{ asset('frontend/images/icon/map.png') }}" width="40" height="55" loading="lazy" alt="image icon">
                <div class="flex-1 self-center">
                    <h4 class="font-lora group-hover:text-secondary group-hover:transition-all leading-none text-[28px] text-primary mb-[10px]">
                        {{trans('file.our_address')}} <span class="text-secondary">.</span>
                    </h4>
                    <p class="font-light text-[18px] lg:max-w-[230px]">{{isset($siteInfo->address) ? $siteInfo->address : 'address'}}</p>
                </div>
            </div>

            <div class="flex hover:drop-shadow-[0px_16px_10px_rgba(0,0,0,0.1)] hover:bg-[#F5F9F8] transition-all p-[20px] xl:p-[35px] rounded-[8px] mb-[30px] group">
                <img class="self-center mx-4 lg:mr-[20px] xl:mr-[40px] sm:mb-[15px] lg:mb-0" src="{{ asset('frontend/images/icon/phone.png') }}" width="46" height="46" loading="lazy" alt="image icon">
                <div class="flex-1 self-center">
                    <h4 class="font-lora group-hover:text-secondary group-hover:transition-all leading-none text-[28px] text-primary mb-[10px]">
                        {{trans('file.contact_us')}}<span class="text-secondary">.</span>
                    </h4>
                    <p class="font-light text-[18px] lg:max-w-[230px]"><a href="tel:+9012345678">+9012345678</a></p>
                    <p class="font-light text-[18px] lg:max-w-[230px]"><a href="tel:+9012345678">+9012345678</a></p>
                </div>
            </div>

            <div class="flex hover:drop-shadow-[0px_16px_10px_rgba(0,0,0,0.1)] hover:bg-[#F5F9F8] transition-all p-[20px] xl:p-[35px] rounded-[8px] mb-[30px] xl:pl-[65px] group">
                <img class="self-center mx-4 lg:mr-[20px] xl:mr-[40px] sm:mb-[15px] lg:mb-0" src="{{ asset('frontend/images/icon/mail.png') }}" width="46" height="52" loading="lazy" alt="image icon">
                <div class="flex-1 self-center">
                    <h4 class="font-lora group-hover:text-secondary group-hover:transition-all leading-none text-[28px] text-primary mb-[10px]">
                        {{trans('file.email_us')}} <span class="text-secondary">.</span>
                    </h4>
                    <p class="font-light text-[18px] lg:max-w-[230px]">
                        <a href="mailto:info@ggiturkey.com" class="hover:text-secondary">info@ggiturkey.com</a>
                        <a href="mailto:careers@ggiturkey.com" class="hover:text-secondary">careers@ggiturkey.com</a>
                    </p>
                </div>
            </div>

        </div>


    </div>
</section>
<!-- contact form end -->
@endsection


@push('script')
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".contentSlider", {
        direction: "vertical",
        slidesPerView: "auto",
        freeMode: false,
        scrollbar: {
            el: ".swiper-scrollbar",
        },
        mousewheel: true,
    });
</script>
<script>
    // Initialization for ES Users
    import {
        Tab,
        initTE,
    } from "tw-elements";

    initTE({
        Tab
    });
</script>
<script>
    var swiper = new Swiper(".mySwiper", {
        direction: "vertical",
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        $(".phoneInput").intlTelInput({
            utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.18/js/utils.js",
            nationalMode: false,
            separateDialCode: false,
            autoHideDialCode: false,
            initialCountry: "TR",
            preferredCountries: [
                "SA",
                "QA",
                "TR",
                "IQ",
                "KW",
                "BH",
                "AE",
                "YE",
                "JO",
                "DZ",
                "TN",
                "LY",
                "EG",
                "SD",
                "OM",
                "SY",
            ],
        });

        $(".NumericOnly").keydown(function (event) {
            if (
                event.keyCode == 46 ||
                event.keyCode == 8 ||
                event.keyCode == 9 ||
                event.keyCode == 27 ||
                event.keyCode == 13 ||
                (event.keyCode == 65 && event.ctrlKey === true) ||
                (event.keyCode >= 35 && event.keyCode <= 39)
            ) {
                return;
            } else {
                if (
                    event.shiftKey ||
                    ((event.keyCode < 48 || event.keyCode > 57) &&
                        (event.keyCode < 96 || event.keyCode > 105))
                ) {
                    event.preventDefault();
                }
            }
        });

        counterInit();
        function counterInit() {
            $(".st-counter").tamjidCounter({
                duration: 3000,
            });
        }
    });
</script>
@endpush
