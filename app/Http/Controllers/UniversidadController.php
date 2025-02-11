<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UniversidadController extends Controller
{
    public function index(){
        $response = Http::get('http://localhost:3000/api/universidades');
        if ($response->successful()) {
            $data = $response->json(); 
            return view('universidad.index', compact('data')); 
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function show($id_universidad){
        $response = Http::get('http://localhost:3000/api/universidades/'. $id_universidad);
        if ($response->successful()) {
            $data = $response->json();
            return view('universidad.show', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function create(){
        return view('universidad.create');
    }
    
    public function store(Request $request)
{
    //dd($request->all());
    $response = Http::post('http://localhost:3000/api/uni/', [
        'nombre' => $request->nombre,
        'clave' => $request->clave,
    ]);

    if ($response->successful()) {
        $data = $response->json();
        $id_universidad = $data['id_universidad'] ?? null; 
        if ($id_universidad) {
            return redirect()->route('universidad.show', $id_universidad);
        }
    }

    return redirect()->route('universidad.index')->with('error', 'No se pudo crear el registro.');
}


public function edit($id_universidad)
    {
        $response = Http::get('http://localhost:3000/api/universidades/' . $id_universidad);
        $datos = $response->json();
        return view('universidad.edit', compact('datos'));
    }

    public function update($id_universidad, Request $request)
    {
        $data = [
            'nombre' => $request->nombre,
            'clave' => $request->clave,
        ];

        $response = Http::put('http://localhost:3000/api/universidades/' . $id_universidad, $data);

        if ($response->successful()) {
            return redirect()->route('universidad.show', $id_universidad);
        } else {
            return response()->json(['error' => 'Error al actualizar los datos'], 500);
        }
    }

    public function delete($id_universidad)
{
    // Verifica que el ID sea válido
    if (!$id_universidad || !is_numeric($id_universidad)) {
        return response()->json(['error' => 'ID de alumno no válido'], 400);
    }

    try {
        // Realizamos la solicitud DELETE a la API
        $response = Http::delete("http://localhost:3000/api/uni/{$id_universidad}");

        // Verificamos el código de estado de la respuesta
        if ($response->successful()) {
            return redirect()->route('universidad.index');
        } elseif ($response->status() == 404) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        } else {
            return response()->json(['error' => 'Error al eliminar el recurso'], $response->status());
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error en la conexión con la API'], 500);
    }
}
}
