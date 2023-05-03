<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name','country_id','order','status', 'slug', 'image', 'description','Population', 'Area', 'Districts', 'Municipalities', 'Towns', 'Villages'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function properties()
    {
       return $this->hasMany(Property::class,'state_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'state_id');
    }

    public function stateTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(StateTranslation::class,'state_id')
            ->where('locale',$locale);
    }

    public function stateTranslationEnglish()
    {
        return $this->hasOne(StateTranslation::class,'state_id')
            ->where('locale','en');
    }
}
