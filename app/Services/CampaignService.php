<?php
namespace App\Services;

use App\Repositories\ICampaignRepository;
use App\Repositories\ICampaignTranslationRepository;
use Illuminate\Support\Facades\Session;

class CampaignService
{
    private $_campaignRepository;
    private $_campaignTranslationRepository;

    public function __construct(ICampaignRepository $repository,ICampaignTranslationRepository $translationRepository)
    {
        $this->_campaignRepository = $repository;
        $this->_campaignTranslationRepository = $translationRepository;
    }

    public function getAllCampaign()
    {
       return $this->_campaignRepository->getAllCampaign();
    }

    public function addCampaign($data)
    {
        $locale = Session::get('currentLocal');
        $campaign =  $this->_campaignRepository->add($data);
        $data['campaignId'] = $campaign->id;
        $data['locale'] = $locale;
        $this->_campaignTranslationRepository->add($data);
    }

    public function updateCampaign($data,$id)
    {
        $this->_campaignRepository->update($data,$id);
    }

    public function getById($id)
    {
        return $this->_campaignRepository->getCampaignById($id);
    }
    public function delete($id)
    {
        $this->_campaignRepository->delete($id);
    }
}
