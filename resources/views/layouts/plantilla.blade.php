<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
        }
        .content {
            margin-left: 250px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Navbar de navegación a la izquierda -->
        <nav class="sidebar bg-dark text-white p-3">
            <h2 class="text-center">Menú</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('alumno.index')}}"><i class="fas fa-heart"></i> Alumnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('universidad.index')}}"><i class="fas fa-heart"></i> Universidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('carrera.index')}}"><i class="fas fa-heart"></i> Carreras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fas fa-heart"></i> Grupos</a>
                </li>
            </ul>
        </nav>
        
        <!-- Contenido principal -->
        <div class="content p-4 w-100">
            @yield('content')
        </div>
    </div>
</body>
</html>
