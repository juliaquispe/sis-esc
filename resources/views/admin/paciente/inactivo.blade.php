@extends("theme.$theme.layout")

@section('titulo')
	Personal
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/paciente/modal.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/paciente/estado.js")}}" type="text/javascript"></script>
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
            Lista de pacientes con baja
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
                            <th class="col-lg-1.5" style="text-align: center;">Expediente</th>
                            <th class="col-lg-1.5" style="text-align: center;">Nombres y Apellidos</th>
                            <th class="col-lg-1.5" style="text-align: center;">Nro de Carnet</th>
                            <th class="col-lg-1.5" style="text-align: center;">Edad</th>
                            <th class="col-lg-1.5" style="text-align: center;">Contacto</th>
                            <th class="col-lg-1.5" style="text-align: center;">Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($paciente as  $pac)
                                <tr>
                                    <td style="text-align: center;">
                                        {{$expediente= MyHelper::num_expediente($pac->id)}}
                                    </td>
                                    <td style="text-align: center;">{{$pac->nombre}} {{$pac->apellido_p}} {{$pac->apellido_m}}</td>
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
                                                <form action="{{route('activar_paciente', ['id' => $pac->id])}}" class="d-inline form-estado" method="POST" id="form-estado">
                                                    @csrf
                                                    @method("put")
                                                    <button type="submit" class="btn btn-success btn-xs eliminar tooltipsC" title="Reactivar Paciente">
                                                        <i class="ace-icon glyphicon glyphicon-ok"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>&nbsp;
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
