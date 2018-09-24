<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //


    public static function validateEnroll($user_id,$course_id){


        if (Enroll::where('id_user',$user_id)->where('id_course',$course_id)->first()){


            return true;


        }

        return false;


    }


    public static function returnDetail($curso){

        $dificultad = "";
        if ($curso->id_nivel == 1){
            $dificultad = "Principiante";
        }elseif ($curso->id_nivel == 2){
            $dificultad = "Intermedio";
        }else{
            $dificultad = "Avanzado";
        }


        $videos = SubThemeCourse::where('id_course',$curso->id)->count();

        $themes = ThemeCourse::where('id_course',$curso->id)->get();
        $subthemes = SubThemeCourse::where('id_course',$curso->id)->get();

        $instructor = User::find($curso->id_instructor);

        return view('cursos.detail',compact('curso','dificultad','videos','themes','subthemes','instructor'));


    }

    public static function returnDetialEnrrol($curso){

        $dificultad = "";
        if ($curso->id_nivel == 1){
            $dificultad = "Principiante";
        }elseif ($curso->id_nivel == 2){
            $dificultad = "Intermedio";
        }else{
            $dificultad = "Avanzado";
        }


        $videos = SubThemeCourse::where('id_course',$curso->id)->count();

        $themes = ThemeCourse::where('id_course',$curso->id)->get();
        $subthemes = SubThemeCourse::where('id_course',$curso->id)->get();

        $instructor = User::find($curso->id_instructor);

        return view('cursos.detailEnrrol',compact('curso','dificultad','videos','themes','subthemes','instructor'));
    }
}
