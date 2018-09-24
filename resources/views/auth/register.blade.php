
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Luna Courses</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- Bootstrap core CSS -->
    <link href="{{url("/latest/css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{url("/latest/css/mdb.min.css")}}" rel="stylesheet">
    <style>
        /* Required for full background image */

        html,
        body,
        header,
        .view {
            height: 55%;
        }

        @media (max-width: 740px) {
            html,
            body,
            header,
            .view {
                height: 40vh;
            }
        }

        .top-nav-collapse {
            background-color: #A5DDF5 !important;
        }

        .navbar:not(.top-nav-collapse) {
            background: transparent !important;
        }

        @media (max-width: 991px) {
            .navbar:not(.top-nav-collapse) {
                background: #A5DDF5 !important;
            }
        }
    </style>
</head>

<body >
<!-- Main navigation -->
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top scrolling-navbar" >
        <div class="container">
            <a class="navbar-brand" href="#"><strong>Luna Courses</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Inicio </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Precios</a>
                    </li>
                </ul>
                <form class="form-inline">
                    <div class="md-form my-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <!-- Navbar -->


</header>
<!-- Main navigation -->
<!-- Main Layout -->
<main>
    <div class="container ">
        <!-- Grid row -->
        <!-- Grid column -->
        <div class="col-md-12 text-center flex-center">
            <div class="col-lg-5 col-md-6  ">

                <section class="form-elegant">

                    <!--Form without header-->
                    <div class="card">

                        <div class="card-body mx-4">

                            <!--Header-->
                            <div class="text-center">
                                <h3 class="dark-grey-text mb-5">
                                    <strong>Registrarse</strong>
                                </h3>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!--Body-->

                                <div class="md-form">

                                    <label for="name" >Nombre</label>

                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif

                                </div>


                                <div class="md-form">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif


                                    <label for="email" >Correo electronico</label>
                                </div>


                                <div class="md-form">

                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                    <label for="password" >Contraseña</label>



                                </div>
                                <div class="md-form">
                                </div>





                                <div class="md-form pb-3">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>



                                    <div class="form-group row" style="display: none">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : 'true' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <label for="password-confirm">Confirmar contraseña</label>
                                    <p class="font-small blue-text d-flex justify-content-end">¿Ya tienes cuenta?
                                        <a href="{{ route('login') }}" class="blue-text ml-1"> Entrar</a>
                                    </p>
                                </div>

                                <div class="text-center mb-3">
                                    <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a waves-effect waves-light">Crear cuenta</button>
                                </div>
                            </form>



                            <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> o registrate con:</p>

                            <div class="row my-3 d-flex justify-content-center">
                                <!--Facebook-->
                                <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a waves-effect waves-light">
                                    <i class="fa fa-facebook blue-text text-center"></i>
                                </button>
                                <!--Twitter-->
                                <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a waves-effect waves-light">
                                    <i class="fa fa-twitter blue-text"></i>
                                </button>
                                <!--Google +-->
                                <button type="button" class="btn btn-white btn-rounded z-depth-1a waves-effect waves-light">
                                    <i class="fa fa-google-plus blue-text"></i>
                                </button>
                            </div>

                        </div>

                        <!--Footer-->
                        <div class="modal-footer mx-5 pt-3 mb-1">
                            <p class="font-small grey-text d-flex justify-content-end">Al registrarte aceptas nuestros
                                <a href="#" class="blue-text ml-1"> Terminos y condiciones</a>
                            </p>
                        </div>

                    </div>
                    <!--/Form without header-->

                </section>

            </div>
        </div>
        <!-- Grid column -->
        <!-- Grid row -->
    </div>
</main>
<!-- Main Layout -->
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{url("/latest/js/jquery-3.3.1.min.js")}}"></script>
<!-- Tooltips -->
<script type="text/javascript" src="{{url("/latest/js/popper.min.js")}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{url("/latest/js/bootstrap.min.js")}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{url("/latest/js/mdb.min.js")}}"></script>
<script>
    new WOW().init();
</script>
</body>

</html>