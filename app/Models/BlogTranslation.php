<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class BlogTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'locale',
        'title',
        'slug',
        'body',
        'description'
    ];

    public function blog()
    {
        return $this->hasOne(Blog::class,'id');
    }

    public function blogCategory()
    {
        return $this->hasOneThrough(BlogCategory::class, Blog::class, 'category_id', 'id');
        // return $this->through('blogs')->has('blog_categories');
    }

    public function blogUser() : HasOneThrough
    {
        return $this->hasOneThrough(User::class, Blog::class, 'id', 'id', 'user_id', 'id');
        // return $this->through('blogs')->has('blog_categories');
    }
}
