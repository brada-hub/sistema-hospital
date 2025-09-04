<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;

Route::apiResource('roles', RolController::class);
Route::get('/ping', function () {
    return response()->json(['pong' => true]);
});

Route::apiResource('usuarios', UsuarioController::class);
use App\Http\Controllers\PacienteController;

Route::apiResource('pacientes', PacienteController::class);
use App\Http\Controllers\InternacionController;

Route::apiResource('internaciones', InternacionController::class);
use App\Http\Controllers\MedicamentoController;

Route::apiResource('medicamentos', MedicamentoController::class);
use App\Http\Controllers\SignoController;

Route::apiResource('signos', SignoController::class);
use App\Http\Controllers\AlimentacionController;

Route::apiResource('alimentaciones', AlimentacionController::class);
use App\Http\Controllers\HospitalController;

Route::apiResource('hospitals', HospitalController::class);
use App\Http\Controllers\TratamientoController;

Route::apiResource('tratamientos', TratamientoController::class);
use App\Http\Controllers\ControlController;

Route::apiResource('controls', ControlController::class);
use App\Http\Controllers\ValorController;

Route::apiResource('valores', ValorController::class);
use App\Http\Controllers\ConsumeController;

Route::apiResource('consumes', ConsumeController::class);
use App\Http\Controllers\CuidadoController;

Route::apiResource('cuidados', CuidadoController::class);
use App\Http\Controllers\EspecialidadController;

Route::apiResource('especialidades', EspecialidadController::class);
use App\Http\Controllers\SalaController;

Route::apiResource('salas', SalaController::class);
use App\Http\Controllers\CamaController;

Route::apiResource('camas', CamaController::class);
use App\Http\Controllers\OcupacionController;

Route::apiResource('ocupaciones', OcupacionController::class);
use App\Http\Controllers\RecetaController;

Route::apiResource('recetas', RecetaController::class);
use App\Http\Controllers\AdministraController;

Route::apiResource('administraciones', AdministraController::class);

use App\Http\Controllers\CuidadoAplicadoController;

Route::apiResource('cuidados-aplicados', CuidadoAplicadoController::class);
