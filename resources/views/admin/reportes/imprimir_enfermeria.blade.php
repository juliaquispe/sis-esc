<!DOCTYPE html>
<html>
    <head>
        <title>Reporte de Enfermeria</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <table align="center" width="100%">
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <th align="center" width="20%" colspan="2">
                                <img src="data:image/png;base64,{{$image}}" height="110px" width="80px"/>
                            </th>
                            <th width="80%">
                                <h2 style="color: rgb(53, 17, 17)"><b>{{$clinica->nombre}}</b></h2>
                                <span style="color: rgb(8, 6, 31)" style="text-align: right"><b>Dirección: </b>{{$clinica->direccion}}</span>
                                <span style="color: rgb(53, 17, 17)"> <b>Contactos: </b>{{$clinica->telefono}}  {{$clinica->contacto_1}}  {{$clinica->contacto_2}}</span>
                            </th>
                        </tr> <br>
                    </table>
                </td>
            </tr>
        </table>
        <hr>
        <table  width="100%">
            <tr>
                <th width="50%" align="left">
                    Reporte de Enfermería - {{$titulo}}
                </th>
                @php
                    $aux = new \DateTime();
                    $aux=$aux->format('Y-m-d');
                @endphp

                <td width="50%" align="right">
                    Fecha de Impresión: {{$aux}}
                </td>
            </tr>
        </table>
        <hr>
        <h3 style="text-align: center">Información del Reporte</h3>
        <hr>
        <table width="100%">
            <tr>
                <td style="text-align: center">
                    @if ($fecha_esp==null)
                        Generado: <b>Desde</b> "{{$fecha_ini}}" &nbsp;&nbsp;&nbsp; <b>Hasta</b> "{{$fecha_fin}}"
                    @else
                        Perteneciente a la fecha: &nbsp;<b> "{{$fecha_esp}}"</b>
                    @endif
                </td>
            </tr>
        </table>
        <hr>
        <table  align="center">
            @php
                $contador=1;
                $curacion=0;
                $inyectable=0;
                $suero=0;
            @endphp
            @if ($fecha_esp==null)
                <tr>
                    <td>
                        <b>Periodo:</b>{{$diferencia= MyHelper::Diferencia_inicio_fin($fecha_ini, $fecha_fin,"completo")}}</b>
                    </td>
                </tr>
            @endif
        </table>
        <hr>
        <table align="center" width="100%">
            <tr>
                <th width="10%">Nro</th>
                <th width="20%">Fecha</th>
                <th width="30%">Nombres y Apellidos</th>
                <th width="10%">Edad</th>
                <th width="30%">Tipo de Atención</th>
            </tr>
            @foreach ($datos as $dato)
                @php
                    $cadena="";
                @endphp
                <tr align="center">
                    <td>{{$contador}}</td>
                    <td>{{$dato->fecha}}</td>
                    <td align="left">{{$dato->nombre}} {{$dato->apellido}}</td>
                    <td>{{$edad= MyHelper::Edad_Paciente($dato->fecha_nac,"index")}}</td>
                    <td>
                        @if ($titulo=="Curaciones")
                            Curación
                        @else
                            @if ($titulo=="Inyectables")
                                Inyectable
                            @else
                                @if ($titulo=="Sueros")
                                    Suero
                                @else
                                    @if ($dato->atencion_c==1)
                                        @php $curacion++; $cadena=$cadena."-Curación " @endphp
                                    @endif
                                    @if ($dato->atencion_i==1)
                                        @php $inyectable++; $cadena=$cadena."-Inyectable " @endphp
                                    @endif
                                    @if ($dato->atencion_s==1)
                                        @php $suero++; $cadena=$cadena."-Suero " @endphp
                                    @endif
                                    {{$cadena}}
                                @endif
                            @endif
                        @endif
                    </td>
                </tr>
                @php
                    $contador++;
                @endphp
            @endforeach
        </table>
        <hr>
        <table align="center">
            @if ($titulo=="Todas")
                <tr>
                    <td align="center">
                        Total de Atenciones Prestadas: <b>"{{$curacion+$inyectable+$suero}}"</b>&nbsp;&nbsp;&nbsp; Curaciones: <b>"{{$curacion}}"</b>&nbsp;&nbsp;&nbsp; Inyectables: <b>"{{$inyectable}}"</b> Sueros: <b>"{{$suero}}"</b>
                    </td>
                </tr>
            @endif

        </table>
    </body>
</html>
