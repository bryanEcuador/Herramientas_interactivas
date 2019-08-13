@extends('layouts.principal')

@section('content')

    <div style="margin-top: 90px;" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Bienvenido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hola {{$name}}, te gustaría continuar visualizado el sitio o completar tu información personal.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
                    <button type="button" class="btn btn-primary"> <a href="/information" style="color: white "> Actualizar datos</a> </button>
                </div>
            </div>
        </div>
    </div>

        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="home_left_img">
                                <img class="img-fluid" src="img/banner/home-left.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner_content">
                                <h2>
                                    Inteligencias multiples <br>
                                </h2>
                                <p>
                                    Uno de los teóricos con más influencia en la actualidad es el Psicólogo Howard Gardner, quien hizo una gran controversia
                                    con su teoría acerca de las inteligencias múltiples esto debido a que el autor cuestiona que la inteligencia sea vista
                                    desde una forma unilateral y más bien propone la idea de una visión bilateral o global, en el cual la inteligencia
                                    deberá de comprenderse como un conjunto de inteligencias heterogéneas y diferentes. De esta manera Gardner plantea ocho
                                    tipos de inteligencias.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->


            <button style="display: none" id="modal" data-toggle="modal" data-target="#exampleModal">modal</button>
        <!--================First Upcoming Games Area =================-->
        <section class="upcoming_games_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main_title">
                            <h2>Tipos de inteligencias</h2>
                            <h1>Tipos de inteligencias</h1>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="new_games_item">
                            <img src="img/logical-mathematical.jpg" alt="">
                            <div class="upcoming_title">
                                <h3><a href="/inteligencia-matematica">Inteligencia Lógico-matemático</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="new_games_item">
                            <img src="img/espacial.jpg" alt="">
                            <div class="upcoming_title">
                                <h3><a href="/inteligencia-espacial">Inteligencia Espacial</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="new_games_item">
                            <img src="img/linguistica.jpeg" alt="">
                            <div class="upcoming_title">
                                <h3><a href="/inteligencia-linguistica">Inteligencia Lingüística</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="new_games_item">
                            <img src="img/Inteligencia-musical.jpg" alt="">
                            <div class="upcoming_title">
                                <h3><a href="/inteligencia-musical">Inteligencia Musical</a></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="new_games_item">
                            <img src="img/bombilla-y-naturaleza.png" height="220" alt="">
                            <div class="upcoming_title">
                                <h3><a href="/inteligencia-ecologica">Inteligencia Ecológica</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="new_games_item">
                            <img src="img/portada_fin1.jpg" height="220" alt="">
                            <div class="upcoming_title">
                                <h3><a href="/inteligencia-interpersonal">Inteligencia Interpersonal</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="new_games_item">
                            <img src="img/1_KrZylznLIKeybLE5TYGjrQ.jpeg" height="220" alt="">
                            <div class="upcoming_title">
                                <h3><a href="/inteligencia-intrapersonal">Inteligencia Intrapersonal</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="new_games_item">
                            <img src="img/curso-baile1.jpg" alt="" height="220">
                            <div class="upcoming_title">
                                <h3><a href="/inteligencia-kinestica">Inteligencia Corporal – Kinestésica</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Upcoming Games Area =================-->


    <section class="blog_categorie_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="categories_post">
                        <img src="img/blog/cat-post/cat-post-3.jpg" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="/test/7"><h5>Encuesta de sastifacción</h5></a>
                                <div class="border_line"></div>
                                <p>Por favor calificanos</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="categories_post">
                        <img src="img/blog/cat-post/cat-post-3.jpg" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="/test/8"><h5>Encuesta de sastifacción</h5></a>
                                <div class="border_line"></div>
                                <p>Nos encataria, tener tu opinión</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


        <!--================Start About Us Area =================-->
        <section class="about_us_area section_gap_top">
            <div class="container">
                <div class="row about_content align-items-center">
                    <div class="col-lg-6">
                        <div class="section_content">
                            <h6>Problematica</h6>
                            <p>
                                Estas inteligencias buscan solucionar la problemática que tienen los estudiantes para desarrollar las inteligencias
                                múltiples del conocimiento de la programación debido a las falencias existentes de los distintos procesos académicos de
                                cada individuo, el cual hará una interacción dinámica entre usuario y la interface. Una vez fortalecido el desarrollo de
                                las inteligencias lógico-matemático y espacial podrá facilitarse la lectura de códigos de programación.
                                Estas herramientas lograrán desarrollar el sistema cognitivo, debido a que el estudiante desarrollara dinámicamente
                                áreas como geometría, algebra, estadísticas y cálculo en registros gráficos. El resultado final que darán estos
                                aplicativos, en conjunto, será el fácil entendimiento del lenguaje de programación y uso del mismo.

                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about_us_image_box justify-content-center">
                            <img class="img-fluid w-100" src="img/inteligencias_multiples.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End About Us Area =================-->



    <script>


window.onload=function() {

        if(@json($status) !== "100") {
            var boton = document.getElementById('modal');
            boton.click();
            console.log(@json($status));
        }


}
    </script>
@endsection