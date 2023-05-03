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
<!-- Modal -->
<div data-te-modal-init class="fixed left-0 top-0 p-6 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <!--Modal title-->
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                    {{trans('file.consult')}}
                </h5>
                <!--Close button-->
                <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="form-side p-6">
                <p class="form-side-description text-primary font-karla">{{trans('file.consult_desc')}}</p>

                <div class="popup-contact-form-wrapper contact-form text-center p-4 mb-3" id="contact-form-modal">
                    <form class="space-y-6" id="subscribeform">
                        <div>
                            <input type="text" name="ModalName" id="ModalName" placeholder="{{trans('file.name')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-3" required>
                        </div>
                        <div>
                            <input type="text" name="ModalPhone" id="ModalPhone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-3" placeholder="{{trans('file.phone')}}" required>
                        </div>
                        <div>
                            <input type="email" name="ModalEmail" id="ModalEmail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-3" placeholder="{{trans('file.email')}}" required>
                        </div>
                        <button id="submit" type="submit" class="w-full text-primary bg-secondary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{trans('file.submit')}}</button>
                    </form>
                </div>

                <p class="free-consultation">{{trans('file.consult_footer')}}</p>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $("#closeButton").click(function() {
        $('#exampleModal').hide();
    })


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
<script>
    $('#subscribeform').on('submit', function(e) {
        e.preventDefault();
        $('.v7').text("Submitting...");
        $('.v7').prop('disabled', true);
        let name = $('#ModalName').val();
        let email = $('#ModalEmail').val();
        let phone = $('#ModalPhone').val();
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
                $('#ModalName').val("");
                $('#ModalEmail').val("");
                $('#ModalPhone').val("");
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