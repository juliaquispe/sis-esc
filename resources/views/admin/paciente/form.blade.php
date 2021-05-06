<div class="col-xs-12 col-sm-5 center">
    <div>
        <span class="profile-picture">
            <label class="col-lg-0 control-label no-padding-right">Foto</label>
            <div class="col-lg-12">
                <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($paciente->foto) ? Storage::url("Datos/Paciente/Foto/$paciente->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=foto"}}" accept="image/*"/>
            </div>
        </span>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<div class="col-xs-12 col-sm-7">
    <div class="">
        <div class="profile-user-info profile-user-info-striped">

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Nombre </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" minlength="2" maxlength="50" placeholder="Ingrese Nombre"  id="nombre" name="nombre" value="{{old('nombre', $paciente->nombre ?? '')}}" required onkeyup="NombreMayus()"/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Apellido Paterno </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" minlength="3" maxlength="20" placeholder="Ingrese Apellido Paterno"  id="apellido_p" name="apellido_p" value="{{old('apellido_p', $paciente->apellido_p ?? '')}}" required onkeyup="ApellidoPMayus()"/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Apellido Materno</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" minlength="3" maxlength="20" placeholder="Ingrese Apellido Materno"  id="apellido_m" name="apellido_m" value="{{old('apellido_m', $paciente->apellido_m ?? '')}}" onkeyup="ApellidoMMayus()"/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1">Número de Carnet</label>
                    <div class="col-sm-8">
                        <input type="text" minlength="7"  maxlength="12" name="ci" id="ci" class="form-control" value="{{old('ci', $paciente->ci ?? '')}}" placeholder="12345678" required/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Dirección </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" minlength="4" maxlength="60" placeholder="Ingrese su Dirección"  id="direccion" name="direccion" value="{{old('direccion', $paciente->direccion ?? '')}}"/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Número de Celular</label>
                    <div class="col-sm-8">
                        <input type="text" minlength="5" maxlength="12" name="celular" id="celular" class="form-control" value="{{old('celular', $paciente->celular ?? '')}}" placeholder="12345678"/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1">Fecha de Nacimiento</label>
                    <div class="col-sm-8">
                        <input type="date" min="1920-01-01" name="fecha_nac" id="fecha_nac" class="form-control" value="{{old('fecha_nac', $paciente->fecha_nac ?? '')}}" required/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1">Género</label>
                    <div class="col-sm-8">
                        <input type="radio" name="genero" id="genero" value="Hombre"{{old("genero",$paciente->genero?? "")=="Hombre" ? "checked":""}}/>
                        <label for="hombre">Hombre</label>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio"  name="genero" id="genero" value="Mujer"{{old("genero",$paciente->genero?? "")=="Mujer" ? "checked":""}}/>
                        <label for="mujer">Mujer</label>
                    </div>
                </div>
            </div>
            {{-- <div class="profile-info-row">
                <div class="">
                    <label for="t_sangre" class="col-lg-3 control-label">Tipo de Sangre</label>
                    <div class="col-lg-8">
                        <select name="t_sangre" id="t_sangre" class="form-control">
                            <option value="">Seleccione su Opción</option>
                            <option value="O negativo" {{old("icono",$paciente->t_sangre?? "")=="O negativo" ? "selected":""}}>O negativo</option>
                            <option value="O positivo" {{old("icono",$paciente->t_sangre?? "")=="O positivo" ? "selected":""}}>O positivo</option>
                            <option value="A negativo" {{old("icono",$paciente->t_sangre?? "")=="A negativo" ? "selected":""}}>A negativo</option>
                            <option value="A positivo" {{old("icono",$paciente->t_sangre?? "")=="A positivo" ? "selected":""}}>A positivo</option>
                            <option value="B negativo" {{old("icono",$paciente->t_sangre?? "")=="B negativo" ? "selected":""}}>B negativo</option>
                            <option value="B positivo" {{old("icono",$paciente->t_sangre?? "")=="B positivo" ? "selected":""}}>B positivo</option>
                            <option value="AB negativo" {{old("icono",$paciente->t_sangre?? "")=="AB negativo" ? "selected":""}}>AB negativo</option>
                            <option value="AB positivo" {{old("icono",$paciente->t_sangre?? "")=="AB positivo" ? "selected":""}}>AB positivo</option>
                        </select>
                    </div>
                </div>
            </div> --}}
        </div><br>
    </div>
</div>
<script>
    var nombre = document.getElementById('nombre');  //instanciamos el elemento input
        function NombreMayus() {            //función que capitaliza la primera letra
        var palabra = nombre.value;                    //almacenamos el valor del input
        if(!nombre.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1);
        }
        nombre.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }
</script>
<script>
    var apellido_p = document.getElementById('apellido_p');  //instanciamos el elemento input
        function ApellidoPMayus() {            //función que capitaliza la primera letra
        var palabra = apellido_p.value;                    //almacenamos el valor del input
        if(!apellido_p.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1);
        }
        apellido_p.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }
</script>
<script>
    var apellido_m = document.getElementById('apellido_m');  //instanciamos el elemento input
        function ApellidoMMayus() {            //función que capitaliza la primera letra
        var palabra = apellido_m.value;                    //almacenamos el valor del input
        if(!apellido_m.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1).toLowerCase();
        }
        apellido_m.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }
</script>
