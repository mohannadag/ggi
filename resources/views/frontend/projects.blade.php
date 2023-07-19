@extends('frontend.main')
@section('title'){{isset($siteInfo->title) ? $siteInfo->title : 'GGI Turkey,'}}
@endsection
@section('meta'){{isset($siteInfo->description) ? $siteInfo->description : 'description'}}
@endsection
@section('image')https://ggiturkey.com/frontend/images/logo/logo.png
@endsection
@section('title', 'GGI Turkey, Properties')
@section('content')
{{-- @include('frontend.includes.header-ivr') --}}
@include('frontend.includes.header1')

<section class="bg-no-repeat bg-center bg-cover bg-[#FFF6F0] h-[350px] lg:h-[513px] flex flex-wrap items-center relative before:absolute before:inset-0 before:content-['']" style="background-image: url('{{ url('frontend/images/breadcrumb/properties-bg.jpg') }}');">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="max-w-[600px]  mx-auto text-center text-primary relative z-[1]">
                    <div class="mb-5"><span class="text-base block">GGI Turkey</span></div>
                    <h1 class="font-lora text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium">
                        Drive Archive
                    </h1>
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

                <div id="grid" class="grid grid-tab-content active">
                    <div class="col-span-12">
                        <table class="w-full text-center">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-base bg-primary font-medium text-white px-6 py-4">NAME</th>
                                    <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4">CODE</th>
                                    <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4">TYPE</th>
                                    <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4">PRICE</th>
                                    <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4">LINK</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($properties as $property)
                                @php
                                $createdAt = \Carbon\Carbon::parse($property->created_at);
                                @endphp
                                    <tr class="border-b bg-[#E9F1FF]">
                                        <td class="text-[1.1rem] text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$property->propertyTranslation->title ?? $property->propertyTranslationEnglish->title ?? null}}</td>
                                        <td class="text-[1.1rem] text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$property->property_id}}</td>
                                        <td class="text-[1.1rem] text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$property->category->categoryTranslation->name ?? $property->category->categoryTranslationEnglish->name ?? null}}</td>
                                        <td class="text-[1.1rem] text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{convert($property->price, $property->currency)}}</td>
                                        <td class="text-[1.1rem] text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{route('front.property', ['property' => $property->id])}}" class="flex flex-wrap items-center justify-center   h-[30px] bg-primary text-orange leading-none transition-all hover:bg-secondary text-white text-[12px] rounded" target="_blank">Link</a>
                                            @if(isset($property->propertyDetails->ivr) && $property->propertyDetails->ivr != '')
                                                <a href="{{$property->propertyDetails->ivr}}" class="flex flex-wrap items-center justify-center mt-1 h-[30px] bg-primary text-orange leading-none transition-all hover:bg-secondary text-white text-[12px] rounded" target="_blank">360</a>
                                            @endif
                                            @can('accessDashboard')
                                                @if(isset($property->propertyDetails->drive_link) && $property->propertyDetails->drive_link != '')
                                                    <a href="{{$property->propertyDetails->drive_link}}" class="flex flex-wrap items-center justify-center mt-1 h-[30px] bg-primary text-orange leading-none transition-all hover:bg-secondary text-white text-[12px] rounded">
                                                        Drive
                                                    </a>
                                                @endif
                                            @endcan
                                        </td>
                                    </tr>



                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- {{ $properties->links('vendor.pagination.custom') }} --}}
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-4 mb-[30px]">
                <aside class="mb-[-60px] asidebar">

                    @include('frontend.includes.search-projects')



    </aside>
    </div>
    </div>

    </div>
</section>
<!-- Popular Properties end -->


@endsection



@push('scripts')
<script>
    $('#search-projects').on('keyup', function() {
        var search = $(this).val();
        //        alert(search);
        $.ajax({
            method: 'post',
            url: '{{route('search.projects')}}',
            data: {
                search: search,
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'html',
            success: function(response) {
                $('.get-project').html(response);
            }
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


<script>
    $(document).on('change', '#state', function() {
        var state = $(this).val();
        $.ajax({
            method: 'post',
            url: '{{route('state.city')}}',
            data: {
                state: state,
                "_token": "{{csrf_token()}}"
            },
            dataType: 'html',
            success: function(response) {
                $('#city_id').html(response);
                $('#city_id').selectric('refresh');
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
