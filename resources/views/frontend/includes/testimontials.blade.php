<!-- Testimonial carousel Start -->
{{-- <section class="testimonial-section pt-[80px] lg:pt-[125px] bg-center bg-no-repeat bg-white z-10">
    <div class="container testimonial-carousel-two relative">
        <div class="scene dots-shape absolute left-0">
            <img data-depth="0.4" class="z-[1]" src="{{ asset('frontend/images/testimonial/dots.png') }}" width="106"
                height="129" loading="lazy" alt="shape">
        </div>
        <div class="grid items-center grid-cols-12 gap-x-[30px]">
            <div class="col-span-12 relative">
                <div class="swiper rounded-[30px] pb-[40px] md:pb-0">
                    <div class="swiper-wrapper">
                        @foreach ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <!-- shape and images -->
                                @if (App::isLocale('ar'))
                                    <div style="padding-right: 42rem">
                                    @else
                                        <div class="pl-[50px] xl:pl-[150px]">
                                @endif
                                <div class="inline-block relative bg-primary text-primary rounded-[30px] z-10">
                                    <img src="{{ asset('/images/images/' . $testimonial->file) }}"
                                        class="w-auto h-auto block mx-auto relative z-[2] thumb" loading="lazy"
                                        width="402" height="505" alt="{{ $testimonial->name }}">
                                    <img class="absolute left-[0px] top-0 z-[1]"
                                        src="{{ asset('frontend/images/testimonial/persone-pattern.png') }}"
                                        width="400" height="500" loading="lazy" alt="shape">
                                </div>
                            </div>


                            <div
                                class="before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:w-full before:h-[395px] before:content-[''] before:bg-[#F5F9F8] before:rounded-[30px]">

                                <div
                                    class="text-{{ App::isLocale('ar') ? 'right' : 'left' }} rounded-[14px] max-w-[100%] sm:max-w-[90%] md:max-w-[560px] mx-auto md:ml-auto absolute top-[65%] sm:top-1/2 left-0 md:left-auto right-0 md:right-[50px] xl:right-0 -translate-y-1/2 px-[20px] md:px-[30px] xl:pl-[0px] xl:pr-[60px]  py-[20px] md:py-[30px] z-20 bg-white xl:bg-transparent shadow lg:shadow-none scale-[0.8] sm:scale-100">
                                    <div class="relative">
                                        <span class="block absolute right-[0px] top-[0px]">

                                            <svg class="ml-auto mb-[4px]" width="78" height="57"
                                                viewBox="0 0 78 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.08">
                                                    <path
                                                        d="M5.50357 56.0343H22.0143L33.0214 34.02V0.998535H0V34.02H16.5107L5.50357 56.0343ZM49.5321 56.0343H66.0429L77.05 34.02V0.998535H44.0286V34.02H60.5393L49.5321 56.0343Z"
                                                        fill="#01614E" />
                                                </g>
                                            </svg>


                                        </span>

                                        <span
                                            class="text-secondary text-tiny capitalize inline-block mb-[5px] xl:mb-[10px]">{{ trans('file.testimonial') }}</span>
                                        <h2
                                            class="font-lora text-primary text-[24px] xl:text-xl capitalize mb-[10px] xl:mb-[20px] leading-[1.2] font-medium">
                                            Reviews from our <br class="hidden xl:block" /> happy Clients<span
                                                class="text-secondary">.</span>
                                        </h2>
                                        <p class="max-w-[480px]">
                                            {!! $testimonial->description !!}

                                        </p>
                                    </div>

                                    <ul>
                                        <li class="flex flex-wrap items-center justify-between mt-4">
                                            <span
                                                class="font-lora text-[18px] leading-none capitalize text-secondary">{{ $testimonial->name }}</span>
                                            <span class="flex flex-wrap">
                                                <span class="ml-[4px]">
                                                    <svg width="10" height="11" viewBox="0 0 10 11"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.64181 4.13829L6.66642 3.70586L5.33634 1.00938C5.30001 0.935551 5.24024 0.875786 5.16642 0.839457C4.98126 0.748051 4.75626 0.824223 4.66368 1.00938L3.3336 3.70586L0.358214 4.13829C0.276182 4.15 0.201182 4.18868 0.143761 4.24727C0.0743407 4.31862 0.0360871 4.41461 0.0374056 4.51416C0.038724 4.6137 0.0795065 4.70864 0.150792 4.77813L2.30353 6.87696L1.79493 9.84063C1.78301 9.90957 1.79063 9.98048 1.81695 10.0453C1.84327 10.1101 1.88723 10.1663 1.94384 10.2074C2.00045 10.2485 2.06745 10.2729 2.13724 10.2779C2.20702 10.2829 2.27681 10.2682 2.33868 10.2356L5.00001 8.83633L7.66134 10.2356C7.73399 10.2742 7.81837 10.2871 7.89923 10.2731C8.10314 10.2379 8.24024 10.0445 8.20509 9.84063L7.69649 6.87696L9.84923 4.77813C9.90782 4.72071 9.94649 4.64571 9.95821 4.56368C9.98985 4.3586 9.84688 4.16875 9.64181 4.13829Z"
                                                            fill="#B39359" />
                                                    </svg>
                                                </span>
                                                <span class="ml-[4px]">
                                                    <svg width="10" height="11" viewBox="0 0 10 11"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.64181 4.13829L6.66642 3.70586L5.33634 1.00938C5.30001 0.935551 5.24024 0.875786 5.16642 0.839457C4.98126 0.748051 4.75626 0.824223 4.66368 1.00938L3.3336 3.70586L0.358214 4.13829C0.276182 4.15 0.201182 4.18868 0.143761 4.24727C0.0743407 4.31862 0.0360871 4.41461 0.0374056 4.51416C0.038724 4.6137 0.0795065 4.70864 0.150792 4.77813L2.30353 6.87696L1.79493 9.84063C1.78301 9.90957 1.79063 9.98048 1.81695 10.0453C1.84327 10.1101 1.88723 10.1663 1.94384 10.2074C2.00045 10.2485 2.06745 10.2729 2.13724 10.2779C2.20702 10.2829 2.27681 10.2682 2.33868 10.2356L5.00001 8.83633L7.66134 10.2356C7.73399 10.2742 7.81837 10.2871 7.89923 10.2731C8.10314 10.2379 8.24024 10.0445 8.20509 9.84063L7.69649 6.87696L9.84923 4.77813C9.90782 4.72071 9.94649 4.64571 9.95821 4.56368C9.98985 4.3586 9.84688 4.16875 9.64181 4.13829Z"
                                                            fill="#B39359" />
                                                    </svg>
                                                </span>
                                                <span class="ml-[4px]">
                                                    <svg width="10" height="11" viewBox="0 0 10 11"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.64181 4.13829L6.66642 3.70586L5.33634 1.00938C5.30001 0.935551 5.24024 0.875786 5.16642 0.839457C4.98126 0.748051 4.75626 0.824223 4.66368 1.00938L3.3336 3.70586L0.358214 4.13829C0.276182 4.15 0.201182 4.18868 0.143761 4.24727C0.0743407 4.31862 0.0360871 4.41461 0.0374056 4.51416C0.038724 4.6137 0.0795065 4.70864 0.150792 4.77813L2.30353 6.87696L1.79493 9.84063C1.78301 9.90957 1.79063 9.98048 1.81695 10.0453C1.84327 10.1101 1.88723 10.1663 1.94384 10.2074C2.00045 10.2485 2.06745 10.2729 2.13724 10.2779C2.20702 10.2829 2.27681 10.2682 2.33868 10.2356L5.00001 8.83633L7.66134 10.2356C7.73399 10.2742 7.81837 10.2871 7.89923 10.2731C8.10314 10.2379 8.24024 10.0445 8.20509 9.84063L7.69649 6.87696L9.84923 4.77813C9.90782 4.72071 9.94649 4.64571 9.95821 4.56368C9.98985 4.3586 9.84688 4.16875 9.64181 4.13829Z"
                                                            fill="#B39359" />
                                                    </svg>
                                                </span>
                                                <span class="ml-[4px]">
                                                    <svg width="10" height="11" viewBox="0 0 10 11"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.64181 4.13829L6.66642 3.70586L5.33634 1.00938C5.30001 0.935551 5.24024 0.875786 5.16642 0.839457C4.98126 0.748051 4.75626 0.824223 4.66368 1.00938L3.3336 3.70586L0.358214 4.13829C0.276182 4.15 0.201182 4.18868 0.143761 4.24727C0.0743407 4.31862 0.0360871 4.41461 0.0374056 4.51416C0.038724 4.6137 0.0795065 4.70864 0.150792 4.77813L2.30353 6.87696L1.79493 9.84063C1.78301 9.90957 1.79063 9.98048 1.81695 10.0453C1.84327 10.1101 1.88723 10.1663 1.94384 10.2074C2.00045 10.2485 2.06745 10.2729 2.13724 10.2779C2.20702 10.2829 2.27681 10.2682 2.33868 10.2356L5.00001 8.83633L7.66134 10.2356C7.73399 10.2742 7.81837 10.2871 7.89923 10.2731C8.10314 10.2379 8.24024 10.0445 8.20509 9.84063L7.69649 6.87696L9.84923 4.77813C9.90782 4.72071 9.94649 4.64571 9.95821 4.56368C9.98985 4.3586 9.84688 4.16875 9.64181 4.13829Z"
                                                            fill="#B39359" />
                                                    </svg>
                                                </span>
                                                <span class="ml-[4px]">
                                                    <svg width="10" height="11" viewBox="0 0 10 11"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.64181 4.13829L6.66642 3.70586L5.33634 1.00938C5.30001 0.935551 5.24024 0.875786 5.16642 0.839457C4.98126 0.748051 4.75626 0.824223 4.66368 1.00938L3.3336 3.70586L0.358214 4.13829C0.276182 4.15 0.201182 4.18868 0.143761 4.24727C0.0743407 4.31862 0.0360871 4.41461 0.0374056 4.51416C0.038724 4.6137 0.0795065 4.70864 0.150792 4.77813L2.30353 6.87696L1.79493 9.84063C1.78301 9.90957 1.79063 9.98048 1.81695 10.0453C1.84327 10.1101 1.88723 10.1663 1.94384 10.2074C2.00045 10.2485 2.06745 10.2729 2.13724 10.2779C2.20702 10.2829 2.27681 10.2682 2.33868 10.2356L5.00001 8.83633L7.66134 10.2356C7.73399 10.2742 7.81837 10.2871 7.89923 10.2731C8.10314 10.2379 8.24024 10.0445 8.20509 9.84063L7.69649 6.87696L9.84923 4.77813C9.90782 4.72071 9.94649 4.64571 9.95821 4.56368C9.98985 4.3586 9.84688 4.16875 9.64181 4.13829Z"
                                                            fill="#B39359" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </li>
                                    </ul>

                                </div>

                            </div>
                    </div>
                    @endforeach

                </div>
                <!-- If we need navigation buttons -->
                <div class="testimonial-pagination hidden sm:block">
                    <div
                        class="swiper-button-prev w-[36px] h-[36px] rounded-full bg-secondary xl:bg-primary  text-white hover:bg-secondary top-auto bottom-[85px] left-[30px]">
                    </div>
                    <div
                        class="swiper-button-next w-[36px] h-[36px] rounded-full bg-secondary xl:bg-primary  text-white hover:bg-secondary top-auto bottom-[85px] left-[85px]">
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</section> --}}
<!-- Testimonial carousel End -->


<section class="testimonial-section pt-[80px] lg:pt-[125px] bg-center bg-no-repeat bg-white z-10">
    <div class="container testimonial-carousel-two relative">
        <div class="scene dots-shape absolute left-0">
            <img data-depth="0.4" class="z-[1]" src="{{ asset('frontend/images/testimonial/dots.png') }}" width="106"
                height="129" loading="lazy" alt="shape">
        </div>
        <div class="grid items-center grid-cols-12 gap-x-[30px]">
            <div class="col-span-12 relative">
                <div class="swiper rounded-[30px] pb-[40px] md:pb-0">
                    <div class="swiper-wrapper">
                        @foreach ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <!-- shape and images -->

                                <div class="pl-[50px] xl:pl-[150px]">
                                    <div class="inline-block relative bg-primary text-primary rounded-[30px] z-10">
                                        <img src="{{ asset('/images/images/' . $testimonial->file) }}"
                                            class="w-auto h-auto block mx-auto relative z-[2] thumb" loading="lazy"
                                            width="402" height="505" alt="Oliver Stephen">
                                        <img class="absolute left-[0px] top-0 z-[1]"
                                            src="{{ asset('frontend/images/testimonial/persone-pattern.png') }}" width="400"
                                            height="500" loading="lazy" alt="shape">
                                    </div>
                                </div>


                                <div
                                    class="before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:w-full before:h-[395px] before:content-[''] before:bg-[#F5F9F8] before:rounded-[30px]">

                                    <div
                                        class="{{ App::isLocale('ar') ? 'testimonial-ar' : '' }} text-left rounded-[14px] max-w-[100%] sm:max-w-[90%] md:max-w-[560px] mx-auto md:ml-auto absolute top-[65%] sm:top-1/2 left-0 md:left-auto right-0 md:right-[50px] xl:right-0 -translate-y-1/2 px-[20px] md:px-[30px] xl:pl-[0px] xl:pr-[60px]  py-[20px] md:py-[30px] z-20 bg-white xl:bg-transparent shadow lg:shadow-none scale-[0.8] sm:scale-100">
                                        <div class="relative">
                                            <span class="block absolute right-[0px] top-[0px]">

                                                <svg class="ml-auto mb-[4px]" width="78" height="57"
                                                    viewBox="0 0 78 57" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.08">
                                                        <path
                                                            d="M5.50357 56.0343H22.0143L33.0214 34.02V0.998535H0V34.02H16.5107L5.50357 56.0343ZM49.5321 56.0343H66.0429L77.05 34.02V0.998535H44.0286V34.02H60.5393L49.5321 56.0343Z"
                                                            fill="#01614E" />
                                                    </g>
                                                </svg>


                                            </span>

                                            <span
                                                class="text-secondary text-tiny capitalize inline-block mb-[5px] xl:mb-[10px]">{{ trans('file.testimonial') }}</span>
                                            <h2
                                                class="font-lora text-primary text-[24px] xl:text-xl capitalize mb-[10px] xl:mb-[20px] leading-[1.2] font-medium">
                                                {{ trans('file.reviews-from-our') }}
                                                {{-- <br class="hidden xl:block" />  --}}
                                                {{ trans('file.happy-clients') }}<span
                                                    class="text-secondary">.</span>
                                            </h2>
                                            <p class="max-w-[480px]">
                                                {!! $testimonial->testimonialTranslation->description ?? $testimonial->testimonialTranslationEnglish->description ?? null !!}

                                            </p>
                                        </div>

                                        <ul>
                                            <li class="flex flex-wrap items-center justify-between mt-4">
                                                <span class="font-lora text-[18px] leading-none capitalize text-secondary">{{ $testimonial->testimonialTranslation->name ?? $testimonial->testimonialTranslationEnglish->name ?? null }}</span>
                                                <span class="flex flex-wrap">
                                                    <span class="ml-[4px]">
                                                        <svg width="10" height="11" viewBox="0 0 10 11"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.64181 4.13829L6.66642 3.70586L5.33634 1.00938C5.30001 0.935551 5.24024 0.875786 5.16642 0.839457C4.98126 0.748051 4.75626 0.824223 4.66368 1.00938L3.3336 3.70586L0.358214 4.13829C0.276182 4.15 0.201182 4.18868 0.143761 4.24727C0.0743407 4.31862 0.0360871 4.41461 0.0374056 4.51416C0.038724 4.6137 0.0795065 4.70864 0.150792 4.77813L2.30353 6.87696L1.79493 9.84063C1.78301 9.90957 1.79063 9.98048 1.81695 10.0453C1.84327 10.1101 1.88723 10.1663 1.94384 10.2074C2.00045 10.2485 2.06745 10.2729 2.13724 10.2779C2.20702 10.2829 2.27681 10.2682 2.33868 10.2356L5.00001 8.83633L7.66134 10.2356C7.73399 10.2742 7.81837 10.2871 7.89923 10.2731C8.10314 10.2379 8.24024 10.0445 8.20509 9.84063L7.69649 6.87696L9.84923 4.77813C9.90782 4.72071 9.94649 4.64571 9.95821 4.56368C9.98985 4.3586 9.84688 4.16875 9.64181 4.13829Z"
                                                                fill="#B39359" />
                                                        </svg>
                                                    </span>
                                                    <span class="ml-[4px]">
                                                        <svg width="10" height="11" viewBox="0 0 10 11"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.64181 4.13829L6.66642 3.70586L5.33634 1.00938C5.30001 0.935551 5.24024 0.875786 5.16642 0.839457C4.98126 0.748051 4.75626 0.824223 4.66368 1.00938L3.3336 3.70586L0.358214 4.13829C0.276182 4.15 0.201182 4.18868 0.143761 4.24727C0.0743407 4.31862 0.0360871 4.41461 0.0374056 4.51416C0.038724 4.6137 0.0795065 4.70864 0.150792 4.77813L2.30353 6.87696L1.79493 9.84063C1.78301 9.90957 1.79063 9.98048 1.81695 10.0453C1.84327 10.1101 1.88723 10.1663 1.94384 10.2074C2.00045 10.2485 2.06745 10.2729 2.13724 10.2779C2.20702 10.2829 2.27681 10.2682 2.33868 10.2356L5.00001 8.83633L7.66134 10.2356C7.73399 10.2742 7.81837 10.2871 7.89923 10.2731C8.10314 10.2379 8.24024 10.0445 8.20509 9.84063L7.69649 6.87696L9.84923 4.77813C9.90782 4.72071 9.94649 4.64571 9.95821 4.56368C9.98985 4.3586 9.84688 4.16875 9.64181 4.13829Z"
                                                                fill="#B39359" />
                                                        </svg>
                                                    </span>
                                                    <span class="ml-[4px]">
                                                        <svg width="10" height="11" viewBox="0 0 10 11"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.64181 4.13829L6.66642 3.70586L5.33634 1.00938C5.30001 0.935551 5.24024 0.875786 5.16642 0.839457C4.98126 0.748051 4.75626 0.824223 4.66368 1.00938L3.3336 3.70586L0.358214 4.13829C0.276182 4.15 0.201182 4.18868 0.143761 4.24727C0.0743407 4.31862 0.0360871 4.41461 0.0374056 4.51416C0.038724 4.6137 0.0795065 4.70864 0.150792 4.77813L2.30353 6.87696L1.79493 9.84063C1.78301 9.90957 1.79063 9.98048 1.81695 10.0453C1.84327 10.1101 1.88723 10.1663 1.94384 10.2074C2.00045 10.2485 2.06745 10.2729 2.13724 10.2779C2.20702 10.2829 2.27681 10.2682 2.33868 10.2356L5.00001 8.83633L7.66134 10.2356C7.73399 10.2742 7.81837 10.2871 7.89923 10.2731C8.10314 10.2379 8.24024 10.0445 8.20509 9.84063L7.69649 6.87696L9.84923 4.77813C9.90782 4.72071 9.94649 4.64571 9.95821 4.56368C9.98985 4.3586 9.84688 4.16875 9.64181 4.13829Z"
                                                                fill="#B39359" />
                                                        </svg>
                                                    </span>
                                                    <span class="ml-[4px]">
                                                        <svg width="10" height="11" viewBox="0 0 10 11"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.64181 4.13829L6.66642 3.70586L5.33634 1.00938C5.30001 0.935551 5.24024 0.875786 5.16642 0.839457C4.98126 0.748051 4.75626 0.824223 4.66368 1.00938L3.3336 3.70586L0.358214 4.13829C0.276182 4.15 0.201182 4.18868 0.143761 4.24727C0.0743407 4.31862 0.0360871 4.41461 0.0374056 4.51416C0.038724 4.6137 0.0795065 4.70864 0.150792 4.77813L2.30353 6.87696L1.79493 9.84063C1.78301 9.90957 1.79063 9.98048 1.81695 10.0453C1.84327 10.1101 1.88723 10.1663 1.94384 10.2074C2.00045 10.2485 2.06745 10.2729 2.13724 10.2779C2.20702 10.2829 2.27681 10.2682 2.33868 10.2356L5.00001 8.83633L7.66134 10.2356C7.73399 10.2742 7.81837 10.2871 7.89923 10.2731C8.10314 10.2379 8.24024 10.0445 8.20509 9.84063L7.69649 6.87696L9.84923 4.77813C9.90782 4.72071 9.94649 4.64571 9.95821 4.56368C9.98985 4.3586 9.84688 4.16875 9.64181 4.13829Z"
                                                                fill="#B39359" />
                                                        </svg>
                                                    </span>
                                                    <span class="ml-[4px]">
                                                        <svg width="10" height="11" viewBox="0 0 10 11"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.64181 4.13829L6.66642 3.70586L5.33634 1.00938C5.30001 0.935551 5.24024 0.875786 5.16642 0.839457C4.98126 0.748051 4.75626 0.824223 4.66368 1.00938L3.3336 3.70586L0.358214 4.13829C0.276182 4.15 0.201182 4.18868 0.143761 4.24727C0.0743407 4.31862 0.0360871 4.41461 0.0374056 4.51416C0.038724 4.6137 0.0795065 4.70864 0.150792 4.77813L2.30353 6.87696L1.79493 9.84063C1.78301 9.90957 1.79063 9.98048 1.81695 10.0453C1.84327 10.1101 1.88723 10.1663 1.94384 10.2074C2.00045 10.2485 2.06745 10.2729 2.13724 10.2779C2.20702 10.2829 2.27681 10.2682 2.33868 10.2356L5.00001 8.83633L7.66134 10.2356C7.73399 10.2742 7.81837 10.2871 7.89923 10.2731C8.10314 10.2379 8.24024 10.0445 8.20509 9.84063L7.69649 6.87696L9.84923 4.77813C9.90782 4.72071 9.94649 4.64571 9.95821 4.56368C9.98985 4.3586 9.84688 4.16875 9.64181 4.13829Z"
                                                                fill="#B39359" />
                                                        </svg>
                                                    </span>
                                                </span>
                                            </li>
                                        </ul>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="testimonial-pagination hidden sm:block">
                        <div
                            class="swiper-button-prev w-[36px] h-[36px] rounded-full bg-secondary xl:bg-primary  text-white hover:bg-secondary top-auto bottom-[85px] left-[30px]">
                        </div>
                        <div
                            class="swiper-button-next w-[36px] h-[36px] rounded-full bg-secondary xl:bg-primary  text-white hover:bg-secondary top-auto bottom-[85px] left-[85px]">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<!-- Brand section Start-->
<section class="brand-section pt-[80px] lg:pt-[125px] pb-[80px] lg:pb-[125px]">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="mb-[60px] text-center">
                    <span class="text-secondary text-tiny inline-block mb-2">{{ trans('file.partners') }}</span>
                    <h2 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium">
                        {{ trans('file.reliable') }}<span class="text-secondary">.</span></h2>
                </div>
            </div>
            <div class="col-span-12">
                <div class="brand-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <!-- swiper-slide start -->
                            @foreach ($partners as $partner)
                                <div class="swiper-slide text-center">
                                    <a class="block">
                                        <img src="{{ URL::asset('/images/images/' . $partner->image) }}"
                                            class="w-auto h-auto block mx-auto" loading="lazy" width="125"
                                            height="109" alt="{{ $partner->name }}">
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
