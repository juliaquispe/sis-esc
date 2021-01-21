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
    //RUTAS DEL ROL
    Route:: get('rol','RolController@index')->name ('rol');
	Route:: get('rol/crear','RolController@create')->name ('crear_rol');
	Route:: post('rol','RolController@store')->name ('guardar_rol');
	Route:: get('rol/{id}/editar','RolController@edit')->name ('editar_rol');
	Route:: put('rol/{id}/editar','RolController@update')->name ('actualizar_rol');
    Route:: delete('rol/{id}/eliminar','RolController@destroy')->name ('eliminar_rol');
    //RUTAS DE USUARIOS
    Route:: get('usuario','UsuarioController@index')->name ('usuario');
	Route:: get('usuario/crear','UsuarioController@create')->name ('crear_usuario');
	Route:: post('usuario','UsuarioController@store')->name ('guardar_usuario');
	Route:: get('usuario/{id}/editar','UsuarioController@edit')->name ('editar_usuario');
	Route:: put('usuario/{id}/editar','UsuarioController@update')->name ('actualizar_usuario');
    Route:: delete('usuario/{id}/eliminar','UsuarioController@destroy')->name ('eliminar_usuario');
    Route:: post('usuario/{usuario}','UsuarioController@ver')->name ('ver_usuario');
    Route:: get('usuario_inactivo','UsuarioController@index_inactivo')->name ('usuario_inactivo');
    Route:: put('usuario/{id}/inactivar','UsuarioController@inactivar')->name ('inactivar_usuario');
    Route:: put('usuario/{id}/activar','UsuarioController@activar')->name ('activar_usuario');

});

