<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Faq;
use App\Models\Landing;
use App\Models\LandingTranslation;
use App\Models\Property;
use App\Models\PropertyDetail;
use App\Models\Slider;
use App\Models\State;
use App\ViewModels\ILandingModel;
use App\ViewModels\ILandingTranslationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class LandingController extends Controller
{
    private $_landingModel;
    private $_landingTranslationModel;
    public function __construct(ILandingModel $model,ILandingTranslationModel $translationModel)
    {
        $this->_landingModel = $model;
        $this->_landingTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
           return $this->_landingModel->getAll($request);
        }
        return view('admin.landing.index');
    }

    public function create()
    {

        $sliders = Slider::with(['sliderTranslation','sliderTranslationEnglish'])
        ->where('category', '2')
        ->orderBy('id','DESC')
        ->get();
        $faqs = Faq::with(['faqTranslation','faqTranslationEnglish'])
        ->where('category', '2')
        ->orderBy('id','DESC')
        ->get();
        $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
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
        return view('admin.landing.create', compact('sliders', 'faqs','properties', 'city', 'states', 'maxPrice', 'minPrice', 'propertyDetails', 'maxArea', 'minArea', 'categories'));
    }

    public function store(Request $request)
    {
        $this->_landingModel->add($request);
        return redirect()->route('admin.landing.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $sliders = Slider::with(['sliderTranslation','sliderTranslationEnglish'])
        ->where('category', '2')
        ->orderBy('id','DESC')
        ->get();
        $faqs = Faq::with(['faqTranslation','faqTranslationEnglish'])
        ->where('category', '2')
        ->orderBy('id','DESC')
        ->get();
        $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
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
        $locale   = Session::get('currentLocal');
        $landing = $this->_landingModel->getById($id);
        $landingTranslation = $this->_landingTranslationModel->getById($id);
        return view('admin.landing.edit',compact('landing','landingTranslation','locale', 'sliders', 'faqs', 'properties', 'city', 'states', 'maxPrice', 'minPrice', 'propertyDetails', 'maxArea', 'minArea', 'categories'));
    }

    public function update(Request $request, $id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.landing.index');
        }else{
            $this->_landingModel->update($request,$id);
            $this->_landingTranslationModel->update($request,$id);
            notify()->success('Landing updated successfully!');
            return redirect()->route('admin.landing.index');
        }
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.landing.index');
        }else{
            $this->_landingModel->delete($id);
            $this->_landingTranslationModel->delete($id);
            notify()->success('Landing deleted successfully!');
            return redirect()->route('admin.landing.index');
        }

    }
}
