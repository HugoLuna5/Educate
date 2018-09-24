<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

    if (!Auth::guest()){
        return redirect('/home');
    }

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/my', 'HomeController@my')->name('my');
Route::post('/my/edit', 'HomeController@myEdit')->name('myEdit');
Route::post('/search', 'HomeController@search')->name('search');
Route::post('/my/changePhoto', 'HomeController@changePhoto')->name('changePhoto');


/**
 * Routes Course
 */
Route::get('/cursos','CursosController@index')->name('cursos');
Route::get('/cursos/{slug}','CursosController@cursoDetailEroll')->name('cursoDetailEroll');
Route::post('/cursos/enroll','CursosController@enroll')->name('enroll');




/*
 * Routes Admin
 */
Route::get('/admin','AdminController@index')->name('admin');
Route::post('admin/searchInstructor', 'AdminController@searchInstructor')->name('searchInstructor');
Route::post('/admin/add-instructor', 'AdminController@addInstructor')->name('addInstructor');
Route::post('/admin/addCategoryCourse', 'AdminController@addCategoryCourse')->name('addCategoryCourse');
Route::post('/admin/addCourse', 'AdminController@addCourse')->name('addCourse');
Route::post('/admin/searchCourses', 'AdminController@searchCourses')->name('searchCourses');
Route::get('/admin/cursos/{slug}', 'AdminController@manageCourses')->name('manageCourses');
Route::post('/admin/cursos/addThemeCourse', 'AdminController@addThemeCourse')->name('addThemeCourse');
Route::post('/admin/cursos/addSubThemeCourse', 'AdminController@addSubThemeCourse')->name('addSubThemeCourse');
Route::post('/admin/cursos-loadTheme/', 'AdminController@loadThemeCourse')->name('loadThemeCourse');
Route::post('/admin/cursos-loadSubThemes', 'AdminController@loadSubThemes')->name('loadSubThemes');
Route::post('/admin/cursos/addMaterial', 'AdminController@addMaterial')->name('addMaterial');


Route::get('/compiler/java', function (){


    //$file =  "http://192.168.1.66/my/code/Main.java";//\Storage::disk('code')->get('Main.java')->url();
    //shell_exec('javac '.\Storage::disk('code')->get('Main.java').'');
    //echo (shell_exec('java '.\Storage::disk('code')->get('Main.class').''));

    //echo $file;
    //$path_to_file = '/my/code/Main.java';


    echo shell_exec('javac Main.java');
    echo shell_exec('java Main');

    //echo shell_exec("javac -d /code/Main.java");

    //echo shell_exec("javac \code\Main.java ");
    //echo shell_exec("javac /code/Main");
});


Route::get('/my/photo/{filename}',function($filename){

    $path = storage_path("app/profile/$filename");

    if (!\File::exists($path)) abort(404);

    $file = \File::get($path);

    $type = \File::mimeType($path);

    $response = Response::make($file,200);

    $response->header("Content-Type",$type);

    return $response;


});


Route::get('/my/code/{filename}',function($filename){

    $path = storage_path("app/code/$filename");

    if (!\File::exists($path)) abort(404);

    $file = \File::get($path);

    $type = \File::mimeType($path);

    $response = Response::make($file,200);

    $response->header("Content-Type",$type);

    return $response;


});Route::get('/iconos/{filename}',function($filename){

    $path = storage_path("app/iconos/$filename");

    if (!\File::exists($path)) abort(404);

    $file = \File::get($path);

    $type = \File::mimeType($path);

    $response = Response::make($file,200);

    $response->header("Content-Type",$type);

    return $response;


});