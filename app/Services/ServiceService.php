<?php
namespace App\Services;

use App\Repositories\IServiceRepository;
use App\Repositories\IServiceTranslationRepository;

class ServiceService
{
    private $_serviceRepository;
    private $_serviceTranslationRepository;

    public function __construct(IServiceRepository $repository,IServiceTranslationRepository $translationRepository)
    {
        $this->_serviceRepository = $repository;
        $this->_serviceTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_serviceRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_serviceRepository->getById($id);
    }

    public function add($data)
    {
        $service = $this->_serviceRepository->add($data);
        $data['serviceId'] = $service->id;
        $this->_serviceTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_serviceRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_serviceRepository->delete($id);
    }
}
