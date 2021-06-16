<?php

use App\Models\Admin\Clinica;
use App\Models\Admin\Consulta;
use App\Models\Admin\Paciente;
use App\Models\Admin\Servicio;
use App\Models\Admin\Usuario;

if (!function_exists('getMenuActivo')) {
    function getMenuActivo($ruta)
    {
        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'active';
        } else {
            return '';
        }
    }
}
class MyHelper {
    public static function Datos_Clinica(){
        $clinica=Clinica::findOrFail(1);
        return $clinica;
    }

    public static function Edad_Paciente($fecha, $aux) {
        $hoy = new \DateTime();
        $cumpleanos = new \DateTime($fecha);
        $diferencia = $hoy->diff($cumpleanos);
        $y=' año ';
        $m=' mes ';
        $d=' día ';
        if($diferencia->y!=1)
            $y=' años ';
        if($diferencia->m!=1)
            $m=' meses ';
        if($diferencia->d!=1)
            $d=' días ';

        if($aux=="index"){
            if($diferencia->y>0)
                $edad=$diferencia->y.$y;
            else
                if($diferencia->m>0)
                    $edad=$diferencia->m.$m;
                else
                    $edad=$diferencia->d.$d;
            return $edad;
        }
        else //cualquier valor diferente de index
            if( $diferencia->y==0)
                if( $diferencia->m==0)
                    $edad=$diferencia->d.$d;
                else
                    if($diferencia->d==0)
                    $edad= $diferencia->m.$m;
                    else
                    $edad= $diferencia->m.$m."y ".$diferencia->d.$d;
            else
                if( $diferencia->m==0)
                    if($diferencia->d==0)
                        $edad=$diferencia->y;
                    else
                        $edad=$diferencia->y . $y."y ".$diferencia->d.$d;
                else
                    if($diferencia->d==0)
                    $edad=$diferencia->y . $y.$edad= $diferencia->m.$m;
                    else
                    $edad=$diferencia->y . $y.$edad= $diferencia->m.$m."y ".$diferencia->d.$d;
            return $edad;
    }

    public static function Datos_Paciente($id){
        $paciente=Paciente::findOrFail($id);
        return $paciente;
    }

    public static function Datos_Servicio($id){
        $servicio=Servicio::findOrFail($id);
        return $servicio;
    }

    public static function Usuarios_Pendientes(){
        $usuarios=Usuario::where('estado',2)->get();
        return $usuarios;
    }

    public static function num_expediente($id){
        $length = 4;
        $char = 0;
        $type = 'd';
        $format = "%{$char}{$length}{$type}";
        $num=sprintf($format, $id);
        return $num;
    }

    public static function Diferencia_inicio_fin($fecha_i, $fecha_f, $aux) {
        $fecha_fin = new \DateTime($fecha_f);
        $fecha_ini = new \DateTime($fecha_i);
        $diferencia = $fecha_fin->diff($fecha_ini);
        $y=' Año ';
        $m=' Mes ';
        $d=' Día ';
        if($diferencia->y!=1)
            $y=' Años ';
        if($diferencia->m!=1)
            $m=' Meses ';
        if($diferencia->d!=1)
            $d=' Días ';

        if($aux=="index"){
            if($diferencia->y>0)
                $edad=$diferencia->y.$y;
            else
                if($diferencia->m>0)
                    $edad=$diferencia->m.$m;
                else
                    $edad=$diferencia->d.$d;
            return $edad;
        }
        else //cualquier valor diferente de index
            if( $diferencia->y==0)
                if( $diferencia->m==0)
                    $edad=$diferencia->d.$d;
                else
                    if($diferencia->d==0)
                    $edad= $diferencia->m.$m;
                    else
                    $edad= $diferencia->m.$m."y ".$diferencia->d.$d;
            else
                if( $diferencia->m==0)
                    if($diferencia->d==0)
                        $edad=$diferencia->y;
                    else
                        $edad=$diferencia->y . $y."y ".$diferencia->d.$d;
                else
                    if($diferencia->d==0)
                    $edad=$diferencia->y . $y.$edad= $diferencia->m.$m;
                    else
                    $edad=$diferencia->y . $y.$edad= $diferencia->m.$m."y ".$diferencia->d.$d;
            return $edad;
    }
}




