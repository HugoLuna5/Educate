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

    <main style="padding-bottom: 50px">



        <div class="container">
            <div class="row">

            @foreach($cursos as $curso)



                <!-- Card -->
                    <div class="col-md-4">
                        <div class="card">

                            <!-- Card image -->
                            <div class="view overlay" style="background: {{$curso->color}}">
                                <center>

                                    <img style="height: 180px; width: 180px" class="card-img-top rounded-circle " src="{{url("/iconos/$curso->icon")}}" alt="Card image cap">

                                </center>
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!-- Button -->
                            <a href="{{url("/cursos/$curso->slug")}}" class="btn-floating btn-action ml-auto mr-4 blue-gradient lighten-3"><i class="fa fa-play pl-1"></i></a>

                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Title -->
                                <h4 class="card-title">{{$curso->nombre}}</h4>
                                <hr>
                                <!-- Text -->
                                <p class="card-text">{{$curso->descripcion}}</p>

                            </div>

                            <!-- Card footer -->
                            <div class="rounded-bottom mdb-color lighten-3 text-left pt-3">
                                <ul class="list-unstyled list-inline font-small" style="margin-left: 18px">
                                    <li class="list-inline-item pr-2 white-text"><i class="fa fa-clock-o pr-1"></i>Duracion: {{$curso->duracion}}</li>

                                    @if($curso->id_nivel == 1)

                                        <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fa fa-star-o pr-1"></i>Principiante</a></li>
                                    @elseif($curso->id_nivel == 2)

                                        <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fa fa-star-o pr-1"></i>Intermedio</a></li>

                                    @else
                                        <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fa fa-star-o pr-1"></i>Avanzado</a></li>
                                    @endif



                                </ul>
                            </div>

                        </div>
                    </div>
                    <!-- Card -->



                @endforeach

            </div>
        </div>


    </main>


@endsection