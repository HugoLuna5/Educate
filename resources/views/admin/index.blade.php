@extends('layouts.admin')

@section('content')
    <style>
        /* Required for full background image */

        html,
        body,
        header,
        .view {
            height: 48%;
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
            height: 350px;
            top:  80px;
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



    <main style="padding-bottom: 50px">

    <div class="container">

        <div class="row">

            <div class="col-md-3">

                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddCourse">Agregar curso</button>


                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddInstructor">Agregar instructor</button>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddCategoryCourse">Agregar categoria</button>


                    </div>
                </div>



            </div>

            <div class="col-md-9">

                <div class="classic-tabs">

                    <!-- Nav tabs -->
                    <div class="tabs-wrapper">
                        <ul class="nav tabs-cyan" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link waves-light active waves-effect waves-light" data-toggle="tab" href="#panel36" role="tab">Cursos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-light waves-effect waves-light" data-toggle="tab" href="#panel37" role="tab">Docentes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-light waves-effect waves-light" data-toggle="tab" href="#panel38" role="tab">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-light waves-effect waves-light" data-toggle="tab" href="#panel39" role="tab">Articulos</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link waves-light waves-effect waves-light" data-toggle="tab" href="#panel40" role="tab">Comunidades</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Tab panels -->
                    <div class="tab-content card">
                        <!--Panel 1-->
                        <div class="tab-pane fade in show active" id="panel36" role="tabpanel">


                            <div class="row" style="margin: 10px">

                                <div class="col-md-12">
                                    <form id="formSearchCourse" action="{{url("/admin/searchCourses")}}" method="POST" >
                                        <div class="md-form">
                                            <input id="seachBarCourse" type="text" class="form-control" placeholder="Buscar curso">
                                        </div>
                                    </form>

                                    <div id="searchResultsCourse">

                                    </div>
                                </div>


                            </div>


                            <div class="row" id="containerCourses" style="margin: 10px">


                                <div class="col-md-12">

                                @foreach($cursos as $curso)



                                    <!-- Card -->
                                       <div class="col-md-6">
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
                                               <a href="{{url("/admin/cursos/$curso->slug")}}" class="btn-floating btn-action ml-auto mr-4 blue-gradient lighten-3"><i class="fa fa-plus-circle pl-1"></i></a>

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



                        </div>
                        <!--/.Panel 1-->
                        <!--Panel 2-->
                        <div class="tab-pane fade" id="panel37" role="tabpanel">
                            <!-- Section: Team v.4 -->
                            <section class="my-5">


                                <!-- Grid row -->
                                <div class="row">

                                    @foreach($instructores as $instructor)

                                        <!-- Grid column -->
                                            <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">

                                                <!-- Rotating card -->
                                                <div class="card-wrapper">
                                                    <div id="card-1" class="card-rotating effect__click text-center w-100 h-100">
                                                        <!-- Front Side -->
                                                        <div class="face front">
                                                            <!-- Image -->
                                                            <div class="card-up">
                                                                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/19.jpg" alt="Team member card image">
                                                            </div>
                                                            <!-- Avatar -->
                                                            <div class="avatar mx-auto white">
                                                                <img src="{{url("my/photo/$instructor->photo")}}" class="rounded-circle img-fluid" alt="First sample avatar image">
                                                            </div>
                                                            <!-- Content -->
                                                            <div class="card-body">
                                                                <h4 class="font-weight-bold mt-1 mb-3">{{$instructor->name}}</h4>
                                                                <p class="font-weight-bold dark-grey-text text-uppercase">{{$instructor->rol}}</p>
                                                                <!-- Triggering button -->
                                                                <a class="rotate-btn grey-text" data-card="card-1">
                                                                    <i class="fa fa-repeat grey-text"></i> Ver más</a>
                                                            </div>
                                                        </div>
                                                        <!-- Front Side -->
                                                        <!-- Back Side -->
                                                        <div class="face back">
                                                            <!-- Content -->
                                                            <div class="card-body">
                                                                <!-- Content -->
                                                                <h4 class="font-weight-bold mt-4 mb-2">
                                                                    <strong>Acerca</strong>
                                                                </h4>
                                                                <hr>
                                                                <p>{{$instructor->bio}}
                                                                </p>
                                                                <hr>
                                                                <!-- Social Icons -->
                                                                <ul class="list-inline list-unstyled">

                                                                    <li class="list-inline-item">
                                                                        <a href="{{$instructor->fb}}" target="_blank" class="p-2 fa-lg fb-ic">
                                                                            <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                    </li>


                                                                    <li class="list-inline-item">
                                                                        <a href="{{$instructor->tw}}" target="_blank"class="p-2 fa-lg tw-ic">
                                                                            <i class="fa fa-twitter"> </i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <!-- Triggering button -->
                                                                <a class="rotate-btn grey-text" data-card="card-1">
                                                                    <i class="fa fa-repeat grey-text"></i> Click here to rotate back</a>
                                                            </div>
                                                        </div>
                                                        <!-- Back Side -->
                                                    </div>
                                                </div>
                                                <!-- Rotating card -->

                                            </div>
                                            <!-- Grid column -->



                                    @endforeach


                                </div>
                                <!-- Grid row -->

                            </section>
                            <!-- Section: Team v.4 -->
                        </div>
                        <!--/.Panel 2-->
                        <!--Panel 3-->
                        <div class="tab-pane fade" id="panel38" role="tabpanel">




                            <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="th-sm">#
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>
                                    <th class="th-sm">Nombre
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>

                                    <th class="th-sm">Correo
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>

                                    <th class="th-sm">Rol
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>

                                    <th class="th-sm">Start date
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>

                                </tr>
                                </thead>

                                <tbody>

                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->rol}}</td>
                                            <td>{{$user->created_at}}</td>
                                        </tr>
                                    @endforeach

                                </tbody>


                                <tfoot>
                                <tr>
                                    <th>#
                                    </th>
                                    <th>Nombre
                                    </th>
                                    <th>Correo
                                    </th>
                                    <th>Rol
                                    </th>
                                    <th>Start date
                                    </th>

                                </tr>
                                </tfoot>
                            </table>






                        </div>
                        <!--/.Panel 3-->
                        <!--Panel 4-->
                        <div class="tab-pane fade" id="panel39" role="tabpanel">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
                                reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat
                                ratione porro voluptate odit minima.</p>
                        </div>
                        <!--/.Panel 4-->
                    </div>

                </div>

            </div>



        </div>


    </div>




</main>


    <!--modal add course-->

    <!-- Modal -->
    <div class="modal fade right" id="modalAddCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalPreviewLabel">Agregar curso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url("/admin/addCourse")}}" method="POST" enctype="multipart/form-data">

                <div class="modal-body" style="overflow-y: auto; ">

                        {{csrf_field()}}

                        <div class="md-form">
                            <input type="text" name="nameCourse" id="nameCourse" class="form-control">
                            <label for="nameCourse">Nombre del curso</label>
                        </div>

                        <div class="md-form">
                            <textarea type="text" name="descripcion" id="descripcion" class="md-textarea form-control" rows="3"></textarea>
                            <label for="descripcion">Descripcion</label>
                        </div>


                        <div class="md-form">
                            <div class="file-field">
                                <a class="btn-floating blue-gradient mt-0 float-left">
                                    <i class="fa fa-paperclip" aria-hidden="true"></i>
                                    <input name="icono" id="icono" type="file">
                                </a>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Selecciona el icono">
                                </div>
                            </div>
                        </div>

                        <div class="md-form">
                            <input class="col-md-6" name="color" id="color" type="color" value="#000" placeholder="Color del curso">
                        </div>


                           <div class="md-form">
                               <select name="nivel" id="nivel" class="browser-default form-control">
                                   <option value="" disabled selected>Nivel de dificultad</option>
                                   <option value="1">Principiante</option>
                                   <option value="2">Intermedio</option>
                                   <option value="3">Avanzado</option>
                               </select>


                           </div>

                        <div class="md-form">
                               <select name="instructor" id="instructor" class="browser-default form-control">
                                   <option value="" disabled selected>Instructor</option>
                                   @foreach($instructores as $instructor)
                                       <option value="{{$instructor->id}}">{{$instructor->name}}</option>
                                       @endforeach
                               </select>


                           </div>





                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Modal -->



    <!-- Modal instructor -->
    <div class="modal fade right" id="modalAddInstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-full-height" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalPreviewLabel">Agregar instructor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="overflow-y: auto; ">

                    <form id="formSearchInstructor" action="{{url("/admin/searchInstructor")}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="md-form">
                            <label class="sr-only" for="searchInstructor">Instructor</label>
                            <div class="md-form input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text md-addon">@</span>
                                </div>
                                <input type="text" class="form-control pl-0 rounded-0" id="searchInstructor" placeholder="Username">
                            </div>
                        </div>





                    </form>

                    <div class="dropdown-wrapper card  searchResults" id="resultsInstructors"></div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->


    <!-- Modal category course -->
    <div class="modal fade right" id="modalAddCategoryCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-full-height" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalPreviewLabel">Agregar categoria de cursos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formSearchInstructor" action="{{url("/admin/addCategoryCourse")}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body" style="overflow-y: auto; ">


                        {{csrf_field()}}

                        <div class="md-form">
                            <label class="sr-only" for="searchInstructor">Categoria</label>
                            <div class="md-form input-group mb-3">

                                <input type="text" name="category_course" class="form-control pl-0 rounded-0" id="category_course" placeholder="Categoria">
                            </div>
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->



@endsection