<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});

       
Route::get('/home', 'HomeController@index');
//Routes Talleres
Route::get('/talleres','TalleresController@index' );
Route::get('/talleres/creartaller','TalleresController@create' );
Route::post('/talleres/guardar','TalleresController@store' );
        //Routes Talleres
Route::get('/mesas','MesasController@index' );
Route::get('/mesas/crearmesa','MesasController@create' );
Route::post('/mesas/guardar','MesasController@store' );
        //Routes Procesos

Route::get('/procesos','ProcesosController@index' );
Route::get('/procesos/crearproceso','ProcesosController@create' );
Route::get('/procesos/vermesas/{idtaller}','ProcesosController@listmesas' );
Route::post('/procesos/guardarproceso','ProcesosController@store' );



