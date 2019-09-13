@extends('layouts.principal')
@section('css')
    <style>
        .contenedor-mensaje {
            padding-left: 5%;
            padding-right: 5%;
            border-left: 20px;
            color: white;
            font-size: 20px;
            background-color: #342b7f;
            padding-top: 20px;
            padding-bottom: 20px;
            display: flex;
            align-content: center;
        }
        .mensaje {
            margin-right: 20%;
            margin-left: 20%;
        }
    </style>
@endsection
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div style="margin-top: 90px;" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">test de comprobación</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="mensaje" style="display: none">
                        <p class="text text-danger">Debe constestar todas las preguntas para poder continuar</p>
                    </div>
                    <form>
                        <div class=""><h3 style="display: block;">La definición de una variable se realiza de la siguiente manera:</h3></div>
                        <div class="radio">
                            <input name="1" type="radio" class="input-style"><label>int valor1;</label>
                            <br>
                            <input name="1" type="radio" class="input-style"><label>const int valor1=25;</label>
                            <br><input name="1" type="radio"  class="input-style"><label>include valor1;</label>
                            <br><input name="1" type="radio"  class="input-style"><label>int valor1=25;</label>
                            <br>
                        </div>
                        <hr>
                        <div class=""><h3 style="display: block;">Un código en C++ debe pasar por los procesos de Compilación y Ejecución</h3></div>
                        <div class="radio">
                            <input name="2" type="radio" class="input-style"><label>Verdadero;</label>
                            <br><input name="2" type="radio"  class="input-style"><label>Falso</label>
                            <br>
                        </div>
                        <hr>
                        <div class=""><h3 style="display: block;">¿La función return devuelve valores alfanuméricos y caracteres especiales?</h3></div>
                        <div class="radio">
                            <input name="3" type="radio" class="input-style"><label>Verdadero;</label>
                            <br><input name="3" type="radio"  class="input-style"><label>Falso</label>
                            <br>
                        </div>
                        <hr>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="preTest()"> Enviar </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="descargas">
        <p>Descargas:
            <i>
                @if(isset($estadisticas))
                {{$estadisticas[0]->downloads}} </p>
                @endif
            </i>
        </p>
    </div>
    <!--================ Start Frequently Asked Questions Area ================-->
    <section style="margin-top: 125px" class="frequently_area">
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
                            <br><br><br>
                        </p>
                    </div>
                </div>
                <div class="offset-lg-2 col-lg-5 offset-md-2 col-md-5">
                    <div class="frequent_item">
                        <p>Las personas que tienen un nivel alto en este tipo de inteligencia poseen sensibilidad para realizar esquemas y relaciones lógicas, afirmaciones, proposiciones, funciones y otras abstracciones relacionadas. Un ejemplo de ejercicio intelectual de carácter afín a esta inteligencia es resolver pruebas que miden el cociente intelectual.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================ End Frequently Asked Questions Area ================-->
    <br>
    <h2 class="sub_titulo">Conoce las Herramientas Interactivas!!</h2>
    <h4 class="sub_titulo">Aplicativos Lógica Matemáticas</h4>

    <section class="recent_update_area section_gap">
        <div class="container">
            <div class="recent_update_inner">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#learn" role="tab" aria-controls="home" aria-selected="true">
                            SoloLearn
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                           aria-selected="false">
                            Buttons and Scissors
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="learn" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row recent_update_text">
                            <div class="col-lg-6">
                                <div class="chart_img">
                                    <img class="img-fluid" src="img/coder.jpg" alt="">
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
                                        <br>
                                    </p>
                                    <p style="display: inline; margin-right:0;font-size: 10px; padding: 2px">PAGINA OFICIAL :</p>
                                    <a style="font-size: 10px; color: #fff;" href="https://www.sololearn.com/">
                                        www.sololearn.com
                                    </a>
                                    <br>
                                    @if(auth()->user()->name !== 'Admin')
                                    <a class="primary_btn" href="/uploads/apps/SoloLearn.apk">Descargar</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row recent_update_text">
                            <div class="col-lg-6">
                                <div class="chart_img">
                                    <img class="img-fluid" src="img/Buttons and Scissors 5x5 Level 94.jpg" alt="">
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
                                    {{--<p style="display: inline; margin-right:0;font-size: 10px; padding: 2px">PAGINA OFICIAL :</p>--}}
                                    {{--<a style="font-size: 10px; color: #fff;" href="https://www.mindomo.com/es/">--}}
                                        {{--www.mindomo.com--}}
                                    {{--</a>--}}
                                    <br>
                                    @if(auth()->user()->name !== 'Admin')
                                    <a class="primary_btn" href="/uploads/apps/Buttons.apk" target="_blank" >Descargar</a>
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

    <h2 class="sub_titulo">Herramientas de Conocimientos</h2>

    <section class="recent_update_area section_gap">
        <div class="container">
            <div class="recent_update_inner">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#ZinjaI" role="tab" aria-controls="home" aria-selected="true">
                            ZinjaI
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#Progranimate" role="tab" aria-controls="contact"
                           aria-selected="false">
                            Progranimate
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " id="contact-tab" data-toggle="tab" href="#GeoGebra" role="tab" aria-controls="contact"
                           aria-selected="false">
                            GeoGebra
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " id="contact-tab" data-toggle="tab" href="#PSeInt" role="tab" aria-controls="contact"
                           aria-selected="false">
                            PSeInt
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="ZinjaI" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row recent_update_text">
                            <div class="col-lg-6">
                                <div class="chart_img">
                                    <img class="img-fluid" src="img/flow.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section_content">
                                    <h6>ZinjaI</h6>
                                    <p>
                                        Presenta una interfaz inicial muy sencilla con funciones avanzadas permitiendo el desarrollo de proyectos complejos, diseñada para estudiantes en aprendizaje de  programación para C, C++.
                                        Estudiantes/Principiantes: los estudiantes de programación/C++ encontrarán en ZinjaI un entorno amigable y muy fácil de aprender a utilizar, con el cual podrán comenzar a realizar prácticas muy rápidamente y sin preocuparse por detalles relacionados al compilador o la gestión de proyectos. De esta forma podrán centrar su atención exclusivamente en el lenguaje y la lógica, y dejar que el IDE resuelva el resto de los problemas.
                                        Avanzados/Profesionales: los programadores con conocimiento avanzado de C++ encontrarán en ZinjaI la flexibilidad suficiente para desarrollar cualquier tipo de proyecto sin importar su complejidad, y el nivel de personalización adecuado para adaptarlo a sus costumbres y necesidades. Podrán entender y explotar muchas de sus funcionalidades de edición y gestión de proyectos específicas, que los llevarán a desarrollar sus programas muy rápidamente.
                                    </p>
                                    <p style="display: inline; margin-right:0;font-size: 10px; padding: 2px">PAGINA OFICIAL :</p>
                                    <a style="font-size: 10px; color: #fff;" href="http://zinjai.sourceforge.net/">zinjai.sourceforge.net</a>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="GeoGebra" role="tabpanel" aria-labelledby="home-tab">
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
                                    <p style="display: inline; margin-right:0;font-size: 10px; padding: 2px">PAGINA OFICIAL :</p>
                                    <a style="font-size: 10px; color: #fff;" href="https://www.geogebra.org/graphing?lang=es">www.geogebra.org</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="Progranimate" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row recent_update_text">
                            <div class="col-lg-6">
                                <div class="chart_img">
                                    <img class="img-fluid" src="img/Progranimate.png" alt="" height="660px">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section_content">
                                    <h6>Progranimate</h6>
                                    <p>
                                        Progranimate es una herramienta de resolución de problemas visuales interactiva y un generador de código.
                                        Está dirigido a enseñar los conceptos básicos de la programación y al fortalecimiento de las habilidades de resolución de problemas y de lectura de código de los programadores novatos. Esto está en relación con los conceptos imperativos (no orientados a objetos) de variables, selección de secuencias, iteración y matrices.
                                        Progranimate utiliza una metáfora visual (el diagrama de flujo) para visualizar la programación y el proceso de ejecución. Esto tiene como objetivo fomentar modelos efectivos y precisos de conceptos de programación, algoritmos y ejecución.
                                        Para utilizar completamente este sitio, debe tener instalado el tiempo de ejecución Java J2SE 1.5 (o superior). La instalación de Java le permitirá utilizar el entorno de programación Progranimate.

                                    </p>
                                    <p style="display: inline; margin-right:0;font-size: 10px; padding: 2px">PAGINA OFICIAL :</p>
                                    <a style="font-size: 10px; color: #fff;" href="http://www.progranimate.com/">www.progranimate.com</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="PSeInt" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row recent_update_text">
                            <div class="col-lg-6">
                                <div class="chart_img">
                                    <img class="img-fluid" src="img/pseint.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section_content">
                                    <h6>PSeInt</h6>
                                    <p>
                                        PSeInt es un sencillo programa de comprensión asequible para los que no cuentan con conocimientos informáticos avanzados. Cuenta con unos tutoriales en vídeo que resultan sumamente didácticos y muestran cómo trabajar con la aplicación.
                                        Con la interpretación de los pseudocódigos que te enseña PSeInt aprenderás métodos de programación, y todo de una manera muy sencilla, ya que usa un pseudo-lenguaje limitado, simple e intuitivo orientado en todo momento a la enseñanza. Todo el programa está desarrollado en español, con lo que no tendremos que sufrir la barrera del idioma, tan habitual en estos casos de programación.

                                    </p>
                                    <h6>Caracteristicas y Funcionalidades de PSeInt:</h6>
                                    <ul>
                                        <li style="color: #fff;">Es totalmente libre y gratuito (licencia GPLv2)</li>
                                        <li style="color: #fff;">Puede interpretar (ejecutar) los algoritmos escritos</li>
                                        <li style="color: #fff;">Permite la edición simultánea de múltiples algoritmos</li>
                                        <li style="color: #fff;">Determina y marca claramente los errores</li>
                                    </ul>
                                    <p style="display: inline; margin-right:0;font-size: 10px; padding: 2px">PAGINA OFICIAL :</p>
                                    <a style="font-size: 10px; color: #fff;" href="http://pseint.sourceforge.net//">pseint.sourceforge.net//</a>
                                    <br>
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
                    <h2>Mide tus habilidades de inteligencias de conocimiento con un test!!</h2>
                    <h1>Test de conocimiento</h1>
                </div>
            </div>
        </div>
        <div id="pre-test" style="display: none" class="comment-form">
            <h4>Veamos cuanto sabes con este test</h4>
            <p>Antes de avanzar en los diferentes niveles debes completar este test</p>
            <div>
                <button class="primary-btn primary_btn"  id="modal" data-toggle="modal" data-target="#exampleModal">Realizar test</button>
            </div>
        </div>
        <div id="final-test" style="display: none" class="comment-form">
            <h4>test de final</h4>
            <p>Este es el test final que agrupa todos los conocimientos</p>
            <div>
                <a class="gradient_btn" href="/test/11"><span>Realizar test</span></a>
            </div>
        </div>
        <div id="test-iniciales" style="display: none" class="row">
            <div class="col-lg-4 col-md-6">
                <div class="pricing_item">
                    <h1 class="p_price">Nivel 1</h1>
                    <h3 class="p_title">Conocimiento Básico</h3>
                    <div class="p_list">
                        <ul>
                            <li>Variables</li>
                            <li>Tipos de datos</li>
                            <li>Funciones</li>
                        </ul>
                    </div>
                    <div class="p_btn">
                        @if($testHabilidado == 1)
                        <a class="gradient_btn" href="/test/1"><span>Realizar test</span></a>
                        @else
                            <a  href="#"><span>Test bloqueado</span></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pricing_item">
                    <h1 class="p_price">Nivel 2</h1>
                    <h3 class="p_title">Conocimiento Intermedio</h3>
                    <div class="p_list">
                        <ul>
                            <li>Arreglos</li>
                            <li>Sintaxis del lenguaje</li>
                            <li>Ciclos</li>
                        </ul>
                    </div>
                    <div class="p_btn">
                        @if($testHabilidado == 2)
                        <a class="gradient_btn" href="/test/2"><span>Realizar test</span></a>
                        @else
                            <a  href="#"><span>Test bloqueado</span></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 hidden-md">
                <div class="pricing_item">
                    <h1 class="p_price">Nivel 3</h1>
                    <h3 class="p_title">Conocimiento Avanzado</h3>
                    <div class="p_list">
                        <ul>
                            <li>Alcance de las variables</li>
                            <li>Operadores</li>
                            <li>Sintaxis</li>
                        </ul>
                    </div>
                    <div class="p_btn">
                        @if($testHabilidado == 3)
                        <a class="gradient_btn" href="/test/3"><span>Realizar test</span></a>
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

    <script>
        test :'';
        init();

        function preTest(){
            debugger
            hasError = false
            if(!document.querySelector('input[name="1"]:checked')) {
                hasError = true;
            }
            if(!document.querySelector('input[name="2"]:checked')) {
                hasError = true;
            }
            if(!document.querySelector('input[name="3"]:checked')) {
                hasError = true;
            }
            if(hasError){
                // muestra mensaje
                document.querySelector('#mensaje').style.display = 'block';
            }else{
                localStorage.setItem("pre-test", true);
               $('#exampleModal').modal('hide')
                location.reload()
            }
        }

        function init(){
            test = @json($testHabilidado);
            if (test > 1){
                document.querySelector('#test-iniciales').style.display = 'flex'
            }else {
                if(localStorage.getItem("pre-test")){
                    document.querySelector('#test-iniciales').style.display = 'flex'
                }else{
                    document.querySelector('#pre-test').style.display = 'block'
                }
            }
            console.log(test)

            if(test == 4){
                document.querySelector('#final-test').style.display = 'block'
                document.querySelector('#test-iniciales').style.display = 'none'
            }

        }
    </script>
@endsection
