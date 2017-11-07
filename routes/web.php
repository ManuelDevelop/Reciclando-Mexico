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
    return view('auth.login');
});

//Las rutas web son las que utiliza para moverse dentro de la aplicaion del propio framework si queremos ocupar el framewor se utiliza el archivo api.php para que sean consumidas por otra aplicaion
//

Route::group([],function(){
	Route::resource('log','LoginController');
});

Route::group([],function(){
	Route::resource('reg','RegistroController');
});

Route::group([],function(){
	Route::resource('fot','FotoController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
