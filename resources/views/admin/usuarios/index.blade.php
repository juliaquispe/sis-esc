@extends("theme.$theme.layout")
@section('titulo')
    Usuarios
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/usuario/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/usuario/estado.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Lista de Usuarios
        <div class="box-tools pull-right">
            @if(Auth::user()->rol->añadir ==1)
                <a href="{{route('crear_usuario')}}" class="btn btn-block btn-success btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Usuario
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
                        <th class="col-lg-1" style="text-align: center;">Usuario</th>
                        <th class="col-lg-2" style="text-align: center;">Nombre</th>
                        <th class="col-lg-2" style="text-align: center;">Apellido</th>
                        <th class="col-lg-3" style="text-align: center;">Correo Electronico</th>
                        <th class="col-lg-2" style="text-align: center;">Rol</th>
                        <th class="col-lg-2" style="text-align: center;">Opción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $usuarios)
                        <tr>
                            <td style="text-align: center;">{{$usuarios->usuario}}</td>
                            <td style="text-align: center;">{{$usuarios->nombre}}</td>
                            <td style="text-align: center;">{{$usuarios->apellido}}</td>
                            <td style="text-align: center;">{{$usuarios->email}}</td>
                            <td style="text-align: center;">{{$usuarios->rol->rol}}</td>
                            <td>&nbsp;&nbsp;
                                <div class="hidden-sm hidden-xs btn-group">
                                    <a href="{{route('ver_usuario', $usuarios)}}" class="ver-usuario btn btn-info btn-xs tooltipC" title="Ver Foto" id="ver-usuario">
                                        <i class="fa fa-fw  fa-camera"></i>
                                        @csrf
                                    </a>
                                </div>&nbsp;&nbsp;
                                <div class="hidden-sm hidden-xs btn-group">
                                    @if(Auth::user()->rol->editar ==1)
                                        <a href="{{route('editar_usuario', ['id' => $usuarios->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar Usuario">
                                            <i class="fas fa fa-pencil"></i>
                                        </a>
                                    @endif
                                </div>&nbsp;&nbsp;
                                <div class="hidden-sm hidden-xs btn-group">
                                    @if(Auth::user()->rol->eliminar ==1)
                                        <form action="{{route('eliminar_usuario', ['id' => $usuarios->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Usuario">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>&nbsp;&nbsp;
                                {{-- <div class="hidden-sm hidden-xs btn-group">
                                    @if(Auth::user()->rol->editar ==1)
                                        <form action="{{route('inactivar_usuario', ['id' => $usuarios->id])}}" class="d-inline form-estado" method="POST" id="form-estado">
                                            @csrf @method("put")
                                            <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Inactivar Ususario">
                                                <i class="ace-icon fa fa-ban"></i>
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
<div class="modal modal-info fade in" id="modal-ver-usuario" tabindex="-1" >
    <div class="white modal-dialog">
        <div class="modal-content" style="background: #7c7e88">
            <div class="modal-header" style="background:#111d3b">
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" align="center"><b>Usuario</b></h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer" style="background:#111d3b">
                <button type="button" class="btn btn-info" data-dismiss="modal"><b>Cerrar</b></button>
            </div>
        </div>
    </div>
</div>
@endsection

