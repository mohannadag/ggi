<?php
namespace App\Services;

use App\Repositories\IUnitsTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class UnitsTranslationService
{
    private $_UnitsTranslationRepository;
    public function __construct(IUnitsTranslationRepository $repository)
    {
        $this->_UnitsTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_UnitsTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));
        $UnitsTranslation = $this->_UnitsTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($UnitsTranslation)) {
            $UnitsTranslation = $this->_UnitsTranslationRepository->getById($data);
        }

        return $UnitsTranslation;
    }

    public function getByLocale($locale)
    {
        $UnitsTranslation = $this->_UnitsTranslationRepository->getByLocale($locale);

        if (isset($UnitsTranslation)) {
            $UnitsTranslation = $this->_UnitsTranslationRepository->getByLocale('en');
        }
        return $UnitsTranslation;
    }

    public function update($data)
    {
        $this->_UnitsTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_UnitsTranslationRepository->delete($id);
    }
}
