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
                        @if ($historial->p_h_a=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="16%">
                        TBC Pulmonar
                    </td>
                    <td width="9%">
                        @if ($historial->p_pulmonar=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif                </td>
                    <td width="17%">
                        Diabetes
                    </td>
                    <td width="8%">
                        @if ($historial->p_diabetes=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="20%">
                        Patología Mamaria
                    </td>
                    <td width="5%">
                        @if ($historial->p_mamaria=='si')
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
                        @if ($historial->p_cardiopatias=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        ITS
                    </td>
                    <td>
                        @if ($historial->p_its=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Várices
                    </td>
                    <td>
                        @if ($historial->p_varices=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Enf. Renal
                    </td>
                    <td>
                        @if ($historial->p_renal=='si')
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
                        @if ($historial->p_hepatopatia=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Tumores Genitales
                    </td>
                    <td>
                        @if ($historial->p_genitales=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Enf. Gastrointestinal
                    </td>
                    <td>
                        @if ($historial->p_gastrointestinal=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Enf. Chagas
                    </td>
                    <td>
                        @if ($historial->p_chagas=='si')
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
                        @if ($historial->np_fisica=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="15%">
                        Alcoholismo
                    </td>
                    <td width="10%">
                        @if ($historial->np_alcoholismo=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="15%">
                        Tabaquismo
                    </td>
                    <td width="10%">
                        @if ($historial->np_tabaquismo=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="20%">
                        Sustancias o Drogas
                    </td>
                    <td width="5%">
                        @if ($historial->np_sustancias=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                </tr>
                <textarea name="1" cols="30" rows="20">
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
                        @if ($historial->f_h_a=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="16%">
                        TBC Pulmonar
                    </td>
                    <td width="9%">
                        @if ($historial->f_pulmonar=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="17%">
                        Diabetes
                    </td>
                    <td width="8%">
                        @if ($historial->f_diabetes=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="20%">
                        Patología Mamaria
                    </td>
                    <td width="5%">
                        @if ($historial->f_mamaria=='si')
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
                        @if ($historial->f_cardiopatias=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        ITS
                    </td>
                    <td>
                        @if ($historial->f_its=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Várices
                    </td>
                    <td>
                        @if ($historial->f_varices=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Enf. Renal
                    </td>
                    <td>
                        @if ($historial->f_renal=='si')
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
                        @if ($historial->f_hepatopatia=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Tumores Genitales
                    </td>
                    <td>
                        @if ($historial->f_genitales=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Enf. Gastrointestinal
                    </td>
                    <td>
                        @if ($historial->f_gastrointestinal=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Enf. Chagas
                    </td>
                    <td>
                        @if ($historial->f_chagas=='si')
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
                        @if ($historial->o_alergias=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="16%">
                        Cirugías
                    </td>
                    <td width="16%">
                        @if ($historial->o_cirugias=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="18%">
                        Traumatismos
                    </td>
                    <td width="18%">
                        @if ($historial->o_traumatismos=='si')
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
                        @if ($historial->o_medicamentos=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td>
                        Transfusionales
                    </td>
                    <td>
                        @if ($historial->o_transfusionales=='si')
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
                        @if ($historial->g_embarazos=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="15%">
                        Gestante
                    </td>
                    <td width="18%">
                        @if ($historial->g_gestante=='si')
                            <FONT COLOR='green'><i><b>SI</b></i></FONT>
                        @else
                            <FONT COLOR='red'>NO</FONT>
                        @endif
                    </td>
                    <td width="17%">
                        Cancer de Mama
                    </td>
                    <td width="16%">
                        @if ($historial->g_c_mama=='si')
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
            <div style="page-break-after:always;"></div>
        @endif
        @php
            $i=1
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
                    {{-- <td style="text-align: center">{{}}</td> --}}
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
                        {{$dato["f_r"]}}</td>
                </tr>
            </table><br>
            <table width="100%" border="1">
                <tr style="background:rgb(179, 217, 231)">
                    <td style="text-align: center"><b>Motivo</b>
                    </td>
                </tr>
                <tr>
                    @php
                        $vector = explode("\n", $dato["motivo"]);
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
                        $vector = explode("\n", $dato["sintoma"]);
                        $contador=count($vector);
                    @endphp
                    <td>
                        @if ($dato["sintoma"]==null)
                            {{$dato["sintoma"]}} <br>
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
                        $vector = explode("\n", $dato["diagnostico"]);
                        $contador=count($vector);
                    @endphp
                    <td>
                        @for ($i=0;$contador>$i;$i++)
                            -{{$vector[$i]}}<br>
                        @endfor <br>
                    </td>
                </tr>
            </table>
            @if ($dato["receta_id"]!='no')
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
                        <td>{{$dato["indicacion"]}}</td>
                    </tr>
                </table>
            @endif
                <br><br><br><br>
                <table  width="100%" align="center">
                    <tr>
                        <th>
                            Dr. Benigno Gutierrez Vargas
                        </th>
                    </tr>
                </table><br><br>
            @php
                $i++;
            @endphp
        @endforeach
    </body>
</html>
