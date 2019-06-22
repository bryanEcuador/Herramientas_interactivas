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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'informationController@inteligencias')->middleware('auth');;



Route::get('/information','informationController@index')->middleware('auth');;
route::post('information/update','informationController@update')->name('information.update')->middleware('auth');;



route::get('/inteligencias' , 'informationController@inteligencias')->middleware('auth');;

route::get('/inteligencia/matematica', function (){
    return view("logica");
})->middleware('auth');;
route::get('/inteligencia/espacial',function() {
    return view("espacial");
})->middleware('auth');;




//route::post('/save/informacion','informacionController@')



Route::get('/uploads/{file}', function ($file) {

    $contador_table = DB::table('table_counter')->where('id', '=',1)->first();
    $contador = $contador_table->downloads +1;
    dB::table('table_counter')->where('id',$contador_table->id)->update(['downloads' => $contador]);

    return Storage::download($file);
})->middleware('auth');;
