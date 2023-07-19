<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VirtualReality;
use App\Models\VirtualRealityTranslation;
use App\ViewModels\IVirtualRealityModel;
use App\ViewModels\IVirtualRealityTranslationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class VirtualRealityController extends Controller
{
    private $_virtualrealityModel;
    private $_virtualrealityTranslationModel;
    public function __construct(IVirtualRealityModel $model,IVirtualRealityTranslationModel $translationModel)
    {
        $this->middleware('can:isAdmin,can:isMod');
        $this->_virtualrealityModel = $model;
        $this->_virtualrealityTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
           return $this->_virtualrealityModel->getAll($request);
        }
        return view('admin.virtualrealitys.index');
    }

    public function create()
    {
        return view('admin.virtualrealitys.create');
    }

    public function store(Request $request)
    {
        $this->_virtualrealityModel->add($request);
        return redirect()->route('admin.virtualrealitys.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $virtualreality = $this->_virtualrealityModel->getById($id);
        $virtualrealityTranslation = $this->_virtualrealityTranslationModel->getById($id);
        return view('admin.virtualrealitys.edit',compact('virtualreality','virtualrealityTranslation','locale'));
    }

    public function update(Request $request, $id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.virtualrealitys.index');
        }else{
            $this->_virtualrealityModel->update($request,$id);
            $this->_virtualrealityTranslationModel->update($request,$id);
            notify()->success('VirtualReality updated successfully!');
            return redirect()->route('admin.virtualrealitys.index');
        }
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.virtualrealitys.index');
        }else{
            $this->_virtualrealityModel->delete($id);
            $this->_virtualrealityTranslationModel->delete($id);
            notify()->success('VirtualReality deleted successfully!');
            return redirect()->route('admin.virtualrealitys.index');
        }

    }
}
