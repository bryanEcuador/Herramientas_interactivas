<?php
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
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

route::get('/principal',function() {
   return view('layouts.principal');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'informationController@inteligencias')->middleware('auth');;



Route::get('/information/{mensaje?}','informationController@index')->middleware('auth')->name('information');
route::post('information/update','informationController@update')->name('information.update')->middleware('auth');



route::get('/inteligencias' , 'informationController@inteligencias')->middleware('auth');

route::get('/inteligencia-matematica', function (){
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("logica",compact('estadisticas'));
})->middleware('auth');
route::get('/inteligencia-espacial',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("espacial",compact('estadisticas'));
})->middleware('auth');

route::get('/inteligencia-linguistica',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("linguistica",compact('estadisticas'));
})->middleware('auth');

route::get('/inteligencia-musical',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("musical",compact('estadisticas'));
})->middleware('auth');

route::get('/inteligencia-ecologica',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("ecologica",compact('estadisticas'));
})->middleware('auth');

route::get('/inteligencia-interpersonal',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("interpersonal",compact('estadisticas'));
})->middleware('auth');

route::get('/inteligencia-intrapersonal',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("intrapersonal",compact('estadisticas'));
})->middleware('auth');

route::get('/inteligencia-kinestica',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("kinestica",compact('estadisticas'));
})->middleware('auth');




//route::post('/save/informacion','informacionController@')



Route::get('/uploads/{file}', function ($file) {

    $contador_table = DB::table('table_counter')->where('id', '=',1)->first();
    $contador = $contador_table->downloads +1;
    dB::table('table_counter')->where('id',$contador_table->id)->update(['downloads' => $contador]);

    return Storage::download($file);
})->middleware('auth');;
