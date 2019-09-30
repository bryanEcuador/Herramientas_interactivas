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

require_once __DIR__.'/modulos/administracion.php';



/// formularios
route::get('/formulario/informacion/{id}','statisticsController@formularios')->middleware('verified');

route::get('/formulario/iniciales/{id}', 'TestController@testIniciales')->middleware('verified');


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
        } else if ($test[0]->level == 0) {
            $nombre = 'Test de ' . $test[0]->type . ' inicial';
        }
    }

    $usuario = auth()->id();
    return view('resultados',compact('id','nombre','usuario'));
})->name('resultados.test')->middleware('verified');

route::get('resultados/preguntas/{form}','statisticsController@respuestaCorrecta')->middleware('verified');

route::post('formulario/store','statisticsController@store')->name('form')->middleware('verified');
//oute::post('information/update','informationController@update')->name('information.update')->middleware('verified');

/*
 *
 *
 *
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

route::get('/inteligencia-matematica', 'TestController@test_logicos')->name('matematica')->middleware('verified');


route::get('/inteligencia-espacial','TestController@test_espacial')->name('espacial')->middleware('verified');









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
    
    return Storage::download('apps/'.$file);
})->middleware('verified'); 

Route::get('/libros/{file}', function ($file) {
    return Storage::download($file);
})->middleware('verified');



route::get('recomendaciones',function () {
    $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
   return view('recomendaciones',compact('estadisticas'));
})->middleware('verified');;

route::get('resultados-grafico/{form}/{question}','statisticsController@graficos')->middleware('verified');

route::get('graficos/{tipo}',function ($tipo){

    $valores = [];
    $valores2 = [];
    $valores3 = [];
    if($tipo == '1'){
        // retonrar un arreglo con  todos los valaroes para mostrar la grafica
        $datos = DB::table('tb_questions')->select('id')->whereIn('form_id',[1])->get();
        $datos2 = DB::table('tb_questions')->select('id')->whereIn('form_id',[2])->get();
        $datos3 = DB::table('tb_questions')->select('id')->whereIn('form_id',[3])->get();

        foreach ($datos as $dato){
            array_push($valores,$dato->id);
        }
        foreach ($datos2 as $dato){
            array_push($valores2,$dato->id);
        }
        foreach ($datos3 as $dato){
            array_push($valores3,$dato->id);
        }
        return view('graficos.conocimientos',compact('valores','valores2','valores3'));
    }else if($tipo == 2){
        $datos = DB::table('tb_questions')->select('id')->whereIn('form_id',[4])->get();
        $datos2 = DB::table('tb_questions')->select('id')->whereIn('form_id',[5])->get();
        $datos3 = DB::table('tb_questions')->select('id')->whereIn('form_id',[6])->get();

        foreach ($datos as $dato){
            array_push($valores,$dato->id);
        }
        foreach ($datos2 as $dato){
            array_push($valores2,$dato->id);
        }
        foreach ($datos3 as $dato){
            array_push($valores3,$dato->id);
        }
        return view('graficos.aptitud',compact('valores','valores2','valores3'));
    }else if($tipo == 3){
        return view('graficos.sastifaccion',compact('valores'));
    }
})->middleware('verified');


route::get('guardarIntentosTest/{test}/{tipo}/{puntaje}','testController@guardarIntentosTest')->middleware('verified');

route::get('mostrar-resultados','testController@mostrarResultados')->middleware('verified');

route::get('administracion', 'statisticsController@mostrarResultados')->middleware('verified');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::get('/gestor-preguntas',function() {
   return view('gestor');
});
/////
route::get('/resultados-test/mejora',function (){
    return view('graficos.mejora');
});

route::get('/resultados-test-mejora',function(){
    $total = DB::table('tb_puntaje_test')->where('id','!=',null)->count();
    $mejora = DB::table('tb_puntaje_test')->whereRaw('test_inicial_logico < test_aleatorio_logico   ')->count();
    if($total !== null and $mejora !== null){
        if($mejora > 0){
            $mejoraron = ($total * 100) / $mejora;
            $no_mejoraron = 100 - $mejoraron;
        }else{
            $mejoraron = 0;
            $no_mejoraron = 100;
        }

    }else{
        $mejoraron = 0;
        $no_mejoraron = 0;
    }

    $array = [];
    array_push($array,$mejoraron);
    array_push($array,$no_mejoraron);

    return $array;
});

route::get('/resultados-test-mejora-espacial',function(){
    $total = DB::table('tb_puntaje_test')->where('id','!=',null)->count();
    $mejora = DB::table('tb_puntaje_test')->whereRaw('test_inicial_aptitud < test_aletorio_aptitud   ')->count();
    if($total !== null and $mejora !== null){
        if($mejora > 0){
            $mejoraron = ($total * 100) / $mejora;
            $no_mejoraron = 100 - $mejoraron;
        }else{
            $mejoraron = 0;
            $no_mejoraron = 100;
        }

    }else{
        $mejoraron = 0;
        $no_mejoraron = 0;
    }

    $array = [];
    array_push($array,$mejoraron);
    array_push($array,$no_mejoraron);

    return $array;
});

//////////////////////////