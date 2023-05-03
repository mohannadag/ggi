<?php
namespace App\Services;

use App\Repositories\ILandingTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LandingTranslationService
{
    private $_landingTranslationRepository;
    public function __construct(ILandingTranslationRepository $repository)
    {
        $this->_landingTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_landingTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $landingTranslation = $this->_landingTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($landingTranslation)) {
            $landingTranslation = $this->_landingTranslationRepository->getById($data);
        }

        return $landingTranslation;
    }

    public function getByLocale($locale)
    {
        $landingTranslation = $this->_landingTranslationRepository->getByLocale($locale);

        if (isset($landingTranslation)) {
            $landingTranslation = $this->_landingTranslationRepository->getByLocale('en');
        }
        return $landingTranslation;
    }

    public function update($data)
    {
        $this->_landingTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_landingTranslationRepository->delete($id);
    }
}
