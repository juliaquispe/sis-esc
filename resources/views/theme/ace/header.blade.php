
<div class="navbar-buttons navbar-header pull-right" role="navigation">
    <ul class="nav ace-nav">
        <li class="grey dropdown-modal">
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
        </li>

        <li class="purple dropdown-modal">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                <span class="badge badge-important">8</span>
            </a>

            <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-header">
                    <i class="ace-icon fa fa-exclamation-triangle"></i>
                    8 Notifications
                </li>

                <li class="dropdown-content">
                    <ul class="dropdown-menu dropdown-navbar navbar-pink">
                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">
                                        <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                                        New Comments
                                    </span>
                                    <span class="pull-right badge badge-info">+12</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="btn btn-xs btn-primary fa fa-user"></i>
                                Bob just signed up as an editor ...
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">
                                        <i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
                                        New Orders
                                    </span>
                                    <span class="pull-right badge badge-success">+8</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">
                                        <i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
                                        Followers
                                    </span>
                                    <span class="pull-right badge badge-info">+11</span>
                                </div>
                            </a>
                        </li>
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

        <li class="green dropdown-modal">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                <span class="badge badge-success">5</span>
            </a>

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

        {{-- <li class="blue dropdown-modal">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                @php
                    $aux= session()->get('foto_usuario');
                @endphp
                @if(session()->get('foto_usuario')==null)
                    <img class="nav-user-photo" src="{{asset("assets/$theme/assets/images/avatars/usuario.jpg")}}" />
                @else
                    <img src="{{Storage::url("datos/fotos/usuario/$aux")}}" class="nav-user-photo" >
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
                                    <img class="img-circle" style="center" src="{{Storage::url("datos/fotos/usuario/$aux")}}" width="35%">
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
                    <a href="{{route('logout')}}" >
                        <span class="label label-xlg label-danger arrowed arrowed-right">SALIR</span>
                    </a>
                </li>
            </ul>
        </li> --}}
    </ul>
</div>
