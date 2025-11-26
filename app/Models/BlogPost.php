<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modelo para los posts del blog
 * 
 * @package App\Models
 */
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
        'published_at',
        'user_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Relación con el usuario autor del post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

