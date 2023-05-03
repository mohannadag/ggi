<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','description','file','status'];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function serviceTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(ServiceTranslation::class,'service_id')
            ->where('locale',$locale);
    }

    public function serviceTranslationEnglish()
    {
        return $this->hasOne(ServiceTranslation::class,'service_id')
            ->where('locale','en');
    }
}
