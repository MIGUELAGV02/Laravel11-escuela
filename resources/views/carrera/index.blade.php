@extends('layouts.plantilla')

@section('title','Carrera')
    
@section('content')

<div class="container mt-1">
    <h2 class="text-center mb-4" style="color: #0f0d0d;">Carreras</h2>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            {{-- <form class="d-flex me-auto" role="search">
                <input name="buscarpor" class="form-control me-2 bg-secondary text-white border-0" 
                    type="search" placeholder="Buscar" aria-label="Buscar" value="{{$buscarpor}}">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>       --}}
    
            <a href="{{ route('carrera.create')}}">
                <button class="btn btn-primary mr-4">Nueva Carrera</button>
            </a>
           
        </div>
        
    </nav>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Estatus</th>
                <th>Universidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $index => $listaaa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $listaaa['nombre'] }}</td>
                    <td>{{ $listaaa['estatus'] }}</td>
                    <td>{{ $listaaa['universidades'] }}</td> 

                    <td>
                        <a href="{{ route('carrera.show', ['id_carrera'=>$listaaa['id_carrera']]) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                        <a href="{{ route('carrera.edit', ['id_carrera'=>$listaaa['id_carrera']])  }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('carrera.delete', ['id_carrera'=>$listaaa['id_carrera']]) }}" method="POST" style="display:inline;">
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