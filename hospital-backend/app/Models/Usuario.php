<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'email',
        'password',
        'estado',
        'rol_id'
    ];

    protected $hidden = ['password'];

    // Relaciones
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    // Logs automáticos
    protected static function booted()
    {
        static::created(fn($u) => Log::info('Usuario creado', $u->toArray()));
        static::updated(fn($u) => Log::info('Usuario actualizado', $u->toArray()));
        static::deleted(fn($u) => Log::info('Usuario eliminado', $u->toArray()));
    }
}
