@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Editar Artículo</h1>
    </div>
    <div class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.articulos.update', $articulo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $articulo->nombre) }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required>{{ old('descripcion', $articulo->descripcion) }}</textarea>
            </div>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" class="form-control">
                <small>Deja este campo vacío si no deseas cambiar la imagen.</small>
            </div>
            <div class="form-group">
                {{-- <label for="seccion_id">Sección:</label> --}}
                <select id="seccion_id" name="seccion_id" class="form-control" required hidden>
                    @foreach ($secciones as $seccion)
                        <option value="{{ $seccion->id }}" {{ old('seccion_id', $articulo->seccion_id) == $seccion->id ? 'selected' : '' }}>{{ $seccion->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn">Actualizar Artículo</button>
            <a href="{{route('admin.articulos')}}" class="btn" style="background-color: grey; font-size:13.333px;">Volver atrás</a>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const colorCircles = document.querySelectorAll('.color-circle');
        const coloresInput = document.getElementById('colores');
        const sizeBoxes = document.querySelectorAll('.size-box');
        const tallasInput = document.getElementById('tallas');

        let selectedColors = coloresInput.value ? JSON.parse('["' + coloresInput.value.replace(/,/g, '","') + '"]') : [];
        let selectedSizes = tallasInput.value ? JSON.parse('["' + tallasInput.value.replace(/,/g, '","') + '"]') : [];

        colorCircles.forEach(circle => {
            const color = circle.getAttribute('data-color');
            if (selectedColors.includes(color)) {
                circle.classList.add('selected');
            }

            circle.addEventListener('click', function() {
                if (selectedColors.includes(color)) {
                    selectedColors = selectedColors.filter(c => c !== color);
                    this.classList.remove('selected');
                } else {
                    selectedColors.push(color);
                    this.classList.add('selected');
                }

                coloresInput.value = selectedColors.join(',');
            });
        });

        sizeBoxes.forEach(box => {
            const size = box.getAttribute('data-size');
            if (selectedSizes.includes(size)) {
                box.classList.add('selected');
            }

            box.addEventListener('click', function() {
                if (selectedSizes.includes(size)) {
                    selectedSizes = selectedSizes.filter(s => s !== size);
                    this.classList.remove('selected');
                } else {
                    selectedSizes.push(size);
                    this.classList.add('selected');
                }

                tallasInput.value = selectedSizes.join(',');
            });
        });
    });
    </script>
@endsection
