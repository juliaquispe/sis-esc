@extends("theme.$theme.layout")
@section('titulo')
    Crear_Ficha
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/ficha/validar.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
<script>
    function mostrar(id) {
        if (id !=null) {
            $("#buscar").show();
        }
        else
            $("#buscar").hide();
    }
</script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        <h1 style="color: rgb(30, 80, 109)" class=" center">
            <b>{{$servicio->nombre}}</b>
            {{-- <button class="btn btn-purple pull-right" onclick="location.href='{{route('calendario')}}'"><i class="fa fa-calendar"></i> Agenda de Atención</button> --}}
        </h1>
    </h1>
</div>
@include('mensajes.incorrecto')
@include('mensajes.correcto')
@include('mensajes.error')
    <div class="row">
        <div class="col-xs-12">
            @php
                setlocale(LC_ALL,"es_CO.utf8");
                $data =strtotime($fecha_actual);
                $formato_fecha = strtolower(strftime("%A %d de %B", $data));

                $aux = new \DateTime();
                $aux=$aux->format('Y-m-d');
            @endphp
            <span class="blue center">
                <h3><b>Nómina de Atención Para: {{$formato_fecha}}</b>
                    <button  class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#VerFecha" title="Ir a Fecha">
                        <i class="fas fa fa-calendar"> Ver Por Fecha</i>
                    </button>
                    @if ($aux!=$fecha_actual)
                        <button  class="btn btn-xs btn-primary pull-right " title="Volver" onclick="location.href='{{route('consulta')}}'">
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
            <div class="box-body">
                <table id="tabla-data" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="col-lg-1.5" style="text-align: center;">Hora</th>
                            <th class="col-lg-2" style="text-align: center;">Expediente</th>
                            <th class="col-lg-3.5" style="text-align: center;">Nombres y Apellidos</th>
                            <th class="col-lg-2" style="text-align: center;">Edad</th>
                            <th class="col-lg-2" style="text-align: center;">Estado</th>
                            <th class="col-lg-2" style="text-align: center;">Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichas as $ficha)
                            <tr>
                                <td style="text-align: center;">
                                    @php
                                        $aux=strtotime($ficha->hora);
                                        $hora=date("H:i", $aux)
                                    @endphp
                                        {{$hora}}
                                </td>
                                <td style="text-align: center;">
                                    {{$expediente= MyHelper::num_expediente($ficha->paciente->id)}}
                                </td>
                                <td style="text-align: center;">{{$ficha->paciente->apellido_p}} {{$ficha->paciente->apellido_m}} {{$ficha->paciente->nombre}}</td>
                                <td style="text-align: center;">
                                    {{$edad=MyHelper:: Edad_Paciente($ficha->paciente->fecha_nac, "index")}}
                                </td>
                                <td style="text-align: center;">
                                    @if ($ficha->estado==1)
                                        <span class="label label-lg label-success arrowed-in arrowed-in-right"> Atendido</span>
                                    @else
                                        @if ($ficha->estado==2)
                                            <span class="label label-lg label-danger arrowed-in arrowed-in-right"> Faltó</span>
                                        @else
                                            <span class="label label-lg label-danger arrowed-in arrowed-in-right"> En espera</span>
                                        @endif
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if ($ficha->estado==0)
                                        <form action="{{route('crear_consulta', ['id' => $ficha->id])}}" class="d-inline">
                                            <button type="submit" class="btn btn-info btn-xs eliminar tooltipsC" title="Pasar a Consulta">
                                                <i class="fa fa fw fa-stethoscope"></i>
                                            </button>
                                        </form>
                                    @else
                                        @if ($ficha->estado==1)
                                            <form action="{{route('crear_consulta', ['id' => $ficha->id])}}" class="d-inline">
                                                <button type="submit" class="btn btn-inverse btn-xs eliminar tooltipsC" title="Editar consulta">
                                                    <i class="fa fa fw fa-stethoscope"></i>
                                                </button>
                                            </form>
                                        @endif
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

