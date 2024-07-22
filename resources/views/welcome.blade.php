<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Power Protein | Lucena</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/pw_logo (1).ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/front_css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+34 635 719 114</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>powerprotein00@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-6 text-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="{{route('admin.articulos')}}" class="navbar-brand ml-lg-3">
                <!-- <h1 class="m-0 text-primary"><span class="text-dark">SPA</span> Center</h1> -->
                <!-- <h1 class="m-0 text-primary">Power Protein</h1> -->
                <img src="img/pw_logo.png" class="img-fluid" alt="Power Protein Lucena" width="150">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end px-lg-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="#anabolicos" class="nav-item nav-link active">Producto Destacado</a>
                    <a href="#masproductos" class="nav-item nav-link">Más productos</a>
                    <a href="#ubicacion" class="nav-item nav-link">Ubicación</a>
                    <a href="#informacion" class="nav-item nav-link">Información</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->



    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 pb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item position-relative active" style="min-height: 100vh;">
                    <img class="position-absolute w-100 h-100" src="img/pw_fachada.png" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h6 class="text-white text-uppercase mb-3 animate__animated animate__fadeInDown" style="letter-spacing: 3px;">Potencia tus entrenos</h6>
                            <h3 class="display-3 text-capitalize text-white mb-3">Power Protein</h3>
                            <p class="mx-md-5 px-5">Suplementos deportivos</p>
                            <!-- <a class="btn btn-outline-light py-3 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Make Appointment</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


<!-- About Start -->
@if(isset($secciones))
    @foreach ($secciones[1]->articulos as $articulo)
        <div class="container-fluid py-5" id="anabolicos">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 pb-5 pb-lg-0">
                        <img class="img-fluid w-100" src="{{$articulo->imagen}}" alt="">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="mb-4">{{ $articulo->nombre }}</h1>
                        <p class="pl-4 border-left border-primary">
                            {!! nl2br(e($articulo->descripcion)) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p>No hay artículos disponibles en esta sección.</p>
@endif


    
    <!-- About End -->


<!-- Service Start -->
<div class="container-fluid px-0 mt-5" id="masproductos">
    <div class="row mx-0 justify-content-center text-center">
        <div class="col-lg-6">
            <h1>Más de nuestros productos</h1>
        </div>
    </div>
    
    <div class="owl-carousel service-carousel">
        @if(isset($secciones))
            @foreach ($secciones[0]->articulos as $articulo)
                <div class="service-item position-relative">
                    <img class="img-fluid fixed-size" src="{{$articulo->imagen}}" alt="">
                    <div class="service-text text-center">
                        <h4 class="text-white font-weight-medium px-3">{{ $articulo->nombre }}</h4>
                        <p class="text-white px-3 mb-3">{{$articulo->descripcion}}</p>
                        <div class="w-100 bg-white text-center p-4">
                            <a class="btn btn-primary" href="">Make Order</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No hay artículos disponibles en esta sección.</p>
        @endif
    </div>
    
<!-- Service End -->

    {{-- @dd($secciones[0]->articulos) --}}

    <!-- Open Hours Start -->
    <div class="container-fluid py-5" id="ubicacion">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/pw_pasillo_1.png" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="hours-text bg-light p-4 p-lg-5 my-lg-5">
                        <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/embed?pb=!4v1721301293546!6m8!1m7!1sIZJVTtfZXiVWKhT14jze4Q!2m2!1d37.40790117241274!2d-4.48541872345334!3f135.2868106053243!4f-4.80796000163528!5f0.8096894991607291" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <h1 class="mb-4 text-white">Calle Juan Valera nº7</h1>
                        <ul class="list-inline">
                            <li class="h6 py-1 text-white"><i class="far fa-circle text-white mr-3"></i>Lunes a Viernes : 10:00 a 14:00 - 17:30 a 21:30</li>
                            <li class="h6 py-1 text-white"><i class="far fa-circle text-white mr-3"></i>Sábado : 10:00 a 14:00</li>
                            <li class="h6 py-1 text-white"><i class="far fa-circle text-white mr-3"></i>Domingo : Cerrado</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Open Hours End -->



<!-- Footer Start -->
<div class="footer container-fluid position-relative bg-dark py-5" style="margin-top: 90px;" id="informacion">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6 pr-lg-5 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="mb-3 text-white">POWER PROTEIN</h1>
                </a>
                <p>Tienda dedicada a los suplementos deportivos</p>
                <p><i class="fa fa-map-marker-alt mr-2"></i>C/ Juan Valera nº7</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+34 635 719 114</p>
                <p><i class="fa fa-envelope mr-2"></i>powerprotein00@gmail.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-lg btn-primary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 pl-lg-5 d-flex justify-content-center align-items-center">
                <div class="video-responsive">
                    <video controls src="img/pw_video.mp4" autoplay muted loop></video>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark text-light border-top py-4" style="border-color: rgba(256, 256, 256, .15) !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy;Power Protein. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<style>

</style>




    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.j')}}s"></script>
    <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>


{{-- <div class="service-item position-relative">
    <img class="img-fluid fixed-size" src="img/pw_ropa.png" alt="">
    <div class="service-text text-center">
        <h4 class="text-white font-weight-medium px-3">Ropa</h4>
        <p class="text-white px-3 mb-3">Conjuntos bonitos y de calidad para el deporte</p>
        <div class="w-100 bg-white text-center p-4" >
            <a class="btn btn-primary" href="">Make Order</a>
        </div>
    </div>
</div>
<div class="service-item position-relative">
    <img class="img-fluid fixed-size" src="img/pw_anabolic.png" alt="">
    <div class="service-text text-center">
        <h4 class="text-white font-weight-medium px-3">Producto Destacado</h4>
        <p class="text-white px-3 mb-3">Ideales para la ganancia muscular</p>
        <div class="w-100 bg-white text-center p-4" >
            <a class="btn btn-primary" href="">Make Order</a>
        </div>
    </div>
</div>
<div class="service-item position-relative">
    <img class="img-fluid fixed-size" src="img/pw_cretina.jpg" alt="">
    <div class="service-text text-center">
        <h4 class="text-white font-weight-medium px-3">Creatina</h4>
        <p class="text-white px-3 mb-3">Ideal para la ganancia muscular</p>
        <div class="w-100 bg-white text-center p-4" >
            <a class="btn btn-primary" href="">Make Order</a>
        </div>
    </div>
</div>
<div class="service-item position-relative">
    <img class="img-fluid fixed-size" src="img/pw_barras_proteicas.jpg" alt="">
    <div class="service-text text-center">
        <h4 class="text-white font-weight-medium px-3">Barras energéticas</h4>
        <p class="text-white px-3 mb-3">Consigue un plus de energía antes de tu entreno</p>
        <div class="w-100 bg-white text-center p-4" >
            <a class="btn btn-primary" href="">Make Order</a>
        </div>
    </div>
</div>
<div class="service-item position-relative">
    <img class="img-fluid fixed-size" src="img/pw_caseina.png" alt="">
    <div class="service-text text-center">
        <h4 class="text-white font-weight-medium px-3">Caseína</h4>
        <p class="text-white px-3 mb-3">Ideal para la ganancia muscular</p>
        <div class="w-100 bg-white text-center p-4" >
            <a class="btn btn-primary" href="">Make Order</a>
        </div>
    </div>
</div>
<div class="service-item position-relative">
    <img class="img-fluid fixed-size" src="img/pw_cinturones.jpg" alt="">
    <div class="service-text text-center">
        <h4 class="text-white font-weight-medium px-3">Cinturones</h4>
        <p class="text-white px-3 mb-3">Útil para evitar lesiones en entrenamientos pesados</p>
        <div class="w-100 bg-white text-center p-4" >
            <a class="btn btn-primary" href="">Make Order</a>
        </div>
    </div>
</div> --}}