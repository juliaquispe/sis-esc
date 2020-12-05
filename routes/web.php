<?php
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PruebaController@index') ;

//GRUPO DE RUTAS PARA EL ADMIN
Route:: group(['prefix'=>'admin','namespace'=>'admin'],function(){
    //
    Route:: get('rol','RolController@index')->name ('rol');
	Route:: get('rol/crear','RolController@create')->name ('crear_rol');
	Route:: post('rol','RolController@store')->name ('guardar_rol');
	Route:: get('rol/{id}/editar','RolController@edit')->name ('editar_rol');
	Route:: put('rol/{id}/editar','RolController@update')->name ('actualizar_rol');
	Route:: delete('rol/{id}/eliminar','RolController@destroy')->name ('eliminar_rol');
});
