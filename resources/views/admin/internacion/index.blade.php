@extends("theme.$theme.layout")
@section('titulo')
    Internación
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/internacion/camas.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Lista de Internos
        <div class="box-tools pull-right">
            <a href="{{route('internacion_alta')}}" class="btn btn-block btn-success btn-sm">
                <i class="fa fas fa-arrow-right"></i> Internos dados de Alta
            </a>
        </div>
    </h1>
</div>
<div class="row center">
    <div class="hidden-sm hidden-xs btn-group">
        <button type="button" onclick="location.href='{{route('num_camas', ['dato' => 'menos'])}}'"class="btn btn-xs btn-danger" id="btn_menos"><i class="fa fa-fw fa-minus"></i></button>
    </div>
    <div class="hidden-sm hidden-xs btn-group">
        <span class="blue"><h3>{{$valor}}</h3> </span>
    </div>
    <div class="hidden-sm hidden-xs btn-group">
        <button type="button" onclick="location.href='{{route('num_camas', ['dato' => 'mas'])}}'" class="btn btn-xs btn-success" id="btn_mas"><i class="fa fa-fw fa-plus"></i></button>
    </div>
</div>
<div class="row">
    @foreach ($cama_objeto as $cama)
        @if($cama->estado=='libre')
            <div class="col-lg-3" >
                <div class="infobox infobox-green infobox-dark center">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-bed zoom "></i>
                    </div>
                    <div class="infobox-data center">
                        <span class="infobox-data-number">{{$cama->orden}}</span>
                        <h4><div class="infobox-content">{{$cama->estado}}</div></h4>
                    </div>
                    <div class="badge badge-danger">
                            <a href="{{route('mantenimiento_cama', ['id' => $cama->orden, 'estado'=>'mantenimiento'])}}" class="white">M</a>
                    </div>
                </div>
            </div>
        @else
            @if ($cama->estado=='mantenimiento')
                <div class="col-lg-3" >
                    <div class="infobox infobox-orange infobox-dark center">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-bed zoom "></i>
                        </div>
                        <div class="infobox-data center">
                            <span class="infobox-data-number">{{$cama->orden}}</span>
                            <h4><div class="infobox-content">{{$cama->estado}}</div></h4>
                        </div>
                        <div class="badge badge-danger">
                            <a href="{{route('mantenimiento_cama', ['id' => $cama->orden, 'estado'=>'libre'])}}" class="white"><i class="fa fa-check"></i></a>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-3" >
                    <div class="infobox infobox-red infobox-dark center">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-bed zoom "></i>
                        </div>
                        <div class="infobox-data center">
                            <span class="infobox-data-number">{{$cama->orden}}</span>
                            <h4><div class="infobox-content">{{$cama->estado}}</div></h4>
                        </div>
                    </div>
                </div>
            @endif

        @endif
    @endforeach
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.correcto')
        @include('mensajes.incorrecto')
        <div class="box-body">
            <table id="tabla-data" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="col-lg-2" style="text-align: center;">Cama</th>
                        <th class="col-lg-2" style="text-align: center;">Fecha de Ingreso</th>
                        <th class="col-lg-4" style="text-align: center;">Paciente</th>
                        <th class="col-lg-2" style="text-align: center;">Núm. Emergencias</th>
                        <th class="col-lg-2" style="text-align: center;">Opción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $dato)
                        <tr>
                            <td style="text-align: center;">{{$dato->cama}}</td>
                            <td style="text-align: center;">{{$dato->fecha_ingreso}}</td>
                            <td style="text-align: center;">{{$dato->paciente->nombre}} {{$dato->paciente->apellido_p}} {{$dato->paciente->apellido_m}}</td>
                            <td style="text-align: center;">
                                @if ($dato->contacto_emergencia==null)
                                    <span class="red">No Registrado</span>
                                @else
                                    {{$dato->contacto_emergencia}}
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <div class="hidden-sm hidden-xs btn-group">
                                    @if(Auth::user()->rol->editar ==1)
                                        <a href="{{route('editar_internacion', ['id' => $dato->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar Interno">
                                            <i class="fas fa fa-pencil"></i>
                                        </a>
                                    @endif
                                </div>&nbsp;&nbsp;
                                <div class="hidden-sm hidden-xs btn-group">
                                    <form action="{{route('imprimir_internacion', ['id' => $dato->id])}}" target="{{$dato->id}}" class="d-inline">
                                        <button type="submit" class="btn btn-success btn-xs eliminar tooltipsC" title="Imprimir Internación">
                                            <i class="fa fa fw fa-download"></i>
                                        </button>
                                    </form>
                                </div>&nbsp;&nbsp;
                                @if(Auth::user()->rol->añadir == 1)
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <button onclick="location.href='{{route('alta', ['id' => $dato->id])}}'" class="btn btn-xs btn-danger" title="solicitar alta">
                                            <i class="ace-icon fa fa-bed bigger-120"></i>
                                        </button>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

