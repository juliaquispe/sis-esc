@extends("theme.$theme.layout")
@section('titulo')
    Fichas
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/ficha/validar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
@if(Auth::user()->rol->añadir ==1)
<span class="blue"> <h3>Lista de Servicios</h3></span>
<div class="row">
    <div class="col-xs-12">
        <div style="text-align: center">
            <h5 class="center">
            <ul class="ace-thumbnails clearfix">
                @foreach ($servicios as $servicio)
                    <div class="ace-thumbnails clearfix col-lg-2">
                        <span class="blue">{{$servicio->nombre}}</span><br>
                        <li>
                            <a href="{{route('crear_ficha', ['id' => $servicio->id])}}">
                                @if ($servicio->foto==null)
                                    <img width="160" height="120" src="{{asset("assets/$theme/assets/images/avatars/servicio.jpg")}}"/>
                                @else
                                    <img width="160" height="120" src="{{Storage::url("Datos/Servicio/Foto/$servicio->foto")}}"/>
                                @endif
                                <div class="text">
                                    <div class="inner">Registrar {{$servicio->nombre}}</div>
                                </div>
                            </a>
                        </li>
                    </div>
                @endforeach
            </ul>
            </h5>
        </div>
    </div>
</div>
@endif <br><br>
@php
    setlocale(LC_ALL,"es_CO.utf8");
    $data =strtotime($fecha_actual);
    $formato_fecha = strtolower(strftime("%A %d de %B", $data));

    $aux = new \DateTime();
    $aux=$aux->format('Y-m-d');
@endphp
<span class="blue center">
    <h3><b>Nómina de Atención para: {{$formato_fecha}}</b>
        <button  class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#VerFecha" title="Ir a Fecha">
            <i class="fas fa fa-calendar"> Ver Por Fecha</i>
        </button>
        @if ($aux!=$fecha_actual)
            <button  class="btn btn-xs btn-primary pull-right " title="Volver" onclick="location.href='{{route('ficha')}}'">
                <i class="fa fa-faw fa-reply-all bigger-120"></i>
            </button>
        @endif
    </h3>
</span>
<div class="modal modal-info fade in" id="VerFecha" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #f1f5db">
            <div class="modal-header " style="background: #192953">
                <button type="button" class="white close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="white modal-title" style="text-align: center"><b>Seleccionar la Fecha</b></h4>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                    <div class="profile-info-row">
                        <div class="profile-info-name"><u>Fecha</u>:</div>
                        <div class="profile-info-value">
                            <input type="date"class="form-control" name="ver_fecha" id="ver_fecha" value="{{old('fecha', $aux)}}" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background: #192953">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Mostrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.correcto')
        @include('mensajes.incorrecto')
        <div class="box-body">
            <table id="tabla-data" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="col-lg-1" style="text-align: center;">Expediente</th>
                        <th class="col-lg-3" style="text-align: center;">Paciente</th>
                        <th class="col-lg-2" style="text-align: center;">Especielidad</th>
                        <th class="col-lg-3" style="text-align: center;">Edad</th>
                        <th class="col-lg-1" style="text-align: center;">Hora</th>
                        <th class="col-lg-1" style="text-align: center;">Estado</th>
                        <th class="col-lg-1" style="text-align: center;">Opción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $ficha)
                        <tr>
                            <td style="text-align: center;">{{$ficha->paciente->id}}</td>
                            <td style="text-align: center;">{{$ficha->paciente->nombre}} {{$ficha->paciente->apellido_p}} {{$ficha->paciente->apellido_m}}</td>
                            <td style="text-align: center;">{{$ficha->servicio->nombre}}</td>
                            <td style="text-align: center;">
                                {{$edad=MyHelper:: Edad_Paciente($ficha->paciente->fecha_nac, "index")}}
                            </td>
                            <td style="text-align: center;">
                                @php
                                    $aux=strtotime($ficha->hora);
                                    $hora=date("H:i", $aux)
                                @endphp
                                    {{$hora}}
                            </td>
                            <td style="text-align: center;">
                                @if ($ficha->estado==1)
                                    <span class="label label-lg label-success arrowed-in arrowed-in-right">Atendido</span>
                                @else
                                    <span class="label label-lg label-danger arrowed-in arrowed-in-right">En Espera</span>
                                    @endif
                            </td>
                            <td style="text-align: center;">
                                @if(Auth::user()->rol->editar ==1)
                                    @if ($ficha->estado==0)
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <button  class="btn btn-xs btn-warning" data-toggle="modal" data-target="#EditarFicha{{$ficha->id}}" title="registrar ficha">
                                                <i class="fas fa fa-pencil-square-o bigger-120"></i>
                                            </button>
                                            <div class="modal modal-info fade in" id="EditarFicha{{$ficha->id}}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="background: #f1f5db">
                                                        <div class="modal-header " style="background: #192953">
                                                            <button type="button" class="white close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="white modal-title" style="text-align: center"><b>Editar Ficha</b></h4>
                                                        </div>
                                                        <form class="form-horizontal" role="form" id="form-general"  action="{{route ('actualizar_ficha', ['id'=>$ficha->id])}}"  method="POST">
                                                            @csrf @method("put")
                                                            <div class="modal-body">
                                                                @php
                                                                    $paciente=MyHelper:: Datos_Paciente($ficha->paciente_id);
                                                                    $servicio=MyHelper:: Datos_Servicio($ficha->servicio_id);
                                                                @endphp
                                                                    @include('admin/ficha/form')
                                                            </div>
                                                            <div class="modal-footer" style="background: #192953">
                                                                @include('botones/actualizar')
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                @if(Auth::user()->rol->eliminar ==1)
                                    @if ($ficha->estado==0)
                                        <form action="{{route('eliminar_ficha', ['id' => $ficha->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Ficha">
                                                <i class="fa fa fw fa-close"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endif
                                {{-- <div class="hidden-sm hidden-xs btn-group">
                                    @if(Auth::user()->rol->eliminar ==1)
                                        <form action="{{route('eliminar_ficha', ['id' => $ficha->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar este Registro">
                                                <i class="fa fa fw fa-close"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


