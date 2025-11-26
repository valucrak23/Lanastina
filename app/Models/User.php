<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modelo para los usuarios del sistema
 * Extiende Authenticatable para autenticación Laravel
 * Relación HasMany con BlogPost
 * 
 * @package App\Models
 */
class User extends Authenticatable
{
    use Notifiable;

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Campos ocultos en serialización (JSON)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts para tipos de datos
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relación HasMany con BlogPost
     * Un usuario puede tener muchos posts del blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class, 'user_id');
    }

    /**
     * Verifica si el usuario tiene rol de administrador
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
