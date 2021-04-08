<?php

use App\Models\Admin\Clinica;

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
                    $edad= $diferencia->m.$m."y ".$diferencia->d.$d;
            else
                if( $diferencia->m==0)
                    $edad=$diferencia->y . $y."y ".$diferencia->d.$d;
                else
                    $edad=$diferencia->y . $y.$edad= $diferencia->m.$m."y ".$diferencia->d.$d;
            return $edad;
    }
}




