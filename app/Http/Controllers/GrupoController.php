<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GrupoController extends Controller
{
    public function index(){
        $response = Http::get('http://localhost:3000/api/grupos/');
        if ($response->successful()) {
            $data = $response->json();
            return view('grupo.index', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function show($id_grupo){
        $response = Http::get('http://localhost:3000/api/grupos/'. $id_grupo);
        if ($response->successful()) {
            $datos = $response->json();
            return view('grupo.show', compact('datos'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function create(){
        $response = Http::get('http://localhost:3000/api/carreras');
        $carreras = $response->json();
        return view('grupo.create', compact('carreras'));
    }
    
    public function store(Request $request)
{
    $response = Http::post('http://localhost:3000/api/grupos/', [
        'nombre' => $request->nombre,
        'clave' => $request->clave,
        'estatus' => $request->estatus,
        'id_carrera1' => $request->carrera
    ]);

    if ($response->successful()) {
        $data = $response->json(); // Obtiene el JSON de la respuesta
        $id_grupo = $data['id_grupo'] ?? null; // Extrae el ID del registro (asegúrate de que el API lo devuelva)

        if ($id_grupo) {
            return redirect()->route('grupo.show', $id_grupo);
        }
    }

    return redirect()->route('grupo.index')->with('error', 'No se pudo crear el registro.');
}


public function edit($id_grupo)
{
    // Obtener los datos de la carrera
    $responseCarrera = Http::get('http://localhost:3000/api/grupos/' . $id_grupo);
    $xd = $responseCarrera->json();
    

    $responseUniversidades = Http::get('http://localhost:3000/api/carreras');
    $carreras = $responseUniversidades->json();

    // Pasar ambas variables a la vista
    return view('grupo.edit', compact('xd', 'carreras'));
}

public function update($id_grupo, Request $request)
{
    //dd($request->all());
    $data = [
        'nombre' => $request->nombre,
        'clave' => $request->clave,
        'estatus' => $request->estatus,
        'id_carrera1' => $request->carrera,
    ];

    $response = Http::put('http://localhost:3000/api/grupos/' . $id_grupo, $data);

    if ($response->successful()) {
        return redirect()->route('grupo.show', $id_grupo);
    } else {
        return response()->json(['error' => 'Error al actualizar los datos'], 500);
    }
}

    public function delete($id_grupo)
{
    // Verifica que el ID sea válido
    if (!$id_grupo || !is_numeric($id_grupo)) {
        return response()->json(['error' => 'ID de alumno no válido'], 400);
    }

    try {
        // Realizamos la solicitud DELETE a la API
        $response = Http::delete("http://localhost:3000/api/grupos/{$id_grupo}");

        // Verificamos el código de estado de la respuesta
        if ($response->successful()) {
            return redirect()->route('grupo.index');
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
