<?php
namespace App\Services;

use App\Repositories\ICitizenshipRepository;
use App\Repositories\ICitizenshipTranslationRepository;

class CitizenshipService
{
    private $_citizenshipRepository;
    private $_citizenshipTranslationRepository;

    public function __construct(ICitizenshipRepository $repository,ICitizenshipTranslationRepository $translationRepository)
    {
        $this->_citizenshipRepository = $repository;
        $this->_citizenshipTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_citizenshipRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_citizenshipRepository->getById($id);
    }

    public function add($data)
    {
        $this->_citizenshipRepository->add($data);
        $this->_citizenshipTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_citizenshipRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_citizenshipRepository->delete($id);
    }
}
