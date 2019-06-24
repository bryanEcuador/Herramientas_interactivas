@extends('layouts.principal')

@section('content')

    <!--================ Start Frequently Asked Questions Area ================-->
    <section class="frequently_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2>Inteligencia Lógico-matemático</h2>
                        <h1>Inteligencia Lógico-matemático</h1>
                    </div>
                </div>
            </div>
            <div class="row frequent_inner">
                <div class="col-lg-5 col-md-5">
                    <div class="frequent_item">
                        <p>
                            Esta inteligencia se define como la habilidad que tiene el individuo para razonar y comprender de forma precisa
                            problemas matemáticos. Estable una relación causa efecto.
                            Esta inteligencia destaca en Ingenieros, filósofos, matemáticos y científicos.

                        </p>
                    </div>
                </div>
                <div class="offset-lg-2 col-lg-5 offset-md-2 col-md-5">
                    <div class="frequent_item">
                        <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
                            especially in the workplace. That’s why it’s crucial that as women.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================ End Frequently Asked Questions Area ================-->



    <section class="recent_update_area section_gap">
        <div class="container">
            <div class="recent_update_inner">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                            SoloLearn
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                           aria-selected="false">
                            Buttons and Scissors
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row recent_update_text">
                            <div class="col-lg-6">
                                <div class="chart_img">
                                    <img class="img-fluid" src="img/recent_up.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section_content">
                                    <h6>Solo learm</h6>
                                    <p>
                                        Nos permitirá aprender a programar directamente desde nuestro terminal Android. Podremos aprender C++, Java, HTML,
                                        Python 3, SQL, PHP, Ruby, y mucho más. No tenemos más que elegir el curso que queremos hacer y empezar a trabajar en él.
                                        Tanto si tenemos conocimientos previos de programación como si no los tenemos, SoloLearn: Learn to Code for Free nos
                                        permitirá comenzar a crear y compilar nuestros propios programas. Por supuesto empezaremos por los fundamentos de cada
                                        lenguaje de programación, pero no tardaremos en empezar a escribir código. Además, si no queremos empezar desde el
                                        principio, no tendremos más que tomar un atajo.

                                        Todas las lecciones de SoloLearn: Learn to Code for Free están muy bien explicadas y normalmente acompañadas de su
                                        correspondiente vídeos y ejercicios. La aplicación irá llevando un registro de nuestros progresos en cada uno de los
                                        cursos que hagamos, algo particularmente útil si llevamos varios simultáneamente.

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row recent_update_text">
                            <div class="col-lg-6">
                                <div class="chart_img">
                                    <img class="img-fluid" src="img/recent_up.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section_content">
                                    <h6>Buttons and Scissors</h6>
                                    <p>
                                        Es un sencillo juego de puzles en el que el objetivo de los jugadores será cortar todos los botones de cada nivel, algo
                                        que sólo podrán hacer en línea recta y con botones del mismo color.
                                        Los jugadores encontrarán más de un centenar de niveles diferentes en Buttons and Scissors. Los primeros, compuestos por
                                        cuadrados de 5x5 están orientados a los jugadores novatos, mientras que los niveles posteriores de cuadrados de 6x6 y
                                        7x7 están reservados a los jugadores más hábiles.
                                        Al principio parecerá sencillo resolver todos los niveles, pero no tardaremos en descubrir que la mecánica de Buttons
                                        and Scissors tiene sus entresijos.

                                    </p>
                                    <a class="primary_btn" href="#">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row recent_update_text">
                            <div class="col-lg-6">
                                <div class="chart_img">
                                    <img class="img-fluid" src="img/recent_up.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section_content">
                                    <h6>Buttons and Scissors</h6>
                                    <p>
                                        Es un sencillo juego de puzles en el que el objetivo de los jugadores será cortar todos los botones de cada nivel,
                                        algo
                                        que sólo podrán hacer en línea recta y con botones del mismo color.
                                        Los jugadores encontrarán más de un centenar de niveles diferentes en Buttons and Scissors. Los primeros, compuestos
                                        por
                                        cuadrados de 5x5 están orientados a los jugadores novatos, mientras que los niveles posteriores de cuadrados de 6x6
                                        y
                                        7x7 están reservados a los jugadores más hábiles.
                                        Al principio parecerá sencillo resolver todos los niveles, pero no tardaremos en descubrir que la mecánica de
                                        Buttons
                                        and Scissors tiene sus entresijos.

                                    </p>
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
    <br>




@endsection
