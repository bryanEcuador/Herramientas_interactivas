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
        <div style="margin-top: 90px;" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Puntaje</h5>
                    </div>
                    <div class="modal-body">
                       <p id="puntaje"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

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
        let puntaje = 10
        let maxPuntaje = 0
        let contenedor;
        let contenedorRadio
        let contenedorElementos
        let parrafo
        let pregunta
        let opcion1
        let opcion2
        let opcion3
        let opcion4
        let opcion5
        let re1
        let re2
        let re3
        let re4
        let re5
        let id
        let textFormateado
        let contenedorPreguntas = document.querySelector('#preguntas')
        let cerrar = document.querySelector('#cerrar')


        window.onload = function () {
            crearFormulario()
        }

        cerrar.addEventListener('click',function() {
            enviar()
            setTimeout(function () {
                // captura el puntaje
                window.location = '/inteligencias'
            },4000)
        })


        function enviar(){

            var misCabeceras = new Headers();
            let id = @json($id);
            let tipo
            if(id == 1 || id == 2 || id == 3 || id == 11 ){
                tipo='logico'
            }else if(id == 4 || id == 5 || id == 6 || id == 12 ){
                tipo = 'espacial'
            }

            let url = '/guardarIntentosTest/'+id+'/'+tipo+'/'+puntaje
            var miInit = {
                method: 'GET',
                headers: misCabeceras,
                mode: 'cors',
                cache: 'default'
            };
            fetch(url,miInit)
                .then((response) => {
                    console.log(response)
                    return response.json()
                })
                .then((myRespond) => {
                    console.log(myRespond)
                })
                .catch( error => {
                    console.log(error)
                })
        }

        function crearFormulario(){
             id = @json($id);
            let url = '/resultados/preguntas/'+id
            $.get(url, { crossDomain : true} , (data) =>  {
                this.crear(data)
            }).fail( function() {
                console.log("fallo la peticion");
            });
        }

        function crear(data) {
            let dato
            let respuesta
            let contador = 0
            let botonEnviar

            data.forEach(function(element) {
                ++contador
                ++maxPuntaje
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

                // crear imagen
                img = document.createElement('img')
                img.setAttribute('src','/storage/test/'+element.id)
                img.setAttribute('alt','')
                img.classList = 'img-style'
                // crear opciones

                // crear opciones
                opcion1 = document.createElement('input')
                opcion1.setAttribute('name',element.id)
                opcion1.setAttribute('type','radio')
                opcion1.setAttribute('value',element.r1)
                opcion1.setAttribute('disabled',true)
                opcion1.classList = 'input-style';
                re1 = document.createElement('label')

                if(element.r1 == element.correcta){
                    re1.style.backgroundColor = '#eee'
                    re1.style.color = 'blue'
                }else{
                    if(element.r1 == element.option){
                        re1.style.backgroundColor = '#eee'
                        re1.style.color = 'red'
                        puntaje--
                    }
                }
                re1.innerText = element.r1

                // consultar por la respuesta



                opcion2 = document.createElement('input')
                opcion2.setAttribute('name',element.id)
                opcion2.setAttribute('type','radio')
                opcion2.setAttribute('value',element.r2)
                opcion2.classList = 'input-style';
                opcion2.setAttribute('disabled',true);
                re2 = document.createElement('label')

                if(element.r2 == element.correcta){
                    re2.style.backgroundColor = '#eee'
                    re2.style.color = 'blue'
                }else{
                    if(element.r2 == element.option){
                        re2.style.backgroundColor = '#eee'
                        re2.style.color = 'red'
                        puntaje--

                    }
                }
                re2.innerText = element.r2



                if(element.r3 != null){
                    opcion3 = document.createElement('input')
                    opcion3.setAttribute('name',element.id)
                    opcion3.setAttribute('type','radio')
                    opcion3.setAttribute('value',element.r3)
                    opcion3.setAttribute('disabled',true)
                    opcion3.classList = 'input-style';
                    re3 = document.createElement('label')
                    if(element.r3 == element.correcta){
                        re3.style.backgroundColor = '#eee'
                        re3.style.color = 'blue'
                    }else{
                        if(element.r3 == element.option){
                            re3.style.backgroundColor = '#eee'
                            re3.style.color = 'red'
                            puntaje--
                        }
                    }
                    re3.innerText = element.r3
                }

                if(element.r4 != null){
                    opcion4 = document.createElement('input')
                    opcion4.setAttribute('name',element.id)
                    opcion4.setAttribute('type','radio')
                    opcion4.setAttribute('value',element.r4)
                    opcion4.setAttribute('disabled',true)
                    opcion4.classList = 'input-style';
                    re4 = document.createElement('label')
                    if(element.r4 == element.correcta){
                        re4.style.backgroundColor = '#eee'
                        re4.style.color = 'blue'
                    }else{
                        if(element.r4 == element.option){
                            re4.style.backgroundColor = '#eee'
                            re4.style.color = 'red'
                            puntaje--
                        }
                    }
                    re4.innerText = element.r4
                }

                if(element.r5 != null){
                    opcion5 = document.createElement('input')
                    opcion5.setAttribute('name',element.id)
                    opcion5.setAttribute('type','radio')
                    opcion5.setAttribute('value',element.r5)
                    opcion5.classList = 'input-style';
                    re5 = document.createElement('label')
                    if(element.r5 == element.correcta){
                        re5.style.backgroundColor = '#eee'
                        re5.style.color = 'blue'
                    }else{
                        if(element.r5 == element.option){
                            re5.style.backgroundColor = '#eee'
                            re5.style.color = 'red'
                            puntaje--

                        }
                    }
                    re5.innerText = element.r5
                }

                // agregar elementos
                contenedorRadio.appendChild(opcion1)
                contenedorRadio.appendChild(re1)
                contenedorRadio.appendChild(document.createElement('br'))
                contenedorRadio.appendChild(opcion2)
                contenedorRadio.appendChild(re2)
                contenedorRadio.appendChild(document.createElement('br'))
                if(element.r3 != null){
                    contenedorRadio.appendChild(opcion3)
                    contenedorRadio.appendChild(re3)
                    contenedorRadio.appendChild(document.createElement('br'))
                }
                if(element.r4 != null){
                    contenedorRadio.appendChild(opcion4)
                    contenedorRadio.appendChild(re4)
                    contenedorRadio.appendChild(document.createElement('br'))
                }
                if(element.r5 != null){
                    contenedorRadio.appendChild(opcion5)
                    contenedorRadio.appendChild(re5)
                    contenedorRadio.appendChild(document.createElement('br'))
                }

                contenedor.appendChild(pregunta)
              /*  if(element.form_id == 2){
                    if(contador==1 || contador==2 || contador == 10){
                        textFormateado.style.backgroundColor = '#d4d4d4'
                        contenedor.appendChild(textFormateado)
                    }
                }else if(element.form_id == 3) {
                    if (contador == 1 || contador == 2 || contador == 7) {
                        textFormateado.style.backgroundColor = '#d4d4d4'
                        contenedor.appendChild(textFormateado)
                    }
                }else if(element.form_id == 4){
                    if (contador == 1 || contador == 2 || contador == 3 || contador == 4 || contador == 10) {
                        contenedor.appendChild(textFormateado)
                    }
                }else if(element.form_id == 5){
                    if (contador == 2 || contador == 4 || contador == 6  || contador == 8 || contador == 9 || contador == 10) {
                        contenedor.appendChild(textFormateado)
                    }
                }else if(element.form_id ==6){
                    if(contador == 2 || contador == 6 || contador == 7 || contador == 8 || contador == 9 || contador == 10) {
                        contenedor.appendChild(textFormateado)
                    }
                }*/
                contenedorPreguntas.appendChild(contenedor)
                contenedorPreguntas.appendChild(img)
                contenedorPreguntas.appendChild(contenedorRadio)


                // consultar respuesta

                //  espacio
               //console.log(element)
               /* try{
                    contenedorPreguntas.appendChild(respuesta)
                }catch (e){
                    console.log(e)
                }*/
            })

            // crear el boton para enviar los datos al formulario
            //console.log(respuesta)
            contenedorPreguntas.appendChild(document.createElement('hr'))
            botonEnviar = document.createElement('button')
            botonEnviar.innerText = 'Ver puntaje'
            botonEnviar.setAttribute('type','button')
            botonEnviar.setAttribute('data-toggle','modal')
            botonEnviar.setAttribute('data-target','#exampleModal')
            botonEnviar.classList = 'btn btn-primary'
            contenedorPreguntas.appendChild(botonEnviar)

            document.getElementById('puntaje').innerText = 'Usted ha alcanzado un puntaje de: '+puntaje+' sobre '+maxPuntaje



        }
    </script>
@endsection
