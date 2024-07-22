@extends('layouts.admin')

@section('content')

    <div class="header">
        <h1>Información</h1>
    </div>

    <div class="content" style="margin: 20px 0">
        <div class="seccion-container">
            {{-- <h2>Info</h2> --}}
            <div class="card-container">
                <div class="card">
                    {{-- <img src="{{ asset($articulo->imagen) }}" alt="{{ $articulo->nombre }}"> --}}
                    <div class="card-body">
                        <h3 class="card-title">Página Web creada por Javier Prados</h3>
                        <p class="card-description">Desarrollador web y fotógrafo</p>
                    </div>
                </div>
                <div class="card">
                    {{-- <img src="{{ asset($articulo->imagen) }}" alt="{{ $articulo->nombre }}"> --}}
                    <div class="card-body">
                        <h3 class="card-title">Información de contacto</h3>
                        <p class="card-description">Mande un WhatsApp a</p>
                        <p class="card-price">+34 677 138 213</p>
                        <p class="card-description">Mande un email a</p>
                        <p class="card-price">javierpradosweb@gmail.com</p>
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Mensualidad</h3>
                        <p class="card-description">Incluye hosting<br>Incluye copia de seguridad diaria<br>Una revisión al mes de su página web<br>Límite 150 artículos</p>
                        <p class="card-price">20€/mes</p>
                        <p class="card-price">Pagado hasta: 25/07/2024</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

@endsection