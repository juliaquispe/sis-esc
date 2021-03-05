@if ($item["submenu"] == [])
    <li class="{{getMenuActivo($item["url"])}}">
        <a href="{{url($item['url'])}}" >
          <i class="fa {{$item["icono"]}}"></i> <span>{{$item["nombre"]}}</span>
        </a>
    </li>
@else
    <li class="">
        <a href="javascript:;" class="dropdown-toggle"> <!--no tiene url porq es padre-->
          <i class="menu-icon fa {{$item["icono"]}}"></i>
            <span>{{$item["nombre"]}}
            </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <ul class="submenu">
            @foreach ($item["submenu"] as $submenu)
                @include("theme.$theme.menu-item", ["item" => $submenu])<!--vuelve a correr si tiene submenu-->
            @endforeach
        </ul>
    </li>
@endif
