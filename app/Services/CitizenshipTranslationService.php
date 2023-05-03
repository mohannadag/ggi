<?php
namespace App\Services;

use App\Repositories\ICitizenshipTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CitizenshipTranslationService
{
    private $_citizenshipTranslationRepository;
    public function __construct(ICitizenshipTranslationRepository $repository)
    {
        $this->_citizenshipTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_citizenshipTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $citizenshipTranslation = $this->_citizenshipTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($citizenshipTranslation)) {
            $citizenshipTranslation = $this->_citizenshipTranslationRepository->getById($data);
        }

        return $citizenshipTranslation;
    }

    public function getByLocale($locale)
    {
        $citizenshipTranslation = $this->_citizenshipTranslationRepository->getByLocale($locale);

        if (isset($citizenshipTranslation)) {
            $citizenshipTranslation = $this->_citizenshipTranslationRepository->getByLocale('en');
        }
        return $citizenshipTranslation;
    }

    public function update($data)
    {
        $this->_citizenshipTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_citizenshipTranslationRepository->delete($id);
    }
}
