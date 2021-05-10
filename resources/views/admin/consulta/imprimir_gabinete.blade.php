<!DOCTYPE html>
<html>
    <head>
        <title>Estudio de Gabinte</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <table border="1" align="center" width="100%">
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <th align="center" width="20%" colspan="2">
                                <img src="data:image/png;base64,{{$image}}" height="110px" width="80px"/>
                            </th>
                            <th width="80%">
                                <h2 style="color: rgb(92, 5, 5)"><b>{{$clinica->nombre}}</b></h2>
                                <span style="color: rgb(121, 9, 9)" style="text-align: right"><b>Dirección: </b>{{$clinica->direccion}}</span>
                                <span style="color: rgb(73, 5, 10)"> <b>Contactos: </b>{{$clinica->telefono}}  {{$clinica->contacto_1}}  {{$clinica->contacto_2}}</span>
                            </th>
                        </tr> <br>
                    </table>
                </td>
            </tr>
        </table><br>
        <table  width="100%" border="1">
            <tr style="background:rgb(195, 198, 204)">
                <th width="40%">
                    Paciente
                </th>
                <th width="20%">
                    Edad
                </th>
                <th width="20%">
                    CI
                </th>
                <th width="20%">
                    Fecha
                </th>
            </tr>
            <tr>
                <td align="center">
                    {{$ficha->paciente->nombre}} {{$ficha->paciente->apellido_p}} {{$ficha->paciente->apellido_m}}
                </td>
                <td align="center">
                    {{$edad=MyHelper::Edad_Paciente($ficha->paciente->fecha_nac,"index")}}
                </td>
                <td align="center">
                    {{$ficha->paciente->ci}}
                </td>
                <td align="center">
                    {{$ficha->fecha}}
                </td>
            </tr>
        </table>
        <h2 style="text-align: center"><FONT COLOR='#0f0fa0'><u>Estudio de Gabinete</u></FONT></h2>
        <table width="100%" border="1">
            <tr style="background:rgb(179, 217, 231)">
                <td style="text-align: center"><b>Tipo de Estudio</b>
                </td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $gabinete->estudio_g);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor <br>
                </td>
            </tr>
            <tr style="background:rgb(179, 217, 231)">
                <td style="text-align: center"><b>Indicación</b>
                </td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $gabinete->indicacion_g);
                    $contador=count($vector);
                @endphp
                <td>
                    @if ($gabinete->indicacion_g==null)
                        {{$gabinete->indicacion_g}} <br>
                    @else
                        @for ($i=0;$contador>$i;$i++)
                            -{{$vector[$i]}}<br>
                        @endfor <br>
                    @endif

                </td>
            </tr>
        </table>
        <br><br><br><br>
        <table  width="100%" align="center">
            <tr>
                <th>
                    {{$consulta->doctor}}
                </th>
            </tr>
        </table><br><br>
    </body>
</html>
