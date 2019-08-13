@extends('layouts.principal')

@section('content')

    <!--================ Start Frequently Asked Questions Area ================-->
    <section style="margin-top: 125px" class="frequently_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2>Inteligencia Espacial</h2>
                        <h1>Inteligencia Espacial</h1>
                    </div>
                </div>
            </div>
            <div class="row frequent_inner">
                <div class="col-lg-5 col-md-5">
                    <div class="frequent_item">
                        <p>
                            Esta se define como la habilidad de imaginar dibujos en tres dimensiones. Quienes poseen esta habilidad tienen mayor facilidad para recordar fotos y objetos que recordar palabras.
                            Esta inteligencia es común en pintores, diseñadores, arquitectos, entre otros.


                        </p>
                    </div>
                </div>
                <div class="offset-lg-2 col-lg-5 offset-md-2 col-md-5">
                    <div class="frequent_item">
                        <p>
                            una de las caracteristicas de esta inteligencia es Anticiparse a las consecuencias de cambios espaciales, y adelantarse e imaginar o suponer cómo puede variar un objeto que sufre algún tipo de cambio.
                        </p>
                        <br>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================ End Frequently Asked Questions Area ================-->
    <br>
    <h2 class="sub_titulo">Herramientas interactivas</h2>

    <section class="recent_update_area section_gap">
        <div class="container">
            <div class="recent_update_inner">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#learn" role="tab" aria-controls="home" aria-selected="true">
                            Mindomo
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                           aria-selected="false">
                            Mindmeister
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#kodu" role="tab" aria-controls="contact"
                           aria-selected="false">
                            Kodu Game Lab
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="learn" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row recent_update_text">
                            <div class="col-lg-6">
                                <div class="chart_img">
                                    <img class="img-fluid" src="img/mindomo-screenshot.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section_content">
                                    <h6>Mindomo</h6>
                                    <p>
                                        Es un software de creación de mapas mentales colaborativos en línea donde los usuarios pueden crear, ver y compartir mapas mentales en su buscador.
                                        Los usuarios partirán del punto central al que tendrán que ponerle un título, y en el que podrán incluir una descripción, una fecha, un enlace web, una imagen, etcétera. A partir de esta burbuja central podrán desplegar tantas ramas como quieran, moviéndolas con la yema del dedo por la pantalla, en las que podrán incluir el resto de ideas del esquema.
                                        Por supuesto, Mindomo incluye montones de diseños diferentes con los que podremos probar. Desde algo superficial como diferentes tipos de colores para el fondo y las burbujas, hasta el propio diseño de las ramas del esquema. Además, podremos elegir el tipo y el tamaño de fuente que queremos utilizar, o insertar iconos.

                                    </p>
                                    <p style="display: inline; margin-right:0;font-size: 10px; padding: 2px">PAGINA OFICIAL :</p>
                                    <a style="font-size: 10px; color: #fff;" href="https://www.mindomo.com/es/">www.mindomo.com</a>

                                    <br>
                                    @if(auth()->user()->name !== 'Admin')
                                    <a style="margin-right: 2px;" class="primary_btn" href="/uploads/mindomo-3-1-9.apk">Descargar app</a>
                                    <a style="margin-right: 2px;" class="primary_btn" href="/uploads/Mindomo_v.8.0.42_x64.exe">Descargar exe</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row recent_update_text">
                            <div class="col-lg-6">
                                <div class="chart_img">
                                    <img class="img-fluid" src="img/MindMeister_web_2017.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section_content">
                                    <h6>Mindmeister</h6>
                                    <p>
                                        Es un programa en línea de mapas mentales que permite a los usuarios presentar sus pensamientos.
                                        Organizando la información de manera gráfica a través de círculos, conexiones y no de manera lineal, los mapas mentales mejoran la realización de lluvias de ideas a la hora de planificar y organizar tareas.
                                        MindMeister proporciona una forma de visualizar información en mapas mentales utilizando modelos de usuario, al tiempo que proporciona herramientas para facilitar la colaboración en tiempo real, coordinar la administración de tareas y crear presentaciones. Al usar el almacenamiento en la nube, los usuarios de MindMeister pueden compartir actualizaciones en mapas mentales en tiempo real con otros usuarios a través de aplicaciones móviles y en el navegador.


                                    </p>
                                    <p style="display: inline; margin-right:0;font-size: 10px; padding: 2px">PAGINA OFICIAL :</p>
                                    <a style="font-size: 10px; color: #fff;" href="https://www.mindmeister.com/es">www.mindmeister.com</a>
                                    <br>
                                    @if(auth()->user()->name !== 'Admin')
                                    <a style="margin-right: 2px;" class="primary_btn" href="/uploads/mindmeister-4-4-1.apk">Descargar app</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="kodu" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row recent_update_text">
                            <div class="col-lg-6">
                                <div class="chart_img">
                                    <img class="img-fluid" src="img/kodu-para-qué-es-532x400.jpeg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section_content">
                                    <h6>kodu</h6>
                                    <p>
                                        Es una herramienta que permite crear, diseñar y construir propios videojuegos, apto para usuarios de todas las edades y niveles, es muy fácil de usar y muy intuitivo.
                                        Tienes multitud de opciones de configuración para tus videojuegos, desde elegir y editar el tipo de terreno sobre el que se desarrolla la acción, hasta el sistema de colisiones y física que quieres implementar. Además, el programa incluye veinte personajes diferentes con sus respectivas habilidades listas para jugar.

                                    </p>
                                    <p style="display: inline; margin-right:0;font-size: 10px; padding: 2px">PAGINA OFICIAL :</p>
                                    <a style="font-size: 10px; color: #fff;" href="https://www.kodugamelab.com/">www.kodugamelab.com</a>
                                    <br>
                                    @if(auth()->user()->name !== 'Admin')
                                    <a style="margin-right: 2px;" class="primary_btn" href="/uploads/kodu.msi">Descargar</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================End Recent Update Area =================-->

    <h2 class="sub_titulo"> Herramientas de Conocimientos</h2>

    <section class="recent_update_area section_gap">
        <div class="container">
            <div class="recent_update_inner">
                <ul class="nav nav-tabs" id="myTab" role="tablist">


                    <li class="nav-item">
                        <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#GeoGebra" role="tab" aria-controls="contact"
                           aria-selected="false">
                            GeoGebra
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="GeoGebra" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row recent_update_text">
                            <div class="col-lg-6">
                                <div class="chart_img">
                                    <img class="img-fluid" src="img/geogebra.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section_content">
                                    <h6>GeoGebra</h6>
                                    <p>
                                        GeoGebra es un software de matemáticas para todo nivel educativo. Reúne dinámicamente geometría, álgebra, estadística y cálculo en registro gráficos, de análisis y de organización en hojas de cálculo. Dinamiza el estudio. Armoniza lo experimental y lo conceptual para experimentar una organización didáctica y disciplinar que cruza matemáticas, ciencias, ingeniería y tecnología (STEM: Science Technology Engieering & Mathematics)
                                        Datos interesantes
                                    </p>
                                    <ul style="color: white">
                                        <li>
                                            GeoGebra reúne gráfica y dinámicamente algebra y geometría, análisis y hojas de cálculo.
                                        </li>
                                        <li>
                                            Potentes herramientas en armonía con una interfaz intuitiva y ágil.
                                        </li>
                                        <li>
                                            Herramienta de autoría para creer materiales de aprendizaje interactivos como páginas web.
                                        </li>
                                        <li>
                                            Disponibles en todos los idiomas.
                                        </li>
                                        <li>
                                            Software de código abierto.
                                        </li>
                                    </ul>
                                    <p style="display: inline; margin-right:0;font-size: 10px; padding: 2px">PAGINA OFICIAL :</p><a style="font-size: 10px; color: #fff;" href="https://www.geogebra.org/graphing?lang=es">www.geogebra.org</a>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Recent Update Area =================-->

    <br>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2>Test de aptitud</h2>
                    <h1>Test de aptitud</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="pricing_item">
                    <h1 class="p_price">Nivel 1</h1>
                    <h3 class="p_title">Conocimientos necesarios</h3>
                    <div class="p_list">
                        <ul>
                            <li>Sin conocimientos especificos previos</li>
                        </ul>
                    </div>
                    <div class="p_btn">
                        @if($testHabilidado == 4)
                            <a class="gradient_btn" href="/test/4"><span>Realizar test</span></a>
                        @else
                            <a  href="#"><span>Test bloqueado</span></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pricing_item">
                    <h1 class="p_price">Nivel 2</h1>
                    <h3 class="p_title">Conocimientos necesarios</h3>
                    <div class="p_list">
                        <ul>
                            <li>Sin conocimientos especificos previos</li>
                        </ul>
                    </div>
                    <div class="p_btn">
                        @if($testHabilidado == 5)
                            <a class="gradient_btn" href="/test/5"><span>Realizar test</span></a>
                        @else
                            <a  href="#"><span>Test bloqueado</span></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 hidden-md">
                <div class="pricing_item">
                    <h1 class="p_price">Nivel 3</h1>
                    <h3 class="p_title">Conocimientos necesarios</h3>
                    <div class="p_list">
                        <ul>
                            <li>Sin conocimientos especificos previos</li>
                        </ul>
                    </div>
                    <div class="p_btn">
                        @if($testHabilidado == 6)
                            <a class="gradient_btn" href="/test/6"><span>Realizar test</span></a>
                        @else
                            <a  href="#"><span>Test bloqueado</span></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contenedor-mensaje">
        <div style="">
            Recuerda para tomar el test del siguiente nivel, debes terminar el anterior
        </div>
    </div>

    <br>




@endsection


{{--@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <ul>
                            <li> Mindmeister <a href="/uploads/mindmeister-4-4-1.apk">Descargar</a></li>
                            <li> Mindomo  <a href="/uploads/mindomo-3-1-9.apk">Descargar apk</a> <a href="/uploads/Mindomo_v.8.0.42_x64.exe">Descargar exe</a></li>
                            <li> Kodu Game Lab<a href="/uploads/kodu.msi">Descargar</a>  </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection--}}
