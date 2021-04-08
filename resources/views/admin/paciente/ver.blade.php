@extends("theme.$theme.layout")
@section('titulo')
	Expediente
@endsection
@section('contenido')
<link rel="stylesheet" href="{{asset("assets/css/zoom.css")}}"/>
    <div class="page-header">
        <h1>
            <h1 style="text-color:pink"><u><b>EXPEDIENTE CLÍNICO</b></u></h1>
           <div class="box-tools pull-right">
                @if(Auth::user()->rol->editar ==1)
                    <a href="{{route('paciente')}}" class="btn btn-warning btn-xs tooltipC" title="Editar Clinica">
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
                                        @if($paciente->telefono==null)
                                            No Registrado
                                        @else
                                            {{$paciente->telefono}}
                                        @endif
                                    </i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Genero</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$paciente->genero}}</i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
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
                            </div>
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
            <table id="tabla-data" class="table  table-bordered table-hover" >
                <tr style="background: rgb(204, 228, 250)">
                    <td class="col-lg-1.6 colo" style="text-align: center;"><i class="glyphicon glyphicon-arrow-up" style="color:rgb(150, 87, 231)"></i> <u>Altura</u></td>
                    <td class="col-lg-1.6 colo" style="text-align: center;"><i class="fa fa-tachometer" style="color:rgb(64, 195, 228)"></i> <u>Peso</u></td>
                    <td class="col-lg-2 colo" style="text-align: center;"><i class="glyphicon glyphicon-piggy-bank" style="color:rgb(90, 212, 137)"></i> <u>I.M.C.</u></td>
                    <td class="col-lg-2 colo" style="text-align: center;"><i class="glyphicon glyphicon-fire orange"></i> <u>Temperatura</u></td>
                    <td class="col-lg-1.6 colo" style="text-align: center;"><i class="glyphicon glyphicon-dashboard blue"></i> <u>P.A.</u></td>
                    <td class="col-lg-1.6 colo" style="text-align: center;"><i class="glyphicon glyphicon-heart-empty red"></i> <u>F.C.</u></td>
                    <td class="col-lg-1.6 colo" style="text-align: center;"><i class="glyphicon glyphicon-flash" style="color:rgb(155, 115, 96)"></i> <u>F.R.</u></td>
                </tr>
                <tr>
                    <td style="text-align: center;" id="alto"><i>hola</i></td>
                    <td style="text-align: center;" id="alto"><i>hola</i></td>
                    <td style="text-align: center;" id="alto"><i>hola</i></td>
                    <td style="text-align: center;" id="alto"><i>hola</i></td>
                    <td style="text-align: center;" id="alto"><i>hola</i></td>
                    <td style="text-align: center;" id="alto"><i>hola</i></td>
                    <td style="text-align: center;" id="alto"><i>hola</i></td>
                </tr>
            </table>
            <table id="tabla-data" class="table  table-bordered table-hover" >
                <tr style="background: rgb(204, 228, 250)">
                    <td class="col-lg-2 colo" style="text-align: center;"><u>Misión</u>:</td>
                    <td class="col-lg-2 colo" style="text-align: center;"><u>Visión</u>:</td>
                    <td class="col-lg-3 colo" style="text-align: center;"><u>Descripción</u>:</td>
                </tr>
                <tr>
                    <td style="text-align: center;" id="alto"><i>hola</i></td>
                    <td style="text-align: center;" id="alto"><i>hola</i></td>
                    <td style="text-align: center;" id="alto"><i>hola</i></td>
                </tr>
            </table>
        </div>
    @endsection
