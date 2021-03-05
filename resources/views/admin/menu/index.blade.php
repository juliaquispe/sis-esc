
@extends("theme.$theme.layout")
@section('titulo')
    Menús
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/menu/validar.js")}}" type="text/javascript"></script>
@endsection
@section('styles')
<link href="{{asset("assets/js/jquery-nestable/jquery.nestable.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('scriptsPlugins')
<script src="{{asset("assets/js/jquery-nestable/jquery.nestable.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Lista de Menús
        {{-- <div class="space"></div> //&copy; // ESPACIO ENTRE DIV--}}
        <div class="box-tools pull-right">
            @if(Auth::user()->rol->añadir ==1)
                <a href="{{route('crear_menu')}}" class="btn btn-block btn-success btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Menús
                </a>
            @endif
        </div>
    </h1>
</div>
<div class="row">
    <div style="width: 150%">
        @include('mensajes.correcto')
        @include('mensajes.incorrecto')
        <div class="box-body">
            @csrf
            <div class="dd" id="nestable">
                <ol class="dd-list">
                    @foreach ($menus as $key => $item)
                        @if ($item["menu_id"] != 0)
                            @break
                        @endif
                        @include("admin.menu.menu-item", ["item" =>$item])
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
