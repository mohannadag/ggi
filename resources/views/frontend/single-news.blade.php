@extends('frontend.main')

@section('content')
@include('frontend.includes.header1')


        <!-- Hero section start -->
        <section class="bg-no-repeat bg-center bg-cover bg-[#FFF6F0] h-[350px] lg:h-[513px] flex flex-wrap items-center relative before:absolute before:inset-0 before:content-[''] before:bg-[#000000] before:opacity-[70%]" style="background-image: url('{{asset('frontend/images/breadcrumb/bg-1.png')}}');">
            <div class="container">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="text-center text-white relative">
                            <h1 class="font-lora text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium">{{$news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null }}</h1>
                            <p class="text-base mt-5 max-w-[500px] mx-auto text-center" style="">{{trans('file.news')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Hero section end -->
        @php
        $createdAt = \Carbon\Carbon::parse($news->created_at);
    @endphp
        <!-- Popular Properties start -->
        <section class="popular-properties py-[80px] lg:py-[120px]">
            <div class="container">

                <div class="grid grid-cols-12 mb-[-30px] gap-[30px] xl:gap-[50px]">
                    <div class="col-span-12 md:col-span-6 lg:col-span-8 mb-[30px]">
                        <img src="{{ URL::asset('/images/gallery/'.$news->image) }}" class="w-auto h-auto" loading="lazy" alt="{{$news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null }}" width="770" height="465">
                        <div class="mt-[55px] mb-[35px] blog-body">
                            <span
                                class="block leading-none font-normal text-[18px] text-secondary mb-[15px]">{{$createdAt->toFormattedDateString()}}</span>
                            <h2 class="font-lora leading-tight text-[22px] md:text-[28px] lg:text-[32px] text-primary mb-[10px] font-medium"> {{$news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null }}</h2>

                            <p class="max-w-[767px]">{!! $news->blogTranslation->body ?? $news->blogTranslationEnglish->body  ?? null !!}</p>
                        </div>



                        <div class="flex flex-wrap items-center justify-between mt-[25px] mb-[-15px] pt-[20px] border-t border-[#E0E0E0]">
                            <div class="flex flex-wrap mb-[15px]">
                                <span class="text-secondary">Tags:</span>
                                @foreach($news->tags as $tag)
                                <a class="font-light hover:text-secondary ml-[5px]" href="{{route('tags',$tag)}}">{{$tag->tagTranslation->name ?? $tag->tagTranslationEnglish->name  ?? null }},</a>
                                @endforeach
                            </div>

                            <div class="flex flex-wrap mb-[15px]">
                                <span class="text-secondary">Share:</span>
                                <ul class="inline-flex items-center justify-center">
                                    <li class="ml-[15px]">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank" class="w-[26px] h-[26px] transition-all rounded-full bg-[#E8F1FF] flex items-center justify-center hover:drop-shadow-[0px_4px_10px_rgba(0,0,0,0.25)] text-[#494949] hover:text-[#3B5998]">
                                            <svg width="7" height="12" viewBox="0 0 7 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.36 4.20156V3.12156C4.36 2.65356 4.468 2.40156 5.224 2.40156H6.16V0.601562H4.72C2.92 0.601562 2.2 1.78956 2.2 3.12156V4.20156H0.760002V6.00156H2.2V11.4016H4.36V6.00156H5.944L6.16 4.20156H4.36Z" fill="currentColor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="ml-[15px]">
                                        <a href="https://twitter.com/intent/tweet?url={{url()->current()}}" target="_blank" class="w-[26px] h-[26px] transition-all rounded-full bg-[#E8F1FF] flex items-center justify-center hover:drop-shadow-[0px_4px_10px_rgba(0,0,0,0.25)] text-[#494949] hover:text-[#3B5998]">
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.6667 1.93957C13.1669 2.15783 12.6376 2.30093 12.096 2.36424C12.6645 2.0304 13.092 1.50098 13.2987 0.874908C12.76 1.18846 12.1725 1.40931 11.5607 1.52824C11.303 1.25838 10.9931 1.04383 10.6498 0.897693C10.3065 0.751554 9.93709 0.676884 9.564 0.678241C8.05333 0.678241 6.82866 1.88491 6.82866 3.37157C6.82866 3.58224 6.85266 3.78824 6.89933 3.98491C5.81571 3.93337 4.75474 3.65651 3.78411 3.172C2.81348 2.68749 1.9545 2.00596 1.26199 1.17091C1.01921 1.58051 0.891605 2.04809 0.892662 2.52424C0.893126 2.96955 1.00455 3.40773 1.21685 3.79917C1.42916 4.19061 1.73566 4.52298 2.10866 4.76624C1.67498 4.75224 1.25068 4.63646 0.869995 4.42824V4.46157C0.869995 5.76691 1.81333 6.85557 3.06333 7.10357C2.8284 7.16591 2.58638 7.1975 2.34333 7.19757C2.16666 7.19757 1.99533 7.18091 1.828 7.14757C2.00672 7.68619 2.34873 8.15578 2.80654 8.49113C3.26435 8.82648 3.81522 9.01095 4.38266 9.01891C3.40937 9.7686 2.21454 10.1736 0.985995 10.1702C0.764662 10.1702 0.547328 10.1569 0.333328 10.1329C1.5875 10.9267 3.04172 11.3471 4.52599 11.3449C9.55733 11.3449 12.308 7.24024 12.308 3.68091L12.2987 3.33224C12.8352 2.95469 13.2988 2.4828 13.6667 1.93957Z" fill="currentColor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="ml-[15px]">
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}" target="_blank" class="w-[26px] h-[26px] transition-all rounded-full bg-[#E8F1FF] flex items-center justify-center hover:drop-shadow-[0px_4px_10px_rgba(0,0,0,0.25)] text-[#494949] hover:text-[#3B5998]">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 mt-[70px]">


                        </div>

                    </div>

                    <div class="col-span-12 md:col-span-6 lg:col-span-4 mb-[30px]">
                        <aside class="mb-[-40px]">
                            <div class="mb-[40px]">
                                <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[30px] font-medium">{{trans('file.search')}}<span class="text-secondary">.</span></h3>
                                <form action="#" class="relative">
                                    <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] pr-[45px] pl-[20px] py-[10px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] bg-white" type="text" placeholder="Keywords here...">
                                    <button class="absolute top-1/2 -translate-y-1/2 z-[1] right-[20px]">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.19559 0C8.06048 0 10.3913 2.33078 10.3913 5.19568C10.3913 6.18406 10.1138 7.10865 9.63257 7.89615C12.3593 10.0392 12.6608 10.3403 12.7621 10.442L13.5201 11.2C14.16 11.8398 14.16 12.8807 13.5201 13.5202C13.2004 13.8399 12.78 14 12.36 14C11.94 14 11.5196 13.8399 11.1999 13.5202L10.4419 12.7622C10.341 12.6612 10.0391 12.3594 7.90845 9.625C7.1184 10.1106 6.18908 10.3914 5.19559 10.3914C4.41501 10.3914 3.66434 10.2222 2.96434 9.88896C2.69163 9.75917 2.57569 9.4325 2.70585 9.15979C2.83564 8.88708 3.16231 8.77114 3.43465 8.9013C3.98663 9.16417 4.57908 9.2976 5.19559 9.2976C7.45746 9.2976 9.29751 7.45755 9.29751 5.19568C9.29751 2.9338 7.4571 1.09375 5.19559 1.09375C2.93408 1.09375 1.09366 2.9338 1.09366 5.19568C1.09366 5.93651 1.29309 6.6624 1.67043 7.29458C1.82538 7.5538 1.74043 7.88958 1.48121 8.04453C1.22163 8.19948 0.886212 8.11453 0.731265 7.85531C0.252932 7.05359 -8.96454e-05 6.13411 -8.96454e-05 5.19604C-8.96454e-05 2.33078 2.33069 0 5.19559 0ZM11.2152 11.989L11.9728 12.7469C12.1861 12.9602 12.5332 12.9602 12.7465 12.7469C12.9598 12.5336 12.9598 12.1869 12.7465 11.9736L11.9885 11.2157C11.8532 11.0801 11.2765 10.5798 8.96757 8.76495C8.90522 8.83094 8.84106 8.89547 8.77507 8.95818C10.5845 11.2795 11.0811 11.8544 11.2152 11.989ZM2.43496 3.99911C2.31465 4.2762 2.44189 4.59812 2.71897 4.71844C2.7897 4.74906 2.86371 4.76401 2.93626 4.76401C3.14736 4.76401 3.34861 4.64078 3.4383 4.43479C3.74236 3.73406 4.43215 3.28125 5.19559 3.28125C5.49783 3.28125 5.74246 3.03661 5.74246 2.73438C5.74246 2.43214 5.49783 2.1875 5.19559 2.1875C3.99611 2.1875 2.91257 2.8988 2.43496 3.99911Z" fill="#0b2c3d" />
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            <div class="mb-[40px] flex flex-col">
                                <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[30px] font-medium">{{trans('file.categories')}}<span class="text-secondary">.</span></h3>
                                <div class="block mb-[-25px]">
                                    @foreach($popularTopics as $popularTopic)
                                    <a href="{{route('news.popular-topic',$popularTopic->name)}}" class="font-light leading-[1.75] border border-primary border-opacity-60 rounded-[8px] pr-[20px] pl-[20px] py-[10px] hover:border-[#FD6400] hover:border-opacity-60  hover:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] bg-white flex flex-wrap items-center justify-between mb-[25px]"><span>{{$popularTopic->blogCategoryTranslation->name ?? $popularTopic->blogCategoryTranslationEnglish->name  ?? null }}</span> <span>{{$popularTopic->blogs->count()}}</span></a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-[40px]">
                                <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[30px] font-medium">{{trans('file.latest_posts')}}<span class="text-secondary">.</span></h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-x-[30px] md:gap-x-[0px] relative">
                                    @foreach ($recentlyAddedPosts as $recentlyAddedPost)
                                @php
                                        $createdAt = \Carbon\Carbon::parse($news->created_at);
                                    @endphp
                                    <div class="flex items-center mb-[20px]">
                                        <div class="relative w-[127px]">
                                            <a href="{{route('news.show',$recentlyAddedPost)}}" class="block w-full">
                                                <img src="{{URL::asset('/images/thumbnail/'.$recentlyAddedPost->image)}}" class="w-full" alt="Post">
                                            </a>
                                        </div>

                                        <div class="text-{{ App::isLocale('ar') ? 'right mr-1' : 'left' }} w-[calc(100%-151px)] ml-6">
                                            <span class="block leading-none font-light text-[12px] text-secondary mb-[8px]">{{$createdAt->toFormattedDateString()}}</span>
                                            <h3>
                                                <a href="{{route('news.show',$recentlyAddedPost)}}" class="font-lora text-[16px] leading-[1.285] text-primary hover:text-secondary transition-all">{{$recentlyAddedPost->blogTranslation->title ?? $recentlyAddedPost->blogTranslationEnglish->title  ?? 'title' }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>


                            <div class="mb-[40px]">
                                <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[30px] font-medium">{{trans('file.tags')}}<span class="text-secondary">.</span></h3>
                                <ul class="flex flex-wrap my-[-7px] mx-[-5px] font-light text-[12px]">
                                    @foreach($news->tags as $tag)
                                    <li class="my-[7px] mx-[5px]"><a href="{{route('tags',$tag)}}" class="leading-none border border-[#E0E0E0] py-[8px] px-[10px] block rounded-[4px] hover:text-secondary">{{$tag->tagTranslation->name ?? $tag->tagTranslationEnglish->name  ?? null }}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>

            </div>
        </section>
        <!-- Popular Properties end -->
@endsection
