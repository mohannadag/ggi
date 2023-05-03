<?php
namespace App\Services;

use App\Repositories\ICampaignRepository;
use App\Repositories\ICampaignTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CampaignTranslationService
{
    private $_campaignTranslationRepository;
    private $_campaignRepository;
    public function __construct(ICampaignTranslationRepository $repository,ICampaignRepository $campaignRepository)
    {
        $this->_campaignTranslationRepository = $repository;
        $this->_campaignRepository = $campaignRepository;
    }

    public function getById($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['id'] = $id;
        $campaignTranslation = $this->_campaignTranslationRepository->getCampaignTranslationById($data);
        $data['locale'] = 'en';
        if (!isset($campaignTranslation)) {
            $campaignTranslation = $this->_campaignTranslationRepository->getCampaignTranslationById($data);
        }
        return $campaignTranslation;
    }

    public function getByLocale($locale)
    {
        $campaignTranslation = $this->_campaignTranslationRepository->getByLocale($locale);

        if (isset($campaignTranslation)) {
            $campaignTranslation = $this->_campaignTranslationRepository->getByLocale('en');
        }
        return $campaignTranslation;
    }

    public function update($data)
    {
        $this->_campaignTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_campaignTranslationRepository->delete($id);
    }

}
