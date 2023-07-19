<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\ViewModels\ICountryTranslationModel;
use App\ViewModels\ICityTranslationModel;
use App\ViewModels\IStateModel;
use App\ViewModels\IStateTranslationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StateController extends Controller
{
    private $_stateModel;
    private $_countryTranslationModel;
    private $_cityTranslationModel;
    private $_stateTranslationModel;
    public function __construct(IStateModel $model,ICountryTranslationModel $countryTranslationModel,IStateTranslationModel $stateTranslationModel, ICityTranslationModel $cityTranslationModel)
    {
//        $this->middleware('isApprove', ['only' =>['edit','update','destroy']]);
        $this->middleware('can:isAdmin,can:isMod');
        $this->_stateModel = $model;
        $this->_countryTranslationModel = $countryTranslationModel;
        $this->_cityTranslationModel = $cityTranslationModel;
        $this->_stateTranslationModel = $stateTranslationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->_stateModel->getAll($request);
        }
        return view('admin.states.index');
    }

    public function create()
    {
        $countries = $this->_countryTranslationModel->getByLocale();
        return view('admin.states.create',compact('countries'));
    }

    public function store(Request $request)
    {
        $this->_stateModel->add($request);
        notify()->success('State added successfully!');
        return redirect()->route('admin.states.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $state = $this->_stateModel->getById($id);
        $countries = $this->_countryTranslationModel->getByLocale();
        $stateTranslation = $this->_stateTranslationModel->getById($id);
        return view('admin.states.edit',compact('state','countries','stateTranslation','locale'));
    }

    public function update(Request $request,$id)
    {
        $this->_stateModel->update($request,$id);
        $this->_stateTranslationModel->update($request,$id);
        notify()->success('State updated successfully!');
        return redirect()->route('admin.states.index');
    }

    public function destroy($id)
    {
         $this->_stateModel->delete($id);
         $this->_stateTranslationModel->delete($id);
         notify()->success('State deleted successfully!');
        return redirect()->route('admin.states.index');
    }

    public function getCity(Request $request)
    {

        App::setLocale(Session::get('currentLocal'));
        $cities = City::with('cityTranslation')->where('state_id',$request->state)->get();
        echo '<option value="0">Select City</option>';
        foreach ($cities as $city){
            echo '<option value="'.$city->id.'">'.$city->cityTranslation->name.'</option>';
        }
    }

}
