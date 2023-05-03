<?php
namespace App\Repositories;

use App\Models\CampaignTranslation;
use App\Repositories\ICampaignTranslationRepository;

class CampaignTranslationRepository implements ICampaignTranslationRepository
{
    public function getAllCampaignTranslation()
    {
        return CampaignTranslation::all();
    }

    public function getCampaignTranslationById($data)
    {
      return CampaignTranslation::where('campaign_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {
        return CampaignTranslation::where('locale',$locale)->get();
    }
    public function add($data)
    {
        CampaignTranslation::create([
            'campaign_id'=>$data['campaignId'],
            'locale'=>$data['locale'],
            'name'=>$data['name']
        ]);
    }
    public function update($data)
    {
        CampaignTranslation::updateOrCreate(
            [
                'campaign_id' => $data['campaignId'],
                'locale'    => $data['locale'],
            ], //condition
            [
                'name'=>$data['name']
            ]
        );
    }

    public function delete($id)
    {
        CampaignTranslation::where('category_id',$id)->delete();
    }
}
