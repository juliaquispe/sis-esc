<div class="row">
    <div class="col-xs-12">
        <div>
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-4 center">
                    <div>
                        <span class="profile-picture">
                            @if ($paciente->foto==null)
                            <img src="{{asset("assets/$theme/assets/images/avatars/dos.jpg")}}" class="editable img-responsive"/>
                            @else
                            <img src="{{Storage::url("Datos/Paciente/Foto/$paciente->foto")}}" class="editable img-responsive"/>
                            @endif &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="">
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Paciente</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}</i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>N° de Carnet</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$paciente->ci}}</i></span>
                                </div>
                            </div>
                            @php
                                $fecha_actual = new \DateTime();
                                $fecha=$fecha_actual->format('Y-m-d');
                            @endphp
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Fecha</u>:</div>
                                <div class="profile-info-value">
                                    <input type="date"class="fecha form-control" name="fecha" id="fecha" value="{{old('fecha', $ficha->fecha ?? $fecha)}}" required/>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Hora</u>:</div>
                                <div class="profile-info-value">
                                    <input type="time"class="hora form-control" name="hora" id="hora" required/>
                                </div>
                            </div>
                            <input type="hidden" id="paciente_id" name="paciente_id" value="{{$paciente->id}}">
                            <input type="hidden" id="servicio_id" name="servicio_id" value="{{$servicio->id}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

