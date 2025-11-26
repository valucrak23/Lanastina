<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo para los patrones de crochet
 * 
 * @package App\Models
 */
class Pattern extends Model
{
    protected $table = 'patterns';

    protected $primaryKey = 'pattern_id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'difficulty',
        'category',
        'image'
    ];
}

