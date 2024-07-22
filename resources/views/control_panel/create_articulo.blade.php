@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Agregar Artículo</h1>
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

        <form action="{{ route('admin.articulos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required value="{{ old('nombre') }}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required>{{ old('descripcion') }}</textarea>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" class="form-control" required>
            </div>
            <div class="form-group">
                {{-- <label for="seccion_nombre">Sección:</label> --}}
                <input type="text" hidden id="seccion_nombre" class="form-control" readonly value="{{ $secciones->find(request('seccion_id'))->nombre }}">
                <input type="hidden" id="seccion_id" name="seccion_id" value="{{ request('seccion_id') }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Agregar Artículo</button>
                <a href="{{route('admin.articulos')}}" class="btn" style="background-color: grey; font-size:13.333px;">Volver atrás</a>
            </div>
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
