<!DOCTYPE html>
<html>
    <head>
        <title>Exámen Físico</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <table align="center" width="100%">
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td align="center" width="20%" colspan="2">
                                <img src="data:image/png;base64,{{$image}}" height="90px" width="60px"/>
                            </th>
                            <td width="80%" align="center">
                                <span style="color: rgb(8, 8, 8)"><b>{{$clinica->nombre}}</b></span><br>
                                <span><i>Al servicio de la población Potosina</i></span><br>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <th colspan="4">NOTA DE ALTA SOLICITADA</th>
            </tr>
            <tr>
                <td align="center" width="15%"><b>Fecha:</b></td>
                <td align="left" width="35%">{{$internacion->fecha_salida}}</td>
                <td align="right" width="40%"><b>Hora:</b></td>
                <td align="left" width="10%"></td>
            </tr>
        </table>
        &nbsp;&nbsp;<span><b><u>Datos del Paciente</u></b></span>
        <table width="90%" align="center">
            <tr align="center">
                <td width="30%">{{$internacion->paciente->nombre}}</td>
                <td width="30%">{{$internacion->paciente->apellido_p}}</td>
                <td width="30%"> {{$internacion->paciente->apellido_m}}</td>
            </tr>
            <tr>
                <th align="center"><b>Nombre:</b></th>
                <th align="center"><b>Apellido Paterno:</b></th>
                <th align="center"><b>Apellido Materno:</b></th>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <th width="25%">Fecha de Ingreso:</th>
                <td width="25%">{{$internacion->fecha_ingreso}}</td>
                <th width="30%">Fecha de Salida:</th>
                <td width="20%">{{$internacion->fecha_salida}}</td>
            </tr>
        </table>
        <table  width="100%" border="1">
            <tr>
                <td><b>Diagnósticos de Ingreso</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->motivo_i);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor <br>
                </td>
            </tr>
            <tr>
                <td><b>Diagnósticos de Salida</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->craneo_cara);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor <br>
                </td>
            </tr>
            <tr>
                <td><b>Tratamiento Realizado</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->tratamiento_realizado);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor <br>
                </td>
            </tr>
        </table><br>
        <table width="90%" align="center" border="1">
            <tr>
                <td align="justify">
                    El suscrito solicita <b>ALTA</b> contra la opinión de los médicos conociendo y habiendo sido advertido de los RIESGOS QUE IMPLICA, LOS CUALES SE ME  EXPLICÓ CON DETALLE por parte del personal de salud, DESCARGO DE TODA RESPONSABILIDAD al equipo médico, personal de enfermería y admininistrativo de la <b>CLÍNICA SANTA TERESA:</b> Por las consecuencias que de ello puede resultar. <br>
                    <table width="100%" align="center">
                        <tr>
                            <td align="center" colspan="3"><b><u>Datos del Solicitante</u></b></td>
                        </tr>
                        <tr>
                            <td width="28%"><b>Nombres y Apellidos:</b></td>
                            <td width="30%">{{$internacion->nombre_resp}}</td>
                            <td width="42%"></td>
                        </tr>
                        <tr>
                            <td><b>Número de CI:</b></td>
                            <td>{{$internacion->ci_resp}}</td>
                            <td rowspan="2">
                                <table width="100%" align="center" border="1">
                                    <tr>
                                        <td height="7%"></td>
                                    </tr>
                                    <tr>
                                        <th>Huella</th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Firma:</b></td>
                            <td>....................</td>
                        </tr>
                        <tr>
                            <td><b>Familiar - Testigo:</b></td>
                            <td>{{$internacion->testigo}}</td>
                            <td rowspan="2">
                                <table width="100%" align="center" border="1">
                                    <tr>
                                        <td height="7%"></td>
                                    </tr>
                                    <tr>
                                        <th>Huella</th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Firma:</b></td>
                            <td>....................</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br><br><br><br>
        <table  width="100%" align="center">
            <tr>
                <th>
                    SELLO Y FIRMA
                </th>
            </tr>
        </table><br><br>
    </body>
</html>
