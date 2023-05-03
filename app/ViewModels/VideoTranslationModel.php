<?php
namespace App\ViewModels;

use App\Services\CityTranslationService;
use App\Services\StateTranslationService;
use App\Services\VideoTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class VideoTranslationModel implements IVideoTranslationModel
{
    private $_videoTranslationService;

    public function __construct(VideoTranslationService $service)
    {
        $this->_videoTranslationService = $service;
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
        return $this->_videoTranslationService->getById($data);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $this->_videoTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['videoId'] = $id;
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['description'] = $request->description;
        $data['locale'] = $request->local;
        $this->_videoTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_videoTranslationService->delete($id);
    }
}
