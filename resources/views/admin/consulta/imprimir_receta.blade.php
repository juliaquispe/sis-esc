<!DOCTYPE html>
<html>
    <head>
        <title>Receta Médica</title>
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
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
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
            <h3 style="text-align: center"><FONT COLOR='#0f0fa0'><u>RECETA MÉDICA</u></FONT></h3>
            <table  width="100%" border="1">
                <tr style="background:rgb(192, 221, 255)">
                    <th>
                        <span>MEDICAMENTOS</span>
                    </th>
                </tr>
                <tr>
                    @php
                        $vector = explode("\n", $receta->receta);
                        $contador=count($vector);
                    @endphp
                    <td>
                        @for ($i=0;$contador>$i;$i++)
                            {{$vector[$i]}}<br>
                        @endfor
                    </td>
                </tr>
            </table>
            <table  width="100%" border="1">
                <tr style="background:rgb(192, 221, 255)">
                    <th>
                        Instrucciones Médicas
                    </th>
                </tr>
                <tr>
                    <td>{{$receta->indicacion}}</td>
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
