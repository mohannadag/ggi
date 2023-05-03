<?php
namespace App\ViewModels;

use App\Services\CityTranslationService;
use App\Services\StateTranslationService;
use App\Services\VirtualRealityTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class VirtualRealityTranslationModel implements IVirtualRealityTranslationModel
{
    private $_virtualrealityTranslationService;

    public function __construct(VirtualRealityTranslationService $service)
    {
        $this->_virtualrealityTranslationService = $service;
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
        return $this->_virtualrealityTranslationService->getById($data);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $this->_virtualrealityTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['virtualrealityId'] = $id;
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['description'] = $request->description;
        $data['locale'] = $request->local;
        $this->_virtualrealityTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_virtualrealityTranslationService->delete($id);
    }
}