<?php

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Credentials: true');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

//Routes para acceder a los Talleres desde aplicaciones externas.

//Route::resource('/talleresAPI','APi\TalleresController',['only'=>['index', 'store', 'update', 'destroy', 'show']] );



Route::get('/talleres','API\TalleresController@index' );
Route::get('/mesas','API\MesasController@index' );
Route::get('/mesas/{idtaller}','API\MesasController@show' );
Route::get('/procesos/{idmesas}','API\ProcesosController@show' );
Route::get('/reto/{idmesas}','API\RetosController@show' );
Route::get('/categorias','API\CategoriasController@index');
