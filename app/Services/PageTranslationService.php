<?php
namespace App\Services;

use App\Repositories\IPageTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PageTranslationService
{
    private $_pageTranslationRepository;
    public function __construct(IPageTranslationRepository $repository)
    {
        $this->_pageTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_pageTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $pageTranslation = $this->_pageTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($pageTranslation)) {
            $pageTranslation = $this->_pageTranslationRepository->getById($data);
        }

        return $pageTranslation;
    }

    public function getByLocale($locale)
    {
        $pageTranslation = $this->_pageTranslationRepository->getByLocale($locale);

        if (isset($pageTranslation)) {
            $pageTranslation = $this->_pageTranslationRepository->getByLocale('en');
        }
        return $pageTranslation;
    }

    public function update($data)
    {
        $this->_pageTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_pageTranslationRepository->delete($id);
    }
}
