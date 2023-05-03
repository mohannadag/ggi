@extends('frontend.main')
@section('title'){{ isset($siteInfo->title) ? $siteInfo->title : 'GGI Turkey,' }}
@endsection
@section('meta'){{ isset($siteInfo->description) ? $siteInfo->description : 'description' }}
@endsection
@section('image')https://ggiturkey.com/frontend/img/brands/logo.webp
@endsection
@section('title', 'GGI Turkey, Properties')


@section('content')
    @include('frontend.includes.header1')

    <section
        class="bg-no-repeat bg-center bg-cover bg-[#E9F1FF] h-[350px] lg:h-[513px] flex flex-wrap items-center relative before:absolute before:inset-0 before:content-[''] before:bg-[#000000] before:opacity-[70%]"
        style="background-image: url('assets/images/breadcrumb/bg-1.png');">
        <div class="container">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="max-w-[600px]  mx-auto text-center text-white relative z-[1]">
                        <div class="mb-5"><span class="text-base block">Our Properties</span></div>
                        <h1
                            class="font-lora text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium">
                            Properties
                        </h1>

                        <p class="text-base mt-5 max-w-[500px] mx-auto text-center">
                            Huge number of propreties availabe here for buy and sell
                            also you can find here co-living property as you like
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->

    <!-- Popular Properties start -->
    <section class="popular-properties py-[80px] lg:py-[120px]">
        <div class="container">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-[30px]">
@foreach($videos as $video)
        @php
        $createdAt = \Carbon\Carbon::parse($video->created_at);
        @endphp
                <div class="swiper-slide">
                    <div class="overflow-hidden rounded-md drop-shadow-[0px_0px_5px_rgba(0,0,0,0.1)] bg-[#FFFDFC] text-center transition-all duration-300 hover:-translate-y-[10px]">
                        <div class="relative">
                            <div data-relative-input="true">
                                <img data-depth="0.1" src="{{asset('/images/images/'.$video->file)}}" class="w-full" width="100%" height="300px" alt="video image">
                            </div>
                            <a href="{{$video->address}}" class="play-button bg-white text-white hover:text-primary absolute left-0 right-0 mx-auto top-1/2 -translate-y-1/2 hover:scale-105 hover:bg-primary w-[55px] h-[55px] flex flex-wrap z-[1] items-center justify-center opacity-100 shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] transition-all rounded-full group before:block before:absolute  before:bg-white before:opacity-80 before:shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] hover:before:bg-primary hover:before:opacity-80 before:w-[70px] before:h-[70px] before:rounded-full before:z-[-1]" aria-label="play button">
                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="stroke-primary group-hover:stroke-white" d="M1.63861 10.764V6.70324C1.63861 1.66145 5.20893 -0.403178 9.57772 2.11772L13.1024 4.14812L16.6271 6.17853C20.9959 8.69942 20.9959 12.8287 16.6271 15.3496L13.1024 17.38L9.57772 19.4104C5.20893 21.9313 1.63861 19.8666 1.63861 14.8249V10.764Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>

                        <div class="py-[20px] px-[20px] text-left">
                            <h3><a href="{{ $video->address }}" class="font-lora leading-tight text-[22px] xl:text-[26px] text-primary hover:text-secondary transition-all font-small">{{$video->name}}</a></h3>
                            <span class="block leading-none font-normal text-[14px] text-secondary mb-[10px]" style="margin-top: 20px;">GGI Turkey on {{$createdAt->toFormattedDateString()}}</span>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            {{-- <div class="grid grid-cols-12 mt-[50px] gap-[30px]">
                <div class="col-span-12">
                    <ul class="pagination flex flex-wrap items-center justify-center">

                        <li class="mx-2">
                            <a class="flex flex-wrap items-center justify-center  w-[26px] h-[26px] bg-primary rounded-full text-orange leading-none transition-all hover:bg-secondary text-white text-[12px]"
                                href="#">
                                <svg width="6" height="11" viewBox="0 0 6 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(.clip0_876_580)">
                                        <path
                                            d="M5.8853 10.0592C5.7326 10.212 5.48474 10.212 5.33204 10.0592L0.636322 5.36134C0.48362 5.20856 0.48362 4.96059 0.636322 4.80782L5.33204 0.109909C5.48749 -0.0403413 5.73535 -0.0359829 5.8853 0.119544C6.03181 0.271171 6.03181 0.511801 5.8853 0.663428L1.46633 5.08446L5.8853 9.50573C6.03823 9.65873 6.03823 9.90648 5.8853 10.0592Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath class="clip0_876_580">
                                            <rect width="5.47826" height="10.1739" fill="white"
                                                transform="matrix(-1 0 0 1 6 0)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>

                        <li class="mx-2">
                            <a class="flex flex-wrap items-center justify-center  w-[26px] h-[26px] leading-none hover:text-secondary"
                                href="#">1</a>
                        </li>

                        <li class="mx-2">
                            <a class="flex flex-wrap items-center justify-center  w-[26px] h-[26px] leading-none hover:text-secondary"
                                href="#">2</a>
                        </li>

                        <li class="mx-2">
                            <a class="flex flex-wrap items-center justify-center  w-[26px] h-[26px] leading-none hover:text-secondary"
                                href="#">3</a>
                        </li>

                        <li class="mx-2">
                            <a class="flex flex-wrap items-center justify-center  w-[26px] h-[26px] leading-none hover:text-secondary"
                                href="#">4</a>
                        </li>

                        <li class="mx-2">
                            <span>---</span>
                        </li>

                        <li class="mx-2">
                            <a class="flex flex-wrap items-center justify-center  w-[26px] h-[26px] leading-none hover:text-secondary"
                                href="#">25</a>
                        </li>

                        <li class="mx-2">
                            <a class="flex flex-wrap items-center justify-center  w-[26px] h-[26px] bg-primary rounded-full text-orange leading-none transition-all hover:bg-secondary text-white text-[12px]"
                                href="#">
                                <svg width="6" height="11" viewBox="0 0 6 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(.clip0_876_576)">
                                        <path
                                            d="M0.114699 10.0592C0.267401 10.212 0.515257 10.212 0.667959 10.0592L5.36368 5.36134C5.51638 5.20856 5.51638 4.96059 5.36368 4.80782L0.667959 0.109909C0.512505 -0.0403413 0.26465 -0.0359829 0.114699 0.119544C-0.031813 0.271171 -0.031813 0.511801 0.114699 0.663428L4.53367 5.08446L0.114699 9.50573C-0.038233 9.65873 -0.038233 9.90648 0.114699 10.0592Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath class="clip0_876_576">
                                            <rect width="5.47826" height="10.1739" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                    </ul>


                </div>
            </div> --}}
        </div>
    </section>
    <!-- Popular Properties end -->

@endsection



@push('scripts')
    <script>
        $(document).on('change', '#state', function() {
            var state = $(this).val();
            $.ajax({
                method: 'post',
                url: '{{ route('admin.get.city') }}',
                data: {
                    state: state,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'html',
                success: function(response) {
                    $('#city_id').html(response);
                    $('#city_id').selectpicker('refresh');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $('#city_name').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('autocomplete.fetch') }}",
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#cityList').fadeIn();
                            $('#cityList').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function() {
                var text = $(this).text();
                var city = text.substring(0, text.indexOf(','));

                $('#city_name').val(city);
                $('#cityList').fadeOut();
            });

        });
    </script>
    <script>
        $(document).on('change', '#category_id', function() {
            var propertyType = $(this).val();
            // alert(propertyType);
            if (propertyType == 1) {
                $("#bed").show();
                $("#bath").show();
            } else {
                $("#bed").hide();
                $("#bath").hide();
            }
        });
    </script>
@endpush
