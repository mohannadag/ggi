@extends('frontend.main')
@section('title','GGI Turkey Properties')

@section('content')

@include('frontend.includes.header1')
<!-- Hero section start -->
<div class="relative">
    <div id="hero-map" class="w-full h-[360px] md:h-[550px] xl:h-[750px] google-map"></div>
</div>
<!-- Hero section end -->
@endsection
