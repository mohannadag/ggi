<?php
namespace App\Services;

use App\Repositories\ILandingRepository;
use App\Repositories\ILandingTranslationRepository;

class LandingService
{
    private $_landingRepository;
    private $_landingTranslationRepository;

    public function __construct(ILandingRepository $repository,ILandingTranslationRepository $translationRepository)
    {
        $this->_landingRepository = $repository;
        $this->_landingTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_landingRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_landingRepository->getById($id);
    }

    public function add($data)
    {
        $landing = $this->_landingRepository->add($data);
        $data['landingId'] = $landing->id;
        $this->_landingTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_landingRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_landingRepository->delete($id);
    }
}
