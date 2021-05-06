@extends("theme.$theme.layout")
@section('titulo')
    Crear_Ficha
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/ficha/validar.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
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
        <h3 style="color: rgb(30, 80, 109)" class=" center">Registrar Ficha para:
                <b>{{$servicio->nombre}}</b>
        </h3>
    </h1>
</div>
@include('mensajes.incorrecto')
@include('mensajes.correcto')
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        <div class="col-xs-12">
            <form class="form-inline ml-3">
                <div class="col-xs-3">
                    Buscar Por:
                    <select id="seleccion" name="seleccion" onChange=mostrar(this.value);>
                        <option value="">Elija una Opción</option>
                        <option value="apellido_p">Apellido Paterno</option>
                        <option value="apellido_m">Apellido Materno</option>
                        <option value="ci">N° de Carnet</option>
                        <option value="ci">N° de Expediente</option>
                        <option value="celular">Telf/Cel</option>
                    </select>
                </div>
                <div class="col-xs-4">
                    <div id="buscar" style="display: none;">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" placeholder="Buscar..." aria-label="search" value="{{$search}}" autocomplete="off">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-flat">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if ($search)
            <div class="col-xs-12">
                <div class="alert alert-info">
                    <i class="ace-icon fa fa-hand-o-right"></i>
                    Los resultados de tu busqueda <b>'{{$search}}'</b> son:
                    <a href="{{route('crear_ficha', ['id' => $servicio->id])}}" class="btn btn-primary btn-xs tooltipC pull-right" title="volver">
                        <i class="glyphicon glyphicon-ok"></i>
                    </a>
                </div>
            </div>
        @endif
        @if ($datos)
        <span class="blue center"><h3>RESULTADO DE BÚSQUEDA</h3></span>
            <div class="box-body">
                <table id="tabla-data" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="col-lg-2" style="text-align: center;">Expediente</th>
                            <th class="col-lg-4" style="text-align: center;">Nombres y Apellidos</th>
                            <th class="col-lg-2" style="text-align: center;">Número de Carnet</th>
                            <th class="col-lg-2" style="text-align: center;">Edad</th>
                            <th class="col-lg-2" style="text-align: center;">Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datos as  $paciente)
                            <tr>
                                <td style="text-align: center;">Exp 1</td>
                                <td style="text-align: center;">{{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}</td>
                                <td style="text-align: center;">{{$paciente->ci}}</td>
                                <td style="text-align: center;">{{$edad= MyHelper::Edad_Paciente($paciente->fecha_nac,"index")}}</td>
                                <td style="text-align: center;">
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <button  class="btn btn-xs btn-info" data-toggle="modal" data-target="#CrearFicha{{$paciente->id}}" title="registrar ficha">
                                            <i class="fa fa-book bigger-120"></i>
                                        </button>
                                        <div class="modal modal-info fade in" id="CrearFicha{{$paciente->id}}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background: #f1f5db">
                                                    <div class="modal-header " style="background: #192953">
                                                        <button type="button" class="white close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="white modal-title" style="text-align: center"><b>Crear Ficha</b></h4>
                                                    </div>
                                                    <form class="form-horizontal" role="form" id="form-general"  action="{{route ('guardar_ficha')}}"  method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            @include('admin/ficha/form')
                                                        </div>
                                                        <div class="modal-footer" style="background: #192953">
                                                            @include('botones/guardar')
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else <br><br>
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
                        <button  class="btn btn-xs btn-primary pull-right " title="Volver" onclick="location.href='{{route('crear_ficha', ['id' => $servicio->id])}}'">
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
                            <th class="col-lg-1" style="text-align: center;">Expediente</th>
                            <th class="col-lg-3" style="text-align: center;">Nombre y Apellidos</th>
                            <th class="col-lg-3" style="text-align: center;">Edad</th>
                            <th class="col-lg-1" style="text-align: center;">Hora</th>
                            <th class="col-lg-2" style="text-align: center;">Estado</th>
                            <th class="col-lg-2" style="text-align: center;">Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichas as $ficha)
                            <tr>
                                <td style="text-align: center;">{{$ficha->paciente->id}}</td>
                                <td style="text-align: center;">{{$ficha->paciente->nombre}} {{$ficha->paciente->apellido_p}} {{$ficha->paciente->apellido_m}}</td>
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
                                        <span class="label label-lg label-success arrowed-in arrowed-in-right"> Atendido</span>
                                    @else
                                        <span class="label label-lg label-danger arrowed-in arrowed-in-right"> En espera</span>
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
                                    @if ($ficha->estado==0)
                                        <form action="{{route('imprimir_ficha', ['id' => $ficha->id])}}" target="{{$ficha->id}}" class="d-inline">
                                            <button type="submit" class="btn btn-success btn-xs eliminar tooltipsC" title="Imprimir Ficha">
                                                <i class="fa fa fw fa-download"></i>
                                            </button>
                                        </form>
                                    @endif
                                    @if ($ficha->estado==0)
                                        <form action="{{route('crear_consulta', ['id' => $ficha->id])}}" class="d-inline">
                                            <button type="submit" class="btn btn-info btn-xs eliminar tooltipsC" title="Pasar a Consulta">
                                                <i class="fa fa fw fa-stethoscope"></i>
                                            </button>
                                        </form>
                                    @else
                                    {{--
                                        <form action="{{route('imprimir_ficha', ['id'=>$ficha->id])}}" target="{{$ficha->id}}">
                                            <button class="btn btn-success btn-xs eliminar tooltipsC" type="submit" title="Ver Consulta"><i class="fa fa-file-pdf-o"></i></button>
                                        </form>
                                     --}}
                                        <form action="{{route('crear_consulta', ['id' => $ficha->id])}}" class="d-inline">
                                            <button type="submit" class="btn btn-inverse btn-xs eliminar tooltipsC" title="Editar consulta">
                                                <i class="fa fa fw fa-stethoscope"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection

