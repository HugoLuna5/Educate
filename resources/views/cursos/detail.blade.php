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

        <div class="container ">


            <div class="row">

                <div class="col-md-10 offset-1 row">


                    <div class="col-md-3 " >
                        <img style="background: {{$curso->color}};" class="rounded-circle" width="180" height="180" src="{{url("/iconos/$curso->icon")}}" alt="">


                    </div>
                    <div class="col-md-9">

                        <h5 class="title-one font-weight-bold">{{$curso->nombre}}</h5>
                        <p>Tutor: {{$instructor->name}}</p>

                        <div class="d-inline">
                            <button type="button" class="btn btn-primary">Continuar curso</button>
                            <button type="button" class="btn btn-outline-danger">Quitar de mis curso</button>
                            <button type="button" class="btn btn-outline-success">Examen del curso</button>


                        </div>





                    </div>







                </div>


            </div>

            <div class="row" style="margin-top: 25px">
                <div class="col-md-10 offset-1">

                    <h5 class="font-weight-bold">Tu progreso en el curso (25%)</h5>
                    
                    <div class="row">
                        <div class="col-md-2">
                            <img width="60" height="60" src="{{url("/my/photo/")}}/{{Auth::user()->photo}}" alt="">
                        </div>

                        <div class="col-md-10" >



                            <div class="progress md-progress center-block" style="height: 20px; position: absolute;  bottom: 0; ">
                                <div class="progress-bar" role="progressbar" style="width: 25%; height: 20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>


                        </div>
                    </div>


                </div>


            </div>

            <div class="row">

                <div class="col-md-8 offset-2 flex-center">




                    <!--Accordion wrapper-->
                    <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                        <h4 align="center" class="font-weight-bold">Temario del curso</h4>



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



            </div>



        </div>




    </main>









@endsection