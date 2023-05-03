<div class="container my-24 mx-auto px-6">
    <section class="mb-32 text-neutral-800">
        <div class="grid gap-4 lg:mb-0 lg:grid-cols-2 lg:gap-x-12">
            <div class="mb-12 lg:mb-0">
                <h2 class="mb-6 text-3xl font-bold dark:text-white">
                    Frequently asked questions
                </h2>

                <p class="mb-12 text-neutral-500 dark:text-neutral-200">
                    Didn't find your answer in the FAQ? Contact our sales team.
                </p>

                <form>
                    <div class="grid grid-cols-12 gap-x-[20px] gap-y-[30px]">

                        <div class="col-span-12">
                            <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)]" placeholder="{{trans('file.name')}}" type="text" id="InputName" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)]" placeholder="{{trans('file.phone')}}" name="phone" id="InputPhone" type="tel" name="phone" value="{{ old('phone') }}">
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)]" placeholder="{{trans('file.email')}}" type="email" id="InputEmail" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="col-span-12">
                            <textarea class="h-[196px] font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] resize-none" name="message" cols="30" rows="10" placeholder="{{trans('file.message')}}" id="message"></textarea>
                        </div>

                        <div class="col-span-12 mb-[30px] lg:mb-0  order-2 lg:order-none">
                            <button type="submit" class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[30px] py-[15px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-primary after:rounded-md after:transition-all mb-[30px] lg:mb-0">{{trans('file.contact')}}</button>
                            <p class="form-messege mt-3"></p>
                        </div>
                    </div>
                </form>
            </div>

            <div class="mb-6 md:mb-0">
                <div id="faqModal">
                    @foreach($faqs as $key=>$faq)
                    <div class=" border border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                        <h2 class="accordion-header mb-0" id="heading{{ ++$key }}">
                            <button class="group relative flex w-full items-center border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)] [&[data-te-collapse-collapsed]]:rounded-b-[15px] [&[data-te-collapse-collapsed]]:transition-none" type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                                {{$faq->faqTranslation->question}}
                                <span class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div id="collapse{{ $key }}" class="!visible hidden" data-te-collapse-item aria-labelledby="heading{{ $key }}" data-te-parent="#faqModal">
                            <div class="px-5 py-4">
                            {{$faq->faqTranslation->description}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
