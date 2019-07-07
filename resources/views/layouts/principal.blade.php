<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Herramientas interactivas') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/vendors/linericon/style.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="/vendors/animate-css/animate.css">
    <link rel="stylesheet" href="/vendors/flaticon/flaticon.css">
    <!-- main css -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

<!-- ================= modal ================-->
@auth
    <div style="margin-top: 90px;" class="modal fade" id="estadisticas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Estadisticas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(isset($estadisticas))
                        <p>Visitas : {{$estadisticas[0]->visit}} </p>
                        <p>Descargas : {{$estadisticas[0]->downloads}} </p>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endauth
<!-- ================= end modal ================-->


<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            @guest
                                <ul class="nav navbar-nav menu_nav justify-content-center">
                                    <li class="nav-item submenu dropdown"><a href="{{ route('login') }}" class="btn_menu">{{ __('Login') }}</a></li>
                                    @if (Route::has('register'))
                                        <li class="nav-item submenu dropdown"><a class="btn_menu" href="{{ route('register') }}" >{{ __('Register') }}</a></li>
                                    @endif
                                </ul>
                             @else
                                    <ul class="nav navbar-nav menu_nav justify-content-center">
                                        <li class="nav-item active"><a class="nav-link" href="/inteligencias">Inteligencias</a></li>
                                        @if(auth()->user()->name == 'Admin')
                                            <li class="nav-item">
                                                <button STYLE=" font-size: 12px; font-family: Roboto; color: #3fcaff; background-color: transparent;  border: none;" type="button" class="nav-link" data-toggle="modal" data-target="#estadisticas">
                                                    ESTADISTICAS
                                                </button>
                                            </li>
                                        @endif
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                           aria-expanded="false">{{ Auth::user()->name }} </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                            @if(auth()->user()->name !== 'Admin')
                                                <li class="nav-item"><a class="nav-link" href="/information">Actuallizar Perfil</a></li>
                                            @endif
                                        </ul>
                                        </li>
                                    </ul>
                            @endguest
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->

@yield('content')


<!--================Footer Area =================-->

<footer class="footer_area">
    <div class="container">
        <div class="row footer_inner">

        </div>
        <div class="row single-footer-widget">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="copy_right_text">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados |  <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>

        </div>
    </div>
</footer>
<!--================End Footer Area =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/popper.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/stellar.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="/vendors/isotope/isotope-min.js"></script>
<script src="/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="/js/jquery.ajaxchimp.min.js"></script>
<script src="/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="/vendors/counter-up/jquery.counterup.min.js"></script>
<script src="/js/mail-script.js"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="js/gmaps.min.js"></script>
<script src="js/theme.js"></script>
</body>

</html>