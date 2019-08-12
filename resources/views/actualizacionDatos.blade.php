@extends('layouts.principal')
@section('content')
    <div class="container" style="margin-top: 125px; margin-bottom: 25px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div style="background-color: #3e3590 ; color: #fff; font-size: 20px;" class="card-header">{{ __('Register') }}</div>
                    {{--<div> @if ($mensaje) $mensaje @endif </div>--}}
                    @if(isset($user_information) and isset($porcentaje) and isset($archievements) and isset($academic))
                        <div class="card-body">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:{{$porcentaje}}%">
                                {{$porcentaje}}%
                            </div>
                            <br>
                            @if($mensaje == true)
                                <div class="alert alert-primary" role="alert">
                                    Datos actualizados con exito
                                </div>
                            @endif
                            <form method="post" action="{{ route('information.update') }}">
                                @csrf
                                <div class="form-group">
                                    <input required type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre completo" name="nombre" value="{{$user_information->name}}">
                                </div>
                                <div class="form-group">
                                    <input required type="number" min="1" max="80" class="form-control" id="edad" placeholder="Ingrese su edad" name="edad" value="{{$user_information->age}}">
                                </div>
                                <div class="form-group form-check">
                                    Habilidades
                                    <hr>
                                    <div class="switch-wrap d-flex ">
                                        <div class="confirm-switch">
                                            <input type="checkbox" name="analisis" id="confirm-switch" @if ($user_information->skill_analysis == 1) checked @endif >
                                            <label for="confirm-switch"></label>
                                        </div>
                                        <p style="margin-left: 5px">Análisis</p>
                                    </div>
                                    <div class="switch-wrap d-flex ">
                                        <div class="confirm-switch">
                                            <input type="checkbox" name="logica" id="logica" @if ($user_information->skill_logic == 1) checked @endif >
                                            <label for="logica"></label>
                                        </div>
                                        <p style="margin-left: 5px">Logica</p>
                                    </div>
                                    <div class="switch-wrap d-flex ">
                                        <div class="confirm-switch">
                                            <input type="checkbox" name="redaccion" id="redaccion" @if ($user_information->skill_writing == 1) checked @endif >
                                            <label for="redaccion"></label>
                                        </div>
                                        <p style="margin-left: 5px">Redacción</p>
                                    </div>
                                    <div class="switch-wrap d-flex ">
                                        <div class="confirm-switch">
                                            <input type="checkbox" name="descripcion" id="descripcion" @if ($user_information->skill_description  == 1) checked @endif >
                                            <label for="descripcion"></label>
                                        </div>
                                        <p style="margin-left: 5px">Descripción</p>
                                    </div>


                            {{--<label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="analisis" @if ($user_information->skill_analysis == 1) checked @endif > Análisis
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox"  name="logica" @if ($user_information->skill_logic == 1) checked @endif> Lógica
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="redaccion" @if ($user_information->skill_writing == 1) checked @endif> Redacción
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="descripcion" @if ($user_information->skill_description == 1) checked @endif> Descripción
                            </label>--}}
                                </div>
                                <div class="form-group form-check">

                                <label>Idiomas</label>
                                <hr>
                                <div class="switch-wrap d-flex ">

                                    <div class="confirm-switch">
                                        <input type="checkbox" name="ingles" id="ingles" @if ($user_information->language_english  == 1) checked @endif >
                                        <label for="ingles"></label>
                                    </div>
                                    <p style="margin-left: 5px">ingles</p>
                                </div>
                                <div class="switch-wrap d-flex ">
                                    <div class="confirm-switch">
                                        <input type="checkbox" name="frances" id="frances" @if ($user_information->language_french  == 1) checked @endif >
                                        <label for="frances"></label>
                                    </div>
                                    <p style="margin-left: 5px">frances</p>

                                </div>
                                <div class="switch-wrap d-flex " >
                                    <div class="confirm-switch">
                                        <input type="checkbox" name="italiano" id="italiano" @if ($user_information->language_italian  == 1) checked @endif >
                                        <label for="italiano"></label>
                                    </div>
                                    <p style="margin-left: 5px">italiano</p>

                                </div>
                                </div>


                                {{--<div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="ingles" @if ($user_information->language_english == 1) checked @endif >Ingles
                                    </label>
                                    <br>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="frances" @if ($user_information->language_french == 1) checked @endif>Fránces
                                    </label>
                                    <br>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="italiano" @if ($user_information->language_italian == 1) checked @endif>Italiano
                                    </label>
                                    <br>
                                </div>--}}
                                <div class="form-group">
                                    <label for="discapacidad_fisica">Discapacidad fisica:</label>
                                    <input type="number" min="0" max="100" class="form-control" id="discapacidad_fisica"  name="discapacidad_fisica" value="{{$user_information->physical_disability}}">
                                </div>
                                <div class="form-group">
                                    <label for="discapacidad_mental">Discapacidad mental:</label>
                                    <input type="number" min="0" max="100" class="form-control" id="discapacidad_mental"  name="discapacidad_mental" value="{{$user_information->mental_disability}}">
                                </div>

                                <label>Reconocimientos académicos</label>
                                <div class="form-inline" >
                                    <input style="margin: 4px" type="text" name="reconocimiento1" class="form-control col-md-5" value="{{$academic->recongnitions1}}">
                                    <input style="margin: 4px" type="text" name="reconocimiento2" class="form-control col-md-5" value="{{$academic->recongnitions2}}">
                                    <input style="margin: 4px" type="text" name="reconocimiento3" class="form-control col-md-5" value="{{$academic->recongnitions3}}">
                                    <input style="margin: 4px" type="text" name="reconocimiento4" class="form-control col-md-5" value="{{$academic->recongnitions4}}">
                                    <input style="margin: 4px" type="text" name="reconocimiento5" class="form-control col-md-5" value="{{$academic->recongnitions5}}">
                                </div>

                                <label>Logros obtenidos</label>
                                <div class="form-inline" >
                                    <input style="margin: 4px" type="text" name="logro1" class="form-control col-md-5" value="{{$archievements->achievements1}}">
                                    <input style="margin: 4px" type="text" name="logro2" class="form-control col-md-5" value="{{$archievements->achievements2}}">
                                    <input style="margin: 4px" type="text" name="logro3" class="form-control col-md-5" value="{{$archievements->achievements3}}">
                                    <input style="margin: 4px" type="text" name="logro4" class="form-control col-md-5" value="{{$archievements->achievements4}}">
                                    <input style="margin: 4px" type="text" name="logro5" class="form-control col-md-5" value="{{$archievements->achievements5}}">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </form>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                Error al actualizar los datos
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection




{{--@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div> @if ($mensaje) $mensaje @endif </div>
                    @if(isset($user_information) and isset($porcentaje) and isset($archievements) and isset($academic))
                        <div class="card-body">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:{{$porcentaje}}%">
                                {{$porcentaje}}
                            </div>
                            @if(isset($mensaje))
                                <div class="alert alert-primary" role="alert">
                                    Datos actualizados con exito
                                </div>
                             @endif
                            <form method="post" action="{{ route('information.update') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input required type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" name="nombre" value="{{$user_information->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="edad">Edad:</label>
                                    <input required type="number" min="1" max="80" class="form-control" id="edad" placeholder="Ingrese su edad" name="edad" value="{{$user_information->age}}">
                                </div>
                                <div class="form-group form-check">
                                    Habilidades
                                    <hr>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="analisis" @if ($user_information->skill_analysis == 1) checked @endif > Análisis
                                    </label>
                                    <br>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"  name="logica" @if ($user_information->skill_logic == 1) checked @endif> Lógica
                                    </label>
                                    <br>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="redaccion" @if ($user_information->skill_writing == 1) checked @endif> Redacción
                                    </label>
                                    <br>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="descripcion" @if ($user_information->skill_description == 1) checked @endif> Descripción
                                    </label>
                                </div>
                                <label>Idiomas</label>
                                <hr>
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="ingles" @if ($user_information->language_english == 1) checked @endif >Ingles
                                    </label>
                                    <br>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="frances" @if ($user_information->language_french == 1) checked @endif>Fránces
                                    </label>
                                    <br>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="italiano" @if ($user_information->language_italian == 1) checked @endif>Italiano
                                    </label>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label for="discapacidad_fisica">Discapacidad fisica:</label>
                                    <input type="number" min="1" max="100" class="form-control" id="discapacidad_fisica"  name="discapacidad_fisica" value="{{$user_information->physical_disability}}">
                                </div>
                                <div class="form-group">
                                    <label for="discapacidad_mental">Discapacidad mental:</label>
                                    <input type="number" min="1" max="100" class="form-control" id="discapacidad_mental"  name="discapacidad_mental" value="{{$user_information->mental_disability}}">
                                </div>

                                <label>Reconocimientos académicos</label>
                                <div class="form-inline" >
                                    <input style="margin: 4px" type="text" name="reconocimiento1" class="form-control col-md-5" value="{{$academic->recongnitions1}}">
                                    <input style="margin: 4px" type="text" name="reconocimiento2" class="form-control col-md-5" value="{{$academic->recongnitions2}}">
                                    <input style="margin: 4px" type="text" name="reconocimiento3" class="form-control col-md-5" value="{{$academic->recongnitions3}}">
                                    <input style="margin: 4px" type="text" name="reconocimiento4" class="form-control col-md-5" value="{{$academic->recongnitions4}}">
                                    <input style="margin: 4px" type="text" name="reconocimiento5" class="form-control col-md-5" value="{{$academic->recongnitions5}}">
                                </div>

                                <label>Logros obtenidos</label>
                                <div class="form-inline" >
                                    <input style="margin: 4px" type="text" name="logro1" class="form-control col-md-5" value="{{$archievements->achievements1}}">
                                    <input style="margin: 4px" type="text" name="logro2" class="form-control col-md-5" value="{{$archievements->achievements2}}">
                                    <input style="margin: 4px" type="text" name="logro3" class="form-control col-md-5" value="{{$archievements->achievements3}}">
                                    <input style="margin: 4px" type="text" name="logro4" class="form-control col-md-5" value="{{$archievements->achievements4}}">
                                    <input style="margin: 4px" type="text" name="logro5" class="form-control col-md-5" value="{{$archievements->achievements5}}">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </form>
                        </div>
                     @else
                        <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                Error al actualizar los datos
                            </div>
                        </div>
                     @endif

                </div>
            </div>
        </div>
    </div>
@endsection--}}
