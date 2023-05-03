<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitsTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['units_id','locale','name'];
}
