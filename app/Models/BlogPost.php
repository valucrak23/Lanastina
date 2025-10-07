<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog_posts';

    protected $primaryKey = 'post_id';

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'author',
        'category',
        'image',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}

