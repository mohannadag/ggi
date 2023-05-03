<!--pagination starts-->
@if ($paginator->hasPages())
<div class="grid-cols-12 mt-[50px] gap-[30px]">
            <div class="col-span-12">
                <ul class="pagination flex flex-wrap items-center justify-center">
                    @if ($paginator->onFirstPage())
                    <li class="mx-2">
                        <a class="flex flex-wrap items-center justify-center  w-[26px] h-[26px] bg-primary rounded-full text-orange leading-none transition-all hover:bg-secondary text-white text-[12px]" href="">
                            <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(.clip0_876_580)">
                                    <path d="M5.8853 10.0592C5.7326 10.212 5.48474 10.212 5.33204 10.0592L0.636322 5.36134C0.48362 5.20856 0.48362 4.96059 0.636322 4.80782L5.33204 0.109909C5.48749 -0.0403413 5.73535 -0.0359829 5.8853 0.119544C6.03181 0.271171 6.03181 0.511801 5.8853 0.663428L1.46633 5.08446L5.8853 9.50573C6.03823 9.65873 6.03823 9.90648 5.8853 10.0592Z" fill="white" />
                                </g>
                                <defs>
                                    <clipPath class="clip0_876_580">
                                        <rect width="5.47826" height="10.1739" fill="white" transform="matrix(-1 0 0 1 6 0)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </li>
                    @else
                    <li class="mx-2">
                        <a class="flex flex-wrap items-center justify-center  w-[26px] h-[26px] bg-primary rounded-full text-orange leading-none transition-all hover:bg-secondary text-white text-[12px]" href="{{ $paginator->previousPageUrl() }}">
                            <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(.clip0_876_580)">
                                    <path d="M5.8853 10.0592C5.7326 10.212 5.48474 10.212 5.33204 10.0592L0.636322 5.36134C0.48362 5.20856 0.48362 4.96059 0.636322 4.80782L5.33204 0.109909C5.48749 -0.0403413 5.73535 -0.0359829 5.8853 0.119544C6.03181 0.271171 6.03181 0.511801 5.8853 0.663428L1.46633 5.08446L5.8853 9.50573C6.03823 9.65873 6.03823 9.90648 5.8853 10.0592Z" fill="white" />
                                </g>
                                <defs>
                                    <clipPath class="clip0_876_580">
                                        <rect width="5.47826" height="10.1739" fill="white" transform="matrix(-1 0 0 1 6 0)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </li>
                    @endif


                        @foreach ($elements as $element)
                            @if (is_string($element))
                                <li class="disabled">{{ $element }}</li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="mx-2 active">
                                            <a class="flex flex-wrap items-center justify-center  w-[26px] h-[26px] leading-none hover:text-secondary">{{ $page }}</a>
                                        </li>
                                    @else
                                    <li class="mx-2 active">
                                        <a class="flex flex-wrap items-center justify-center  w-[26px] h-[26px] leading-none hover:text-secondary" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach




                    @if ($paginator->hasMorePages())
                    <li class="mx-2">
                        <a class="flex flex-wrap items-center justify-center  w-[26px] h-[26px] bg-primary rounded-full text-orange leading-none transition-all hover:bg-secondary text-white text-[12px]" href="{{ $paginator->nextPageUrl() }}">
                            <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(.clip0_876_576)">
                                    <path d="M0.114699 10.0592C0.267401 10.212 0.515257 10.212 0.667959 10.0592L5.36368 5.36134C5.51638 5.20856 5.51638 4.96059 5.36368 4.80782L0.667959 0.109909C0.512505 -0.0403413 0.26465 -0.0359829 0.114699 0.119544C-0.031813 0.271171 -0.031813 0.511801 0.114699 0.663428L4.53367 5.08446L0.114699 9.50573C-0.038233 9.65873 -0.038233 9.90648 0.114699 10.0592Z" fill="white" />
                                </g>
                                <defs>
                                    <clipPath class="clip0_876_576">
                                        <rect width="5.47826" height="10.1739" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </li>
                    @else
                    <li class="mx-2">
                        <a class="flex flex-wrap items-center justify-center  w-[26px] h-[26px] bg-primary rounded-full text-orange leading-none transition-all hover:bg-secondary text-white text-[12px]" href="">
                            <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(.clip0_876_576)">
                                    <path d="M0.114699 10.0592C0.267401 10.212 0.515257 10.212 0.667959 10.0592L5.36368 5.36134C5.51638 5.20856 5.51638 4.96059 5.36368 4.80782L0.667959 0.109909C0.512505 -0.0403413 0.26465 -0.0359829 0.114699 0.119544C-0.031813 0.271171 -0.031813 0.511801 0.114699 0.663428L4.53367 5.08446L0.114699 9.50573C-0.038233 9.65873 -0.038233 9.90648 0.114699 10.0592Z" fill="white" />
                                </g>
                                <defs>
                                    <clipPath class="clip0_876_576">
                                        <rect width="5.47826" height="10.1739" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
@endif
<!--pagination ends-->
