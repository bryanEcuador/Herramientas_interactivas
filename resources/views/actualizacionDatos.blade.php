@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:40%">
                            40%
                        </div>
                        <form method="post" action="{{ route('information.update') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="edad">Edad:</label>
                                <input type="number" min="1" max="80" class="form-control" id="edad" placeholder="Ingrese su edad" name="edad">
                            </div>
                            <div class="form-group form-check">
                                Habilidades
                                <hr>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="analisis"> Análisis
                                </label>
                                <br>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="logica"> Lógica
                                </label>
                                <br>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="redaccion"> Redacción
                                </label>
                                <br>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="descripcion"> Descripción
                                </label>
                            </div>
                            <label>Idiomas</label>
                            <hr>
                            <div class="form-group form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="ingles">Ingles
                                </label>
                                <br>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="frances">Fránces
                                </label>
                                <br>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="italiano">Italiano
                                </label>
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="discapacidad_fisica">Discapacidad fisica:</label>
                                <input type="number" min="1" max="100" class="form-control" id="discapacidad_fisica"  name="discapacidad_fisica">
                            </div>
                            <div class="form-group">
                                <label for="discapacidad_mental">Discapacidad mental:</label>
                                <input type="number" min="1" max="100" class="form-control" id="discapacidad_mental"  name="discapacidad_mental">
                            </div>

                            <label>Reconocimientos académicos</label>
                            <div class="form-inline" >
                                <input style="margin: 4px" type="text" name="reconocimiento1" class="form-control col-md-5">
                                <input style="margin: 4px" type="text" name="reconocimiento2" class="form-control col-md-5">
                                <input style="margin: 4px" type="text" name="reconocimiento3" class="form-control col-md-5">
                                <input style="margin: 4px" type="text" name="reconocimiento4" class="form-control col-md-5">
                                <input style="margin: 4px" type="text" name="reconocimiento5" class="form-control col-md-5">
                            </div>

                            <label>Logros obtenidos</label>
                            <div class="form-inline" >
                                <input style="margin: 4px" type="text" name="logro1" class="form-control col-md-5">
                                <input style="margin: 4px" type="text" name="logro2" class="form-control col-md-5">
                                <input style="margin: 4px" type="text" name="logro3" class="form-control col-md-5">
                                <input style="margin: 4px" type="text" name="logro4" class="form-control col-md-5">
                                <input style="margin: 4px" type="text" name="logro5" class="form-control col-md-5">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
