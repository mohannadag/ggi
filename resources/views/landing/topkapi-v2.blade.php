@extends('landing.layout')
@section('content')



<div class="d-flex justify-content-between p-3 sticky-top bg-light">
    <img src="https://ggiturkey.com/frontend/images/logo/logo.png" class="logo-one" alt="Logo" width="130px">
    <div class="appointment-btn">
        <a href="#" class="default-btn default-bg-buttercup">
            Schedule appointment
            <i class='bx bx-right-arrow-alt'></i>
        </a>
    </div>
</div>

<!-- Home Slider Area -->
<div class="home-slider-area">
    <div class="container-fluid m-0 p-0">
        <div class="home-slider owl-carousel owl-theme">
            <div class="slider-item">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-xxl-6">
                        <div class="home-slider-content">
                            <span>Conformable Place</span>
                            <h1>Home Might Be <b>Place Of Comfort</b></h1>
                            <p>Lorem ipsum dolor sit ame consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                            <div class="home-slider-btn">
                                <a href="#" class="default-btn">
                                    Check Appointment
                                    <i class='bx bx-right-arrow-alt'></i>
                                </a>
                                {{-- <a href="contact.html" class="default-btn active">
                                    Contact Us
                                    <i class='bx bx-right-arrow-alt'></i>
                                </a> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-xxl-6 pr-0">
                        <div class="home-slider-img">
                            <img src="https://templates.hibootstrap.com/oftop/default/assets/img/home1/1.jpg" alt="Images">
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Home Slider Area End -->

<!-- Property Section -->
<section class="property-section pb-70 pt-2">
    <div class="container-fluid">
        <div class="container-max">
            <div class="property-section-text">
                <div class="section-title">
                    <span>The areas</span>
                    <h2>
                        The Area Of Property
                        <b>Get It Know</b>
                    </h2>
                </div>
            </div>

            <div class="row pt-45">
                <div class="col-lg-4 col-md-6">
                    <div class="single-property">
                        <div class="images">
                            <a href="">
                                <img src="https://templates.hibootstrap.com/oftop/default/assets/img/property/1.jpg" alt="Images">
                            </a>
                            <div class="property-content">
                                <span>DEVELOPED</span>
                                <a href="">
                                    <h3>69 Alfred Apartment</h3>
                                </a>
                                <p>Details ipsum dolor sitameLorem adipiscing cnsectetur adipiscing mod</p>
                                {{-- <a href="" class="learn-more-btn">
                                    <i class='bx bx-right-arrow-alt'></i>
                                    Learn More
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-property">
                        <div class="images">
                            <a href="">
                                <img src="https://templates.hibootstrap.com/oftop/default/assets/img/property/2.jpg" alt="Images">
                            </a>
                            <div class="property-content">
                                <span>FINISHED</span>
                                <a href="">
                                    <h3>Congregation Building</h3>
                                </a>
                                <p>Details ipsum dolor sitameLorem adipiscing cnsectetur adipiscing mod</p>
                                {{-- <a href="" class="learn-more-btn">
                                    <i class='bx bx-right-arrow-alt'></i>
                                    Learn More
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-property">
                        <div class="images">
                            <a href="">
                                <img src="https://templates.hibootstrap.com/oftop/default/assets/img/property/3.jpg" alt="Images">
                            </a>
                            <div class="property-content">
                                <span>IN PROGRESS</span>
                                <a href="">
                                    <h3>C Block Room</h3>
                                </a>
                                <p>Details ipsum dolor sitameLorem adipiscing cnsectetur adipiscing mod</p>
                                {{-- <a href="" class="learn-more-btn">
                                    <i class='bx bx-right-arrow-alt'></i>
                                    Learn More
                                </a> --}}
                                <div class="plus-dots">
                                    <img src="	https://templates.hibootstrap.com/oftop/default/assets/img/property/plus-dots.png" alt="Images">
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
    <div class="about-area pt-100 pb-70 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="single-gallery">
                    <img src="https://templates.hibootstrap.com/oftop/default/assets/img/room-details/1.jpg" class="" loading="lazy"  alt="">
                    <a href="https://www.youtube.com/watch?v=xMKSaKutgG8" class="gallery-icon" style="transform: none">
                        <i class='bx bx-play-circle'></i>
                    </a>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="https://ggiturkey.com/images/images/atlalat-sahr-2023-06-20-6491a2e25a656.png" alt="Images">
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

    <!-- Room Details Area-->
    <div class="room-details-area pb-70">
        <div class="container-fluid">
            <div class="container-max">
                <div class="section-title text-center">
                    <span>ROOM DETAILS</span>
                    <h2 class="margin-auto">Real Value is<b> Inside</b></h2>
                </div>

                <div class="tab room-details-tab">


                    <div class="tab_content current active pt-45">
                        <div class="tabs_item current">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="room-details-card">
                                        <a href="">
                                            <img src="https://templates.hibootstrap.com/oftop/default/assets/img/room-details/3.jpg" alt="Images">
                                        </a>
                                        <div class="content">
                                            <a href=""><h3>01. FLOORS DETAILS</h3></a>
                                            <p>
                                                Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                                incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="room-details-card">
                                        <a href="">
                                            <img src="	https://templates.hibootstrap.com/oftop/default/assets/img/room-details/1.jpg" alt="Images">
                                        </a>
                                        <div class="content">
                                            <a href=""><h3>01. FLOORS DETAILS</h3></a>
                                            <p>
                                                Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                                incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                                    <div class="room-details-card">
                                        <a href="">
                                            <img src="	https://templates.hibootstrap.com/oftop/default/assets/img/room-details/2.jpg" alt="Images">
                                        </a>
                                        <div class="content">
                                            <a href=""><h3>01. FLOORS DETAILS</h3></a>
                                            <p>
                                                Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                                incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room Details Area End -->

    <!-- Testimonial Area -->
    <div class="testimonial-area ptb-70">
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

    <div class="ptb-70 bg-light">
        <div class="container">
            <h2 class="text-center">Our Services</h2>
            <div class="row">
                <div class="col text-center">
                    <i class='flaticon-bankrupt' style="font-size: 50px"></i>
                    <h4>Property Management</h3>
                </div>
                <div class="col text-center">
                    <i class='flaticon-value' style="font-size: 50px"></i>
                    <h4>Property Management</h3>
                </div>
                <div class="col text-center">
                    <i class='flaticon-time-management' style="font-size: 50px"></i>
                    <h4>Property Management</h3>
                </div>
                <div class="col text-center">
                    <i class='flaticon-house' style="font-size: 50px"></i>
                    <h4>Property Management</h3>
                </div>
                <div class="col text-center">
                    <i class='flaticon-bankrupt' style="font-size: 50px"></i>
                    <h4>Property Management</h3>
                </div>
                <div class="col text-center">
                    <i class='flaticon-value' style="font-size: 50px"></i>
                    <h4>Property Management</h3>
                </div>
                <div class="col text-center">
                    <i class='flaticon-time-management' style="font-size: 50px"></i>
                    <h4>Property Management</h3>
                </div>
                <div class="col text-center">
                    <i class='flaticon-house' style="font-size: 50px"></i>
                    <h4>Property Management</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Area -->
    <div class="contact-area" style="background-image: url(https://templates.hibootstrap.com/oftop/default/assets/img/project-details/2.jpg)">
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
