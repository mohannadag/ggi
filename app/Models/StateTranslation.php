<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'state_id',
        'locale',
        'description',
        'name'
    ];
    public function State()
    {
        return $this->hasOne(State::class);
    }
}
