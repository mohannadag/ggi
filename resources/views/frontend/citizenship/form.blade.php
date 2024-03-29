<section class="">
    <div class="container px-6 py-12">
        <div class="g-6 flex flex-wrap items-center justify-center lg:justify-between">
            <!-- Left column container with background-->
            <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
                <img src="{{ URL::asset('/images/images/pass.png') }}" class="w-full sm:mb-10 lg:mb-24" alt="turkish citizenship" />
                {{-- <img src="" class="w-full" alt="Phone image" /> --}}
            </div>

            <!-- Right column container with form -->
            <div class="md:w-8/12 lg:ml-6 lg:w-5/12">
                <div class="mt-12 lg:mt-0">
                    <h1 class="mb-12 text-5xl font-bold leading-tight tracking-tight text-primary dark:text-white">
                        {{trans('file.consult')}}
                    </h1>
                    <p class="text-neutral-600 dark:text-neutral-200">
                        {{trans('file.description')}}
                    </p>
                </div>
                <form action="#" class="grid grid-cols-12 gap-x-[20px] gap-y-[30px]">


                    <div class="col-span-12 md:col-span-12">
                        <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="text" name="name" placeholder="{{trans('file.name')}}">
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="email" name="email" placeholder="{{trans('file.email')}}">
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] phoneInput" type="tel" name="phone" placeholder="{{trans('file.phone')}}">
                    </div>

                    <div class="col-span-12">
                        <textarea class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] resize-none" name="textarea" id="textarea" cols="5" rows="4" placeholder="{{trans('file.message')}}"></textarea>
                    </div>
                    <div class="col-span-12">
                        <button type="submit" class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[30px] py-[15px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-primary after:rounded-md after:transition-all">
                            {{trans('file.submit')}}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>



{{-- <section class="">
    <div class="container h-full px-6 py-24">
        <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
            <!-- Left column container with background-->
            <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
                <img src="{{ URL::asset('/images/images/' . $citizenship->file) }}" class="w-full" alt="Phone image" />
            </div>

            <!-- Right column container with form -->
            <div class="md:w-8/12 lg:ml-6 lg:w-5/12">
                <div class="mt-12 lg:mt-0">
                    <h1 class="mb-12 text-5xl font-bold leading-tight tracking-tight text-primary dark:text-white">
                        Consult with GGI Turkey
                    </h1>
                    <p class="text-neutral-600 dark:text-neutral-200">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Eveniet, itaque accusantium odio, soluta.
                    </p>
                </div>
                <form action="#" class="grid grid-cols-12 gap-x-[20px] gap-y-[30px]">


                    <div class="col-span-12 md:col-span-12">
                        <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="text" name="name" placeholder="Name">
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="email" name="email" placeholder="Email">
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="tel" name="phone" placeholder="Phone">
                    </div>

                    <div class="col-span-12">
                        <textarea class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] resize-none" name="textarea" id="textarea" cols="5" rows="4" placeholder="Description"></textarea>
                    </div>
                    <div class="col-span-12">
                        <button type="submit" class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[30px] py-[15px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-primary after:rounded-md after:transition-all">Contact
                            us</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section> --}}
