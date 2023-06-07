<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Mail\FullContact;
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
use App\Models\PropertyTranslation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\Models\State;
use Carbon\Carbon;

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
    $headerImage = HeaderImage::where('page','contact')->first();

    return view('frontend.contact',compact('headerImage', 'properties','states','city','minPrice','maxPrice','minArea','maxArea','categories'));
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

    function sendFull(Request $request)
    {
        // dd($request->all());
        request()->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            // 'message'=>'required'
        ]);

        $data = array(
            'fname'      =>  $request->fname,
            'lname'      =>  $request->lname,
            'email'     => $request->email,
            'phone'     =>  $request->phone,
            'type'     =>  $request->type,
            'state'     =>  $request->state,
            'maxPrice'     =>  $request->maxPrice,
            'numberOfBedrooms'     =>  $request->numberOfBedrooms,
            // 'message'   =>   $request->message
        );
        // dd($data);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new FullContact($data));
        return back()->with('message', 'Thanks for contacting us!');

    }
}
