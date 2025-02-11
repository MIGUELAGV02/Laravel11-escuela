@extends('layouts.plantilla')

@section('title','Crear')
    
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="text-center">Nueva Universidad</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('universidad.store') }}" method="POST">
                            @csrf 
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nombre</th>
                                        <td>
                                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Clave</th>
                                        <td>
                                            <input type="text" class="form-control" id="clave" name="clave" required>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-save"></i> Guardar
                                </button>
                                <a href="{{ route('universidad.index') }}" class="btn btn-primary">
                                    <i class="bi bi-arrow-left"></i> Regresar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
