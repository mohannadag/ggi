<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name','order','status'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tag',  'tag_id', 'blog_id');
    }

    public function properties(){
        return $this->belongsToMany(Property::class, 'tag_property', 'tag_id', 'property_id');
    }

    public function tagTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(TagTranslation::class,'tag_id')
            ->where('locale',$locale);
    }

    public function tagTranslationEnglish()
    {
        return $this->hasOne(TagTranslation::class,'tag_id')
            ->where('locale','EN');
    }
}
