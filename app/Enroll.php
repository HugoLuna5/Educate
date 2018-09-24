<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    //



    public static function getMyCourses($user){


        $courses = Curso::all();
        $my_courses = Enroll::where('id_user',$user->id)->get();


        $cursos = new \ArrayObject();

        for($i = 0; $i < count($courses); $i++){

            if ($courses[$i]->id == $my_courses[$i]->id_course){
                $cursos->append($courses[$i]);
            }

        }


        return $cursos;

    }



}
