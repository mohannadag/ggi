<?php
namespace App\Repositories;

use App\Models\Campaign;

class CampaignRepository implements ICampaignRepository
{
    public function getAllCampaign()
    {
        return Campaign::with(['campaignTranslation','campaignTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getCampaignById($id)
    {
        return  Campaign::find($id);
    }

    public function add($data)
    {
       return Campaign::create($data);
    }
    public function update($data,$id)
    {
        $campaign = $this->getCampaignById($id);;
        $campaign->update($data);
    }

    public function delete($id)
    {
        $campaign = Campaign::find($id);
        $campaign->delete();
    }
}
