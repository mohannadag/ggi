<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceTranslation;
use App\ViewModels\IServiceModel;
use App\ViewModels\IServiceTranslationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    private $_serviceModel;
    private $_serviceTranslationModel;
    public function __construct(IServiceModel $model,IServiceTranslationModel $translationModel)
    {
        $this->_serviceModel = $model;
        $this->_serviceTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
           return $this->_serviceModel->getAll($request);
        }
        return view('admin.services.index');
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $this->_serviceModel->add($request);
        return redirect()->route('admin.services.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $service = $this->_serviceModel->getById($id);
        $serviceTranslation = $this->_serviceTranslationModel->getById($id);
        return view('admin.services.edit',compact('service','serviceTranslation','locale'));
    }

    public function update(Request $request, $id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.services.index');
        }else{
            $this->_serviceModel->update($request,$id);
            $this->_serviceTranslationModel->update($request,$id);
            notify()->success('Service updated successfully!');
            return redirect()->route('admin.services.index');
        }
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.services.index');
        }else{
            $this->_serviceModel->delete($id);
            $this->_serviceTranslationModel->delete($id);
            notify()->success('Service deleted successfully!');
            return redirect()->route('admin.services.index');
        }

    }
}
