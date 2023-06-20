<?php
namespace App\ViewModels;

use App\Services\CityTranslationService;
use App\Services\StateTranslationService;
use App\Services\SliderTranslationService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SliderTranslationModel implements ISliderTranslationModel
{
    use ImageUpload;
    private $_sliderTranslationService;

    public function __construct(SliderTranslationService $service)
    {
        $this->_sliderTranslationService = $service;
    }

    public function getAll(Request $request)
    {
        // TODO: Implement getAll() method.
    }

    public function getById($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');

        $data['locale'] = $locale;
        $data['id'] = $id;
        return $this->_sliderTranslationService->getById($data);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $data['file'] = $request->file;
        $data['mobile_file'] = $request->mobile_file;
        $data['button_text'] = $request->input('button_text');
        $this->_sliderTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $data['sliderId'] = $id;
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['description'] = $request->description;
        //$data['file'] = $request->file;
        //$data['mobile_file'] = $request->mobile_file;
        $data['locale'] = $request->local;
        $data['button_text'] = $request->input('button_text');

        $slider  = $this->getById($id);


        //thumbnail image save end
        if ($request->hasFile('file')) {
            $thumbnailImage = $request->file('file');
            $thumbnailName = $this->imageUpdate($thumbnailImage, $request->name, $slider, 'images', 1920, 750);
            $data['file'] = $thumbnailName;
        }
        else {
            $data['file'] = $slider->file;
        }
        if ($request->hasFile('mobile_file')) {
            $mobileImage = $request->file('mobile_file');
            $mobileName = $this->imageUpdate($mobileImage, $request->name, $slider, 'images', 414, 485);
            $data['mobile_file'] = $mobileName;
        }
        else {
            $data['mobile_file'] = $slider->mobile_file;
        }
        $this->_sliderTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_sliderTranslationService->delete($id);
    }
}
