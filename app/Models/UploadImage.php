<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'experience',
        'gender',
        'nationality',
        'companies',
        'image',
    ];
}
