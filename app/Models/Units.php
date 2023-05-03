<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Units extends Model
{
    use HasFactory;

    protected $fillable = ['name','icon','status'];

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    public function UnitsTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(UnitsTranslation::class,'units_id')
            ->where('locale',$locale);
    }

    public function UnitsTranslationEnglish()
    {
        return $this->hasOne(UnitsTranslation::class,'units_id')
            ->where('locale','en');
    }
}
