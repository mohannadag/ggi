<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ViewModels\ICampaignModel;
use App\ViewModels\ICampaignTranslationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CampaignController extends Controller
{
    private $_campaignModel;
    private $_campaignTranslationModel;

    public function __construct(ICampaignModel $model,ICampaignTranslationModel $translationModel)
    {
        $this->middleware('accessDashboard');
        // $this->middleware('admin');
        $this->_campaignModel = $model;
        $this->_campaignTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->_campaignModel->getAllCampaign($request);
        }
        return view('admin.campaigns.index');
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function store(Request $request)
    {
        $this->_campaignModel->addCampaign($request);
        return redirect()->route('admin.campaigns.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $locale = Session::get('currentLocal');
        $campaign =  $this->_campaignModel->getCampaignById($id);
        $campaignTranslation = $this->_campaignTranslationModel->getById($id);
        return view('admin.campaigns.edit',compact('campaign','campaignTranslation','locale'));
    }

    public function update(Request $request,$id)
    {
        $this->_campaignModel->updateCampaign($request,$id);
//        $this->_campaignTranslationModel->update($request,$id);
        notify()->success('Campaign updated successfully!');
        return redirect()->route('admin.campaigns.index');
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.campaigns.index');
        }else{
            $this->_campaignModel->delete($id);
            $this->_campaignTranslationModel->delete($id);
            notify()->success('Campaign deleted!');
            return redirect()->route('admin.campaigns.index');
        }
    }

}
