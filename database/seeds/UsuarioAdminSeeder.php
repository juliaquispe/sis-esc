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
            'rol_id'=>3,
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
                        // DB::table('menu')->insert([
                        //     'menu_id'=>8,
                        //     'nombre'=>'Asignar Ficha',
                        //     'url'=>'admin/ficha',
                        //     'orden'=>1,
                        //     'icono'=>'fa-book'
                        // ]);
                        DB::table('menu')->insert([
                            'menu_id'=>8,
                            'nombre'=>'Agendación y Fichaje',
                            'url'=>'admin/fichaje',
                            'orden'=>1,
                            'icono'=>'fa-calendar'
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

                DB::table('menu_rol')->insert(['rol_id'=>2,'menu_id'=>7]);
                DB::table('menu_rol')->insert(['rol_id'=>2,'menu_id'=>21]);
                DB::table('menu_rol')->insert(['rol_id'=>2,'menu_id'=>22]);
                DB::table('menu_rol')->insert(['rol_id'=>2,'menu_id'=>8]);
                DB::table('menu_rol')->insert(['rol_id'=>2,'menu_id'=>24]);
                DB::table('menu_rol')->insert(['rol_id'=>2,'menu_id'=>26]);
                DB::table('menu_rol')->insert(['rol_id'=>3,'menu_id'=>7]);
                DB::table('menu_rol')->insert(['rol_id'=>3,'menu_id'=>21]);
                DB::table('menu_rol')->insert(['rol_id'=>3,'menu_id'=>22]);
                DB::table('menu_rol')->insert(['rol_id'=>3,'menu_id'=>8]);
                DB::table('menu_rol')->insert(['rol_id'=>3,'menu_id'=>25]);
                DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>5]);
                DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>17]);
                DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>6]);
                DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>18]);
                DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>19]);
                DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>20]);
                DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>7]);
                DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>21]);
                DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>22]);
                DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>8]);
                DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>23]);

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
        for($i=0;$i<200;$i++){
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
        }
        $faker=Faker::create();
        for($i=0;$i<500;$i++){
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
        // $cama=array();
        // for($i=0;$i<3;$i++){
        //     $cama[$i]['orden']=$i+1;
        //     $cama[$i]["estado"]='libre';
        // }
        // $cama=json_encode($cama);
        DB::table('servicio')->insert([
            'nombre'=>'Internaciones',
            'descripcion'=>'La sala de corta estancia ofrece el servicio en un ambiente agradable, con infraestructura acorde a la complejidad del problema, también brinda al usuario atención y prevención.',
            'cama'=>'[{"orden":1,"estado":"ocupado"},{"orden":2,"estado":"libre"},{"orden":3,"estado":"libre"}]'
        ]);
        DB::table('servicio')->insert([
            'nombre'=>'Ginecologia',
            'descripcion'=>'Disminuir los riesgos de enfermedad y muerte de la mujer y del producto del embarazo y optimizar el pronóstico de los mismos a través de la oportuna y adecuada atención intrahospitalaria del parto.'
        ]);

        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-16 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-16 08:00:00',
            'end'=>'2021-06-16 18:00:00',
            'intervalo'=>30,
            'num_consultas'=>8,
            'horario'=>'[{"[{"orden":1,"hora":"08:00","estado":"ocupado"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"ocupado"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"ocupado"},{"orden":7,"hora":"11:00","estado":"libre"},{"orden":8,"hora":"11:30","estado":"ocupado"}]"}]'
            ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-17 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-17 08:00:00',
            'end'=>'2021-06-17 18:00:00',
            'intervalo'=>30,
            'num_consultas'=>8,
            'horario'=>'[{"[{"orden":1,"hora":"08:00","estado":"libre"},{"orden":2,"hora":"08:30","estado":"ocupado"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"ocupado"},{"orden":6,"hora":"10:30","estado":"libre"},{"orden":7,"hora":"11:00","estado":"libre"},{"orden":8,"hora":"11:30","estado":"libre"}]"}]'
        ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-18 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-18 08:00:00',
            'end'=>'2021-06-18 18:00:00',
            'intervalo'=>30,
            'num_consultas'=>8,
            'horario'=>'[{"[{"orden":1,"hora":"08:00","estado":"libre"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"libre"},{"orden":7,"hora":"11:00","estado":"ocupado"},{"orden":8,"hora":"11:30","estado":"libre"}]"}]'
        ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-19 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-19 08:00:00',
            'end'=>'2021-06-19 18:00:00',
            'intervalo'=>30,
            'num_consultas'=>8,
            'horario'=>'[{"[{"orden":1,"hora":"08:00","estado":"libre"},{"orden":2,"hora":"08:30","estado":"ocupado"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"libre"},{"orden":7,"hora":"11:00","estado":"libre"},{"orden":8,"hora":"11:30","estado":"libre"}]"}]'
        ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-21 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-21 08:00:00',
            'end'=>'2021-06-21 18:00:00',
            'intervalo'=>30,
            'num_consultas'=>20,
            'horario'=>'[{"orden":1,"hora":"08:00","estado":"libre"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"libre"},{"orden":7,"hora":"11:00","estado":"libre"},{"orden":8,"hora":"11:30","estado":"libre"},{"orden":9,"hora":"12:00","estado":"libre"},{"orden":10,"hora":"12:30","estado":"libre"},{"orden":11,"hora":"13:00","estado":"libre"},{"orden":12,"hora":"13:30","estado":"libre"},{"orden":13,"hora":"14:00","estado":"ocupado"},{"orden":14,"hora":"14:30","estado":"ocupado"},{"orden":15,"hora":"15:00","estado":"libre"},{"orden":16,"hora":"15:30","estado":"ocupado"},{"orden":17,"hora":"16:00","estado":"ocupado"},{"orden":18,"hora":"16:30","estado":"libre"},{"orden":19,"hora":"17:00","estado":"libre"},{"orden":20,"hora":"17:30","estado":"libre"}]',
        ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-22 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-22 08:00:00',
            'end'=>'2021-06-22 18:00:00',
            'intervalo'=>30,
            'num_consultas'=>20,
            'horario'=>'[{"orden":1,"hora":"08:00","estado":"ocupado"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"ocupado"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"ocupado"},{"orden":7,"hora":"11:00","estado":"ocupado"},{"orden":8,"hora":"11:30","estado":"libre"},{"orden":9,"hora":"12:00","estado":"libre"},{"orden":10,"hora":"12:30","estado":"libre"},{"orden":11,"hora":"13:00","estado":"libre"},{"orden":12,"hora":"13:30","estado":"libre"},{"orden":13,"hora":"14:00","estado":"libre"},{"orden":14,"hora":"14:30","estado":"libre"},{"orden":15,"hora":"15:00","estado":"libre"},{"orden":16,"hora":"15:30","estado":"libre"},{"orden":17,"hora":"16:00","estado":"libre"},{"orden":18,"hora":"16:30","estado":"libre"},{"orden":19,"hora":"17:00","estado":"libre"},{"orden":20,"hora":"17:30","estado":"libre"}]',
        ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-23 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-23 08:00:00',
            'end'=>'2021-06-23 12:00:00',
            'intervalo'=>30,
            'num_consultas'=>8,
            'horario'=>'[{"orden":1,"hora":"08:00","estado":"ocupado"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"ocupado"},{"orden":7,"hora":"11:00","estado":"libre"},{"orden":8,"hora":"11:30","estado":"libre"}]',
        ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-24 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-24 08:00:00',
            'end'=>'2021-06-24 18:00:00',
            'intervalo'=>30,
            'num_consultas'=>20,
            'horario'=>'[{"orden":1,"hora":"08:00","estado":"ocupado"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"ocupado"},{"orden":7,"hora":"11:00","estado":"libre"},{"orden":8,"hora":"11:30","estado":"libre"},{"orden":9,"hora":"12:00","estado":"libre"},{"orden":10,"hora":"12:30","estado":"libre"},{"orden":11,"hora":"13:00","estado":"libre"},{"orden":12,"hora":"13:30","estado":"libre"},{"orden":13,"hora":"14:00","estado":"libre"},{"orden":14,"hora":"14:30","estado":"libre"},{"orden":15,"hora":"15:00","estado":"libre"},{"orden":16,"hora":"15:30","estado":"libre"},{"orden":17,"hora":"16:00","estado":"libre"},{"orden":18,"hora":"16:30","estado":"libre"},{"orden":19,"hora":"17:00","estado":"libre"},{"orden":20,"hora":"17:30","estado":"libre"}]',
        ]);


        DB::table('ficha')->insert(['paciente_id'=>501,'servicio_id'=>1,'fecha'=>'2021-06-16','hora'=>'08:00:00','estado'=>1,'turno'=>1]);
        DB::table('ficha')->insert(['paciente_id'=>17,'servicio_id'=>1,'fecha'=>'2021-06-16','hora'=>'09:00:00','estado'=>0,'turno'=>3]);
        DB::table('ficha')->insert(['paciente_id'=>87,'servicio_id'=>1,'fecha'=>'2021-06-16','hora'=>'10:30:00','estado'=>1,'turno'=>6]);
        DB::table('ficha')->insert(['paciente_id'=>80,'servicio_id'=>1,'fecha'=>'2021-06-16','hora'=>'11:30:00','estado'=>0,'turno'=>8]);
        DB::table('ficha')->insert(['paciente_id'=>67,'servicio_id'=>1,'fecha'=>'2021-06-17','hora'=>'08:30:00','estado'=>1,'turno'=>2]);
        DB::table('ficha')->insert(['paciente_id'=>89,'servicio_id'=>1,'fecha'=>'2021-06-17','hora'=>'10:30:00','estado'=>0,'turno'=>6]);
        DB::table('ficha')->insert(['paciente_id'=>400,'servicio_id'=>1,'fecha'=>'2021-06-18','hora'=>'11:00:00','estado'=>1,'turno'=>7]);
        DB::table('ficha')->insert(['paciente_id'=>444,'servicio_id'=>1,'fecha'=>'2021-06-19','hora'=>'08:30:00','estado'=>0,'turno'=>2]);
        DB::table('consulta')->insert([
            'ficha_id'=>1,
            'motivo'=>'Dolor de garganta y tos',
            'sintoma'=>"Fiebre\nVomito",
            'diagnostico'=>'Resfrió',
            'doctor'=>'Dr. Benigno Gutierrez',
        ]);
        DB::table('signos_vitales')->insert([
            'consulta_id'=>1,
            'paciente_id'=>501,
            'altura'=>155,
            'peso'=>46,
            'temperatura'=>36,
            'p_a'=>'120/60',
            'f_c'=>56,
            'f_r'=>13,
            'estado'=>1
        ]);
        DB::table('receta')->insert([
            'consulta_id'=>1,
            'receta'=>"-->  6 Unids    de:  paracetamol   TOMAR:  1  CADA:   8  Horas    Durante:  2  Días \n-->  6 Unids    de:  ibuprofeno   TOMAR:  1  CADA:   8  Horas    Durante:  2  Días \n-->Tapsin Noche",
            'indicacion'=>'Tapsin noche tomar antes de dormir'
        ]);

        DB::table('consulta')->insert([
            'ficha_id'=>3,
            'motivo'=>'Dolor de estomago',
            'sintoma'=>"Vomitos",
            'diagnostico'=>'Indigestión',
            'doctor'=>'Dr. Benigno Gutierrez',
        ]);
        DB::table('signos_vitales')->insert([
            'consulta_id'=>2,
            'paciente_id'=>87,
            'altura'=>159,
            'peso'=>46,
            'temperatura'=>36,
            'p_a'=>'120/80',
            'f_c'=>58,
            'f_r'=>13,
            'estado'=>1
        ]);
        DB::table('receta')->insert([
            'consulta_id'=>2,
            'receta'=>"-->  6 Unids    de:  paracetamol   TOMAR:  1  CADA:   8  Horas    Durante:  2  Días \n-->  6 Unids    de:  ibuprofeno   TOMAR:  1  CADA:   8  Horas    Durante:  2  Días \n-->Tapsin Noche",
            'indicacion'=>'Tapsin noche tomar antes de dormir'
        ]);
        DB::table('gabinete')->insert([
            'consulta_id'=>2,
            'estudio_g'=>"Radigrafía",
            'indicacion_g'=>'En la parte abdominal'
        ]);

        DB::table('consulta')->insert([
            'ficha_id'=>5,
            'motivo'=>'Dolor de garganta y tos',
            'sintoma'=>"Fiebre",
            'diagnostico'=>'Resfrió',
            'doctor'=>'Dr. Benigno Gutierrez',
        ]);
        DB::table('signos_vitales')->insert([
            'consulta_id'=>3,
            'paciente_id'=>67,
            'altura'=>164,
            'peso'=>63,
            'temperatura'=>38,
            'p_a'=>'120/80',
            'f_c'=>56,
            'f_r'=>13,
            'estado'=>1
        ]);
        DB::table('receta')->insert([
            'consulta_id'=>3,
            'receta'=>"-->  6 Unids    de:  paracetamol   TOMAR:  1  CADA:   8  Horas    Durante:  2  Días \n-->  6 Unids    de:  ibuprofeno   TOMAR:  1  CADA:   8  Horas    Durante:  2  Días",
        ]);

        DB::table('consulta')->insert([
            'ficha_id'=>7,
            'motivo'=>'Dolor de garganta y tos',
            'sintoma'=>"Fiebre\nVomito",
            'diagnostico'=>'Resfrió',
            'doctor'=>'Dr. Benigno Gutierrez',
        ]);
        DB::table('signos_vitales')->insert([
            'consulta_id'=>4,
            'paciente_id'=>400,
            'altura'=>164,
            'peso'=>63,
            'temperatura'=>38,
            'p_a'=>'120/80',
            'f_c'=>56,
            'f_r'=>13,
            'estado'=>1
        ]);
        DB::table('receta')->insert([
            'consulta_id'=>4,
            'receta'=>"-->  6 Unids    de:  paracetamol   TOMAR:  1  CADA:   8  Horas    Durante:  2  Días \n-->  6 Unids    de:  ibuprofeno   TOMAR:  1  CADA:   8  Horas    Durante:  2  Días \n-->Tapsin Noche",
            'indicacion'=>'Tapsin noche tomar antes de dormir'
        ]);

        DB::table('ficha')->insert(['paciente_id'=>85,'servicio_id'=>1,'fecha'=>'2021-06-21','hora'=>'14:00:00','estado'=>0,'turno'=>13]);
        DB::table('ficha')->insert(['paciente_id'=>53,'servicio_id'=>1,'fecha'=>'2021-06-21','hora'=>'14:30:00','estado'=>0,'turno'=>14]);
        DB::table('ficha')->insert(['paciente_id'=>148,'servicio_id'=>1,'fecha'=>'2021-06-21','hora'=>'15:30:00','estado'=>0,'turno'=>16]);
        DB::table('ficha')->insert(['paciente_id'=>1,'servicio_id'=>1,'fecha'=>'2021-06-21','hora'=>'16:00:00','estado'=>0,'turno'=>17]);

        DB::table('ficha')->insert(['paciente_id'=>10,'servicio_id'=>1,'fecha'=>'2021-06-22','hora'=>'08:00:00','estado'=>0,'turno'=>1]);
        DB::table('ficha')->insert(['paciente_id'=>47,'servicio_id'=>1,'fecha'=>'2021-06-22','hora'=>'09:00:00','estado'=>0,'turno'=>3]);
        DB::table('ficha')->insert(['paciente_id'=>170,'servicio_id'=>1,'fecha'=>'2021-06-22','hora'=>'10:30:00','estado'=>0,'turno'=>6]);
        DB::table('ficha')->insert(['paciente_id'=>22,'servicio_id'=>1,'fecha'=>'2021-06-22','hora'=>'11:00:00','estado'=>0,'turno'=>7]);

        DB::table('ficha')->insert(['paciente_id'=>501,'servicio_id'=>1,'fecha'=>'2021-06-23','hora'=>'08:00:00','estado'=>0,'turno'=>1]);
        DB::table('ficha')->insert(['paciente_id'=>352,'servicio_id'=>1,'fecha'=>'2021-06-23','hora'=>'10:30:00','estado'=>0,'turno'=>6]);
            //ENFERMERIA
        $faker=Faker::create();
            for($i=0;$i<20;$i++){ //20 Curaciones
                $fecha=$faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now');
                $fecha=$fecha->format('Y-m-d');
                DB::table('enfermeria')->insert([
                    'fecha'=>$fecha,
                    'paciente_id'=>$faker->unique()->numberBetween($min = 1, $max = 100),
                    'detalles_c'=>$faker->randomElement(['cambio de vendas', 'limpieza de herida','costura menor','retiro de vendas', 'curación menor']),
                    'atencion_c'=>1,
                ]);
                DB::table('enfermeria')->insert([ //20 Inyectable
                    'fecha'=>$fecha,
                    'paciente_id'=>$faker->unique()->numberBetween($min = 1, $max = 100),
                    'tipo_i'=>$faker->randomElement(['Intramuscular', 'Intravenosa','Intradérmica','Subcutánea']),
                    'medicamento_i'=>$faker->randomElement(['Lidocaína', 'Naloxona','Omeprezol','Cloruro potásico', 'Salbutamol']),
                    'atencion_i'=>1,
                ]);
            }
            for($i=0;$i<10;$i++){
                $fecha=$faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now');
                $fecha=$fecha->format('Y-m-d');
                DB::table('enfermeria')->insert([ //10 curaciones e inyectable
                    'fecha'=>$fecha,
                    'paciente_id'=>$faker->unique()->numberBetween($min = 1, $max = 100),
                    'detalles_c'=>$faker->randomElement(['cambio de vendas', 'limpieza de herida','costura menor','retiro de vendas', 'curación menor']),
                    'atencion_c'=>1,
                    'tipo_i'=>$faker->randomElement(['Intramuscular', 'Intravenosa','Intradérmica','Subcutánea']),
                    'medicamento_i'=>$faker->randomElement(['Lidocaína', 'Naloxona','Omeprezol','Cloruro potásico', 'Salbutamol']),
                    'atencion_i'=>1,
                ]);
            }
            for($i=0;$i<5;$i++){
                $fecha=$faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now');
                $fecha=$fecha->format('Y-m-d');
                DB::table('enfermeria')->insert([ //5 curaciones e inyectable
                    'fecha'=>$fecha,
                    'paciente_id'=>$faker->unique()->numberBetween($min = 1, $max = 100),
                    'tipo_s'=>$faker->randomElement(['Solucion salina normal', 'Solucion salina hipertonica','Solucion de dextrosa al 5%','Suero natural', 'Suero glucosalino']),
                    'atencion_s'=>1,
                ]);
            }
            //INTERNACION
            DB::table('internacion')->insert([ //5 curaciones e inyectable
                'paciente_id'=>87,
                'consulta_id'=>2,
                'cama'=>1,
                'fecha_ingreso'=>'2021-06-16',
                'contacto_emergencia'=>'74211562',
                'motivo_i'=>'Seguimiento de Estreñimiento',
                'e_fisico'=>'Normal',
                'craneo_cara'=>'Ojos redondos nariz curveada',
                'cuello_tiroides'=>'S/P',
                'torax'=>'S/P',
                'genitales'=>'S/P',
                'columna'=>'S/P',
                'e_neurologico'=>'S/P',
                'impresion_d'=>"1.-\n2.-\n 3.-",
                'conducta'=>'S/P',
                'fecha_salida'=>'2021-06-21',
                'diagnostico_salida'=>'Paciente se encuentra en condiciones optimos',
                'tratamiento_realizado'=>'Seguimiento realizado sobre el estreñimiento',
                'nombre_resp'=>'Zahira Dayun',
                'ci_resp'=>'10477021',
                'testigo'=>'Juan Martinez',
                'estado'=>'1',
            ]);

            DB::table('internacion')->insert([ //5 curaciones e inyectable
                'paciente_id'=>501,
                'consulta_id'=>1,
                'cama'=>1,
                'fecha_ingreso'=>'2021-06-16',
                'contacto_emergencia'=>'74211562',
                'motivo_i'=>'Resfrio fuerte',
                'e_fisico'=>'Normal',
                'craneo_cara'=>'Ojos llorosos nariz curveada',
                'cuello_tiroides'=>'S/P',
                'torax'=>'S/P',
                'genitales'=>'S/P',
                'columna'=>'S/P',
                'e_neurologico'=>'S/P',
                'impresion_d'=>"1.-\n2.-\n 3.-",
                'conducta'=>'S/P',
                'estado'=>'0',
            ]);
    }
}
