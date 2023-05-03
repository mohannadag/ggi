<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoTranslation extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'video_id',
            'name',
            'locale',
            'address',
            'description',
        ];
}
