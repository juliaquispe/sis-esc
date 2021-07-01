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

        @if ($internacion!=null)
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
                    </td>
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
                                    $imagen = base64_encode(file_get_contents(public_path("storage/Datos/Internacion/Foto/$foto->foto")));
                                @endphp
                                <img src="data:image/png;base64,{{$imagen}}" height="870px" width="630px"/>
                            </th>
                        </tr>
                    </table>
                @endforeach
            @endif
            @if ($internacion->nombre_resp!=null)
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
        @endif
    </body>
</html>
