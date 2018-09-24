@extends('layouts.main')


@section('content')

    <style>
        /* Required for full background image */

        html,
        body,
        header,
        .view {
            height: 43%;
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

        body{
            line-height: normal;
        }

        .searchResults {
            position: absolute;
            background-color: white;
            z-index: 50;
            height: 500px;
            top:  40px;
            display: none;
            overflow-y: auto;
        }

        .inputRow {
            position:relative;
            overflow:auto;
        }



        .avatar-pic {
            width: 150px;
            height: 150px;
        }
    </style>

    <main class="blue" style="padding-bottom: 50px">
    <div class="container " style="">


        <div class="row ">

            <div class="col-md-12 ">


                <div class=" ">
                    <div class=" ">


                        <div class="row " style="margin-top: 35px">

                            <div class="col-md-3">
                                <form class="md-form" action="{{url("/my/changePhoto")}}" method="POST"
                                      id="avatarForm" enctype="multipart/form-data" role="form">
                                    {{ csrf_field() }}
                                    <div class="file-field">
                                        <div class="mb-4">
                                            <center>
                                                @if(Auth::user()->photo != null)
                                                    <img id="avatarImage"
                                                         src="{{url("/my/photo/")}}/{{Auth::user()->photo}}"
                                                         class="rounded-circle z-depth-1-half avatar-pic"
                                                         alt="example placeholder avatar">

                                                    @else

                                                    <img id="avatarImage"
                                                         src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                                         class="rounded-circle z-depth-1-half avatar-pic"
                                                         alt="example placeholder avatar">

                                                    @endif

                                            </center>
                                        </div>
                                        <div class="d-flex justify-content-center">


                                            <div id="containerBtn" class="btn btn-mdb-color btn-rounded float-left">
                                                <span>Cambiar foto</span>
                                                <input name="photo" id="avatarInput" type="file">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <div class="col-md-9">


                                <div class="row">

                                    <div class="col-md-7">

                                        <form id="formMy" action="{{url("/my/edit")}}" method="POST">


                                            <!-- Username -->
                                            <div class="md-form">
                                                <input required value="{{Auth::user()->username}}" type="text" id="username" class="form-control text-white">
                                                <label class="text-white" style="font-size: 1.5em" for="username">Username</label>
                                            </div>

                                            <!-- Nombre -->
                                            <div class="md-form">
                                                <input required value="{{Auth::user()->name}}" type="text" id="name" class="form-control text-white">
                                                <label class="text-white"  for="name">Nombre</label>
                                            </div>


                                            <!-- Ocupación -->
                                            <div class="md-form">
                                                <input value="{{Auth::user()->ocupacion}}" type="text" id="ocupacion" class="form-control text-white">
                                                <label class="text-white" for="ocupacion">Ocupación</label>
                                            </div>

                                            <!-- Facebook -->
                                            <div class="md-form">
                                                <input value="{{Auth::user()->fb}}" type="text" id="fb" class="form-control text-white">
                                                <label class="text-white" for="fb">Facebook</label>
                                            </div>

                                            <!-- Twitter -->
                                            <div class="md-form">
                                                <input value="{{Auth::user()->tw}}" type="text" id="tw" class="form-control text-white">
                                                <label class="text-white" for="tw">Twitter</label>
                                            </div>

                                            <!-- Biografia -->
                                            <div class="md-form">
                                                <input value="{{Auth::user()->bio}}" type="text" id="bio" class="form-control text-white">
                                                <label class="text-white" for="bio">Biografia</label>
                                            </div>

                                            <!-- Correo -->
                                            <div class="md-form">
                                                <input required value="{{Auth::user()->email}}" type="text" id="correo" class="form-control text-white">
                                                <label class="text-white" for="correo">Correo electronico</label>
                                            </div>

                                            <!-- Contraseña -->
                                            <div class="md-form">
                                                <input placeholder="Dejar en blanco si no desea cambiar la contraseña" type="password" id="contra" class="form-control text-white " >
                                                <label class="text-white" for="contra">Cantraseña</label>
                                            </div>

                                        </form>


                                    </div>
                                    <div class="col-md-5">

                                        <div >
                                            <button id="btnSaveChanges" style="float: left" class="btn btn-success">Guardar cambios</button>
                                        </div>



                                        <div style="margin-top: 80px; float: right">
                                            <a style=" font-size: 1em;" class="text-white text-right" href="{{url("/usuarios")}}/{{Auth::user()->id}}">Ver perfil publico</a>
                                        </div>

                                        <!--configuracion-->
                                        <div style="margin-top: 160px" class="card">
                                            <div class="card-header blue-grey">
                                                <h5 class="card-title text-white">
                                                    Configuración
                                                </h5>
                                            </div>
                                            <div class="card-body">

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                           id="tema_code">
                                                    <label class="form-check-label" for="tema_code">Tema claro para el código</label>
                                                </div>
                                                <br>

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                           id="play_videos">
                                                    <label class="form-check-label" for="play_videos">Reproducción automatica</label>
                                                </div>


                                            </div>

                                        </div>


                                        <!--notificaciones-->
                                        <div class="card" style="margin-top: 30px">
                                            <div class="card-header blue-grey">
                                                <h5 class="card-title text-white">
                                                    Notificaciones por correo
                                                </h5>
                                            </div>
                                            <div class="card-body">

                                                <div class="form-check" style="float: left; text-align: left">
                                                    <input type="checkbox" class="form-check-input"
                                                           id="notificaciones_correo">
                                                    <label class="form-check-label" for="notificaciones_correo">Notificaciones semanales</label>
                                                </div>
                                                <br>

                                                <div class="form-check"  style="float: left; text-align: left">
                                                    <input type="checkbox" class="form-check-input"
                                                           id="newsletter">
                                                    <label class="form-check-label" for="newsletter">Newsletter con novedades y ofertas</label>
                                                </div>

                                                <div class="form-check"  style="float: left; text-align: left">
                                                    <input type="checkbox" class="form-check-input"
                                                           id="tips">
                                                    <label class="form-check-label" for="tips">Tips y consejos</label>
                                                </div>

                                                <div class="form-check" style="float: left; text-align: left">
                                                    <input type="checkbox" class="form-check-input"
                                                           id="taller">
                                                    <label class="form-check-label" for="taller">Notificaciones de taller en vivo</label>
                                                </div>


                                            </div>

                                        </div>

                                    </div>


                                </div>


                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px">

                            <div class="col-md-6">

                                <h5 class="title text-white text-left font-weight-bold text-monospace text-uppercase" style="margin-left: 30px">SUSCRIPCIÓN PREMIUM</h5>
                                <p style="margin-left: 30px" align="justify" class="text-white">Puedes revisar tu plan de suscripción, cancelacion y métodos de pago en la sección de Cobros y Premium</p>

                                <center><a  class="btn btn-warning text-uppercase " href="{{url("mi-suscripcion")}}">ir a cobros y premium</a></center>



                            </div>
                            <div class="col-md-6">

                                <h5 class="title text-white text-left font-weight-bold text-monospace text-uppercase" style="margin-left: 30px">elimina tu cuenta</h5>

                                <p style="margin-left: 30px" align="justify" class="text-white">
                                    Poseer una cuenta en "EDUCATE" es completamente gratis, no necesitas pagar para conservar el progreso de tu aprendizaje, en caso de que eventualmente desees continuarlo.
                                    <br><br>
                                    Con tu cuenta gratuita puedes ver y dar seguimiento a los cursos gratis. Además de conservar tu perfil público en el que se enlistan todos los cursos que has terminado.
                                </p>

                                <button style="margin-left: 30px" class="btn btn-danger">Eliminar mi cuenta</button>
                                <br>

                                <span style="margin-left: 30px" class="text-white">Este proceso eliminará todos tus datos, progreso de cursos, y más.</span>
                            </div>


                        </div>


                    </div>


                </div>


            </div>





        </div>


    </div>

    </main>



@endsection