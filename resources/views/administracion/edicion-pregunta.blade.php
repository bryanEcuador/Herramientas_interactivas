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
                    <form method="put" action="update_preguntas/{{$preguntas[0]->id}}">
                    <div class="form-group">
                        <label class="form-control-label">Pregunta</label>
                        <input class="form-control" required name="pregunta" value=@php echo $preguntas[0]->question @endphp>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Primera respuesta</label>
                        <input class="form-control" required name="r1" value=@php echo $preguntas[0]->r1 @endphp>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Segunda respuesta</label>
                        <input class="form-control" name="r2" required value=@php echo $preguntas[0]->r2 @endphp>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Tercera respuesta</label>
                        <input class="form-control" name="r3" value=@php echo $preguntas[0]->r3 @endphp >
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Cuarta respuesta</label>
                        <input class="form-control" name="r4" value=@php echo $preguntas[0]->r4 @endphp>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Quinta respuesta</label>
                        <input class="form-control" name="r5" value=@php echo $preguntas[0]->r5 @endphp>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Seleccione la respuesta correcta</label>
                        <select name="opcion_correcta" class="form-control" required>
                            @foreach($opciones as $opcion)
                                <option value={{$opcion}}> {{$opcion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <figure>
                            <img style="max-width: 100%;height: auto;" src="{{'/storage/test/'.$preguntas[0]->img}}">
                        </figure>
                        <hr>
                        <input type="file" name="imagen">
                    </div>
                    <hr>
                    <input class="btn btn-primary" id="enviar" value="Actualizar" onclick="enviar()">
                    </form>
                </div>

        </div>
    </div>
@endsection

@section('script')
@endsection

<script>


    function enviar(e){
        e.preventDefault();
        let url = '\guardar_preguntas';
        let meta = document.getElementsByTagName('meta');
        let myHeaders = new Headers();
        myHeaders.append("X-CSRF-TOKEN", meta[2].content);
        var form = new FormData(document.getElementById('login-form'));

        let myInit = {
            method: 'POST',
            headers: myHeaders,
            mode: 'cors',
            cache: 'default',
            body : form
        };

        var myRequest = new Request(url, myInit);

        fetch()
    }
</script>
