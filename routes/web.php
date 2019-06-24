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



Route::get('/information','informationController@index')->middleware('auth');
route::post('information/update','informationController@update')->name('information.update')->middleware('auth');



route::get('/inteligencias' , 'informationController@inteligencias')->middleware('auth');

route::get('/inteligencia-matematica', function (){
    return view("logica");
})->middleware('auth');
route::get('/inteligencia-espacial',function() {
    return view("espacial");
})->middleware('auth');

route::get('/inteligencia-linguistica',function() {
    return view("linguistica");
})->middleware('auth');

route::get('/inteligencia-musical',function() {
    return view("musical");
})->middleware('auth');

route::get('/inteligencia-ecologica',function() {
    return view("ecologica");
})->middleware('auth');

route::get('/inteligencia-interpersonal',function() {
    return view("interpersonal");
})->middleware('auth');

route::get('/inteligencia-intrapersonal',function() {
    return view("intrapersonal");
})->middleware('auth');

route::get('/inteligencia-kinestica',function() {
    return view("kinestica");
})->middleware('auth');


/*
<li> Sololearm <a href="/uploads/SoloLearn.apk">Descargar</a></li>
                                <li> Buttons and Scissors <a href="/uploads/Buttons.apk">Descargar</a></li>
                                <li> Kodu Game Lab  <a href="/uploads/kodu.msi">Descargar</a> </li>
                            </ul>

                            <ul>
                                <li>ZinjaI</li>
                                <li>Progranimate</li>
                                <li>GeoGebra</li>*/

//route::post('/save/informacion','informacionController@')



Route::get('/uploads/{file}', function ($file) {

    $contador_table = DB::table('table_counter')->where('id', '=',1)->first();
    $contador = $contador_table->downloads +1;
    dB::table('table_counter')->where('id',$contador_table->id)->update(['downloads' => $contador]);

    return Storage::download($file);
})->middleware('auth');;
