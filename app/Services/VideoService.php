<?php
namespace App\Services;

use App\Repositories\IVideoRepository;
use App\Repositories\IVideoTranslationRepository;

class VideoService
{
    private $_videoRepository;
    private $_videoTranslationRepository;

    public function __construct(IVideoRepository $repository,IVideoTranslationRepository $translationRepository)
    {
        $this->_videoRepository = $repository;
        $this->_videoTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_videoRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_videoRepository->getById($id);
    }

    public function add($data)
    {
        $video = $this->_videoRepository->add($data);
        $data['videoId'] = $video->id;
        $this->_videoTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_videoRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_videoRepository->delete($id);
    }
}
