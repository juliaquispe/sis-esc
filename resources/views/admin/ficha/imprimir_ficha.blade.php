<!DOCTYPE html>
<html>
    <head>
        <title>Ficha de Atención</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <br><br>
        <table border="1" id="uno">
            <tr>
                <td>
                    <style>
                    #uno {
                        background-image: url("{{asset("assets/$theme/assets/images/avatars/logo.jpg")}}");
                        background-repeat: no-repeat;
                        background-position: right bottom;
                        background-size:35%;
                    }
                    </style><br>
                    <table align="center" width="100%">
                        <tr>
                            <th align="center" width="20%" colspan="2">
                                @if ($clinica->logo==null)
                                    <img src="{{asset("assets/$theme/assets/images/avatars/logo.jpg")}}" height="110px" width="80px"/>
                                @else
                                    <img src="data:image/png;base64,{{$image}}" height="110px" width="80px"/>
                                @endif
                            </th>
                            <th width="80%">
                                    <h2 style="color: rgb(92, 5, 5)"><b>{{$clinica->nombre}}</b></h2>
                                    <span style="color: rgb(121, 9, 9)" style="text-align: right"><b>Dirección: </b>{{$clinica->direccion}}</span><br><br>
                                    <span style="color: rgb(73, 5, 10)"> <b>Contactos: </b>{{$clinica->telefono}}  {{$clinica->contacto_1}}  {{$clinica->contacto_2}}</span>
                            </th>
                        </tr><br>
                        <tr>
                            <td colspan="3">
                                <h2 style="text-align: center"><FONT COLOR='#0f0fa0'><u>FICHA DE ATENCIÓN MÉDICA</u></FONT></h2>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="4"></td>
                            <td>
                                <h3>
                                    <span style="color: rgb(92, 5, 5)"><b><u>Especialidad</u>:</b></span>
                                </h3>
                            </td>
                            <td>
                                <h3>
                                    <span>{{$ficha->servicio->nombre}}</span>
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: rgb(92, 5, 5)"><b><u>Paciente</u>:</b></span>
                            </td>
                            <td>
                                <span>{{$ficha->paciente->nombre}} {{$ficha->paciente->apellido_p}} {{$ficha->paciente->apellido_m}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: rgb(92, 5, 5)"><b><u>Fecha</u>:</b></span>
                            </td>
                            <td>
                                <span>{{$ficha->fecha}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: rgb(92, 5, 5)"><b><u>Hora</u>:</b></span>
                            </td>
                            <td>
                                <span>{{$ficha->hora}}</span>
                            </td>
                        </tr>
                    </table><br>
                </td>
            </tr>
        </table>
        <br><br><br>
     .................................................................................................................................................................................
        <br><br><br><br>
        <table border="1" id="uno">
            <tr>
                <td><br>
                    <table align="center" width="100%">
                        <tr>
                            <th align="center" width="20%" colspan="2">
                                @if ($clinica->logo==null)
                                    <img src="{{asset("assets/$theme/assets/images/avatars/logo.jpg")}}" height="110px" width="80px"/>
                                @else
                                    <img src="data:image/png;base64,{{$image}}" height="110px" width="80px"/>
                                @endif
                            </th>
                            <th width="80%">
                                    <h2 style="color: rgb(92, 5, 5)"><b>{{$clinica->nombre}}</b></h2>
                                    <span style="color: rgb(121, 9, 9)"><b>Dirección: </b>{{$clinica->direccion}}</span><br><br>
                                    <span style="color: rgb(73, 5, 10)"> <b>Contactos: </b>{{$clinica->telefono}}  {{$clinica->contacto_1}}  {{$clinica->contacto_2}}</span>
                            </th>
                        </tr><br>
                        <tr>
                            <td colspan="3">
                                <h2 style="text-align: center"><FONT COLOR='#0f0fa0'><u>FICHA DE ATENCIÓN MÉDICA</u></FONT></h2>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="4"></td>
                            <td>
                                <h3>
                                    <span style="color: rgb(92, 5, 5)"><b><u>Especialidad</u>:</b></span>
                                </h3>
                            </td>
                            <td>
                                <h3>
                                    <span>{{$ficha->servicio->nombre}}</span>
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: rgb(92, 5, 5)"><b><u>Paciente</u>:</b></span>
                            </td>
                            <td>
                                <span>{{$ficha->paciente->nombre}} {{$ficha->paciente->apellido_p}} {{$ficha->paciente->apellido_m}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: rgb(92, 5, 5)"><b><u>Fecha</u>:</b></span>
                            </td>
                            <td>
                                <span>{{$ficha->fecha}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: rgb(92, 5, 5)"><b><u>Hora</u>:</b></span>
                            </td>
                            <td>
                                <span>{{$ficha->hora}}</span>
                            </td>
                        </tr>
                    </table><br>
                </td>
            </tr>
        </table>
    </body>
</html>

{{-- <!DOCTYPE html>
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
                    1 año
                </td>
                <td align="center">
                    {{$ficha->paciente->ci}}
                </td>
                <td align="center">
                    25/04/2021
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
        </table>
        <textarea name="" id="" cols="30" rows="20">
            1 hibuprofeno cada 8 horas durante 8 dias
            1 hibuprofeno cada 8 horas durante 8 dias
        </textarea>
        <table  width="100%" border="1">
            <tr style="background:rgb(192, 221, 255)">
                <th>
                    Instrucciones Médicas
                </th>
            </tr>
        </table>
        <textarea name="" id="" cols="30" rows="20">
            No tomar si esta embarazada
        </textarea><br><br>
        <table  width="100%" align="center">
            <tr>
                <th>
                    Dr. Benigno Gutierrez Vargas
                </th>
            </tr>
        </table><br><br>

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
                    1 año
                </td>
                <td align="center">
                    {{$ficha->paciente->ci}}
                </td>
                <td align="center">
                    25/04/2021
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
        </table>
        <textarea name="1" cols="30" rows="20">
            1 hibuprofeno tomar cada 5 horas durante
            10 dias
        </textarea>
        <table  width="100%" border="1">
            <tr style="background:rgb(192, 221, 255)">
                <th>
                    Instrucciones Médicas
                </th>
            </tr>
        </table>
        <textarea name="" id="" cols="30" rows="20">
            No tomar si esta embarazada
        </textarea><br><br>
        <table  width="100%" align="center">
            <tr>
                <th>
                    Dr. Benigno Gutierrez Vargas
                </th>
            </tr>
        </table>
    </body>
</html> --}}

{{-- <!DOCTYPE html>
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
                    1 año
                </td>
                <td align="center">
                    {{$ficha->paciente->ci}}
                </td>
                <td align="center">
                    25/04/2021
                </td>
            </tr>
        </table>
        <h3 style="text-align: center"><FONT COLOR='#0f0fa0'><u>SIGNOS VITALES</u></FONT></h3>
        <table>
            <tr>
                <td  style="text-align: center"></td>
            </tr>
        </table>
        <table width="100%" border="1">
            <tr style="background:rgb(138, 216, 247)">
                <th style="text-align: center" width="14%">Altura</th>
                <th style="text-align: center" width="14%">Peso</th>
                <th style="text-align: center" width="14%">IMC</th>
                <th style="text-align: center" width="16%">Temperatura</th>
                <th style="text-align: center" width="14%">P.A.</th>
                <th style="text-align: center" width="14%">F.C.</th>
                <th style="text-align: center" width="14%">F.R.</th>
            </tr>


             <tr>
                <td style="text-align: center">{{$signos_vitales->altura}}</td>
                <td style="text-align: center">{{$signos_vitales->peso}}</td>
                <td style="text-align: center">{{}}</td>
                <td style="text-align: center">{{$signos_vitales->temperatura}}</td>
                <td style="text-align: center">{{$signos_vitales->p_a}}</td>
                <td style="text-align: center">{{$signos_vitales->f_c}}</td>
                <td style="text-align: center">{{$signos_vitales->f_r}}</td>
            </tr>


        </table><br>
        <table width="100%" border="1">
            <tr>
                <td style="text-align: center"><b>Motivo</b>
                    <textarea id="motivo" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td style="text-align: center"><b>Síntoma</b>
                    <textarea id="sintoma" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td style="text-align: center"><b>Diagnóstico</b>
                    <textarea id="diagnostico" cols="30" rows="10"></textarea>
                </td>
            </tr>
        </table><br>
        <h3 style="text-align: center"><FONT COLOR='#0f0fa0'><u>RECETA MÉDICA</u></FONT></h3>
        <table  width="100%" border="1">
            <tr style="background:rgb(192, 221, 255)">
                <th>
                    <span>MEDICAMENTOS</span>
                </th>
            </tr>
        </table>
        <textarea name="" id="" cols="30" rows="20">
            1 hibuprofeno cada 8 horas durante 8 dias
            1 hibuprofeno cada 8 horas durante 8 dias
        </textarea>
        <table  width="100%" border="1">
            <tr style="background:rgb(192, 221, 255)">
                <th>
                    Instrucciones Médicas
                </th>
            </tr>
        </table>
        <textarea name="" id="" cols="30" rows="20">
            No tomar si esta embarazada
        </textarea><br><br><br>
        <table  width="100%" align="center">
            <tr>
                <th>
                    Dr. Benigno Gutierrez Vargas
                </th>
            </tr>
        </table><br><br>


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
                    1 año
                </td>
                <td align="center">
                    {{$ficha->paciente->ci}}
                </td>
                <td align="center">
                    25/04/2021
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
        </table>
        <textarea name="1" cols="30" rows="20">
            1 hibuprofeno tomar cada 5 horas durante
            10 dias
        </textarea>
        <table  width="100%" border="1">
            <tr style="background:rgb(192, 221, 255)">
                <th>
                    Instrucciones Médicas
                </th>
            </tr>
        </table>
        <textarea name="" id="" cols="30" rows="20">
            No tomar si esta embarazada
        </textarea><br><br>
        <table  width="100%" align="center">
            <tr>
                <th>
                    Dr. Benigno Gutierrez Vargas
                </th>
            </tr>
        </table>

    </body>
</html> --}}


