<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Currency;
use App\Models\Property;
use App\Models\PropertyDetail;
use App\Models\Units;
use App\Models\User;
use App\Models\PropertyTranslation;
use App\Models\StateTranslation;
use App\Models\State;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\ViewModels\IPropertySearchModel;
use App\Repositories\IPropertySearchRepository;

class PropertyController extends Controller
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

    public function index(Request $request)
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
        Session::get('currentLocal');
        $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('moderation_status',1)
            ->where('status',1)
            ->orderBy('id','desc')
            ->paginate(6);
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->orderBy('order')->get()->keyBy('id');
        $maxPrice = $properties->max('price');
        $minPrice = $properties->min('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $agents = User::where('type','user')->get();
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        $tags = Tag::with('tagTranslation', 'tagTranslationEnglish')->get();
        $units = Units::all();
        return view('frontend.properties',compact('properties','city','minPrice','maxPrice','minArea','maxArea','categories', 'states', 'agents', 'tags', 'units'));


    }

    public function maps(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        Session::get('currentLocal');
        $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('moderation_status',1)
            ->where('status',1)
            ->orderBy('id','desc')
            ->paginate(6);
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->get()->keyBy('id');
        $maxPrice = $properties->max('price');
        $minPrice = $properties->min('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');

         return view('frontend.properties-map',compact('properties','city','minPrice','maxPrice','minArea','maxArea','categories', 'states'));


    }

    public function singleProperty(Property $property, Request $request)
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
            ->where('moderation_status',1)
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
        $tags = $property->tags; // Tag::with('tagTranslation', 'tagTranslationEnglish')->get();

        return view('frontend.property',compact('property','properties','propertyTranslation','propertyTranslationEnglish', 'states', 'city','minPrice','maxPrice','minArea','maxArea','categories', 'thumbnail', 'curr', 'tags'));
    }

    public function ivrProperty(Property $property, Request $request)
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
        return view('frontend.property-ivr',compact('property','properties','propertyTranslation','propertyTranslationEnglish', 'states', 'city','minPrice','maxPrice','minArea','maxArea','categories', 'thumbnail'));
    }

    public function ivrProp(Property $property, Request $request)
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
        return view('frontend.property-ivr-2',compact('property','properties','propertyTranslation','propertyTranslationEnglish', 'states', 'city','minPrice','maxPrice','minArea','maxArea','categories', 'thumbnail'));
    }

    public function ivrProp3(Property $property, Request $request)
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
        return view('frontend.property-ivr-3',compact('property','properties','propertyTranslation','propertyTranslationEnglish', 'states', 'city','minPrice','maxPrice','minArea','maxArea','categories', 'thumbnail'));
    }

    public function ivrProp4(Property $property, Request $request)
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
        return view('frontend.property-ivr-4',compact('property','properties','propertyTranslation','propertyTranslationEnglish', 'states', 'city','minPrice','maxPrice','minArea','maxArea','categories', 'thumbnail'));
    }

    public function searchProperties(Request $request)
    {
        $properties = Property::whereHas('propertyTranslation', function($query) use ($request){
                $query->where('title','LIKE','%'.$request->search.'%');
            })
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
        $states = State::with('stateTranslation')->get()->keyBy('id');
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
}
