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
<div class="mb-[60px]">
    <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[40px] font-medium">{{trans('search')}}<span class="text-secondary">.</span></h3>
    <form class="relative" action="{{route('search.property')}}" method="GET">

                            @csrf
                            <div class="relative mb-[25px] bg-white">
                                <svg class="absolute top-1/2 -translate-y-1/2 z-[1] left-[20px] pointer-events-none"
                                    width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.16602 12.8333H12.8327" stroke="#0B2C3D" stroke-width="1.5"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M1.7207 12.8333L1.74987 5.81583C1.74987 5.45999 1.91904 5.12169 2.19904 4.90002L6.28237 1.72085C6.70237 1.39418 7.29154 1.39418 7.71737 1.72085L11.8007 4.89418C12.0865 5.11585 12.2499 5.45416 12.2499 5.81583V12.8333"
                                        stroke="#0B2C3D" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M9.04232 6.41666H4.95898C4.47482 6.41666 4.08398 6.8075 4.08398 7.29166V12.8333H9.91732V7.29166C9.91732 6.8075 9.52648 6.41666 9.04232 6.41666Z"
                                        stroke="#0B2C3D" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.83398 9.47916V10.3542" stroke="#0B2C3D" stroke-width="1.5"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.125 4.375H7.875" stroke="#0B2C3D" stroke-width="1.5"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <select name="state" id="state"
                                    class="nice-select font-light w-full h-[45px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] pl-[40px] pr-[20px] py-[8px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] bg-white appearance-none cursor-pointer">
                                    @if(App::isLocale('ar'))
                                    @if(old('state', request()->state) != NULL)
                                    <option value="{{old('state', request()->state)}}">{{DB::table('state_translations')->where('locale', 'ar')->where('state_id', old('state', request()->state))->value('name')}}</option>
                                    @else
                                    <option value="">{{trans('file.select_city')}}</option>
                                   @endif
                                   @else
                                   @if(old('state', request()->state) != NULL)
                                    <option value="{{old('state', request()->state)}}">{{DB::table('state_translations')->where('locale', 'en')->where('state_id', old('state', request()->state))->value('name')}}</option>
                                    @else
                                    <option value="">{{trans('file.select_city')}}</option>
                                    @endif
                                    @endif


                                    @foreach ($states->where('status', 1) as $state)
                                    <option value="{{ $state->id }}">
                                        {{ $state->stateTranslation->name ?? ($state->stateTranslationEnglish->name ??
                                        null) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative mb-[25px] bg-white">

                                <select name="city_id" id="city_id"
                                    class="nice-select select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                    @if(App::isLocale('ar'))
                                    @if(old('city_id', request()->city_id) != NULL)
                                    <option value="{{old('city_id', request()->city_id)}}">{{DB::table('city_translations')->where('locale', 'ar')->where('city_id', old('city_id', request()->city_id))->value('name');}}</option>
                                    @else
                                    <option value="">{{trans('file.select_area')}}</option>
                                   @endif
                                   @else
                                    @if(old('city_id', request()->city_id) != NULL)
                                    <option value="{{old('city_id', request()->city_id)}}">{{DB::table('city_translations')->where('locale', 'en')->where('city_id', old('city_id', request()->city_id))->value('name');}}</option>
                                    @else
                                    <option value="">{{trans('file.select_area')}}</option>
                                    @endif
                                    @endif
                                    @foreach ($city->where('status', 1) as $city)
                                    <option value="{{ $city->id }}">
                                        {{ $city->cityTranslation->name ?? ($city->cityTranslationEnglish->name ?? null)
                                        }}
                                    </option>
                                    @endforeach
                                </select>

                                <svg class="absolute top-1/2 -translate-y-1/2 z-[1] left-[20px] pointer-events-none"
                                    width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.39648 6.41666H8.60482" stroke="#016450" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path d="M7 8.02083V4.8125" stroke="#016450" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path
                                        d="M2.11231 4.9525C3.26148 -0.0991679 10.7456 -0.0933345 11.889 4.95833C12.5598 7.92167 10.7165 10.43 9.10064 11.9817C7.92814 13.1133 6.07314 13.1133 4.89481 11.9817C3.28481 10.43 1.44148 7.91583 2.11231 4.9525Z"
                                        stroke="#0B2C3D" stroke-width="1.5" />
                                </svg>
                            </div>
                            <div class="relative mb-[25px] bg-white">
                                <svg class="absolute top-1/2 -translate-y-1/2 z-[1] left-[20px] pointer-events-none"
                                    width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_928_754)">
                                        <path
                                            d="M4.64311 0H0V4.64311H4.64311V0ZM3.71437 3.71437H0.928741V0.928741H3.71437V3.71437Z"
                                            fill="#0B2C3D" />
                                        <path
                                            d="M8.35742 0V4.64311H13.0005V0H8.35742ZM12.0718 3.71437H9.28616V0.928741H12.0718V3.71437Z"
                                            fill="#0B2C3D" />
                                        <path
                                            d="M0 13H4.64311V8.35689H0V13ZM0.928741 9.28563H3.71437V12.0713H0.928741V9.28563Z"
                                            fill="#0B2C3D" />
                                        <path
                                            d="M8.35742 13H13.0005V8.35689H8.35742V13ZM9.28616 9.28563H12.0718V12.0713H9.28616V9.28563Z"
                                            fill="#0B2C3D" />
                                        <path
                                            d="M6.96437 0H6.03563V6.03563H0V6.96437H6.03563V13H6.96437V6.96437H13V6.03563H6.96437V0Z"
                                            fill="#0B2C3D" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_928_754">
                                            <rect width="13" height="13" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <select id="category_id" name="category_id"
                                    class="nice-select font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body borderborder-[#1B2D40] border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary border-primary pl-[40px] pr-[20px] py-[8px] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] bg-white appearance-none cursor-pointer">
                                    @if(App::isLocale('ar'))
                                    @if(old('category_id', request()->category_id) != NULL)
                                    <option value="{{old('category_id', request()->category_id)}}">{{DB::table('category_translations')->where('locale', 'ar')->where('category_id', old('category_id', request()->category_id))->value('name');}}</option>
                                    @else
                                    <option value="">{{trans('file.property_type')}}</option>
                                   @endif
                                    @else
                                    @if(old('category_id', request()->category_id) != NULL)
                                    <option value="{{old('category_id', request()->category_id)}}">{{DB::table('category_translations')->where('locale', 'en')->where('category_id', old('category_id', request()->category_id))->value('name');}}</option>
                                    @else
                                    <option value="">{{trans('file.property_type')}}</option>
                                    @endif
                                    @endif
                                    @foreach ($categories->where('status', 1) as $category)

                                    <option value="{{ $category->id }}"> {{ $category->categoryTranslation->name ??
                                        ($category->categoryTranslationEnglish->name ?? null) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative mb-[25px] bg-white">
                                <svg class="absolute -translate-y-1/2 z-[1] left-[20px] pointer-events-none" width="16"
                                    height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.78125 9.55323C5.78125 10.4132 6.44125 11.1066 7.26125 11.1066H8.93458C9.64792 11.1066 10.2279 10.4999 10.2279 9.75323C10.2279 8.9399 9.87458 8.65323 9.34792 8.46657L6.66125 7.53323C6.13458 7.34657 5.78125 7.0599 5.78125 6.24657C5.78125 5.4999 6.36125 4.89323 7.07458 4.89323H8.74792C9.56792 4.89323 10.2279 5.58657 10.2279 6.44657" stroke="#0B2C3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8 4V12" stroke="#0B2C3D" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M7.9987 14.6667C11.6806 14.6667 14.6654 11.6819 14.6654 8C14.6654 4.3181 11.6806 1.33333 7.9987 1.33333C4.3168 1.33333 1.33203 4.3181 1.33203 8C1.33203 11.6819 4.3168 14.6667 7.9987 14.6667Z" stroke="#0B2C3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="price-slider" style="margin: 0px 0px 0px 50px;">
                                    <div class="flex-1">
                                        <div class="price-slider">
                                            <div class="price-slider" id="price-slider"></div>
                                            <input id="minPrice" name="minPrice" value="{{old('minPrice', request()->minPrice)}}" class="price-slider-input font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="text">
                                            <input id="maxPrice" name="maxPrice" value="{{old('maxPrice', request()->maxPrice)}}" class="price-slider-input font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="bedroom" class="relative mb-[25px] bg-white">
                                <svg class="absolute top-1/2 -translate-y-1/2 z-[1] left-[20px] pointer-events-none"
                                    width="14" height="10" viewBox="0 0 14 10" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.0002 4.18665V2.33331C13.0002 1.23331 12.1002 0.333313 11.0002 0.333313H8.3335C7.82016 0.333313 7.3535 0.533313 7.00016 0.853313C6.64683 0.533313 6.18016 0.333313 5.66683 0.333313H3.00016C1.90016 0.333313 1.00016 1.23331 1.00016 2.33331V4.18665C0.593496 4.55331 0.333496 5.07998 0.333496 5.66665V9.66665H1.66683V8.33331H12.3335V9.66665H13.6668V5.66665C13.6668 5.07998 13.4068 4.55331 13.0002 4.18665ZM8.3335 1.66665H11.0002C11.3668 1.66665 11.6668 1.96665 11.6668 2.33331V3.66665H7.66683V2.33331C7.66683 1.96665 7.96683 1.66665 8.3335 1.66665ZM2.3335 2.33331C2.3335 1.96665 2.6335 1.66665 3.00016 1.66665H5.66683C6.0335 1.66665 6.3335 1.96665 6.3335 2.33331V3.66665H2.3335V2.33331ZM1.66683 6.99998V5.66665C1.66683 5.29998 1.96683 4.99998 2.3335 4.99998H11.6668C12.0335 4.99998 12.3335 5.29998 12.3335 5.66665V6.99998H1.66683Z">
                                    </path>
                                </svg>
                                <select name="bed" id="bed"
                                    class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer" multiple>
                                    @if(old('bed', request()->bed) == '1')
                                    <option value="1">1+0</option>
                                    @endif
                                    @if(old('bed', request()->bed) == '2')
                                    <option value="2">1+1</option>
                                    @endif
                                    @if(old('bed', request()->bed) == '3')
                                    <option value="3">2+1</option>
                                    @endif
                                    @if(old('bed', request()->bed) == '4')
                                    <option value="4">3+1</option>
                                    @endif
                                    @if(old('bed', request()->bed) == '5')
                                    <option value="5">4+1</option>
                                    @endif
                                    @if(old('bed', request()->bed) == '6')
                                    <option value="6">5+1</option>
                                    @endif
                                    @if(old('bed', request()->bed) == '7')
                                    <option value="7">6+1</option>
                                    @endif
                                    @if(old('bed', request()->bed) == '8')
                                    <option value="8">7+1</option>
                                    @endif
                                    @if(old('bed', request()->bed) == '9')
                                    <option value="9">8+1</option>
                                    @else
                                    <option value="">{{trans('file.bedrooms')}}</option>
                                    @endif
                                    <option value="1">1+0</option>
                                    <option value="2">1+1</option>
                                    <option value="3">2+1</option>
                                    <option value="4">3+1</option>
                                    <option value="5">4+1</option>
                                    <option value="6">5+1</option>
                                    <option value="7">6+1</option>
                                    <option value="8">7+1</option>
                                    <option value="9">8+1</option>
                                </select>
                            </div>
                            <div id="bathroom" class="relative mb-[25px] bg-white">
                                <svg class="absolute top-1/2 -translate-y-1/2 z-[1] left-[20px] pointer-events-none"
                                    width="14" height="14" viewBox="0 0 14 14" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.6875 7.65627H2.1875V2.7344C2.18699 2.54904 2.22326 2.36543 2.29419 2.19418C2.36512 2.02294 2.46932 1.86746 2.60075 1.73676L2.61168 1.72582C2.81765 1.52015 3.0821 1.38309 3.36889 1.33336C3.65568 1.28362 3.95083 1.32364 4.21403 1.44795C3.96546 1.86122 3.86215 2.34571 3.9205 2.82443C3.97885 3.30315 4.19552 3.74864 4.53608 4.0901L4.83552 4.38954L4.28436 4.94073L4.90304 5.55941L5.4542 5.00825L8.5082 1.95431L9.05937 1.40314L8.44066 0.78443L7.88946 1.3356L7.59002 1.03616C7.23151 0.678646 6.75892 0.458263 6.2546 0.413412C5.75029 0.368561 5.24622 0.502086 4.83025 0.790719C4.3916 0.513704 3.87178 0.394114 3.35619 0.451596C2.84059 0.509078 2.35987 0.740213 1.993 1.10703L1.98207 1.11797C1.76912 1.32975 1.6003 1.58165 1.48537 1.85911C1.37044 2.13657 1.31168 2.43407 1.3125 2.7344V7.65627H0.4375V8.53127H1.3125V9.37072C1.31248 9.44126 1.32386 9.51133 1.34619 9.57823L2.16016 12.02C2.20359 12.1508 2.28712 12.2645 2.39887 12.345C2.51062 12.4256 2.64491 12.4689 2.78266 12.4688H3.1354L2.81641 13.5625H3.72786L4.04688 12.4688H9.73711L10.0652 13.5625H10.9785L10.6504 12.4688H11.2172C11.355 12.4689 11.4893 12.4256 11.6011 12.3451C11.7129 12.2645 11.7964 12.1508 11.8398 12.02L12.6538 9.57823C12.6761 9.51133 12.6875 9.44126 12.6875 9.37072V8.53127H13.5625V7.65627H12.6875ZM5.15484 1.65486C5.3959 1.41433 5.72254 1.27924 6.06308 1.27924C6.40362 1.27924 6.73026 1.41433 6.97132 1.65486L7.2707 1.95431L5.45429 3.77072L5.15484 3.47134C4.91432 3.23027 4.77924 2.90364 4.77924 2.5631C4.77924 2.22256 4.91432 1.89593 5.15484 1.65486ZM11.8125 9.33518L11.0597 11.5938H2.94033L2.1875 9.33518V8.53127H11.8125V9.33518Z">
                                    </path>
                                </svg>
                                <select name="bath" id="bath"
                                    class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                    @if(old('bath', request()->bath) != NULL)
                                    <option value="{{old('bath', request()->bath)}}">{{old('bath',
                                        request()->bath)}}</option>
                                    @else
                                    <option value="">{{trans('file.bath')}}</option>
                                    @endif
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>


                            <button type="submit"
                                class="block z-[1] before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:z-[-1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[30px] py-[12px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:z-[-2] after:bg-primary after:rounded-md after:transition-all">{{trans('file.search')}}</button>

                        </form>
</div>
