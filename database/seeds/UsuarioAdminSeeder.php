<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class UsuarioAdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('clinica')->insert([
            'nombre'=>'CLÍNICA SANTA TERESA',
            'direccion'=>'Calle Ayacucho Nro 39 entre Cochabamba y Santa Teresa ',
            'telefono'=>'2-6224000',
            'contacto_1'=>'76168781',
            'propietario'=>'Benigno  Gutiérrez Vargas',
            'mision'=>'Atender a los pacientes necesitados ',
            'vision'=>'generar ingresos',
            'color'=>'skin-1',
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
        DB::table('usuarios')->insert([
            'rol_id'=>1,
            'usuario'=>'admin',
            'nombre'=>'Juan',
            'apellido'=>'Mamani',
            'email'=>'juan.@gmail.com',
            'password'=>bcrypt('123456'),
            'estado'=>1 //1=activo
        ]);
        DB::table('usuarios')->insert([
            'rol_id'=>2,
            'usuario'=>'user2',
            'nombre'=>'usuario',
            'apellido'=>'dos',
            'email'=>'user2.@gmail.com',
            'password'=>bcrypt('123456'),
            'estado'=>1 //1=activo
        ]);
        DB::table('unidad')->insert([
            'nombre'=>'Enfermeria',
            'sigla'=>'GER',
            'descripcion'=>'Donde Curan'
        ]);
        DB::table('unidad')->insert([
            'nombre'=>'Pediatria',
            'sigla'=>'CyF',
        ]);
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Clínica',
            'url'=>'admin/clinica/#',
            'orden'=>1,
            'icono'=>'fa-plus'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>1,
            'nombre'=>'Ver Clínica',
            'url'=>'admin/clinica',
            'orden'=>1,
            'icono'=>'fa-certificate'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Menú',
            'url'=>'admin/menu/#',
            'orden'=>2,
            'icono'=>'fa-list'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>3,
            'nombre'=>'Ver Menú',
            'url'=>'admin/menu',
            'orden'=>1,
            'icono'=>'fa-th'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>3,
            'nombre'=>'Menú-Rol',
            'url'=>'admin/menu-rol',
            'orden'=>2,
            'icono'=>'fa-tag'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Rol',
            'url'=>'admin/rol/#',
            'orden'=>3,
            'icono'=>'fa-forward'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>6,
            'nombre'=>'Ver Rol',
            'url'=>'admin/rol',
            'orden'=>1,
            'icono'=>'fa-list'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Usuario',
            'url'=>'admin/usuario/#',
            'orden'=>4,
            'icono'=>'fa-users'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>8,
            'nombre'=>'Ver Usuario',
            'url'=>'admin/usuario',
            'orden'=>1,
            'icono'=>'fa-user'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Unidad',
            'url'=>'admin/unidad/#',
            'orden'=>5,
            'icono'=>'fa-th'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>10,
            'nombre'=>'Ver Unidad',
            'url'=>'admin/unidad',
            'orden'=>1,
            'icono'=>'fa-forward'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Personal',
            'url'=>'admin/personal/#',
            'orden'=>6,
            'icono'=>'fa-user-md'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>12,
            'nombre'=>'Ver Personal',
            'url'=>'admin/personal',
            'orden'=>1,
            'icono'=>'fa-eye'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Paciente',
            'url'=>'admin/paciente/#',
            'orden'=>7,
            'icono'=>'fa-users'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>14,
            'nombre'=>'Ver Paciente',
            'url'=>'admin/paciente',
            'orden'=>1,
            'icono'=>'fa-search'
        ]);

        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>1]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>2]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>7]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>8]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>9]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>3]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>4]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>5]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>6]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>10]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>11]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>12]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>13]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>14]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>15]);

        DB::table('personal')->insert([
            'nombre'=>'Wili',
            'apellido'=>'Wonka',
            'ci'=>'1111111',
            'direccion'=>'Final Chuquisaca',
            'celular'=>'7421366',
            'fecha_ing'=>'1994-12-22',
            'unidad_id'=>'2',
            'genero'=>'Hombre'

        ]);
        DB::table('personal')->insert([
            'nombre'=>'Jakelin ',
            'apellido'=>'Canaza',
            'ci'=>'2222222',
            'direccion'=>'Calama',
            'celular'=>'2222222',
            'fecha_ing'=>'2010-03-12',
            'unidad_id'=>'1',
            'genero'=>'Mujer'
        ]);


        $faker=Faker::create();
        for($i=0;$i<1000;$i++){
            DB::table('paciente')->insert([
                'nombre'=>$faker->firstName,
                'apellido_p'=>$faker->lastName,
                'apellido_m'=>$faker->lastName,
                'ci'=>$faker->unique()->numberBetween($min = 1000000, $max = 99999999),
                'direccion'=>$faker->city,
                'celular'=>$faker->unique()->numberBetween($min = 10000, $max = 999999),
                'fecha_nac'=>$faker->dateTimeBetween($startDate = '-100 years', $endDate = 'now'),
                'genero'=>$faker->randomElement(['Hombre', 'Mujer']),
                't_sangre'=>$faker->randomElement(['O negativo', 'O positivo','A negativo','A positivo','B negativo','B positivo','AB negativo','AB positivo',null]),
            ]);
        }
    }
}
