
<div class="form-group">
    <label class="control-label">
        @if ($usuario->foto==null)
        <img src="{{asset("assets/$theme/assets/images/avatars/dos.jpg")}}" class="img-square" width="230px" eight="230px" alt="No tiene Fotografia"/>
        @else
        <img src="{{Storage::url("Datos/Usuario/Fotos/$usuario->foto")}}" class="msg-photo" alt="fotografia" width="230px" eight="230px">
        @endif &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="box-tools pull-right">
            <label class="control-label">
                <div style=""><u><b>Nombre</b></u>: <i>{{$usuario->nombre}}  {{$usuario->apellido}}</i></div><br>
                <div style=""><u><b>Rol</b></u>: <i>{{$usuario->rol->rol}}</i></div><br>
                <div style=""><u><b>Usuario</b></u>: <i>{{$usuario->usuario}}</i></div><br>
                {{-- <div style=""><u>Rol</u>: <i>{{$usuario->roles->tipo}}</i></div> --}}
                <div style=""><u><b>Email</b></u>: <i>{{$usuario->email}}</i></div><br>
                <div style=""><u><b>Añadir</b></u>:
                    <i>
                        @if($usuario->rol->añadir==1)
                        <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                        @else
                            <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                        @endif
                    </i>
                </div>
                <div style=""><u><b>Editar</b></u>:
                    <i>
                        @if($usuario->rol->eliminar==1)
                        <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                        @else
                            <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                        @endif
                    </i>
                </div>
                <div style=""><u><b>Eliminar</b></u>:
                    <i>
                        @if($usuario->rol->eliminar==1)
                        <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                        @else
                            <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                        @endif
                    </i>
                </div>
            </label>
        </div>
    </label>
</div>
