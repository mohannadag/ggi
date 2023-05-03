@extends('frontend.main')
@php

$languages = \Illuminate\Support\Facades\DB::table('languages')

           ->select('id','name','locale')

           // ->where('default','=',0)

           ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))

           ->orderBy('name','ASC')

           ->get();

\Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

@endphp
@section('content')
   @include('frontend.includes.header')
   <!--Hero section starts-->
    @include('frontend.includes.hero1')
    @include('frontend.includes.stories')
    <!--Hero section ends-->
    @include('frontend.includes.popular-properties')
    @include('frontend.includes.about-us')
    @include('frontend.includes.featured-property')

    <!--Popular Cities starts-->
    <!--Popular Cities ends-->
    <!--Popular Property ends-->

    <!--Featured Property ends-->
    @include('frontend.includes.call-to-action')
    <!--Popular Property starts-->
    @include('frontend.includes.faq')
    @include('frontend.includes.popular-city')
    @include('frontend.includes.recent-properties')

    <!--News section starts-->
    <br>
    @include('frontend.includes.testimontials')
    {{--
@include('frontend.includes.recently-added-properties')
    <!--News section starts-->
<br> --}}<!--Team section starts-->
    @include('frontend.includes.agents')
    <!--Team section ends-->
    @include('frontend.includes.news')
    <!--News section ends-->
    <!--Trending events starts-->

    <!--Trending events ends-->

@endsection
@push('script')
    <script>
        $(document).on('change', '#state', function() {
            var state = $(this).val();
            $.ajax({
                method: 'post',
                url: '{{ route('state.city') }}',
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

        $(function() {
            var minPrice = 0;
            var maxPrice = 20000;
            var minArea = 0;
            var maxArea = 500;
            var currentMinArea = $("#minAreaSize").val();;
            var currentMaxArea = $("#maxAreaSize").val();;
            var currentMinValue = $("#minPropPrice").val();
            var currentMaxValue = $("#maxPropPrice").val();

            $("#slider-range").slider({
                range: true,
                min: minPrice,
                max: maxPrice,
                values: [currentMinValue, currentMaxValue],
                slide: function(event, ui) {
                    $("#amount").val(ui.values[0] + " - " + ui.values[1]);
                    $("#min").val(ui.values[0]);
                    $("#max").val(ui.values[1]);
                    currentMinValue = ui.values[0];
                    currentMaxValue = ui.values[1];
                    // alert(currentMinValue,currentMaxValue);
                },
                stop: function(event, ui) {
                    currentMinValue = ui.values[0];
                    currentMaxValue = ui.values[1];

                    // console.log(currentMaxValue,currentMinValue);
                }
            });

            $("#slider-range_area").slider({
                range: true,
                min: minArea,
                max: maxArea,
                values: [currentMinArea, currentMaxArea],
                slide: function(event, ui) {
                    $("#area").val(ui.values[0] + " - " + ui.values[1]);
                    $("#minArea").val(ui.values[0]);
                    $("#maxArea").val(ui.values[1]);
                    currentMinArea = ui.values[0];
                    currentMaxArea = ui.values[1];
                    // alert(currentMinValue,currentMaxValue);
                },
                stop: function(event, ui) {
                    currentMinArea = ui.values[0];
                    currentMaxArea = ui.values[1];
                }
            });

            $("#amount").val($("#slider-range").slider("values", 0) +
                "-" + $("#slider-range").slider("values", 1));


            $("#area").val($("#slider-range_area").slider("values", 0) +
                "-" + $("#slider-range_area").slider("values", 1));

        });
    </script>
    <script>
        $('#place-event').on('keyup', function() {
            var search = $(this).val();
            $.ajax({
                method: 'post',
                url: '{{ route('search.properties') }}',
                data: {
                    search: search,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'html',
                success: function(response) {
                    $('.get-properties').html(response);
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
@endpush
