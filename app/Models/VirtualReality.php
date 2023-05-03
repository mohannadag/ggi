<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class VirtualReality extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','description','file','status', 'order', 'link', 'frame_link', 'first_name', 'first_link', 'second_name', 'second_link', 'third_name', 'third_link', ];

    public function virtualrealityTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(VirtualRealityTranslation::class,'virtualreality_id')
            ->where('locale',$locale);
    }

    public function virtualrealityTranslationEnglish()
    {
        return $this->hasOne(VirtualRealityTranslation::class,'virtualreality_id')
            ->where('locale','en');
    }
}
