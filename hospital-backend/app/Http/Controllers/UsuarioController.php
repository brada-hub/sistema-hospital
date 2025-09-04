<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::with('rol')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'    => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'telefono'  => 'required|digits_between:7,15',
            'email'     => 'required|email|unique:usuarios,email',
            'password'  => 'required|string|min:6',
            'estado'    => 'required|boolean',
            'rol_id'    => 'required|exists:rols,id',
        ]);

        $data['password'] = Hash::make($data['password']);

        $usuario = Usuario::create($data);
        Log::info('Usuario creado manualmente', ['id' => $usuario->id]);

        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        return Usuario::with('rol')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $data = $request->validate([
            'nombre'    => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'telefono'  => 'required|digits_between:7,15',
            'email'     => 'required|email|unique:usuarios,email,' . $usuario->id,
            'password'  => 'nullable|string|min:6',
            'estado'    => 'required|boolean',
            'rol_id'    => 'required|exists:rols,id',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $usuario->update($data);
        Log::info('Usuario actualizado manualmente', ['id' => $usuario->id]);

        return response()->json($usuario, 200);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        Log::warning('Usuario eliminado', ['id' => $id]);
        return response()->noContent();
    }
}
