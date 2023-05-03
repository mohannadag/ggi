<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Story extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'campaign_id', 'duration', 'type', 'file', 'file_thumb', 'link_title', 'link', 'status'];

    public function storyTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(StoryTranslation::class,'story_id')
            ->where('locale',$locale);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function storyTranslationEnglish()
    {
        return $this->hasOne(StoryTranslation::class,'story_id')
            ->where('locale','en');
    }
}
