    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Nombre </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" minlength="2" maxlength="50" placeholder="Ingrese Nombre" id="nombre" name="nombre" value="{{old('nombre', $personal->nombre ?? '')}}" required onkeyup="NombreMayus()"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Apellidos </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" minlength="2" maxlength="50" placeholder="Ingrese Apellidos"  id="apellido" name="apellido" value="{{old('apellido', $personal->apellido ?? '')}}" required onkeyup="ApeMayus()"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Cedula de Identidad</label>
        <div class="col-sm-6">
            <input type="text" class="form-control"  placeholder="12345678" minlength="7" maxlength="15" id="ci" name="ci" value="{{old('ci', $personal->ci ?? '')}}" required/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Dirección</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="Ingrese su Dirección" minlength="6" maxlength="60" id="direccion" name="direccion" value="{{old('direccion', $personal->direccion ?? '')}}" onkeyup="DirecMayus()"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Telf./Cel.</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="12345678" minlength="6" maxlength="15" id="celular" name="celular" value="{{old('celular', $personal->celular ?? '')}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Fecha de Ingreso</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" min="1950-01-01" id="fecha_ing" name="fecha_ing" value="{{old('fecha_ing', $personal->fecha_ing ?? '')}}" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="cargo_id" class="col-lg-3 control-label requerido">Cargo al que Pertenece</label>
        <div class="col-lg-6">
            <select name="cargo_id" id="cargo_id" class="form-control" required >
                <option value="">Seleccione el Cargo</option>
                @foreach($cargo as $id => $nombre)
                    <option
                    value="{{$id}}"{{old("cargo_id",$personal->cargo->id ?? "")==$id ? "selected":""}}>{{$nombre}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="unidad_id" class="col-lg-3 control-label requerido">Unidad la que Pertenece</label>
        <div class="col-lg-6">
            <select name="unidad_id" id="unidad_id" class="form-control" required >
                <option value="">Seleccione la Unidad</option>
                @foreach($unidad as $id => $nombre)
                    <option
                    value="{{$id}}"{{old("unidad_id",$personal->unidad->id ?? "")==$id ? "selected":""}}>{{$nombre}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="genero" class="col-lg-3 control-label requerido">Genero</label>
        <div class="col-lg-6">
            <input type="radio" name="genero" id="genero" value="Hombre"{{old("genero",$personal->genero?? "")=="Hombre" ? "checked":""}}/>
            <label for="hombre">Hombre</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio"  name="genero" id="genero" value="Mujer"{{old("genero",$personal->genero?? "")=="Mujer" ? "checked":""}}/>
            <label for="mujer">Mujer</label>
        </div>
    </div>
    <div class="form-group" style="width:100%; height: 40px;">
        <label class="control-label col-xs-12 col-sm-3">¿Acceso al sistema?</label>
        <div class="controls col-xs-12 col-sm-9">
            <div class="col-xs-2">
                <label>
                    <input name="añadir" id="añadir" class="ace ace-switch ace-switch-6" type="checkbox" value="1" onchange="javascript:showContent()">
                    <span class="lbl"></span>
                </label>
            </div>
        </div>
    </div>
    @if ($personal==null)
        <div class="form-group" id="content" style="display: none;">
            <label for="rol_id" class="col-lg-3 control-label requerido">Rol</label>
            <div class="col-lg-6">
                <select name="rol_id" id="rol_id" class="form-control">
                    <option value="">Seleccione el Rol</option>
                    @foreach($roles as $id => $rol)
                        <option
                        value="{{$id}}"{{old("rol_id",$usuario->rol->id ?? "")==$id ? "selected":""}}>{{$rol}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    @else
        @if ($personal->sistema=='si')
            <div class="form-group" id="content" style="display: none;">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="alert alert-info">
                        <strong>Atención! </strong> este personal ya cuenta con un Usuario
                        <br />
                    </div>
                </div>
            </div>
        @else
            <div class="form-group" id="content" style="display: none;">
                <label for="rol_id" class="col-lg-3 control-label requerido">Rol</label>
                <div class="col-lg-6">
                    <select name="rol_id" id="rol_id" class="form-control">
                        <option value="">Seleccione el Rol</option>
                        @foreach($roles as $id => $rol)
                            <option
                            value="{{$id}}"{{old("rol_id",$usuario->rol->id ?? "")==$id ? "selected":""}}>{{$rol}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
    @endif

<div class="col-lg-12"> <br>
    <div class="col-lg-6">
        <label for="foto" class="col-lg-2 control-label center">Foto</label>
        <div class="col-lg-9">
            <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($personal->foto) ? Storage::url("Datos/Personal/Fotos/$personal->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=foto+personal"}}" accept="image/*"/>
        </div>
    </div>
    <div class="col-lg-6">
        <label for="documento" class="col-lg-3 control-label center">Curriculum</label>
        <div class="col-lg-9">
            <input type="file" name="documento_up" id="documento" data-initial-preview="{{isset($personal->curriculum) ? Storage::url("Datos/Personal/Documentos/$personal->curriculum") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=documento+personal"}}" accept=".pdf"/>
        </div>
    </div>
</div>
<div style="clear:both"></div>
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

    var apellido = document.getElementById('apellido');  //instanciamos el elemento input
        function ApeMayus() {            //función que capitaliza la primera letra
        var palabra = apellido.value;                    //almacenamos el valor del input
        if(!apellido.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1);
        }
        apellido.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }

    var direccion = document.getElementById('direccion');  //instanciamos el elemento input
        function DirecMayus() {            //función que capitaliza la primera letra
        var palabra = direccion.value;                    //almacenamos el valor del input
        if(!direccion.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1).toLowerCase();
        }
        direccion.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }

    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("añadir");
        if (check.checked) {
            element.style.display='block';
            $('#rol_id').prop('required', true);
        }
        else {
            element.style.display='none';
        }
    }
</script>

