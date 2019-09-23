@extends('layouts.principal')
@section('css')
    <style>
        .input-style{
            margin-right: 5px;
        }

        .img-style{
            max-width: 100%;
            height: auto;
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
        let confirmacion
        let botonEnviar
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
        let textFormateado
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
            let contador = 0
            let img
            data.forEach(function(element) {
                ++contador
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
/*
                if (element.form_id == 2) {
                    if (contador == 1) {
                        textFormateado = document.createElement('pre');
                        textFormateado.innerText = '#include <stdio.h>\n' +
                            'main()\n' +
                            '{\n' +
                            '  printf ("¿Hola mundo!");\n' +
                            '  return 0;\n' +
                            '}'
                    } else if (contador == 2) {
                        textFormateado = document.createElement('pre');
                        textFormateado.innerText = 'int char double float MIVARIABLE[20];'
                    } else if (contador == 10) {
                        textFormateado = document.createElement('pre');
                        textFormateado.innerText = '#include <stdio.h>\n' +
                            'main()\t\n' +
                            '{ \n' +
                            'int i;\tfor ( i=0 ; i<5 ; i++ )\t\n' +
                            '\t{printf( "Hola\\n" );}\t\n' +
                            '}\n'
                    }
                } else if (element.form_id == 3) {
                    if (contador == 1) {
                        textFormateado = document.createElement('pre');
                        textFormateado.innerText = '#includeint main()\n' +
                            '{\n' +
                            'int n1,n2;\n' +
                            'printf("ingrese un numero entero:");\n' +
                            'scanf("%d",&n1);\n' +
                            'printf("ingrese otro número entero:");\n' +
                            'scanf("%d",&n2);\n' +
                            'if(n1>n2);\n' +
                            '{\n' +
                            'printf("el número mayor es %d",n1);\n' +
                            '}\n' +
                            'printf("los números son iguales");\n' +
                            '{\n' +
                            'printf(" el número mayor es % d", n2);\n' +
                            '}\n' +
                            'return 0;\n' +
                            '}\n'
                    } else if (contador == 2) {
                        textFormateado = document.createElement('pre');
                        textFormateado.innerText = '#include#includemain ()\n' +
                            '{\n' +
                            'int a,b,c;\n' +
                            'printf ("ingrese los 3#");\n' +
                            'scanf("%d,%d",a,b,c);\n' +
                            'i=a+b+c;\n' +
                            'printf("el resultado es %d,r");\n' +
                            'getch();\n' +
                            'return 0;\n' +
                            '}\n'
                    } else if (contador == 7) {
                        textFormateado = document.createElement('pre');
                        textFormateado.innerText = '#include <stdio.h>\n' +
                            'main()\t\n' +
                            '{ \n' +
                            'int i;\tfor ( i=1 ; i<4 ; i++ )\t\n' +
                            '\t{printf( "Programación\\n" );}\t\n' +
                            '}\n'
                    }
                }else if(element.form_id ==4){
                    if(contador == 1 || contador == 2 || contador == 3 || contador == 4 || contador == 10)
                    textFormateado = document.createElement('img')
                    textFormateado.setAttribute('src','/img/preguntas/'+element.form_id+''+element.id+'.PNG')
                    textFormateado.setAttribute('alt','')
                }else if(element.form_id ==5){
                    if(contador == 2 || contador == 4 || contador == 6 || contador == 8 || contador == 9 || contador == 10) {
                        textFormateado = document.createElement('img')
                        textFormateado.setAttribute('src', '/img/preguntas/' + element.form_id + '' + element.id + '.PNG')
                        textFormateado.setAttribute('alt','')

                    }
                }else if(element.form_id ==6){
                    if(contador == 2 || contador == 6 || contador == 7 || contador == 8 || contador == 9 || contador == 10) {
                        textFormateado = document.createElement('img')
                        textFormateado.setAttribute('src', '/img/preguntas/' + element.form_id + '' + element.id + '.PNG')
                        textFormateado.setAttribute('alt','')

                    }
                }
*/
                // crear imagen
                img = document.createElement('img')
                img.setAttribute('src','/storage/test/'+element.id)
                img.setAttribute('alt','')
                img.classList = 'img-style'
                // crear opciones
                opcion1 = document.createElement('input')
                opcion1.setAttribute('name',element.id)
                opcion1.setAttribute('type','radio')
                opcion1.setAttribute('value',element.r1)
                opcion1.setAttribute('required',element.r1)
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

                if(element.r5 != null){
                    opcion5 = document.createElement('input')
                    opcion5.setAttribute('name',element.id)
                    opcion5.setAttribute('type','radio')
                    opcion5.setAttribute('value',element.r5)
                    opcion5.classList = 'input-style';
                    re5 = document.createElement('label')
                    re5.innerText = element.r5
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
                if(element.r5 != null){
                    contenedorRadio.appendChild(opcion5)
                    contenedorRadio.appendChild(re5)
                    contenedorRadio.appendChild(document.createElement('br'))
                }

                contenedor.appendChild(pregunta)
           /*     if(element.form_id == 2){
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
                    if (contador == 2 || contador == 4 || contador == 6 || contador == 8 || contador == 9 || contador == 10) {
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
                contenedorPreguntas.appendChild(document.createElement('hr'))



                //  espacio

            })

            // crear el boton para enviar los datos al formulario

            let elementos = document.getElementById('elementos')
            botonEnviar = document.createElement('button')
            botonEnviar.innerText = 'Enviar'
            botonEnviar.setAttribute('type','submit')
            botonEnviar.setAttribute('disabled','disabled')
            botonEnviar.classList = 'btn btn-primary'

            // crear check
            confirmacion = document.createElement('input')
            confirmacion.setAttribute('type','checkbox')
            confirmacion.setAttribute('id','confirmacion')
            confirmacion.setAttribute('onchange','confirmar()')
            let textConfirmacion = document.createElement('i')
            textConfirmacion.innerText = ' Acepto que use las herramientas interactivas antes de realizar el test.'
            elementos.insertBefore(confirmacion,document.getElementById('ayuda'));
            elementos.insertBefore(textConfirmacion,document.getElementById('ayuda'));

            elementos.insertBefore(document.createElement('br'),document.getElementById('ayuda'));
            elementos.insertBefore(botonEnviar,document.getElementById('ayuda'));



        }

        function confirmar () {
            console.log(confirmacion.value)
            if(confirmacion.value == 'on'){
                confirmacion.setAttribute('disabled','disabled')
                botonEnviar.removeAttribute('disabled')
            }
        }





    </script>
@endsection
