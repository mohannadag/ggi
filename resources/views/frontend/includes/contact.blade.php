<!-- Contact Us section start -->
<section class="contact-us-section pb-[80px] lg:pb-[120px]">
    <div class="container">
        <div class="grid grid-cols-12 gap-x-[30px] mb-[-30px] items-end">
            <div class="col-span-12 lg:col-span-5 mb-[30px] text-center">
                <div class="lg:mr-[20px] xl:mr-[120px]">
                    <div class="relative rounded-[6px_6px_0px_0px]">
                        <div class="scene absolute top-[80px] right-[-70px] z-20" data-relative-input="true">
                            <img data-depth="0.2" src="{{asset('frontend/images/interior/star.png')}}" alt="star icon image" loading="lazy" width="119" height="107" />
                        </div>
                        <a href="#" class="block relative before:absolute before:content-[''] before:inset-x-0 before:bottom-0 before:w-full before:h-[calc(100%_-_60px)] before:z-[-1] before:rounded-[6px_6px_0px_0px]">
                            <img src="{{asset('frontend/images/about/about1.png')}}" class="w-auto h-auto block mx-auto" loading="lazy" alt="Albert S. Smith" width="301" height="474">
                        </a>
                    </div>

                    <div class="bg-[#FFFDFC] drop-shadow-[0px_2px_15px_rgba(0,0,0,0.1)] rounded-[0px_0px_6px_6px] px-[15px] py-[20px] border-b-[6px] border-secondary">
                        <h3><a href="https://wa.me/905373539567" target="_blank" class="font-lora font-normal text-[18px] lg:text-[28px] leading-none text-primary transition-all hover:text-secondary">Golden Group Investment</a></h3>
                        <a href="https://wa.me/905373539567" target="_blank" class="text-primary transition-all hover:text-secondary text-[14px]">Phone +90 537 353 95 67</a>
                    </div>


                </div>
            </div>
            <div class="col-span-12 lg:col-span-7 mb-[30px]">
                {{-- <span class="text-secondary text-tiny capitalize inline-block mb-[15px]">Our Agent</span> --}}
                <h2 class="font-lora text-primary text-[24px] sm:text-[30px] leading-[1.277] xl:text-xl capitalize mb-[15px] font-medium">
                    {{trans('file.contact_us')}}<span class="text-secondary">.</span></h2>

                <p class="max-w-[460px]">{{trans('file.contact_desc')}}</p>

                <div class="mt-[50px]">
                    <form id="contact_form" action="#" class="grid grid-cols-12 gap-x-[20px] gap-y-[30px]">

                        <div class="col-span-12 md:col-span-6">
                            <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " placeholder="{{trans('file.fname')}}" type="text" id="fName" name="fname" value="{{ old('fname') }}">
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " placeholder="{{trans('file.lname')}}" type="text" id="lName" name="lname" value="{{ old('lname') }}">
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="text" placeholder="{{trans('file.phone')}}" name="phone" id="InputPhone" type="tel" name="phone" value="{{ old('phone') }}">
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="email" placeholder="{{trans('file.email')}}" id="InputEmail" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <div class="relative">
                                <select class="nice-select form-select" id="category" name="category">
                                    @if(App::isLocale('ar'))
                                    @if(old('category', request()->category) != NULL)
                                        <option value="{{old('category', request()->category)}}">{{DB::table('category_translations')->where('locale', 'ar')->where('category_id', old('category', request()->category))->value('name')}}</option>
                                    @else
                                        <option value="">{{trans('file.property_type')}}</option>
                                    @endif
                                    @else
                                        @if(old('category', request()->category) != NULL)
                                            <option value="{{old('category', request()->category)}}">{{DB::table('category_translations')->where('locale', 'en')->where('category_id', old('category', request()->category))->value('name')}}</option>
                                        @else
                                            <option value="">{{trans('file.property_type')}}</option>
                                        @endif
                                    @endif
                                    @foreach ($categories->where('status', 1) as $category)

                                        <option value="{{ $category->categoryTranslation->name ?? ($category->categoryTranslationEnglish->name ?? null) }}">
                                            {{ $category->categoryTranslation->name ?? ($category->categoryTranslationEnglish->name ?? null) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <div class="relative">
                                <select class="nice-select form-select" name="location" id="location">
                                    @if(App::isLocale('ar'))
                                    @if(old('location', request()->location) != NULL)
                                    <option value="{{old('location', request()->location)}}">{{DB::table('state_translations')->where('locale', 'ar')->where('state_id', old('location', request()->location))->value('name')}}</option>
                                    @else
                                    <option value="">{{trans('file.select_city')}}</option>
                                   @endif
                                   @else
                                   @if(old('location', request()->location) != NULL)
                                    <option value="{{old('location', request()->location)}}">{{DB::table('state_translations')->where('locale', 'en')->where('state_id', old('location', request()->location))->value('name')}}</option>
                                    @else
                                    <option value="">{{trans('file.select_city')}}</option>
                                    @endif
                                    @endif


                                    @foreach ($states->where('status', 1) as $state)
                                    <option value="{{ $state->stateTranslation->name ?? ($state->stateTranslationEnglish->name ?? null) }}">
                                        {{ $state->stateTranslation->name ?? ($state->stateTranslationEnglish->name ??
                                        null) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " placeholder="{{trans('file.max-price')}}" type="number" id="mPrice" name="mPrice" value="{{ old('maxPrice') }}">
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " placeholder="{{trans('file.number-of-bedrooms')}}" type="number" id="numberOfBedrooms" name="numberOfBedrooms" value="{{ old('numberOfBedrooms') }}">
                        </div>

                        {{-- <div class="col-span-12">
                            <textarea class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] resize-none" name="textarea" placeholder="{{trans('file.message')}}" id="message" cols="30" rows="2"></textarea>
                        </div> --}}

                        <div class="col-span-12">
                            <button style="width:100%" type="submit" class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[30px] py-[15px] capitalize font-medium text-white block text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-primary after:rounded-md after:transition-all">
                                {{trans('file.contact')}}
                            </button>
                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us section End -->

@push('script')
    <script type="text/javascript">
        $('#contact_form').on('submit', function(e) {
            e.preventDefault();
            $('.v7').text("Submitting...");
            $('.v7').prop('disabled', true);
            let fname = $('#fName').val();
            let lname = $('#lName').val();
            let email = $('#InputEmail').val();
            let phone = $('#InputPhone').val();
            let type = $('#category').val();
            let state = $('#location').val();
            let maxPrice = $('#mPrice').val();
            let numberOfBedrooms = $('#numberOfBedrooms').val();
            console.log(maxPrice);
            // let message = $('#message').val();
            $.ajax({
                url: "{{ route('contact-full') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    fname: fname,
                    lname: lname,
                    email: email,
                    phone: phone,
                    type: type,
                    state: state,
                    maxPrice: maxPrice,
                    numberOfBedrooms : numberOfBedrooms,
                    // message: message,
                },
                success: function(response) {
                    // $('#successMsg').show();
                    // console.log(response);
                    $('#fName').val("");
                    $('#lName').val("");
                    $('#InputEmail').val("");
                    $('#InputPhone').val("");
                    $('#message').val("");
                    $('#category').val("");
                    $('#location').val("");
                    $('#mPrice').val("");
                    $('#numberOfBedrooms').val("");
                    $('.v7').text("Send Message");
                    $('.v7').prop('disabled', false);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Thanks for contacting us!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                },
                error: function(response) {
                    $('#nameErrorMsg').text(response.responseJSON.errors.name);
                    $('#emailErrorMsg').text(response.responseJSON.errors.email);
                    $('#phoneErrorMsg').text(response.responseJSON.errors.phone);
                    $('#messageErrorMsg').text(response.responseJSON.errors.message);

                    $('#nameErrorMsg').delay(3200).fadeOut(300);
                    $('#emailErrorMsg').delay(3200).fadeOut(300);
                    $('#phoneErrorMsg').delay(3200).fadeOut(300);
                    $('#messageErrorMsg').delay(3200).fadeOut(300);

                    $('.v7').text("Send Message");
                    $('.v7').prop('disabled', false);

                },
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
