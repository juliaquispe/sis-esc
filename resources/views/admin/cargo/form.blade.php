
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Nombre </label>
    <div class="col-sm-6">
        <input type="text" minlength="3" maxlength="50" class="form-control" placeholder="Ingrese nombre del Cargo"  id="nombre" name="nombre" value="{{old('nombre', $cargo->nombre ?? '')}}" required onkeyup="NombreMayus()"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Descripción del Cargo</label>
    <div class="col-sm-6">
        <textarea class="form-control" placeholder="Descripción" id="descripcion" name="descripcion" rows="3" maxlength="250">{{old('descripcion', $cargo->descripcion ?? '')}}</textarea>
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
