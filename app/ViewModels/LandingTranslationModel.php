<?php
namespace App\ViewModels;

use App\Services\CityTranslationService;
use App\Services\StateTranslationService;
use App\Services\LandingTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LandingTranslationModel implements ILandingTranslationModel
{
    private $_landingTranslationService;

    public function __construct(LandingTranslationService $service)
    {
        $this->_landingTranslationService = $service;
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
        return $this->_landingTranslationService->getById($data);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['content'] = $request->content;
        $this->_landingTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['landingId'] = $id;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['content'] = $request->content;
        $data['locale'] = $request->local;
        $this->_landingTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_landingTranslationService->delete($id);
    }
}
