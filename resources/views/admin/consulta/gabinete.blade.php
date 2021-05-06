@csrf
<input type="hidden" id="ficha_id" value={{$ficha->id}}>
<input type="hidden" id="paciente_id" value={{$paciente->id}}>
<input type="hidden" id="consulta_id" value={{$consulta->id}}>
<input type="hidden" id="signos_vitales_id" value={{$signos_vitales->id}}>

<div class="col-lg-12 center">
    <div class="col-sm-2"></div>
    <div class="col-sm-8" style="text-align: center">
        <label class="blue requerido"><b>Estudio</b></label>
        <div class="form-group center">
                <textarea class="form-control" placeholder="Describa el estudio de la estudio" id="estudio" name="estudio" rows="3" maxlength="500" required >{{old('estudio', $consulta->estudio ?? '')}}</textarea>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>
<div class="col-lg-12 center">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <label class="blue"><b>Detalles</b></label> <br>
        <div class="form-group center">
                <textarea class="form-control" placeholder="Ingrese los detalle " id="detalle" name="detalle" rows="4" maxlength="500">{{old('detalle', $consulta->detalle ?? '')}}</textarea>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>
<div class="col-lg-12">
    <div class="col-lg-3"></div>
    <div class="col-lg-2">
        <button class="btn btn-success" type="button" id="Guardar" name="a" style="display: block;"><i class="fa fa-check"> Guarda</i></button>
    </div>
    <div class="col-lg-2">
        <button class="btn btn-primary" type="button" id="Actualizar" name="a" style="display: block;"><i class="fa fa-wrench"> Actualizar</i></button>
    </div>
    <div class="col-lg-2">
        <button class="btn btn-warning" type="submit" id="Imprimir" style="display: block;"><i class="fa fa-print"> IMPRIMIR</i></button>
    </div>
    <div class="col-lg-3"></div>
</div>
{{-- <div class="col-lg-12">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <button class="btn btn-primary" type="button" id="Actualizar" name="a" style="display: block;"><i class="fa fa-wrench"> Actualizar</i></button>
    </div>
    <div class="col-lg-4"></div>
</div><div class="col-lg-12">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <button class="btn btn-warning" type="submit" id="Imprimir" style="display: block;"><i class="fa fa-print"> IMPRIMIR</i></button>
    </div>
    <div class="col-lg-4"></div>
</div> --}}
