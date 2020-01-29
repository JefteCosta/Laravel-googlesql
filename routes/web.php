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
    return view('welcome');
});

//Route::verb('uri', 'Controller@metod')->name('route_name');
Route::get('usuario', 'UserController@Index')->name('users.index');


//VERBO GET
Route::get('usuario/exibir/{user}', 'UserController@UserExibir')->name('user.exibir');
Route::get('usuario/editar/{user}', 'UserController@UserEditar')->name('user.editar');
Route::get('usuario/novo', 'UserController@UserNovo')->name('user.novo');
Route::get('usuario/{msg}', 'UserController@Index')->name('user.alerta');

//VERBO POST
Route::post('usuario/novo/inserir','UserController@UserNovoInserir')->name('user.inserir');
//VERBO PUT/PATCH
Route::put('usuario/editar/editado/{user}', 'UserController@UserPerEdit')->name('user.editado');
//VERBO DELETE
Route::delete('usuario/deletar/{user}', 'UserController@UserDelete')->name('user.delete');

//VERBO Resoucers
Route::resource('post', 'PostController');
