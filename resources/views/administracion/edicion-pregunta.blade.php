@extends('layouts.app')
@section('css')
    <style>
        .contenido {
            background-color: #e6e8e8;
            padding: 45px;
            border: 25px;
            margin-top: 15px;
            box-shadow: 9px 9px 13px #0000006b;
        }
    </style>
@endsection
@section('content')
    <div class="container contenido">
        <div class="row justify-content-md-center">

                <div class="col-md-8">
                    <form method="post" id="login-form" action="update_preguntas/{{$preguntas[0]->id}}">
                        <div id="mensaje">

                        </div>
                    @foreach($preguntas as $pregunta)
                        <div class="form-group">
                        <label class="form-control-label">Pregunta</label>
                        <input class="form-control" required id="pregunta" name="pregunta" value= "{{$pregunta->question }}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Primera respuesta</label>
                      <input class="form-control" required name="r1" id="r1" value= "{{$pregunta->r1}}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Segunda respuesta</label>
                        <input class="form-control" name="r2" id="r2" required value="{{$pregunta->r2}}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Tercera respuesta</label>
                        <input class="form-control" name="r3" id="r3" value="{{$pregunta->r3}}" >
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Cuarta respuesta</label>
                        <input class="form-control" name="r4" id="r4" value="{{$pregunta->r4}}" >
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Quinta respuesta</label>
                        <input class="form-control" name="r5" id="r5" value="{{$pregunta->r5}}">
                    </div>
                     @endforeach
                    <div class="form-group">
                        <label class="form-control-label">Seleccione la respuesta correcta</label>
                        <select name="opcion_correcta" class="form-control" id="correcta" required>
                            @foreach($opciones as $opcion)
                                <option value="{{$opcion}}">    {{$opcion}}</option>
                            @endforeach
                        </select>
                    </div>

                     <div class="form-group">
                          <label class="form-control-label">Seleccione el estado de la pregunta</label>
                        <select name="estado" class="form-control">
                                <option value=1>Activa</option>
                                <option value=0>Inactiva</option></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <figure>
                            <img style="max-width: 100%;height: auto;" src="{{'/storage/test/'.$preguntas[0]->img}}" alt="">
                        </figure>
                        <hr>
                        <input type="file" name="imagen" id="img">
                    </div>
                   
                    <hr>
                    <input class="btn btn-primary" type="submit" id="enviar" value="Actualizar">
                    </form>
                </div>

        </div>
    </div>
@endsection

@section('script')

    <script>
        let html = `<div class= "alert alert-danger"> 
                        <strong>Corriga los siguientes errores para poder actualizar la pregunta</strong>
                           <ul> ` 
        '';
            const imagen = document.getElementById('img')

      
        document.getElementById('enviar').addEventListener('click', (e) => {
            e.preventDefault();

                let validacion = validar()
                if(validacion == 0){
                    enviar()
                }else{
                    document.getElementById('mensaje').innerHTML = html;
                }
            
            });
        
            
           function validar() {
            let estado = 0
            let pregunta = document.querySelector('#pregunta').value
            let r1 = document.querySelector('#r1').value
            let r2 = document.querySelector('#r2').value
            
            pregunta = pregunta.trim()
            if(pregunta.length < 1 ){
                estado = -1
                html += '<li>Debe ingresar una pregunta</li>'
            }

             r1 = r1.trim()
            if(r1.length < 1 ){
                estado = -1
                html += '<li>Debe ingresar la primera opción</li>'
            }

             r2 = r2.trim()
            if(r1.length < 1 ){
                estado = -1
                html += '<li>Debe ingresar la segunda opción</li>'
            }

            console.log(imagen.files[0])
             if (imagen.files[0] !== undefined){
                tipo = imagen.files[0].type
                let jpeg = tipo.indexOf('jpeg')
                let png = tipo.indexOf('png')
                let jpg = tipo.indexOf('jpg')

                if (jpeg !== -1 || png !== -1 || jpg !== -1) {
                    // 
                    console.log('');
                } else {
                    estado = -1
                     html += '<p>Debe seleccionar una imagen de tipo jpeg, png o jpg </p>'
                }
            }    


            html += '</ul></div>'

            return estado;
            
        }
           
        function enviar(){
                let meta = document.getElementsByTagName('meta');
                let myHeaders = new Headers();
                myHeaders.append("X-CSRF-TOKEN", meta[2].content);
                let form = new FormData(document.getElementById('login-form'));

                let myInit = {
                    method: 'POST',
                    headers: myHeaders,
                    mode: 'cors',
                    cache: 'default',
                    body : form
                };

                let url = '/administracion/update_preguntas/'+@json($preguntas[0]->id);
                let myRequest = new Request(url, myInit);

                fetch(myRequest)
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (json) {
                        mensaje('exito','Pregunta actualizada con exito')
                    })
                    .catch(function(error){
                        mensaje('error',error)

                    });
        }

        function mensaje(tipo,mensaje) {
            let mensajes = `<div>`

                if(tipo == 'exito'){
                    mensajes += '<div class="alert alert-primary"><p>Pregunta actualizada con exito en unos segudos sera redigido</p></div>'

                    setTimeout(() => {
                        window.location = '/administracion/gestion'
                    }, 5000);
                }else{
                    mensajes += `<div class="alert alert-danger">
                        <strong>Error</strong>
                        <p>${mensaje}</p></div>`
                }

                mensajes +='</div>'
                 document.getElementById('mensaje').innerHTML = mensajes;

        }

    </script>

@endsection
