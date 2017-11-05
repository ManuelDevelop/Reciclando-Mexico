<?php

use Illuminate\Http\Request;
use App\Http\Controllers;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas para la tabla de Logins
//retorna el usuario si esta registrado
Route::post('log','LoginController@store');
//obtiene la imagen por id
Route::get('log/{id}','LoginController@show');
//Actualiza el registro por id
Route::put('log/{id}','LoginController@edit');
//Elimina el registro por id
Route::delete('log/{id}','LoginController@destroy');



//Rutas para la tabla de Imagenes
//ingresa una nueva imagen
Route::post('imagen','FotoController@store');
//obtiene la imagen por id
Route::get('imagen/{id}','FotoController@show');
//Actualiza el registro por id
Route::put('imagen/{id}','FotoController@edit');
//Elimina el registro por id
Route::delete('imagen/{id}','FotoController@destroy');


//rutas para la tabla de Registros
//ingresa un nuevo registro
Route::post('registro','RegistroController@store');
//obtiene el registro por id
Route::get('registro/{id}','RegistroController@show');
//Actualiza el registro por id
Route::put('registro/{id}','RegistroController@edit');
//Elimina el registro por id
Route::delete('registro/{id}','RegistroController@destroy');
