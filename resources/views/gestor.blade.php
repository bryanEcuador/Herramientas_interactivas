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
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " id="tap-gestionar" data-toggle="tab" href="#gestionar" role="tab" aria-controls="gestionar" aria-selected="true">Gestionar preguntas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="tap-agregar" data-toggle="tab" href="#agregar" role="tab" aria-controls="agregar" aria-selected="false">Agregar preguntas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tap-consultar" data-toggle="tab" href="#consultar" role="tab" aria-controls="consultar" aria-selected="false">Intentos por test</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    {{-- sección para gestionar preguntas --}}
                    <div class="tab-pane fade" id="gestionar" role="tabpanel" aria-labelledby="gestionar-tab">...</div>
                    {{-- Sección para agregar preguntas --}}
                    <div class="tab-pane fade show active" id="agregar" role="tabpanel" aria-labelledby="agregar-tab">
                        <div class="row justify-content-md-center">
                            <div class="col-md-10 mt-5">
                                <select class="form-control" id="tipo_test">
                                    <option disabled selected> -- Tipo del test --</option>
                                    <option>Test de aptitud</option>
                                    <option>Test de logica</option>
                                </select>
                                <br>
                                <select class="form-control" id="nivel_test">
                                    <option disabled selected> -- Nivel del test --</option>
                                    <option>Basico</option>
                                    <option>Intermedio</option>
                                    <option>Avanzado</option>
                                </select>
                                <br>
                                <label class="form-control-label"  for="pregunta">Ingresar pregunta  </label>
                                <input class="form-control" id="pregunta" placeholder="ingrese su pregunta">
                                <hr>
                                <label class="form-control-label" for="opcion_test">
                                    Ingrese sus opciones <span id="total_preguntas" class="badge badge-pill badge-info">5</span>
                                    <span class="text-warning"> <small>!maximo 5 opciones</small> </span>
                                </label>
                                <input class="form-control" id="opcion_test" placeholder="Ingrese su opción">

                                <button style="margin-top: 20px;" class="btn btn-primary">Agregar opción</button>
                                <hr>
                                <label class="form-control-label">Seleccione la pregunta correcta</label>
                                <fieldset>
                                    <legend>Seleccione la opción correcta</legend>
                                    <input type="radio">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    {{-- Sección para consultar intentos por test --}}
                    <div class="tab-pane fade" id="consultar" role="tabpanel" aria-labelledby="consultar-tab">...</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

    </script>
@endsection

