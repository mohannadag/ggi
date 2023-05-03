<?php
namespace App\ViewModels;

use App\Services\CityTranslationService;
use App\Services\StateTranslationService;
use App\Services\ServiceTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ServiceTranslationModel implements IServiceTranslationModel
{
    private $_serviceTranslationService;

    public function __construct(ServiceTranslationService $service)
    {
        $this->_serviceTranslationService = $service;
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
        return $this->_serviceTranslationService->getById($data);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $this->_serviceTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['serviceId'] = $id;
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['description'] = $request->description;
        $data['locale'] = $request->local;
        $this->_serviceTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_serviceTranslationService->delete($id);
    }
}
