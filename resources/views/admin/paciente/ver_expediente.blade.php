<!DOCTYPE html>
<html>
    <head>
        <title>Historia Clínica</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        @if ($historial!=null)
            <table border="1" align="center" width="100%">
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <th align="center" width="20%" colspan="2">
                                    <img src="data:image/png;base64,{{$image}}" height="80px" width="50px"/>
                                </th>
                                <th width="80%">
                                    <span style="color: rgb(180, 12, 12)"><b>{{$clinica->nombre}}</b></span><br>
                                    <span style="color: rgb(90, 73, 73)" style="text-align: right"><b>Dirección: </b>{{$clinica->direccion}}</span>
                                    <span style="color: rgb(90, 73, 73)"> <b>Contactos: </b>{{$clinica->telefono}}  {{$clinica->contacto_1}}  {{$clinica->contacto_2}}</span>
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
                        Celular
                    </th>
                </tr>
                <tr>
                    <td align="center">
                        {{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}
                    </td>
                    <td align="center">
                        {{$edad=MyHelper::Edad_Paciente($paciente->fecha_nac,"index")}}
                    </td>
                    <td align="center">
                        {{$paciente->ci}}
                    </td>
                    <td align="center">
                        {{$paciente->celular}}
                    </td>
                </tr>
            </table>
            <h4 style="text-align: center"><FONT COLOR='#0f0fa0'><u>HISTORIA CLÍNICA</u></FONT></h4>
            <table>
                <tr>
                    <td>
                        <b>Tipo de Sangre:</b> {{$historial->t_sangre}}
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <th colspan="8"> Antecedentes Patológicos</th>
                </tr>
                <tr>
                    <td width="14%">
                        Hipertensión Arterial
                    </td>
                    <td width="11%">
                        @if ($historial->p_h_a=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="16%">
                        TBC Pulmonar
                    </td>
                    <td width="9%">
                        @if ($historial->p_pulmonar=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="17%">
                        Diabetes
                    </td>
                    <td width="8%">
                        @if ($historial->p_diabetes=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="20%">
                        Patología Mamaria
                    </td>
                    <td width="5%">
                        @if ($historial->p_mamaria=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Cardiopatías
                    </td>
                    <td>
                        @if ($historial->p_cardiopatias=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        ITS
                    </td>
                    <td>
                        @if ($historial->p_its=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Várices
                    </td>
                    <td>
                        @if ($historial->p_varices=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Enf. Renal
                    </td>
                    <td>
                        @if ($historial->p_renal=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Hepatopatías
                    </td>
                    <td>
                        @if ($historial->p_hepatopatia=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Tumores Genitales
                    </td>
                    <td>
                        @if ($historial->p_genitales=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Enf. Gastrointestinal
                    </td>
                    <td>
                        @if ($historial->p_gastrointestinal=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Enf. Chagas
                    </td>
                    <td>
                        @if ($historial->p_chagas=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                </tr>
                <textarea name="1" cols="30" rows="20">
                    {{$historial->p_detalles}}
                </textarea>
            </table>
            <table  width="100%">
                <tr>
                    <th wihth="100%" style="text-align: center" colspan="8">
                        Antecedentes No Patológicos
                    </th>
                </tr>
                <tr>
                    <td width="17%">
                        Actividad Fisica
                    </td>
                    <td width="8%">
                        @if ($historial->np_fisica=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="15%">
                        Alcoholismo
                    </td>
                    <td width="10%">
                        @if ($historial->np_alcoholismo=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="15%">
                        Tabaquismo
                    </td>
                    <td width="10%">
                        @if ($historial->np_tabaquismo=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="20%">
                        Sustancias o Drogas
                    </td>
                    <td width="5%">
                        @if ($historial->np_sustancias=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                </tr>
                <textarea name="1" cols="100" rows="20">
                    {{$historial->np_detalles}}
                </textarea>
            </table>
            <table width="100%">
                <tr>
                    <th colspan="8"> Antecedentes H-Familiares</th>
                </tr>
                <tr>
                    <td width="14%">
                        Hipertensión Arterial
                    </td>
                    <td width="11%">
                        @if ($historial->f_h_a=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="16%">
                        TBC Pulmonar
                    </td>
                    <td width="9%">
                        @if ($historial->f_pulmonar=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="17%">
                        Diabetes
                    </td>
                    <td width="8%">
                        @if ($historial->f_diabetes=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="20%">
                        Patología Mamaria
                    </td>
                    <td width="5%">
                        @if ($historial->f_mamaria=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Cardiopatías
                    </td>
                    <td>
                        @if ($historial->f_cardiopatias=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        ITS
                    </td>
                    <td>
                        @if ($historial->f_its=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Várices
                    </td>
                    <td>
                        @if ($historial->f_varices=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Enf. Renal
                    </td>
                    <td>
                        @if ($historial->f_renal=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Hepatopatías
                    </td>
                    <td>
                        @if ($historial->f_hepatopatia=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Tumores Genitales
                    </td>
                    <td>
                        @if ($historial->f_genitales=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Enf. Gastrointestinal
                    </td>
                    <td>
                        @if ($historial->f_gastrointestinal=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Enf. Chagas
                    </td>
                    <td>
                        @if ($historial->f_chagas=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                </tr>
                <textarea name="1" cols="30" rows="20">
                    {{$historial->f_detalles}}
                </textarea>
            </table>
            <table  width="100%">
                <tr>
                    <th wihth="100%" style="text-align: center" colspan="6">
                        Otros Antecedentes
                    </th>
                </tr>
                <tr>
                    <td width="15%">
                        Alergias
                    </td>
                    <td width="17%">
                        @if ($historial->o_alergias=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="16%">
                        Cirugías
                    </td>
                    <td width="16%">
                        @if ($historial->o_cirugias=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="18%">
                        Traumatismos
                    </td>
                    <td width="18%">
                        @if ($historial->o_traumatismos=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Medicamentos
                    </td>
                    <td>
                        @if ($historial->o_medicamentos=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Transfusionales
                    </td>
                    <td>
                        @if ($historial->o_transfusionales=="si")
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                </tr>
                <textarea name="1" cols="30" rows="20">
                    {{$historial->o_detalles}}
                </textarea>
            </table>
            @if($paciente->genero=="Mujer")
                <table  width="100%">
                    <tr>
                        <th wihth="100%" style="text-align: center" colspan="6">
                            Antecedentes Ginecológicos
                        </th>
                    </tr>
                    <tr>
                        <td width="15%">
                            Embarazos
                        </td>
                        <td width="18%">
                            @if ($historial->g_embarazos=="si")
                                <FONT COLOR='green'><i><b>SI</b></i></FONT>
                            @else
                                <FONT COLOR='red'>NO</FONT>
                            @endif
                        </td>
                        <td width="15%">
                            Gestante
                        </td>
                        <td width="18%">
                            @if ($historial->g_gestante=="si")
                                <FONT COLOR='green'><i><b>SI</b></i></FONT>
                            @else
                                <FONT COLOR='red'>NO</FONT>
                            @endif
                        </td>
                        <td width="17%">
                            Cancer de Mama
                        </td>
                        <td width="16%">
                            @if ($historial->g_c_mama=="si")
                                <FONT COLOR='green'><i><b>SI</b></i></FONT>
                            @else
                                <FONT COLOR='red'>NO</FONT>
                            @endif
                        </td>
                    </tr>
                    <textarea name="1" cols="30" rows="20">
                        {{$historial->g_detalles}}
                    </textarea>
                </table>
            @endif
            <div style="page-break-after:always;"></div>
            @endif
            @php
                $i=1;
            @endphp
            @foreach ($datos as $dato)
                @if ($i!=1)
                    <div style="page-break-after:always;"></div>
                @endif
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
                                    {{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}
                                </td>
                                <td align="center">
                                    {{$edad=MyHelper::Edad_Paciente($paciente->fecha_nac,"index")}}
                                </td>
                                <td align="center">
                                    {{$paciente->ci}}
                                </td>
                                <td align="center">
                                    {{$dato["fecha"]}}
                                </td>
                            </tr>
                        </table>
                        <h3 style="text-align: center"><FONT COLOR='#0f0fa0'><u>CONSULTA MEDICA</u></FONT></h3>
                        <table width="100%" border="1">
                            <tr style="text-align: center" >
                                <th colspan="6" style="background:rgb(184, 201, 207)">Signos Vitales</th>
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
                                    @if ($dato["altura"]==null)
                                        <FONT COLOR='red'>Sin Reg.</FONT>
                                    @else
                                        {{$dato["altura"]}} Cm
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($dato["peso"]==null)
                                        <FONT COLOR='red'>Sin Reg.</FONT>
                                    @else
                                        {{$dato["peso"]}} Kg
                                    @endif
                                </td>
                                {{-- <td style="text-align: center">k</td> --}}
                                <td style="text-align: center">
                                    @if ($dato["temperatura"]==null)
                                        <FONT COLOR='red'>Sin Reg.</FONT>
                                    @else
                                        {{$dato["temperatura"]}} °C
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($dato["p_a"]==null)
                                        <FONT COLOR='red'>Sin Reg.</FONT>
                                    @else
                                        {{$dato["p_a"]}} mmHg
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($dato["f_c"]==null)
                                        <FONT COLOR='red'>Sin Reg.</FONT>
                                    @else
                                        {{$dato["f_c"]}} lat/min
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($dato["f_r"]==null)
                                        <FONT COLOR='red'>Sin Reg.</FONT>
                                    @else
                                        {{$dato["f_r"]}} r/min
                                    @endif
                                </td>
                            </tr>
                        </table><br>
                        <table width="100%" border="1">
                            <tr style="background:rgb(184, 201, 207)">
                                <td style="text-align: center"><b>Motivo</b></td>
                            </tr>
                            <tr>
                                @php
                                    $vector = explode("\n", $dato["motivo"]);
                                    $contador=count($vector);
                                @endphp
                                <td>
                                    @for($i=0;$contador>$i;$i++)
                                    -->{{$vector[$i]}} <br>
                                    @endfor
                                    <br>
                                </td>
                            </tr>
                            <tr style="background:rgb(184, 201, 207)">
                                <td style="text-align: center"><b>Síntoma</b></td>
                            </tr>
                            <tr>
                                @php
                                    $vector = explode("\n", $dato["sintoma"]);
                                    $contador=count($vector);
                                @endphp
                                <td>
                                    @if ($dato["sintoma"]==null)
                                        {{$dato["sintoma"]}} <br><br>
                                    @else
                                        @for($i=0;$contador>$i;$i++)
                                        -->{{$vector[$i]}} <br>
                                        @endfor
                                        <br>
                                    @endif
                                </td>
                            </tr>
                            <tr style="background:rgb(184, 201, 207)">
                                <td style="text-align: center"><b>Diagnóstico</b></td>
                            </tr>
                            <tr>
                                @php
                                    $vector = explode("\n", $dato["diagnostico"]);
                                    $contador=count($vector);
                                @endphp
                                <td>
                                    @for($i=0;$contador>$i;$i++)
                                    -->{{$vector[$i]}} <br>
                                    @endfor
                                    <br>
                                </td>
                            </tr>
                        </table><br>
                    @if ($dato["receta_id"]=="no" && $dato["gabinete_id"]=="no")
                        <br><br><br>
                        <table  width="100%" align="center">
                            <tr>
                                <th>
                                    {{$dato["doctor"]}}
                                </th>
                            </tr>
                        </table>
                        @else
                            @if ($dato["receta_id"]=="no")
                                <h2 style="text-align: center"><FONT COLOR='#0f0fa0'><u>Estudio de Gabinete</u></FONT></h2>
                                <table width="100%" border="1">
                                    <tr style="background:rgb(179, 217, 231)">
                                        <td style="text-align: center"><b>Tipo de Estudio</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        @php
                                            $vector = explode("\n", $dato["estudio_g"]);
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
                                            $vector = explode("\n", $dato["indicacion_g"]);
                                            $contador=count($vector);
                                        @endphp
                                        <td>
                                            @if ($dato["indicacion_g"]==null)
                                                {{$dato["indicacion_g"]}} <br>
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
                                            {{$dato["doctor"]}}
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
                                        $vector = explode("\n", $dato["receta"]);
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
                                        {{$dato["indicacion"]}} <br><br>
                                    </td>
                                </tr>
                            </table>
                            @if ($dato["gabinete_id"]=="no")
                                <br><br><br>
                                <table  width="100%" align="center">
                                    <tr>
                                        <th>
                                            {{$dato["doctor"]}}
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
                                                $vector = explode("\n", $dato["estudio_g"]);
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
                                                $vector = explode("\n", $dato["indicacion_g"]);
                                                $contador=count($vector);
                                            @endphp
                                            <td>
                                                @if ($dato["indicacion_g"]==null)
                                                    {{$dato["indicacion_g"]}} <br>
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
                                                {{$dato["doctor"]}}
                                            </th>
                                        </tr>
                                    </table>
                            @endif
                        @endif
                    @endif
                    @if ($dato["internacion_id"]!='no')
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
                                                    <span><i>Cuida tu salud al servicio de la población Potosina</i></span>
                                                    <h4 style="color: rgb(25, 33, 39)" style="text-align: right"><b><u>EXÁMEN FÍSICO PARA LA INTERNACIÓN</u></b></h4>
                                                </th>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table width="100%">
                                <tr align="left">
                                    <td width="15%" align="right"><b>Paciente:</b></td>
                                    <td width="25%">{{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}</td>
                                    <td width="10%" align="right"><b>Edad:</b></td>
                                    <td width="10%">{{$edad=MyHelper::Edad_Paciente($paciente->fecha_nac,"index")}}</td>
                                    <td width="20%" align="right"><b>Fecha de Ingreso:</b></td>
                                    <td width="20%">{{$dato["fecha_ingreso"]}}</td>
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
                                        @if ($dato["altura"]==null)
                                            <FONT COLOR='red'>Sin Registro</FONT>
                                        @else
                                            {{$dato["altura"]}} cm
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if ($dato["peso"]==null)
                                            <FONT COLOR='red'>Sin Registro</FONT>
                                        @else
                                            {{$dato["peso"]}} kg
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if ($dato["temperatura"]==null)
                                            <FONT COLOR='red'>Sin Registro</FONT>
                                        @else
                                            {{$dato["temperatura"]}} °C
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if ($dato["p_a"]==null)
                                            <FONT COLOR='red'>Sin Registro</FONT>
                                        @else
                                            {{$dato["p_a"]}} mmHg
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if ($dato["f_c"]==null)
                                            <FONT COLOR='red'>Sin Registro</FONT>
                                        @else
                                            {{$dato["f_c"]}} lat/min
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if ($dato["f_r"]==null)
                                            <FONT COLOR='red'>Sin Registro</FONT>
                                        @else
                                            {{$dato["f_r"]}} r/min
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
                                        $vector = explode("\n", $dato["motivo_i"]);
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
                                        $vector = explode("\n", $dato["craneo_cara"]);
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
                                        $vector = explode("\n", $dato["cuello_tiroides"]);
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
                                        $vector = explode("\n", $dato["torax"]);
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
                                        $vector = explode("\n", $dato["genitales"]);
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
                                        $vector = explode("\n", $dato["columna"]);
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
                                        $vector = explode("\n", $dato["e_neurologico"]);
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
                                        $vector = explode("\n", $dato["impresion_d"]);
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
                                        $vector = explode("\n", $dato["conducta"]);
                                        $contador=count($vector);
                                    @endphp
                                    <td>
                                        @for ($i=0;$contador>$i;$i++)
                                            -{{$vector[$i]}} <br>
                                        @endfor <br>
                                    </td>
                                </tr>
                            </table><br><br>

                            @if($dato["foto_evolucion"]!=null)
                                @php
                                    $fotos=$dato["foto_evolucion"];
                                    $fotos=json_decode($fotos);
                                @endphp
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
                            @if ($dato["nombre_resp"]!=null)
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
                                                            <span ><b>{{$clinica->nombre}}</b></span><br>
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
                                            <td align="left" width="35%">{{$dato["fecha_salida"]}}</td>
                                            <td align="right" width="40%"><b>Hora:</b></td>
                                            <td align="left" width="10%"></td>
                                        </tr>
                                    </table>
                                    &nbsp;&nbsp;<span><b><u>Datos del Paciente</u></b></span>
                                    <table width="90%" align="center">
                                        <tr align="center">
                                            <td width="30%">{{$paciente->nombre}}</td>
                                            <td width="30%">{{$paciente->apellido_p}}</td>
                                            <td width="30%"> {{$paciente->apellido_m}}</td>
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
                                            <td width="25%">{{$dato["fecha_ingreso"]}}</td>
                                            <th width="30%">Fecha de Salida:</th>
                                            <td width="20%">{{$dato["fecha_salida"]}}</td>
                                        </tr>
                                    </table>
                                    <table  width="100%" border="1">
                                        <tr>
                                            <td><b>Diagnósticos de Ingreso</b></td>
                                        </tr>
                                        <tr>
                                            @php
                                                $vector = explode("\n", $dato["motivo_i"]);
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
                                                $vector = explode("\n", $dato["craneo_cara"]);
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
                                                $vector = explode("\n", $dato["tratamiento_realizado"]);
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
                                                        <td width="30%">{{$dato["nombre_resp"]}}</td>
                                                        <td width="42%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Número de CI:</b></td>
                                                        <td>{{$dato["ci_resp"]}}</td>
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
                                                        <td>{{$dato["testigo"]}}</td>
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
                            @endif
                    @endif
                @php
                    $i++;
                @endphp
            @endforeach
    </body>
</html>
