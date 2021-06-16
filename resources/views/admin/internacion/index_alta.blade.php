@extends("theme.$theme.layout")
@section('titulo')
    Internación
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Lista de Internos dados de Alta
        <div class="box-tools pull-right">
            <a href="{{route('internacion')}}" class="btn btn-block btn-success btn-sm">
                <i class="fa fas fa-arrow-left"></i> Volver a Internación
            </a>
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
                        <th class="col-lg-2" style="text-align: center;">Fecha de Ingreso</th>
                        <th class="col-lg-2" style="text-align: center;">Fecha de Salida</th>
                        <th class="col-lg-4" style="text-align: center;">Paciente</th>
                        <th class="col-lg-2" style="text-align: center;">Contacto</th>
                        <th class="col-lg-2" style="text-align: center;">Opción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $dato)
                        <tr>
                            <td style="text-align: center;">{{$dato->fecha_ingreso}}</td>
                            <td style="text-align: center;">{{$dato->fecha_salida}}</td>
                            <td style="text-align: center;">{{$dato->paciente->nombre}} {{$dato->paciente->apellido_p}} {{$dato->paciente->apellido_m}}</td>
                            <td style="text-align: center;">
                                @if ($dato->paciente->celular==null)
                                    <span class="red">No Registrado</span>
                                @else
                                    {{$dato->paciente->celular}}
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <div class="hidden-sm hidden-xs btn-group">
                                    <form action="{{route('retiro_forzoso', ['id' => $dato->id])}}" target="{{$dato->id}}" class="d-inline">
                                        <button type="submit" class="btn btn-primary btn-xs eliminar tooltipsC" title="Imprimir Documento de Retiro">
                                            <i class="fa fa fw fa-download"></i>
                                        </button>
                                    </form>
                                </div>&nbsp;&nbsp;
                                <div class="hidden-sm hidden-xs btn-group">
                                    <form action="{{route('imprimir_todo', ['id' => $dato->id])}}" target="{{$dato->id}}" class="d-inline">
                                        <button type="submit" class="btn btn-inverse btn-xs eliminar tooltipsC" title="Imprimir Internación">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </button>
                                    </form>
                                </div>&nbsp;&nbsp;
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

