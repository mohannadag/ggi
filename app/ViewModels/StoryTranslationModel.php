<?php
namespace App\ViewModels;

use App\Services\StoryTranslationService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class StoryTranslationModel implements IStoryTranslationModel
{
    use ImageUpload;
    private $_storyTranslationService;

    public function __construct(StoryTranslationService $service)
    {
        $this->_storyTranslationService = $service;
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
        return $this->_storyTranslationService->getById($data);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['title'] = $request->title;
        $data['link_title'] = $request->link_title;
        $photoImage = $request->file('file');
        $slug = $request->input('title');
        $photoName = $this->imageUpload($photoImage,$slug,'stories/', 1080, 1920);
        $data['file'] = $photoName;
        $this->_storyTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['storyId'] = $id;
        $data['title'] = $request->title;
        $data['link_title'] = $request->link_title;
        $data['locale'] = $request->local;
        $slug = $request->input('title');

        $story  = $this->getById($id);
        //$photoImage = $request->file('file');
        //$photoName = $this->imageUpdate($photoImage,$slug,$story,'stories', 1080, 1920);

        if ($request->hasFile('file')) {
            $thumbnailImage = $request->file('file');
            $thumbnailName = $this->imageUpdate($thumbnailImage, $request->title, $story, 'stories', 1080, 1920);
            $data['file'] = $thumbnailName;
        }
        else {
            $data['file'] = $story->file;
        }

        //$data['file'] = $photoName;
        $this->_storyTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_storyTranslationService->delete($id);
    }
}
