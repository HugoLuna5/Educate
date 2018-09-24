@extends('layouts.main')
@section('content')
    <style>
        /* Required for full background image */

        html,
        body,
        header,
        .view {
            height: 50%;
        }

        @media (max-width: 740px) {
            html,
            body,
            header

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


    </style>


    <main style="padding-bottom: 50px;">

        <div class="container">


            <div class="row">

                <div class="col-md-8 offset-2">

                    <h3 align="center" class="title-one font-weight-bold ">{{$curso->nombre}}</h3>


                    <div class="embed-responsive embed-responsive-16by9 card card-body" style="z-index: 500;  ">
                        <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/137857207" allowfullscreen></iframe>
                    </div>


                </div>


            </div>





        </div>




    </main>


    <div class="col-md-12" style="background: #F5F5F5; min-height: 180px">

        <div class="row flex-center">

            <div class="row col-md-8 ">

                <div class="col-md-2" style="padding: 15px">

                    <div class=" text-center align-content-center" style="color: #262b34;">
                        <i class="fas fa-award" style="font-size: 2.5em"></i>


                        <p class=" " style="font-size: 15px; line-height: 22.5px; letter-spacing: normal;font-family: poppins, sans-serif; padding: 6px">Curso <br> Premium</p>
                    </div>


                </div>


                <div class="col-md-2" style="padding: 15px">

                    <div class=" text-center align-content-center" style="color: #262b34;">
                        <i class="far fa-play-circle" style="font-size: 2.5em"></i>


                        <p class=" " style="font-size: 15px; line-height: 22.5px; letter-spacing: normal;font-family: poppins, sans-serif; padding: 6px">Contenido <br> {{$videos}} videos</p>
                    </div>


                </div>

                <div class="col-md-4 text-center">




                    <form action="{{url("/cursos/enroll")}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="id_course" id="id_course" value="{{$curso->id}}">
                        <input type="hidden" name="id_instructor" id="id_instructor" value="{{$instructor->id}}">
                        <input type="hidden" name="id_user" id="id_user" value="{{Auth::user()->id}}">

                        <button type="submit" style="margin-top: -25px" class="btn blue-gradient btn-lg btn-rounded text-uppercase">Empezar el curso</button>
                    </form>




                </div>


                <div class="col-md-2" style="padding: 15px">

                    <div class=" text-center align-content-center" style="color: #262b34;">
                        <i class="far fa-clock" style="font-size: 2.5em"></i>


                        <p class=" " style="font-size: 15px; line-height: 22.5px; letter-spacing: normal;font-family: poppins, sans-serif; padding: 6px">{{$curso->duracion}} <br>  totales</p>
                    </div>


                </div>


                <div class="col-md-2" style="padding: 15px">

                    <div class=" text-center align-content-center" style="color: #262b34;">
                        <i class="far fa-star" style="font-size: 2.5em"></i>


                        <p class=" " style="font-size: 15px; line-height: 22.5px; letter-spacing: normal;font-family: poppins, sans-serif; padding: 6px">Nivel <br>  {{$dificultad}}</p>







                    </div>


                </div>




            </div>



        </div>




    </div>


    <main style="margin-top: 30px; padding-bottom: 50px">


        <div class="col-md-8 offset-2 flex-center">




            <!--Accordion wrapper-->
            <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                <h4 align="center" class="font-weight-bold">Contenido</h4>



                @foreach($themes as $theme)

                    <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="headingOne">
                                <a data-toggle="collapse" href="#theme{{$theme->id}}" aria-expanded="true" aria-controls="collapseOne">
                                    <h5 class="mb-0">
                                        {{$theme->nombre}} <i class="fa fa-angle-down rotate-icon"></i>
                                    </h5>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="theme{{$theme->id}}" class="collapse show col-md-12" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx">
                                <div class="card-body">

                                    <ul class="list-group">
                                    @foreach($subthemes as $subtheme)


                                           @if($theme->id == $subtheme->id_theme)

                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                   {{$subtheme->nombre}}

                                                    <span class="badge badge-primary badge-pill" style="margin-left: 50px">

                                                        <i class="fa fa-clock"></i>

                                                        {{$subtheme->time}}</span>

                                                    <a href="{{url("/cursos/$curso->slug/$theme->/$subtheme->slug")}}" class="btn-floating btn-sm blue-gradient flex-center"><i class="fa fa-play"></i></a>


                                                </li>

                                           @endif


                                    @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!-- Accordion card -->

                @endforeach



            </div>
            <!--/.Accordion wrapper-->





        </div>



    </main>


    <div class="col-md-12" style="background: #F5F5F5; min-height: 180px">

        <div class="row flex-center">

            <div class="row col-md-8 " style="padding: 20px">


                <div class="card " >

                    <div class="card-body">

                        <p align="justify">{{$curso->descripcion}}</p>



                        <div class="row" style="margin-top: 25px">

                            <div class="col-md-1">

                                <div class="avatar mx-auto white"><img src="{{url("/my/photo/$instructor->photo")}}" height="80" width="80" class="rounded-circle">
                                </div>


                            </div>


                            <div class="col-md-8 " style="margin-left: 25px">
                                <p align="justify" class="font-weight-bold">{{$instructor->name}}</p>
                                <p align="justify"style="font-family: Helvetica">{{$instructor->bio}}</p>
                            </div>


                        </div>


                    </div>


                </div>




            </div>



        </div>




    </div>



@endsection