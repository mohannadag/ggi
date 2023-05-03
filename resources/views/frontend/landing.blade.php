@extends('frontend.mainlanding')

@section('content')


@include('frontend.includes.header-ivr')
@include('frontend.landing.header')
@include('frontend.landing.video')
@include('frontend.landing.timeline')
@include('frontend.landing.projects')
@include('frontend.landing.partners')
@include('frontend.landing.faq')

@endsection
@push('script')
<script type="text/javascript">
        $('#SubmitFormAgent').on('submit', function(e) {
            e.preventDefault();

            let id = $('#Id').val();
            let name = $('#Name').val();
            let email = $('#Email').val();
            let phone = $('#Phone').val();
            let message = $('#send-message').val();

            $.ajax({
                url: "{{ route('messages.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    name: name,
                    email: email,
                    phone: phone,
                    message: message,
                },
                success: function(response) {
                    // $('#successMsg').show();
                    // alert(response.errors);
                    let html = '';
                    if (response.errors) {
                        html = '<div class="alert alert-danger">';
                        for (let count = 0; count < response.errors.length; count++) {
                            html += '<p>' + response.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#alert_message').fadeIn("slow");
                        $('#alert_message').html(html);
                        setTimeout(function() {
                            $('#alert_message').fadeOut("slow");
                        }, 3000);
                    } else if (response.success) {
                        // alert('submitted');
                        $('#InputName').val("");
                        $('#InputEmail').val("");
                        $('#InputPhone').val("");
                        $('#message').val("");

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Message Sent!',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        console.log(response);
                    }

                }
            });
        });
    </script>
@endpush
