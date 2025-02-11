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
                                    <td>{{ $datos['id_carrera'] }}</td>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                    <td>{{ $datos['nombre'] }}</td>
                                </tr>
                                <tr>
                                    <th>Estatus</th>
                                    <td>{{ $datos['estatus'] }}</td>
                                </tr>
                                <tr>
                                    <th>Universidad</th>
                                    <td>{{ $datos['universidades'] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('carrera.index') }}" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left-circle"></i> Regresar
                            </a>


                            <a href="{{ route('carrera.edit', ['id_carrera'=>$datos['id_carrera']])  }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('carrera.delete', ['id_carrera'=>$datos['id_carrera']])}}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este libro?');">
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
