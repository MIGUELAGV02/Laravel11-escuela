@extends('layouts.plantilla')

@section('title','Editar ')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="text-center">Editar Alumno</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('alumno.update', $xd)}}" method="POST">
                            @csrf 
                            @method('put')
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Matricula</th>
                                        <td>
                                            <input type="text" class="form-control" id="matricula" name="matricula" value="{{$xd['matricula']}}" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nombre</th>
                                        <td>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$xd['nombre']}}" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Apellido Paterno</th>
                                        <td>
                                            <input type="text" class="form-control" id="ap_p" name="ap_p" value="{{$xd['ap_p']}}" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Apellido Materno</th>
                                        <td>
                                            <input type="text" class="form-control" id="ap_m" name="ap_m" value="{{$xd['ap_m']}}" required>
                                        </td>
                                    </tr>
                                    <div class="form-floating mb-3">
                                        <input type="datetime-local" class="form-control" name="fecha_n" 
                                               value="{{ $xd['fecha_n'] }}" id="floatingfn" aria-describedby="fnHelp">
                                        <label for="floatingfn">Fecha y Hora de Nacimiento</label>
                                    </div>
                                    <tr>
                                        <th>Genero</th>
                                        <td>
                                            <select class="form-select" id="genero" name="genero" required>
                                                <option value="M" {{$xd['genero']=='M' ? 'selected': ''}} >Hombre</option>
                                                <option value="F" {{$xd['genero']=='F' ? 'selected': ''}} >Mujer</option>
                                            </select>
                                        </td>
                                    </tr>                                    
                                    <tr>
                                        <th>Universidad</th>
                                        <td>
                                            <input type="text" class="form-control" id="universidades" name="universidades" value="{{$xd['universidades']}}" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Carrera</th>
                                        <td>
                                            <input type="text" class="form-control" id="carreras" name="carreras" value="{{$xd['carreras']}}" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Grupo</th>
                                        <td>
                                            <input type="text" class="form-control" id="grupos" name="grupos" value="{{$xd['grupos']}}" required>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-save"></i> Actualizar 
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
