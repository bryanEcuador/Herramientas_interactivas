@extends('layouts.app')
@section('content')
    <div style="background-color: #f9f9f9;padding: 45px; border: 25px; margin-top: 15px" class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <select class="form-control">
                    <option>Test de aptitud</option>
                    <option>Test de logica</option>
                </select>
                <br>
                <select class="form-control">
                    <option>nivel basico</option>
                    <option>nivel intermedio</option>
                    <option>nivel final</option>
                </select>
                <br>
                <label class="form-control-label">Ingresar pregunta</label>
                <input class="form-control" placeholder="ingrese su pregunta">
                <hr>
                <label class="form-control-label">Ingrese sus opciones</label>
                <input class="form-control" placeholder="pregunta">

                <button style="margin-top: 20px;" class="btn btn-primary">Agregar opción</button>
                <hr>
                <label class="form-control-label">Seleccione la pregunta correcta</label>
            </div>
        </div>
    </div>

@endsection

