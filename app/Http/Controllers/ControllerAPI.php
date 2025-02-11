<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ControllerAPI extends Controller
{
    public function getData(){
        // Hacemos una solicitud GET a una API externa
        $response = Http::get('http://localhost:3000/api/registros/');

        // Verificamos si la solicitud fue exitosa
        if ($response->successful()) {
            $data = $response->json(); // Obtiene los datos en formato JSON

            //return view('getData')->with(['data' => $data]);

            return view('alumno.index', compact('data')); // Pasamos los datos a una vista
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function getData2($id_alumno){
        // Hacemos una solicitud GET a una API externa
        $response = Http::get('http://localhost:3000/api/registros/'. $id_alumno);

        // Verificamos si la solicitud fue exitosa
        if ($response->successful()) {
            $data = $response->json(); // Obtiene los datos en formato JSON

            //return view('getData2')->with(['data' => $data]);

            return view('alumno.show', compact('data')); // Pasamos los datos a una vista
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function create(){
        $responseUniversidad = Http::get('http://localhost:3000/api/universidades/');
        $un = $responseUniversidad->json();
    
        $responseCarrera = Http::get('http://localhost:3000/api/carreras');
        $ca = $responseCarrera->json();

        $responseGrupo = Http::get('http://localhost:3000/api/grupos/');
        $gr = $responseGrupo->json();

        return view('alumno.create', compact('un','ca','gr'));
    }
    
    public function store(Request $request)
{
    $response = Http::post('http://localhost:3000/api/registros/', [
        'matricula' => $request->matricula,
        'nombre' => $request->nombre,
        'ap_p' => $request->ap_p,
        'ap_m' => $request->ap_m,
        'fecha_n' => $request->fecha_n,
        'genero' => $request->genero,
        'id_universidad2' => $request->id_universidad2,
        'id_carrera2' => $request->id_carrera2,
        'id_grupo2' => $request->id_grupo2
    ]);

    if ($response->successful()) {
        $data = $response->json(); // Obtiene el JSON de la respuesta
        $id_alumno = $data['id_alumno'] ?? null; // Extrae el ID del registro (asegúrate de que el API lo devuelva)

        if ($id_alumno) {
            return redirect()->route('alumno.show', $id_alumno);
        }
    }

    return redirect()->route('alumno.index')->with('error', 'No se pudo crear el registro.');
}


    public function edit($id_alumno){
        $response = Http::get('http://localhost:3000/api/registros/' . $id_alumno);
        $xd = $response->json();
        return view('alumno.edit', compact('xd'));
    }

    public function update($id_alumno, Request $request)
    {
        $data = [
            'matricula' => $request -> matricula,
            'nombre' => $request -> nombre,
            'ap_p' => $request -> ap_p,
            'ap_m' => $request -> ap_m,
            'fecha_n' => $request -> fecha_n,
            'genero' => $request -> genero,
            'id_universidad2' => $request -> universidades,
            'id_carrera2' => $request -> carreras,
            'id_grupo2' => $request -> grupos,
        ];

        $response = Http::put('http://localhost:3000/api/registros/' . $id_alumno, $data);
        if ($response->successful()) {
            return redirect()->route('alumno.show', $id_alumno);
        } else {
            return response()->json(['error' => 'Error al actualizar los datos'], 500);
        }
    }

    public function delete($id_alumno)
{
    // Verifica que el ID sea válido
    if (!$id_alumno || !is_numeric($id_alumno)) {
        return response()->json(['error' => 'ID de alumno no válido'], 400);
    }

    try {
        // Realizamos la solicitud DELETE a la API
        $response = Http::delete("http://localhost:3000/api/registros/{$id_alumno}");

        // Verificamos el código de estado de la respuesta
        if ($response->successful()) {
            return redirect()->route('alumno.index');
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
