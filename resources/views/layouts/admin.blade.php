<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Mi Panel</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('home') }}">Página web</a></li>
            <li><a href="{{ route('admin.articulos') }}">Artículos</a></li>
            <li><a href="{{route('admin.info')}}">Información</a></li>
            <li><a href="{{route('logout')}}">Cerrar sesión</a></li>
            {{-- <li><a href="#">Comments</a></li>
            <li><a href="#">Settings</a></li> --}}
        </ul>
    </div>
    <div class="main-content">
        @yield('content')
    </div>
</body>
</html>
