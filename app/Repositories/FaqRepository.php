<?php
namespace App\Repositories;

use App\Models\Faq;

class FaqRepository implements IFaqRepository
{
    public function getAll()
    {
        return Faq::with(['faqTranslation','faqTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  Faq::find($id);
    }

    public function add($data)
    {
        return Faq::create($data);
    }
    public function update($data,$id)
    {

        $faq = $this->getById($id);
        $faq->update($data);
    }

    public function delete($id)
    {
        $faq = Faq::find($id);
        $faq->delete();
    }
}
