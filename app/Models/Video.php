<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','description','file','status', 'order', 'link'];

    public function videoTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(VideoTranslation::class,'video_id')
            ->where('locale',$locale);
    }

    public function videoTranslationEnglish()
    {
        return $this->hasOne(VideoTranslation::class,'video_id')
            ->where('locale','en');
    }
}
