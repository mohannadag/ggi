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
                {{-- <div class="grid grid-cols-12 mb-[30px] gap-[30px] items-center">
                    <div class="col-span-4 lg:col-span-6">
                        <ul class="grid-tab-menu flex flex-wrap">
                            <li data-grid="grid" class="mr-[10px] leading-none active">
                                <button class="leading-none capitalize transition-all text-[16px] ease-out">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_901_7333)">
                                            <path d="M4.37474 0H0.874735C0.391831 0 0 0.391831 0 0.874735V4.37474C0 4.85764 0.391831 5.24947 0.874735 5.24947H4.37474C4.85764 5.24947 5.24947 4.85764 5.24947 4.37474V0.874735C5.25053 0.391831 4.85764 0 4.37474 0Z" fill="currentcolor" />
                                            <path d="M4.37474 7.87474H0.874735C0.391831 7.87474 0 8.26657 0 8.75053V12.2505C0 12.7334 0.391831 13.1253 0.874735 13.1253H4.37474C4.85764 13.1253 5.24947 12.7334 5.24947 12.2505V8.75053C5.25053 8.26657 4.85764 7.87474 4.37474 7.87474Z" fill="currentcolor" />
                                            <path d="M4.37474 15.7505H0.874735C0.391831 15.7505 0 16.1424 0 16.6253V20.1253C0 20.6082 0.391831 21 0.874735 21H4.37474C4.85764 21 5.24947 20.6082 5.24947 20.1253V16.6253C5.25053 16.1424 4.85764 15.7505 4.37474 15.7505Z" fill="currentcolor" />
                                            <path d="M12.2497 0H8.74973C8.26683 0 7.875 0.391831 7.875 0.874735V4.37474C7.875 4.85764 8.26683 5.24947 8.74973 5.24947H12.2497C12.7326 5.24947 13.1245 4.85764 13.1245 4.37474V0.874735C13.1245 0.391831 12.7326 0 12.2497 0Z" fill="currentcolor" />
                                            <path d="M12.2497 7.87474H8.74973C8.26683 7.87474 7.875 8.26657 7.875 8.74948V12.2495C7.875 12.7324 8.26683 13.1242 8.74973 13.1242H12.2497C12.7326 13.1242 13.1245 12.7324 13.1245 12.2495V8.75054C13.1245 8.26657 12.7326 7.87474 12.2497 7.87474Z" fill="currentcolor" />
                                            <path d="M12.2497 15.7505H8.74973C8.26683 15.7505 7.875 16.1424 7.875 16.6253V20.1253C7.875 20.6082 8.26683 21 8.74973 21H12.2497C12.7326 21 13.1245 20.6082 13.1245 20.1253V16.6253C13.1245 16.1424 12.7326 15.7505 12.2497 15.7505Z" fill="currentcolor" />
                                            <path d="M20.1247 0H16.6247C16.1418 0 15.75 0.391831 15.75 0.874735V4.37474C15.75 4.85764 16.1418 5.24947 16.6247 5.24947H20.1247C20.6076 5.24947 20.9995 4.85764 20.9995 4.37474V0.874735C20.9995 0.391831 20.6076 0 20.1247 0Z" fill="currentcolor" />
                                            <path d="M20.1247 7.87474H16.6247C16.1418 7.87474 15.75 8.26657 15.75 8.74948V12.2495C15.75 12.7324 16.1418 13.1242 16.6247 13.1242H20.1247C20.6076 13.1242 20.9995 12.7324 20.9995 12.2495V8.75054C20.9995 8.26657 20.6076 7.87474 20.1247 7.87474Z" fill="currentcolor" />
                                            <path d="M20.1247 15.7505H16.6247C16.1418 15.7505 15.75 16.1424 15.75 16.6253V20.1253C15.75 20.6082 16.1418 21 16.6247 21H20.1247C20.6076 21 20.9995 20.6082 20.9995 20.1253V16.6253C20.9995 16.1424 20.6076 15.7505 20.1247 15.7505Z" fill="currentcolor" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_901_7333">
                                                <rect width="21" height="21" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </button>
                            </li>
                            <!--<li data-grid="list" class="leading-none">-->
                            <!--    <button class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px] ease-out">-->
                            <!--        <svg width="25" height="19" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                            <!--            <path d="M23.7525 18.6641H7.03597C6.34482 18.6641 5.78906 18.1017 5.78906 17.4052C5.78906 16.71 6.34611 16.1462 7.03597 16.1462H23.7525C24.4411 16.1462 24.9994 16.71 24.9994 17.4052C24.9994 18.103 24.4411 18.6641 23.7525 18.6641Z" fill="currentcolor" />-->
                            <!--            <path d="M23.7525 10.7602H7.03597C6.34482 10.7602 5.78906 10.1965 5.78906 9.5013C5.78906 8.80608 6.34611 8.24236 7.03597 8.24236H23.7525C24.4411 8.24236 24.9994 8.80608 24.9994 9.5013C24.9994 10.1965 24.4411 10.7602 23.7525 10.7602Z" fill="currentcolor" />-->
                            <!--            <path d="M23.7525 2.85378H7.03597C6.34482 2.85378 5.78906 2.29005 5.78906 1.59483C5.78906 0.899617 6.34611 0.335892 7.03597 0.335892H23.7525C24.4411 0.335892 24.9994 0.899617 24.9994 1.59483C24.9994 2.29005 24.4411 2.85378 23.7525 2.85378Z" fill="currentcolor" />-->
                            <!--            <path d="M3.35001 1.69248C3.35001 2.62594 2.60084 3.38235 1.67629 3.38235C0.749175 3.38235 0 2.62594 0 1.69248C0 0.759011 0.749175 0 1.67629 0C2.60084 0 3.35001 0.759011 3.35001 1.69248Z" fill="currentcolor" />-->
                            <!--            <path d="M3.35001 9.5013C3.35001 10.4348 2.60084 11.1912 1.67629 11.1912C0.750464 11.1912 0 10.4348 0 9.5013C0 8.56783 0.749175 7.80882 1.67629 7.80882C2.60084 7.80752 3.35001 8.56653 3.35001 9.5013Z" fill="currentcolor" />-->
                            <!--            <path d="M3.35001 17.3088C3.35001 18.2423 2.60084 18.9987 1.67629 18.9987C0.750464 18.9987 0 18.2423 0 17.3088C0 16.3754 0.749175 15.6163 1.67629 15.6163C2.60084 15.6163 3.35001 16.3754 3.35001 17.3088Z" fill="currentcolor" />-->
                            <!--        </svg>-->
                            <!--    </button>-->
                            <!--</li>-->
                        </ul>
                    </div>
                </div> --}}
                <div id="grid" class="grid grid-tab-content active">
                    <div class="col-span-12">
                        {{-- <div class="grid sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 gap-[30px] get-project"> --}}
                        <table class="w-full">
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
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$property->propertyTranslation->title ?? $property->propertyTranslationEnglish->title ?? null}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$property->property_id}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$property->category->categoryTranslation->name ?? $property->category->categoryTranslationEnglish->name ?? null}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{convert($property->price, $property->currency)}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{route('front.property', ['property' => $property->id])}}" class="flex flex-wrap items-center justify-center   h-[30px] bg-primary text-orange leading-none transition-all hover:bg-secondary text-white text-[12px] rounded" target="_blank">link</a></td>
                                    </tr>


                                {{-- <div class="swiper-slide">
                                    <div class="overflow-hidden rounded-md drop-shadow-[0px_0px_5px_rgba(0,0,0,0.1)] bg-[#FFFDFC] text-center transition-all duration-300 hover:-translate-y-[10px]">
                                        <div class="relative">
                                            <a href="{{ route('front.project', ['property' => $property->id]) }}" class="block"><img src="{!! $property->photo() !!}" class="w-full h-full" loading="lazy" width="370" height="266" alt="{{ $property->propertyTranslation->title ?? ($property->propertyTranslationEnglish->title ?? null) }}"></a>
                                        </div>

                                        <div class="py-[20px] px-[20px] text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                            <h3><a href="{{ route('front.project', ['property' => $property->id]) }}" class="font-lora leading-tight text-[22px] xl:text-[26px] text-primary hover:text-secondary transition-all font-medium">{{$property->title}}</a></h3>
                                            <h4>
                                                <p class="font-light text-[14px] leading-[1.75]">
                                                    {{ $property->country->countryTranslation->name ?? ($property->country->countryTranslationEnglish->name ?? null) }},
                                                    {{ $property->state->stateTranslation->name ?? ($property->state->stateTranslationEnglish->name ?? null) }},
                                                    {{ $property->city->cityTranslation->name ?? ($property->city->cityTranslationEnglish->name ?? null) }}
                                                </p>
                                            </h4>
                                            <span class="font-light text-sm">{{$property->property_id}}</span>
                                            <ul class="flex flex-wrap items-center justify-between text-[12px] mt-[10px] mb-[15px] pb-[10px] border-b border-[#E0E0E0]">
                                                <li class="flex flex-wrap items-center pr-[25px] sm:pr-[5px] md:pr-[25px] border-r border-[#E0DEDE]">
                                                    <svg class="mr-[5px]" width="14" height="14" viewBox="0 0 14 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.8125 9.68709V4.31285C12.111 4.23634 12.384 4.0822 12.6037 3.86607C12.8234 3.64994 12.982 3.37951 13.0634 3.08226C13.1448 2.78501 13.1461 2.47151 13.0671 2.1736C12.9882 1.87569 12.8318 1.60398 12.6139 1.38605C12.396 1.16812 12.1243 1.01174 11.8263 0.932792C11.5284 0.85384 11.2149 0.855126 10.9177 0.936521C10.6204 1.01792 10.35 1.17652 10.1339 1.39623C9.91774 1.61593 9.7636 1.88892 9.68709 2.18747H4.31285C4.23634 1.88892 4.0822 1.61593 3.86607 1.39623C3.64994 1.17652 3.37951 1.01792 3.08226 0.936521C2.78501 0.855126 2.47151 0.85384 2.1736 0.932792C1.87569 1.01174 1.60398 1.16812 1.38605 1.38605C1.16812 1.60398 1.01174 1.87569 0.932792 2.1736C0.85384 2.47151 0.855126 2.78501 0.936521 3.08226C1.01792 3.37951 1.17652 3.64994 1.39623 3.86607C1.61593 4.0822 1.88892 4.23634 2.18747 4.31285V9.68709C1.88892 9.7636 1.61593 9.91774 1.39623 10.1339C1.17652 10.35 1.01792 10.6204 0.936521 10.9177C0.855126 11.2149 0.85384 11.5284 0.932792 11.8263C1.01174 12.1243 1.16812 12.396 1.38605 12.6139C1.60398 12.8318 1.87569 12.9882 2.1736 13.0671C2.47151 13.1461 2.78501 13.1448 3.08226 13.0634C3.37951 12.982 3.64994 12.8234 3.86607 12.6037C4.0822 12.384 4.23634 12.111 4.31285 11.8125H9.68709C9.7636 12.111 9.91774 12.384 10.1339 12.6037C10.35 12.8234 10.6204 12.982 10.9177 13.0634C11.2149 13.1448 11.5284 13.1461 11.8263 13.0671C12.1243 12.9882 12.396 12.8318 12.6139 12.6139C12.8318 12.396 12.9882 12.1243 13.0671 11.8263C13.1461 11.5284 13.1448 11.2149 13.0634 10.9177C12.982 10.6204 12.8234 10.35 12.6037 10.1339C12.384 9.91774 12.111 9.7636 11.8125 9.68709ZM11.375 1.74997C11.548 1.74997 11.7172 1.80129 11.8611 1.89744C12.005 1.99358 12.1171 2.13024 12.1834 2.29012C12.2496 2.45001 12.2669 2.62594 12.2332 2.79568C12.1994 2.96541 12.1161 3.12132 11.9937 3.24369C11.8713 3.36606 11.7154 3.4494 11.5457 3.48316C11.3759 3.51692 11.2 3.49959 11.0401 3.43337C10.8802 3.36714 10.7436 3.25499 10.6474 3.11109C10.5513 2.9672 10.5 2.79803 10.5 2.62497C10.5002 2.39298 10.5925 2.17055 10.7565 2.00651C10.9206 1.84246 11.143 1.7502 11.375 1.74997ZM1.74997 2.62497C1.74997 2.45191 1.80129 2.28274 1.89744 2.13885C1.99358 1.99495 2.13024 1.8828 2.29012 1.81658C2.45001 1.75035 2.62594 1.73302 2.79568 1.76678C2.96541 1.80055 3.12132 1.88388 3.24369 2.00625C3.36606 2.12862 3.4494 2.28453 3.48316 2.45427C3.51692 2.624 3.49959 2.79993 3.43337 2.95982C3.36714 3.1197 3.25499 3.25636 3.11109 3.35251C2.9672 3.44865 2.79803 3.49997 2.62497 3.49997C2.39298 3.49974 2.17055 3.40748 2.00651 3.24343C1.84246 3.07939 1.7502 2.85696 1.74997 2.62497ZM2.62497 12.25C2.45191 12.25 2.28274 12.1987 2.13885 12.1025C1.99495 12.0064 1.8828 11.8697 1.81658 11.7098C1.75035 11.5499 1.73302 11.374 1.76678 11.2043C1.80055 11.0345 1.88388 10.8786 2.00625 10.7563C2.12862 10.6339 2.28453 10.5505 2.45427 10.5168C2.624 10.483 2.79993 10.5003 2.95982 10.5666C3.1197 10.6328 3.25636 10.745 3.35251 10.8888C3.44865 11.0327 3.49997 11.2019 3.49997 11.375C3.49974 11.607 3.40748 11.8294 3.24343 11.9934C3.07939 12.1575 2.85696 12.2497 2.62497 12.25ZM9.68709 10.9375H4.31285C4.23448 10.6367 4.07729 10.3622 3.8575 10.1424C3.63771 9.92265 3.36326 9.76546 3.06247 9.68709V4.31285C3.36324 4.23444 3.63766 4.07724 3.85745 3.85745C4.07724 3.63766 4.23444 3.36324 4.31285 3.06247H9.68709C9.76546 3.36326 9.92265 3.63771 10.1424 3.8575C10.3622 4.07729 10.6367 4.23448 10.9375 4.31285V9.68709C10.6367 9.76542 10.3622 9.92259 10.1424 10.1424C9.92259 10.3622 9.76542 10.6367 9.68709 10.9375ZM11.375 12.25C11.2019 12.25 11.0327 12.1987 10.8888 12.1025C10.745 12.0064 10.6328 11.8697 10.5666 11.7098C10.5003 11.5499 10.483 11.374 10.5168 11.2043C10.5505 11.0345 10.6339 10.8786 10.7563 10.7563C10.8786 10.6339 11.0345 10.5505 11.2043 10.5168C11.374 10.483 11.5499 10.5003 11.7098 10.5666C11.8697 10.6328 12.0064 10.745 12.1025 10.8888C12.1987 11.0327 12.25 11.2019 12.25 11.375C12.2496 11.6069 12.1573 11.8293 11.9933 11.9933C11.8293 12.1573 11.6069 12.2496 11.375 12.25Z" />
                                                    </svg>
                                                    <span>{{ $property->propertyDetails->room_size }} {{trans('file.sq-ft')}}</span>
                                                </li>
                                                <a href="{{ $property->propertyDetails->whatsapp_link }}" class="flex flex-wrap items-center pr-[25px] sm:pr-[5px] md:pr-[25px] border-r border-[#E0DEDE]">
                                                    <i class="fab fa-whatsapp fa-2x"></i>
                                                </a>
                                                <a href="{{$property->propertyDetails->prices_link}}" class="flex flex-wrap items-center pr-[25px] sm:pr-[5px] md:pr-[25px] border-r border-[#E0DEDE]">
                                                    <img class="mr-[5px]" width="20" height="20" viewBox="0 0 14 14" fill="currentColor" src="{{asset('/frontend/images/currency.svg')}}">
                                                </a>
                                                <a href="{{$property->propertyDetails->drive_link}}" class="flex flex-wrap items-center pr-[25px] sm:pr-[5px] md:pr-[25px] border-r border-[#E0DEDE]">
                                                    <img class="mr-[5px]" width="20" height="20" viewBox="0 0 14 14" fill="currentColor" src="{{asset('/frontend/images/drive.svg')}}">
                                                </a>
                                            </ul>

                                            <ul>
                                                <li class="flex flex-wrap items-center justify-between">
                                                    <span class="font-lora text-base text-primary leading-none font-medium">{{ trans('file.starts_from') }}: {{ convert($property->price, $property->currency) }}</span>
                                                    <span class="flex flex-wrap items-center">
                                                        <button class="mr-[15px] text-[#9D9C9C] hover:text-secondary" aria-label="svg">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1667 11.6667C12.8572 11.6667 12.5605 11.7896 12.3417 12.0084C12.1229 12.2272 12 12.5239 12 12.8334C12 13.1428 12.1229 13.4395 12.3417 13.6583C12.5605 13.8771 12.8572 14 13.1667 14C13.4761 14 13.7728 13.8771 13.9916 13.6583C14.2104 13.4395 14.3333 13.1428 14.3333 12.8334C14.3333 12.5239 14.2104 12.2272 13.9916 12.0084C13.7728 11.7896 13.4761 11.6667 13.1667 11.6667ZM11 12.8334C11 12.2587 11.2283 11.7076 11.6346 11.3013C12.0409 10.895 12.592 10.6667 13.1667 10.6667C13.7413 10.6667 14.2924 10.895 14.6987 11.3013C15.1051 11.7076 15.3333 12.2587 15.3333 12.8334C15.3333 13.408 15.1051 13.9591 14.6987 14.3654C14.2924 14.7717 13.7413 15 13.1667 15C12.592 15 12.0409 14.7717 11.6346 14.3654C11.2283 13.9591 11 13.408 11 12.8334Z" fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.26984 1.14667C9.36347 1.24042 9.41606 1.3675 9.41606 1.5C9.41606 1.6325 9.36347 1.75958 9.26984 1.85333L8.4565 2.66667H11.1665C11.8295 2.66667 12.4654 2.93006 12.9343 3.3989C13.4031 3.86774 13.6665 4.50363 13.6665 5.16667V11C13.6665 11.1326 13.6138 11.2598 13.5201 11.3536C13.4263 11.4473 13.2991 11.5 13.1665 11.5C13.0339 11.5 12.9067 11.4473 12.813 11.3536C12.7192 11.2598 12.6665 11.1326 12.6665 11V5.16667C12.6665 4.96968 12.6277 4.77463 12.5523 4.59264C12.4769 4.41065 12.3665 4.24529 12.2272 4.10601C12.0879 3.96672 11.9225 3.85623 11.7405 3.78085C11.5585 3.70547 11.3635 3.66667 11.1665 3.66667H8.45717L9.2705 4.48C9.36154 4.57434 9.41188 4.70067 9.41068 4.83177C9.40948 4.96287 9.35683 5.08825 9.26409 5.18091C9.17134 5.27357 9.04591 5.32609 8.91481 5.32717C8.78371 5.32825 8.65743 5.27779 8.56317 5.18667L6.8965 3.52C6.80287 3.42625 6.75028 3.29917 6.75028 3.16667C6.75028 3.03417 6.80287 2.90708 6.8965 2.81333L8.56317 1.14667C8.65692 1.05303 8.784 1.00044 8.9165 1.00044C9.049 1.00044 9.17609 1.05303 9.26984 1.14667ZM2.83317 4.33333C2.98638 4.33333 3.13809 4.30316 3.27963 4.24453C3.42118 4.1859 3.54979 4.09996 3.65813 3.99162C3.76646 3.88329 3.8524 3.75468 3.91103 3.61313C3.96966 3.47158 3.99984 3.31988 3.99984 3.16667C3.99984 3.01346 3.96966 2.86175 3.91103 2.7202C3.8524 2.57866 3.76646 2.45004 3.65813 2.34171C3.54979 2.23337 3.42118 2.14744 3.27963 2.08881C3.13809 2.03018 2.98638 2 2.83317 2C2.52375 2 2.22701 2.12292 2.00821 2.34171C1.78942 2.5605 1.6665 2.85725 1.6665 3.16667C1.6665 3.47609 1.78942 3.77283 2.00821 3.99162C2.22701 4.21042 2.52375 4.33333 2.83317 4.33333ZM4.99984 3.16667C4.99984 3.7413 4.77156 4.2924 4.36524 4.69873C3.95891 5.10506 3.40781 5.33333 2.83317 5.33333C2.25853 5.33333 1.70743 5.10506 1.30111 4.69873C0.894777 4.2924 0.666504 3.7413 0.666504 3.16667C0.666504 2.59203 0.894777 2.04093 1.30111 1.6346C1.70743 1.22827 2.25853 1 2.83317 1C3.40781 1 3.95891 1.22827 4.36524 1.6346C4.77156 2.04093 4.99984 2.59203 4.99984 3.16667Z" fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.73016 14.8533C6.63653 14.7596 6.58394 14.6325 6.58394 14.5C6.58394 14.3675 6.63653 14.2404 6.73016 14.1467L7.5435 13.3333H4.8335C4.17046 13.3333 3.53457 13.0699 3.06573 12.6011C2.59689 12.1323 2.3335 11.4964 2.3335 10.8333V5C2.3335 4.86739 2.38617 4.74021 2.47994 4.64645C2.57371 4.55268 2.70089 4.5 2.8335 4.5C2.9661 4.5 3.09328 4.55268 3.18705 4.64645C3.28082 4.74021 3.3335 4.86739 3.3335 5V10.8333C3.3335 11.2312 3.49153 11.6127 3.77284 11.894C4.05414 12.1753 4.43567 12.3333 4.8335 12.3333H7.54283L6.7295 11.52C6.68176 11.4739 6.6437 11.4187 6.61752 11.3576C6.59135 11.2966 6.57759 11.231 6.57704 11.1646C6.5765 11.0982 6.58918 11.0324 6.61435 10.971C6.63952 10.9095 6.67667 10.8537 6.72364 10.8068C6.77061 10.7599 6.82645 10.7228 6.88791 10.6977C6.94937 10.6726 7.01521 10.6599 7.0816 10.6605C7.14799 10.6612 7.2136 10.675 7.27459 10.7012C7.33557 10.7274 7.39073 10.7656 7.43683 10.8133L9.1035 12.48C9.19713 12.5738 9.24972 12.7008 9.24972 12.8333C9.24972 12.9658 9.19713 13.0929 9.1035 13.1867L7.43683 14.8533C7.34308 14.947 7.216 14.9996 7.0835 14.9996C6.951 14.9996 6.82391 14.947 6.73016 14.8533Z" fill="currentColor" />
                                                            </svg>
                                                        </button>
                                                        <button class="text-[#9D9C9C] hover:text-secondary" aria-label="svg">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(.clip0_656_640)">
                                                                    <path d="M7.9999 2.74799L7.2829 2.01099C5.5999 0.280988 2.5139 0.877988 1.39989 3.05299C0.876895 4.07599 0.758895 5.55299 1.71389 7.43799C2.63389 9.25299 4.5479 11.427 7.9999 13.795C11.4519 11.427 13.3649 9.25299 14.2859 7.43799C15.2409 5.55199 15.1239 4.07599 14.5999 3.05299C13.4859 0.877988 10.3999 0.279988 8.7169 2.00999L7.9999 2.74799ZM7.9999 15C-7.33311 4.86799 3.27889 -3.04001 7.82389 1.14299C7.88389 1.19799 7.94289 1.25499 7.9999 1.31399C8.05632 1.25504 8.11503 1.19833 8.17589 1.14399C12.7199 -3.04201 23.3329 4.86699 7.9999 15Z" fill="currentColor" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath class="clip0_656_640">
                                                                        <rect width="16" height="16" fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </li>
                                            </ul>


                                        </div>
                                    </div>
                                </div> --}}
                                @endforeach
                            </tbody>
                        </table>
                        {{-- </div> --}}
                    </div>
                </div>
                {{ $properties->links('vendor.pagination.custom') }}
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-4 mb-[30px]">
                <aside class="mb-[-60px] asidebar">
                    {{-- <div class="mb-[40px]">
                        <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[30px] font-medium">Search by Title<span class="text-secondary">.</span></h3>
                        <form class="relative" action="{{route('search.project')}}" method="GET">
                            @csrf
                            <input id="property_name" name="property_name" class="form-control font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] pr-[45px] pl-[20px] py-[10px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] bg-white" type="text" placeholder="{{trans('file.keyword')}}...">
                            <button class="absolute top-1/2 -translate-y-1/2 z-[1] right-[20px]">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.19559 0C8.06048 0 10.3913 2.33078 10.3913 5.19568C10.3913 6.18406 10.1138 7.10865 9.63257 7.89615C12.3593 10.0392 12.6608 10.3403 12.7621 10.442L13.5201 11.2C14.16 11.8398 14.16 12.8807 13.5201 13.5202C13.2004 13.8399 12.78 14 12.36 14C11.94 14 11.5196 13.8399 11.1999 13.5202L10.4419 12.7622C10.341 12.6612 10.0391 12.3594 7.90845 9.625C7.1184 10.1106 6.18908 10.3914 5.19559 10.3914C4.41501 10.3914 3.66434 10.2222 2.96434 9.88896C2.69163 9.75917 2.57569 9.4325 2.70585 9.15979C2.83564 8.88708 3.16231 8.77114 3.43465 8.9013C3.98663 9.16417 4.57908 9.2976 5.19559 9.2976C7.45746 9.2976 9.29751 7.45755 9.29751 5.19568C9.29751 2.9338 7.4571 1.09375 5.19559 1.09375C2.93408 1.09375 1.09366 2.9338 1.09366 5.19568C1.09366 5.93651 1.29309 6.6624 1.67043 7.29458C1.82538 7.5538 1.74043 7.88958 1.48121 8.04453C1.22163 8.19948 0.886212 8.11453 0.731265 7.85531C0.252932 7.05359 -8.96454e-05 6.13411 -8.96454e-05 5.19604C-8.96454e-05 2.33078 2.33069 0 5.19559 0ZM11.2152 11.989L11.9728 12.7469C12.1861 12.9602 12.5332 12.9602 12.7465 12.7469C12.9598 12.5336 12.9598 12.1869 12.7465 11.9736L11.9885 11.2157C11.8532 11.0801 11.2765 10.5798 8.96757 8.76495C8.90522 8.83094 8.84106 8.89547 8.77507 8.95818C10.5845 11.2795 11.0811 11.8544 11.2152 11.989ZM2.43496 3.99911C2.31465 4.2762 2.44189 4.59812 2.71897 4.71844C2.7897 4.74906 2.86371 4.76401 2.93626 4.76401C3.14736 4.76401 3.34861 4.64078 3.4383 4.43479C3.74236 3.73406 4.43215 3.28125 5.19559 3.28125C5.49783 3.28125 5.74246 3.03661 5.74246 2.73438C5.74246 2.43214 5.49783 2.1875 5.19559 2.1875C3.99611 2.1875 2.91257 2.8988 2.43496 3.99911Z" fill="#0b2c3d" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div class="mb-[40px]">
                        <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[30px] font-medium">Search by ID<span class="text-secondary">.</span></h3>
                        <form class="relative" action="{{route('search.project')}}" method="GET">
                            @csrf
                            <input id="property_id" name="property_id" class="form-control font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] pr-[45px] pl-[20px] py-[10px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] bg-white" type="text" placeholder="{{trans('file.keyword')}}...">
                            <button class="absolute top-1/2 -translate-y-1/2 z-[1] right-[20px]">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.19559 0C8.06048 0 10.3913 2.33078 10.3913 5.19568C10.3913 6.18406 10.1138 7.10865 9.63257 7.89615C12.3593 10.0392 12.6608 10.3403 12.7621 10.442L13.5201 11.2C14.16 11.8398 14.16 12.8807 13.5201 13.5202C13.2004 13.8399 12.78 14 12.36 14C11.94 14 11.5196 13.8399 11.1999 13.5202L10.4419 12.7622C10.341 12.6612 10.0391 12.3594 7.90845 9.625C7.1184 10.1106 6.18908 10.3914 5.19559 10.3914C4.41501 10.3914 3.66434 10.2222 2.96434 9.88896C2.69163 9.75917 2.57569 9.4325 2.70585 9.15979C2.83564 8.88708 3.16231 8.77114 3.43465 8.9013C3.98663 9.16417 4.57908 9.2976 5.19559 9.2976C7.45746 9.2976 9.29751 7.45755 9.29751 5.19568C9.29751 2.9338 7.4571 1.09375 5.19559 1.09375C2.93408 1.09375 1.09366 2.9338 1.09366 5.19568C1.09366 5.93651 1.29309 6.6624 1.67043 7.29458C1.82538 7.5538 1.74043 7.88958 1.48121 8.04453C1.22163 8.19948 0.886212 8.11453 0.731265 7.85531C0.252932 7.05359 -8.96454e-05 6.13411 -8.96454e-05 5.19604C-8.96454e-05 2.33078 2.33069 0 5.19559 0ZM11.2152 11.989L11.9728 12.7469C12.1861 12.9602 12.5332 12.9602 12.7465 12.7469C12.9598 12.5336 12.9598 12.1869 12.7465 11.9736L11.9885 11.2157C11.8532 11.0801 11.2765 10.5798 8.96757 8.76495C8.90522 8.83094 8.84106 8.89547 8.77507 8.95818C10.5845 11.2795 11.0811 11.8544 11.2152 11.989ZM2.43496 3.99911C2.31465 4.2762 2.44189 4.59812 2.71897 4.71844C2.7897 4.74906 2.86371 4.76401 2.93626 4.76401C3.14736 4.76401 3.34861 4.64078 3.4383 4.43479C3.74236 3.73406 4.43215 3.28125 5.19559 3.28125C5.49783 3.28125 5.74246 3.03661 5.74246 2.73438C5.74246 2.43214 5.49783 2.1875 5.19559 2.1875C3.99611 2.1875 2.91257 2.8988 2.43496 3.99911Z" fill="#0b2c3d" />
                                </svg>
                            </button>
                        </form>
                    </div> --}}
                    @include('frontend.includes.search-projects')


                    {{-- <div dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}" class="mb-[60px]">
                        <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[40px] font-medium">{{trans('file.featured')}}<span class="text-secondary">.</span></h3>
                        <div class="sidebar-carousel relative">
                            <div class="swiper p-1">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    @foreach ($properties->where('is_featured', 1) as $property)
                                    <div class="swiper-slide">
                                        <div class="overflow-hidden rounded-md drop-shadow-[0px_2px_3px_rgba(0,0,0,0.1)] bg-[#FFFDFC] text-center">
                                            <div class="relative">
                                                <a href="{{ route('front.project', ['property' => $property->id]) }}" class="block">
                                                    <img src="{{ URL::asset('/images/thumbnail/' . $property->thumbnail) }}" class="w-full h-full" loading="lazy" width="370" height="266" alt="@@title">
                                                </a>
                                            </div>

                                            <div class="pt-[15px] pb-[20px] px-[20px] text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
                                                <h3><a href="{{ route('front.project', ['property' => $property->id]) }}" class="font-lora leading-tight text-[18px] text-primary">{{ $property->propertyTranslation->title ?? ($property->propertyTranslationEnglish->title ?? null) }}</a></h3>
                                                <h4 class="leading-none"><a href="{{ route('front.project', ['property' => $property->id]) }}" class="font-light text-[14px] leading-[1.75] text-primary underline">{{ $property->country->countryTranslation->name ?? ($property->country->countryTranslationEnglish->name ?? null) }},
                                                        {{ $property->state->stateTranslation->name ?? ($property->state->stateTranslationEnglish->name ?? null) }},
                                                        {{ $property->city->cityTranslation->name ?? ($property->city->cityTranslationEnglish->name ?? null) }}</a></h4>
                                                <ul class="mt-[10px]">
                                                    <li class="flex flex-wrap items-center justify-between">
                                                        <span class="font-lora text-[14px] text-secondary leading-none">{{trans('file.starts_from')}}: {{ currencyConvert($property->price) }}</span>

                                                        <span class="flex flex-wrap items-center">
                                                            <button class="mr-[15px] text-[#B1AEAE] hover:text-secondary">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1667 11.6667C12.8572 11.6667 12.5605 11.7896 12.3417 12.0084C12.1229 12.2272 12 12.5239 12 12.8334C12 13.1428 12.1229 13.4395 12.3417 13.6583C12.5605 13.8771 12.8572 14 13.1667 14C13.4761 14 13.7728 13.8771 13.9916 13.6583C14.2104 13.4395 14.3333 13.1428 14.3333 12.8334C14.3333 12.5239 14.2104 12.2272 13.9916 12.0084C13.7728 11.7896 13.4761 11.6667 13.1667 11.6667ZM11 12.8334C11 12.2587 11.2283 11.7076 11.6346 11.3013C12.0409 10.895 12.592 10.6667 13.1667 10.6667C13.7413 10.6667 14.2924 10.895 14.6987 11.3013C15.1051 11.7076 15.3333 12.2587 15.3333 12.8334C15.3333 13.408 15.1051 13.9591 14.6987 14.3654C14.2924 14.7717 13.7413 15 13.1667 15C12.592 15 12.0409 14.7717 11.6346 14.3654C11.2283 13.9591 11 13.408 11 12.8334Z" fill="currentColor" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.26984 1.14667C9.36347 1.24042 9.41606 1.3675 9.41606 1.5C9.41606 1.6325 9.36347 1.75958 9.26984 1.85333L8.4565 2.66667H11.1665C11.8295 2.66667 12.4654 2.93006 12.9343 3.3989C13.4031 3.86774 13.6665 4.50363 13.6665 5.16667V11C13.6665 11.1326 13.6138 11.2598 13.5201 11.3536C13.4263 11.4473 13.2991 11.5 13.1665 11.5C13.0339 11.5 12.9067 11.4473 12.813 11.3536C12.7192 11.2598 12.6665 11.1326 12.6665 11V5.16667C12.6665 4.96968 12.6277 4.77463 12.5523 4.59264C12.4769 4.41065 12.3665 4.24529 12.2272 4.10601C12.0879 3.96672 11.9225 3.85623 11.7405 3.78085C11.5585 3.70547 11.3635 3.66667 11.1665 3.66667H8.45717L9.2705 4.48C9.36154 4.57434 9.41188 4.70067 9.41068 4.83177C9.40948 4.96287 9.35683 5.08825 9.26409 5.18091C9.17134 5.27357 9.04591 5.32609 8.91481 5.32717C8.78371 5.32825 8.65743 5.27779 8.56317 5.18667L6.8965 3.52C6.80287 3.42625 6.75028 3.29917 6.75028 3.16667C6.75028 3.03417 6.80287 2.90708 6.8965 2.81333L8.56317 1.14667C8.65692 1.05303 8.784 1.00044 8.9165 1.00044C9.049 1.00044 9.17609 1.05303 9.26984 1.14667ZM2.83317 4.33333C2.98638 4.33333 3.13809 4.30316 3.27963 4.24453C3.42118 4.1859 3.54979 4.09996 3.65813 3.99162C3.76646 3.88329 3.8524 3.75468 3.91103 3.61313C3.96966 3.47158 3.99984 3.31988 3.99984 3.16667C3.99984 3.01346 3.96966 2.86175 3.91103 2.7202C3.8524 2.57866 3.76646 2.45004 3.65813 2.34171C3.54979 2.23337 3.42118 2.14744 3.27963 2.08881C3.13809 2.03018 2.98638 2 2.83317 2C2.52375 2 2.22701 2.12292 2.00821 2.34171C1.78942 2.5605 1.6665 2.85725 1.6665 3.16667C1.6665 3.47609 1.78942 3.77283 2.00821 3.99162C2.22701 4.21042 2.52375 4.33333 2.83317 4.33333ZM4.99984 3.16667C4.99984 3.7413 4.77156 4.2924 4.36524 4.69873C3.95891 5.10506 3.40781 5.33333 2.83317 5.33333C2.25853 5.33333 1.70743 5.10506 1.30111 4.69873C0.894777 4.2924 0.666504 3.7413 0.666504 3.16667C0.666504 2.59203 0.894777 2.04093 1.30111 1.6346C1.70743 1.22827 2.25853 1 2.83317 1C3.40781 1 3.95891 1.22827 4.36524 1.6346C4.77156 2.04093 4.99984 2.59203 4.99984 3.16667Z" fill="currentColor" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.73016 14.8533C6.63653 14.7596 6.58394 14.6325 6.58394 14.5C6.58394 14.3675 6.63653 14.2404 6.73016 14.1467L7.5435 13.3333H4.8335C4.17046 13.3333 3.53457 13.0699 3.06573 12.6011C2.59689 12.1323 2.3335 11.4964 2.3335 10.8333V5C2.3335 4.86739 2.38617 4.74021 2.47994 4.64645C2.57371 4.55268 2.70089 4.5 2.8335 4.5C2.9661 4.5 3.09328 4.55268 3.18705 4.64645C3.28082 4.74021 3.3335 4.86739 3.3335 5V10.8333C3.3335 11.2312 3.49153 11.6127 3.77284 11.894C4.05414 12.1753 4.43567 12.3333 4.8335 12.3333H7.54283L6.7295 11.52C6.68176 11.4739 6.6437 11.4187 6.61752 11.3576C6.59135 11.2966 6.57759 11.231 6.57704 11.1646C6.5765 11.0982 6.58918 11.0324 6.61435 10.971C6.63952 10.9095 6.67667 10.8537 6.72364 10.8068C6.77061 10.7599 6.82645 10.7228 6.88791 10.6977C6.94937 10.6726 7.01521 10.6599 7.0816 10.6605C7.14799 10.6612 7.2136 10.675 7.27459 10.7012C7.33557 10.7274 7.39073 10.7656 7.43683 10.8133L9.1035 12.48C9.19713 12.5738 9.24972 12.7008 9.24972 12.8333C9.24972 12.9658 9.19713 13.0929 9.1035 13.1867L7.43683 14.8533C7.34308 14.947 7.216 14.9996 7.0835 14.9996C6.951 14.9996 6.82391 14.947 6.73016 14.8533Z" fill="currentColor" />
                                                                </svg>
                                                            </button>
                                                            <button class="text-[#B1AEAE] hover:text-secondary">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(.clip0_656_640)">
                                                                        <path d="M7.9999 2.74799L7.2829 2.01099C5.5999 0.280988 2.5139 0.877988 1.39989 3.05299C0.876895 4.07599 0.758895 5.55299 1.71389 7.43799C2.63389 9.25299 4.5479 11.427 7.9999 13.795C11.4519 11.427 13.3649 9.25299 14.2859 7.43799C15.2409 5.55199 15.1239 4.07599 14.5999 3.05299C13.4859 0.877988 10.3999 0.279988 8.7169 2.00999L7.9999 2.74799ZM7.9999 15C-7.33311 4.86799 3.27889 -3.04001 7.82389 1.14299C7.88389 1.19799 7.94289 1.25499 7.9999 1.31399C8.05632 1.25504 8.11503 1.19833 8.17589 1.14399C12.7199 -3.04201 23.3329 4.86699 7.9999 15Z" fill="currentColor" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath class="clip0_656_640">
                                                                            <rect width="16" height="16" fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </button>
                                                        </span>
                                                    </li>
                                                </ul>


                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="flex flex-wrap items-center justify-center mt-[25px]">
                                <div class="swiper-button-{{ App::isLocale('ar') ? 'next' : 'prev' }} w-[26px] h-[26px] rounded-full bg-primary  text-white hover:bg-secondary static mx-[5px] mt-[0px]" style="z-index: 1;">
                                </div>
                                <div class="swiper-button-{{ App::isLocale('ar') ? 'prev' : 'next' }} w-[26px] h-[26px] rounded-full bg-primary  text-white hover:bg-secondary static mx-[5px] mt-[0px]" style="z-index: 1;">
                                </div>

                            </div>

                        </div>

                    </div> --}}

                    {{-- <div class="mb-[60px]">
                        <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[30px] font-medium">Our Agents<span
                            class="text-secondary">.</span></h3>

                        <div class="grid sm:grid-cols-2 lg:grid-cols-2 gap-x-[20px] mb-[-20px]">
                            <!-- single team start -->
                            @foreach($agents->take(2) as $agent)

                            <div class="text-center group mb-[30px]">
                                <div class="relative z-[1] rounded-[6px_6px_0px_0px]">
                                    <a href="{{url('/agents/'.$agent->id)}}" class="block relative before:absolute before:content-[''] before:inset-x-0 before:bottom-0 before:bg-[#016450] before:w-full before:h-[calc(100%_-_30px)] before:z-[-1] before:rounded-[6px_6px_0px_0px]">
                    <img src="{{$agent->photo()}}" class="w-full object-contain block mx-auto" loading="lazy" width="130" height="154" alt="Albert S. Smith">
                    </a>
            </div>

            <div class="bg-[#FFFDFC] drop-shadow-[0px_2px_15px_rgba(0,0,0,0.1)] rounded-[0px_0px_6px_6px] px-[10px] pt-[5px] pb-[15px] border-b-[6px] border-primary transition-all duration-700 group-hover:border-secondary">
                <h3><a href="{{url('/agents/'.$agent->id)}}" class="font-lora text-[14px] text-primary hover:text-secondary">{{$agent->f_name}} {{$agent->l_name}}</a></h3>
                <p class="font-light text-[12px] leading-none capitalize mt-[5px]">{{$agent->title}}</p>
            </div>
        </div>
        @foreach

        <!-- single team end-->
    </div>
    </div> --}}

    {{-- <div class="mb-[60px]">
        <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[40px] font-medium">Tags<span class="text-secondary">.</span></h3>
        <ul class="flex flex-wrap my-[-7px] mx-[-5px] font-light text-[12px]">
            <li class="my-[7px] mx-[5px]"><a href="#" class="leading-none border border-[#E0E0E0] py-[8px] px-[10px] block rounded-[4px] hover:text-secondary">Real Estate</a>
            </li>
            <li class="my-[7px] mx-[5px]"><a href="#" class="leading-none border border-[#E0E0E0] py-[8px] px-[10px] block rounded-[4px] hover:text-secondary">Appartment</a>
            </li>
            <li class="my-[7px] mx-[5px]"><a href="#" class="leading-none border border-[#E0E0E0] py-[8px] px-[10px] block rounded-[4px] hover:text-secondary">Sale Property</a>
            </li>
            <li class="my-[7px] mx-[5px]"><a href="#" class="leading-none border border-[#E0E0E0] py-[8px] px-[10px] block rounded-[4px] hover:text-secondary">Duplex</a>
            </li>
            <li class="my-[7px] mx-[5px]"><a href="#" class="leading-none border border-[#E0E0E0] py-[8px] px-[10px] block rounded-[4px] hover:text-secondary">Buy Property</a>
            </li>
            <li class="my-[7px] mx-[5px]"><a href="#" class="leading-none border border-[#E0E0E0] py-[8px] px-[10px] block rounded-[4px] hover:text-secondary">Houses</a>
            </li>

        </ul>
    </div> --}}
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
