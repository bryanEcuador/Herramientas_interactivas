<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util_login.css">
    <link rel="stylesheet" type="text/css" href="css/main_login.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="bg-contact100" style="background-image: url('images/inteligencias-multiples.jpg');">
    <div class="container-contact100">
        <div class="wrap-contact100">

            <div class="contact100-pic js-tilt" data-tilt>
                <img src="img/img-01.png" alt="IMG">
            </div>

            <form class="contact100-form validate-form" method="POST"   action="{{ route('register') }}">
					<span class="contact100-form-title">
						Registrarse
					</span>
                @csrf

                <div class="wrap-input100 validate-input" data-validate = "Un email valido es requerido: ex@abc.xyz">
                    <input class="input100"  placeholder="Nombre de usuario" id="name" type="text" name="name"  required autocomplete="name" autofocus>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>

                </div>
                @error('name')
                <span style="color: red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="wrap-input100 validate-input" data-validate = "Un email valido es requerido: ex@abc.xyz">
                    <input class="input100"  placeholder="Correo electronico" id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>

                </div>
                @error('email')
                <span style="color: red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
                    <input class="input100" id="password" type="password" name="password" placeholder="Contraseña" required autocomplete="current-password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-key" aria-hidden="true"></i>
						</span>

                </div>
                @error('password')
                <span style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
                    <input class="input100" id="password-confirm" type="password" name="password_confirmation" placeholder="Repetir contraseña" required autocomplete="new-password">

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-key" aria-hidden="true"></i>
						</span>
                </div>
                <div class="container-contact100-form-btn">
                    <button type="submit" class="contact100-form-btn">
                        Registrarse
                    </button>
                    <br>
                    <br>
                    <br>
                    <button type="button" class="contact100-form-btn">
                        <a href="/" style="color: white"> Cancelar </a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main_login.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

</body>
</html>




{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}
