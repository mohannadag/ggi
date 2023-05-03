<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'slider_id',
            'name',
            'locale',
            'file',
            'mobile_file',
            'address',
            'description',
            'button_title',
        ];
}
