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
})->middleware('verified');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', function(){
    return redirect()->route('inteligencias');
})->name('home');
//Route::get('/home', 'informationController@inteligencias')->middleware('verified');;



Route::get('/information/{mensaje?}','informationController@index')->middleware('verified')->name('information');
route::post('information/update','informationController@update')->name('information.update')->middleware('verified');



route::get('/inteligencias' , 'informationController@inteligencias')->name('inteligencias')->middleware('verified');

route::get('/inteligencia-matematica', 'TestController@test_logicos')->middleware('verified');


route::get('/inteligencia-espacial','TestController@test_espacial')->middleware('verified');









route::get('/inteligencia-linguistica',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("linguistica",compact('estadisticas'));
})->middleware('verified');

route::get('/inteligencia-musical',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("musical",compact('estadisticas'));
})->middleware('verified');

route::get('/inteligencia-ecologica',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("ecologica",compact('estadisticas'));
})->middleware('verified');

route::get('/inteligencia-interpersonal',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("interpersonal",compact('estadisticas'));
})->middleware('verified');

route::get('/inteligencia-intrapersonal',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("intrapersonal",compact('estadisticas'));
})->middleware('verified');

route::get('/inteligencia-kinestica',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    return view("kinestica",compact('estadisticas'));
})->middleware('verified');




//route::post('/save/informacion','informacionController@')



Route::get('/uploads/apps/{file}', function ($file) {

    $contador_table = DB::table('table_counter')->where('id', '=',1)->first();
   
    $contador = $contador_table->downloads +1;
    DB::table('table_counter')->where('id',$contador_table->id)->update(['downloads' => $contador]);
    
    return Storage::download($file);
})->middleware('verified'); 

Route::get('/libros/{file}', function ($file) {
    return Storage::download($file);
})->middleware('verified');


/// formularios
route::get('/formulario/informacion/{id}','statisticsController@formularios')->middleware('verified');



route::get('/test/{id}','TestController@hacerTest')->middleware('verified');

route::get('/resultados/test/{id}',function($id) {
    $test = DB::table('tb_form')->select('type','level')->where('id',$id)->get()->toArray();

    if($test[0]->type != 'sastifaccion') {
        if ($test[0]->level == 1) {
            $nombre = 'Test de ' . $test[0]->type . ' basico';
        } else if ($test[0]->level == 2) {
            $nombre = 'Test de ' . $test[0]->type . ' medio';
        } else if ($test[0]->level == 3) {
            $nombre = 'Test de ' . $test[0]->type . ' Avanzado';
        }
    }

    $usuario = verified()->id();
    return view('resultados',compact('id','nombre','usuario'));
})->name('resultados.test')->middleware('verified');

route::get('resultados/preguntas/{form}','statisticsController@respuestaCorrecta')->middleware('verified');

route::post('formulario/store','statisticsController@store')->name('form')->middleware('verified');
//oute::post('information/update','informationController@update')->name('information.update')->middleware('verified');

route::get('recomendaciones',function () {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
   return view('recomendaciones',compact('estadisticas'));
})->middleware('verified');;

route::get('resultados-grafico/{form}/{question}','statisticsController@graficos')->middleware('verified');

route::get('graficos/{tipo}',function ($tipo){
    if($tipo == '1'){
        return view('graficos.conocimientos');
    }else if($tipo == 2){
        return view('graficos.aptitud');
    }else if($tipo == 3){
        return view('graficos.sastifaccion');
    }
})->middleware('verified');


route::get('guardarIntentosTest/{test}/{tipo}/{puntaje}','testController@guardarIntentosTest')->middleware('verified');;

route::get('mostrar-resultados','testController@mostrarResultados')->middleware('verified');;

route::get('administracion', 'statisticsController@mostrarResultados')->middleware('verified');;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
