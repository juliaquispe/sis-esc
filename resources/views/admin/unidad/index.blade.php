@extends("theme.$theme.layout")
@section('titulo')
    Unidades
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Lista de Unidades
        @if(Auth::user()->rol->añadir ==1)
            <div class="box-tools pull-right">
                <a href="{{route('crear_unidad')}}" class="btn btn-block btn-success btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Unidad
                </a>
            </div>
        @endif
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
                        <th class="col-lg-3" style="text-align: center;">Nombre</th>
                        <th class="col-lg-3" style="text-align: center;">Sigla</th>
                        <th class="col-lg-4" style="text-align: center;">Descricion</th>
                        <th class="col-lg-2" style="text-align: center;">Opción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $unidad)
                        <tr>
                            <td style="text-align: center;">{{$unidad->nombre}}</td>
                            <td style="text-align: center;">{{$unidad->sigla}}</td>
                            <td style="text-align: center;">{{$unidad->descripcion}}</td>
                            <td style="text-align: center;">
                                <div class="hidden-sm hidden-xs btn-group">
                                    @if(Auth::user()->rol->editar ==1)
                                        <a href="{{route('editar_unidad', ['id' => $unidad->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar este Registro">
                                            <i class="fas fa fa-pencil"></i>
                                        </a>
                                    @endif
                                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="hidden-sm hidden-xs btn-group">
                                    @if(Auth::user()->rol->eliminar ==1)
                                        <form action="{{route('eliminar_unidad', ['id' => $unidad->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar este Registro">
                                                <i class="fa fa fw fa-close"></i>
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
@endsection

