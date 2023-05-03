<?php
namespace App\Services;

use App\Repositories\IUnitsRepository;
use App\Repositories\IUnitsTranslationRepository;

class UnitsService
{
    private $_UnitsRepository;
    private $_UnitsTranslationRepository;

    public function __construct(IUnitsRepository $repository,IUnitsTranslationRepository $translationRepository)
    {
        $this->_UnitsRepository = $repository;
        $this->_UnitsTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_UnitsRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_UnitsRepository->getById($id);
    }

    public function add($data)
    {
        $Units = $this->_UnitsRepository->add($data);
        $data['UnitsId'] = $Units->id;
        $this->_UnitsTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_UnitsRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_UnitsRepository->delete($id);
    }
}
