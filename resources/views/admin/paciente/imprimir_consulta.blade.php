<!DOCTYPE html>
<html>
    <head>
        <title>Consulta Médica</title>
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
            <h2 style="text-align: center"><FONT COLOR='#0f0fa0'><u>Consuta Médica</u></FONT></h2>
            <table width="100%" border="1">
                <tr style="text-align: center">
                    <td colspan="6" style="background:rgb(179, 217, 231)"><b>SIGNOS VITALES</b></td>
                </tr>
                <tr>
                    <th style="text-align: center" width="14%">Altura</th>
                    <th style="text-align: center" width="14%">Peso</th>
                    {{-- <th style="text-align: center" width="14%">IMC</th> --}}
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
                    {{-- <td style="text-align: center">{{}}</td> --}}
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
                    </td>
                </tr>
            </table><br>
            <table width="100%" border="1">
                <tr style="background:rgb(179, 217, 231)">
                    <td style="text-align: center"><b>Motivo</b>
                    </td>
                </tr>
                <tr>
                    @php
                        $vector = explode("\n", $consulta->motivo);
                        $contador=count($vector);
                    @endphp
                    <td>
                        @for ($i=0;$contador>$i;$i++)
                            -{{$vector[$i]}} <br>
                        @endfor <br>
                    </td>
                </tr>
                <tr style="background:rgb(179, 217, 231)">
                    <td style="text-align: center"><b>Síntoma</b>
                    </td>
                </tr>
                <tr>
                    @php
                        $vector = explode("\n", $consulta->sintoma);
                        $contador=count($vector);
                    @endphp
                    <td>
                        @if ($consulta->sintoma==null)
                            {{$consulta->sintoma}} <br>
                        @else
                            @for ($i=0;$contador>$i;$i++)
                                -{{$vector[$i]}}<br>
                            @endfor <br>
                        @endif

                </td>
                </tr>
                <tr style="background:rgb(179, 217, 231)">
                    <td style="text-align: center"><b>Diagnóstico</b>
                    </td>
                </tr>
                <tr>
                    @php
                        $vector = explode("\n", $consulta->diagnostico);
                        $contador=count($vector);
                    @endphp
                    <td>
                        @for ($i=0;$contador>$i;$i++)
                            -{{$vector[$i]}}<br>
                        @endfor <br>
                    </td>
                </tr>
            </table>
            @if ($receta==null&&$gabinete==null)
                <br><br><br>
                <table  width="100%" align="center">
                    <tr>
                        <th>
                            {{$consulta->doctor}}
                        </th>
                    </tr>
                </table>
            @else
                @if ($receta==null)
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
                    <br><br><br>
                    <table  width="100%" align="center">
                        <tr>
                            <th>
                                {{$consulta->doctor}}
                            </th>
                        </tr>
                    </table>
                @else
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
                                @for($i=0;$contador>$i;$i++)
                                    {{$vector[$i]}} <br>
                                @endfor
                                <br>
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
                            <td>
                                {{$receta->indicacion}} <br><br>
                            </td>
                        </tr>
                    </table>
                    @if ($gabinete==null)
                        <br><br><br>
                        <table  width="100%" align="center">
                            <tr>
                                <th>
                                    {{$consulta->doctor}}
                                </th>
                            </tr>
                        </table>
                    @else
                    <div style="page-break-after:always;"></div>
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
                        <br><br><br>
                        <table  width="100%" align="center">
                            <tr>
                                <th>
                                    {{$consulta->doctor}}
                                </th>
                            </tr>
                        </table>
                @endif
            @endif
        @endif
    </body>
</html>
