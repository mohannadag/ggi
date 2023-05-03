<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = ['category','description','question','status', 'order', 'gorder'];

    public function faqTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(FaqTranslation::class,'faq_id')
            ->where('locale',$locale);
    }

    public function faqTranslationEnglish()
    {
        return $this->hasOne(FaqTranslation::class,'faq_id')
            ->where('locale','en');
    }
}
