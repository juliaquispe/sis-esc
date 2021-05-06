@extends("theme.$theme.layout")
@section('titulo')
	Clínica
@endsection
@section('contenido')
<link rel="stylesheet" href="{{asset("assets/css/zoom.css")}}"/>
    <div class="page-header">
        <h1>
            <h1 style="text-align: center"><u><b>DATOS DE LA CLÍNICA</b></u></h1>
           <div class="box-tools pull-right">
                @if(Auth::user()->rol->editar ==1)
                    <a href="{{route('editar_clinica', ['id' => $datos->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar Clinica">
                        <i class="fas fa fa fa-pencil"></i> Editar Datos
                    </a>
                @endif
            </div>&nbsp;&nbsp;
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            @include('mensajes.correcto')
            @include('mensajes.incorrecto')
            <div class="col-xs-12 col-sm-5 center">
                <div>
                    <span class="profile-picture">
                        @if ($datos->foto==null)
                        <img src="{{asset("assets/$theme/assets/images/avatars/foto.jpeg")}}" height="270px" width="350px"/>
                        @else
                        <img src="{{Storage::url("Datos/Clinica/$datos->foto")}}" height="270px" width="350px"/>
                        @endif
                    </span>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <div class="col-xs-12 col-sm-7">
                <div class="">
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Nombre</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>{{$datos->nombre}}</i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Dirección</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>
                                    @if($datos->direccion==null)
                                    No Tiene
                                    @else
                                        {{$datos->direccion}}
                                    @endif
                                </i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Teléfono</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>
                                    @if($datos->telefono==null)
                                    No Tiene
                                    @else
                                        {{$datos->telefono}}
                                    @endif
                                </i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Contacto 1</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>
                                    @if($datos->contacto_1==null)
                                    No Tiene
                                    @else
                                        {{$datos->contacto_1}}
                                    @endif
                                </i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Contacto 2</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>
                                    @if($datos->contacto_2==null)
                                    No Tiene
                                    @else
                                        {{$datos->contacto_2}}
                                    @endif
                                </i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Propietario</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>{{$datos->propietario}}</i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Logo</u>:</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @if ($datos->logo==null)
                                <img class="img-circle zoom" src="{{asset("assets/$theme/assets/images/avatars/logo.jpg")}}" width="10%"/>
                                @else
                                <img class="img-circle zoom" src="{{Storage::url("Datos/Clinica/$datos->logo")}}" width="10%"/>
                                @endif
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> <u>tema</u>:</div>
                            <div class="profile-info-value">
                                @if($datos->color=="skin-1")
                                    <span class="label label-lg label-inverse arrowed-right">Oscuro</span>
                                @endif
                                @if($datos->color=="skin-2")
                                    <span class="label label-lg label-pink arrowed-right">Morado</span>
                                @endif
                                @if($datos->color=="skin-3")
                                    <span class="label label-lg label-light arrowed-right">Claro</span>
                                @endif
                                @if($datos->color=="no-skin")
                                    <span class="label label-lg label-info arrowed-right">Azul</span>
                                @endif
                            </div>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
        <table id="tabla-data" class="table  table-bordered table-hover" >
            <tr class="bacground: blue">
                <td class="col-lg-2 colo" style="text-align: center;"><u>Misión</u>:</td>
                <td class="col-lg-2 colo" style="text-align: center;"><u>Visión</u>:</td>
                <td class="col-lg-3 colo" style="text-align: center;"><u>Descripción</u>:</td>
            </tr>
            <tr>
                <td style="text-align: center;" id="alto"><i>{{$datos->mision}}</i></td>
                <td style="text-align: center;" id="alto"><i>{{$datos->vision}}</i></td>
                <td style="text-align: center;" id="alto"><i>{{$datos->descripcion}}</i></td>
            </tr>
        </table>
        <style>
            .colo {
            float:left;
            width:30%;
            background:rgb(227, 239, 241);
            }
            #alto {
                height: 80px;
            }
        </style>
    </div>
@endsection
