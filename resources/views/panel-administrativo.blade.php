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

    <div style="margin-top: 70px; padding: 40px; margin-bottom: 70px;">
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
            <div class="progress-table-wrap" >
                <div class="progress-table">
                    <div class="table-head" style="justify-content: space-between;">
                        <div class="serial">ID</div>
                        <div class="country">USUARIO</div>
                        <div class="country">LOGICO INICIAL</div>
                        <div class="country">LOGICO MEDIO</div>
                        <div class="country">LOGICO FINAL</div>
                        <div class="country">APTITUD INICIAL</div>
                        <div class="country">APTITUD MEDIO</div>
                        <div class="country">APTITUD FINAL</div>
                    </div>
                    @foreach($resultados as $resultado)
                    <div class="table-row " style="justify-content: space-between;">
                            <div class="serial">{{$resultado->id}}</div>
                            <div class="country">{{$resultado->name}}</div>
                            <div class="country">{{$resultado->test_basico_logico}}</div>
                            <div class="country">{{$resultado->test_intermedio_logico}}</div>
                            <div class="country">{{$resultado->test_final_logico}}</div>
                            <div class="country">{{$resultado->test_basico_aptitud}}</div>
                            <div class="country">{{$resultado->test_intermedio_aptitud}}</div>
                            <div class="country">{{$resultado->test_final_aptitud}}</div>
                    </div>
                    @endforeach
                </div>
            </div>
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
