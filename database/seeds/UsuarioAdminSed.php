<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder

{
    public function run()
    {
        DB::table('usuarios')->insert([
            'usuario'=>'admin',
            'nombre'=>'Juan',
            'apellido'=>'Mamani',
            'email'=>'juan@gmail.com',
            'password'=>bcrypt('123456')

        ]);
        DB::table('usuarios')->insert([
            'usuario'=>'user2',
            'nombre'=>'usuario',
            'apellido'=>'dos',
            'email'=>'user2@gmail.com',
            'password'=>bcrypt('123456')
        ]);
        DB::table('roles')->insert([
            'rol'=>'Administrador',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>1
        ]);
        DB::table('roles')->insert([
            'rol'=>'Ayudante',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>0
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id'=>1,
            'usuario_id'=>1,
            'estado'=>1 //1=activo
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id'=>2,
            'usuario_id'=>2,
            'estado'=>1 //1=activo
        ]);
            DB::table('menu')->insert([
                'menu_id'=>0,
                'nombre'=>'Menú',
                'url'=>'admin/menu/#',
                'orden'=>1,
                'icono'=>'fa-server'
            ]);
            DB::table('menu')->insert([
                'menu_id'=>1,
                'nombre'=>'Ver Menú',
                'url'=>'admin/menu',
                'orden'=>1,
                'icono'=>'fa-navicon'
            ]);
            DB::table('menu')->insert([
                'menu_id'=>1,
                'nombre'=>'Menú Rol',
                'url'=>'admin/menu-rol',
                'orden'=>2,
                'icono'=>'fa-exchange'
            ]);
            DB::table('menu')->insert([
                'menu_id'=>0,
                'nombre'=>'Usuario',
                'url'=>'admin/usuario/#',
                'orden'=>2,
                'icono'=>'fa-user'
            ]);
            DB::table('menu')->insert([
                'menu_id'=>4,
                'nombre'=>'Ver Usuarios Activos',
                'url'=>'admin/usuario',
                'orden'=>1,
                'icono'=>'fa-users'
            ]);
            DB::table('menu')->insert([
                'menu_id'=>0,
                'nombre'=>'Roles',
                'url'=>'admin/rol/#',
                'orden'=>3,
                'icono'=>'fa-cubes'
            ]);
            DB::table('menu')->insert([
                'menu_id'=>6,
                'nombre'=>'Ver Roles',
                'url'=>'admin/rol',
                'orden'=>1,
                'icono'=>'fa-cube'
            ]);
            DB::table('menu')->insert([
                'menu_id'=>0,
                'nombre'=>'Personal',
                'url'=>'admin/personal/#',
                'orden'=>4,
                'icono'=>'fa-users'
            ]);
            DB::table('menu')->insert([
                'menu_id'=>0,
                'nombre'=>'Unidad',
                'url'=>'admin/unidad/#',
                'orden'=>5,
                'icono'=>'fa-pie-chart'
            ]);
            DB::table('menu')->insert([
                'menu_id'=>10,
                'nombre'=>'Ver Unidad',
                'url'=>'admin/unidad',
                'orden'=>1,
                'icono'=>'fa-external-link'
            ]);
            DB::table('menu')->insert([
                'menu_id'=>4,
                'nombre'=>'Ver Usuarios Inactivos',
                'url'=>'admin/usuario-rol',
                'orden'=>2,
                'icono'=>'fa-users'
            ]);
            DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>1]);
            DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>2]);
            DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>3]);
            DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>4]);
            DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>5]);
            DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>12]);
            DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>6]);
            DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>7]);
            DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>8]);
            DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>9]);
            DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>10]);


    }
}
