<input type="hidden" id="fecha_ingreso" name="fecha_ingreso" value="{{$dato->fecha_ingreso}}">
<h4 class="blue"><i>Datos del Paciente</i></h4>
<table width="100%" class="table  table-bordered table-hover">
    <tr class="blue">
        <th class="center" width="30%">Paciente</th>
        <th class="center" width="15%">Edad</th>
        <th class="center" width="20%">Dirección</th>
        <th class="center" width="15%">Sangre</th>
        <th class="center" width="20%">Fecha de Ingreso</th>
    </tr>
    <tr class="center">
        <td>{{$dato->paciente->nombre}} {{$dato->paciente->apellido_p}} {{$dato->paciente->apellido_m}}</td>
        <td>{{$edad=MyHelper::Edad_Paciente($dato->paciente->fecha_nac,"index")}}</td>
        <td>{{$dato->paciente->direccion}}</td>
        <td>
            @if ($sangre==null)
                <span class="red">No registrado</span>
            @else
                {{$sangre}}
            @endif
        </td>
        <td>{{$dato->fecha_ingreso}}</td>
    </tr>
</table>
<h4 class="blue"><i>Datos del Alta</i></h4>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Fecha de Salida</label>
    <div class="col-sm-6">
        <input type="date" class="form-control" min={{$dato->fecha_ingreso}} id="fecha_salida" name="fecha_salida" value="{{old('fecha_salida', $personal->fecha_salida ?? '')}}" required/>
    </div>
</div>
<table width="100%" class="table  table-bordered table-hover">
    <tr class="blue">
        <th class="center" width="50%">Diagnostico de Salida</th>
        <th class="center" width="50%">Tratamiento Realizado</th>
    </tr>
    <tr class="center">
        <td>
            <textarea class="form-control" placeholder="" id="diagnostico_salida" name="diagnostico_salida" rows="3" maxlength="500">{{old('diagnostico_salida', $dato->diagnostico_salida ?? 'S/P')}}</textarea>
        </td>
        <td>
            <textarea class="form-control" placeholder="" id="tratamiento_realizado" name="tratamiento_realizado" rows="3" maxlength="500">{{old('tratamiento_realizado', $dato->tratamiento_realizado ?? 'S/P')}}</textarea>
        </td>
    </tr>
</table>
<label for="foto" class="col-lg-3 control-label blue left"><b>Fotos de hojas de Evolución</b></label>
<div class="form-group">
    <div class="col-lg-12">
        <input type="file" name='fotos[]' id="foto" data-initial-preview="{{isset($servicio->foto) ? Storage::url("datos/fotos/servicio/$servicio->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=Hoja+de+evolucion"}}" accept="image/*" multiple/>
    </div>
</div>
<div class="form-group" style="width:100%; height: 40px;">
    <label class="control-label col-xs-12 col-sm-3">¿Retiro Forzado?</label>
    <div class="controls col-xs-12 col-sm-9">
        <div class="col-xs-2">
            <label>
                <input name="forzado" id="forzado" class="ace ace-switch ace-switch-6" type="checkbox" value="1" onchange="javascript:showContent()">
                <span class="lbl"></span>
            </label>
        </div>
    </div>
</div>
<div id="div_forzado" style="display: none">
    <h4 class="blue"><i>Datos del Solicitante</i></h4>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nombres y Apellidos</label>
        <div class="col-sm-6">
            <input type="text" minlength="3" maxlength="80" id="nombre_resp" name="nombre_resp" class="form-control" autocomplete="off" placeholder="Ingrese Nombres y Apellidos"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Número de CI</label>
        <div class="col-sm-6">
            <input type="text" minlength="7" maxlength="12" id="ci_resp" name="ci_resp" class="form-control" autocomplete="off" placeholder="Ingrese  CI"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Testigo</label>
        <div class="col-sm-6">
            <input type="text" minlength="3" maxlength="80" class="form-control" name="testigo" id="testigo" autocomplete="off" placeholder="Ingrese Nombres y Apellidos del testigo"/>
        </div>
    </div>
</div>
