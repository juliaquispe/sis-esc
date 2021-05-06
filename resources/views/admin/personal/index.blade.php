
@extends("theme.$theme.layout")

@section('titulo')
	Personal
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/personal/modal.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/personal/estado.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
    <div class="page-header">
        <h1>
            Lista de Personal
            <div class="box-tools pull-right">
                @if(Auth::user()->rol->añadir ==1)
                    <a href="{{route('crear_personal')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Crear Personal
                    </a>
                @endif
            </div>
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            @include('mensajes.correcto')
            @include('mensajes.incorrecto')
            <div class="box-body">
                <table id="tabla-data" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="col-lg-2" style="text-align: center;">Nombre</th>
                            <th class="col-lg-2" style="text-align: center;">Apellidos</th>
                            <th class="col-lg-3" style="text-align: center;">Unidad</th>
                            <th class="col-lg-1.5" style="text-align: center;">Cargo</th>
                            <th class="col-lg-1.5" style="text-align: center;">Curriculum</th>
                            <th class="col-lg-2" style="text-align: center;">Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personal as  $per)
                        <tr>
                            <td style="text-align: center;">{{$per->nombre}}</td>
                            <td style="text-align: center;">{{$per->apellido}}</td>
                            <td style="text-align: center;">{{$per->unidad->nombre}}</td>
                            <td style="text-align: center;">{{$per->cargo->nombre}}</td>
                            <td style="text-align: center;">
                                <div class="hidden-sm hidden-xs btn-group">
                                    @if($per->curriculum!=null)
                                        <a href="{{route('ver_curriculum', ['id' => $per->id])}}" target="{{$per->curriculum}}" title="ver curriculum" id="ver-curriculum">
                                            <span class="label label-info arrowed-in arrowed-in-right">
                                                <i class="fa fa-fw  fa-download"></i> Ver</span>
                                        </a>
                                        @else
                                        <span class="label label-inverse arrowed-in arrowed-in-right">No tiene</span>
                                    @endif
                                </div>
                            </td>
                            <td style="text-align: center;">
                                <div class="hidden-sm hidden-xs btn-group">
                                    <a href="{{route('ver_personal', $per)}}" class="ver-personal btn btn-info btn-xs tooltipC" title="Ver Foto" id="ver-personal">
                                        @csrf
                                        <i class="fa fa-fw  fa-camera"></i>
                                    </a>
                                </div>&nbsp;&nbsp;&nbsp;
                                <div class="hidden-sm hidden-xs btn-group">
                                    @if(Auth::user()->rol->editar ==1)
                                        <a href="{{route('editar_personal', ['id' => $per->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar Personal">
                                            <i class="fas fa fa-pencil"></i>
                                        </a>
                                    @endif
                                </div>&nbsp;&nbsp;&nbsp;
                                <div class="hidden-sm hidden-xs btn-group">
                                    @if(Auth::user()->rol->eliminar ==1)
                                        <form action="{{route('inactivar_personal', ['id' => $per->id])}}" class="d-inline form-estado" method="POST" id="form-estado">
                                            @csrf @method("put")
                                            <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Inactivar Personal">
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
            </div>
        </div>
    </div>
    <div class="modal modal-info fade in" id="modal-ver-personal" tabindex="-1" >
        <div class="white modal-dialog">
            <div class="modal-content"  style="background: #88887c">
                <div class="modal-header" style="background:#111d3b">
                    <button type="button" class="close white" data-dismiss="modal" aria-label="Close"  style="background:#97cae2">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" align="center"><b>Personal</b></h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer" style="background:#111d3b">
                    <button type="button" class="btn btn-info" data-dismiss="modal"><b>Cerrar</b></button>
                </div>
            </div>
        </div>
    </div>
@endsection
