<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['name','parent_id','order','status','is_default','description'];

    public function parentCampaign()
    {
        return $this->belongsTo(Campaign::class,'parent_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class)->where('moderation_status',1);
    }

    public function campaignTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(CampaignTranslation::class,'campaign_id')
            ->where('locale',$locale);
    }

    public function campaignTranslationEnglish()
    {
        return $this->hasOne(CampaignTranslation::class,'campaign_id')
            ->where('locale','en');
    }
}
