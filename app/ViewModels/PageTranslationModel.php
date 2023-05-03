<?php
namespace App\ViewModels;

use App\Services\CityTranslationService;
use App\Services\StateTranslationService;
use App\Services\PageTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PageTranslationModel implements IPageTranslationModel
{
    private $_pageTranslationService;

    public function __construct(PageTranslationService $service)
    {
        $this->_pageTranslationService = $service;
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
        return $this->_pageTranslationService->getById($data);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['content'] = $request->content;
        $this->_pageTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['pageId'] = $id;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['content'] = $request->content;
        $data['locale'] = $request->local;
        $this->_pageTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_pageTranslationService->delete($id);
    }
}
