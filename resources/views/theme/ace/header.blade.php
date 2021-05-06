<link rel="stylesheet" href="{{asset("assets/css/zoom.css")}}" />
<div class="navbar-buttons navbar-header pull-right" role="navigation">
    <ul class="nav ace-nav">
        {{-- <li class="grey dropdown-modal">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="ace-icon fa fa-tasks"></i>
                <span class="badge badge-grey">4</span>
            </a>

            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-header">
                    <i class="ace-icon fa fa-check"></i>
                    4 Tasks to complete
                </li>

                <li class="dropdown-content">
                    <ul class="dropdown-menu dropdown-navbar">
                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Software Update</span>
                                    <span class="pull-right">65%</span>
                                </div>

                                <div class="progress progress-mini">
                                    <div style="width:65%" class="progress-bar"></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Hardware Upgrade</span>
                                    <span class="pull-right">35%</span>
                                </div>

                                <div class="progress progress-mini">
                                    <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Unit Testing</span>
                                    <span class="pull-right">15%</span>
                                </div>

                                <div class="progress progress-mini">
                                    <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Bug Fixes</span>
                                    <span class="pull-right">90%</span>
                                </div>

                                <div class="progress progress-mini progress-striped active">
                                    <div style="width:90%" class="progress-bar progress-bar-success"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown-footer">
                    <a href="#">
                        See tasks with details
                        <i class="ace-icon fa fa-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </li> --}}
        @php
            $datos=MyHelper::Usuarios_pendientes();
            $contador=$datos->count();
        @endphp
        @if(session()->get('rol_id')==1 && $contador>=1)

            <li class="grey dropdown-modal">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                    <span class="badge badge-important"> {{$contador}}</span>
                </a>

                <ul class="dropdown-menu-right dropdown-navbar navbar-grey dropdown-menu dropdown-caret dropdown-close">
                    <li class="dropdown-header">
                        <i class="ace-icon fa fa-exclamation-triangle"></i>
                        {{$contador}} Notificationes
                    </li>

                    <li class="dropdown-content">
                        <ul class="dropdown-menu dropdown-navbar navbar-blue">
                            @foreach ($datos as $usuario )
                            <table id="data-table">
                                <li>
                                    <a class="clearfix">
                                        <span class="msg-title">
                                            <span class="blue">{{$usuario->nombre}} {{$usuario->apellido}}</span>
                                            Solicita unirse al sistema con el rol de: <span class="blue">{{$usuario->rol->rol}} </span>
                                        </span>
                                        <form action="{{route('aceptar_usuario', ['id' => $usuario->id])}}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-white btn-success btn-sm" style="border-width: 1mm" onclick="return confirm('Esta seguro de que el ususario: {{$usuario->nombre}} {{$usuario->apellido}} tenga acceso al sistema' )">
                                                <i class="ace-icon fa fa-check bigger-120 success"></i>
                                                Aceptar
                                            </button>
                                        </form>
                                        <form action="{{route('rechazar_usuario', ['id' => $usuario->id])}}" class="d-inline">
                                            <button type="submit" class="btn btn-white btn-danger btn-sm pull-right" style="border-width: 1mm" onclick="return confirm('¿Esta seguro de RECHAZAR a: {{$usuario->nombre}} {{$usuario->apellido}}?')">
                                                <i class="ace-icon fa fa-close bigger-120 danger"></i>
                                                Rechazar
                                            </button>
                                        </form>
                                    </a>
                                </li>
                            </table>
                            @endforeach
                        </ul>
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">
                            See all notifications
                            <i class="ace-icon fa fa-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <li class="green dropdown-modal">
            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-content">
                    <ul class="dropdown-menu dropdown-navbar">
                        <li>
                            <a href="#" class="clearfix">
                                <img src="{{asset("assets/$theme/assets/images/avatars/avatar.png")}}" class="msg-photo" alt="Alex's Avatar" />
                                <span class="msg-body">
                                    <span class="msg-title">
                                        <span class="blue">Alex:</span>
                                        Ciao sociis natoque penatibus et auctor ...
                                    </span>

                                    <span class="msg-time">
                                        <i class="ace-icon fa fa-clock-o"></i>
                                        <span>a moment ago</span>
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="blue dropdown-modal">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                @php
                    $aux= session()->get('foto_usuario');
                @endphp
                @if(session()->get('foto_usuario')==null)
                    <img class="nav-user-photo" src="{{asset("assets/$theme/assets/images/avatars/dos.jpg")}}" />
                @else
                    <img src="{{Storage::url("datos/usuario/fotos/$aux")}}" class="nav-user-photo" >
                @endif
                <span class="user-info">
                    <small>Bienvenido</small>
                    {{session()->get('nombre_usuario')}}
                </span>
                <i class="ace-icon fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu-right dropdown-navbar navbar-grey dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-header" style="text-align: center">
                    <i class="menu-icon fa fa-user icon-animated-vertical"> <b> Perfil de Usuario</b></i>
                </li>
                <li class="dropdown-content">
                    <ul class="dropdown-menu dropdown-navbar">
                        <li style="background: rgb(218, 230, 230)">
                            <a href="#" class="clearfix" align="center">
                                @if(session()->get('foto_usuario')==null)
                                    <img class="img-circle" src="{{asset("assets/$theme/assets/images/avatars/dos.jpg")}}" width="35%"/>
                                @else
                                    <img class="img-circle zoom" style="center" src="{{Storage::url("datos/usuario/fotos/$aux")}}" width="35%">
                                @endif
                            </a>
                            <a href="#">
                                <i class="blue menu-icon fa fa-caret-right"></i>
                                <span class="blue"><b>Usuario:</b>&nbsp;</span>
                                <b>  {{session()->get('usuario')}}</b>
                                <br>
                                <i class="blue menu-icon fa fa-caret-right"></i>
                                <span class="blue"><b>Nombre:</b></span>
                                <b>  {{session()->get('nombre_usuario')}} {{session()->get('apellido_usuario')}}</b>
                                <br>
                                <i class="blue menu-icon fa fa-caret-right"></i>
                                <span class="blue"><b>Correo:</b> </span>
                                <b> &nbsp; {{session()->get('email_usuario')}}</b>
                                <br>
                                <i class="blue menu-icon fa fa-caret-right"></i>
                                <span class="blue"><b>Rol:</b> &nbsp; &nbsp; &nbsp;</span>
                                <b>  &nbsp; {{session()->get('rol_usuario')}}</b>
                                <br>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown-footer">
                        <button onclick="location.href='{{route('logout')}}'" class="btn btn-xs btn-danger center" title="salir del sistema">
                            <i class="ace-icon fa fa-close bigger-120"> Salir</i>
                        </button>
                        <button onclick="location.href='{{route('editar_mi_usuario', ['id' => session()->get('usuario_id')])}}'" class="btn btn-xs btn-warning center" title="editar usuario">
                            <i class="ace-icon fa fa-pencil bigger-120"> Editar</i>
                        </button>
                        {{-- <a href="{{route('logout')}}" >
                            <span class="label label-xlg label-danger arrowed arrowed-right personalizado">SALIR</span>
                            <style type="text/css">
                                .personalizado:hover{
                                color: #e6e4a9;
                                }
                            </style>
                        </a> center--}}
                </li>
            </ul>
        </li>
    </ul>
</div>
