<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Tag;
use App\ViewModels\ICategoryTranslationModel;
use App\ViewModels\ICityTranslationModel;
use App\ViewModels\ICountryTranslationModel;
use App\ViewModels\ICurrencyModel;
use App\ViewModels\IFacilityTranslationModel;
use App\ViewModels\IUnitsTranslationModel;
use App\ViewModels\IPackageUserModel;
use App\ViewModels\IPropertyModel;
use App\ViewModels\IPropertyTranslationModel;
use App\ViewModels\IStateTranslationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PropertiesImport;
use App\Exports\PropertiesExport;
use App\Imports\ImagesImport;
use App\Imports\ImportProperties;
use App\Imports\PropertiesDetailsImport;

class PropertyController extends Controller
{
    private $_propertyModel;
    private $_propertyTranslationModel;
    private $_categoryTranslationModel;
    private $_facilityTranslationModel;
    private $_unitsTranslationModel;
    private $_countryTranslationModel;
    private $_stateTranslationModel;
    private $_cityTranslationModel;
    private $_packageUserModel;
    private $_currencyModel;
    public function __construct(IPackageUserModel $packageUserModel,
                                IPropertyModel $propertyModel,
                                IPropertyTranslationModel $propertyTranslationModel,
                                ICategoryTranslationModel $categoryTranslationModel,
                                IFacilityTranslationModel $facilityTranslationModel,
                                IUnitsTranslationModel $unitsTranslationModel,
                                ICountryTranslationModel $countryTranslationModel,
                                IStateTranslationModel $stateTranslationModel,
                                ICityTranslationModel $cityTranslationModel,
                                ICurrencyModel $currencyModel)
    {
        $this->middleware('isApprove', ['only' => ['index','edit','update','myProperties']]);
        $this->_propertyModel = $propertyModel;
        $this->_propertyTranslationModel = $propertyTranslationModel;
        $this->_categoryTranslationModel = $categoryTranslationModel;
        $this->_facilityTranslationModel = $facilityTranslationModel;
        $this->_unitsTranslationModel = $unitsTranslationModel;
        $this->_countryTranslationModel = $countryTranslationModel;
        $this->_stateTranslationModel = $stateTranslationModel;
        $this->_cityTranslationModel = $cityTranslationModel;
        $this->_packageUserModel = $packageUserModel;
        $this->_currencyModel = $currencyModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->_propertyModel->getAll($request);
        }
        return view('admin.properties.index');
    }

    public function create()
    {
        App::setLocale(Session::get('currentLocal'));
        $categories = $this->_categoryTranslationModel->getByLocale();
        $facilities = $this->_facilityTranslationModel->getByLocale();
        $units = $this->_unitsTranslationModel->getByLocale();
        $packages = $this->_packageUserModel->getPackages();
        $countries = $this->_countryTranslationModel->getByLocale();
        $tags = Tag::all();
        $currencies = $this->_currencyModel->getAllCurrencies();
        return view('admin.properties.create',compact('currencies','categories','facilities','units','packages','countries', 'tags'));
    }

    public function store(Request $request)
    {
        $this->_propertyModel->add($request);
        return redirect()->route('admin.properties.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $property = $this->_propertyModel->getById($id);
        $tags = Tag::all();
        //dd($property);
        $propertyTags = $property->tags;
        //dd($propertyTags);
        $propertyTranslation = $this->_propertyTranslationModel->getById($id);
        $user = auth()->user();
        $categories = $this->_categoryTranslationModel->getByLocale();
        $facilities = $this->_facilityTranslationModel->getByLocale();
        $units = $this->_unitsTranslationModel->getByLocale();
        $package_user = $this->_packageUserModel->getByUser($user->id);
        $packages = $this->_packageUserModel->getPackages();
        $countries = $this->_countryTranslationModel->getByLocale();
        $states = $this->_stateTranslationModel->getByLocale();
        $cities = $this->_cityTranslationModel->getByLocale();
        $currencies = $this->_currencyModel->getAllCurrencies();

        return view('admin.properties.edit',compact('currencies','property','user','categories','facilities','units','package_user','packages','countries','states','cities','locale','propertyTranslation', 'tags', 'propertyTags'));
    }

    public function update(Request $request,$id)
    {
        // dd($request->oldImages);
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.properties.index');
        }else{
            // $user = auth()->user();
            // if($user->type == 'admin')
            // {
            //     $this->_propertyModel->updateModerationStatus($request,$id);
            // }else{
                $this->_propertyModel->update($request,$id);
            // }
            notify()->success('Property updated successfully!');
            return redirect()->route('admin.properties.index');
        }
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.properties.index');
        }else{
            $this->_propertyModel->delete($id);
            notify()->success('Property deleted!');
            return redirect()->route('admin.properties.index');
        }
    }

    public function destroyGalleryImage(Request $request)
    {

        $img = $request->image;
        $excludeImage = explode(",",$request->image);
        $fileModal = Image::where('property_id',$request->id)->first();
        $oldImages = json_decode($fileModal->name);
        $getImage = array_search($img,$oldImages);
        File::delete(public_path() . "/images/gallery/{$img}");

        // $finalimages = array_diff($oldImages, $excludeImage);
        unset($oldImages[$getImage]);
        $array = array_values($oldImages);

        // $s = json_encode($finalimages,true);
        // return response()->json($array);
        // $finalimages = unset($oldImages[1]);
        // $fileModal->property_id = $id;

        $fileModal->name = json_encode($array);
        $fileModal->image_path = json_encode($array);

        $fileModal->save();

        return response()->json('Image deleted!');

    }


    public function importView(Request $request){
        return view('admin.import-view');
    }

    public function importProperties(Request $request){
        Excel::import(new ImportProperties,
                      $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function importImages(Request $request){
        Excel::import(new ImagesImport,
                      $request->file('file1')->store('files'));
        return redirect()->back();
    }

    public function importDetails(Request $request){
        Excel::import(new PropertiesDetailsImport,
                      $request->file('file2')->store('files'));
        return redirect()->back();
    }

    public function exportProperties(Request $request){
        return Excel::download(new PropertiesExport, 'properties.xlsx');
    }
}

