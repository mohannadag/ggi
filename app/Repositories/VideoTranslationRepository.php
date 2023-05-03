<?php
namespace App\Repositories;

use App\Models\VideoTranslation;

class VideoTranslationRepository implements IVideoTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return VideoTranslation::where('video_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {

    }

    public function add($data)
    {
        VideoTranslation::create([
            'video_id'=> $data['videoId'],
            'locale'=> $data['locale'],
            'name'=>$data['name'],
            'address'=>$data['address'],
            'description'=>$data['description'],
        ]);
    }

    public function update($data)
    {
        VideoTranslation::updateOrCreate(
            [
                'video_id' => $data['videoId'],
                'locale'    =>  $data['locale'],
            ], //condition
            [
                'name' => $data['name'],
                'address' => $data['address'],
                'description' => $data['description'],
            ]
        );
    }

    public function delete($id)
    {
        VideoTranslation::where('video_id',$id)->delete();
    }
}
