
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Ejm: Administrador"  id="rol" name="rol" value="{{old('rol', $rol->rol ?? '')}}" required onkeyup="NombreMayus()"/>
    </div>
</div>
<br>
<div class="form-group">
    <label class="control-label col-xs-12 col-sm-3">Permisos</label>
    <div class="controls col-xs-12 col-sm-9">
        <div class="col-xs-2">
            <div class="checkbox">
                <label>
                    <input name="añadir" id="añadir" class="ace ace-switch ace-switch-6" type="checkbox"
                    @if (isset($rol)&&$rol->añadir == 1)
                            checked
                    @endif
                    >
                    <span class="lbl"></span><br>Crear
                </label>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="checkbox">
                <label>
                    <input name="editar" id="editar" class="ace ace-switch ace-switch-6" type="checkbox"
                    @if (isset($rol)&&$rol->editar == 1)
                            checked
                    @endif
                    >
                    <span class="lbl"></span><br>Editar
                </label>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="checkbox">
                <label>
                    <input name="eliminar" id="eliminar" class="ace ace-switch ace-switch-6" type="checkbox"
                    @if (isset($rol)&&$rol->eliminar == 1)
                            checked
                    @endif
                    >
                    <span class="lbl"></span><br>Eliminar
                </label>
            </div>
        </div>
    </div>
</div>
<script>
    var nombre = document.getElementById('rol');  //instanciamos el elemento input
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

