<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\HeaderImage;
use App\Models\Image;
use App\Models\OurPartner;
use App\Models\Tag;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Property;
use App\Models\PropertyDetail;
use App\Models\PropertyTranslation;
use App\Models\SiteInfo;
use Illuminate\Support\Facades\Session;
use App\Models\Country;
use App\Models\Campaign;
use App\Models\Slider;
use App\Models\Story;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\App;
use App\ViewModels\IPropertySearchModel;
use App\Repositories\IPropertySearchRepository;
use App\Models\City;
use App\Models\Category;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Citizenship;
use Carbon\Carbon;
use App\Models\State;
use App\Models\UploadImage;

class CitizenshipController extends Controller
{
    private $_propertySearchModel;
    private $_propertySearchRepository;

    public function __construct(IPropertySearchModel $propertySearchModel,IPropertySearchRepository $properties)
    {
        Session::put('currentLocal', 'en');
        App::setLocale('en');

        $this->_propertySearchModel = $propertySearchModel;
        $this->_propertySearchRepository = $properties;
    }

    public function index(Request $request)
    {
        $locale   = Session::get('currentLocal');

        $properties = Property::where('moderation_status',1)
                        ->orderBy('id','DESC')
                        ->where('status',1)
                        ->get();
        // $properties = DB::table('properties')
        //             ->join('cities', 'properties.city_id', '=', 'cities.id')
        //             ->join('countries', 'properties.country_id', '=', 'countries.id')
        //             ->join('currencies', 'properties.currency_id', '=', 'currencies.id')
        //             ->join('states', 'properties.state_id', '=', 'states.id')
        //             ->join('users', 'properties.user_id', '=', 'users.id')
        //             ->join('property_details', 'property_details.property_id', '=', 'properties.id')
        //             ->join('packages', 'properties.package_id', '=', 'packages.id')
        //             ->join('package_user', 'package_user.package_id', '=', 'packages.id')
        //             ->select('properties.*', 'cities.name as city_name', 'countries.name as country_name',
        //                 'states.name as state_name,users.f_name as user_name','property_details.bed as bed',
        //                 'property_details.bath as bath','property_details.garage as garage',
        //                 'property_details.room_size as room_size','package_user.expire_at as expire_at','currencies.icon as icon')
        //             ->where([
        //                 ['properties.moderation_status', 1],
        //                 ['properties.status', 1]
        //             ])
        //             ->get();
                    // dd($properties);
        $maxPrice = $properties->max('price');
        $minPrice = $properties->min('price');
        foreach ($properties as $row)
        {
            $currentTime = Carbon::now();
            $end_time = new Carbon($row->expire_at);
            if($currentTime > $end_time)
            {
                $row->status = 0;
                $row->save();
            }
        }
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $videos = Video::with(['videoTranslation','videoTranslationEnglish'])
                ->orderBy('id','DESC')
                ->get();
                $testimonials = Testimonial::with(['testimonialTranslation','testimonialTranslationEnglish'])
                    ->orderBy('id','DESC')
                    ->get();
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $country = Country::with('countryTranslation')->get()->keyBy('id');
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $agents = User::get()->where('type', 'agent')->keyBy('id');
        $sliders = Slider::with(['sliderTranslation','sliderTranslationEnglish'])
        ->orderBy('id','DESC')
        ->get();
        $stories = Story::with(['campaign.campaignTranslation', 'storyTranslation','storyTranslationEnglish',])
        ->get();

        $campaigns = Campaign::with('campaignTranslation')->where('status',1)->get()->keyBy('id');
        $users = User::where('type','user')->get()->keyBy('id');
        $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
        $propertyTranslation = PropertyTranslation::where('locale',$locale)->get()->keyBy('property_id');
        $propertyTranslationEnglish = PropertyTranslation::where('locale','en')->get()->keyBy('property_id');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        $image = Image::get()->keyBy('property_id');
        $partners = OurPartner::all();
        $facilities = Facility::get();
        $siteInfo = SiteInfo::first();
        $newses = Blog::with('blogTranslation','user')->where('status','approved')->orderBy('id','desc')->paginate(4);
        $popularTopics = BlogCategory::with('blogCategoryTranslation','blogs')->where('status',1)->get()->keyBy('id');
        $tags = Tag::with('tagTranslation','tagTranslationEnglish')->where('status',1)->get();
        $headerImage = HeaderImage::where('page','home')->first();

        $citizenship = Citizenship::first();
        return view('frontend.citizenship',compact('headerImage', 'properties', 'country', 'states', 'city','minPrice','maxPrice','minArea','maxArea','categories','sliders','citizenship' ));
    }



    public function send(Request $request){

        // dd($request->all());
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'nullable',
        ]);

        $data = array(
            'name'      =>  $request->name,
            'email'     => $request->email,
            'phone'     =>  $request->phone,
            'message'     =>  $request->message,
        );

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new SendMail($data));
        return back()->with('message', 'Thanks for contacting us!');

    }

}
