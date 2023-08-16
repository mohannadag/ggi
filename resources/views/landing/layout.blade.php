<!doctype html>
<html lang="ar" dir="rtl">
    <head>
        <!-- Required Meta Tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap RTL CSS -->
        <link rel="stylesheet" href="{{asset('new-landing/assets/css/bootstrap.rtl.min.css')}}">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{asset('new-landing/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('new-landing/assets/css/owl.theme.default.min.css')}}">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="{{asset('new-landing/assets/fonts/flaticon.css')}}">
        <!-- Boxicons CSS -->
        <link rel="stylesheet" href="{{asset('new-landing/assets/css/boxicons.min.css')}}">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="{{asset('new-landing/assets/css/animate.min.css')}}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{asset('new-landing/assets/css/magnific-popup.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('new-landing/assets/css/meanmenu.css')}}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{asset('new-landing/assets/css/nice-select.min.css')}}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('new-landing/assets/css/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('new-landing/assets/css/responsive.css')}}">
        <!-- Theme Dark CSS -->
        <link rel="stylesheet" href="{{asset('new-landing/assets/css/theme-dark.css')}}">
        <!-- RTL CSS -->
        <link rel="stylesheet" href="{{asset('new-landing/assets/css/rtl.css')}}">

        <!-- Title -->
        <title>GGI - Toplapi</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="https://ggiturkey.com/frontend/images/logo/logo.png">
        @stack('style')
    </head>
    <body>

        <!-- Preloader -->
        <div class="preloader">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="spinner">
                        <div class="circle1"></div>
                        <div class="circle2"></div>
                        <div class="circle3"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Preloader -->



        @yield('content')






        <!-- Jquery Min JS -->
        <script src="{{asset('new-landing/assets/js/jquery.min.js')}}"></script>
        <!-- Bootstrap Min JS -->
        <script src="{{asset('new-landing/assets/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Owl Carousel Min JS -->
        <script src="{{asset('new-landing/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('new-landing/assets/js/carousel-thumbs.js')}}"></script>
        <!-- Meanmenu JS -->
        <script src="{{asset('new-landing/assets/js/meanmenu.js')}}"></script>
        <!-- Magnific Popup JS -->
        <script src="{{asset('new-landing/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Wow JS -->
        <script src="{{asset('new-landing/assets/js/wow.min.js')}}"></script>
        <!-- Nice Select JS -->
        <script src="{{asset('new-landing/assets/js/jquery.nice-select.min.js')}}"></script>
        <!-- Ajaxchimp Min JS -->
        <script src="{{asset('new-landing/assets/js/jquery.ajaxchimp.min.js')}}"></script>
        <!-- Form Validator Min JS -->
        <script src="{{asset('new-landing/assets/js/form-validator.min.js')}}"></script>
        <!-- Contact Form JS -->
        <script src="{{asset('new-landing/assets/js/contact-form-script.js')}}"></script>
         <!-- Nice Select JS -->
         <script src="{{asset('new-landing/assets/js/jquery.nice-select.min.js')}}"></script>
        <!-- Custom JS -->
        <script src="{{asset('new-landing/assets/js/custom.js')}}"></script>
        @stack('script')
    </body>
    </html>
