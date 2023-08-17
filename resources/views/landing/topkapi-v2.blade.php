@extends('landing.layout')
@section('content')

@push('style')
    <style>
        .list-item i {
            color: #b39359;
            /* font-size: 30px; */
            border: 1px solid #b39359;
            border-radius: 50px;
        }

        .whatsapp_float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 35px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }
    </style>
@endpush

<div class="d-flex justify-content-between p-3 sticky-top bg-light">
    <img src="https://ggiturkey.com/frontend/images/logo/logo.png" class="logo-one" alt="Logo" width="100px">
    <div class="appointment-btn">
        <a href="#contact-area" class="default-btn default-bg-buttercup">
            {{trans('landing.contact-with-us')}}
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
                            <span>{{ trans('landing.hero-span') }}</span>
                            <h1>{{ trans('landing.hero-title')}}
                                {{-- <b>{{ trans('landing.hero-subtitle')}}</b> --}}
                            </h1>
                            <p>{{ trans('landing.hero-description') }}</p>
                            <div class="home-slider-btn">
                                <a
                                    href="https://wa.me/905373539567"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="default-btn">
                                    {{trans('landing.contact-with-us')}}
                                    <i class='bx bx-right-arrow-alt'></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-xxl-6 pr-0">
                        <div class="home-slider-img">
                            {{-- <img src="https://templates.hibootstrap.com/oftop/default/assets/img/home1/1.jpg" alt="Images"> --}}
                            <img src="{{asset('new-landing/assets/img/hero.png')}}" alt="hero image">
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
                    <span>{{ trans('landing.about-project-span') }}</span>
                    <h2>
                        {{ trans('landing.about-project-title') }}
                        <b>{{ trans('landing.about-project-subtitle') }}</b>
                    </h2>
                </div>
            </div>

            <div class="row pt-45">
                <div class="col-lg-4 col-md-6">
                    <div class="single-property">
                        <div class="images">
                            <img src="{{asset('new-landing/assets/img/550.600/1.png')}}" alt="Images">
                            <div class="property-content">
                                <span>{{ trans('landing.about-card1-span') }}</span>
                                <h3>{{ trans('landing.about-card1-title') }}</h3>
                                <p>{{ trans('landing.about-card1-description') }}</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-property">
                        <div class="images">
                            <img src="{{asset('new-landing/assets/img/550.600/2.png')}}" alt="Images">
                            <div class="property-content">
                                <span>{{ trans('landing.about-card2-span') }}</span>
                                <h3>{{ trans('landing.about-card2-title') }}</h3>
                                <p>{{ trans('landing.about-card2-description') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-property">
                        <div class="images">
                            <img src="{{asset('new-landing/assets/img/550.600/3.png')}}" alt="Images">
                            <div class="property-content">
                                <span>{{ trans('landing.about-card3-span') }}</span>
                                <h3>{{ trans('landing.about-card3-title') }}</h3>
                                <p>{{ trans('landing.about-card3-description') }}</p>
                                <div class="plus-dots">
                                    <img src="https://templates.hibootstrap.com/oftop/default/assets/img/property/plus-dots.png" alt="Images">
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
            <div class="property-section-text">
                <div class="section-title">
                    <h2 class="text-center">
                        {{ trans('landing.video-title') }}
                    </h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="single-gallery">
                    <img src="{{asset('new-landing/assets/img/video-cover.jpg')}}" class="" loading="lazy"  alt="">
                    <a href="https://www.youtube.com/watch?v=4Tpa7sS1JDA" class="gallery-icon" style="transform: none">
                        <i class='bx bx-play-circle'></i>
                    </a>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="{{asset('new-landing/assets/img/main.png')}}" alt="Images">
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
                <div class="row">
                    <div class="col-4 text-center h4 list-item">
                        <i class='bx bx-check mx-2'></i>
                        <span>{{ trans('landing.list-item1') }}</span>
                    </div>
                    <div class="col-4 text-center h4 list-item">
                        <i class='bx bx-check mx-2'></i>
                        <span>{{ trans('landing.list-item2') }}</span>
                    </div>
                    <div class="col-4 text-center h4 list-item">
                        <i class='bx bx-check mx-2'></i>
                        <span>{{ trans('landing.list-item3') }}</span>
                    </div>
                    <div class="col-4 text-center h4 list-item">
                        <i class='bx bx-check mx-2'></i>
                        <span>{{ trans('landing.list-item4') }}</span>
                    </div>
                    <div class="col-4 text-center h4 list-item">
                        <i class='bx bx-check mx-2'></i>
                        <span>{{ trans('landing.list-item5') }}</span>
                    </div>
                    <div class="col-4 text-center h4 list-item">
                        <i class='bx bx-check mx-2'></i>
                        <span>{{ trans('landing.list-item6') }}</span>
                    </div>
                </div>
                {{-- <ul>
                    <li>
                        <i class='bx bx-check'></i>
                        <span>{{ trans('landing.list-item1') }}</span>
                    </li>

                    <li>
                        <i class='bx bx-check'></i>
                        <span>{{ trans('landing.list-item2') }}</span>
                    </li>

                    <li>
                        <i class='bx bx-check'></i>
                        <span>{{ trans('landing.list-item3') }}</span>
                    </li>

                    <li>
                        <i class='bx bx-check'></i>
                        <span>{{ trans('landing.list-item4') }}</span>
                    </li>

                    <li>
                        <i class='bx bx-check'></i>
                        <span>{{ trans('landing.list-item5') }}</span>
                    </li>
                    <li>
                        <i class='bx bx-check'></i>
                        <span>{{ trans('landing.list-item6') }}</span>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
    <!-- Property Details  End -->

    <!-- Room Details Area-->
    <div class="room-details-area pb-70 pt-5">
        <div class="container-fluid">
            <div class="container-max">
                <div class="section-title text-center">
                    {{-- <span>ROOM DETAILS</span> --}}
                    <h2 class="margin-auto">{{ trans('landing.fetures-title') }}</h2>
                </div>

                <div class="tab room-details-tab">


                    <div class="tab_content current active pt-45">
                        <div class="tabs_item current">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="room-details-card">
                                        <img src="{{asset('new-landing/assets/img/870.520/1.png')}}" alt="Images">
                                        <div class="content">
                                            <h3>{{ trans('landing.feture-title1') }}</h3>
                                            <p>
                                                {{ trans('landing.feture-description1') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="room-details-card">
                                        <img src="{{asset('new-landing/assets/img/870.520/2.png')}}" alt="Images">
                                        <div class="content">
                                            <h3>{{ trans('landing.feture-title2') }}</h3>
                                            <p>
                                                {{ trans('landing.feture-description2') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                                    <div class="room-details-card">
                                        <img src="{{asset('new-landing/assets/img/870.520/3.png')}}" alt="Images">
                                        <div class="content">
                                            <h3>{{ trans('landing.feture-title3') }}</h3>
                                            <p>
                                                {{ trans('landing.feture-description3') }}
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
            <div class="section-title text-center">
                <h2 class="margin-auto">{{ trans('landing.testimonial-title') }}</h2>
            </div>
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
            <h2 class="text-center">{{ trans('landing.service-title') }}</h2>
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
    <div id="contact-area" class="contact-area" style="background-image: url({{asset('new-landing/assets/img/contact-background.jpg')}})">
        <div class="container">
            <div class="contact-option">
                <div class="contact-form">
                    <span>{{ trans('landing.send-message') }}</span>
                    <h2>{{ trans('landing.contact-us') }}</h2>
                    <form id="contact_form" action="#">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <i class='bx bx-user'></i>
                                    <input type="text" name="name" id="fName" class="form-control" required data-error="Please enter your name" placeholder="{{ trans('landing.yourname') }}">
                                </div>
                                <div class="text-danger" id="nameErrorMsg"></div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <i class='bx bx-user'></i>
                                    <input type="email" name="email" id="InputEmail" class="form-control" required data-error="Please enter your email" placeholder="{{ trans('landing.email') }}">
                                </div>
                                <div class="text-danger" id="emailErrorMsg"></div>
                            </div>

                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <i class='bx bx-phone'></i>
                                    <input type="text" name="phone_number" id="InputPhone" required data-error="Please enter your number" class="form-control" placeholder="{{ trans('landing.phone') }}">
                                </div>
                                <div class="text-danger" id="phoneErrorMsg"></div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <i class='bx bx-envelope'></i>
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" placeholder="{{ trans('landing.yourmessage') }}"></textarea>
                                </div>
                                <div class="text-danger" id="messageErrorMsg"></div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn default-bg-buttercup">
                                    {{ trans('landing.send-message') }}
                                    <i class='bx bx-right-arrow-alt'></i>
                                </button>
                                <div class="text-danger" id="responseErrorMsg"></div>
                                <div class="text-success" id="responseSuccessMsg"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Area End -->

    <!-- wpp-btn-mobile -->
    <a
        href="https://wa.me/905373539567"
        class="whatsapp_float"
        target="_blank"
        rel="noopener noreferrer"
      >
      <i class='bx bxl-whatsapp'></i>
    </a>

@endsection


@push('script')
    <script>

        $(document).ready(function() {
            $('.gallery-icon').magnificPopup({
                type: 'iframe'
            });
        });

    </script>

<script type="text/javascript">
    $('#contact_form').on('submit', function(e) {
        e.preventDefault();
        $('.v7').text("Submitting...");
        $('.v7').prop('disabled', true);
        let fname = $('#fName').val();
        let email = $('#InputEmail').val();
        let phone = $('#InputPhone').val();
        let message = $('#message').val();

        $.ajax({
            url: "{{ route('contact') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                name: fname,
                email: email,
                phone: phone,
                message: message,
            },
            success: function(response) {
                // $('#successMsg').show();
                // console.log(response);
                $('#fName').val("");
                $('#InputEmail').val("");
                $('#InputPhone').val("");
                $('#message').val("");

                $('.v7').text("Send Message");
                $('.v7').prop('disabled', false);


                $('#nameErrorMsg').fadeOut(300);
                $('#emailErrorMsg').fadeOut(300);
                $('#phoneErrorMsg').fadeOut(300);
                $('#messageErrorMsg').fadeOut(300);
                $('#responseErrorMsg').fadeOut(300);

                $('#responseSuccessMsg').text('Thank you!');
                $('#responseSuccessMsg').delay(3200).fadeOut(300);

                // Swal.fire({
                //     position: 'center',
                //     icon: 'success',
                //     title: 'Thanks for contacting us!',
                //     showConfirmButton: false,
                //     timer: 1500
                // })

            },
            error: function(response) {
                console.log(response);
                $('#nameErrorMsg').text(response.responseJSON.errors.name);
                $('#emailErrorMsg').text(response.responseJSON.errors.email);
                $('#phoneErrorMsg').text(response.responseJSON.errors.phone);
                $('#messageErrorMsg').text(response.responseJSON.errors.message);
                $('#responseErrorMsg').text(response.responseJSON.message);
                // $('#nameErrorMsg').delay(3200).fadeOut(300);
                // $('#emailErrorMsg').delay(3200).fadeOut(300);
                // $('#phoneErrorMsg').delay(3200).fadeOut(300);
                // $('#messageErrorMsg').delay(3200).fadeOut(300);

                $('.v7').text("Send Message");
                $('.v7').prop('disabled', false);

            },
        });
    });

    // Add remove loading class on body element based on Ajax request status
    $(document).on({
        ajaxStart: function() {
            $("body").addClass("loading");
        },
        ajaxStop: function() {
            $("body").removeClass("loading");
        }
    });
</script>
@endpush
