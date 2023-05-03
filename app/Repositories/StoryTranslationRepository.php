<?php
namespace App\Repositories;

use App\Models\StoryTranslation;

class StoryTranslationRepository implements IStoryTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return StoryTranslation::where('story_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {

    }

    public function add($data)
    {
        StoryTranslation::create([
            'story_id'=> $data['storyId'],
            'locale'=> $data['locale'],
            'title'=>$data['title'],
            'link_title'=>$data['link_title'],
        ]);
    }

    public function update($data)
    {
        StoryTranslation::updateOrCreate(
            [
                'story_id' => $data['storyId'],
                'locale'    =>  $data['locale'],
            ], //condition
            [
                'title' => $data['title'],
                'link_title' => $data['link_title'],
            ]
        );
    }

    public function delete($id)
    {
        StoryTranslation::where('story_id',$id)->delete();
    }
}
