<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;
    protected $fillable = [
        'nombrerol', // Nombre del rol
        'descripcionrol', // Descripción del rol
    ];
    public function users()
    {
        return $this->hasMany(User::class); // Un rol puede tener muchos usuarios
    }
}
