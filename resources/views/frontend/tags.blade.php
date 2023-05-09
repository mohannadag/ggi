@extends('frontend.main')
@section('title')
GGI Turkey Blog
@endsection
@section('meta')
All recent news and updates about your real
@endsection
@section('image')
https://ggiturkey.com/frontend/frontend/img/brands/logo.webp
@endsection
@section('content')
@include('frontend.includes.header1')

<!-- Hero section start -->
<section class="bg-no-repeat bg-center bg-cover bg-[#FFF6F0] h-[350px] lg:h-[513px] flex flex-wrap items-center relative before:absolute before:inset-0 before:content-[''] before:bg-[#000000] before:opacity-[70%]" style="background-image: url('{{asset('frontend/images/breadcrumb/bg-1.png')}}');">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="text-center text-white relative z-10">
                    <div class="mb-5"><span class="text-base block">{{trans('file.news')}}</span></div>
                    <h1 class="font-lora text-[32px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium">
                    </h1>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero section end -->
<div class="ps-page ps-page--blog">
    <div class="ps-page__header">
        <div class="container">
            <h1 class="ps-page__heading" style="{{(App::isLocale('ar') ? 'text-align: right' : 'text-align: left')}}"> {{$popularTopic->blogCategoryTranslation->name ?? $popularTopic->blogCategoryTranslationEnglish->name  ?? null }}</h1>
        </div>
    </div>

    <!-- Popular Properties start -->
    <section class="popular-properties py-[80px] lg:py-[120px]">
        <div class="container">

            <div class="grid grid-cols-12 mb-[-30px] gap-[30px] xl:gap-[50px]">
                <div class="col-span-12 md:col-span-6 lg:col-span-8 mb-[30px]">

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 gap-x-[30px] gap-y-[40px]">
                        @foreach($newses as $news)
                        @php
                        $createdAt = \Carbon\Carbon::parse($news->created_at);
                        @endphp
                        <div class="post-item">
                            <a href="{{ route('news.show', $news) }}" class="block overflow-hidden rounded-[6px] mb-[35px]">
                                <img class="w-full h-full" src="{{ URL::asset('images/thumbnail/'.$news->image) }}" width="370" height="270" loading="lazy" alt="{{$news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null }}">
                            </a>
                            <div>
                                <span class="block leading-none font-normal text-[14px] text-secondary mb-[10px]">{{$news->user->f_name}} on {{$createdAt->toFormattedDateString()}}</span>
                                <h3><a href="{{ route('news.show', $news) }}" class="font-lora text-[22px] xl:text-[24px] leading-[1.285] text-primary block mb-[10px] hover:text-secondary transition-all font-medium">{{$news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null }}</a></h3>
                                <p class="font-light text-[#494949] text-[16px] leading-[1.75]">{!! substr($news->blogTranslation->body ?? ($news->blogTranslationEnglish->body ?? null),0,150 ) !!}..</p>
                            </div>
                        </div>

                        @endforeach

                    </div>

                    {{ $newses->links('vendor.pagination.custom') }}
                </div>

            </div>

        </div>
    </section>
    <!-- Popular Properties end -->

</div>
@endsection

