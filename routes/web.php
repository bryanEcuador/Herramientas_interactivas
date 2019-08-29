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



route::get('/inteligencias' , 'informationController@inteligencias')->name('inteligencias')->middleware('auth');

route::get('/inteligencia-matematica', function (){
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    $testRealizados = DB::table('tb_statistics')->select('form_id')->distinct()
                        ->where('user_id',auth()->id())->whereIn('form_id',[1,2,3])->get();
    $filtered = array();
    $array = array();
    $testHabilidado = 0;
    if($testRealizados->isEmpty()){
        $testHabilidado = 1;
    }else{
        $filtered = $testRealizados->filter(function ($value, $key) {
            return $value;
        });

        foreach ($filtered as $elementos){
           array_push($array,$elementos->form_id) ;
        }

         if(in_array(3,$array)){
             $testHabilidado = 4;
         }elseif(in_array(2,$array)){
             $testHabilidado = 3;
         }else{
             $testHabilidado = 2;
         }
    }
    return view("logica",compact('estadisticas','testHabilidado'));
})->middleware('auth');


route::get('/inteligencia-espacial',function() {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
    $testRealizados = DB::table('tb_statistics')->select('form_id')->distinct()
        ->where('user_id',auth()->id())->whereIn('form_id',[4,5,6])->get();

    $filtered = array();
    $array = array();
    $testHabilidado = 0;

    if($testRealizados->isEmpty()){
        $testHabilidado = 4;
    }else{
        $filtered = $testRealizados->filter(function ($value, $key) {
            return $value;
        });

        foreach ($filtered as $elementos){
            array_push($array,$elementos->form_id) ;
        }

        if(in_array(6,$array)){
            $testHabilidado = 7;
        }elseif(in_array(5,$array)){
            $testHabilidado = 6;
        }else{
            $testHabilidado = 5;
        }
    }
    return view("espacial",compact('estadisticas','testHabilidado'));
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
    
    //return Storage::download($file);
})->middleware('auth');;

Route::get('/libros/{file}', function ($file) {
    return Storage::download($file);
})->middleware('auth');;


/// formularios
route::get('/formulario/informacion/{id}','statisticsController@formularios')->middleware('auth');



route::get('/test/{id}','TestController@hacerTest')->middleware('auth');

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

    $usuario = auth()->id();
    return view('resultados',compact('id','nombre','usuario'));
})->name('resultados.test')->middleware('auth');

route::get('resultados/preguntas/{form}','statisticsController@respuestaCorrecta')->middleware('auth');

route::post('formulario/store','statisticsController@store')->name('form')->middleware('auth');
//oute::post('information/update','informationController@update')->name('information.update')->middleware('auth');

route::get('recomendaciones',function () {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
   return view('recomendaciones',compact('estadisticas'));
});

route::get('resultados-grafico/{form}/{question}','statisticsController@graficos');

route::get('graficos/{tipo}',function ($tipo){
    if($tipo == '1'){
        return view('graficos.conocimientos');
    }else if($tipo == 2){
        return view('graficos.aptitud');
    }else if($tipo == 3){
        return view('graficos.sastifaccion');
    }
});

