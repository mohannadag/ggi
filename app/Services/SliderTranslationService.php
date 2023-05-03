<?php
namespace App\Services;

use App\Repositories\ISliderTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SliderTranslationService
{
    private $_sliderTranslationRepository;
    public function __construct(ISliderTranslationRepository $repository)
    {
        $this->_sliderTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_sliderTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $sliderTranslation = $this->_sliderTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($sliderTranslation)) {
            $sliderTranslation = $this->_sliderTranslationRepository->getById($data);
        }

        return $sliderTranslation;
    }

    public function getByLocale($locale)
    {
        $sliderTranslation = $this->_sliderTranslationRepository->getByLocale($locale);

        if (isset($sliderTranslation)) {
            $sliderTranslation = $this->_sliderTranslationRepository->getByLocale('en');
        }
        return $sliderTranslation;
    }

    public function update($data)
    {
        $this->_sliderTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_sliderTranslationRepository->delete($id);
    }
}
