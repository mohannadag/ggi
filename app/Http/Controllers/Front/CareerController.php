<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\HeaderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Property;
use App\Models\PropertyDetail;
use App\ViewModels\IPropertySearchModel;
use App\Repositories\IPropertySearchRepository;
use App\Models\City;
use App\Models\Category;
use App\Models\State;
use App\Models\UploadImage;

class CareerController extends Controller
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
    $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
    $maxPrice = $props->max('price');
    $minPrice = $props->min('price');
    $propertyDetails = PropertyDetail::get()->keyBy('property_id');
    $maxArea = $propertyDetails->max('room_size');
    $minArea = $propertyDetails->min('room_size');
    $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
    //Poperty Search
    $properties = $this->_propertySearchModel->getData($request);
    $data = $request->all();
        $headerImage = HeaderImage::where('page','career')->first();

        return view('frontend.career',compact('headerImage', 'properties','data', 'states', 'city','minPrice','maxPrice','minArea','maxArea','categories'));
    }



    public function store(Request $request){

        $request->validate([
        'name'=>'required',
        'email' => 'required',
        'phone' => 'required',
        'experience' => 'required',
        'nationality' => 'required',
        'gender' => 'required',
        'companies' => 'required',
        'image'=> 'required',
        ]);

        $resume = time().'.'.$request['image']->getClientOriginalExtension();
        $imagesendbymailwithstore= new UploadImage();
        $imagesendbymailwithstore->name = $request->name;
        $imagesendbymailwithstore->email = $request->email;
        $imagesendbymailwithstore->phone = $request->phone;
        $imagesendbymailwithstore->experience = $request->experience;
        $imagesendbymailwithstore->nationality = $request->nationality;
        $imagesendbymailwithstore->gender = $request->gender;
        $imagesendbymailwithstore->companies = $request->companies;
        $imagesendbymailwithstore->image = $resume;
        $imagesendbymailwithstore->save();

        // for mailling function working
        $imagesendbymailwithstore = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'experience' => $request->experience,
            'nationality' => $request->nationality,
            'gender' => $request->gender,
            'companies' => $request->companies,
            'image' => 	$request->image,

        );
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new SendMail($imagesendbymailwithstore));
        $request['image']->move(base_path() . '/public/uploads/career/', $resume);
        return back()->with('success', 'Thanks for contacting us!');

    }

}
