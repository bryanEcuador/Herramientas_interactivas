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

Route::get('/', function () {
    return redirect()->action('LoginController@login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

route::get('/information',function (){
    return view('actualizacionDatos');
});

route::get('/inteligencia/matematica', function (){
    return view("logica");
});
route::get('/inteligencia/espacial',function() {
    return view("espacial");
});
route::get('/inteligencias','informationController@registro');

route::post('information/update','informationController@update')->name('information.update');

//route::post('/save/informacion','informacionController@')
