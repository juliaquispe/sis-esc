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
            'mision'=>'Brindar atención médica de excelencia, a través de un equipo humano cálido y calificado, logrando la máxima satisfacción de los pacientes',
            'vision'=>'Crecer hacia adelante, progresar e implementar más atenciones y atender a la mayor parte de la población. Así poder ser reconocidos como zona de influencia por la calidad asistencial, seguridad y satisfacción del paciente',
            'descripcion'=>'La Clínica Santa Teresa de la cuidad de Potosí ya tiene 45 años de funcionalidad, está compuesto por un equipo de profesionales que brindan servicios de salud para ayudar a sus pacientes',
            'color'=>'skin-1',
        ]);

        DB::table('roles')->insert([
            'rol'=>'Administrador',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>1
        ]);
        DB::table('roles')->insert([
            'rol'=>'Médico',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>0
        ]);
        DB::table('roles')->insert([
            'rol'=>'Enfermería',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>0
        ]);
        DB::table('roles')->insert([
            'rol'=>'Oficinista',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>0
        ]);

        DB::table('usuarios')->insert([
            'rol_id'=>1,
            'usuario'=>'admin',
            'nombre'=>'Julia',
            'apellido'=>'Quispe',
            'email'=>'julia@gmail.com',
            'password'=>bcrypt('123456'),
            'estado'=>1 //1=activo
        ]);
        DB::table('usuarios')->insert([
            'rol_id'=>1,
            'usuario'=>'juan',
            'nombre'=>'Juan',
            'apellido'=>'Mamani',
            'email'=>'juan@gmail.com',
            'password'=>bcrypt('123456'),
            'estado'=>1 //1=activo
        ]);
        DB::table('usuarios')->insert([
            'rol_id'=>2,
            'usuario'=>'user2',
            'nombre'=>'usuario2',
            'apellido'=>'dos',
            'email'=>'user2@gmail.com',
            'password'=>bcrypt('123456'),
            'estado'=>1 //1=activo
        ]);
        DB::table('usuarios')->insert([
            'rol_id'=>2,
            'usuario'=>'user3',
            'nombre'=>'usuario3',
            'apellido'=>'tres',
            'email'=>'user3@gmail.com',
            'password'=>bcrypt('123456'),
            'estado'=>0 //1=inactivo
        ]);
        DB::table('unidad')->insert([
            'nombre'=>'Gerencia',
            'sigla'=>'GCIA',
            'descripcion'=>'Encargados de dirijir la Clínica'
        ]);
        DB::table('unidad')->insert([
            'nombre'=>'Unidad Médica',
            'sigla'=>'UM',
        ]);
        DB::table('unidad')->insert([
            'nombre'=>'Unidad de Enfermería',
            'sigla'=>'UENF',
        ]);
        DB::table('unidad')->insert([
            'nombre'=>'Administración',
            'sigla'=>'ADM',
        ]);
        DB::table('unidad')->insert([
            'nombre'=>'Unidad de Apoyo',
            'sigla'=>'APOYO',
        ]);


                DB::table('menu')->insert([
                    'menu_id'=>0,
                    'nombre'=>'Administrador',
                    'url'=>'admin/',
                    'orden'=>1,
                    'icono'=>'fa-plus'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>0,
                    'nombre'=>'Clínica',
                    'url'=>'admin/clinica/#',
                    'orden'=>2,
                    'icono'=>'fa-plus'
                ]);

                DB::table('menu')->insert([
                    'menu_id'=>0,
                    'nombre'=>'Menú',
                    'url'=>'admin/menu/#',
                    'orden'=>3,
                    'icono'=>'fa-list'
                ]);

                DB::table('menu')->insert([
                    'menu_id'=>0,
                    'nombre'=>'Usuario',
                    'url'=>'admin/usuario/#',
                    'orden'=>4,
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
                    'menu_id'=>0,
                    'nombre'=>'Personal',
                    'url'=>'admin/personal/#',
                    'orden'=>6,
                    'icono'=>'fa-user-md'
                ]);

                DB::table('menu')->insert([
                    'menu_id'=>0,
                    'nombre'=>'Paciente',
                    'url'=>'admin/paciente/#',
                    'orden'=>7,
                    'icono'=>'fa-users'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>0,
                    'nombre'=>'Atención',
                    'url'=>'admin/ficha/#',
                    'orden'=>8,
                    'icono'=>'fa-book'
                ]);
                        //Hijos
                        DB::table('menu')->insert([
                            'menu_id'=>2,
                            'nombre'=>'Ver Clínica',
                            'url'=>'admin/clinica',
                            'orden'=>1,
                            'icono'=>'fa-asterisk'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>2,
                            'nombre'=>'Servicios',
                            'url'=>'admin/servicio',
                            'orden'=>2,
                            'icono'=>'fa-asterisk'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>2,
                            'nombre'=>'Reportes',
                            'url'=>'admin/reportes',
                            'orden'=>3,
                            'icono'=>'fa-book'
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
                            'icono'=>'fa-list'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>4,
                            'nombre'=>'Ver Rol',
                            'url'=>'admin/rol',
                            'orden'=>1,
                            'icono'=>'fa-list'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>4,
                            'nombre'=>'Ver Usuarios',
                            'url'=>'admin/usuario',
                            'orden'=>2,
                            'icono'=>'fa-user'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>4,
                            'nombre'=>'Ver Usuarios con Baja',
                            'url'=>'admin/usuario_inactivo',
                            'orden'=>3,
                            'icono'=>'fas fa-ban'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>5,
                            'nombre'=>'Ver Unidad',
                            'url'=>'admin/unidad',
                            'orden'=>1,
                            'icono'=>'fa-forward'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>6,
                            'nombre'=>'Cargo',
                            'url'=>'admin/cargo',
                            'orden'=>1,
                            'icono'=>'fa-play-circle'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>6,
                            'nombre'=>'Ver Personal',
                            'url'=>'admin/personal',
                            'orden'=>2,
                            'icono'=>'fa-eye'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>6,
                            'nombre'=>'Ver Personal Retirado',
                            'url'=>'admin/personal_inactivo',
                            'orden'=>3,
                            'icono'=>'fas fa-ban'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>7,
                            'nombre'=>'Ver Paciente',
                            'url'=>'admin/paciente',
                            'orden'=>1,
                            'icono'=>'fa-search'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>7,
                            'nombre'=>'Ver Paciente con baja',
                            'url'=>'admin/paciente_inactivo',
                            'orden'=>2,
                            'icono'=>'fas fa-ban'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>8,
                            'nombre'=>'Asignar Ficha',
                            'url'=>'admin/ficha',
                            'orden'=>1,
                            'icono'=>'fa-book'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>8,
                            'nombre'=>'Consulta Externa',
                            'url'=>'admin/ficha/consulta',
                            'orden'=>2,
                            'icono'=>'fa-book'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>8,
                            'nombre'=>'Enfermeria',
                            'url'=>'admin/enfermeria',
                            'orden'=>3,
                            'icono'=>'fa-book'
                        ]);
                        DB::table('menu')->insert([
                            'menu_id'=>8,
                            'nombre'=>'Internación',
                            'url'=>'admin/internacion',
                            'orden'=>4,
                            'icono'=>'fa fa-bed'
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
                DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>16]);
                DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>17]);
                DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>18]);
                DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>19]);
                DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>20]);
                DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>21]);
                DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>22]);
                DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>23]);
                DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>24]);
                DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>25]);
                DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>26]);

        DB::table('cargo')->insert([
            'nombre'=>'Gerente',
            'descripcion'=>'Máxima autoridad'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Jefe Médico',
            'descripcion'=>'Supervisor de todos los médicos'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Médico de Planta',
            'descripcion'=>'Médico geneal'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Jefe de enfermería',
            'descripcion'=>'Supervisor de todos los enfermeros y enfemeras'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Enfermero/a de Planta',
            'descripcion'=>'Los que estan a cargo de los pacientes'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Estudiantes de enfermería',
            'descripcion'=>'Estudiantes de Enfermería y/o medicina'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Receocionista',
            'descripcion'=>'Abre las historias clínicas de pacientes de atención ambulatoria, se toman los datos de pacientes'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Operador de Limpieza',
            'descripcion'=>'Esta encargado de la limpieza e higiene del local su labor es continua'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Secretaria de Gerencia',
            'descripcion'=>'La secretaria de gerencia realiza labor de apoyo al director médico y al gerente de la cliníca'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Camillero',
            'descripcion'=>'Persona encargada de transportar enfermos o heridos en camilla'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Chofer',
        ]);

        $faker=Faker::create();
        for($i=0;$i<500;$i++){
            DB::table('personal')->insert([
                'nombre'=>$faker->firstName,
                'apellido'=>$faker->lastName,
                'ci'=>$faker->unique()->numberBetween($min = 1000000, $max = 99999999),
                'direccion'=>$faker->city,
                'celular'=>$faker->unique()->numberBetween($min = 10000, $max = 999999),
                'fecha_ing'=>$faker->dateTimeBetween($startDate = '-20 years', $endDate = 'now'),
                'cargo_id'=>$faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11']),
                'unidad_id'=>$faker->randomElement(['1', '2', '3', '4', '5']),
                'genero'=>$faker->randomElement(['Hombre', 'Mujer']),
            ]);

            DB::table('paciente')->insert([
                'nombre'=>$faker->firstName,
                'apellido_p'=>$faker->lastName,
                'apellido_m'=>$faker->lastName,
                'ci'=>$faker->unique()->numberBetween($min = 1000000, $max = 99999999),
                'direccion'=>$faker->city,
                'celular'=>$faker->unique()->numberBetween($min = 10000, $max = 999999),
                'fecha_nac'=>$faker->dateTimeBetween($startDate = '-100 years', $endDate = 'now'),
                'genero'=>$faker->randomElement(['Hombre', 'Mujer']),
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                //'t_sangre'=>$faker->randomElement(['O negativo', 'O positivo','A negativo','A positivo','B negativo','B positivo','AB negativo','AB positivo',null]),
            ]);
        }
        DB::table('paciente')->insert([
            'nombre'=>'Julia',
            'apellido_p'=>'Quispe',
            'apellido_m'=>'Zurita',
            'ci'=>'10477022',
            'direccion'=>'Final Chuquisaca s/n',
            'celular'=>'74211366',
            'fecha_nac'=>'1997-08-16',
            'genero'=>'Mujer',
            'created_at'=>'1997-08-16',
        ]);

        DB::table('servicio')->insert([
            'nombre'=>'Consulta Externa',
            'descripcion'=>'Atención a todos los pacientes en general'
        ]);
        DB::table('servicio')->insert([
            'nombre'=>'Enfermeria',
            'descripcion'=>'Fomentar el cuidado integral al individuo, familia y comunidad, aplicando el Proceso de Atención de Enfermería a nivel de promoción, prevención, recuperación y rehabilitación.'
        ]);
        $cama=array();
        for($i=0;$i<3;$i++){
            $cama[$i]['orden']=$i+1;
            $cama[$i]["estado"]='libre';
        }
        $cama=json_encode($cama);
        DB::table('servicio')->insert([
            'nombre'=>'Internaciones',
            'descripcion'=>'La sala de corta estancia ofrece el servicio en un ambiente agradable, con infraestructura acorde a la complejidad del problema, también brinda al usuario atención y prevención.',
            'cama'=>$cama
        ]);
        DB::table('servicio')->insert([
            'nombre'=>'Ginecologia',
            'descripcion'=>'Disminuir los riesgos de enfermedad y muerte de la mujer y del producto del embarazo y optimizar el pronóstico de los mismos a través de la oportuna y adecuada atención intrahospitalaria del parto.'
        ]);
    }
}
