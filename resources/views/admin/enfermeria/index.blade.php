@extends("theme.$theme.layout")
@section('titulo')
    Enfermeria
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/enfermeria/validar.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Registro de Enfermería
        @if(Auth::user()->rol->añadir ==1)
            <div class="box-tools pull-right">
                <a href="{{route('crear_enfermeria')}}" class="btn btn-block btn-success btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Nuevo Registro
                </a>
            </div>
        @endif
    </h1>
</div>
@php
setlocale(LC_ALL,"es_CO.utf8");
    $data =strtotime($fecha_actual);
    $formato_fecha = strtolower(strftime("%A %d de %B", $data));

    $aux = new \DateTime();
    $aux=$aux->format('Y-m-d');
@endphp
<span class="blue center">
    <h3><b>Registro de Atención Para: {{$formato_fecha}}</b>
        <button  class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#VerFecha" title="Ir a Fecha">
            <i class="fas fa fa-calendar"> Ver Por Fecha</i>
        </button>
        @if ($aux!=$fecha_actual)
            <button  class="btn btn-xs btn-primary pull-right " title="Volver" onclick="location.href='{{route('enfermeria')}}'">
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
                        <th class="col-lg-1" style="text-align: center;">Orden</th>
                        <th class="col-lg-4" style="text-align: center;">Nombres y Apellidos</th>
                        <th class="col-lg-2" style="text-align: center;">Edad</th>
                        <th class="col-lg-3" style="text-align: center;">Atención</th>
                        <th class="col-lg-2" style="text-align: center;">Opción</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count=1;
                    @endphp
                    @foreach ($datos as $enf)
                        <tr>
                            <td style="text-align: center;">{{$count}}</td>
                            <td style="text-align: center;">{{$enf->nombre}} {{$enf->apellido}}</td>
                            <td style="text-align: center;">
                                {{$edad= MyHelper::Edad_Paciente($enf->fecha_nac,"index")}}
                            </td>
                            <td style="text-align: center;">
                                @if ($enf->atencion_c==1)
                                    <i><span class="red"><b>-Curacion</b></span></i>
                                @endif
                                @if ($enf->atencion_i==1)
                                    <i><span class="blue"><b>-Inyectable</b></span></i>
                                @endif
                                @if ($enf->atencion_s==1)
                                    <i><span class="pink"><b>-Suero</b></span></i>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                @if ($enf->fecha==$aux)
                                    <div class="hidden-sm hidden-xs btn-group">
                                        @if(Auth::user()->rol->editar ==1)
                                            <a href="{{route('editar_enfermeria', ['id' => $enf->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar Registro">
                                                <i class="fas fa fa-pencil"></i>
                                            </a>
                                        @endif
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="hidden-sm hidden-xs btn-group">
                                        @if(Auth::user()->rol->eliminar ==1)
                                            <form action="{{route('eliminar_enfermeria', ['id' => $enf->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
                                                @csrf @method("delete")
                                                <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Registro">
                                                    <i class="fa fa fw fa-close"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

