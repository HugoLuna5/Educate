<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Enroll;
use App\SubThemeCourse;
use App\ThemeCourse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CursosController extends Controller
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


        $cursos = Curso::paginate(20);

        return view('cursos.index',compact('cursos'));
    }


    public static function cursoDetail(){
        return "Hola";
    }



    public function cursoDetailEroll($slug){


        $curso = Curso::where('slug',$slug)->first();
        $user_id = Auth::user()->id;
        if ($curso){


            if (Curso::validateEnroll($user_id,$curso->id)){
                return Curso::returnDetail($curso);

            }else{
                return Curso::returnDetialEnrrol($curso);
            }



        }



        return back();


    }


    public function enroll(Request $request){
        $enroll = new Enroll();
        $enroll->id_course = $request->id_course;
        $enroll->id_instructor = $request->id_instructor;
        $enroll->id_user = $request->id_user;
        $enroll->save();

        return back();
    }
}
