<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modelo para los posts del blog
 * Representa los artículos y tutoriales del blog
 * Relación BelongsTo con User (autor)
 * 
 * @package App\Models
 */
class BlogPost extends Model
{
    protected $table = 'blog_posts';

    protected $primaryKey = 'post_id';

    // Campos que pueden ser asignados masivamente
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

    // Casts para tipos de datos
    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Relación BelongsTo con User
     * Cada post pertenece a un usuario (autor)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

