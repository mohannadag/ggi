<?php
namespace App\Services;

use App\Repositories\IVirtualRealityRepository;
use App\Repositories\IVirtualRealityTranslationRepository;

class VirtualRealityService
{
    private $_virtualrealityRepository;
    private $_virtualrealityTranslationRepository;

    public function __construct(IVirtualRealityRepository $repository,IVirtualRealityTranslationRepository $translationRepository)
    {
        $this->_virtualrealityRepository = $repository;
        $this->_virtualrealityTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_virtualrealityRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_virtualrealityRepository->getById($id);
    }

    public function add($data)
    {
        $virtualreality = $this->_virtualrealityRepository->add($data);
        $data['virtualrealityId'] = $virtualreality->id;
        $this->_virtualrealityTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_virtualrealityRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_virtualrealityRepository->delete($id);
    }
}