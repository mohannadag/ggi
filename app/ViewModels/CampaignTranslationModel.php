<?php
namespace App\ViewModels;

use App\Services\CampaignService;
use App\Services\CampaignTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CampaignTranslationModel implements ICampaignTranslationModel
{
    private $_campaignService;
    private $_campaignTranslationService;

    public function __construct(CampaignService $service,CampaignTranslationService $campaignTranslationService)
    {
        $this->_campaignService = $service;
        $this->_campaignTranslationService = $campaignTranslationService;
    }


    public function getAll(Request $request)
    {
        // TODO: Implement getAll() method.
    }
    public function getByLocale()
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        return $this->_campaignTranslationService->getByLocale($locale);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
    }

    public function getById($id)
    {
       return $this->_campaignTranslationService->getById($id);
    }

    public function update(Request $request, $id)
    {

        $data['campaignId'] = $id;
        $data['name'] = $request->name;
        $data['locale'] = $request->local;

        $this->_campaignTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_campaignTranslationService->delete($id);
    }
}
