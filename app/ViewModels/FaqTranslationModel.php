<?php
namespace App\ViewModels;

use App\Services\CityTranslationService;
use App\Services\StateTranslationService;
use App\Services\FaqTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class FaqTranslationModel implements IFaqTranslationModel
{
    private $_faqTranslationService;

    public function __construct(FaqTranslationService $service)
    {
        $this->_faqTranslationService = $service;
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
        return $this->_faqTranslationService->getById($data);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $data['question'] = $request->question;
        $data['description'] = $request->description;
        $this->_faqTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['faqId'] = $id;
        $data['name'] = $request->name;
        $data['question'] = $request->question;
        $data['description'] = $request->description;
        $data['locale'] = $request->local;
        $this->_faqTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_faqTranslationService->delete($id);
    }
}
