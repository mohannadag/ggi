<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\HeaderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Property;
use App\Models\PropertyDetail;
use App\ViewModels\IPropertySearchModel;
use App\Repositories\IPropertySearchRepository;
use App\Models\City;
use App\Models\Country;
use App\Models\Category;
use App\Models\State;

class ContactController extends Controller
{
    private $_propertySearchModel;
    private $_propertySearchRepository;

    public function __construct(IPropertySearchModel $propertySearchModel,IPropertySearchRepository $properties)
    {

        $this->_propertySearchModel = $propertySearchModel;
        $this->_propertySearchRepository = $properties;
    }

    public function index(Request $request)
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
        $headerImage = HeaderImage::where('page','contact')->first();

        return view('frontend.contact',compact('headerImage', 'properties','data','states','city','minPrice','maxPrice','minArea','maxArea','categories'));
    }

    function send(Request $request)
    {
        // dd($request->all());
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message'=>'required'
        ]);

        $data = array(
            'name'      =>  $request->name,
            'email'     => $request->email,
            'phone'     =>  $request->phone,
            'message'   =>   $request->message
        );

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($data));
        return back()->with('message', 'Thanks for contacting us!');

    }
}
