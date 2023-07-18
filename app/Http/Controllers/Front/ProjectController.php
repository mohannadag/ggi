<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\PopUpMail;
use App\Models\Units;
use Illuminate\Support\Facades\Mail;
use App\Models\Category;
use App\Models\City;
use App\Models\Currency;
use App\Models\Property;
use App\Models\PropertyDetail;
use App\Models\User;
use App\Models\PropertyTranslation;
use App\Models\StateTranslation;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\ViewModels\IPropertySearchModel;
use App\Repositories\IPropertySearchRepository;

class ProjectController extends Controller
{
    private $_propertySearchModel;
    private $_propertySearchRepository;

    public function __construct(IPropertySearchModel $propertySearchModel,IPropertySearchRepository $properties)
    {

        $this->middleware('auth');

        Session::put('currentLocal', 'en');
        App::setLocale('en');

        $this->_propertySearchModel = $propertySearchModel;
        $this->_propertySearchRepository = $properties;
    }

    public function currency($id)
    {
        Session::put('currency', $id);
        cache()->forget('session_currency');
        return redirect()->back();
    }

    public function index(Request $request)
    {
        // $user = auth()->user();



        // if (Session::has('currency'))
        // {
        //   $curr = Currency::find(Session::get('currency'));
        // }
        // else
        // {
        //     $curr = Currency::where('is_default','=',1)->first();
        // }
        // App::setLocale(Session::get('currentLocal'));
        // Session::get('currentLocal');
        // $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        //     ->where('status',1)
        //     ->orderBy('id','desc')
        //     ->paginate(6);
        // $city = City::with('cityTranslation')->get()->keyBy('id');
        // $states = State::with('stateTranslation')->get()->keyBy('id');
        // $maxPrice = $properties->max('price');
        // $minPrice = $properties->min('price');
        // $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        // $agents = User::where('type','user')->get();
        // $maxArea = $propertyDetails->max('room_size');
        // $minArea = $propertyDetails->min('room_size');
        // $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');

        // return view('frontend.projects',compact('properties','city','minPrice','maxPrice','minArea','maxArea','categories', 'states', 'agents'));
        // $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        // ->where('moderation_status',1)
        // ->where('type', 'rent')
        // ->where('status',1)
        // ->orderBy('id','desc')
        // ->paginate(4);
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->get()->keyBy('id');
        // $maxPrice = $props->max('price');
        // $minPrice = $props->min('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        // $maxArea = $propertyDetails->max('room_size');
        // $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        //Poperty Search
        $properties = $this->_propertySearchModel->getData($request);
        $units = Units::all();
        // $data = $request->all();
        return view('frontend.projects',compact('properties','city','categories', 'states', 'units'));

    }

    public function searchProjects(Request $request)
    {
        $properties = Property::with('propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image')
            ->where('title', 'LIKE', '%' . $request->search . '%')->where('status', 'approved')->get();

        if (count($properties) > 0) {
            foreach ($properties as $property) {
                $html = '
                <div class="swiper-slide get-project">
                    <div class="overflow-hidden rounded-md drop-shadow-[0px_0px_5px_rgba(0,0,0,0.1)] bg-[#FFFDFC] text-center transition-all duration-300 hover:-translate-y-[10px]">
                        <div class="relative">
                        <a href="' . route('front.project', $property->id) . '" class="block"><img src="images/thumbnail/' . $property->photo . '" class="w-full h-full" loading="lazy" width="370" height="266" alt="' . $property->propertyTranslation->title .'"></a>
                        <div class="py-[20px] px-[20px] text-left">
                        <h3><a href="' . route('front.project', $property->id) . '" class="font-lora leading-tight text-[22px] xl:text-[26px] text-primary hover:text-secondary transition-all font-medium">' . $property->propertyTranslation->title .'</a></h3>
                        <h4>
                        <p class="font-light text-[14px] leading-[1.75]">'. $property->country->countryTranslation->name .', '. $property->state->stateTranslation->name .', '. $property->city->cityTranslation->name .'</p>
                        </h4>
                        <span class="font-light text-sm">' . $property->property_id .'</span>

                        <ul class="flex flex-wrap items-center justify-between text-[12px] mt-[10px] mb-[15px] pb-[10px] border-b border-[#E0E0E0]">
                <li class="flex flex-wrap items-center pr-[25px] sm:pr-[5px] md:pr-[25px] border-r border-[#E0DEDE]">
                    <svg class="mr-[5px]" width="14" height="14" viewBox="0 0 14 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.8125 9.68709V4.31285C12.111 4.23634 12.384 4.0822 12.6037 3.86607C12.8234 3.64994 12.982 3.37951 13.0634 3.08226C13.1448 2.78501 13.1461 2.47151 13.0671 2.1736C12.9882 1.87569 12.8318 1.60398 12.6139 1.38605C12.396 1.16812 12.1243 1.01174 11.8263 0.932792C11.5284 0.85384 11.2149 0.855126 10.9177 0.936521C10.6204 1.01792 10.35 1.17652 10.1339 1.39623C9.91774 1.61593 9.7636 1.88892 9.68709 2.18747H4.31285C4.23634 1.88892 4.0822 1.61593 3.86607 1.39623C3.64994 1.17652 3.37951 1.01792 3.08226 0.936521C2.78501 0.855126 2.47151 0.85384 2.1736 0.932792C1.87569 1.01174 1.60398 1.16812 1.38605 1.38605C1.16812 1.60398 1.01174 1.87569 0.932792 2.1736C0.85384 2.47151 0.855126 2.78501 0.936521 3.08226C1.01792 3.37951 1.17652 3.64994 1.39623 3.86607C1.61593 4.0822 1.88892 4.23634 2.18747 4.31285V9.68709C1.88892 9.7636 1.61593 9.91774 1.39623 10.1339C1.17652 10.35 1.01792 10.6204 0.936521 10.9177C0.855126 11.2149 0.85384 11.5284 0.932792 11.8263C1.01174 12.1243 1.16812 12.396 1.38605 12.6139C1.60398 12.8318 1.87569 12.9882 2.1736 13.0671C2.47151 13.1461 2.78501 13.1448 3.08226 13.0634C3.37951 12.982 3.64994 12.8234 3.86607 12.6037C4.0822 12.384 4.23634 12.111 4.31285 11.8125H9.68709C9.7636 12.111 9.91774 12.384 10.1339 12.6037C10.35 12.8234 10.6204 12.982 10.9177 13.0634C11.2149 13.1448 11.5284 13.1461 11.8263 13.0671C12.1243 12.9882 12.396 12.8318 12.6139 12.6139C12.8318 12.396 12.9882 12.1243 13.0671 11.8263C13.1461 11.5284 13.1448 11.2149 13.0634 10.9177C12.982 10.6204 12.8234 10.35 12.6037 10.1339C12.384 9.91774 12.111 9.7636 11.8125 9.68709ZM11.375 1.74997C11.548 1.74997 11.7172 1.80129 11.8611 1.89744C12.005 1.99358 12.1171 2.13024 12.1834 2.29012C12.2496 2.45001 12.2669 2.62594 12.2332 2.79568C12.1994 2.96541 12.1161 3.12132 11.9937 3.24369C11.8713 3.36606 11.7154 3.4494 11.5457 3.48316C11.3759 3.51692 11.2 3.49959 11.0401 3.43337C10.8802 3.36714 10.7436 3.25499 10.6474 3.11109C10.5513 2.9672 10.5 2.79803 10.5 2.62497C10.5002 2.39298 10.5925 2.17055 10.7565 2.00651C10.9206 1.84246 11.143 1.7502 11.375 1.74997ZM1.74997 2.62497C1.74997 2.45191 1.80129 2.28274 1.89744 2.13885C1.99358 1.99495 2.13024 1.8828 2.29012 1.81658C2.45001 1.75035 2.62594 1.73302 2.79568 1.76678C2.96541 1.80055 3.12132 1.88388 3.24369 2.00625C3.36606 2.12862 3.4494 2.28453 3.48316 2.45427C3.51692 2.624 3.49959 2.79993 3.43337 2.95982C3.36714 3.1197 3.25499 3.25636 3.11109 3.35251C2.9672 3.44865 2.79803 3.49997 2.62497 3.49997C2.39298 3.49974 2.17055 3.40748 2.00651 3.24343C1.84246 3.07939 1.7502 2.85696 1.74997 2.62497ZM2.62497 12.25C2.45191 12.25 2.28274 12.1987 2.13885 12.1025C1.99495 12.0064 1.8828 11.8697 1.81658 11.7098C1.75035 11.5499 1.73302 11.374 1.76678 11.2043C1.80055 11.0345 1.88388 10.8786 2.00625 10.7563C2.12862 10.6339 2.28453 10.5505 2.45427 10.5168C2.624 10.483 2.79993 10.5003 2.95982 10.5666C3.1197 10.6328 3.25636 10.745 3.35251 10.8888C3.44865 11.0327 3.49997 11.2019 3.49997 11.375C3.49974 11.607 3.40748 11.8294 3.24343 11.9934C3.07939 12.1575 2.85696 12.2497 2.62497 12.25ZM9.68709 10.9375H4.31285C4.23448 10.6367 4.07729 10.3622 3.8575 10.1424C3.63771 9.92265 3.36326 9.76546 3.06247 9.68709V4.31285C3.36324 4.23444 3.63766 4.07724 3.85745 3.85745C4.07724 3.63766 4.23444 3.36324 4.31285 3.06247H9.68709C9.76546 3.36326 9.92265 3.63771 10.1424 3.8575C10.3622 4.07729 10.6367 4.23448 10.9375 4.31285V9.68709C10.6367 9.76542 10.3622 9.92259 10.1424 10.1424C9.92259 10.3622 9.76542 10.6367 9.68709 10.9375ZM11.375 12.25C11.2019 12.25 11.0327 12.1987 10.8888 12.1025C10.745 12.0064 10.6328 11.8697 10.5666 11.7098C10.5003 11.5499 10.483 11.374 10.5168 11.2043C10.5505 11.0345 10.6339 10.8786 10.7563 10.7563C10.8786 10.6339 11.0345 10.5505 11.2043 10.5168C11.374 10.483 11.5499 10.5003 11.7098 10.5666C11.8697 10.6328 12.0064 10.745 12.1025 10.8888C12.1987 11.0327 12.25 11.2019 12.25 11.375C12.2496 11.6069 12.1573 11.8293 11.9933 11.9933C11.8293 12.1573 11.6069 12.2496 11.375 12.25Z" />
                    </svg>
                    <span>'. $property->propertyDetails->room_size .'</span>
                </li>
                <a href="'. $property->propertyDetails->whatsapp_link . '" class="flex flex-wrap items-center pr-[25px] sm:pr-[5px] md:pr-[25px] border-r border-[#E0DEDE]">
                    <i class="fab fa-whatsapp fa-2x"></i>
                </a>
                <a href="' . $property->propertyDetails->prices_link . '" class="flex flex-wrap items-center pr-[25px] sm:pr-[5px] md:pr-[25px] border-r border-[#E0DEDE]">
                    <img class="mr-[5px]" width="20" height="20" viewBox="0 0 14 14" fill="currentColor">
                </a>
                <a href="' . $property->propertyDetails->drive_link . '}}" class="flex flex-wrap items-center pr-[25px] sm:pr-[5px] md:pr-[25px] border-r border-[#E0DEDE]">
                    <img class="mr-[5px]" width="20" height="20" viewBox="0 0 14 14" fill="currentColor">
                </a>
            </ul>

            <ul>
                <li class="flex flex-wrap items-center justify-between">
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
</div>


            ';
                echo $html;
            }
        } else {
            $html = '<div class="post-item">
                        <h1>No Results Found!</h1>
                     </div>';
            echo $html;
        }
    }

    public function singleProject(Property $property, Request $request)
    {
        if (Session::has('currency'))
        {
          $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }
        $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('status',1)
            ->orderBy('id','desc')
            ->paginate(4);
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $maxPrice = $props->max('price');
        $minPrice = $props->min('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
        $thumbnail = Property::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        //Poperty Search
        $properties = $this->_propertySearchModel->getData($request);
        $data = $request->all();

        $properties = Property::with(['facilities.facilityTranslation', 'units.unitsTranslation','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','propertyTranslationEnglish','image','propertyDetails'])->where('moderation_status',1)->get();
        $locale   = Session::get('currentLocal');
        $propertyTranslation = PropertyTranslation::where('locale',$locale)->get()->keyBy('property_id');
        $propertyTranslationEnglish = PropertyTranslation::where('locale','en')->get()->keyBy('property_id');
        return view('frontend.project',compact('property','properties','propertyTranslation','propertyTranslationEnglish', 'states', 'city','minPrice','maxPrice','minArea','maxArea','categories', 'thumbnail', 'curr'));
    }

    public function searchProperties(Request $request)
    {
        $properties = Property::whereHas('propertyTranslation', function($query) use ($request){ $query->where('title','LIKE','%'.$request->search.'%');})
            ->orderBy('id','desc')
            ->get();
    if(count($properties)>0)
    {
        foreach($properties as $property)
        {
            $html = '
            <div class="single-property-box">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="property-item">
                            <a class="property-img" href="'.route('front.property',['property'=>$property->id]).'">
                                <img src="images/thumbnail/'.$property->thumbnail.'">
                            </a>
                            <ul class="feature_text">
                                '.($property->is_featured == 1 ? "<li class=\"feature_cb\"><span> Featured</span></li>" : "").'
                                '.($property->type == "sale" ? "<li class=\"feature_or\"><span>For Sale</span></li>" : "").'
                                '.($property->type == "rent" ? "<li class=\"feature_or\"><span>For Rent</span></li>" : "").'
                            </ul>
                            <div class="property-author-wrap">
                                <a href="#" class="property-author">
                                   <img src="images/users/'.$property->user->image.'">
                                    <span>'.$property->user->f_name.' '.$property->user->l_name.'</span>
                                </a>
                                <a href=".photo-gallery" class="btn-gallery" data-toggle="tooltip" data-placement="top" title="Photos"><i class="lnr lnr-camera"></i></a>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="property-title-box">
                            <h4><a href="'.route('front.property',['property'=>$property->id]).'">'.$property->propertyTranslation->title
                .'</a></h4>
                            <div class="property-location">
                                <i class="la la-map-marker-alt"></i>
                                <p>'.$property->country->countryTranslation->name.','.$property->state->stateTranslation->name.','.$property->city->cityTranslation->name.'</p>
                            </div>
                            <ul class="property-feature">
                                <li> <i class="las la-bed"></i>
                                    <span>'.$property->propertyDetails->bed.' Bedrooms</span>
                                </li>
                                <li> <i class="las la-bath"></i>
                                    <span>'.$property->propertyDetails->bath.' Bath</span>
                                </li>
                                <li> <i class="las la-arrows-alt"></i>
                                    <span>'.$property->propertyDetails->room_size.' sq ft</span>
                                </li>
                                <li> <i class="las la-car"></i>
                                    <span>'.$property->propertyDetails->garage.' Garage</span>
                                </li>
                            </ul>
                            <div class="trending-bottom">
                                <div class="trend-left float-left">
                                    <ul class="product-rating">
                                        <li><i class="las la-star"></i></li>
                                        <li><i class="las la-star"></i></li>
                                        <li><i class="las la-star"></i></li>
                                        <li><i class="las la-star-half-alt"></i></li>
                                        <li><i class="las la-star-half-alt"></i></li>
                                    </ul>
                                </div>
                                <a class="trend-right float-right">
                                    <div class="trend-open">
                                        <p><span class="per_sale">starts from</span>$'.$property->price.'</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            ';

            echo $html;
        }
    }else{
        $html = '<div class="row">
                <h3>No Results Found!</h3>
                 </div>
                ';
        echo $html;
    }

    }

    public function rent(Request $request, State $state)
    {

        $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('moderation_status',1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->paginate(4);
    $city = City::with('cityTranslation')->get()->keyBy('id');
    $states = State::with('stateTranslation')->get()->where('state_id', $state->id)->keyBy('id');
    $maxPrice = $props->max('price');
    $minPrice = $props->min('price');
    $propertyDetails = PropertyDetail::get()->keyBy('property_id');
    $maxArea = $propertyDetails->max('room_size');
    $minArea = $propertyDetails->min('room_size');
    $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
    //Poperty Search
    $properties = $this->_propertySearchModel->getData($request);
    $data = $request->all();
        App::setLocale(Session::get('currentLocal'));
        Session::get('currentLocal');
        $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('moderation_status',1)
            ->where('status',1)
            ->where('type','rent')
            ->orderBy('id','desc')
            ->paginate(4);
        return view('frontend.properties-rent',compact('properties', 'city','minPrice','maxPrice','minArea','maxArea','categories', 'states'));
    }
    public function sale(Request $request, State $state)
    {

        $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('moderation_status',1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->paginate(4);
    $city = City::with('cityTranslation')->get()->keyBy('id');
    $states = State::with('stateTranslation')->get()->where('state_id', $state->id)->keyBy('id');
    $maxPrice = $props->max('price');
    $minPrice = $props->min('price');
    $propertyDetails = PropertyDetail::get()->keyBy('property_id');
    $maxArea = $propertyDetails->max('room_size');
    $minArea = $propertyDetails->min('room_size');
    $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
    //Poperty Search
    $properties = $this->_propertySearchModel->getData($request);
    $data = $request->all();
        App::setLocale(Session::get('currentLocal'));
        Session::get('currentLocal');
        $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('moderation_status',1)
            ->where('status',1)
            ->where('type','sale')
            ->orderBy('id','desc')
            ->paginate(4);
        return view('frontend.properties-sale',compact('properties', 'city','minPrice','maxPrice','minArea','maxArea','categories', 'states'));
    }

    public function getAllProperties()
    {
        $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('moderation_status',1)
            ->orderBy('id','desc')
            ->get();

        return $properties;
    }

    public function city(City $city, Request $request)
    {

        $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('moderation_status',1)
            ->where('status',1)
            ->orderBy('id','desc')
            ->paginate(4);
        $cit = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->get()->keyBy('id');
        $maxPrice = $props->max('price');
        $minPrice = $props->min('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $properties = $this->_propertySearchModel->getData($request);
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
//        dd($city->properties);
        return view('frontend.properties-city',compact('city','properties', 'maxPrice','minPrice','maxArea','minArea','maxArea','cit','categories', 'states'));
    }

    public function state(State $state, Request $request, Category $category)
    {
        $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
                        ->where('moderation_status',1)
                        ->where('status',1)
                        ->orderBy('id','desc')
                        ->paginate(4);
        $city = City::with('cityTranslation')->get()->where('state_id', $state->id)->keyBy('id');
        $stat = State::with('stateTranslation')->get()->where('state_id', $state->id)->keyBy('id');
        $states = State::with('stateTranslation')->get()->where('state_id', $state->id)->keyBy('id');
        $maxPrice = $props->max('price');
        $minPrice = $props->min('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        //Poperty Search
        $properties = $this->_propertySearchModel->getData($request);
        $locale   = Session::get('currentLocal');
        $stateTranslation = StateTranslation::where('locale',$locale)->get()->where('state_id', $state->id)->keyBy('state_id');
        $stateTranslationEnglish = StateTranslation::where('locale','en')->get()->where('state_id', $state->id)->keyBy('state_id');
        $data = $request->all();
                $category = Category::where('name',$category)->first();
                App::setLocale(Session::get('currentLocal'));
                Session::get('currentLocal');
                $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
                    ->where('moderation_status',1)
                    ->where('state_id', $state->id)
                    ->orderBy('id','desc')
                    ->paginate(4);
            return view('frontend.properties-state',compact('properties', 'city','minPrice','maxPrice','minArea','maxArea','categories', 'state', 'states'));
    }


    public function category($category, Request $request)
    {
        $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('moderation_status',1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->paginate(4);
    $city = City::with('cityTranslation')->get()->keyBy('id');
    $maxPrice = $props->max('price');
    $minPrice = $props->min('price');
    $propertyDetails = PropertyDetail::get()->keyBy('property_id');
    $maxArea = $propertyDetails->max('room_size');
    $minArea = $propertyDetails->min('room_size');
    $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
    //Poperty Search
    $properties = $this->_propertySearchModel->getData($request);
    $data = $request->all();
            $category = Category::where('name',$category)->first();
            App::setLocale(Session::get('currentLocal'));
            Session::get('currentLocal');
            $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
                ->where('moderation_status',1)
                ->where('category_id',$category->id)
                ->orderBy('id','desc')
                ->paginate(4);
            return view('frontend.properties-category',compact('properties', 'city','minPrice','maxPrice','minArea','maxArea','categories'));
    }


    public function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = City::where('name', 'LIKE', "%{$query}%")->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->name.','.$row->state->name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

    public function getByCategory($categoryId)
    {
        $data = [];
        $data['category'] = $categoryId;
        return $this->_propertySearchRepository->getByCategory($data);
    }
    public function getByType($type)
    {
        $data = [];
        $data['category'] = $type;
        return $this->_propertySearchRepository->getByType($data);
    }

    public function getByCity($cityId)
    {
        $data = [];
        $data['city'] = $cityId;
        return $this->_propertySearchRepository->getByCity($data);
    }

    public function getByPrice($minPrice,$maxPrice)
    {
        $data = [];
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        return $this->_propertySearchRepository->getByPrice($data);
    }

    public function getByArea($minArea,$maxArea)
    {
        $data = [];
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByArea($data);
    }

    public function getByCategoryCity($categoryId,$cityId, $request)
    {
        $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('moderation_status',1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->paginate(4);
    $city = City::with('cityTranslation')->get()->keyBy('id');
    $maxPrice = $props->max('price');
    $minPrice = $props->min('price');
    $propertyDetails = PropertyDetail::get()->keyBy('property_id');
    $maxArea = $propertyDetails->max('room_size');
    $minArea = $propertyDetails->min('room_size');
    $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
    //Poperty Search
    $properties = $this->_propertySearchModel->getData($request);
    $data = $request->all();

        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        return $this->_propertySearchRepository->getByCategoryCity($data);
    }

    public function getByCategoryPrice($categoryId,$minPrice,$maxPrice)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        return $this->_propertySearchRepository->getByCategoryPrice($data);
    }
    public function getByCategoryArea($categoryId,$minArea,$maxArea)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByCategoryArea($data);
    }
    public function getByCityPrice($cityId,$minPrice,$maxPrice)
    {
        $data = [];
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        return $this->_propertySearchRepository->getByCityPrice($data);
    }
    public function getByCityArea($cityId,$minArea,$maxArea)
    {
        $data = [];
        $data['city'] = $cityId;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByCityArea($data);
    }
    public function getByPriceArea($minPrice,$maxPrice,$minArea,$maxArea)
    {
        $data = [];
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByPriceArea($data);
    }
    public function getByBedBath($bed,$bath)
    {
        $data = [];
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByBedBath($data);
    }

    public function getByCategoryCityPrice($categoryId,$cityId,$minPrice,$maxPrice)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        return $this->_propertySearchRepository->getByCategoryCityPrice($data);
    }
    public function getByCategoryCityArea($categoryId,$cityId,$minArea,$maxArea)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByCategoryCityArea($data);
    }
    public function getByCategoryPriceArea($categoryId,$minPrice,$maxPrice,$minArea,$maxArea)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByCategoryPriceArea($data);
    }
    public function getByCityPriceArea($cityId,$minPrice,$maxPrice,$minArea,$maxArea)
    {
        $data = [];
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByCityPriceArea($data);
    }
    public function getByCategoryCityPriceArea($categoryId,$cityId,$minPrice,$maxPrice,$minArea,$maxArea)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByCategoryCityPriceArea($data);
    }

    public function getByBed($bed)
    {
        $data = [];
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByBed($data);
    }

    public function getByBath($bath)
    {
        $data = [];
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByBath($data);
    }

    public function getByCategoryBed($categoryId,$bed)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByCategoryBed($data);
    }

    public function getByCategoryBath($categoryId,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryBath($data);
    }

    public function getByCategoryBedBath($categoryId,$bed,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryBedBath($data);
    }

    public function getByCityBed($cityId,$bed)
    {
        $data = [];
        $data['city'] = $cityId;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByCityBed($data);
    }

    public function getByCityBath($cityId,$bath)
    {
        $data = [];
        $data['city'] = $cityId;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCityBath($data);
    }

    public function getByCityBedBath($cityId,$bed,$bath)
    {
        $data = [];
        $data['city'] = $cityId;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCityBedBath($data);
    }


    public function getByPriceBed($minPrice,$maxPrice,$bed)
    {
        $data = [];
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByPriceBed($data);
    }

    public function getByPriceBath($minPrice,$maxPrice,$bath)
    {
        $data = [];
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByPriceBath($data);
    }

    public function getByPriceBedBath($minPrice,$maxPrice,$bed,$bath)
    {
        $data = [];
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByPriceBedBath($data);
    }

    public function getByAreaBed($minArea,$maxArea,$bed)
    {
        $data = [];
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByAreaBed($data);
    }

    public function getByAreaBath($minArea,$maxArea,$bath)
    {
        $data = [];
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByAreaBath($data);
    }

    public function getByAreaBedBath($minArea,$maxArea,$bed,$bath)
    {
        $data = [];
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByAreaBedBath($data);
    }


    public function getByCategoryCityBed($categoryId,$cityId,$bed)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByCategoryCityBed($data);
    }

    public function getByCategoryCityBath($categoryId,$cityId,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityBath($data);
    }

    public function getByCategoryCityBedBath($categoryId,$cityId,$bed,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityBedBath($data);
    }
    public function getByCategoryCityPriceBed($categoryId,$cityId,$minPrice,$maxPrice,$bed)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByCategoryCityPriceBed($data);
    }
    public function getByCategoryCityPriceBath($categoryId,$cityId,$minPrice,$maxPrice,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityPriceBath($data);
    }
    public function getByCategoryCityPriceBedBath($categoryId,$cityId,$minPrice,$maxPrice,$bed,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityPriceBedBath($data);
    }


    public function getByCategoryCityAreaBed($categoryId,$cityId,$minArea,$maxArea,$bed)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByCategoryCityAreaBed($data);
    }
    public function getByCategoryCityAreaBath($categoryId,$cityId,$minArea,$maxArea,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityAreaBath($data);
    }
    public function getByCategoryCityAreaBedBath($categoryId,$cityId,$minArea,$maxArea,$bed,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityAreaBedBath($data);
    }
    public function getByCategoryCityPriceAreaBedBath($categoryId,$cityId,$minPrice,$maxPrice,$minArea,$maxArea,$bed,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityPriceAreaBedBath($data);
    }
    public function getByCityName($cityName)
    {
        $data = [];
        $data['title'] = $cityName;
        return $this->_propertySearchRepository->getByCityName($data);
    }

    public function getByStateName($stateName)
    {
        $data = [];
        $data['title'] = $stateName;
        return $this->_propertySearchRepository->getByStateName($data);
    }

    public function photo()
    {
        if (file_exists( public_path().'/storage/thumbnail/'.$this->thumbnail)) {
            return 'images/property/property_1.jpg';
        } else {
            return 'images/property/property_1.jpg';
        }
    }

    public function switchCurrency($currency)
    {
        Session::put('currency', $currency);
        return redirect()->back();
    }

    function send(Request $request)
    {
        $data = array(
            'name'      =>  $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
        );

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new PopUpMail($data));
        return back()->with('message', 'Thanks for contacting us!');

    }
}
