<?php

namespace App\Http\Controllers;

use App\CategoriaCurso;
use App\Curso;
use App\Instructor;
use App\Material;
use App\SubThemeCourse;
use App\ThemeCourse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    //

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        $instructores = User::where('rol','instructor')->get();
        $categorias = CategoriaCurso::all();
        $cursos = Curso::paginate(10);
        $users = User::all();

        return view('admin.index',compact('instructores','categorias','cursos','users'));

    }

    public function searchInstructor(Request $request){
        $s = $request->search;
        if ($request->ajax()) {

            $output = "";

            $users = DB::table('users')->where('username', 'LIKE', '%' . $s . "%")->orWhere('name','LIKE','%'.$s.'%')->get();



            if ($users) {

                foreach ($users as $key => $user) {


                    if ($user->rol != 'instructor'){
                        $output .= '<div style="margin: 10px;" class="media d-block d-md-flex mt-3">
                <img class="card-img-64 d-flex mx-auto mb-3 rounded-circle" src="https://mdbootstrap.com/img/Photos/Avatars/img (21).jpg" alt="Generic placeholder image">
                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                  <h5 class="font-weight-bold mt-0">
                    <a href="admin/usuarios/'.$user->id.'">' . $user->name . '</a>
                    
                   
                    <form action="/admin/add-instructor" method="POST">
                     '.csrf_field().'
                     <input type="hidden" name="id" id="id" value="'.$user->id.'">
                    

                    <button type="submit" class="pull-right">
                      <i class="fa fa-plus-square-o"></i>
                    </button>
                  </form>
                  </h5>
                  '.$user->bio.'
                </div>
              </div>
              <hr>
            ';
                    }else{
                        $output .= '<div style="margin: 10px;" class="media d-block d-md-flex mt-3">
                <img class="card-img-64 d-flex mx-auto mb-3 rounded-circle" src="https://mdbootstrap.com/img/Photos/Avatars/img (21).jpg" alt="Generic placeholder image">
                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                  <h5 class="font-weight-bold mt-0">
                    <a href="admin/usuarios/'.$user->id.'">' . $user->name . '</a>
                    
                   
                  
                    

                    <a href="#" class="pull-right">
                      <i class="fa fa-check"></i>
                    </a>
                  </form>
                  </h5>
                  '.$user->bio.'
                </div>
              </div>
              <hr>
            ';

                    }



                }


                return Response($output);

            }
        }

    }



    public function addInstructor(Request $request){
        $user_id = $request->id;

        $verify = DB::table('instructors')->where('id_user',$user_id)->first();

        if ($verify == null){
            $instructor = new Instructor();
            $instructor->id_user = $user_id;
            $instructor->save();
            $user = DB::table('users')->where('id',$user_id)->update(['rol'=>'instructor']);

        }

        return back();

    }


    public function addCategoryCourse(Request $request){
        $categoria = new CategoriaCurso();
        $categoria->id_creator = Auth::user()->id;
        $categoria->name = $request->category_course;
        $categoria->slug = str_slug($request->category_course,'-');
        $categoria->save();

        return back();

    }


    public function addCourse(Request $request){
        $this->validate($request, [
            'icono' => 'required|image'
        ]);
        $curso = new Curso();
        $curso->id_instructor = $request->instructor;
        $curso->id_nivel = $request->nivel;
        $curso->nombre = $request->nameCourse;
        $curso->slug = str_slug($request->nameCourse,'-');
        $curso->descripcion = $request->descripcion;
        $curso->color = $request->color;


        $extensionperfil = $request->file('icono')->getClientOriginalExtension();
        $file_name = $curso->id . '.png';

        $md5File = md5(date("Y-m-d") . "" . time() . "" . $file_name . "" . $extensionperfil);
        $file = $md5File . ".png";

        \Storage::disk('iconos')->put($file, \File::get($request->icono));


        $curso->icon = $file;

        $curso->save();

        return back();
    }


    public function searchCourses(Request $request){


        $s = $request->search;
        if ($request->ajax()) {

            $output = "";

            $cursos = DB::table('cursos')->where('nombre', 'LIKE', '%' . $s . "%")->orWhere('descripcion','LIKE','%'.$s.'%')->get();



            if ($cursos) {

                foreach ($cursos as $key => $curso) {



                    if ($curso->id_nivel == 1){
                        $output .= '<div class="col-md-6">

                      <div class="card">

                                               <!-- Card image -->
                                               <div class="view overlay" style="background: '.$curso->color.'">
                                                   <center>

                                                       <img style="height: 180px; width: 180px" class="card-img-top rounded-circle " src="/iconos/'.$curso->icon.'" alt="Card image cap">

                                                   </center>
                                                   <a>
                                                       <div class="mask rgba-white-slight"></div>
                                                   </a>
                                               </div>

                                               <!-- Button -->
                                               <a href="/cursos/'.$curso->slug.'" class="btn-floating btn-action ml-auto mr-4 blue-gradient lighten-3"><i class="fa fa-plus-circle pl-1"></i></a>

                                               <!-- Card content -->
                                               <div class="card-body">

                                                   <!-- Title -->
                                                   <h4 class="card-title">'.$curso->nombre.'</h4>
                                                   <hr>
                                                   <!-- Text -->
                                                   <p class="card-text">'.$curso->descripcion.'</p>

                                               </div>

                                               <!-- Card footer -->
                                               <div class="rounded-bottom mdb-color lighten-3 text-left pt-3">
                                                   <ul class="list-unstyled list-inline font-small" style="margin-left: 18px">
                                                       <li class="list-inline-item pr-2 white-text"><i class="fa fa-clock-o pr-1"></i>Duracion: '.$curso->duracion.'</li>


                                                           <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fa fa-star-o pr-1"></i>Principiante</a></li>
                                                           



                                                   </ul>
                                               </div>

                                           </div>
                    
                    </div>';


                    }elseif ($curso->id_nivel == 2){
                        $output .= '<div class="col-md-6">

                      <div class="card">

                                               <!-- Card image -->
                                               <div class="view overlay" style="background: '.$curso->color.'">
                                                   <center>

                                                       <img style="height: 180px; width: 180px" class="card-img-top rounded-circle " src="/iconos/'.$curso->icon.'" alt="Card image cap">

                                                   </center>
                                                   <a>
                                                       <div class="mask rgba-white-slight"></div>
                                                   </a>
                                               </div>

                                               <!-- Button -->
                                               <a href="/cursos/'.$curso->slug.'" class="btn-floating btn-action ml-auto mr-4 blue-gradient lighten-3"><i class="fa fa-plus-circle pl-1"></i></a>

                                               <!-- Card content -->
                                               <div class="card-body">

                                                   <!-- Title -->
                                                   <h4 class="card-title">'.$curso->nombre.'</h4>
                                                   <hr>
                                                   <!-- Text -->
                                                   <p class="card-text">'.$curso->descripcion.'</p>

                                               </div>

                                               <!-- Card footer -->
                                               <div class="rounded-bottom mdb-color lighten-3 text-left pt-3">
                                                   <ul class="list-unstyled list-inline font-small" style="margin-left: 18px">
                                                       <li class="list-inline-item pr-2 white-text"><i class="fa fa-clock-o pr-1"></i>Duracion: '.$curso->duracion.'</li>

                                                      

                                                           <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fa fa-star-o pr-1"></i>Intermedio</a></li>

                                                   </ul>
                                               </div>

                                           </div>
                    
                    </div>';

                    }else{
                        $output .= '<div class="col-md-6">

                      <div class="card">

                                               <!-- Card image -->
                                               <div class="view overlay" style="background: '.$curso->color.'">
                                                   <center>

                                                       <img style="height: 180px; width: 180px" class="card-img-top rounded-circle " src="/iconos/'.$curso->icon.'" alt="Card image cap">

                                                   </center>
                                                   <a>
                                                       <div class="mask rgba-white-slight"></div>
                                                   </a>
                                               </div>

                                               <!-- Button -->
                                               <a href="/admin/cursos/'.$curso->slug.'" class="btn-floating btn-action ml-auto mr-4 blue-gradient lighten-3"><i class="fa fa-plus-circle pl-1"></i></a>

                                               <!-- Card content -->
                                               <div class="card-body">

                                                   <!-- Title -->
                                                   <h4 class="card-title">'.$curso->nombre.'</h4>
                                                   <hr>
                                                   <!-- Text -->
                                                   <p class="card-text">'.$curso->descripcion.'</p>

                                               </div>

                                               <!-- Card footer -->
                                               <div class="rounded-bottom mdb-color lighten-3 text-left pt-3">
                                                   <ul class="list-unstyled list-inline font-small" style="margin-left: 18px">
                                                       <li class="list-inline-item pr-2 white-text"><i class="fa fa-clock-o pr-1"></i>Duracion: '.$curso->duracion.'</li>

                                                     
                                                           <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fa fa-star-o pr-1"></i>Avanzado</a></li>



                                                   </ul>
                                               </div>

                                           </div>
                    
                    </div>';


                    }
                }


                return Response($output);

            }
        }

    }



    public function manageCourses($slug){

        $curso = Curso::where('slug',$slug)->first();

        if ($curso){
            $themes = ThemeCourse::where('id_course',$curso->id)->get();
            $subthemes = SubThemeCourse::where('id_course',$curso->id)->get();
            $materials = Material::where('id_course',$curso->id)->get();



            return view('admin.course',compact('curso','themes','subthemes','materials'));
        }


        return back();


    }


    public function addThemeCourse(Request $request){



        $theme = new ThemeCourse();
        $theme->id_course = $request->id_course;
        $theme->id_instructor = $request->id_instructor;
        $theme->nombre = $request->themeCourse;
        $theme->save();


        return back();



    }


    public function addSubThemeCourse(Request $request){



        $theme = new SubThemeCourse();
        $theme->id_course = $request->id_course;
        $theme->id_theme = $request->theme_course;
        $theme->id_instructor = $request->id_instructor;
        $theme->nombre = $request->SubthemeCourse;
        $theme->slug = str_slug($request->SubthemeCourse,'-');
        $theme->time = $request->time;
        $theme->url_video = $request->url;
        $theme->save();


        return back();



    }

    public function loadThemeCourse(Request $request){
        $output = '<option value="">No se encontraron datos</option>';
        if ($request->ajax()) {

            $themes = DB::table('theme_courses')->where('id',$request->id_course)->get();

            if ($themes){

                $output = "";
                foreach ($themes as $key => $theme) {

                    $output .= '<option value="'.$theme->id.'">'.$theme->nombre.'</option>';

                }



            }


        }
        return Response($output);




    }


    public function loadSubThemes(Request $request){
        $output = '<option value="">No se encontraron datos</option>';
        if ($request->ajax()) {

            $themes = DB::table('sub_theme_courses')->where('id',$request->id_course)->get();

            if ($themes){

                $output = "";
                foreach ($themes as $key => $theme) {

                    $output .= '<option value="'.$theme->id.'">'.$theme->nombre.'</option>';

                }



            }


        }
        return Response($output);




    }


    public function addMaterial(Request $request){

        $material = new Material();
        $material->id_course = $request->id_course;
        $material->id_theme = $request->theme_course;
        $material->id_subtheme = $request->subtheme_course;
        $material->id_instructor = $request->id_instructor;
        $material->nombre = $request->nombre;
        $material->url = $request->url;
        $material->save();

        return back();
    }
}
