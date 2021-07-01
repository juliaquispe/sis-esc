@extends("theme.$theme.layout")

@section('titulo')
	Fichas
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/ficha/crear.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
    <div class="page-header">
        <h1>
            Lista de Fichas
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
                    <i class="fa fa-fw fa-reply-all"></i>Volver a Consultas
                    </a>
            </div>
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            @include('mensajes.correcto')
            @include('mensajes.incorrecto')
            <div class="col-xs-12">
                <form action="{{route('guardar_ficha')}}" id="form-general" class="form-horizontal" method="POST">
                    @csrf
                    <div class="box-footer">
                        <div class="col-xs-12 col-sm-5 align-right">
                            <span class="profile-picture">
                                @if ($paciente->foto==null)
                                <img src="{{asset("assets/$theme/assets/images/avatars/dos.jpg")}}" height="180px" width="200px"/>
                                @else
                                <img src="{{Storage::url("Datos/Paciente/Foto/$paciente->foto")}}" height="180px" width="200px"/>
                                @endif
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-5 align-left">
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
                                    <div class="profile-info-name"><u>Fecha</u>:</div>
                                    <div class="profile-info-value col-lg-12">
                                        <input type="date"class="form-control fecha" name="fecha" id="fecha" value="{{old('fecha', $ficha->fecha ?? $fecha)}}" required/>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"><u>Hora</u>:</div>
                                    <div class="profile-info-value col-lg-12" id="div_select">
                                        <button type="button" class="form-control btn-primary" id="horario" name="horario" style="display: block;">
                                            <span class="white">Turnos Disponibles</span>
                                        </button>
                                        <div id="div_select_horario" style="display: none;">

                                        </div>
                                        <div id="div_hidden" style="display: block;">
                                            <input type="hidden" id="hidden" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 center"><br><br><br>
                            @include('botones/guardar')
                        </div>
                        <input type="hidden" id="paciente_id" name="paciente_id" value="{{$paciente->id}}">
                        <input type="hidden" id="servicio_id" name="servicio_id" value="1">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


