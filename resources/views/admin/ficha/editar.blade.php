@extends("theme.$theme.layout")
@section('titulo')
    Editar_Ficha
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/ficha/editar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Ficha
        <small>
            -<i class="ace-icon fa fa-angle-double-right"></i>
             Editar Ficha
        </small>
        <div class="box-tools pull-right">
            <a href="{{route('fichaje')}}" class="btn btn-block btn-info btn-sm">{{-- boton para ir a otra tabla --}}
                <style type="text/css">
                    .btn{
                    padding: 5px;
                    font-weight: 500;
                    font-size: 15px;
                    border-radius: 10px;
                    }
                </style>
                <i class="fa fa-fw fa-reply-all"></i>Volver a Lista de Fichas
              </a>
        </div>
    </h1>
</div>
@include('mensajes.incorrecto')
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        <form class="form-horizontal" role="form" id="form-general" action="{{route('actualizar_ficha', ['id' => $ficha->id])}}"  method="POST">
            @csrf @method("put")
            <div class="box-footer">
                <div class="col-xs-12 col-sm-4 align-right">
                    <span class="profile-picture">
                        @if ($paciente->foto==null)
                        <img src="{{asset("assets/$theme/assets/images/avatars/dos.jpg")}}" height="180px" width="200px"/>
                        @else
                        <img src="{{Storage::url("Datos/Paciente/Foto/$paciente->foto")}}" height="180px" width="200px"/>
                        @endif
                    </span>
                </div>
                <div class="col-xs-12 col-sm-6 align-left">
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Nombres y Apellidos</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>{{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}</i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>CI</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>
                                    @if($paciente->ci==null)
                                    No Tiene
                                    @else
                                        {{$paciente->ci}}
                                    @endif
                                </i></span>
                            </div>
                        </div>
                        @php
                            $fecha_actual = new \DateTime();
                            $fecha=$fecha_actual->format('Y-m-d');
                        @endphp
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Ficha de Atención</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable">
                                    <i>{{$ficha->fecha}} {{$ficha->hora}}</i>
                                </span>
                                <button type="button" class="btn btn-warning pull-right btn-sm" id="btn_modificar" name="btn_modificar" style="display: block;">
                                    <i class="fa fa-wrench"></i> Modificar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 align-left">
                    <div class="profile-user-info profile-user-info-striped">
                        <div id="div_fecha" style="display: none;">
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Fecha</u>:</div>
                                <div class="profile-info-value">
                                    <input type="date"class="form-control fecha" name="fecha" id="fecha" value="{{old('fecha', $ficha->fecha ?? $fecha)}}"/>
                                </div>
                            </div>
                        </div>
                        <div id="div_hora" style="display: none;">
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Hora</u>:</div>
                                <div class="profile-info-value" id="div_select">
                                    <button type="button" class="form-control btn-primary" id="horario" name="horario" style="display: block;">
                                        <span class="white">Horario Disponible</span>
                                    </button>
                                    <div id="div_select_horario" style="display: none;">

                                    </div>
                                    <div id="div_hidden" style="display: block;">
                                        <input type="hidden" id="hidden">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 center"><br><br>
                    <div class="col-sm-12" id="default-buttons">
                        <button class="boton_cancelar" type="button" id="btn_cancel">Cancelar</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <style type="text/css">
                            .boton_cancelar{
                            text-decoration: none;
                            padding: 5px;
                            font-weight: 500;
                            font-size: 17px;
                            color: #8b2619;
                            background-color: #f08374;
                            border-radius: 10px;
                            border: 2px solid #8b2619;
                            }
                            .boton_cancelar:hover{
                            color: #f3dfdc;;
                            background-color: #8b2619;
                            border: 2px solid  #f1bab2;
                            }
                        </style>
                        <button class="boton_personalizado" type="submit">Actualizar</button>
                        <style type="text/css">
                            .boton_personalizado{
                            text-decoration: none;
                            padding: 5px;
                            font-weight: 500;
                            font-size: 17px;
                            color:  #144288;
                            background-color: #79aff5;
                            border-radius: 10px;
                            border: 2px solid #144288;
                            }
                            .boton_personalizado:hover{
                            color: #79aff5;
                            background-color: #144288;
                            border: 2px solid #79aff5;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


