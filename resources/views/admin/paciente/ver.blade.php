@extends("theme.$theme.layout")
@section('titulo')
	Expediente
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<link rel="stylesheet" href="{{asset("assets/css/zoom.css")}}"/>
    <div class="page-header">
        <h1>
            <h1 style="text-color:pink" class="center"><u><b>EXPEDIENTE CLÍNICO</b></u></h1>
           <div class="box-tools pull-right">
                @if(Auth::user()->rol->editar ==1)
                    <a href="{{route('paciente')}}" class="btn btn-warning btn-xs tooltipC" title="Volver">
                        <i class="fa fa-fw fa-reply-all"></i> Volver
                    </a>
                @endif
            </div>&nbsp;&nbsp;
        </h1>
    </div>
        <div class="row">
            <div class="col-xs-12">
                @include('mensajes.correcto')
                @include('mensajes.incorrecto')
                <div class="col-xs-12 col-sm-2 center">

                    <div>
                        <span class="profile-picture">
                            @if ($paciente->foto==null)
                            <img src="{{asset("assets/$theme/assets/images/avatars/dos.jpg")}}" height="155px" width="135px"/>
                            @else
                            <img src="{{Storage::url("Datos/Paciente/Foto/$paciente->foto")}}" height="155px" width="135px"/>
                            @endif
                        </span>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-xs-12 col-sm-5">
                    <div class="">
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Nombre</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}</i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>N° Carnet</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$paciente->ci}}</i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Dirección</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>
                                        @if($paciente->direccion==null)
                                            No Registrado
                                        @else
                                            {{$paciente->direccion}}
                                        @endif
                                    </i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>N° de Contacto</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>
                                        @if($paciente->celular==null)
                                            No Registrado
                                        @else
                                            {{$paciente->celular}}
                                        @endif
                                    </i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5">
                    <div class="">
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Teléfono</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>
                                        @if($paciente->celular==null)
                                            No Registrado
                                        @else
                                            {{$paciente->celular}}
                                        @endif
                                    </i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Género</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$paciente->genero}}</i></span>
                                </div>
                            </div>
                            {{-- <div class="profile-info-row">
                                <div class="profile-info-name"><u>Tipo de Sangre</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>
                                        @if($paciente->t_sangre==null)
                                            No Registrado
                                        @else
                                            {{$paciente->t_sangre}}
                                        @endif
                                    </i></span>
                                </div>
                            </div> --}}
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Edad</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$edad=MyHelper::Edad_Paciente($paciente->fecha_nac,"completo")}}</i></span>
                                </div>
                            </div>
                        </div><br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                @if ($SVM==null)
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="alert alert-info">
                            <span class="blue bolder">  Este paciente aun no tiene ninguna Consulta Registrada</span>
                        </div>
                    </div>
                @else
                    <h4 class="center" style="color: rgb(36, 95, 129)">Signos Vitales de su última Consulta ({{$aux_fecha}})</h4>
                    <table id="tabla" class="table  table-bordered table-hover" >
                        <tr style="background: rgb(204, 228, 250)">
                            <th class="col-lg-1.6" style="text-align: center;"><i class="glyphicon glyphicon-arrow-up" style="color:rgb(150, 87, 231)"></i> <u>Altura</u></th>
                            <th class="col-lg-1.6" style="text-align: center;"><i class="fa fa-tachometer" style="color:rgb(64, 195, 228)"></i> <u>Peso</u></th>
                            {{-- <th class="col-lg-2" style="text-align: center;"><i class="glyphicon glyphicon-piggy-bank" style="color:rgb(90, 212, 137)"></i> <u>I.M.C.</u></th> --}}
                            <th class="col-lg-2" style="text-align: center;"><i class="glyphicon glyphicon-fire orange"></i> <u>Temperatura</u></th>
                            <th class="col-lg-1.6" style="text-align: center;"><i class="glyphicon glyphicon-dashboard blue"></i> <u>P.A.</u></th>
                            <th class="col-lg-1.6" style="text-align: center;"><i class="glyphicon glyphicon-heart-empty red"></i> <u>F.C.</u></th>
                            <th class="col-lg-1.6" style="text-align: center;"><i class="glyphicon glyphicon-flash" style="color:rgb(155, 115, 96)"></i> <u>F.R.</u></th>
                        </tr>
                        <tr>
                            <td style="text-align: center;" id="alto">
                                <i>
                                    @if ($SVM->altura==null)
                                        <span class="red">Sin registro</span>
                                    @else
                                        {{$SVM->altura}} m
                                    @endif
                                </i>
                            </td>
                            <td style="text-align: center;" id="alto">
                                <i>
                                    @if ($SVM->peso==null)
                                    <span class="red">Sin registro</span>
                                    @else
                                        {{$SVM->peso}} kg
                                    @endif
                                </i>
                            </td>
                            {{-- <td style="text-align: center;" id="alto"><i>54 Mb</i></td> --}}
                            <td style="text-align: center;" id="alto">
                                <i>
                                    @if ($SVM->temperatura==null)
                                        <span class="red">Sin registro</span>
                                    @else
                                        {{$SVM->temperatura}} °C
                                    @endif
                                </i>
                            </td>
                            <td style="text-align: center;" id="alto">
                                <i>
                                    @if ($SVM->p_a==null)
                                        <span class="red">Sin registro</span>
                                    @else
                                        {{$SVM->p_a}} mmHg
                                    @endif
                                </i>
                            </td>
                            <td style="text-align: center;" id="alto">
                                <i>
                                    @if ($SVM->f_c==null)
                                        <span class="red">Sin registro</span>
                                    @else
                                        {{$SVM->f_c}} lat/min
                                    @endif
                                </i>
                            </td>
                            <td style="text-align: center;" id="alto">
                                <i>
                                    @if ($SVM->f_r==null)
                                        <span class="red">Sin registro</span>
                                    @else
                                        {{$SVM->f_r}} r/m
                                    @endif
                                </i>
                            </td>
                        </tr>
                    </table>
                    <h4 class="center" style="color: rgb(36, 95, 129)">Lista de sus Consultas
                        <form action="{{route('ver_expediente', ['id' =>$paciente->id])}}" target="{{$paciente->id}}" class="d-inline">
                            <button type="submit" class="btn btn-inverse btn-lg eliminar tooltipsC pull-right" title="Ver expediente">
                                <i class="fa fa-folder-open-o"> Abrir Expediente</i>
                            </button>
                        </form>
                    </h4>
                    <table id="tabla-data" class="table  table-bordered table-hover">
                        <thead>
                            <tr style="background: rgb(239, 245, 209)">
                                <th  style="text-align: center; width:10%"> <u>Fecha</u></th>
                                <th  style="text-align: center; width:31%"> <u>Motivo</u></th>
                                <th  style="text-align: center; width:31%"> <u>Diagnóstico</u></th>
                                <th  style="text-align: center; width:9%"> <u>Receta</u></th>
                                <th  style="text-align: center; width:8%"> <u>E.G.</u></th>
                                <th  style="text-align: center; width:11%"> <u>Opción</u></th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($datos as $consulta)
                                <tr>
                                    <td style="text-align: center;">
                                        {{$consulta["fecha"]}}
                                    </td>
                                    <td style="text-align: center;">
                                        {{$consulta["motivo"]}}
                                    </td>
                                    <td style="text-align: center;">
                                        {{$consulta["diagnostico"]}}
                                    </td>
                                    <td style="text-align: center;">
                                        @if($consulta["receta_id"]!="no")
                                            <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                        @else
                                            <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        @if($consulta["gabinete_id"]!="no")
                                            <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                        @else
                                            <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        <form action="{{route('consulta_paciente', ['id' =>$consulta["consulta_id"]])}}" target="{{$consulta["consulta_id"]}}" class="d-inline">
                                            <button type="submit" class="btn btn-inverse btn-xs eliminar tooltipsC" title="Ver Consulta">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </Table>
                @endif
            </div>
        </div>
    @endsection
