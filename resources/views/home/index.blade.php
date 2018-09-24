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

    <div class="container">


        <div class="row">

            <div class="col-md-4 mb-4">

                <!--Card-->
                <div class="card testimonial-card">

                    <!--Bacground color-->
                    <div class="card-up aqua-gradient">
                    </div>

                    <!--Avatar-->
                    <div class="avatar mx-auto white">
                       @if(Auth::user()->photo != null)
                            <img src="{{url("/my/photo/")}}/{{Auth::user()->photo}}" class="rounded-circle">
                           @else
                            <img src="{{url("/img/photo.jpg")}}" class="rounded-circle">
                           @endif
                    </div>

                    <div class="card-body">
                        <!--Name-->
                        <h4 class="card-title">{{Auth::user()->name}}</h4>
                        <hr>
                        <!--Quotation-->
                        <p>
                            <i class="fa fa-quote-left"></i> {{Auth::user()->bio}}</p>
                    </div>

                </div>
                <!--/.Card-->
                <br>
                <br>
                <h5 class="card-title">TU LÍNEA DE INTERESES.
                    <br>
                    <div class="container d-inline">
                        <div class="chip light-blue lighten-4 waves-effect waves-effect text-white">
                            <img src="{{url("/img/android.png")}}" alt=""> Desarrollo Android
                        </div>

                    </div>

                </h5>

            </div>


            <div class="col-md-8">

                <h4 class="card-title">CONTINÚA DONDE TE QUEDASTE</h4>

                <!-- Card -->

                @foreach($cursos as $curso)
                    <div class="card card-image mb-3" style="background: {{$curso->color}};">

                        <!-- Content -->
                        <div class="text-white text-left d-flex align-items-center  py-5 px-4">
                            <div class="col-md-2 flex-center">


                                <img height="90" width="90" src="{{url("/iconos/$curso->icon")}}" alt="">

                            </div>
                            <div class="col-md-10">
                                <h3 class="card-title pt-2 ">
                                    <strong>{{$curso->nombre}}</strong>
                                </h3>
                                <p align="justify">{{$curso->descripcion}}.</p>




                                <div class="container-fluid ">


                                    <div class="row ">

                                        <div class="col-md-2">
                                            <a href="{{url("/cursos/$curso->slug")}}" class="btn-floating blue-gradient right"><i class="fa fa-play"></i></a>

                                        </div>


                                        <div class="col-md-10 ">

                                            <div class="progress md-progress " style="height: 20px; margin-top: 20px ">
                                                <div class="progress-bar" role="progressbar" style="width: 25%; height: 20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                        </div>


                                    </div>


                                </div>












                            </div>
                        </div>
                        <!-- Content -->
                    </div>



                @endforeach
                <!-- Card -->


                <br>
                <br>

                <h4 class="card-title">
                    ¿QUIERES APRENDER ALGO NUEVO?
                </h4>
                <h6 class="card-subtitle">Sólo necesitas unos minutos para continuar aprendiendo. 🎉</h6>
                <br>
                <!--Carousel Wrapper-->
                <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">



                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                        <li data-target="#multi-item-example" data-slide-to="1"></li>
                        <li data-target="#multi-item-example" data-slide-to="2"></li>
                    </ol>
                    <!--/.Indicators-->

                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">

                        <!--First slide-->
                        <div class="carousel-item active">

                            <div class="col-md-4">
                                <div class="card mb-2">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 clearfix d-none d-md-block">
                                <div class="card mb-2">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 clearfix d-none d-md-block">
                                <div class="card mb-2">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.First slide-->

                        <!--Second slide-->
                        <div class="carousel-item">

                            <div class="col-md-4">
                                <div class="card mb-2">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 clearfix d-none d-md-block">
                                <div class="card mb-2">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 clearfix d-none d-md-block">
                                <div class="card mb-2">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.Second slide-->

                        <!--Third slide-->
                        <div class="carousel-item">

                            <div class="col-md-4">
                                <div class="card mb-2">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(53).jpg"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 clearfix d-none d-md-block">
                                <div class="card mb-2">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(45).jpg"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 clearfix d-none d-md-block">
                                <div class="card mb-2">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(51).jpg"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.Third slide-->

                    </div>
                    <!--/.Slides-->

                </div>
                <!--/.Carousel Wrapper-->

            </div>




        </div>



    </div>


@endsection