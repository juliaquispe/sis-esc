<div class="page-header">
    <h1>
       Foto del Usuario
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.correcto')
        @include('mensajes.incorrecto')
        <div class="col-xs-12 col-sm-5 center">
            <div>
                <span class="profile-picture">
                    @if ($usuario->foto==null)
                    <img src="{{asset("assets/$theme/assets/images/avatars/dos.jpg")}}" height="270px" width="270px"/>
                    @else
                    <img src="{{Storage::url("Datos/Usuario/Fotos/$usuario->foto")}}" height="270px" width="270px"/>
                    @endif
                </span>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <div class="col-xs-12 col-sm-7">
            <div class="">
                <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                        <div class="profile-info-name"><u>Usuario</u>:</div>
                        <div class="profile-info-value">
                            <span class="editable"><i>{{$usuario->usuario}}</i></span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"><u>Nombre</u>:</div>
                        <div class="profile-info-value">
                            <span class="editable"><i>{{$usuario->nombre}} {{$usuario->apellido}}</i></span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"><u>Email</u>:</div>
                        <div class="profile-info-value">
                            <span class="editable"><i>{{$usuario->email}}</i></span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"><u>Rol</u>:</div>
                        <div class="profile-info-value">
                            <select name="rol_id" id="rol_id" class="form-control" required>
                                <option value="">Seleccione el Rol</option>
                                @foreach($rols as $id => $rol)
                                    <option
                                    value="{{$id}}"{{old("rol_id",$usuario->rol->id ?? "")==$id ? "selected":""}}>{{$rol}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="usuario" name="usuario" value="{{$usuario->usuario}}">
                    <input type="hidden" id="nombre" name="nombre" value="{{$usuario->nombre}}">
                    <input type="hidden" id="apellido" name="apellido" value="{{$usuario->apellido}}">
                    <input type="hidden" id="email" name="email" value="{{$usuario->email}}">
                </div><br>
                {{-- <div class="col-lg-4"></div>
                <div class="col-lg-6">
                    @include('botones.actualizar')
                </div> --}}
            </div>
        </div>
    </div>
</div>
