<style>
    .price-slider {
      margin-right: 10px;
      font-size: 16px;
    }
    .price-slider-input {
      width: 100px;
      margin-top: 10px;
      font-size: 13px;
    }
</style>
<div id="SearchModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div id="modello" class="relative w-full max-w-2xl md:h-auto px-[40px] py-33333 bg-contain bg-right-top bg-no-repeat">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="px-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{trans('file.search')}}</h3>

                <div class="mb-[60px]">
                <form class="relative" action="{{route('search.property')}}" method="GET">

                    @csrf
                    <div class="relative mb-[25px]">
                        <select name="state" id="state" data-te-select-init>
                            <option value="0">{{trans('file.select_city')}}</option>
                            @foreach ($states->where('status', 1) as $state)
                            <option value="{{ $state->id }}">
                                {{ $state->stateTranslation->name ?? ($state->stateTranslationEnglish->name ?? null) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative mb-[25px]">
                        <select name="city_id" id="city_id" class="nice-select select appearance-none bg-transparent text-tiny font-light cursor-pointer" >
                            <option value="">{{trans('file.select_area')}}</option>
                            @foreach ($city->where('status', 1) as $city)
                            <option value="{{ $city->id }}">
                                {{ $city->cityTranslation->name ?? ($city->cityTranslationEnglish->name ?? null) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative mb-[25px] bg-white">
                        <select id="category_id" name="category_id" class="nice-select font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body borderborder-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary border-primary pl-[40px] pr-[20px] py-[8px] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] bg-white appearance-none cursor-pointer">
                            <option value="">{{ trans('file.property_type') }}</option>
                            @foreach ($categories->where('status', 1) as $category)

                            <option value="{{ $category->id }}"> {{ $category->categoryTranslation->name ?? ($category->categoryTranslationEnglish->name ?? null) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative mb-[25px] bg-white">
                        <svg class="absolute -translate-y-1/2 z-[1]  pointer-events-none" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.78125 9.55323C5.78125 10.4132 6.44125 11.1066 7.26125 11.1066H8.93458C9.64792 11.1066 10.2279 10.4999 10.2279 9.75323C10.2279 8.9399 9.87458 8.65323 9.34792 8.46657L6.66125 7.53323C6.13458 7.34657 5.78125 7.0599 5.78125 6.24657C5.78125 5.4999 6.36125 4.89323 7.07458 4.89323H8.74792C9.56792 4.89323 10.2279 5.58657 10.2279 6.44657" stroke="#0B2C3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8 4V12" stroke="#0B2C3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.9987 14.6667C11.6806 14.6667 14.6654 11.6819 14.6654 8C14.6654 4.3181 11.6806 1.33333 7.9987 1.33333C4.3168 1.33333 1.33203 4.3181 1.33203 8C1.33203 11.6819 4.3168 14.6667 7.9987 14.6667Z" stroke="#0B2C3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="price-slider" style="margin: 0px 0px 0px 30px;">
                            <div class="flex-1">
                                <div class="price-slider">
                                    <div class="price-slider" id="price-sliderr"></div>
                                    <input id="minPricee" name="minPrice" class="price-slider-input font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="text">
                                    <input id="maxPricee" name="maxPrice" class="price-slider-input font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="bed" class="relative mb-[25px] bg-white">
                        <select name="bed" id="bed" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                            <option value="">{{trans('file.bedrooms')}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                    <div id="bath" class="relative mb-[25px] bg-white">
                        <select name="bath" id="bath" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                            <option value="">{{trans('file.bath')}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>


                    <button type="submit" class="z-[1] mb-10 before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:z-[-1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[30px] py-[12px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:z-[-2] after:bg-primary after:rounded-md after:transition-all">{{trans('file.search')}}</button>
                    <button data-modal-hide="SearchModal" type="button" class="z-[1] before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:z-[-1] before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[30px] py-[12px] capitalize font-medium text-black text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:z-[-2] after:bg-transparent after:rounded-md after:transition-all">{{trans('file.close')}}</button>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
<script>
    $("#closeBtn").click(function() {
        $('#SearchModal').hide();
    })


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
