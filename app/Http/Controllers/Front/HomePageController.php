<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\PopUpMail;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\City;
use App\Models\Faq;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Facility;
use App\Models\HeaderImage;
use App\Models\Image;
use App\Models\OurPartner;
use App\Models\Package;
use App\Models\Page;
use App\Models\Landing;
use App\Models\Property;
use App\Models\Tag;
use App\Models\PropertyDetail;
use App\Models\PropertyTranslation;
use Illuminate\Support\Facades\Mail;
use App\Models\Service;
use App\Models\SiteInfo;
use App\Models\State;
use App\Models\Slider;
use App\Models\Story;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Video;
use App\Models\VirtualReality;
use App\ViewModels\IPropertySearchModel;
use App\Repositories\IPropertySearchRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class HomePageController extends Controller
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
    public function currency($id)
    {
        Session::put('currency', $id);
        cache()->forget('session_currency');
        return redirect()->back();
    }

    public function index()
    {

        if (Session::has('currency'))
            {
              $curr = Currency::find(Session::get('currency'));
            }
            else
            {
                $curr = Currency::where('is_default','=',1)->first();
            }
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');

        $properties = Property::where('moderation_status',1)
                        ->orderBy('id','DESC')
                        ->where('status',1)
                        ->get();
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
        ->where('status',1)
        ->get();
        //dd($sliders);
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
        return view('frontend.index',compact('properties','maxPrice','minPrice','propertyDetails', 'campaigns', 'stories', 'tags','maxArea','minArea','country','city','agents','users','states','categories','propertyTranslation','propertyTranslationEnglish','image','locale','facilities','siteInfo','newses','popularTopics','headerImage', 'sliders', 'videos', 'testimonials', 'partners', 'curr'));
        // return view('soon');
    }

    public function page($page)
    {

        if (Session::has('currency'))
            {
              $curr = Currency::find(Session::get('currency'));
            }
            else
            {
                $curr = Currency::where('is_default','=',1)->first();
            }
        App::setLocale(Session::get('currentLocal'));
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
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $country = Country::with('countryTranslation')->get()->keyBy('id');
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
        $propertyTranslation = PropertyTranslation::where('locale',$locale)->get()->keyBy('property_id');
        $propertyTranslationEnglish = PropertyTranslation::where('locale','en')->get()->keyBy('property_id');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        $agents = User::get()->where('type', 'agent')->keyBy('id');
        $videos = Video::with(['videoTranslation','videoTranslationEnglish'])
                ->orderBy('id','DESC')
                ->get();
        $testimonials = Testimonial::with(['testimonialTranslation','testimonialTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
        $sliders = Slider::with(['sliderTranslation','sliderTranslationEnglish'])
        ->orderBy('id','DESC')
        ->get();
        $stories = Story::with(['campaign.campaignTranslation', 'storyTranslation','storyTranslationEnglish',])
        ->get();

        $campaigns = Campaign::with('campaignTranslation')->where('status',1)->get()->keyBy('id');
        $users = User::where('type','user')->get()->keyBy('id');
        $image = Image::get()->keyBy('property_id');
        $partners = OurPartner::all();
        $facilities = Facility::get();
        $siteInfo = SiteInfo::first();
        $newses = Blog::with('blogTranslation','user')->where('status','approved')->orderBy('id','desc')->paginate(4);
        $popularTopics = BlogCategory::with('blogCategoryTranslation','blogs')->where('status',1)->get()->keyBy('id');
        $tags = Tag::with('tagTranslation','tagTranslationEnglish')->where('status',1)->get();
        $headerImage = HeaderImage::where('page','home')->first();

        $page = Page::with(['pageTranslation','pageTranslationEnglish'])->where('slug', $page)->first();
        return view('frontend.page',compact('properties','maxPrice','minPrice','propertyDetails', 'page', 'campaigns', 'stories', 'tags','maxArea','minArea','country','city','agents','users','states','categories','propertyTranslation','propertyTranslationEnglish','image','locale','facilities','siteInfo','newses','popularTopics','headerImage', 'sliders', 'videos', 'testimonials', 'partners', 'curr'));
    }

    public function landing($landing, request $request)
    {

        if (Session::has('currency'))
            {
              $curr = Currency::find(Session::get('currency'));
            }
            else
            {
                $curr = Currency::where('is_default','=',1)->first();
            }
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $landing = Landing::with(['landingTranslation','landingTranslationEnglish'])->where('slug', $landing)->first();

        // $projects = json_decode($landing['projects_id']);
        $properties = Property::orderBy('id','DESC')
                        ->where('is_featured', 1)
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
        ->where('category', 3)
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
        $faqs = Faq::with('faqTranslation','faqTranslationEnglish')->where('category', 1)->where('status',1)->get();

        return view('frontend.landing',compact('properties','maxPrice','minPrice','propertyDetails','faqs', 'landing', 'campaigns', 'stories', 'tags','maxArea','minArea','country','city','agents','users','states','categories','propertyTranslation','propertyTranslationEnglish','image','locale','facilities','siteInfo','newses','popularTopics','sliders', 'videos', 'testimonials', 'partners', 'curr'));
    }

    public function faq(Request $request)
    {

    $props = Property::with(['propertyDetails','user','category.categoryTranslation', 'country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('id', 1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->paginate(4);
    $city = City::with('cityTranslation')->get()->keyBy('id');
    $states = State::with('stateTranslation')->where('status',1)->get()->keyBy('id');
    $faqs = Faq::with(['faqTranslation','faqTranslationEnglish'])
    ->orderBy('id','ASC')
    ->where('category', 1)
    ->get();
    $maxPrice = $props->max('price');
    $minPrice = $props->min('price');
    $propertyDetails = PropertyDetail::get()->keyBy('property_id');
    $maxArea = $propertyDetails->max('room_size');
    $newses = Blog::with('blogTranslation','user')->where('status','approved')->orderBy('id','desc')->paginate(4);
    $popularTopics = BlogCategory::with('blogCategoryTranslation', 'blogs')->where('status', 1)->get()->keyBy('id');
    $minArea = $propertyDetails->min('room_size');
    $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
    //Poperty Search
    $properties = $this->_propertySearchModel->getData($request);
    $data = $request->all();
        $testimonials = Testimonial::with(['testimonialTranslation','testimonialTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
        $sliders = Slider::with(['sliderTranslation','sliderTranslationEnglish'])
        ->orderBy('id','DESC')
        ->get();
        $partners = OurPartner::all();
        $agents = User::where('type','user', 'company_name')->get();
        $headerImage = HeaderImage::where('page','about-us')->first();

        return view('frontend.faq',compact('testimonials','sliders','partners','agents','faqs', 'headerImage', 'properties','data','city', 'states','minPrice','maxPrice','minArea','maxArea','categories', 'newses', 'popularTopics'));
    }

    public function ivrhome()
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');

        $properties = Property::where('moderation_status',1)
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
        $agents = User::get()->keyBy('id');
        $sliders = Slider::with(['sliderTranslation','sliderTranslationEnglish'])
        ->orderBy('id','DESC')
        ->get();

        $stories = Story::with(['storyTranslation','storyTranslationEnglish'])
        ->where('status', 1)
        ->orderBy('id','DESC')
        ->get();
        $users = User::where('type','user')->get()->keyBy('id');
        $states = State::with('stateTranslation')->where('status',1)->get()->keyBy('id');
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
        return view('frontend.ivr-index',compact('properties','maxPrice','minPrice','propertyDetails', 'stories', 'tags','maxArea','minArea','country','city','agents','users','states','categories','propertyTranslation','propertyTranslationEnglish','image','locale','facilities','siteInfo','newses','popularTopics','headerImage', 'sliders', 'videos', 'testimonials', 'partners'));
    }

    public function tag($tag, Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $tag = Tag::where('id', $tag)->first();
        //dd($tag);

        $properties = $tag->properties()
        ->where('moderation_status',1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->get();
        // dd($properties1);
        // dd($tag);
        $blog = $tag->blogs()->orderBy('id', 'desc')
        ->paginate(4);
        // dd($blog);

        $props = Property::with(['propertyDetails','user','category.categoryTranslation', 'country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('tag', $tag->id)
        ->where('moderation_status',1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->paginate(4);
        // $properties = Property::where('moderation_status',1)
        // ->where('tag', $tag->id)
        // ->orderBy('id','DESC')
        // ->where('status',1)
        // ->get();
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
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $country = Country::with('countryTranslation')->get()->keyBy('id');
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
        $propertyTranslation = PropertyTranslation::where('locale',$locale)->get()->keyBy('property_id');
        $propertyTranslationEnglish = PropertyTranslation::where('locale','en')->get()->keyBy('property_id');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');

        $newses = Blog::with('blogTranslation', 'user')
            ->where('tag', $tag->id)
            ->orderBy('id', 'desc')
            ->paginate(4);
        $tags = Tag::with('tagTranslation', 'tagTranslationEnglish')->get();
        return view('frontend.tags', compact('newses', 'tag','tags', 'props', 'city', 'maxPrice', 'minPrice','propertyDetails', 'states','maxArea', 'minArea', 'properties', 'categories', 'blog'));
    }

    public function about(Request $request)
    {

        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $props = Property::with(['propertyDetails','user','category.categoryTranslation', 'country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('moderation_status',1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->paginate(4);
        $properties = Property::where('moderation_status',1)
                        ->orderBy('id','DESC')
                        ->where('status',1)
                        ->get();
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
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $country = Country::with('countryTranslation')->get()->keyBy('id');
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
        $propertyTranslation = PropertyTranslation::where('locale',$locale)->get()->keyBy('property_id');
        $propertyTranslationEnglish = PropertyTranslation::where('locale','en')->get()->keyBy('property_id');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
    $services = Service::all();
    $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
    //Poperty Search
        $testimonials = Testimonial::with(['testimonialTranslation','testimonialTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
        $sliders = Slider::with(['sliderTranslation','sliderTranslationEnglish'])
        ->orderBy('id','DESC')
        ->get();
        $partners = OurPartner::all();
        $agents = User::where('type','user', 'company_name')->get();
        $headerImage = HeaderImage::where('page','about-us')->first();

        return view('frontend.about',compact('testimonials','sliders','partners',  'agents','headerImage', 'properties', 'states', 'city','minPrice','maxPrice','minArea','maxArea','categories', 'services'));
    }

    public function citizenship(Request $request)
    {
        $props = Property::with(['propertyDetails','user','category.categoryTranslation', 'country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('moderation_status',1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->paginate(4);
    $city = City::with('cityTranslation')->get()->keyBy('id');
    $maxPrice = $props->max('price');
    $minPrice = $props->min('price');
    $propertyDetails = PropertyDetail::get()->keyBy('property_id');
    $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
    $maxArea = $propertyDetails->max('room_size');
    $minArea = $propertyDetails->min('room_size');
    $services = Service::all();
    $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
    //Poperty Search
    $properties = $this->_propertySearchModel->getData($request);
    $data = $request->all();
        $testimonials = Testimonial::with(['testimonialTranslation','testimonialTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
        $sliders = Slider::with(['sliderTranslation','sliderTranslationEnglish'])
        ->orderBy('id','DESC')
        ->get();
        $partners = OurPartner::all();
        $agents = User::where('type','user', 'company_name')->get();
        $headerImage = HeaderImage::where('page','about-us')->first();

        return view('frontend.citizenship',compact('testimonials','sliders','partners','agents','headerImage', 'properties','data', 'states', 'city','minPrice','maxPrice','minArea','maxArea','categories', 'services'));
    }

    public function virtualreality(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
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
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $country = Country::with('countryTranslation')->get()->keyBy('id');
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
        $propertyTranslation = PropertyTranslation::where('locale',$locale)->get()->keyBy('property_id');
        $propertyTranslationEnglish = PropertyTranslation::where('locale','en')->get()->keyBy('property_id');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
    $virtualrealitys = VirtualReality::with(['virtualrealityTranslation','virtualrealityTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();

    $testimonials = Testimonial::with(['testimonialTranslation','testimonialTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    $sliders = Slider::with(['sliderTranslation','sliderTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();

    $partners = OurPartner::all();
    $agents = User::where('type','user')->get();
    $headerImage = HeaderImage::where('page','about-us')->first();

    return view('frontend.virtualreality',compact('testimonials','sliders','partners','agents','headerImage', 'properties', 'states', 'city','minPrice','maxPrice','minArea','maxArea','categories', 'virtualrealitys'));
    }

    public function service($service, Request $request)
    {

        $props = Property::with(['propertyDetails', 'user', 'category.categoryTranslation', 'country.countryTranslation', 'state.stateTranslation', 'city.cityTranslation', 'propertyTranslation', 'image'])
            ->where('moderation_status', 1)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(4);
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $maxPrice = $props->max('price');
        $minPrice = $props->min('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status', 1)->get()->keyBy('id');
        //Poperty Search
        $properties = $this->_propertySearchModel->getData($request);
        $data = $request->all();
        App::setLocale(Session::get('currentLocal'));

        $service = Service::get()->keyBy('service_id');

        $popularTopics = BlogCategory::where('status', 1)->get();
        $recentlyAddedPosts = Blog::latest()->take(3)->get();
        $tags = Tag::where('status', 1)->get();
        // dd($post);
        // dd($previousPost);

        return view('frontend.single-service', compact( 'popularTopics', 'recentlyAddedPosts', 'tags', 'properties', 'data', 'states', 'city', 'minPrice', 'maxPrice', 'minArea', 'maxArea', 'categories', 'service'));
    }

    public function video(Request $request)
    {
        $props = Property::with(['propertyDetails','user','category.categoryTranslation', 'country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('moderation_status',1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->paginate(4);
    $city = City::with('cityTranslation')->get()->keyBy('id');
    $maxPrice = $props->max('price');
    $minPrice = $props->min('price');
    $videos = Video::with(['videoTranslation','videoTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    $propertyDetails = PropertyDetail::get()->keyBy('property_id');
    $maxArea = $propertyDetails->max('room_size');
    $minArea = $propertyDetails->min('room_size');
    $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
    $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
    //Poperty Search
    $properties = $this->_propertySearchModel->getData($request);
    $data = $request->all();
        $testimonials = Testimonial::with(['testimonialTranslation','testimonialTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
            $sliders = Slider::with(['sliderTranslation','sliderTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();

        $partners = OurPartner::all();
        $agents = User::where('type','user')->get();
        $headerImage = HeaderImage::where('page','about-us')->first();

        return view('frontend.videos',compact('testimonials','sliders','partners','agents','headerImage', 'properties','data', 'states', 'city','minPrice','maxPrice','minArea','maxArea','categories', 'videos'));
    }

    public function privacy(Request $request)
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
        $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        //Poperty Search
        $properties = $this->_propertySearchModel->getData($request);
        $data = $request->all();
        $testimonials = Testimonial::with(['testimonialTranslation','testimonialTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
        $partners = OurPartner::all();
        $agents = User::where('type','user')->get();
        $headerImage = HeaderImage::where('page','privacy')->first();

        return view('frontend.privacy',compact('testimonials','partners','agents','headerImage', 'properties','data', 'states', 'city','minPrice','maxPrice','minArea','maxArea','categories'));
    }

    public function terms(Request $request)
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
        $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        //Poperty Search
        $properties = $this->_propertySearchModel->getData($request);
        $data = $request->all();
        $testimonials = Testimonial::with(['testimonialTranslation','testimonialTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
        $partners = OurPartner::all();
        $agents = User::where('type','user')->get();
        $headerImage = HeaderImage::where('page','privacy')->first();

        return view('frontend.terms',compact('testimonials','partners','agents','headerImage', 'properties','data','states','city','minPrice','maxPrice','minArea','maxArea','categories'));
    }

    public function errorPage()
    {
        return view('frontend.404-page');
    }


    public function membershipPackage()
    {
        $packages = Package::with('packageTranslation')->orderBy('id','DESC')->get();
        return view('frontend.membership-package',compact('packages'));
    }


    public function addListing()
    {
        return view('frontend.add-listing');
    }

    public function getCity(Request $request)
    {
        $cities = City::where('state_id',$request->state)->get();
        echo '<option value="">Select City</option>';
        foreach ($cities as $city){
            echo '<option value="'.$city->id.'">'.$city->cityTranslation->name.'</option>';
        }
    }

    public function searchProperty(Request $request)
    {
        $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('status',1)
            ->orderBy('id','desc')
            ->get();
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->get()->keyBy('id');
        $maxPrice = $props->max('price');
        $minPrice = $props->min('price');
        $featuredProperties = $props->where('is_featured', 1)->take(4);
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        //Poperty Search
        $properties = $this->_propertySearchModel->getData($request);
        $data = $request->all();
        // dd($properties);
        return view('frontend.get-property',compact('properties','data','city','minPrice','maxPrice','minArea','maxArea','categories', 'states', 'featuredProperties'));
    }

    public function searchProject(Request $request)
    {
        $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('status',1)
            ->orderBy('id','desc')
            ->paginate(4);
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->get()->keyBy('id');
        $maxPrice = $props->max('price');
        $minPrice = $props->min('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        //Poperty Search
        $properties = $this->_propertySearchModel->getData($request);
        $data = $request->all();
        return view('frontend.get-project',compact('properties','data','city','minPrice','maxPrice','minArea','maxArea','categories', 'states'));
    }

    public function ivrsearch(Request $request)
    {
        $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('moderation_status',1)
            ->where('type', 'sale')
            ->where('status',1)
            ->orderBy('id','desc')
            ->paginate(4);
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->get()->keyBy('id');
        $maxPrice = $props->max('price');
        $minPrice = $props->min('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        //Poperty Search
        $properties = $this->_propertySearchModel->getData($request);
        $data = $request->all();
        return view('frontend.ivr-search',compact('properties','data','city','minPrice','maxPrice','minArea','maxArea','categories', 'states'));
    }

    public function searchPropertyRent(Request $request)
    {
        $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('moderation_status',1)
            ->where('type', 'rent')
            ->where('status',1)
            ->orderBy('id','desc')
            ->paginate(4);
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->get()->keyBy('id');
        $maxPrice = $props->max('price');
        $minPrice = $props->min('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        //Poperty Search
        $properties = $this->_propertySearchModel->getData($request);
        $data = $request->all();
        return view('frontend.get-property-rent',compact('properties','data','city','minPrice','maxPrice','minArea','maxArea','categories', 'states'));
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

    public function getByState($stateId)
    {
        $data = [];
        $data['state'] = $stateId;
        return $this->_propertySearchRepository->getByState($data);
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
    public function getByName($title)
    {
        $data = [];
        $data['property_name'] = $title;
        return $this->_propertySearchRepository->getByName($data);
    }

    public function getByID($title)
    {
        $data = [];
        $data['property_title'] = $title;
        return $this->_propertySearchRepository->getByID($data);
    }


    public function getByAll($categoryId,$cityId,$minPrice, $maxPrice,$bed,$bath,$stateName){
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['state'] = $stateName;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByAll($data);
    }

    public function getByfilterProperties($categoryId,$cityId,$minPrice, $maxPrice,$bed,$bath,$stateName){
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['state'] = $stateName;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->filterProperties($data);
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
