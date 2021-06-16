@extends("theme.$theme.layout")

@section('titulo')
	Pacientes
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/personal/estado.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/paciente/modal.js")}}" type="text/javascript"></script>
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
            Lista de Pacientes
            <div class="box-tools pull-right">
                @if(Auth::user()->rol->añadir ==1)
                    <a href="{{route('crear_paciente')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Crear Paciente
                    </a>
                @endif
            </div>
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            @include('mensajes.correcto')
            @include('mensajes.incorrecto')
            <div class="col-xs-12">
                <form class="form-inline ml-3">
                    <div class="col-xs-3">
                        Buscar Por:
                        <select id="seleccion" name="seleccion" onChange=mostrar(this.value);>
                            <option value="">Elija una Opción</option>
                            <option value="apellido_p">Apellido Paterno</option>
                            <option value="apellido_m">Apellido Materno</option>
                            <option value="ci">N° de Carnet</option>
                            <option value="id">N° de Expediente</option>
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
                        <a href="{{route('paciente')}}" class="ver-curriculum btn btn-primary btn-xs tooltipC pull-right" title="volver">
                            <i class="glyphicon glyphicon-ok"></i>
                        </a>
                    </div>
                </div>
            @endif
            <div class="box-body">
                <table id="tabla-data" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <form action="{{route('ordenar_paciente')}}" method="POST" name="form2">
                                <th class="col-lg-1.5" style="text-align: center;">Expediente
                                    @csrf
                                    <input type="hidden" id="id" name="id" value=3>
                                    <input type="hidden" id="search" name="search" value="{{old('search', $search ?? '')}}">
                                    <input type="hidden" id="selec" name="selec" value="{{$seleccion}}" >
                                    <button  type="submit" class="pull-right" style="border:0">
                                        @if($aux==3)
                                            <i class="glyphicon glyphicon-triangle-bottom pull-right" style="color: navy"></i>
                                        @else
                                            <i class="glyphicon glyphicon-sort pull-right"></i>
                                        @endif
                                    </button>
                                </th>
                            </form>
                            <form action="{{route('ordenar_paciente')}}" method="POST" name="form2">
                                <th class="col-lg-1.5" style="text-align: center;">Nombres y Apellidos
                                    @csrf
                                    <input type="hidden" id="id" name="id" value=1>
                                    <input type="hidden" id="search" name="search" value="{{old('search', $search ?? '')}}">
                                    <input type="hidden" id="selec" name="selec" value="{{$seleccion}}" >
                                    <button  type="submit" class="pull-right" style="border:0">
                                        @if($aux==1)
                                            <i class="glyphicon glyphicon-triangle-bottom pull-right" style="color: navy"></i>
                                        @else
                                        <i class="fa fa-sad-tear"></i>
                                            <i class="glyphicon glyphicon-sort pull-right"></i>
                                            @endif
                                    </button>
                                </th>
                            </form>
                            <form action="{{route('ordenar_paciente')}}" method="POST" name="form2">
                                <th class="col-lg-1.5" style="text-align: center;">Nro de Carnet
                                    @csrf
                                    <input type="hidden" id="id" name="id" value=2>
                                    <input type="hidden" id="search" name="search" value="{{old('search', $search ?? '')}}">
                                    <input type="hidden" id="selec" name="selec" value="{{$seleccion}}" >
                                    <button  type="submit" class="pull-right" style="border:0">
                                        @if($aux==2)
                                            <i class="glyphicon glyphicon-triangle-bottom pull-right" style="color: navy"></i>
                                        @else
                                            <i class="glyphicon glyphicon-sort pull-right"></i>
                                        @endif
                                    </button>
                                </th>
                            </form>
                            <form action="{{route('ordenar_paciente')}}" method="POST" name="form2">
                                <th class="col-lg-1.5" style="text-align: center;">Edad
                                    @csrf
                                    <input type="hidden" id="id" name="id" value=4>
                                    <input type="hidden" id="search" name="search" value="{{old('search', $search ?? '')}}">
                                    <input type="hidden" id="selec" name="selec" value="{{$seleccion}}" >
                                    <button  type="submit" class="pull-right" style="border:0">
                                        @if($aux==4)
                                            <i class="glyphicon glyphicon-triangle-bottom pull-right" style="color: navy"></i>
                                        @else
                                            <i class="glyphicon glyphicon-sort pull-right"></i>
                                        @endif
                                    </button>
                                </th>
                            </form>
                            <form action="{{route('ordenar_paciente')}}" method="POST" name="form2">
                                <th class="col-lg-1.5" style="text-align: center;">Contacto
                                    @csrf
                                    <input type="hidden" id="id" name="id" value=5>
                                    <input type="hidden" id="search" name="search" value="{{old('search', $search ?? '')}}">
                                    <input type="hidden" id="selec" name="selec" value="{{$seleccion}}" >
                                    <button  type="submit" class="pull-right" style="border:0">
                                        @if($aux==6)
                                            <i class="glyphicon glyphicon-triangle-bottom pull-right" style="color: navy"></i>
                                        @else
                                            <i class="glyphicon glyphicon-sort pull-right"></i>
                                        @endif
                                    </button>
                                </th>
                            </form>
                            <th class="col-lg-1.5" style="text-align: center;">Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datos as  $pac)
                        <tr>
                            <td style="text-align: center;">
                                {{$expediente= MyHelper::num_expediente($pac->id)}}
                            </td>
                            <td style="text-align: center;">{{$pac->apellido_p}} {{$pac->apellido_m}} {{$pac->nombre}}</td>
                            <td style="text-align: center;">{{$pac->ci}}</td>
                            <td style="text-align: center;">
                                {{$edad= MyHelper::Edad_Paciente($pac->fecha_nac,"index")}}
                            </td>
                            <td style="text-align: center;">
                                @if ($pac->celular==null)
                                    <span class="red">{{"No Registrado"}}</span>
                                @else
                                    {{$pac->celular}}
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <div class="hidden-sm hidden-xs btn-group">
                                    @if(Auth::user()->rol->editar ==1)
                                        <a href="{{route('ver_paciente', ['id' => $pac->id])}}" class="btn btn-info btn-xs tooltipC" title="Ver Paciente">
                                            <i class="fas fa fa-plus"></i>
                                        </a>
                                    @endif
                                </div>&nbsp;
                                <div class="hidden-sm hidden-xs btn-group">
                                    @if(Auth::user()->rol->editar ==1)
                                        <a href="{{route('editar_paciente', ['id' => $pac->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar Paciente">
                                            <i class="fas fa fa-pencil"></i>
                                        </a>
                                    @endif
                                </div>&nbsp;
                                {{-- <div class="hidden-sm hidden-xs btn-group">
                                    @if(Auth::user()->rol->eliminar ==1)
                                        <form action="{{route('eliminar_paciente', ['id' => $pac->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Paciente">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div> --}}
                                <div class="hidden-sm hidden-xs btn-group">
                                    @if(Auth::user()->rol->eliminar ==1)
                                        <form action="{{route('inactivar_paciente', ['id' => $pac->id])}}" class="d-inline form-estado" method="POST" id="form-estado">
                                            @csrf @method("put")
                                            <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Dar de baja">
                                                <i class="ace-icon fa fa-ban"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$datos->links()}}
            </div>
        </div>
    </div>
    <div class="modal modal-info fade in" id="modal-ver-paciente" tabindex="-1" >
        <div class="white modal-dialog">
            <div class="modal-content"  style="background: #88887c">
                <div class="modal-header" style="background:#111d3b">
                    <button type="button" class="close white" data-dismiss="modal" aria-label="Close"  style="background:#97cae2">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" align="center"><b>Paciente</b></h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer" style="background:#111d3b">
                    <button type="button" class="btn btn-info" data-dismiss="modal"><b>Cerrar</b></button>
                </div>
            </div>
        </div>
    </div>
@endsection


