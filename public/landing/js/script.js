jQuery(document).ready(function ($) {
  'use strict'
  var _Language = $('html').attr('lang')
  var lang = document.documentElement.lang
  var _rtl = false
  if ($('body').css('direction') == 'rtl') {
    _rtl = true
  }
  $('.galleryCarousel').owlCarousel({
    items: 1,
    nav: true,
    dots: false,
    navText: [
      '<i class="fas fa-chevron-circle-right"></i>',
      '<i class="fas fa-chevron-circle-left"></i>'
    ],
    rtl: _rtl,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    autoplay: true,
    autoplaySpeed: 700,
    smartSpeed: 700,
    loop: true,
    margin: 15
  })
})
