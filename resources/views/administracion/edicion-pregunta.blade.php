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
                    <form method="put" id="login-form" action="update_preguntas/{{$preguntas[0]->id}}">
                    @foreach($preguntas as $pregunta)
                        <div class="form-group">
                        <label class="form-control-label">Pregunta</label>
                        <input class="form-control" required name="pregunta" value= "{{$pregunta->question }}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Primera respuesta</label>
                        <input class="form-control" required name="r1" value= "{{$pregunta->r1}}"">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Segunda respuesta</label>
                        <input class="form-control" name="r2" required value="{{$pregunta->r2}}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Tercera respuesta</label>
                        <input class="form-control" name="r3" value="@php echo $pregunta->r3 @endphp" >
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Cuarta respuesta</label>
                        <input class="form-control" name="r4" value="@php echo $pregunta->r4 @endphp">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Quinta respuesta</label>
                        <input class="form-control" name="r5" value="@php echo $pregunta->r5 @endphp">
                    </div>
                     @endforeach
                    <div class="form-group">
                        <label class="form-control-label">Seleccione la respuesta correcta</label>
                        <select name="opcion_correcta" class="form-control" required>
                            @foreach($opciones as $opcion)
                                <option value="{{$opcion}}">    {{$opcion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      --  <figure>
                            <img style="max-width: 100%;height: auto;" src="{{'/storage/test/'.$preguntas[0]->img}}" alt="">
                        </figure>
                        <hr>
                        <input type="file" name="imagen">
                    </div>
                    <hr>
                    <input class="btn btn-primary" type="submit" id="enviar" value="Actualizar" ">
                    </form>
                </div>

        </div>
    </div>
@endsection

@section('script')

    <script>
        document.getElementById('enviar').addEventListener('click', function (e){
                e.preventDefault();
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
                        alert('exito')
                    })
                    .catch(function(error){
                        alert('error')

                    });
            }


        );

    </script>

@endsection
