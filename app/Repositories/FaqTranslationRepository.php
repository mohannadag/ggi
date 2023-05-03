<?php
namespace App\Repositories;

use App\Models\FaqTranslation;

class FaqTranslationRepository implements IFaqTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return FaqTranslation::where('faq_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {

    }

    public function add($data)
    {
        FaqTranslation::create([
            'faq_id'=> $data['faqId'],
            'locale'=> $data['locale'],
            'question'=>$data['question'],
            'description'=>$data['description'],
        ]);
    }

    public function update($data)
    {
        FaqTranslation::updateOrCreate(
            [
                'faq_id' => $data['faqId'],
                'locale'    =>  $data['locale'],
            ], //condition
            [
                'question' => $data['question'],
                'description' => $data['description'],
            ]
        );
    }

    public function delete($id)
    {
        FaqTranslation::where('faq_id',$id)->delete();
    }
}
