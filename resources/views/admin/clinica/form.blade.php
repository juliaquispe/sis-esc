<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Nombre</label>
    <div class="col-sm-6">
        <input type="text" class="form-control"  maxlength="100" placeholder="Ingrese Nombre de la Clínica"  id="nombre" name="nombre" value="{{old('nombre', $clinica->nombre ?? '')}}" required autocomplete="off"/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Dirección</label>
    <div class="col-sm-6">
        <input type="text" class="form-control"  maxlength="60" placeholder="Ingrese la dirección de la Clínica"  id="direccion" name="direccion" value="{{old('direccion', $clinica->direccion ?? '')}}" required autocomplete="off"/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Telefono</label>
    <div class="col-sm-6">
        <input type="text" class="form-control"  maxlength="10" placeholder="Ingrese el número telefónico"  id="telefono" name="telefono" value="{{old('telefono', $clinica->telefono ?? '')}}"/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1">Primer Contacto</label>
    <div class="col-sm-6">
        <input type="text" class="form-control"  maxlength="10" placeholder="Ingrese número de celular"  id="contacto_1" name="contacto_1" value="{{old('contacto_1', $clinica->contacto_1 ?? '')}}" required autocomplete="off"/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Segundo Contacto</label>
    <div class="col-sm-6">
        <input type="text" class="form-control"  maxlength="10" placeholder="Ingrese número de celular"  id="contacto_2" name="contacto_2" value="{{old('contacto_2', $clinica->contacto_2 ?? '')}}" autocomplete="off"/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Propietario</label>
    <div class="col-sm-6">
        <input type="text" class="form-control"  maxlength="100" placeholder="Ingrese Nombre del propietario"  id="propietario" name="propietario" value="{{old('propietario', $clinica->propietario ?? '')}}" required autocomplete="off"/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Misión</label>
    <div class="col-sm-6">
        <textarea class="form-control" placeholder="Misión de la clínica" id="mision" name="mision" rows="3">{{old('mision', $clinica->mision ?? '')}}</textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Visión</label>
    <div class="col-sm-6">
        <textarea class="form-control" placeholder="Visión de la clínica" id="vision" name="vision" rows="3">{{old('vision', $clinica->vision ?? '')}}</textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Descripción</label>
    <div class="col-sm-6">
        <textarea class="form-control" placeholder="Descripción de la clínica" id="descripcion" name="descripcion" rows="3">{{old('descripcion', $clinica->descripcion ?? '')}}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="icono" class="col-lg-3 control-label requerido">Tema</label>
    <div class="col-lg-2">
        <select name="color" id="color" class="form-control">
            <option style="background: rgb(10, 10, 10)" value="skin-1" {{old("color",$clinica->color?? "")=="skin-1" ? "selected":""}}>oscuro</option>
            <option style="background: rgb(129, 9, 79)" value="skin-2" {{old("color",$clinica->color?? "")=="skin-2" ? "selected":""}}>Morado</option>
            <option style="background: rgb(213, 221, 223)" value="skin-3" {{old("color",$clinica->color?? "")=="skin-3" ? "selected":""}}>Claro</option>
            <option style="background: rgb(86, 131, 226)" value="no-skin" {{old("color",$clinica->color?? "")=="no-skin" ? "selected":""}}>Azul</option>
        </select>
    </div>
</div>
<div class="col-lg-12">
    <label class="col-lg-1 control-label no-padding-right">Foto</label>
    <div class="col-lg-4">
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($clinica->foto) ? Storage::url("Datos/Clinica/$clinica->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=Foto"}}" accept="image/*"/>
    </div>
    <label class="col-lg-1 control-label no-padding-right">Logo</label>
    <div class="col-lg-4">
        <input type="file" name="logo_up" id="logo" data-initial-preview="{{isset($clinica->logo) ? Storage::url("Datos/Clinica/$clinica->logo") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=Logo"}}" accept="image/*"/>
    </div>
</div>
