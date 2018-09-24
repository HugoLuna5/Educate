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

    <main style="padding-bottom: 50px;">



        <div class="container">

            <div class="row">


                <div class="col-md-4 ">

                    <div class="card card-body">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddTheme">Agregar tema</button>

                        <button id="btnModalSubTheme" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddSubTheme">Agregar Subtema</button>

                        <form id="formLoadThemes" action="{{url("/admin/cursos-loadTheme")}}" method="POST" style="display: none">
                            {{csrf_field()}}
                            <input type="hidden" id="id_course" value="{{$curso->id}}">
                        </form>


                        <button id="btnModalMaterial" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMaterial">Agregar material</button>

                        <form id="formLoadSubThemes" action="{{url("/admin/cursos-loadSubThemes")}}" method="POST" style="display: none">
                            {{csrf_field()}}
                        </form>




                    </div>

                </div>


                <div class="col-md-8 ">

                    <!-- Classic tabs -->
                    <div class="classic-tabs mx-2">

                        <!-- Nav tabs -->
                        <ul class="nav tabs-cyan" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link waves-light active" data-toggle="tab" href="#panel1001" role="tab">Temas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-light" data-toggle="tab" href="#panel1002" role="tab">Sub-temas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-light" data-toggle="tab" href="#panel1003" role="tab">Materiales</a>
                            </li>

                        </ul>
                        <div class="tab-content border-right border-bottom border-left rounded-bottom">
                            <!--Panel 1-->
                            <div class="tab-pane fade in show active" id="panel1001" role="tabpanel">

                                <div class="row">


                                       @foreach($themes as $theme)

                                        <div class="chip chip-lg light-blue lighten-4 waves-effect waves-effect text-white" style="margin: 5px; margin-left: 6px">
                                            <img src="{{url("/iconos/$curso->icon")}}" alt="Contact Person"> {{$theme->nombre}}
                                            <i class=" fa fa-edit"></i>

                                        </div>

                                       @endforeach



                                </div>


                            </div>
                            <!--/.Panel 1-->
                            <!--Panel 2-->
                            <div class="tab-pane fade" id="panel1002" role="tabpanel">
                                @foreach($subthemes as $subtheme)

                                    <div class="chip chip-lg light-blue lighten-4 waves-effect waves-effect text-white" style="margin: 5px; margin-left: 6px">
                                        <img src="{{url("/iconos/$curso->icon")}}" alt="Contact Person"> {{$subtheme->nombre}}
                                        <i class=" fa fa-edit"></i>

                                    </div>

                                @endforeach
                            </div>
                            <!--/.Panel 2-->
                            <!--Panel 3-->
                            <div class="tab-pane fade" id="panel1003" role="tabpanel">

                                @foreach($materials as $material)

                                    <div class="chip chip-lg light-blue lighten-4 waves-effect waves-effect text-white" style="margin: 5px; margin-left: 6px">
                                        <img src="{{url("/iconos/$curso->icon")}}" alt="Contact Person"> {{$material->nombre}}
                                        <i class=" fa fa-edit"></i>
                                    </div>

                                @endforeach


                            </div>
                            <!--/.Panel 3-->

                        </div>

                    </div>
                    <!-- Classic tabs -->

                </div>




            </div>


        </div>




        <!-- Modal theme course -->
        <div class="modal fade right" id="modalAddTheme" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
            <div class="modal-dialog modal-full-height" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalPreviewLabel">Agregar tema al curso "{{$curso->nombre}}"</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formSearchInstructor" action="{{url("/admin/cursos/addThemeCourse")}}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body" style="overflow-y: auto; ">


                            {{csrf_field()}}

                            <div class="md-form">
                                <label class="sr-only" for="themeCourse">Tema</label>
                                <div class="md-form input-group mb-3">

                                    <input type="hidden" name="id_instructor" value="{{$curso->id_instructor}}">
                                    <input type="hidden" name="id_course" value="{{$curso->id}}">
                                    <input required type="text" name="themeCourse" class="form-control pl-0 rounded-0" id="themeCourse" placeholder="Tema">
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




        <!-- Modal sub-theme course -->
        <div class="modal fade right" id="modalAddSubTheme" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
            <div class="modal-dialog modal-full-height" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalPreviewLabel">Agregar Sub-tema al curso "{{$curso->nombre}}"</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formSearchInstructor" action="{{url("/admin/cursos/addSubThemeCourse")}}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body" style="overflow-y: auto; ">


                            {{csrf_field()}}

                            <div class="md-form">
                                <label class="sr-only" for="themeCourse">Tema</label>
                                <div class="md-form input-group mb-3">

                                    <input type="hidden" name="id_instructor" value="{{$curso->id_instructor}}">
                                    <input type="hidden" name="id_course" value="{{$curso->id}}">


                                        <input required type="text" name="SubthemeCourse" class="form-control pl-0 rounded-0" id="SubthemeCourse" placeholder="Sub-tema">


                                </div>


                                <div class="md-form">
                                    <select required name="theme_course" id="theme_course" class="browser-default form-control">
                                        <option value="" disabled selected>Selecciona el tema del curso</option>

                                    </select>


                                </div>


                                <div class="md-form">
                                    <input type="text" name="url" id="url" required class="form-control" placeholder="Url del video">
                                </div>

                                <div class="md-form">

                                    <input type="text" name="time" id="time" required class="form-control" placeholder="Duracion del video">


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




        <!-- Modal material course -->
        <div class="modal fade right" id="modalAddMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
            <div class="modal-dialog modal-full-height" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalPreviewLabel">Agregar Material al curso "{{$curso->nombre}}"</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formSearchInstructor" action="{{url("/admin/cursos/addMaterial")}}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body" style="overflow-y: auto; ">


                            {{csrf_field()}}

                            <div class="md-form">
                                <label class="sr-only" for="themeCourse">Tema</label>
                                <div class="md-form input-group mb-3">

                                    <input type="hidden" name="id_instructor" value="{{$curso->id_instructor}}">
                                    <input type="hidden" name="id_course" value="{{$curso->id}}">


                                        <input autocomplete="off" required type="text" name="nombre" class="form-control pl-0 rounded-0" id="nombre" placeholder="Nombre del material">


                                </div>

                                <div class="md-form">
                                    <input autocomplete="off" type="text" placeholder="Url del recurso" id="url" name="url" class="form-control">


                                </div>


                                <div class="md-form">
                                    <select required name="theme_course" id="theme_courseMaterial" class="browser-default form-control">
                                        <option value="" disabled selected>Selecciona el tema del curso</option>

                                    </select>


                                </div>


                                <div class="md-form">
                                    <select required name="subtheme_course" id="subtheme_course" class="browser-default form-control">
                                        <option value="" disabled selected>Selecciona el sub-tema del curso</option>

                                    </select>


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




    </main>


    <script src="{{url("/js/admin/loadSubtheme.js")}}"></script>
    <script src="{{url("/js/admin/loadThemes.js")}}"></script>
    @endsection

