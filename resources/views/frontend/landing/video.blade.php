<!-- Hero section start -->
<div class="pb-[80px] lg:pb-[120px]">
    <div class="container">
    <div class="col-span-12">
                <div class="mb-[60px] text-center">
                    <span class="text-secondary text-tiny inline-block mb-2">GGI Turkey</span>
                    <h2 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium">
                        Who are we<span class="text-secondary">?</span>
                    </h2>
                </div>
            </div>
        <div class="relative">

            <div class="embed-responsive embed-responsive-16by9 relative w-full overflow-hidden" data-relative-input="true">
                <img data-depth="0.1" src="{{asset('images/bg/thumbnail.jpg')}}" class="object-cover rounded-[8px] w-full h-full" width="100%" height="300px" alt="video image">
            </div>
            <a href="https://www.youtube.com/watch?v=T8-umb_0sJA" target="_blank" class="play-button bg-white text-white hover:text-primary absolute left-0 right-0 mx-auto top-1/2 -translate-y-1/2 hover:scale-105 hover:bg-primary w-[55px] h-[55px] flex flex-wrap z-[1] items-center justify-center opacity-100 shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] transition-all rounded-full group before:block before:absolute  before:bg-white before:opacity-80 before:shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] hover:before:bg-primary hover:before:opacity-80 before:w-[70px] before:h-[70px] before:rounded-full before:z-[-1]" aria-label="play button">
                <svg width="35" height="35" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="stroke-primary group-hover:stroke-white" d="M1.63861 10.764V6.70324C1.63861 1.66145 5.20893 -0.403178 9.57772 2.11772L13.1024 4.14812L16.6271 6.17853C20.9959 8.69942 20.9959 12.8287 16.6271 15.3496L13.1024 17.38L9.57772 19.4104C5.20893 21.9313 1.63861 19.8666 1.63861 14.8249V10.764Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>

        <div class="mt-[-45px] lg:mt-[-45px] xl:mt-[-45px] relative z-[2]">
            <div class="container">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 selectricc-border-none">
                        <div class="tab-content bg-white border border-solid border-[#016450] border-opacity-25 rounded-bl-[15px] rounded-br-[15px] rounded-tr-[15px] rounded-tl-[15px]  px-[15px] sm:px-[30px] py-[40px] active">
                            <form action="#fill" method="POST">
                                @csrf
                                <div class="advanced-searrch flex flex-wrap items-center -mb-[45px]">
                                    <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">

                                        <div class="flex-1">
                                            <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{trans('file.name')}}" required>
                                        </div>
                                    </div>

                                    <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">

                                        <div class="flex-1">
                                            <input type="text" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{trans('file.phone')}}" required>
                                        </div>
                                    </div>

                                    <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">


                                        <div class="flex-1">
                                            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{trans('file.email')}}" required>
                                        </div>
                                    </div>

                                    <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] relative">
                                        <button class="search-properties-btn">
                                            {{trans('file.submit')}}
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero section end -->
