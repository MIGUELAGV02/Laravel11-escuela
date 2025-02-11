@extends('layouts.plantilla')

@section('title','Alumno')
    
@section('content')

<div class="container mt-1">
    <h2 class="text-center mb-4" style="color: #0f0d0d;">Alumno</h2>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            {{-- <form class="d-flex me-auto" role="search">
                <input name="buscarpor" class="form-control me-2 bg-secondary text-white border-0" 
                    type="search" placeholder="Buscar" aria-label="Buscar" value="{{$buscarpor}}">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>       --}}
    
            <a href="{{ route('alumno.create')}}">
                <button class="btn btn-primary mr-4">Nuevo Alumno</button>
            </a>
           
        </div>
        
    </nav>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Apellido Materno</th>
                <th>Carrera</th>
                <th>Grupo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $index => $listaaa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $listaaa['matricula'] }}</td>
                    <td>{{ $listaaa['nombre'] }}</td>
                    <td>{{ $listaaa['ap_m'] }}</td>
                    <td>{{ $listaaa['carreras'] }}</td> 
                    <td>{{ $listaaa['grupos'] }}</td> 

                    <td>
                        <a href="{{ route('alumno.show', ['id_alumno'=>$listaaa['id_alumno']]) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                        <a href="{{ route('alumno.edit', ['id_alumno'=>$listaaa['id_alumno']])  }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('alumno.destroy', ['id_alumno'=>$listaaa['id_alumno']]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

@endsection