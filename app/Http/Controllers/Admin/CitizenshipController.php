<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ViewModels\ICitizenshipModel;
use App\ViewModels\ICitizenshipTranslationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CitizenshipController extends Controller
{

    private $_citizenshipModel;
    private $_citizenshipTranslationModel;
    public function __construct(ICitizenshipModel $model, ICitizenshipTranslationModel $translationModel)
    {
        $this->_citizenshipModel = $model;
        $this->_citizenshipTranslationModel = $translationModel;
    }

    public function index()
    {
        return view('admin.citizenship.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $citizenship =  $this->_citizenshipModel->getById(1);
        return view('admin.citizenship.create', compact('citizenship', 'locale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $citizenship = $this->_citizenshipModel->add($request);
        $citizenshipTranslation = $this->_citizenshipTranslationModel->add($request);
        notify()->success('Information updated successfully!');
        return view('admin.citizenship.create', compact('citizenship', 'citizenshipTranslation', 'locale'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $citizenship = $this->_citizenshipModel->update($request, $id);
        $citizenshipTranslation = $this->_citizenshipTranslationModel->update($request, $id);
        notify()->success('Information updated successfully!');
        $citizenship =  $this->_citizenshipModel->getById($id);
        return view('admin.citizenship.create', compact('citizenship', 'citizenshipTranslation', 'locale'));
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
