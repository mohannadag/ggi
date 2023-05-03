<?php
namespace App\Services;

use App\Repositories\IServiceTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ServiceTranslationService
{
    private $_serviceTranslationRepository;
    public function __construct(IServiceTranslationRepository $repository)
    {
        $this->_serviceTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_serviceTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $serviceTranslation = $this->_serviceTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($serviceTranslation)) {
            $serviceTranslation = $this->_serviceTranslationRepository->getById($data);
        }

        return $serviceTranslation;
    }

    public function getByLocale($locale)
    {
        $serviceTranslation = $this->_serviceTranslationRepository->getByLocale($locale);

        if (isset($serviceTranslation)) {
            $serviceTranslation = $this->_serviceTranslationRepository->getByLocale('en');
        }
        return $serviceTranslation;
    }

    public function update($data)
    {
        $this->_serviceTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_serviceTranslationRepository->delete($id);
    }
}
