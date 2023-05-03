<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content','description','file', 'status'];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function pageTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(PageTranslation::class,'page_id')
            ->where('locale',$locale);
    }

    public function pageTranslationEnglish()
    {
        return $this->hasOne(PageTranslation::class,'page_id')
            ->where('locale','en');
    }

    public function sliders()
    {
        return $this->belongsToMany(Slider::class)->withPivot('slider_id');
    }
}
