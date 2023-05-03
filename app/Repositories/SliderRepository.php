<?php
namespace App\Repositories;

use App\Models\Slider;

class SliderRepository implements ISliderRepository
{
    public function getAll()
    {
        return Slider::with(['sliderTranslation','sliderTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  Slider::find($id);
    }

    public function add($data)
    {
        return Slider::create($data);
    }
    public function update($data,$id)
    {

        $slider = $this->getById($id);
        $slider->update($data);
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
    }
}
