<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rols'; // si estás usando "rols" en lugar de "roles"
    protected $fillable = ['nombre', 'descripcion'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }

    protected static function booted()
    {
        static::created(function ($rol) {
            Log::info('Rol creado: ', $rol->toArray());
        });

        static::updated(function ($rol) {
            Log::info('Rol actualizado: ', $rol->toArray());
        });

        static::deleted(function ($rol) {
            Log::info('Rol eliminado: ', $rol->toArray());
        });
    }
}
