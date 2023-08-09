@extends('landing.layout')
@section('content')


       <!-- Inner Banner -->
       <div class="inner-banner" style="background-image: url({{asset('frontend/images/about/about1.png')}})">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title text-center">
                    <span>مشروع بضمان حكومي </span>
                    <h2>تملك وسط اسطنبول </h2>
                    <a href="#" class="default-btn default-bg-buttercup" style="pointer-events: all; cursor: pointer;">اضغط للتواصل </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Property Section -->
    <!-- عن المشروع -->
    <section class="property-section pb-70 pt-3">
        <div class="container-fluid">
            <div class="container-max">
                <div class="property-section-text">
                    <div class="section-title">
                        {{-- <span>The areas</span> --}}
                        <h2>
                            عن المشروع
                            <b>توب كابي</b>
                        </h2>
                    </div>
                </div>

                <div class="row pt-45">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-property">
                            <div class="images">
                                <a href="project-details.html">
                                    <img src="{{asset('frontend/images/about/about1.png')}}" alt="Images">
                                </a>
                                <div class="property-content">
                                    <span>DEVELOPED</span>
                                    <a href="project-details.html">
                                        <h3>69 Alfred Apartment</h3>
                                    </a>
                                    <p>Details ipsum dolor sitameLorem adipiscing cnsectetur adipiscing mod</p>
                                    <a href="project-details.html" class="learn-more-btn">
                                        <i class='bx bx-right-arrow-alt'></i>
                                        Learn More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-property">
                            <div class="images">
                                <a href="project-details.html">
                                    <img src="{{asset('frontend/images/about/about1.png')}}" alt="Images">
                                </a>
                                <div class="property-content">
                                    <span>FINISHED</span>
                                    <a href="project-details.html">
                                        <h3>Congregation Building</h3>
                                    </a>
                                    <p>Details ipsum dolor sitameLorem adipiscing cnsectetur adipiscing mod</p>
                                    <a href="project-details.html" class="learn-more-btn">
                                        <i class='bx bx-right-arrow-alt'></i>
                                        Learn More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                        <div class="single-property">
                            <div class="images">
                                <a href="project-details.html">
                                    <img src="{{asset('frontend/images/about/about1.png')}}" alt="Images">
                                </a>
                                <div class="property-content">
                                    <span>IN PROGRESS</span>
                                    <a href="project-details.html">
                                        <h3>C Block Room</h3>
                                    </a>
                                    <p>Details ipsum dolor sitameLorem adipiscing cnsectetur adipiscing mod</p>
                                    <a href="project-details.html" class="learn-more-btn">
                                        <i class='bx bx-right-arrow-alt'></i>
                                        Learn More
                                    </a>
                                    <div class="plus-dots">
                                        <img src="{{asset('frontend/images/about/about1.png')}}" alt="Images">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property Section End -->


    <!-- About Area -->
    <!--
        صورة مفرغة للمشروع
        على الجانب الآخر الفيديو
    -->
    <div class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="single-gallery">
                    <img src="{{asset('frontend/images/about/about1.png')}}" class="" loading="lazy"  alt="">
                    <a href="https://www.youtube.com/watch?v=xMKSaKutgG8" class="gallery-icon">
                        <i class='bx bx-play-circle'></i>
                    </a>
                    </div>
                    {{-- <div class="relative lg:-mb-16">
                        <div class="scene" data-relative-input="true">
                            <img data-depth="0.1" src="{{asset('frontend/images/about/about1.png')}}" class="rounded-[24px] max-w-full" loading="lazy" width="507" height="349" alt="">
                        </div>
                        <a href="" class="play-button bg-white text-white hover:text-primary absolute left-0 right-0 mx-auto top-1/2 -translate-y-1/2 hover:scale-105 hover:bg-primary w-[55px] h-[55px] flex flex-wrap z-[1] items-center justify-center opacity-100 shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] transition-all rounded-full group before:block before:absolute  before:bg-white before:opacity-80 before:shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] hover:before:bg-primary hover:before:opacity-80 before:w-[70px] before:h-[70px] before:rounded-full before:z-[-1]" aria-label="play button">
                            <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="stroke-primary group-hover:stroke-white" d="M1.63861 10.764V6.70324C1.63861 1.66145 5.20893 -0.403178 9.57772 2.11772L13.1024 4.14812L16.6271 6.17853C20.9959 8.69942 20.9959 12.8287 16.6271 15.3496L13.1024 17.38L9.57772 19.4104C5.20893 21.9313 1.63861 19.8666 1.63861 14.8249V10.764Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div> --}}

                    {{-- <div class="about-content">
                        <div class="section-title-two">
                            <span class="section-span-bg2">Our mission & vission</span>
                            <h2>Working For You</h2>
                            <p>
                                Lorem ipsum dolor sit ame consectetur adipisicing eli sed usmod tempor
                                incididunt ut labore et dolore magnaenim  minim veniaquis nostrud exercitation
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="about-card">
                                    <h3>Our Strategy</h3>
                                    <p>Lorem ipsum dolor sitameem adipiscing cnsectetur adimod tur adipiscing</p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="about-card">
                                    <h3>Our Mission</h3>
                                    <p>Lorem ipsum dolor sitameem adipiscing cnsectetur adimod tur adipiscing</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="{{asset('frontend/images/about/about1.png')}}" alt="Images">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

    <!-- Property Details -->
    <!--
        لماذا هذا المشروع
        مشروع بضمان حكومي
        أسعار مناسبة وسط اسطنبول
        مناسب للجنسية
        سهولة إعادة البيع
        القرب من المناطق السياحية
        عائد استثماري مرتفع
    -->
    <div class="property-details">
        <div class="container">
            <div class="property-details-list">
                <ul>
                    <li>
                        {{-- <i class="flaticon-select"></i> --}}
                        <i class='bx bxs-buildings'></i>
                        <span>مشروع بضمان حكومي</span>
                        {{-- <a href="#">مشروع بضمان حكومي </a> --}}
                    </li>

                    <li>
                        {{-- <i class="flaticon-sleep"></i> --}}
                        <i class='bx bxs-purchase-tag-alt'></i>
                        <span>أسعار مناسبة وسط اسطنبول</span>
                        {{-- <a href="#">أسعار مناسبة وسط اسطنبول</a> --}}
                    </li>

                    <li>
                        <i class="flaticon-bath"></i>
                        <span>مناسب للجنسية</span>
                        {{-- <a href="#">مناسب للجنسية </a> --}}
                    </li>

                    <li>
                        <i class="flaticon-chefs-hat"></i>
                        <span>سهولة إعادة البيع</span>
                        {{-- <a href="#">سهولة إعادة البيع </a> --}}
                    </li>

                    <li>
                        <i class="flaticon-wrench"></i>
                        <span>القرب من المناطق السياحية</span>
                        {{-- <a href="#">القرب من المناطق السياحية </a> --}}
                    </li>
                    <li>
                        <i class="flaticon-wrench"></i>
                        <span>عائد استثماري مرتفع </span>
                        {{-- <a href="#">عائد استثماري مرتفع</a> --}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Property Details  End -->

    <!-- Apartment Offer two --> <!-- project services -->
    <div class="apartment-offer-two pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="offer-content">
                        <div class="section-title-two">
                            <span class="section-span-white">مشروع توب كابي</span>
                            <h2 class="section-white">خدمات المشروع</h2>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="offer-item offer-item-bg2 active">
                        <h3>Comfortable Flat</h3>
                        <p>Lorem ipsum dolor sitameem adipiscing cnsectetur adimod tur adipiscing</p>
                        <i class="flaticon-bankrupt"></i>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="offer-item offer-item-bg2">
                        <h3>Sophisticated Door</h3>
                        <p>Lorem ipsum dolor sitameem adipiscing cnsectetur adimod tur adipiscing</p>
                        <i class="flaticon-key"></i>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="offer-item offer-item-bg2">
                        <h3>Private Security</h3>
                        <p>Lorem ipsum dolor sitameem adipiscing cnsectetur adimod tur adipiscing</p>
                        <i class="flaticon-padlock"></i>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="offer-item offer-item-bg2 active">
                        <h3>Parking Space</h3>
                        <p>Lorem ipsum dolor sitameem adipiscing cnsectetur adimod tur adipiscing</p>
                        <i class="flaticon-garage"></i>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="offer-item offer-item-bg2">
                        <h3>Fitness Center</h3>
                        <p>Lorem ipsum dolor sitameem adipiscing cnsectetur adimod tur adipiscing</p>
                        <i class="flaticon-exercise"></i>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="offer-item offer-item-bg2 active">
                        <h3>Good Location</h3>
                        <p>Lorem ipsum dolor sitameem adipiscing cnsectetur adimod tur adipiscing</p>
                        <i class="flaticon-route"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Apartment Offer Area End -->

    <!-- Testimonial Area -->
    <div class="testimonial-area ptb-100">
        <div class="container">
            <div class="testimonial-slider owl-carousel owl-theme">
                <div class="testimonial-item">
                    <h3>A Precious Journey</h3>
                    <p>
                        Lorem ipsum dolor sit ame consectetur adipisicing elitsed
                        do eiusmod tempor labore et dolore magna aliquaUt
                    </p>
                </div>

                <div class="testimonial-item">
                    <h3>Very Much Useful Support</h3>
                    <p>
                        Lorem ipsum dolor sit ame consectetur adipisicing elitsed
                        do eiusmod tempor labore et dolore magna aliquaUt
                    </p>
                </div>

                <div class="testimonial-item">
                    <h3>Awesome Experiences Ever</h3>
                    <p>
                        Lorem ipsum dolor sit ame consectetur adipisicing elitsed
                        do eiusmod tempor labore et dolore magna aliquaUt
                    </p>
                </div>

                <div class="testimonial-item">
                    <h3>Very Much Useful Support</h3>
                    <p>
                        Lorem ipsum dolor sit ame consectetur adipisicing elitsed
                        do eiusmod tempor labore et dolore magna aliquaUt
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Area End -->

    <!-- Service Area -->
    <div class="service-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg">
                        <i class='flaticon-bankrupt'></i>
                        <a href="service-details.html">
                            <h3>Property Management</h3>
                        </a>
                        <p class="text-break">Lorem ipsum dolor sitameem adipiscing cnsectetur adisci- mod tur adipiscing</p>
                        <a href="service-details.html" class="learn-more-btn">
                            Learn More
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg active">
                        <i class='flaticon-value'></i>
                        <a href="service-details.html">
                            <h3>Commercial Development</h3>
                        </a>
                        <p class="text-break">Lorem ipsum dolor sitameem adipiscing cnsectetur adisci- mod tur adipiscing</p>
                        <a href="service-details.html" class="learn-more-btn">
                            Learn More
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg">
                        <i class='flaticon-time-management'></i>
                        <a href="service-details.html">
                            <h3>Construction Management</h3>
                        </a>
                        <p class="text-break">Lorem ipsum dolor sitameem adipiscing cnsectetur adisci- mod tur adipiscing</p>
                        <a href="service-details.html" class="learn-more-btn">
                            Learn More
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg">
                        <i class='flaticon-house'></i>
                        <a href="service-details.html">
                            <h3>Residential Development</h3>
                        </a>
                        <p class="text-break">Lorem ipsum dolor sitameem adipiscing cnsectetur adisci- mod tur adipiscing</p>
                        <a href="service-details.html" class="learn-more-btn">
                            Learn More
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Area End -->

    <!-- Contact Area -->
    <div class="contact-area">
        <div class="container">
            <div class="contact-option">
                <div class="contact-form">
                    <span>SEND MESSAGE</span>
                    <h2>Contact With Us</h2>
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <i class='bx bx-user'></i>
                                    <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Name*">
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <i class='bx bx-user'></i>
                                    <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email*">
                                </div>
                            </div>

                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <i class='bx bx-phone'></i>
                                    <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <i class='bx bx-envelope'></i>
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Your Message"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn default-bg-buttercup">
                                    Send Message
                                    <i class='bx bx-right-arrow-alt'></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Area End -->

@endsection


@push('script')
    <script>
        $(document).ready(function() {
            $('.gallery-icon').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,

                fixedContentPos: false
            });
        });

    </script>
@endpush
