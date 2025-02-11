@extends('layouts.plantilla')

@section('title','Grupos')
    
@section('content')

<div class="container mt-1">
    <h2 class="text-center mb-4" style="color: #0f0d0d;">Grupos</h2>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            {{-- <form class="d-flex me-auto" role="search">
                <input name="buscarpor" class="form-control me-2 bg-secondary text-white border-0" 
                    type="search" placeholder="Buscar" aria-label="Buscar" value="{{$buscarpor}}">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>       --}}
    
            <a href="{{ route('grupo.create')}}">
                <button class="btn btn-primary mr-4">Nueva Grupo</button>
            </a>
           
        </div>
        
    </nav>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Clave</th>
                <th>Carrera</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $index => $listaaa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $listaaa['nombre'] }}</td>
                    <td>{{ $listaaa['clave'] }}</td>
                    <td>{{ $listaaa['carreras'] }}</td> 

                    <td>
                        <a href="{{ route('grupo.show', ['id_grupo'=>$listaaa['id_grupo']]) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                        <a href="{{ route('grupo.edit', ['id_grupo'=>$listaaa['id_grupo']])  }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('grupo.delete', ['id_grupo'=>$listaaa['id_grupo']]) }}" method="POST" style="display:inline;">
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