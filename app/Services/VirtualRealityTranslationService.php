<?php
namespace App\Services;

use App\Repositories\IVirtualRealityTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class VirtualRealityTranslationService
{
    private $_virtualrealityTranslationRepository;
    public function __construct(IVirtualRealityTranslationRepository $repository)
    {
        $this->_virtualrealityTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_virtualrealityTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $virtualrealityTranslation = $this->_virtualrealityTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($virtualrealityTranslation)) {
            $virtualrealityTranslation = $this->_virtualrealityTranslationRepository->getById($data);
        }

        return $virtualrealityTranslation;
    }

    public function getByLocale($locale)
    {
        $virtualrealityTranslation = $this->_virtualrealityTranslationRepository->getByLocale($locale);

        if (isset($virtualrealityTranslation)) {
            $virtualrealityTranslation = $this->_virtualrealityTranslationRepository->getByLocale('en');
        }
        return $virtualrealityTranslation;
    }

    public function update($data)
    {
        $this->_virtualrealityTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_virtualrealityTranslationRepository->delete($id);
    }
}