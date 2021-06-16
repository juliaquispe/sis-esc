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
                                <span><b>{{$clinica->nombre}}</b></span><br>
                                <span><i>Cuida tu salud al servicio de la población Potosina</i></span><br>
                                <span style="color: rgb(24, 4, 4)" style="text-align: right"><b>EXÁMEN FÍSICO</b></span>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr align="left">
                <td width="15%" align="right"><b>Paciente:</b></td>
                <td width="25%">{{$internacion->paciente->nombre}} {{$internacion->paciente->apellido_p}} {{$internacion->paciente->apellido_m}}</td>
                <td width="10%" align="right"><b>Edad:</b></td>
                <td width="10%">{{$edad=MyHelper::Edad_Paciente($internacion->paciente->fecha_nac,"index")}}</td>
                <td width="20%" align="right"><b>Fecha de Ingreso:</b></td>
                <td width="20%">{{$internacion->fecha_ingreso}}</td>
            </tr>
        </table>
        <table width="100%" border="1">
            <tr>
                <th colspan="6" style="text-align: center">Signos Vitales</th>
            </tr>
            <tr>
                <th style="text-align: center" width="14%">Altura</th>
                <th style="text-align: center" width="14%">Peso</th>
                <th style="text-align: center" width="16%">Temperatura</th>
                <th style="text-align: center" width="14%">P.A.</th>
                <th style="text-align: center" width="14%">F.C.</th>
                <th style="text-align: center" width="14%">F.R.</th>
            </tr>
                <tr>
                <td style="text-align: center">
                    @if ($signos_vitales->altura==null)
                        <FONT COLOR='red'>Sin Registro</FONT>
                    @else
                        {{$signos_vitales->altura}} cm
                    @endif
                </td>
                <td style="text-align: center">
                    @if ($signos_vitales->peso==null)
                        <FONT COLOR='red'>Sin Registro</FONT>
                    @else
                        {{$signos_vitales->peso}} kg
                    @endif
                </td>
                <td style="text-align: center">
                    @if ($signos_vitales->temperatura==null)
                        <FONT COLOR='red'>Sin Registro</FONT>
                    @else
                        {{$signos_vitales->temperatura}} °C
                    @endif
                </td>
                <td style="text-align: center">
                    @if ($signos_vitales->p_a==null)
                        <FONT COLOR='red'>Sin Registro</FONT>
                    @else
                        {{$signos_vitales->p_a}} mmHg
                    @endif
                </td>
                <td style="text-align: center">
                    @if ($signos_vitales->f_c==null)
                        <FONT COLOR='red'>Sin Registro</FONT>
                    @else
                        {{$signos_vitales->f_c}} lat/min
                    @endif
                </td>
                <td style="text-align: center">
                    @if ($signos_vitales->f_r==null)
                        <FONT COLOR='red'>Sin Registro</FONT>
                    @else
                        {{$signos_vitales->f_r}} r/min
                    @endif
                    {{$signos_vitales->f_r}}</td>
            </tr>
        </table><br>
        <table  width="100%" border="1">
            <tr>
                <td><b><u>Exámen Físico General</u> (Conciencia, Psiquismo, Estado Nutricional)</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->motivo_i);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b><u>Exámen Físico Regional</u></b><br>
                    <b>Cráneo y Cara (Ojos, Oidos, Nariz, Boca, Faringe)</b>
                </td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->craneo_cara);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b>Cuello y Tiroides</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->cuello_tiroides);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b>Tórax, Mama, Cardiopulmonar, Abdomen</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->torax);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b>Genitales, Urinario, Rectal</b>
                </td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->genitales);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b>Columna Vertebral y Extremidades</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->columna);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b><u>Exámen Neurológico</u></b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->e_neurologico);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b>Impresión Diagnóstica</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->impresion_d);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b>Conducta</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->conducta);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor <br>
                </td>
            </tr>
        </table><br><br>
        <table  width="100%" align="center">
            <tr>
                <th>
                    SELLO Y FIRMA
                </th>
            </tr>
        </table><br><br>

        @if($fotos!=null)
            @foreach ($fotos as $foto)
                <div style="page-break-after:always;"></div>
                <table  width="100%" align="center">
                    <tr>
                        <th>
                            Hoja de Evolución
                        </th>
                    </tr>
                    <tr>
                        <th>
                            @php
                                $image = base64_encode(file_get_contents(public_path("storage/Datos/Internacion/Foto/$foto->foto")));
                            @endphp
                            <img src="data:image/png;base64,{{$image}}" height="870px" width="630px"/>
                        </th>
                    </tr>
                </table>
            @endforeach
        @endif
        @if ($internacion->nombre_resp==null)
            <div style="page-break-after:always;"></div>
            <span>autorizado por medico</span>
        @else
            <div style="page-break-after:always;"></div>
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
        @endif
    </body>
</html>
