<?php
namespace App\Services;

use App\Repositories\IFaqTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class FaqTranslationService
{
    private $_faqTranslationRepository;
    public function __construct(IFaqTranslationRepository $repository)
    {
        $this->_faqTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_faqTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $faqTranslation = $this->_faqTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($faqTranslation)) {
            $faqTranslation = $this->_faqTranslationRepository->getById($data);
        }

        return $faqTranslation;
    }

    public function getByLocale($locale)
    {
        $faqTranslation = $this->_faqTranslationRepository->getByLocale($locale);

        if (isset($faqTranslation)) {
            $faqTranslation = $this->_faqTranslationRepository->getByLocale('en');
        }
        return $faqTranslation;
    }

    public function update($data)
    {
        $this->_faqTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_faqTranslationRepository->delete($id);
    }
}
