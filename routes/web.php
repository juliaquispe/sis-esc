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
            Route:: put('usuario/{id}/inactivar','UsuarioController@inactivar')->name ('inactivar_usuario')->middleware('permisoeliminar');
            Route:: put('usuario/{id}/activar','UsuarioController@activar')->name ('activar_usuario')->middleware('permisoeditar');

            Route:: get('usuario/{id}/aceptar','UsuarioController@aceptar')->name ('aceptar_usuario');
            Route:: get('usuario/{id}/rechazar','UsuarioController@rechazar')->name ('rechazar_usuario');

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
            //RUTAS DE REPORTES
            Route:: get('reportes','ReportesController@index')->name ('reportes');
            Route:: get('reporte/imprimir','ReportesController@imprimir')->name ('imprimir_reporte');

    });
    //RUTAS DEL EDITAR USUARIO SEA O NO ADMIN
    Route:: get('usuario/{id}/editar_usuario','UsuarioController@edit_usuario')->name ('editar_mi_usuario');
    Route:: put('usuario/{id}/editar_usuario','UsuarioController@update_usuario')->name ('actualizar_mi_usuario');
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
    Route:: get('personal_inactivo','PersonalController@index_inactivo')->name ('personal_inactivo');
    Route:: put('personal/{id}/inactivar','PersonalController@inactivar')->name ('inactivar_personal')->middleware('permisoeliminar');
    Route:: put('personal/{id}/activar','PersonalController@activar')->name ('activar_personal')->middleware('permisoeditar');
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
    Route:: get('paciente/{id}/consulta','PacienteController@consulta_paciente')->name ('consulta_paciente');
    Route:: get('paciente/{id}/ver_expediente','PacienteController@ver_expediente')->name ('ver_expediente');
    Route:: get('paciente_inactivo','PacienteController@index_inactivo')->name ('paciente_inactivo');
    Route:: put('paciente/{id}/inactivar','PacienteController@inactivar')->name ('inactivar_paciente')->middleware('permisoeliminar');
    Route:: put('paciente/{id}/activar','PacienteController@activar')->name ('activar_paciente')->middleware('permisoeditar');
      //RUTAS PARA CARGO
    Route:: get('cargo','CargoController@index')->name ('cargo');
    Route:: get('cargo/crear','CargoController@create')->name ('crear_cargo')->middleware('permisocrear');
    Route:: get('cargo/{id}/editar','CargoController@edit')->name ('editar_cargo')->middleware('permisoeditar');
    Route:: post('cargo','CargoController@store')->name ('guardar_cargo');
    Route:: put('cargo/{id}','CargoController@update')->name ('actualizar_cargo');
    Route:: delete('cargo/{id}/eliminar','CargoController@destroy')->name ('eliminar_cargo')->middleware('permisoeliminar');
    //RUTAS PARA SERVICIO
    Route:: get('servicio','ServicioController@index')->name ('servicio')->middleware('permisoadmin');;
    Route:: get('servicio/crear','ServicioController@create')->name ('crear_servicio')->middleware('permisocrear');
    Route:: get('servicio/{id}/editar','ServicioController@edit')->name ('editar_servicio')->middleware('permisoeditar');
    Route:: post('servicio','ServicioController@store')->name ('guardar_servicio');
    Route:: put('servicio/{id}','ServicioController@update')->name ('actualizar_servicio');
    Route:: delete('servicio/{id}/eliminar','ServicioController@destroy')->name ('eliminar_servicio')->middleware('permisoeliminar');
    //RUTAS DE FICHA
    Route:: get('ficha','FichaController@index')->name ('ficha');
    Route:: get('ficha/{id}/crear','FichaController@create')->name ('crear_ficha')->middleware('permisocrear');
    Route:: get('ficha/{id}/registrar','FichaController@registrar')->name ('registrar_ficha')->middleware('permisocrear');
    Route:: post('ficha','FichaController@store')->name ('guardar_ficha');
    Route:: put('ficha/{id}','FichaController@update')->name ('actualizar_ficha');
    Route:: delete('ficha/{id}/eliminar','FichaController@destroy')->name ('eliminar_ficha')->middleware('permisoeliminar');
    Route:: get('ficha/{id}/imprimir','FichaController@imprimir')->name ('imprimir_ficha');
    Route:: get('ficha/horario','FichaController@horario')->name ('horario_ficha');
    Route:: get('ficha/{id}/editar','FichaController@edit')->name ('editar_ficha')->middleware('permisoeditar');

    //RUTAS DE CONSULTA
    Route:: get('ficha/consulta','ConsultaController@index')->name ('consulta');
    Route:: get('ficha/consulta/{id}/crear','ConsultaController@create')->name ('crear_consulta')->middleware('permisocrear');

    Route:: put('consulta','ConsultaController@consulta_guardar')->name ('guardar_consulta');
    Route:: put('consulta/actualizar/','ConsultaController@consulta_actualizar')->name ('actualizar_consulta');
    Route:: post('receta','ConsultaController@receta_guardar')->name ('guardar_receta');
    Route:: put('receta/actualizar/','ConsultaController@receta_actualizar')->name ('actualizar_receta');
    Route:: post('historial','ConsultaController@historial_guardar')->name ('guardar_historial');
    Route:: put('historial/actualizar/','ConsultaController@historial_actualizar')->name ('actualizar_historial');
    Route:: get('historial/{id}/imprimir','ConsultaController@imprimir_historial')->name ('imprimir_historial');
    Route:: get('consulta/{id}/imprimir','ConsultaController@imprimir_consulta')->name ('imprimir_consulta');
    Route:: get('consulta/{id}/terminar','ConsultaController@terminar_consulta')->name ('terminar_consulta');
    Route:: post('gabinete','ConsultaController@gabinete_guardar')->name ('guardar_gabinete');
    Route:: put('gabinete/actualizar/','ConsultaController@gabinete_actualizar')->name ('actualizar_gabinete');
    Route:: get('gabinete/{id}/imprimir','ConsultaController@imprimir_gabinete')->name ('imprimir_gabinete');
    Route:: get('receta/{id}/imprimir','ConsultaController@imprimir_receta')->name ('imprimir_receta');
    //RUTAS DE CALENDARIO
    Route:: get('calendario','CalendarioController@calendario')->name ('calendario');
    Route:: post('calendario/guardar','CalendarioController@guardar_calendario')->name ('guardar_calendario');
    Route:: resource('eventos','CalendarioController');
    Route:: get('calendario/verificar','CalendarioController@verificar')->name ('verificar');
    Route:: put('calendario/actualizar','CalendarioController@update')->name ('actualizar_calendario');
    Route:: delete('calendario/eliminar','CalendarioController@destroy')->name ('eliminar_calendario');
    //RUTAS DE ENFERMERIA
    Route:: get('enfermeria','EnfermeriaController@index')->name ('enfermeria');
    Route:: get('enfermeria/crear','EnfermeriaController@create')->name ('crear_enfermeria')->middleware('permisocrear');
    Route:: post('enfermeria','EnfermeriaController@store')->name ('guardar_enfermeria');
    Route:: get('enfermeria/{id}/editar','EnfermeriaController@edit')->name ('editar_enfermeria')->middleware('permisoeditar');
    Route:: put('enfermeria/{id}','EnfermeriaController@update')->name ('actualizar_enfermeria');
    Route:: delete('enfermeria/{id}/eliminar','EnfermeriaController@destroy')->name ('eliminar_enfermeria')->middleware('permisoeliminar');
    //RUTAS DE INTERNACION
    Route:: get('internacion','InternacionController@index')->name ('internacion');
    Route:: get('internacion/{id}/crear','InternacionController@create')->name ('crear_internacion')->middleware('permisocrear');
    Route:: post('internacion','InternacionController@store')->name ('guardar_internacion');
    Route:: get('internacion/{id}/editar','InternacionController@edit')->name ('editar_internacion')->middleware('permisoeditar');
    Route:: put('internacion/{id}','InternacionController@update')->name ('actualizar_internacion');
    Route:: get('internacion/{id}/imprimir','InternacionController@imprimir_entrada')->name ('imprimir_internacion');
    Route:: get('internacion/{id}/alta','InternacionController@solicitar_alta')->name ('alta')->middleware('permisocrear');
    Route:: post('internacion/{id}/alta','InternacionController@dar_alta')->name ('dar_alta');
    Route:: get('internacion_alta','InternacionController@index_alta')->name ('internacion_alta');
    Route:: get('internacion/{id}/retiro_forzado','InternacionController@imprimir_forzoso')->name ('retiro_forzoso');
    Route:: get('internacion/{id}/imprimir_internacion','InternacionController@imprimir_todo')->name ('imprimir_todo');
    Route::get('internacion/{dato}/num_camas', 'InternacionController@num_camas') ->name('num_camas');
    Route::get('internacion/{id}/{estado}/mantenimiento', 'InternacionController@mantenimiento_cama') ->name('mantenimiento_cama')->middleware('permisoeditar');

});
