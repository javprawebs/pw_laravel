@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Artículos</h1>
    </div>
    @foreach ($secciones as $seccion)
    <div class="content" style="margin: 20px 0">
        <div class="seccion-container">
            <h2>{{ $seccion->nombre }}</h2>
            <a href="{{ route('admin.articulos.create', ['seccion_id' => $seccion->id]) }}" class="add-article-btn">Agregar Artículo</a>
            <div class="card-container">
                @foreach ($seccion->articulos as $articulo)
                    <div class="card">
                        <img src="{{ asset($articulo->imagen) }}" alt="{{ $articulo->nombre }}">
                        <div class="card-body">
                            <h3 class="card-title">{{ $articulo->nombre }}</h3>
                            <p class="card-description">{{ $articulo->descripcion }}</p>
                            @isset($articulo->precio)
                                <p class="card-price">{{ $articulo->precio }} €</p>                             
                            @endisset
                            <a href="{{ route('admin.articulos.edit', $articulo->id) }}" class="btn">Editar</a>
                            <form action="{{ route('admin.articulos.destroy', $articulo->id) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    const confirmed = confirm('¿Estás seguro de que deseas eliminar este artículo? Esta acción no se puede deshacer.');
                    if (confirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
