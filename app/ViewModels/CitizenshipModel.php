<?php

namespace App\ViewModels;

use App\Services\CitizenshipService;
use App\Traits\ImageUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CitizenshipModel implements ICitizenshipModel
{
    use ImageUpload;
    private $_citizenshipService;
    public function __construct(CitizenshipService $service)
    {
        $this->_citizenshipService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        return $this->_citizenshipService->getAll();
    }

    public function getById($id)
    {
        return $this->_citizenshipService->getById($id);
    }

    public function add(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $data['title'] = $request->input('title');
        $data['banner_text'] = $request->input('banner_text');
        $data['main_button_link'] = $request->input('main_button_link');
        $data['main_button_text'] = $request->input('main_button_text');
        $data['extra_button_link'] = $request->input('extra_button_link');
        $data['extra_button_text'] = $request->input('extra_button_text');
        $thumbnailImage = $request->file('file');
        $slug = $request->input('title');
        $thumbnailName = $this->imageUpload($thumbnailImage, $slug, 'images', 1920, 750);
        $data['file'] = $thumbnailName;
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
        $citizenship = $this->_citizenshipService->getById(1);
        $id = $citizenship->id;

        $this->_citizenshipService->add($data);
    }

    public function update(Request $request, $id)
    {
        $id = '1';
        $data['title'] = $request->input('title');
        $data['banner_text'] = $request->input('banner_text');
        $data['main_button_link'] = $request->input('main_button_link');
        $data['main_button_text'] = $request->input('main_button_text');
        $data['extra_button_link'] = $request->input('extra_button_link');
        $data['extra_button_text'] = $request->input('extra_button_text');
        $thumbnailImage = $request->file('file');
        $slug = $request->input('title');
        $thumbnailName = $this->imageUpload($thumbnailImage, $slug, 'images', 1920, 750);
        $data['file'] = $thumbnailName;
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
        $citizenshipId = $this->_citizenshipService->getById(1);

        $this->_citizenshipService->update($data, $id);
    }


    public function delete($id)
    {
        $citizenship  = $this->getById($id);
        Storage::disk('public')->delete("images/{$citizenship->image}");
        $this->_citizenshipService->delete($id);
    }
}
