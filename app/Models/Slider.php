<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','description','file','status', 'link', 'button_text', 'order', 'mobile_file'];

    public function sliderTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(SliderTranslation::class,'slider_id')
            ->where('locale',$locale);
    }

    public function sliderTranslationEnglish()
    {
        return $this->hasOne(SliderTranslation::class,'slider_id')
            ->where('locale','en');
    }
}
