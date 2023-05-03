<?php
namespace App\Repositories;

use App\Models\LandingTranslation;

class LandingTranslationRepository implements ILandingTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return LandingTranslation::where('landing_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {

    }

    public function add($data)
    {
        LandingTranslation::create([
            'landing_id'=> $data['landingId'],
            'locale'=> $data['locale'],
            'title'=>$data['title'],
            'description'=>$data['description'],
            'content'=>$data['content'],
        ]);
    }

    public function update($data)
    {
        LandingTranslation::updateOrCreate(
            [
                'landing_id' => $data['landingId'],
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
        LandingTranslation::where('landing_id',$id)->delete();
    }
}
