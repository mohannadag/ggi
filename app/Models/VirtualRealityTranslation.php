<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualRealityTranslation extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'virtualreality_id',
            'name',
            'locale',
            'address',
            'description',
        ];
}
