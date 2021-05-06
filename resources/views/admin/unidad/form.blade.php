
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Nombre </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Ingrese nombre de la Unidad" minlength="4"  id="nombre" name="nombre" value="{{old('nombre', $unidad->nombre ?? '')}}" required onkeyup="NombreMayus()"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Sigla </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Ingrese la Sigla"  id="sigla" name="sigla" value="{{old('sigla', $unidad->sigla ?? '')}}" required onkeyup="SiglaMayus()"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Descripción de la Unidad</label>
    <div class="col-sm-6">
        <textarea class="form-control" placeholder="Descripción" id="descripcion" name="descripcion" rows="3" maxlength="250">{{old('descripcion', $unidad->descripcion ?? '')}}</textarea>
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
    var sigla = document.getElementById('sigla');  //instanciamos el elemento input
        function SiglaMayus() {            //función que capitaliza la primera letra
        var palabra = sigla.value;                    //almacenamos el valor del input
        if(!sigla.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.toUpperCase(); // almacenamos la mayuscula
        sigla.value = mayuscula;    //escribimos la palabra con la primera letra mayuscula
    }
</script>
