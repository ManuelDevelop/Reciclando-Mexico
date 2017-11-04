<?php

use Illuminate\Http\Request;

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

//retorna el usuario si esta registrado
Route::post('log',function(){
	return response(['elemento1','elemento2'],200);
});
//ingresa la imagen
Route::post('imagen',function(){
	return response(['elemento3','elemento4'],200);
});
//obtiene la imagen
Route::get('imagen/{id}',function(){
	return response(['elemento5','elemento6'],200);
});
//ingresa el registro
Route::post('registro',function(){
	return response(['elemento7','elemento8'],200);
});
//obtiene el registro
Route::get('registro/{id}',function(){
	return response(['elemento9','elemento10'],200);
});
