<?php

use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Support\Facades\Route;


Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');

//GRUPO DE RUTAS PARA EL ADMIN
Route:: group(['prefix'=>'admin','namespace'=>'admin', 'middleware'=>'auth'],function(){
        Route::get('/', 'InicioController@index')->name ('inicio');
    //GRUPO DE RUTA PARA EL ADMIN
    Route::group(['middleware'=>'permisoadmin'],function () {
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
            //RUTAS DEL MENU
            Route:: get('menu','MenuController@index')->name ('menu');
            Route:: get('menu/crear','MenuController@create')->name ('crear_menu')->middleware('permisocrear');
            Route:: post('menu','MenuController@store')->name ('guardar_menu');
            Route:: get('menu/{id}/editar','MenuController@edit')->name ('editar_menu')->middleware('permisoeditar');
            Route:: put('menu/{id}/editar','MenuController@update')->name ('actualizar_menu');
            Route:: get('menu/{id}/eliminar','MenuController@destroy')->name ('eliminar_menu')->middleware('permisoeliminar');
            Route:: post('menu/guardar-orden','MenuController@guardarOrden')->name ('guardar-orden');
            //RUTAS DEL MENU-ROL
            Route:: get('menu-rol','MenuRolController@index')->name ('menu_rol');
            Route:: post('menu-rol','MenuRolController@store')->name ('guardar_menu_rol');
            //RUTAS DE CLINICA
            Route:: get('clinica','ClinicaController@index')->name ('clinica');
            Route:: get('clinica/{id}/editar','ClinicaController@edit')->name ('editar_clinica');
            Route:: put('clinica/{id}','ClinicaController@update')->name ('actualizar_clinica');
    });
    //RUTAS DEL UNIDAD
    Route:: get('unidad','UnidadController@index')->name ('unidad');
    Route:: get('unidad/crear','UnidadController@create')->name ('crear_unidad')->middleware('permisocrear');
    Route:: get('unidad/{id}/editar','UnidadController@edit')->name ('editar_unidad')->middleware('permisoeditar');
    Route:: post('unidad','UnidadController@store')->name ('guardar_unidad');
    Route:: put('unidad/{id}','UnidadController@update')->name ('actualizar_unidad');
    Route:: delete('unidad/{id}/eliminar','UnidadController@destroy')->name ('eliminar_unidad')->middleware('permisoeliminar');
    //RUTAS DEL PERSONAL
    Route:: get('personal','PersonalController@index')->name ('personal');
    Route:: get('personal/crear','PersonalController@create')->name ('crear_personal')->middleware('permisocrear');
    Route::get('personal/{id}/editar', 'PersonalController@edit') ->name('editar_personal')->middleware('permisoeditar');
    Route:: post('personal','PersonalController@store')->name ('guardar_personal');
	Route::put('personal/{id}', 'PersonalController@update') ->name('actualizar_personal');
	Route::delete('personal/{id}', 'PersonalController@destroy')->name('eliminar_personal')->middleware('permisoeliminar');
	Route::get('personal/{id}/curriculum', 'PersonalController@pdf')->name('ver_curriculum');
	//Route::get('personal/{id}', 'PersonalController@foto') ->name('ver_personal');
    Route:: post('personal/{personal}','PersonalController@ver')->name ('ver_personal');
    //RUTAS DE PACIENTE
    Route:: get('paciente','PacienteController@index')->name ('paciente');
    Route:: get('paciente/crear','PacienteController@create')->name ('crear_paciente')->middleware('permisocrear');
    Route:: get('paciente/{id}/editar','PacienteController@edit')->name ('editar_paciente')->middleware('permisoeditar');
    Route:: post('pacient','PacienteController@store')->name ('guardar_paciente');
    Route:: put('paciente/{id}','PacienteController@update')->name ('actualizar_paciente');
    Route:: delete('paciente/{id}/eliminar','PacienteController@destroy')->name ('eliminar_paciente')->middleware('permisoeliminar');
    Route:: get('paciente/{id}/ver','PacienteController@ver')->name ('ver_paciente');
    Route:: post('paciente','PacienteController@ordenar')->name ('ordenar_paciente');
    //RUTAS DE FICHA
    Route:: get('ficha','FichaController@index')->name ('ficha');
    Route:: get('ficha/{id}/agregar','PacienteController@agregar')->name ('agregar_cita')->middleware('permisoeditar');


});
