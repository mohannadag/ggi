 <style>
     .popup-wrapper {
         position: relative
     }

     .popup-wrapper .popup-body {
         position: fixed;
         display: none;
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background-color: rgba(0, 0, 0, .3);
         backdrop-filter: blur(2px);
         z-index: 1000
     }

     .popup-wrapper .popup-body .popup-window {
         position: absolute;
         border-radius: 10px;
         top: 50%;
         left: 50%;
         font-size: 50px;
         color: #000;
         transform: translate(-50%, -50%);
         height: 520px;
         width: 700px;
         background-color: #fff;
         box-shadow: 0 0 30px rgba(0, 0, 0, .102)
     }

     @media(max-width: 599px) {
         .popup-wrapper .popup-body .popup-window {
             max-width: 340px;
             height: 640px
         }
     }

     .popup-wrapper .popup-body .popup-window .window-wrapper {
         display: flex
     }

     @media(max-width: 599px) {
         .popup-wrapper .popup-body .popup-window .window-wrapper {
             flex-direction: column
         }
     }

     .popup-wrapper .popup-body .popup-window .window-wrapper .image-side {
         position: relative
     }

     .popup-wrapper .popup-body .popup-window .window-wrapper .image-side .popup-img {
         width: 312px;
         height: 520px;
         background-image: url('/images/bg/thumbnail.jpg');
         background-size: cover;
     }

     @media(max-width: 599px) {
         .popup-wrapper .popup-body .popup-window .window-wrapper .image-side .popup-img {
             width: 100%;
             height: 193px;
             border-radius: 10px 10px 0 0;
             background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 60%, rgba(0, 0, 0, .5)), url('/images/bg/thumbnail.jpg');
             background-repeat: no-repeat;
             background-size: contain;
         }
     }

     .popup-wrapper .popup-body .popup-window .window-wrapper .image-side .popup-close-icon {
         width: 36px;
         height: 36px;
         position: absolute;
         top: 14px;
         left: 10px;
         cursor: pointer;
         transition: ease-in-out .1s
     }

     .popup-wrapper .popup-body .popup-window .window-wrapper .image-side .popup-close-icon:hover {
         width: 37px;
         height: 37px
     }

     .popup-wrapper .popup-body .popup-window .window-wrapper .form-side {
         display: flex;
         position: relative;
         flex-direction: column;
         width: 100%;
         text-align: center
     }

     .popup-wrapper .popup-body .popup-window .window-wrapper .form-side-header {
         font-size: 25px;
         margin-top: 10px;
         margin-bottom: 0;
         font-weight: 700
     }

     @media(max-width: 599px) {
         .popup-wrapper .popup-body .popup-window .window-wrapper .form-side-header {
             margin-top: 5px
         }
     }

     .popup-wrapper .popup-body .popup-window .window-wrapper .form-side-description {
         font-size: 15px;
         margin-top: 0;
         margin-bottom: 0;
         padding: 0 25px;
     }

     @media(max-width: 599px) {
         .popup-wrapper .popup-body .popup-window .window-wrapper .form-side-description {
             margin-top: 0
         }
     }

     .popup-wrapper .popup-body .popup-window .window-wrapper .form-side-contact {
         font-size: 20px;
         margin-top: 10px;
         margin-bottom: 0;
         font-weight: 700
     }

     @media(max-width: 599px) {
         .popup-wrapper .popup-body .popup-window .window-wrapper .form-side-contact {
             margin-top: 0
         }
     }

     .popup-wrapper .popup-contact-form-wrapper {
         border: none !important;
         margin-bottom: 10px !important;
     }

     @media(max-width: 599px) {
         .popup-wrapper .popup-contact-form-wrapper {
             max-width: 100%
         }
     }

     @media(max-width: 991.98px) {
         .popup-wrapper .popup-contact-form-wrapper form {
             display: block !important
         }

         .popup-wrapper .popup-contact-form-wrapper form .iti--allow-dropdown input {
             padding-left: 70px !important
         }
     }

     .popup-wrapper .free-consultation {
         width: 100%;
         text-align: left;
         margin-left: 3rem;
         margin-bottom: 0;
         font-size: 13px;
         color: #484848
     }

     @media(max-width: 599px) {
         .popup-wrapper .free-consultation {
             margin-left: 5rem
         }
     }

     .popup-wrapper .popup-custom-input {
         margin-top: 0 !important
     }

     .popup-wrapper .popup-btn-send-message {
         margin-top: 20px !important;
         font-size: 15px !important;
         width: 340px !important;
         overflow: hidden;
         white-space: nowrap;
         text-overflow: ellipsis
     }

     @media(max-width: 599px) {
         .popup-wrapper .popup-btn-send-message {
             width: 300px !important;
             margin-top: 0 !important
         }
     }
 </style>
 {{-- @if (Cookie::get('popupform') !== null )
 <!-- Modal -->
 @elseif (Cookie::get('popupform') == null )
 @php( Cookie::queue( Cookie::make('popupform', true, 60)) ) --}}
 <div class="popup-wrapper" id="popup-container" aria-labelledby="PopupModal" tabindex="-1" aria-hidden="true">
     <div class="popup-body" style="display:none">
         <div class="popup-window">
             <div class="window-wrapper">
                 <div class="image-side">
                     <div class="popup-img">
                        <img src="{{asset('frontend/images/about/232.png')}}" style="width: 100%; height:100%">
                     </div>
                     <button type="button" id="closeButton" class="popup-close-icon close" data-dismiss="modal" onclick="closePopup()">
                         <svg aria-hidden="true" class="w-5 h-5" fill="#fff" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                         </svg>
                         <span class="sr-only">Close modal</span>
                     </button>
                 </div>
                 <div class="form-side">
                     <p class="form-side-header text-secondary font-karla">{{trans('file.consult')}}</p>
                     <p class="form-side-description text-primary font-karla">{{trans('file.consult_desc')}}</p>
                     <p class="form-side-contact text-secondary font-karla">Let's call you</p>

                     <div class="popup-contact-form-wrapper contact-form text-center p-4 mb-3" id="contact-form-modal">
                         <form class="space-y-6" id="subscribeform">
                             <div>
                                 <input type="text" name="PopupName" id="PopupName" placeholder="{{trans('file.name')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-3" required>
                             </div>
                             <div>
                                 <input type="text" name="PopupPhone" id="PopupPhone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-3" placeholder="{{trans('file.phone')}}" required>
                             </div>
                             <div>
                                 <input type="email" name="PopupEmail" id="PopupEmail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-3" placeholder="{{trans('file.email')}}" required>
                             </div>
                             <button id="submit" type="submit" class="w-full text-primary bg-secondary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{trans('file.submit')}}</button>
                         </form>
                     </div>

                     <p class="free-consultation">{{trans('file.consult_footer')}}</p>
                 </div>
             </div>
         </div>
     </div>
 </div>
 {{-- @endif --}}

 @push('script')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>


 <script type="text/javascript">
    // function openModal() {
    //     $('#exampleModal').modal('show');
    //     $.cookie('visited', 'yes', { expires: 1 });
    // }
    // function closeModal() {
    //     $('#exampleModal').modal('hide');
    // }

    // $(document).ready(function() {
    //     var visited = $.cookie('visited');
    //     if (visited == 'yes') {
    //         closeModal();
    //     } else {
    //         setTimeout( function() { openModal() },20000);
    //     }
    // });

    function openModal() {
        // $('#popup-container').modal('show');
        // $.cookie('visited', 'yes', { expires: 1 });
        $('.popup-body').css('display', 'block');
        jQuery('#active-popup').show();
        jQuery('#popup-container').show();
        $.cookie('popupform', 'yes', { expires: 1 });
    }
    function closeModal() {
        $('.popup-body').css('display', 'none');
        jQuery('#active-popup').hide();
        jQuery('#popup-container').hide();
        // $('#popup-container').modal('hide');
    }

    $(document).ready(function() {
        var visited = $.cookie('popupform');
        if (visited == 'yes') {
            closeModal();
        } else {
            setTimeout( function() { openModal() },10000);
        }
    });

</script>


 <script>
     jQuery(document).ready(function() {
         jQuery('.close').click(function() {
             jQuery('#popup-container').fadeOut();
             jQuery('#active-popup').fadeOut();
         });

         var visits = jQuery.cookie('popupform') || 0;
         visits++;

         jQuery.cookie('popupform', visits, {
             expires: 1,
             path: '/'
         });

         console.debug(jQuery.cookie('popupform'));

         if (jQuery.cookie('popupform') > 1) {
             jQuery('#active-popup').hide();
             jQuery('#popup-container').hide();
         }

         if (jQuery.cookie('noShowWelcome')) {
             jQuery('#popup-container').hide();
             jQuery('#active-popup').hide();
         }
     });

     jQuery(document).mouseup(function(e) {
         var container = jQuery('#popup-container');

         if (!container.is(e.target) && container.has(e.target).length === 0) {
             container.fadeOut();
             jQuery('#active-popup').fadeOut();
         }

     });
 </script>
 <script>
     $('#subscribeform').on('submit', function(e) {
         e.preventDefault();
         $('.v7').text("Submitting...");
         $('.v7').prop('disabled', true);
         let name = $('#PopupName').val();
         let email = $('#PopupEmail').val();
         let phone = $('#PopupPhone').val();
         $.ajax({
             url: "{{ route('popup') }}",
             type: "POST",
             data: {
                 "_token": "{{ csrf_token() }}",
                 name: name,
                 email: email,
                 phone: phone,
             },
             success: function(response) {
                 // $('#successMsg').show();
                 // console.log(response);
                 $('#PopupName').val("");
                 $('#PopupEmail').val("");
                 $('#PopupPhone').val("");
                 $('.v7').text("Send Message");
                 $('.v7').prop('disabled', false);

                 Swal.fire({
                     position: 'center',
                     icon: 'success',
                     title: 'Thanks for contacting us!',
                     showConfirmButton: false,
                     timer: 1500
                 })

             },
             error: function(response) {
                 $('#nameErrorMsg').text(response.responseJSON.errors.name);
                 $('#emailErrorMsg').text(response.responseJSON.errors.email);
                 $('#phoneErrorMsg').text(response.responseJSON.errors.phone);

                 $('#nameErrorMsg').delay(3200).fadeOut(300);
                 $('#emailErrorMsg').delay(3200).fadeOut(300);
                 $('#phoneErrorMsg').delay(3200).fadeOut(300);

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
