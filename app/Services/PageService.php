<?php
namespace App\Services;

use App\Repositories\IPageRepository;
use App\Repositories\IPageTranslationRepository;

class PageService
{
    private $_pageRepository;
    private $_pageTranslationRepository;

    public function __construct(IPageRepository $repository,IPageTranslationRepository $translationRepository)
    {
        $this->_pageRepository = $repository;
        $this->_pageTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_pageRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_pageRepository->getById($id);
    }

    public function add($data)
    {
        $page = $this->_pageRepository->add($data);
        $data['pageId'] = $page->id;
        $this->_pageTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_pageRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_pageRepository->delete($id);
    }
}
