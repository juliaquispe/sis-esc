@extends("theme.$theme.layout")
@section('titulo')
    Internación
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/internacion/alta.js")}}" type="text/javascript"></script>
@endsection
@section("styles")
    <link href="{{asset("assets/js/bootstrap-fileinput-master/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection
@section("scriptsPlugins")
    <script src="{{asset("assets/js/bootstrap-fileinput-master/js/fileinput.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/bootstrap-fileinput-master/js/locales/es.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/bootstrap-fileinput-master/themes/fas/theme.min.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Solicitar Alta del Paciente
        <div class="box-tools pull-right">
            <a href="{{route('internacion')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-reply-all"></i> Volver al listado
            </a>
        </div>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        @include('mensajes.incorrecto')
        <form class="form-horizontal" action="{{route('dar_alta', ['id' => $dato->id])}}" id="form-general" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.internacion.form_alta')
                <br>
                <div class="box-footer">
                    <div class="col-lg-4" ></div>
                    <div class="col-lg-8">
                        <button type="reset" class="btn btn-info">Cancel</button>
                        <button type="submit" class="btn btn-danger eliminar" id="retirar" onclick="return confirm('¿Seguro que desea registrar el alta del paciente?\n Esta acción no se puede modificar')">Dar Alta</button>
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection
