<?php

namespace App\ViewModels;

use App\Services\CitizenshipTranslationService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CitizenshipTranslationModel implements ICitizenshipTranslationModel
{
    use ImageUpload;
    private $_citizenshipTranslationService;

    public function __construct(CitizenshipTranslationService $service)
    {
        $this->_citizenshipTranslationService = $service;
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
        return $this->_citizenshipTranslationService->getById($data);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['banner_text'] = $request->input('title');
        $data['banner_text'] = $request->input('banner_text');
        $data['main_button_link'] = $request->input('main_button_link');
        $data['main_button_text'] = $request->input('main_button_text');
        $data['extra_button_link'] = $request->input('extra_button_link');
        $data['extra_button_text'] = $request->input('extra_button_text');
        $data['overview_title'] = $request->input('overview_title');
        $data['overview_desc'] = $request->input('overview_desc');
        $data['overview_first_title'] = $request->input('overview_first_title');
        $data['overview_first_desc'] = $request->input('overview_first_desc');
        $data['overview_second_title'] = $request->input('overview_second_title');
        $data['overview_second_desc'] = $request->input('overview_second_desc');
        $data['overview_third_title'] = $request->input('overview_third_title');
        $data['overview_third_desc'] = $request->input('overview_third_desc');
        $data['obtaining_text'] = $request->input('obtaining_text');
        $data['acquisition_text'] = $request->input('acquisition_text');
        $data['documents_text'] = $request->input('documents_text');
        $data['stages_text'] = $request->input('stages_text');
        $data['obtaining_title'] = $request->input('obtaining_title');
        $data['acquisition_title'] = $request->input('acquisition_title');
        $data['documents_title'] = $request->input('documents_title');
        $data['stages_title'] = $request->input('stages_title');
    }

    public function update(Request $request, $id)
    {
        $data['citizenshipId'] = 1;
        $data['title'] = $request->title;
        $data['locale'] = $request->locale;
        $data['banner_text'] = $request->input('banner_text');
        $data['main_button_link'] = $request->input('main_button_link');
        $data['main_button_text'] = $request->input('main_button_text');
        $data['extra_button_link'] = $request->input('extra_button_link');
        $data['extra_button_text'] = $request->input('extra_button_text');
        $data['overview_title'] = $request->input('overview_title');
        $data['overview_desc'] = $request->input('overview_desc');
        $data['overview_first_title'] = $request->input('overview_first_title');
        $data['overview_first_desc'] = $request->input('overview_first_desc');
        $data['overview_second_title'] = $request->input('overview_second_title');
        $data['overview_second_desc'] = $request->input('overview_second_desc');
        $data['overview_third_title'] = $request->input('overview_third_title');
        $data['overview_third_desc'] = $request->input('overview_third_desc');
        $data['obtaining_text'] = $request->input('obtaining_text');
        $data['acquisition_text'] = $request->input('acquisition_text');
        $data['documents_text'] = $request->input('documents_text');
        $data['stages_text'] = $request->input('stages_text');
        $data['obtaining_title'] = $request->input('obtaining_title');
        $data['acquisition_title'] = $request->input('acquisition_title');
        $data['documents_title'] = $request->input('documents_title');
        $data['stages_title'] = $request->input('stages_title');
        $this->_citizenshipTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_citizenshipTranslationService->delete($id);
    }
}
