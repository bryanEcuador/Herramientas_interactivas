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
        {{--<div class="descargas">
            <p>Descargas:
                <i>@if(isset($estadisticas))
                    {{$estadisticas[0]->downloads}} </p>
            @endif
            </i>
            </p>
        </div>--}}
        <div class="section-top-border">
            <h3 class="mb-30 title_color">Intentos realizados</h3>
            <table id="example" class="" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>USUARIO</th>
                    <th>LOGICO INICIAL</th>
                    <th>LOGICO INTERMEDIO</th>
                    <th>LOGICO FINAL</th>
                    <th>LOGICO ALEATORIO</th>
                    <th>APTITUD INICIAL</th>
                    <th>APTITUD INTERMEDIO</th>
                    <th>APTITUD FINAL</th>
                    <th>APTITUD ALEATORIO</th>
                </tr>
                </thead>
                <tbody>
               @foreach($resultados as $resultado)
                <tr>
                    <td>{{$resultado->id}}</td>
                    <td>{{$resultado->name}}</td>
                    <td>{{$resultado->test_basico_logico}}</td>
                    <td>{{$resultado->test_intermedio_logico}}</td>
                    <td>{{$resultado->test_final_logico}}</td>
                    <td>{{$resultado->test_aleatorio_logico}}</td>
                    <td>{{$resultado->test_basico_aptitud}}</td>
                    <td>{{$resultado->test_intermedio_aptitud}}</td>
                    <td>{{$resultado->test_final_aptitud}}</td>
                    <td>{{$resultado->test_aletorio_aptitud}}</td>
                </tr>
               @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>USUARIO</th>
                    <th>LOGICO INICIAL</th>
                    <th>LOGICO INTERMEDIO</th>
                    <th>LOGICO FINAL</th>
                    <th>LOGICO ALEATORIO</th>
                    <th>APTITUD INICIAL</th>
                    <th>APTITUD INTERMEDIO</th>
                    <th>APTITUD FINAL</th>
                    <th>APTITUD ALEATORIO</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
           // $('#example').DataTable();
        });
    </script>
@endsection
