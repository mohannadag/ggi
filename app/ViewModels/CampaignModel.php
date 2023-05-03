<?php
namespace App\ViewModels;

use Illuminate\Http\Request;
use App\Services\CampaignService;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

class CampaignModel implements ICampaignModel
{
    private $_campaignService;

    public function __construct(CampaignService $service)
    {
        $this->_campaignService = $service;
    }

    public function getAllCampaign(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data = $this->_campaignService->getAllCampaign();
      if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) use ($locale)
                {
                    return $row->campaignTranslation->name ?? $row->campaignTranslationEnglish->name ?? null;
                })
                ->addColumn('status',function($row){
                    if($row->status == 1)
                    {
                        $but =  '<span class="bg-primary p-1 text-white">Active</span>';
                        return $but;
                    }else{
                        $but = '<span class="bg-warning p-1 text-white">Inactive</span>';
                        return $but;
                    }
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="'.route('admin.campaigns.edit',$row->id).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="'.route('admin.campaigns.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
    }

    public function getCampaignById($id)
    {
       return $this->_campaignService->getById($id);
    }

    public function addCampaign(Request $request)
    {
        request()->validate([
            'name' =>'required',
            'parent_id' => 'nullable',
            'status' =>'required',
            'description' => 'nullable',
            'order' =>'nullable',
        ]);

        $data = $request->all();
        if($data['order'] == null)
        {
            $data['order'] = 0;
        }
        $this->_campaignService->addCampaign($data);
    }

    public function updateCampaign(Request $request,$id)
    {
        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;

        if($data['order'] == null)
        {
            $data['order'] = 0;
        }
        $this->_campaignService->updateCampaign($data,$id);
    }

    public function delete($id)
    {
        $this->_campaignService->delete($id);
    }
}
