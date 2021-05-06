
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Nombre </label>
    <div class="col-sm-6">
        <input type="text" minlength="3" maxlength="50" class="form-control" placeholder="Ingrese nombre del Servicio"  id="nombre" name="nombre" value="{{old('nombre', $servicio->nombre ?? '')}}" required onkeyup="NombreMayus()"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Objetivo</label>
    <div class="col-sm-6">
        <textarea class="form-control" placeholder="Objetivo del Servivio" id="descripcion" name="descripcion" rows="3" maxlength="250">{{old('descripcion', $servicio->descripcion ?? '')}}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Foto</label>
    <div class="col-lg-4">
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($servicio->foto) ? Storage::url("Datos/Servicio/Foto/$servicio->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=foto+servicio"}}" accept="image/*"/>
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
