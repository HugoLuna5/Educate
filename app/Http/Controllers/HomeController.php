<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Enroll;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $cursos = Enroll::getMyCourses($user);
        return view('home.index',compact('cursos'));
    }


    public function my()
    {



        return view('home.my');
    }

    public function changePhoto(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image'
        ]);
        $userimage = Auth::user();
        $extensionperfil = $request->file('photo')->getClientOriginalExtension();
        $file_name = $userimage->id . '.jpg';

        $md5File = md5(date("Y-M-D") . "" . time() . "" . $file_name . "" . $extensionperfil);
        $file = $md5File . ".jpg";
        \Storage::disk('profile')->put($file, \File::get($request->photo));

        $userimage->photo = $file;


        $userimage->save();


        $userimage->save();
        $data['success'] = true;
        $data['file_name'] = $file;


        return $data;
    }

    public function myEdit(Request $request)
    {

        $userAuth = User::find(Auth::user()->id);

        $username = $request->username;

        if ($username != Auth::user()->username) {
            $userAuth->username = $username;
        }


        $name = $request->name;

        if ($name != Auth::user()->name) {
            $userAuth->name = $name;
        }

        $ocupacion = $request->ocupacion;


        if ($ocupacion != Auth::user()->ocupacion) {
            $userAuth->ocupacion = $ocupacion;
        }


        $fb = $request->fb;

        if ($fb != Auth::user()->fb) {
            $userAuth->fb = $fb;
        }


        $tw = $request->tw;

        if ($tw != Auth::user()->tw) {
            $userAuth->tw = $tw;
        }
        $bio = $request->bio;

        if ($bio != Auth::user()->bio) {
            $userAuth->bio = $bio;
        }

        $correo = $request->correo;

        if ($correo != Auth::user()->email) {
            $userAuth->email = $correo;
        }


        $contra = $request->contra;
        if ($contra != null) {
            $userAuth->password = Hash::make($contra);
        }

        $userAuth->save();

        $data['success'] = 'success';

        return $data;


    }


    public function search(Request $request)
    {
        $s = $request->search;
        if ($request->ajax()) {

            $output = "";

            $users = DB::table('users')->where('username', 'LIKE', '%' . $s . "%")->orWhere('name','LIKE','%'.$s.'%')->get();
            $cursos = DB::table('cursos')->where('nombre', 'LIKE', '%' . $s . "%")->orWhere('descripcion','LIKE','%'.$s.'%')->get();


            if ($users) {

                foreach ($users as $key => $user) {

                    if ($user->photo != null){

                        $output .= '<div style="margin: 10px;" class="media d-block d-md-flex mt-3">
                <img class="card-img-64 d-flex mx-auto mb-3 rounded-circle" src="/my/photo/'.$user->photo.'" alt="Generic placeholder image">
                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                  <h5 class="font-weight-bold mt-0">
                    <a href="/usuarios/'.$user->id.'">' . $user->name . '</a>
                    <a href="" class="pull-right">
                     
                    </a>
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
                    <a href="/usuarios/'.$user->id.'">' . $user->name . '</a>
                    <a href="" class="pull-right">
                     
                    </a>
                  </h5>
                  '.$user->bio.'
                </div>
              </div>
              <hr>
            ';
                    }




                }

            }


            if ($cursos){
                foreach ($cursos as $key => $curso) {


                    $output .= '<div style="margin: 10px;" class="media d-block d-md-flex mt-3 ">
                <img style="background: '.$curso->color.'" class="card-img-64 d-flex mx-auto mb-3 rounded-circle" src="/iconos/'.$curso->icon.'" alt="Generic placeholder image">
                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                  <h5 class="font-weight-bold mt-0">
                    <a href="/cursos/'.$curso->slug.'">' . $curso->nombre . '</a>
                    <a href="" class="pull-right">
                     
                    </a>
                  </h5>
                  '.$curso->descripcion.'
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
