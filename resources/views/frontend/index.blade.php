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
    @include('frontend.includes.hero')
    @include('frontend.includes.stories')
    <!--Hero section ends-->
    @include('frontend.includes.popular-properties')
    @include('frontend.includes.about-us')
    @include('frontend.includes.featured-property')

    @include('frontend.includes.faq')
    @include('frontend.includes.popular-city')

    <!--News section starts-->
    @include('frontend.includes.testimontials')
    <!--Team section starts-->
    @include('frontend.includes.agents')
    <!--Team section ends-->
    @include('frontend.includes.news')
    <!--News section ends-->
    <!--Trending events starts-->

    <!--Trending events ends-->

@endsection
@push('script')
<script>
    $(document).on('change','#state',function(){
        var state = $(this).val();
        $.ajax({
            method:'post',
            url: '{{route('state.city')}}',
            data: {state:state,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
                $('#city_id').html(response);
                $('#city_id').selectric('refresh');
            }
        });
    });
</script>

<script>
    var swiper = new Swiper(".agentSlide", {
      slidesPerView: 3,
      spaceBetween: 10,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
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
@endpush
