<?php
namespace App\Services;

use App\Repositories\ISliderRepository;
use App\Repositories\ISliderTranslationRepository;

class SliderService
{
    private $_sliderRepository;
    private $_sliderTranslationRepository;

    public function __construct(ISliderRepository $repository,ISliderTranslationRepository $translationRepository)
    {
        $this->_sliderRepository = $repository;
        $this->_sliderTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_sliderRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_sliderRepository->getById($id);
    }

    public function add($data)
    {
        $slider = $this->_sliderRepository->add($data);
        $data['sliderId'] = $slider->id;
        $this->_sliderTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_sliderRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_sliderRepository->delete($id);
    }
}
