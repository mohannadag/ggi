<?php
namespace App\Services;

use App\Repositories\IFaqRepository;
use App\Repositories\IFaqTranslationRepository;

class FaqService
{
    private $_faqRepository;
    private $_faqTranslationRepository;

    public function __construct(IFaqRepository $repository,IFaqTranslationRepository $translationRepository)
    {
        $this->_faqRepository = $repository;
        $this->_faqTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_faqRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_faqRepository->getById($id);
    }

    public function add($data)
    {
        $faq = $this->_faqRepository->add($data);
        $data['faqId'] = $faq->id;
        $this->_faqTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_faqRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_faqRepository->delete($id);
    }
}
