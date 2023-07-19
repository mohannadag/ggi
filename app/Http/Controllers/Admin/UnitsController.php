<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ViewModels\IUnitsModel;
use App\ViewModels\IUnitsTranslationModel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    private $_unitsModel;
    private $_unitsTranslationModel;
    public function __construct(IUnitsModel $model,IUnitsTranslationModel $translationModel)
    {
        // $this->middleware('admin');
        $this->middleware('accessDashboard');
        $this->_unitsModel = $model;
        $this->_unitsTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));

        if ($request->ajax()) {
            return $this->_unitsModel->getAll($request);
        }
        return view('admin.units.index');
    }

    public function create()
    {
        return view('admin.units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_unitsModel->add($request);
        notify()->success('Unit added successfully!');
        return redirect()->route('admin.units.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $units = $this->_unitsModel->getById($id);
        $unitsTranslation = $this->_unitsTranslationModel->getById($id);
        return view('admin.units.edit',compact('units','locale','unitsTranslation'));
    }


    public function update(Request $request,$id)
    {
        $this->_unitsModel->update($request,$id);
        $this->_unitsTranslationModel->update($request,$id);
        notify()->success('Units updated successfully!');
        return redirect()->route('admin.units.index');
    }

    public function destroy($id)
    {
        $this->_unitsModel->delete($id);
        $this->_unitsTranslationModel->delete($id);
        notify()->success('Units deleted successfully!');
        return redirect()->route('admin.units.index');
    }
}
