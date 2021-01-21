
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Usuario </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" minlength="3" maxlength="30" placeholder="Ingrese Usuario"  id="usuario" name="usuario" value="{{old('usuario', $usuario->usuario ?? '')}}" required />
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" minlength="3" maxlength="50" placeholder="Ingrese Nombre"  id="nombre" name="nombre" value="{{old('nombre', $usuario->nombre ?? '')}}" required onkeyup="NombreMayus()"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Apellido </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" minlength="3" maxlength="50" placeholder="Ingrese Apellido"  id="apellido" name="apellido" value="{{old('apellido', $usuario->apellido ?? '')}}" required onkeyup="ApellidoMayus()"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Correo Electronico </label>
    <div class="col-sm-6">
        <input type="email" class="form-control" minlength="10" maxlength="50" placeholder="Ejm:juan@gmail.com"  id="email" name="email" value="{{old('email', $usuario->email ?? '')}}" required />
    </div>
</div>
<div class="form-group">
    <label for="rol_id" class="col-lg-3 control-label requerido">Rol</label>
    <div class="col-lg-6">
        <select name="rol_id" id="rol_id" class="form-control" required>
            <option value="">Seleccione el Rol</option>
            @foreach($rols as $id => $rol)
                <option
                value="{{$id}}"{{old("rol_id",$usuario->rol->id ?? "")==$id ? "selected":""}}>{{$rol}}</option>
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label class="{{!isset($usuario) ? 'requerido' : ''}}, col-sm-3 control-label no-padding-right" for="form-field-1">Contraseña</label>
    <div class="col-sm-6">
        <input type="password" class="form-control" minlength="5" maxlength="30" placeholder="******" {{!isset($usuario) ? 'required' : ''}} id="password" name="password" autocomplete="on" />
    </div>
</div>
<div class="form-group">
    <label class="{{!isset($usuario) ? 'requerido' : ''}}, col-sm-3 control-label no-padding-right" for="form-field-1">Repita Contraseña</label>
    <div class="col-sm-6">
        <input type="password" class="form-control" placeholder="******" {{!isset($usuario) ? 'required' : ''}} id="re_password" name="re_password" autocomplete="on" />
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="foto"> Foto </label>
    <div class="col-sm-6">
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($usuario->foto) ? Storage::url("Datos/Fotos/Usuario/$usuario->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=foto+usuario"}}" accept="image/*"/>
    </div>
</div>
<script>
    var nombre = document.getElementById('nombre');  //instanciamos el elemento input
        function NombreMayus() {            //función que capitaliza la primera letra
        var palabra = nombre.value;                    //almacenamos el valor del input
        if(!nombre.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1).toLowerCase();
        }
        nombre.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }
</script>
<script>
    var apellido = document.getElementById('apellido');  //instanciamos el elemento input
        function ApellidoMayus() {            //función que capitaliza la primera letra
        var palabra = apellido.value;                    //almacenamos el valor del input
        if(!apellido.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1).toLowerCase();
        }
        apellido.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }
</script>

