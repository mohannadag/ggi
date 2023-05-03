<?php
namespace App\ViewModels;

use App\Services\UnitsTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class UnitsTranslationModel implements IUnitsTranslationModel
{
    private $_UnitsTranslationService;

    public function __construct(UnitsTranslationService $service)
    {
        $this->_UnitsTranslationService = $service;
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
        return $this->_UnitsTranslationService->getById($data);
    }

    public function getByLocale()
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        return $this->_UnitsTranslationService->getByLocale($locale);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $this->_UnitsTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['UnitsId'] = $id;
        $data['name'] = $request->name;
        $data['locale'] = $request->local;
        $this->_UnitsTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_UnitsTranslationService->delete($id);
    }
}
