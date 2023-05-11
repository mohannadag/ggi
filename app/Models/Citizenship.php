<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Citizenship extends Model
{
    use HasFactory;

    protected $fillable = [
        'citizenship_id',
        'title',
        'locale',
        'banner_text',
        'main_button_link',
        'main_button_text',
        'extra_button_link',
        'extra_button_text',
        'file',
        'overview_title',
        'overview_desc',
        'overview_first_title',
        'overview_first_desc',
        'overview_second_title',
        'overview_second_desc',
        'overview_third_title',
        'overview_third_desc',
        'obtaining_text',
        'acquisition_text',
        'documents_text',
        'stages_text',
    ];

    public function citizenshipTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(CitizenshipTranslation::class)
            ->where('locale', $locale);
    }

    public function citizenshipTranslationEnglish()
    {
        return $this->hasOne(CitizenshipTranslation::class)
            ->where('locale', 'en');
    }
}



