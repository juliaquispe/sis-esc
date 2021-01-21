@extends("theme.$theme.layout")
@section('titulo')
    Crear_Rol
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/rol/validar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Roles
        <small>
            -<i class="ace-icon fa fa-angle-double-right"></i>
            Crear Rol
        </small>
        <div class="box-tools pull-right">
            <a href="{{route('rol')}}" class="btn btn-block btn-info btn-sm">{{-- boton para ir a otra tabla --}}
                <style type="text/css">
                    .btn{
                    padding: 5px;
                    font-weight: 500;
                    font-size: 15px;
                    border-radius: 10px;
                    }
                </style>
                <i class="fa fa-fw fa-reply-all"></i>Ver Lista Roles
              </a>
        </div>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        <form class="form-horizontal" role="form" id="form-general"  action="{{route ('guardar_rol')}}"  method="POST">
            @csrf
                @include('admin/roles/form')
                <br><br>
                <div class="box-footer">
                    <div class="col-lg-4" ></div>
                    <div class="col-lg-8">
                        @include('botones/guardar')
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection
