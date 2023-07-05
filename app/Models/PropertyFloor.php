<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Session;

class PropertyFloor extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_details_id',
        'unit_id',
        'baths',
        'is_sold',
        'min_price',
        'max_price',
        'min_size',
        'max_size',
        'note_ar',
        'note_en',
        'ivr_link',
        'image',
    ];

    public function propertyDetails() : HasOne
    {
        return $this->hasOne(PropertyDetail::class,'id','property_details_id');
    }

    public function unit() : HasOne
    {
        return $this->hasOne(Units::class, 'id', 'unit_id');
    }
}
