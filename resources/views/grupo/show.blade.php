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
                                    <td>{{ $datos['id_grupo'] }}</td>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                    <td>{{ $datos['nombre'] }}</td>
                                </tr>
                                <tr>
                                    <th>Clave</th>
                                    <td>{{ $datos['clave'] }}</td>
                                </tr>
                                <tr>
                                    <th>Estatus</th>
                                    <td>{{ $datos['estatus'] }}</td>
                                </tr>
                                <tr>
                                    <th>Carrera</th>
                                    <td>{{ $datos['carreras'] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('grupo.index') }}" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left-circle"></i> Regresar
                            </a>


                            <a href="{{ route('grupo.edit', ['id_grupo'=>$datos['id_grupo']])  }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('grupo.delete', ['id_grupo'=>$datos['id_grupo']])}}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este libro?');">
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
