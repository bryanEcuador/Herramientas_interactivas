@extends('layouts.principal')
@section('css')
    <style>
        .input-style{
            margin-right: 5px;
        }
    </style>
@endsection
@section('content')
    <div class="container" style="margin-top: 125px; margin-bottom: 25px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div id="formulario">
                        <div style="background-color: #3e3590 ; color: #fff; font-size: 20px;" class="card-header">{{$nombre}}</div>
                        <form method="POST" action="/formulario/store" id="form">
                            @csrf
                            <div id="elementos" class="card-body element-wrap">
                                <div id="preguntas" >
                                </div>

                                <input type="text" value="{{$id}}" name="formulario" hidden>
                                <span id="ayuda"></span>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let contenedor;
        let contenedorRadio
        let contenedorElementos
        let parrafo
        let pregunta
        let opcion1
        let opcion2
        let opcion3
        let opcion4
        let re1
        let re2
        let re3
        let re4
        let contenedorPreguntas = document.querySelector('#preguntas')
        window.onload = function () {
            crearFormulario()
        }

        function crearFormulario(){
            let id = @json($id);
            let url = '/formulario/informacion/'+id
            $.get(url, { crossDomain : true} , (data) =>  {
                this.crear(data)
            }).fail( function() {
                console.log("fallo la peticion");
            });
        }

        function crear(data) {
            let dato
            data.forEach(function(element){
                // crear div principal
                contenedor = document.createElement('div')
                contenedor.classList = ''
                // crear div de radio
                contenedorRadio = document.createElement('div')
                contenedorRadio.classList = 'radio'

                // crear titulo de pregunta
                pregunta = document.createElement('h3')
                pregunta.textContent = element.question
                pregunta.style.display = 'block'

                // crear opciones
                opcion1 = document.createElement('input')
                opcion1.setAttribute('name',element.id)
                opcion1.setAttribute('type','radio')
                opcion1.setAttribute('value',element.r1)
                opcion1.classList = 'input-style';
                re1 = document.createElement('label')
                re1.innerText = element.r1


                opcion2 = document.createElement('input')
                opcion2.setAttribute('name',element.id)
                opcion2.setAttribute('type','radio')
                opcion2.setAttribute('value',element.r2)
                opcion2.classList = 'input-style';

                re2 = document.createElement('label')
                re2.innerText = element.r2

                if(element.r3 != null){
                    opcion3 = document.createElement('input')
                    opcion3.setAttribute('name',element.id)
                    opcion3.setAttribute('type','radio')
                    opcion3.setAttribute('value',element.r3)
                    opcion3.classList = 'input-style';
                    re3 = document.createElement('label')
                    re3.innerText = element.r3
                }

                if(element.r4 != null){
                    opcion4 = document.createElement('input')
                    opcion4.setAttribute('name',element.id)
                    opcion4.setAttribute('type','radio')
                    opcion4.setAttribute('value',element.r4)
                    opcion4.classList = 'input-style';
                    re4 = document.createElement('label')
                    re4.innerText = element.r4
                }

                // agregar elementos
                contenedorRadio.appendChild(opcion1)
                contenedorRadio.appendChild(re1)
                contenedorRadio.appendChild(document.createElement('br'))
                contenedorRadio.appendChild(opcion2)
                contenedorRadio.appendChild(re2)
                contenedorRadio.appendChild(document.createElement('br'))
                if(element.r4 != null){
                    contenedorRadio.appendChild(opcion3)
                    contenedorRadio.appendChild(re3)
                    contenedorRadio.appendChild(document.createElement('br'))
                }
                if(element.r4 != null){
                    contenedorRadio.appendChild(opcion4)
                    contenedorRadio.appendChild(re4)
                    contenedorRadio.appendChild(document.createElement('br'))
                }

                contenedor.appendChild(pregunta)
                contenedorPreguntas.appendChild(contenedor)
                contenedorPreguntas.appendChild(contenedorRadio)
                contenedorPreguntas.appendChild(document.createElement('hr'))



                //  espacio
               console.log(element)
            })

            // crear el boton para enviar los datos al formulario
            let botonEnviar
            let elementos = document.getElementById('elementos')
            botonEnviar = document.createElement('button')
            botonEnviar.innerText = 'Enviar'
            botonEnviar.setAttribute('type','submit')
            botonEnviar.classList = 'btn btn-primary'
            elementos.insertBefore(botonEnviar,document.getElementById('ayuda'));

            console.log(botonEnviar)
        }
    </script>
@endsection
