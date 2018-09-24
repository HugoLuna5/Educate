<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Educate</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="{{url("/latest/css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{url("/latest/css/mdb.min.css")}}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body >
<!-- Main navigation -->
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top scrolling-navbar" >
        <div class="container">
            <a class="navbar-brand" href="{{url("/")}}"><strong>Educate</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">

                <form id="formSearch" action="{{url("/search")}}" class="form-inline col-md-4 search-form">
                    {{csrf_field()}}
                    <input class="form-control col-md-12" autocomplete="off" name="search" id="searchBar" type="search" placeholder="Buscar" aria-label="Search">

                    <div class="dropdown-wrapper card  searchResults" id="searchResults" >

                    </div>
                </form>


                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url("/cursos")}}">Cursos </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url("/articulos")}}">Articulos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url("/communities")}}">Comunidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url("/agenda")}}">Agenda</a>
                    </li>

                    <li class="nav-item avatar dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            @if(Auth::user()->photo != null)
                                <img src="{{url("/my/photo/")}}/{{Auth::user()->photo}}" class="rounded-circle z-depth-0" alt="avatar image">

                            @else
                                <img src="{{url("/img/photo.jpg")}}" class="rounded-circle z-depth-0" alt="avatar image">
                            @endif



                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                            <a class="dropdown-item waves-effect waves-light" href="#">¡Hola!  {{ Auth::user()->name }}</a>
                            <a class="dropdown-item waves-effect waves-light" href="{{url("/my")}}">Perfil</a>
                            <a class="dropdown-item waves-effect waves-light" href="#">Obtén 1 mes gratis</a>
                            <a class="dropdown-item waves-effect waves-light" href="#">Mí suscripción</a>
                            <a class="dropdown-item waves-effect waves-light" href="#">Contáctanos</a>



                            <a  class="dropdown-item waves-effect waves-light text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" data-toggle="modal" data-target="#notificationModal" >0
                            <i style="color: #9e9e9e;" class="fa fa-bell "></i>
                        </a>
                    </li>





                </ul>



            </div>
        </div>
    </nav>
    <!-- Navbar -->


</header>
<!-- Main navigation -->
<!-- Main Layout -->

    @yield('content')




    <!-- Notification Modal-->
    <div class="modal fade right" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-right modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Modal Success</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iusto nulla aperiam blanditiis ad consequatur
                            in dolores culpa, dignissimos, eius non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                        </p>
                    </div>
                    <ul class="list-group z-depth-0">
                        <li class="list-group-item justify-content-between">
                            Cras justo odio
                            <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                            Dapibus ac facilisis in
                            <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                            Morbi leo risus
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                            Cras justo odio
                            <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                            Dapibus ac facilisis in
                            <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                            Morbi leo risus
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                    </ul>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-success">Get it now
                        <i class="fa fa-diamond ml-1"></i>
                    </a>
                    <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Full Height Modal Right Success Demo-->


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
<script src="{{asset('/js/dist/autosize.js')}}"></script>

<script>
    new WOW().init();
</script>
<script src="https://player.vimeo.com/api/player.js"></script>

<script src="{{url("/js/my/changePhoto.js")}}"></script>
<script src="{{url("/js/sweetalert.min.js")}}"></script>
<script src="{{url("/js/my/editProfile.js")}}"></script>
<script>
   /*
    window.oncontextmenu = function() {

        return false;
    }
*/</script>

<script>
    autosize(document.querySelectorAll('textarea'));
</script>
<script src="{{url("/js/search/search.js")}}"></script>
</body>

</html>