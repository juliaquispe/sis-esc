<?php

use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Support\Facades\Route;


Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');

//GRUPO DE RUTAS PARA EL ADMIN
Route:: group(['prefix'=>'admin','namespace'=>'admin', 'middleware'=>'auth'],function(){

    //RUTAS DE LOGIN
    Route::get('/', 'InicioController@index')->name ('inicio');
    //RUTAS DEL ROL
    Route:: get('rol','RolController@index')->name ('rol');
	Route:: get('rol/crear','RolController@create')->name ('crear_rol')->middleware('permisocrear');
	Route:: post('rol','RolController@store')->name ('guardar_rol');
	Route:: get('rol/{id}/editar','RolController@edit')->name ('editar_rol')->middleware('permisoeditar');
	Route:: put('rol/{id}/editar','RolController@update')->name ('actualizar_rol');
    Route:: delete('rol/{id}/eliminar','RolController@destroy')->name ('eliminar_rol')->middleware('permisoeliminar');
    //RUTAS DE USUARIOS
    Route:: get('usuario','UsuarioController@index')->name ('usuario');
	Route:: get('usuario/crear','UsuarioController@create')->name ('crear_usuario')->middleware('permisocrear');
	Route:: post('usuario','UsuarioController@store')->name ('guardar_usuario');
	Route:: get('usuario/{id}/editar','UsuarioController@edit')->name ('editar_usuario')->middleware('permisoeditar');
	Route:: put('usuario/{id}/editar','UsuarioController@update')->name ('actualizar_usuario');
    Route:: delete('usuario/{id}/eliminar','UsuarioController@destroy')->name ('eliminar_usuario')->middleware('permisoeliminar');
    Route:: post('usuario/{usuario}','UsuarioController@ver')->name ('ver_usuario');
    Route:: get('usuario_inactivo','UsuarioController@index_inactivo')->name ('usuario_inactivo');
    Route:: put('usuario/{id}/inactivar','UsuarioController@inactivar')->name ('inactivar_usuario')->middleware('permisoeditar');
    Route:: put('usuario/{id}/activar','UsuarioController@activar')->name ('activar_usuario')->middleware('permisoeditar');

});

