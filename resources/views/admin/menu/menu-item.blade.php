@if ($item ["submenu"]== [])
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div  class="dd3-content {{$item["url"]=="javascript:;" ? "font-weight-bold" : ""}}">
            <a class="white"><i style="font-size:20px;" class="fa fa-fw {{isset($item["icono"]) ? $item["icono"] : ""}}"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{$item["nombre"] . " | Url -> " . $item["url"]}}</a>
            <a href="{{route('eliminar_menu', ['id' => $item["id"]])}}" class="eliminar-menu pull-right tooltipsC" title="Eliminar este menú">&nbsp; &nbsp; &nbsp;<i class="text-danger fa fa-close" style="color:  rgb(247, 135, 8)"></i></a>
            <a href="{{route('editar_menu', ['id' => $item["id"]])}}" class="pull-right tooltipsC" title="Editar este menú"><i class="text-danger fa fa-wrench" style="color: rgb(228, 226, 100)"></i></a>
    </div>
</li>
@else
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div  class="dd3-content {{$item["url"]=="javascript:;" ? "font-weight-bold" : ""}}">
        <a class="white"><i style="font-size:20px;" class="fa fa-fw {{isset($item["icono"]) ? $item["icono"] : ""}}"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $item["nombre"] . " | Url -> " . $item["url"]}}</a>
        <a href="{{route('eliminar_menu', ['id' => $item["id"]])}}" class="eliminar-menu pull-right tooltipsC" title="Eliminar este menú">&nbsp; &nbsp; &nbsp;<i class="text-danger fa fa-close" style="color: rgb(247, 135, 8)"></i></a>
        <a href="{{route('editar_menu', ['id' => $item["id"]])}}" class="pull-right tooltipsC" title="Editar este menú"><i class="text-danger fa fa-wrench" style="color: rgb(228, 226, 100)"></i></a>
    </div>
    <ol class="dd-list">
        @foreach ($item["submenu"] as $submenu)
        @include("admin.menu.menu-item",[ "item" => $submenu ])
        @endforeach
    </ol>
</li>
@endif
