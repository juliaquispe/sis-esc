@extends("theme.$theme.layout")
@section('titulo')
    Reportes
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/reportes/reportes.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Reportes
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.correcto')
        @include('mensajes.incorrecto')
        <form action="{{route('imprimir_reporte')}}" class="form-horizontal" target="{{5}}" id="form-general">
            <div class="form-group">
                <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1">Informe</label>
                <div class="col-lg-3">
                    <select name="informe" id="informe" class="form-control" required>
                        <option value="">Seleccione su Opción</option>
                        <option value="paciente" {{old("informe",$historial->informe?? "")=="paciente" ? "selected":""}}>Paciente</option>
                        <option value="consulta" {{old("informe",$historial->informe?? "")=="consulta" ? "selected":""}}>Consulta</option>
                        <option value="enfermeria" {{old("informe",$historial->informe?? "")=="enfermeria" ? "selected":""}}>Enfermeria</option>
                    </select>
                </div>
            </div>
            <div class="form-group" id="div_t_paciente" style="display: none">
                <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1">Tipo de Informe</label>
                <div class="col-lg-3">
                    <select name="t_paciente" id="t_paciente" class="form-control">
                        <option value="">Seleccione su Opción</option>
                        <option value="activos" {{old("t_paciente",$historial->t_paciente?? "")=="activos" ? "selected":""}}>Pacientes Creados</option>
                        <option value="baja" {{old("t_paciente",$historial->t_paciente?? "")=="baja" ? "selected":""}}>Pacientes dados de Baja</option>
                    </select>
                </div>
            </div>
            <div class="form-group" id="div_t_consulta" style="display: none">
                <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1">Tipo de Informe</label>
                <div class="col-lg-3">
                    <select name="t_consulta" id="t_consulta" class="form-control">
                        <option value="">Seleccione su Opción</option>
                        <option value="atendido" {{old("t_consulta",$historial->t_consulta?? "")=="atendido" ? "selected":""}}>Consultas Atendidas</option>
                        <option value="espera" {{old("t_consulta",$historial->t_consulta?? "")=="espera" ? "selected":""}}>Consultas en Espera</option>
                        <option value="falta" {{old("t_consulta",$historial->t_consulta?? "")=="falta" ? "selected":""}}>Faltas</option>
                        <option value="todo" {{old("t_consulta",$historial->t_consulta?? "")=="todo" ? "selected":""}}>Todos</option>
                    </select>
                </div>
            </div>
            <div class="form-group" id="div_t_enfermeria" style="display: none">
                <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1">Tipo de atención</label>
                <div class="col-lg-3">
                    <select name="t_enfermeria" id="t_enfermeria" class="form-control">
                        <option value="">Seleccione su Opción</option>
                        <option value="curacion" {{old("t_enfermeria",$historial->t_enfermeria?? "")=="curacion" ? "selected":""}}>Curaciones</option>
                        <option value="inyectable" {{old("t_enfermeria",$historial->t_enfermeria?? "")=="inyectable" ? "selected":""}}>Inyectables</option>
                        <option value="sueros" {{old("t_enfermeria",$historial->t_enfermeria?? "")=="sueros" ? "selected":""}}>Sueros</option>
                        <option value="todo" {{old("t_enfermeria",$historial->t_enfermeria?? "")=="todo" ? "selected":""}}>Todos</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1">Tipo de Fecha</label>
                <div class="col-lg-3">
                    <select name="t_fecha" id="t_fecha" class="form-control" required>
                        <option value="">Seleccione su Opción</option>
                        <option value="especifico" {{old("t_fecha",$historial->t_fecha?? "")=="especifico" ? "selected":""}}>Fecha Específico</option>
                        <option value="rango" {{old("t_fecha",$historial->t_fecha?? "")=="rango" ? "selected":""}}>Rango de Fecha</option>
                    </select>
                </div>
            </div>

            <div class="form-group" id="div_fecha_esp" style="display: none">
                <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1">Indique la fecha</label>
                <div class="col-sm-3">
                    <input type="date" min="1960-01-01" name="fecha_esp" id="fecha_esp" class="form-control" value="{{old('fecha_esp', $personal->fecha_esp ?? '')}}" placeholder="Fecha de Inicio"/>
                </div>
            </div>
            <div class="form-group" id="div_rango" style="display: none">
                <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1">Fecha de inicio</label>
                <div class="col-sm-2">
                    <input type="date" min="1960-01-01" name="fecha_ini" id="fecha_ini" class="form-control" value="{{old('fecha_ini', $personal->fecha_ini ?? '')}}" placeholder="Fecha de Inicio"/>
                </div>

                <label class="col-sm-2 control-label no-padding-right requerido" for="form-field-1">Fecha Límite</label>
                <div class="col-sm-2">
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{old('fecha_fin', $personal->fecha_fin ?? '')}}" placeholder="Fecha de Inicio"/>
                </div>
            </div>
            <div class="box-footer">
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-success btn-xl" title="Imprimir Reporte">
                        <i class="fa fa-fw fa-download"></i> Generar Reporte
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
