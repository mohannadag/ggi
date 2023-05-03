<?php
namespace App\Services;

use App\Repositories\IStoryRepository;
use App\Repositories\IStoryTranslationRepository;

class StoryService
{
    private $_storyRepository;
    private $_storyTranslationRepository;

    public function __construct(IStoryRepository $repository,IStoryTranslationRepository $translationRepository)
    {
        $this->_storyRepository = $repository;
        $this->_storyTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_storyRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_storyRepository->getById($id);
    }

    public function add($data)
    {
        $story = $this->_storyRepository->add($data);
        $data['storyId'] = $story->id;
        $this->_storyTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_storyRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_storyRepository->delete($id);
    }
}
