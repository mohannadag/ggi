<?php
namespace App\Services;

use App\Repositories\IStoryTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class StoryTranslationService
{
    private $_storyTranslationRepository;
    public function __construct(IStoryTranslationRepository $repository)
    {
        $this->_storyTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_storyTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $storyTranslation = $this->_storyTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($storyTranslation)) {
            $storyTranslation = $this->_storyTranslationRepository->getById($data);
        }

        return $storyTranslation;
    }

    public function getByLocale($locale)
    {
        $storyTranslation = $this->_storyTranslationRepository->getByLocale($locale);

        if (isset($storyTranslation)) {
            $storyTranslation = $this->_storyTranslationRepository->getByLocale('en');
        }
        return $storyTranslation;
    }

    public function update($data)
    {
        $this->_storyTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_storyTranslationRepository->delete($id);
    }
}
