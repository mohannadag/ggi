<div>
    <!-- Container for demo purpose -->
    <div>
        <!-- Section: Design Block -->
        <section>
            <div class="bg-neutral-50 px-6 py-12 text-center text-neutral-800 md:px-12 lg:text-left">
                <div class="w-100 mx-auto sm:max-w-2xl md:max-w-3xl lg:max-w-5xl xl:max-w-7xl xl:px-32">
                    <div class="grid items-center gap-12 lg:grid-cols-2">
                        <div class="lg:mt-0">
                            <h1 class="mb-5 font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium">
                                {{$citizenship->citizenshipTranslation->title}} <br /><span class="text-secondary">for your business</span>
                            </h1>
                            <a class="mr-2 inline-block rounded bg-primary px-7 py-3 text-sm font-medium uppercase leading-snug text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg" data-te-ripple-init data-te-ripple-color="light" href="#!" role="button">Get started</a>
                            <a class="inline-block rounded bg-transparent px-7 py-3 text-sm font-medium uppercase leading-snug text-primary transition duration-150 ease-in-out hover:bg-neutral-100 hover:text-primary-700 focus:bg-neutral-100 focus:outline-none focus:ring-0 active:bg-neutral-200" data-te-ripple-init data-te-ripple-color="light" href="#!" role="button">Learn more</a>
                        </div>
                        <div class="mb-12 lg:mb-0">
                            <img src="https://www.imtilak.net/assets/img/turkish-wallet.png" class="w-full sm:mb-10 lg:mb-24" alt="" />
                        </div>
                    </div>
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
        </section>
        <!-- Section: Design Block -->
    </div>
    <!-- Container for demo purpose -->
</div>
