<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SliderTranslation;
use App\ViewModels\ISliderModel;
use App\ViewModels\ISliderTranslationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
{
    private $_sliderModel;
    private $_sliderTranslationModel;
    public function __construct(ISliderModel $model,ISliderTranslationModel $translationModel)
    {
        $this->middleware('can:isAdmin,can:isMod');
        $this->_sliderModel = $model;
        $this->_sliderTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
           return $this->_sliderModel->getAll($request);
        }
        return view('admin.sliders.index');
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $this->_sliderModel->add($request);
        return redirect()->route('admin.sliders.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $slider = $this->_sliderModel->getById($id);
        $sliderTranslation = $this->_sliderTranslationModel->getById($id);
        return view('admin.sliders.edit',compact('slider','sliderTranslation','locale'));
    }

    public function update(Request $request, $id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.sliders.index');
        }else{
            $this->_sliderModel->update($request,$id);
            $this->_sliderTranslationModel->update($request,$id);
            notify()->success('Slider updated successfully!');
            return redirect()->route('admin.sliders.index');
        }
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.sliders.index');
        }else{
            $this->_sliderModel->delete($id);
            $this->_sliderTranslationModel->delete($id);
            notify()->success('Slider deleted successfully!');
            return redirect()->route('admin.sliders.index');
        }

    }
}
