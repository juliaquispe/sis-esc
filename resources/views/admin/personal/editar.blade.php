@extends("theme.$theme.layout")
@section('titulo')
    Crear_Personal
@endsection
@section("styles")
    <link href="{{asset("assets/js/bootstrap-fileinput-master/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection
@section("scriptsPlugins")
    <script src="{{asset("assets/js/bootstrap-fileinput-master/js/fileinput.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/bootstrap-fileinput-master/js/locales/es.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/bootstrap-fileinput-master/themes/fas/theme.min.js")}}" type="text/javascript"></script>
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/personal/validar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Personal
        <small>
            -<i class="ace-icon fa fa-angle-double-right"></i>
            Editar Personal
        </small>
        <div class="box-tools pull-right">
            <a href="{{route('personal')}}" class="btn btn-block btn-info btn-sm">{{-- boton para ir a otra tabla --}}
                <style type="text/css">
                    .btn{
                    padding: 5px;
                    font-weight: 500;
                    font-size: 15px;
                    border-radius: 10px;
                    }
                </style>
                <i class="fa fa-fw fa-reply-all"></i>Ver Lista de Personales
            </a>
        </div>
    </h1>
</div>
@include('mensajes.incorrecto')
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        <form class="form-horizontal" role="form" id="form-general"  action="{{route ('actualizar_personal', ['id' => $personal->id])}}"  method="POST" enctype="multipart/form-data">
            @csrf @method('put')
                @include('admin/personal/form')
                <br><br>
                <div class="box-footer">
                    <div class="col-lg-4" ></div>
                    <div class="col-lg-8">
                        @include('botones/actualizar')
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection
