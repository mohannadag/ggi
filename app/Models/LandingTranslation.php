<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingTranslation extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'landing_id',
            'title',
            'locale',
            'description',
            'content',
        ];
}
