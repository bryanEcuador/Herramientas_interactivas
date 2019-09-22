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
                                <select class="form-control" id="tipo_test" name="tipo_test">
                                    <option value="0" disabled selected> -- Tipo del test --</option>
                                    <option value="1">Test de aptitud</option>
                                    <option value="2">Test de logica</option>
                                </select>
                                <br>
                                <select class="form-control" id="nivel_test" name="nivel_test">
                                    <option value="0" disabled selected> -- Nivel del test --</option>
                                    <option value="1">Basico</option>
                                    <option value="2">Intermedio</option>
                                    <option value="3">Avanzado</option>
                                </select>
                                <br>
                                <label class="form-control-label"  for="pregunta">Ingresar pregunta  </label>
                                <input class="form-control" id="pregunta" placeholder="ingrese su pregunta">
                                 <label class="form-control-label mt-2" for="imagen">Ingrese la imagen de la pregunta</label>
                                <input class="form-control" type="file" id="imagen">
                                <hr>
                                <label class="form-control-label" for="opcion_test">
                                    Ingrese sus opciones <span id="opciones_disponibles" title="!maximo 5 opciones" class="badge badge-pill badge-info">5</span>
                                </label>
                                <input class="form-control" id="opcion_test" placeholder="Ingrese su opción">
                                <button style="margin-top: 20px;" class="btn btn-primary" id="agregar_opcion">Agregar opción</button>
                                <hr>
                                <label class="form-control-label">Seleccione la opción correcta para el test</label>
                                <fieldset id="opciones">
                                </fieldset>
                                <hr>
                                <button style="margin-top: 20px;" class="btn btn-primary" id="agregar_pregunta">Agregar pregunta</button>

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

@section('script')
    <script src="/js/creacion-preguntas.js"></script>
@endsection

