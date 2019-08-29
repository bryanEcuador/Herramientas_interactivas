@extends('layouts.principal')
@section('css')
 <style>
     .descargas {

         border-style: solid;
         border-color: transparent;
         padding: 10px;
         margin: 5px;
         width: 15%;
         height: auto;
         text-align: center;
         background-color: white;
         position: fixed;
         top: 25%;
         right: 5%;

     }

     .descargas p {
         letter-spacing: 1px;
         font-size:1.5vw
     }

     .descargas p i {
         font-weight : bold;
     }
 </style>
@endsection
@section('content')

    <div style="margin-top: 70px; padding: 40px;">
        <div class="descargas">
            <p>Descargas:
                <i>@if(isset($estadisticas))
                   {{$estadisticas[0]->downloads}} </p>
                @endif
                </i>
            </p>
        </div>
        <div class="section-top-border">
            <h3 class="mb-30 title_color">Libros recomendados</h3>
            <div class="progress-table-wrap" >
                <div class="progress-table">
                    <div class="table-head" style="justify-content: space-between;">
                        <div class="serial">#</div>
                        <div class="country">Nombre</div>
                        <div class="percentage">Descargar</div>
                    </div>
                    <div class="table-row " style="justify-content: space-between;">
                        <div class="serial">01</div>
                        <div class="country"> Ceballos C C++  Curso de programación 4Ed.</div>
                        <div class="percentage">
                            <a class="btn btn-warning" href="/libros/Ceballos C C++  Curso de programación 4Ed.pdf">Descargar</a>
                        </div>
                    </div>
                    <div class="table-row" style="justify-content: space-between">
                        <div class="serial">02</div>
                        <div class="country"> Como Programar C C++ y Java 4ta Edición - Deitel Deitel</div>
                        <div class="percentage">
                            <a class="btn btn-warning" href="/libros/Como Programar C C++ y Java 4ta Edición - Deitel Deitel.pdf">Descargar</a>
                        </div>
                    </div>
                    <div class="table-row" style="justify-content: space-between">
                        <div class="serial">03</div>
                        <div class="country"> El camino a un mejor programador.</div>
                        <div class="percentage">
                            <a class="btn btn-warning" href="/libros/El camino a un mejor programador.pdf">Descargar</a>
                        </div>
                    </div>
                    <div class="table-row" style="justify-content: space-between">
                        <div class="serial">04</div>
                        <div class="country"> El Lenguaje de Programación C Kernighan-Ritchie</div>
                        <div class="percentage">
                            <a class="btn btn-warning" href="/libros/El Lenguaje de Programación C Kernighan-Ritchie.pdf">Descargar</a>
                        </div>
                    </div>
                    <div class="table-row" style="justify-content: space-between">
                        <div class="serial">05</div>
                        <div class="country"> Fundamentos de los computadores</div>
                        <div class="percentage">
                            <a class="btn btn-warning" href="/libros/Fundamentos de los computadores.pdf">Descargar</a>
                        </div>
                    </div>
                    <div class="table-row" style="justify-content: space-between">
                        <div class="serial">06</div>
                        <div class="country"> Fundamentos de Programación con el Lenguaje de Programación C++</div>
                        <div class="percentage">
                            <a class="btn btn-warning" href="/libros/Fundamentos de Programación con el Lenguaje de Programación C++.pdf">Descargar</a>
                        </div>
                    </div>
                    <div class="table-row" style="justify-content: space-between">
                        <div class="serial">07</div>
                        <div class="country"> Pensar en C++ Volumen 1</div>
                        <div class="percentage">
                            <a class="btn btn-warning" href="/libros/Pensar en C++ Volumen 1.pdf">Descargar</a>
                        </div>
                    </div>
                    <div class="table-row" style="justify-content: space-between">
                        <div class="serial">08</div>
                        <div class="country"> Pensar en C++ Volumen 2</div>
                        <div class="percentage">
                            <a class="btn btn-warning" href="/libros/Pensar en C++ Volumen 2.pdf">Descargar</a>
                        </div>
                    </div>
                    <div class="table-row" style="justify-content: space-between">
                        <div class="serial">09</div>
                        <div class="country"> Programacion en C++ Deitel</div>
                        <div class="percentage">
                            <a class="btn btn-warning" href="/libros/Programacion en C++ Deitel.pdf">Descargar</a>
                        </div>
                    </div>
                    <div class="table-row" style="justify-content: space-between">
                        <div class="serial">10</div>
                        <div class="country"> Fundamentos de la programación</div>
                        <div class="percentage">
                            <a class="btn btn-warning" href="/libros/Fundamentos de la programación.pdf">Descargar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
