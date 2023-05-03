<?php
namespace App\Repositories;

use App\Models\Story;

class StoryRepository implements IStoryRepository
{
    public function getAll()
    {
        return Story::with(['campaign.campaignTranslation', 'storyTranslation','storyTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  Story::find($id);
    }

    public function add($data)
    {
        return Story::create($data);
    }
    public function update($data,$id)
    {

        $story = $this->getById($id);
        $story->update($data);
    }

    public function getByCampaign($id)
    {
        return Story::where('campaign_id',$id)->first();
    }

    public function delete($id)
    {
        $story = Story::find($id);
        $story->delete();
    }
}
