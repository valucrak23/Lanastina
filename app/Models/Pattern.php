<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo para los patrones de crochet
 * Representa los productos de la tienda
 * 
 * @package App\Models
 */
class Pattern extends Model
{
    protected $table = 'patterns';

    protected $primaryKey = 'pattern_id';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'description',
        'price',
        'difficulty',
        'category',
        'image'
    ];
}

