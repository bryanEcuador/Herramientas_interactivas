@extends('layouts.app')

@section('content')
    <div class="container">


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">@</h5>
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



        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <h1>Aprende a programar utilizando inteligencias multiples</h1>
                        <p> Uno de los teóricos con más influencia en la actualidad es el Psicólogo Howard Gardner,
                            quien hizo una gran controversia con su teoría acerca de las inteligencias múltiples esto
                            debido a que el autor cuestiona que la inteligencia sea vista desde una forma unilateral
                            y más bien propone la idea de una visión bilateral o global, en el cual la inteligencia
                            deberá de comprenderse como un conjunto de inteligencias heterogéneas y diferentes.
                            De esta manera Gardner plantea ocho tipos de inteligencias. </p>

                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="400x400.png" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Inteligencia Lógico-matemático</h4>
                                <p class="card-text">Esta inteligencia se define como la habilidad que tiene el individuo
                                    para razonar y comprender de forma precisa problemas matemáticos</p>
                                <a href="/inteligencia/matematica" class="btn btn-primary">Ver mas</a>
                            </div>
                        </div>
                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="400x400.png" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Inteligencia Espacial</h4>
                                <p class="card-text">Esta se define como la habilidad de imaginar dibujos en tres dimensiones.
                                    Quienes poseen esta habilidad tienen mayor facilidad para recordar fotos y objetos que recordar palabras. </p>
                                <a href="/inteligencia/espacial" class="btn btn-primary">Ver mas</a>
                            </div>
                        </div>
                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="400x400.png" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Inteligencia Lingüística</h4>
                                <p class="card-text">Se define como la habilidad para utilizar el lenguaje oral y escrito,
                                    por lo general quienes dominan esta capacidad
                                    tienen una inteligencia lingüística superior puesto
                                    que se les es fácil explicar, leer, narrar y memorizar.</p>

                            </div>
                        </div>
                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="400x400.png" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Inteligencia Musical</h4>
                                <p class="card-text">Se presenta como la habilidad para escuchar,
                                    cantar, interpretar y tocar instrumentos. Quienes poseen esta habilidad
                                    son sensibles al ritmo, tono y al timbre.
                                    Los profesionales que destacan en esta inteligencia pueden ser músicos,
                                    interpretes, bailarines, entre otros.
                                </p>

                            </div>
                        </div>
                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="400x400.png" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Inteligencia Ecológica</h4>
                                <p class="card-text">Es la habilidad de interpretar e interactuar con la naturaleza,
                                    quienes poseen esta capacidad disfruta de caminatas,
                                    plantas, sonidos y demás atractivos que ofrece el ambiente natural.
                                </p>

                            </div>
                        </div>
                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="400x400.png" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Inteligencia Interpersonal</h4>
                                <p class="card-text">
                                    Se destaca por ser la inteligencia que permite la compresión de los sentimientos y necesidades del otro. Se centra en el entendimiento de los factores importantes, creando una fácil interacción y empatía en grupos sociales.
                                    Psicólogos, maestros, políticos gozan de esta inteligencia.

                                </p>

                            </div>
                        </div>
                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="400x400.png" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Intrapersonal</h4>
                                <p class="card-text">
                                    Esta es la capacidad de conocerse uno mismo, nuestras acciones y aquellos sentimientos que nos dirigen como persona. Es la capacidad de describirse a sí mismo en sus fortalezas y debilidades que construyen a cada persona.

                                </p>

                            </div>
                        </div>

                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="400x400.png" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Inteligencia Corporal – Kinestésica</h4>
                                <p class="card-text">
                                    Las personas que destacan en esta inteligencia son aquellas que tienen la capacidad de usar hábilmente su cuerpo, de manera total o solo ciertas partes, para expresar ideas, construir algo o desarrollar una actividad. Mantienen un equilibrio y coordinación y aprenden mejor cuando están en movimiento.
                                    Muchos de ellos son bailarines, cirujanos, actores, entre otros.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        if(@json($status) < 100) {
            $('#exampleModal').modal('show')
        }

    </script>
@endsection