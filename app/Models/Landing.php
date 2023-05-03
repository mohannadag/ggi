<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Landing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content','description','file', 'status', 'projects_id', 'faqs_id', 'sliders_id'];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function landingTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(LandingTranslation::class,'landing_id')
            ->where('locale',$locale);
    }

    public function landingTranslationEnglish()
    {
        return $this->hasOne(LandingTranslation::class,'landing_id')
            ->where('locale','en');
    }

    public function sliders()
    {
        return $this->belongsToMany(Slider::class)->withPivot('slider_id');
    }
}
