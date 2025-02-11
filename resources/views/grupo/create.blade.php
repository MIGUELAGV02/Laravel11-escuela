@extends('layouts.plantilla')

@section('title','Nuevo')
    
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="text-center">Nuevo Grupo</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('grupo.store') }}" method="POST">
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
                                        <th>Calve</th>
                                        <td>
                                            <input type="text" class="form-control" id="clave" name="clave" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Estatus</th>
                                        <td>
                                            <select class="form-select" id="estatus" name="estatus" required>
                                                <option value="" selected disabled>Selecciona un estatus</option>
                                                <option value="activo">Activo</option>
                                                <option value="inactivo">Inactivo</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Carrera</th>
                                        <td>
                                            <select class="form-control" id="carrera" name="carrera" required>
                                                <option value="">Seleccione una universidad</option>
                                                @foreach ($carreras as $car)
                                                    <option value="{{ $car['id_carrera'] }}">{{ $car['nombre'] }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-save"></i> Guardar
                                </button>
                                <a href="{{ route('grupo.index') }}" class="btn btn-primary">
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
