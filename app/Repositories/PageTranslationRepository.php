<?php
namespace App\Repositories;

use App\Models\PageTranslation;

class PageTranslationRepository implements IPageTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return PageTranslation::where('page_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {

    }

    public function add($data)
    {
        PageTranslation::create([
            'page_id'=> $data['pageId'],
            'locale'=> $data['locale'],
            'title'=>$data['title'],
            'description'=>$data['description'],
            'content'=>$data['content'],
        ]);
    }

    public function update($data)
    {
        PageTranslation::updateOrCreate(
            [
                'page_id' => $data['pageId'],
                'locale'    =>  $data['locale'],
            ], //condition
            [
                'title'=>$data['title'],
                'description'=>$data['description'],
                'content'=>$data['content'],
            ]
        );
    }

    public function delete($id)
    {
        PageTranslation::where('page_id',$id)->delete();
    }
}
