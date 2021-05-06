<div class="row">
    <div class="col-xs-12">
        <div>
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-5 center">
                    <div>
                        <span class="profile-picture">
                            @if ($personal->foto==null)
                            <img src="{{asset("assets/$theme/assets/images/avatars/dos.jpg")}}" class="editable img-responsive"/>
                            @else
                            <img src="{{Storage::url("Datos/Personal/Fotos/$personal->foto")}}" class="editable img-responsive"/>
                            @endif &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <div class="">
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Nombre</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$personal->nombre}}  {{$personal->apellido}}</i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>N° de Carnet</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$personal->ci}}</i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Dirección</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>
                                        @if($personal->direccion==null)
                                        No Tiene
                                        @else
                                            {{$personal->direccion}}
                                        @endif
                                    </i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Celular</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>
                                        @if($personal->celular==null)
                                        No Tiene
                                        @else
                                            {{$personal->celular}}
                                        @endif
                                    </i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Ingreso</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$personal->fecha_ing}}</i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Cargo</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$personal->cargo->nombre}}</i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Unidad</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$personal->unidad->nombre}}</i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Curriculum</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable">
                                            @if($personal->curriculum!=null)
                                            <a href="{{route('ver_curriculum', ['id' => $personal->id])}}" target="{{$personal->curriculum}}" title="ver curriculum" id="ver-curriculum">
                                                <span class="label label-success arrowed-in arrowed-in-right">
                                                    <i class="fa fa-fw  fa-download" style="color: rgb(29, 88, 44)"></i> Descargar
                                                </span>
                                            </a>
                                            @else
                                            <span class="label label-inverse arrowed-in arrowed-in-right">No tiene</span>
                                            @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

