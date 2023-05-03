<?php
namespace App\Services;

use App\Repositories\IVideoTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class VideoTranslationService
{
    private $_videoTranslationRepository;
    public function __construct(IVideoTranslationRepository $repository)
    {
        $this->_videoTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_videoTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $videoTranslation = $this->_videoTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($videoTranslation)) {
            $videoTranslation = $this->_videoTranslationRepository->getById($data);
        }

        return $videoTranslation;
    }

    public function getByLocale($locale)
    {
        $videoTranslation = $this->_videoTranslationRepository->getByLocale($locale);

        if (isset($videoTranslation)) {
            $videoTranslation = $this->_videoTranslationRepository->getByLocale('en');
        }
        return $videoTranslation;
    }

    public function update($data)
    {
        $this->_videoTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_videoTranslationRepository->delete($id);
    }
}
