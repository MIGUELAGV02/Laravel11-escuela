@extends('layouts.plantilla')

@section('title','Ver ')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white text-center">
                        <h3><i class="bi bi-book-half"></i> Detalle</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $data['id_alumno'] }}</td>
                                </tr>
                                <tr>
                                    <th>Matricula</th>
                                    <td>{{ $data['matricula'] }}</td>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                    <td>{{ $data['nombre'] }}</td>
                                </tr>
                                <tr>
                                    <th>Apellido Paterno</th>
                                    <td>{{ $data['ap_p'] }}</td>
                                </tr>
                                <tr>
                                    <th>Apellido Materno</th>
                                    <td>{{ $data['ap_m'] }}</td>
                                </tr>
                                <tr>
                                    <th>Fecha de Nacimiento</th>
                                    <td>{{ $data['fecha_n'] }}</td>
                                </tr>
                                <tr>
                                    <th>Genero</th>
                                    <td>
                                        <span class="badge {{ $data['genero'] == 'Hombre' ? 'Mujer' : 'bg-success' }}">
                                            {{ $data['genero'] }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Universidad</th>
                                    <td>{{ $data['universidades'] }}</td>
                                </tr>
                                <tr>
                                    <th>Carrera</th>
                                    <td>{{ $data['carreras'] }}</td>
                                </tr>
                                <tr>
                                    <th>Grupo</th>
                                    <td>{{ $data['grupos'] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('alumno.index') }}" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left-circle"></i> Regresar
                            </a>


                            <a href="{{ route('alumno.edit', ['id_alumno'=>$data['id_alumno']])  }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('alumno.destroy', ['id_alumno'=>$data['id_alumno']])}}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este libro?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>


                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
