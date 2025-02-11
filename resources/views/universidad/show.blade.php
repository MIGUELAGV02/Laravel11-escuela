@extends('layouts.plantilla')

@section('title','Ver ')

@section('content')
    <div class="container mt-1">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white text-center">
                        <h3><i class="bi bi-book-half"></i> Detalle de Universidad</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $data['id_universidad'] }}</td>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                    <td>{{ $data['nombre'] }}</td>
                                </tr>
                                <tr>
                                    <th>Clave</th>
                                    <td>{{ $data['clave'] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('universidad.index') }}" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left-circle"></i> Regresar
                            </a>


                            <a href="{{ route('universidad.edit', ['id_universidad'=>$data['id_universidad']])  }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('universidad.destroy', ['id_universidad'=>$data['id_universidad']])}}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este libro?');">
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
