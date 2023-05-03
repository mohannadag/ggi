@extends('frontend.main')

@section('content')
@include('frontend.includes.header1')


        <!-- Hero section start -->
        <section class="bg-no-repeat bg-center bg-cover bg-[#FFF6F0] h-[350px] lg:h-[513px] flex flex-wrap items-center relative before:absolute before:inset-0 before:content-['']" style="background-image: url('{{ URL::asset('/images/images/'.$page->file) }}');">
            <div class="container">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="text-center text-primary relative">
                            <h1 class="font-lora text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium">{{ $page->pageTranslation->title ?? ($page->pageTranslationEnglish->title ?? null) }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Hero section end -->

        <!-- Popular Properties start -->
        <section class="popular-properties py-[80px] lg:py-[120px]">
            <div class="container">

                <div class="grid grid-cols-12 mb-[-30px] gap-[30px] xl:gap-[50px]">
                    <div class="col-span-12 md:col-span-6 lg:col-span-8 mb-[30px]">
                        {{-- <img src="{{ URL::asset('/images/gallery/'.$news->image) }}" class="w-auto h-auto" loading="lazy" alt="{{$news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null }}" width="770" height="465"> --}}
                        <div class="mt-[55px] mb-[35px]">
                            <h2 class="font-lora leading-tight text-[22px] md:text-[28px] lg:text-[32px] text-primary mb-[10px] font-medium"> {{ $page->pageTranslation->title ?? ($page->pageTranslationEnglish->title ?? null) }}</h2>

                            <p class="max-w-[767px]">{!! $page->pageTranslation->content ?? ($page->pageTranslationEnglish->content ?? null) !!}</p>
                        </div>


                    </div>

                    <div class="col-span-12 md:col-span-6 lg:col-span-4 mb-[30px]">
                        <aside class="mb-[-40px]">

                            <div class="mb-[40px] flex flex-col">
                                <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[30px] font-medium">{{trans('file.get_touch')}}<span class="text-secondary">.</span></h3>
                                <div class="block mb-[-25px]">
                                    <form id="SubmitFormAgent" class="relative">
                            <input type="hidden" name="id" value="1" id="Id">
                                @csrf
                                <div class="mb-6">
                                    <input type="text" name="name" id="Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('file.name') }}" required>
                                </div>
                                <div class="mb-6">
                                    <input type="text" name="phone" id="Phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('file.phone') }}" required>
                                </div>
                                <div class="mb-6">
                                    <input type="email" name="email" id="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('file.email') }}" required>
                                </div>
                                <div class="mb-6">
                                    <textarea  type="text" rows="2" id="send-message" name="message" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('file.message') }}" required></textarea>
                                </div>
                                <div class="flex items-center mb-4">
                                    <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ trans('file.by_submitting') }} <a href="{{ URL::asset('/terms') }}" class="text-blue-600 hover:underline dark:text-blue-500">{{ trans('file.terms') }}</a>.</label>
                                </div>

                                <button type="submit" class="block z-[1] before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:z-[-1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[30px] py-[12px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:z-[-2] after:bg-primary after:rounded-md after:transition-all">{{trans('file.submit')}}</button>
                            </form>
                                </div>
                            </div>


                        </aside>
                    </div>
                </div>
                <section class="py-[80px] lg:py-[120px]">
                    <div class="container">
                        <div class="grid col-span-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-[30px] mb-[-30px]">

                            <div class="flex hover:drop-shadow-[0px_16px_10px_rgba(0,0,0,0.1)] hover:bg-[#F5F9F8] transition-all p-[20px] xl:p-[35px] rounded-[8px] mb-[30px] group">
                                <img class="self-center mr-[20px] sm:mr-[40px] lg:mr-[20px] xl:mr-[40px] sm:mb-[15px] lg:mb-0" src="{{asset('frontend/images/icon/map.png')}}" width="40" height="55" loading="lazy" alt="image icon">
                                <div class="flex-1">
                                    <h4 class="font-lora group-hover:text-secondary group-hover:transition-all leading-none text-[28px] text-primary mb-[10px]">{{trans('file.our_address')}} <span class="text-secondary">.</span></h4>
                                    <p class="font-light text-[18px] lg:max-w-[230px]">{{$siteInfo->address}}</p>
                                </div>
                            </div>

                            <div class="flex hover:drop-shadow-[0px_16px_10px_rgba(0,0,0,0.1)] hover:bg-[#F5F9F8] transition-all p-[20px] xl:p-[35px] rounded-[8px] mb-[30px] group">
                                <img class="self-center mr-[20px] sm:mr-[40px] lg:mr-[20px] xl:mr-[40px] sm:mb-[15px] lg:mb-0" src="{{asset('frontend/images/icon/phone.png')}}" width="46" height="46" loading="lazy" alt="image icon">
                                <div class="flex-1">
                                    <h4 class="font-lora group-hover:text-secondary group-hover:transition-all leading-none text-[28px] text-primary mb-[10px]">{{trans('file.contact_us')}} <span class="text-secondary">.</span></h4>
                                    <p class="font-light text-[18px] lg:max-w-[230px]"><a href="tel:{{$siteInfo->phone}}" dir="ltr">{{$siteInfo->phone}}</a></p>
                                </div>
                            </div>

                            <div class="flex hover:drop-shadow-[0px_16px_10px_rgba(0,0,0,0.1)] hover:bg-[#F5F9F8] transition-all p-[20px] xl:p-[35px] rounded-[8px] mb-[30px] xl:pl-[65px] group">
                                <img class="self-center mr-[20px] sm:mr-[40px] lg:mr-[20px] xl:mr-[40px] sm:mb-[15px] lg:mb-0" src="{{asset('frontend/images/icon/mail.png')}}" width="46" height="52" loading="lazy" alt="image icon">
                                <div class="flex-1">
                                    <h4 class="font-lora group-hover:text-secondary group-hover:transition-all leading-none text-[28px] text-primary mb-[10px]">{{trans('file.email_us')}} <span class="text-secondary">.</span></h4>
                                    <p class="font-light text-[18px] lg:max-w-[230px]">
                                        <a href="mailto:{{$siteInfo->email}}" class="hover:text-secondary">{{$siteInfo->email}}</a>
                                        <a href="mailto:contact@ggiturkey.com" class="hover:text-secondary">contact@ggiturkey.com</a>
                                    </p>
                                </div>
                            </div>

                        </div>


                    </div>
                </section>

            </div>
        </section>
        <!-- Popular Properties end -->
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
