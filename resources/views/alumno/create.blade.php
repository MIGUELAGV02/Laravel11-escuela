@extends('layouts.plantilla')

@section('title','Citas')
    
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="text-center">Nuevo Alumno</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('alumno.store') }}" method="POST">
                            @csrf 
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Matricula</th>
                                        <td>
                                            <input type="text" class="form-control" id="matricula" name="matricula" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nombre</th>
                                        <td>
                                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Apellido Paterno</th>
                                        <td>
                                            <input type="text" class="form-control" id="ap_p" name="ap_p" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Apellido Materno</th>
                                        <td>
                                            <input type="text" class="form-control" id="ap_m" name="ap_m" required>
                                        </td>
                                    </tr>
                                    <div class="form-floating mb-3">
                                        <input type="datetime-local" class="form-control @error('datetime') is-invalid @enderror"
                                            name="fecha_n" value="{{ old('datetime') }}" id="floatingdatetime" >
                                        <label for="floatingdatetime">Fecha y Hora</label>
                                    </div>
                                    <tr>
                                        <th>Genero</th>
                                        <td>
                                            <select class="form-select" id="genero" name="genero" required>
                                                <option value="" selected disabled>Selecciona un genero</option>
                                                <option value="F">Femenino</option>
                                                <option value="M">Masculino</option>
                                                <option value="X">Gey</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Universidad</th>
                                        <td>
                                            <input type="text" class="form-control" id="id_universidad2" name="id_universidad2" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Carrera</th>
                                        <td>
                                            <input type="text" class="form-control" id="id_carrera2" name="id_carrera2" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Grupo</th>
                                        <td>
                                            <input type="text" class="form-control" id="id_grupo2" name="id_grupo2" required>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-save"></i> Guardar
                                </button>
                                <a href="{{ route('alumno.index') }}" class="btn btn-primary">
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
