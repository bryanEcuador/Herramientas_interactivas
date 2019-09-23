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
            <div class="col-md-10">
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
                    <div class="tab-pane fade" id="gestionar" role="tabpanel" aria-labelledby="gestionar-tab">
                        <div class="container">
                            <table id="task" class="table table-hover table-condensed">
                                <thead>
                                <tr>
                                    <th>Pregunta</th>
                                    <th>respuesta a</th>
                                    <th>respuesta b</th>
                                    <th>respuesta c</th>
                                    <th>respuesta d</th>
                                    <th>respuesta e</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($preguntas as $pregunta)
                                        <tr>
                                            <td>{{$pregunta->question}}</td>
                                            <td>{{$pregunta->r1}}</td>
                                            <td>{{$pregunta->r2}}</td>
                                            <td>{{$pregunta->r3}}</td>
                                            <td>{{$pregunta->r4}}</td>
                                            <td>{{$pregunta->r5}}</td>
                                            <td>
                                                <a href="preguntas/edit/{{$pregunta->id}}">Actualizar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- Sección para agregar preguntas --}}
                    <div class="tab-pane fade show active" id="agregar" role="tabpanel" aria-labelledby="agregar-tab">
                        <div class="row justify-content-md-center">
                            <div class="col-md-10 mt-5">
                                <div id="mensajes" style="display:none">
                                        <div class="alert alert-danger alert-dismissible fade" id="errores">
                                            <ul>
                                                <li id="error_general" style="display:none" id="error_archivo">!!hubo un error.</li>
                                                <li style="display:none" id="error_tipo">
                                                    Debe seleccionar el tipo de test.
                                                </li>
                                                <li style="display:none" id="error_nivel">
                                                    Debe seleccionar el nivel del test.
                                                </li>
                                                <li style="display:none" id="error_pregunta">
                                                    Debe Ingresar una pregunta.
                                                </li>
                                                <li style="display:none" id="error_opciones">
                                                    Debe ingresar al menos dos opciones.
                                                </li>
                                                <li style="display:none" id="error_opcion">
                                                Debe selecionar una de las opciones
                                                </li>
                                                <li style="display:none" id="error_archivo">
                                                    El tipo de archivo debe ser una foto
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                                
                                <div id="mensaje1" style="display: none">
                                    <div id="exito" class="alert alert-primary alert-dismissible fade">
                                        <p>Exito, la pregunta se a registrado con exito.</p>
                                    </div>
                                </div>
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
                                <button style="margin-top: 20px;" class="btn btn-primary" disabled id="agregar_opcion">Agregar opción</button>
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

  {{--  <script type="text/javascript">
        $(document).ready(function() {
            oTable = $('#task').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.preguntas') }}",
                "columns": [
                    {data: 'nombre', name: 'question'},
                    {data: 'opcion1', name: 'r1'},
                    {data: 'opcion2', name: 'r2'},
                    {data: 'opcion3', name: 'r3'},
                    {data: 'opcion4', name: 'r4'},
                    {data: 'opcion5', name: 'r5'},
                ]
            });
        });
    </script>--}}
@endsection

