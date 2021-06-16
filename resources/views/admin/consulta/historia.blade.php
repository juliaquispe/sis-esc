<div class="row col-xs-12">

    <input type="hidden" id="historial_id" value="{{$aux3}}">
    <label class="blue"><b>Datos Generales</b></label>
    <table class="col-xs-12 form-group">
        <tr>
            <td style="width: 13%" class="align-left">
                <label >Tipo de Sangre</label>
            </td>
            <td style="width: 12%" class="align-left">
                <select name="t_sangre" id="t_sangre" class="form-control">
                    <option value="">Seleccione su Opción</option>
                    <option value="O negativo" {{old("t_sangre",$historial->t_sangre?? "")=="O negativo" ? "selected":""}}>O negativo</option>
                    <option value="O positivo" {{old("t_sangre",$historial->t_sangre?? "")=="O positivo" ? "selected":""}}>O positivo</option>
                    <option value="A negativo" {{old("t_sangre",$historial->t_sangre?? "")=="A negativo" ? "selected":""}}>A negativo</option>
                    <option value="A positivo" {{old("t_sangre",$historial->t_sangre?? "")=="A positivo" ? "selected":""}}>A positivo</option>
                    <option value="B negativo" {{old("t_sangre",$historial->t_sangre?? "")=="B negativo" ? "selected":""}}>B negativo</option>
                    <option value="B positivo" {{old("t_sangre",$historial->t_sangre?? "")=="B positivo" ? "selected":""}}>B positivo</option>
                    <option value="AB negativo" {{old("t_sangre",$historial->t_sangre?? "")=="AB negativo" ? "selected":""}}>AB negativo</option>
                    <option value="AB positivo" {{old("t_sangre",$historial->t_sangre?? "")=="AB positivo" ? "selected":""}}>AB positivo</option>
                </select>
            </td>
            <td style="width: 10%;" class="align-right">
                <label >Vivienda &nbsp; </label>
            </td>
            <td style="width: 15%" class="align-left">
                <select name="vivienda" id="vivienda" class="form-control">
                    <option value="">Seleccione su Opción</option>
                    <option value="Propia" {{old("vivienda",$historial->vivienda?? "")=="Propia" ? "selected":""}}>Propio</option>
                    <option value="Alquilado" {{old("vivienda",$historial->vivienda?? "")=="Alquilado" ? "selected":""}}>Alquilado</option>
                    <option value="Anticretico" {{old("vivienda",$historial->vivienda?? "")=="Anticretico" ? "selected":""}}>Anticretico</option>
                </select>
            </td>
            <td style="width: 10%" class="align-center">
                <label >Agua</label>
            </td>
            <td style="width: 5%" class="align-left">
                <input name="agua" id="agua" type="checkbox" value="1" onchange="javascript:showContent()"
                    @if (isset($historial)&&$historial->agua == "si")
                        checked
                    @endif
                >
            </td>
            <td style="width: 10%" class="align-center">
                <label >Luz</label>
            </td>
            <td style="width: 5%" class="align-left">
                <input name="luz" id="luz" type="checkbox" value="1" onchange="javascript:showContent()"
                    @if (isset($historial)&&$historial->luz == "si")
                        checked
                    @endif
                >
            </td>
            <td style="width: 15%" class="align-center">
                <label >Alcantarillado</label>
            </td>
            <td style="width: 5%" class="align-left">
                <input name="alcantarillado" id="alcantarillado" type="checkbox" value="1" onchange="javascript:showContent()"
                    @if (isset($historial)&&$historial->alcantarillado == "si")
                        checked
                    @endif
                >
            </td>
        </tr>
    </table>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 center">
        <div class="form-group">
            <div class="form-group align-center">
                <label class="blue"><b>Antecedentes Personales Patológico</b></label>
            </div>
            <table class="col-xs-12">
                <tr>
                    <td style="width: 35%" class="align-left">
                        <label >Hipertensión Arterial</label>
                    </td>
                    <td style="width: 15%" class="align-left">
                        <input name="p_h_a" id="p_h_a" type="checkbox" value="1" onchange="javascript:showContent()"
                            @if (isset($historial)&&$historial->p_h_a == "si")
                                checked
                            @endif
                        >
                    </td>
                    <td style="width: 35%" class="align-left">
                        <label > &nbsp; Várices</label>
                    </td>
                    <td style="width: 10%" class="align-left">
                        <input name="p_varices" id="p_varices" type="checkbox" value="1" onchange="javascript:showContent()"
                            @if (isset($historial)&&$historial->p_varices == "si")
                                checked
                            @endif
                        >
                    </td>
                </tr>
                <tr>
                    <td class="align-left" cellpadding="10px">
                        <label >Diabetes</label>
                    </td>
                    <td class="align-left">
                        <input name="p_diabetes" id="p_diabetes" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->p_diabetes == "si")
                            checked
                        @endif
                    >
                    </td>
                    <td class="align-left" cellpadding="10px">
                        <label > &nbsp; Enf. Renal</label>
                    </td>
                    <td class="align-left">
                        <input name="p_renal" id="p_renal" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->p_renal == "si")
                            checked
                        @endif
                    >
                    </td>
                </tr>
                <tr>
                    <td class="align-left" cellpadding="10px">
                        <label >TBC Pulmonar</label>
                    </td>
                    <td class="align-left">
                        <input name="p_pulmonar" id="p_pulmonar" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->p_pulmonar == "si")
                            checked
                        @endif
                    >
                    </td>
                    <td class="align-left" cellpadding="10px">
                        <label > &nbsp; Hepatopatías</label>
                    </td>
                    <td class="align-left">
                        <input name="p_hepatopatia" id="p_hepatopatia" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->p_hepatopatia == "si")
                            checked
                        @endif
                    >
                    </td>
                </tr>
                <tr>
                    <td class="align-left" cellpadding="10px">
                        <label >Patologia Mamaria</label>
                    </td>
                    <td class="align-left">
                        <input name="p_mamaria" id="p_mamaria" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->p_mamaria == "si")
                            checked
                        @endif
                    >
                    </td>
                    <td class="align-left" cellpadding="10px">
                        <label > &nbsp; Tumores Genitales</label>
                    </td>
                    <td class="align-left">
                        <input name="p_genitales" id="p_genitales" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->p_genitales == "si")
                            checked
                        @endif
                    >
                    </td>
                </tr>
                <tr>
                    <td class="align-left" cellpadding="10px">
                        <label >Cardiopatias</label>
                    </td>
                    <td class="align-left">
                        <input name="p_cardiopatias" id="p_cardiopatias" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->p_cardiopatias == "si")
                            checked
                        @endif
                    >
                    </td>
                    <td class="align-left" cellpadding="10px">
                        <label > &nbsp; Enf. Gastrointestinal</label>
                    </td>
                    <td class="align-left">
                        <input name="p_gastrointestinal" id="p_gastrointestinal" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->p_gastrointestinal == "si")
                            checked
                        @endif
                    >
                    </td>
                </tr>
                <tr>
                    <td class="align-left" cellpadding="10px">
                        <label >ITS</label>
                    </td>
                    <td class="align-left">
                        <input name="p_its" id="p_its" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->p_its == "si")
                            checked
                        @endif
                    >
                    </td>
                    <td class="align-left" cellpadding="10px">
                        <label > &nbsp; Chagas</label>
                    </td>
                    <td class="align-left">
                        <input name="p_chagas" id="p_chagas" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->p_chagas == "si")
                            checked
                        @endif
                    >
                    </td>
                </tr>
            </table>
            <label class="blue"><b>Detalles</b></label>
            <div class="col-sm-11 center">
                <textarea class="form-control" id="p_detalles" name="p_detalles" rows="3" maxlength="500">{{old('p_detalles', $historial->p_detalles ?? '')}}</textarea>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 center">
        <div class="form-group align-center">
            <label class="green"><b>Antecedentes H-Familiares</b></label>
        </div>
        <table class="col-xs-12">
            <tr>
                <td style="width: 35%" class="align-left">
                    <label > &nbsp; Hipertensión Arterial</label>
                </td>
                <td style="width: 15%" class="align-left">
                    <input name="f_h_a" id="f_h_a" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->f_h_a == "si")
                            checked
                        @endif
                    >
                </td>
                <td style="width: 35%" class="align-left">
                    <label > &nbsp; Várices</label>
                </td>
                <td style="width: 10%" class="align-left">
                    <input name="f_varices" id="f_varices" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->f_varices == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
            <tr>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Diabetes</label>
                </td>
                <td class="align-left">
                    <input name="f_diabetes" id="f_diabetes" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->f_diabetes == "si")
                            checked
                        @endif
                    >
                </td>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Enf. Renal</label>
                </td>
                <td class="align-left">
                    <input name="f_renal" id="f_renal" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->f_renal == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
            <tr>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; TBC Pulmonar</label>
                </td>
                <td class="align-left">
                    <input name="f_pulmonar" id="f_pulmonar" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->f_pulmonar == "si")
                            checked
                        @endif
                    >
                </td>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Hepatopatías</label>
                </td>
                <td class="align-left">
                    <input name="f_hepatopatia" id="f_hepatopatia" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->f_hepatopatia == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
            <tr>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Patologia Mamaria</label>
                </td>
                <td class="align-left">
                    <input name="f_mamaria" id="f_mamaria" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->f_mamaria == "si")
                            checked
                        @endif
                    >
                </td>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Tumores Genitales</label>
                </td>
                <td class="align-left">
                    <input name="f_genitales" id="f_genitales" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->f_genitales == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
            <tr>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Cardiopatias</label>
                </td>
                <td class="align-left">
                    <input name="f_cardiopatias" id="f_cardiopatias" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->f_cardiopatias == "si")
                            checked
                        @endif
                    >
                </td>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Enf. Gastrointestinal</label>
                </td>
                <td class="align-left">
                    <input name="f_gastrointestinal" id="f_gastrointestinal" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->f_gastrointestinal == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
            <tr>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; ITS</label>
                </td>
                <td class="align-left">
                    <input name="f_its" id="f_its" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->f_its == "si")
                            checked
                        @endif
                    >
                </td>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Chagas</label>
                </td>
                <td class="align-left">
                    <input name="f_chagas" id="f_chagas" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->f_chagas == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
        </table>
        <label class="green center"><b>Detalles</b></label>
        <div class="col-sm-11 center">
            <textarea class="form-control" id="f_detalles" name="f_detalles" rows="3" maxlength="500" required>{{old('f_detalles', $historial->f_detalles ?? '')}}</textarea>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-4 center">
        <div class="form-group align-center">
            <label class=""><b>Antecedentes No Patologicos</b></label>
        </div>
        <table class="col-xs-12">
            <tr>
                <td style="width: 70%" class="align-left">
                    <label > &nbsp; Actividad Física</label>
                </td>
                <td style="width: 30%" class="align-left">
                    <input name="np_fisica" id="np_fisica" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->np_fisica == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
            <tr>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Alcoholismo</label>
                </td>
                <td class="align-left">
                    <input name="np_alcoholismo" id="np_alcoholismo" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->np_alcoholismo == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
            <tr>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Tabaquismo</label>
                </td>
                <td class="align-left">
                    <input name="np_tabaquismo" id="np_tabaquismo" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->np_tabaquismo == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
            <tr>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Sustancias o Drogas</label>
                </td>
                <td class="align-left">
                    <input name="np_sustancias" id="np_sustancias" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->np_sustancias == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
        </table>
        <label class="center"><b>Detalles</b></label>
        <div class="col-sm-12 center">
            <textarea class="form-control" id="np_detalles" name="np_detalles" rows="3" maxlength="500" required>{{old('np_detalles', $historial->np_detalles ?? '')}}</textarea>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 center">
        <div class="form-group align-center">
            <label class="red"><b> Otros Antecedentes</b></label>
        </div>
        <table class="col-xs-12">
            <tr>
                <td style="width: 70%" class="align-left">
                    <label > &nbsp; Alergias</label>
                </td>
                <td style="width: 30%" class="align-left">
                    <input name="o_alergias" id="o_alergias" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->o_alergias == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
            <tr>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Cirugías</label>
                </td>
                <td class="align-left">
                    <input name="o_cirugias" id="o_cirugias" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->o_cirugias == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
            <tr>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Traumatismos</label>
                </td>
                <td class="align-left">
                    <input name="o_traumatismos" id="o_traumatismos" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->o_traumatismos == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
            <tr>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Medicamentos</label>
                </td>
                <td class="align-left">
                    <input name="o_medicamentos" id="o_medicamentos" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->o_medicamentos == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
            <tr>
                <td class="align-left" cellpadding="10px">
                    <label > &nbsp; Transfusionales</label>
                </td>
                <td class="align-left">
                    <input name="o_transfusionales" id="o_transfusionales" type="checkbox" value="1" onchange="javascript:showContent()"
                        @if (isset($historial)&&$historial->o_transfusionales == "si")
                            checked
                        @endif
                    >
                </td>
            </tr>
        </table>
        <label class="red center"><b>Detalles</b></label>
        <div class="col-sm-12 center">
            <textarea class="form-control" id="o_detalles" name="o_detalles" rows="3" maxlength="500" required>{{old('o_detalles', $historial->o_detalles ?? '')}}</textarea>
        </div>
    </div>
    @if ($paciente->genero=='Mujer')
        <div class="col-xs-12 col-sm-4 center">
            <div class="form-group align-center">
                <label class="pink"><b>Antecedentes Ginecológicos</b></label>
            </div>
            <table class="col-xs-12">
                <tr>
                    <td style="width: 70%" class="align-left">
                        <label > &nbsp; Embarazos</label>
                    </td>
                    <td style="width: 30%" class="align-left">
                        <input name="g_embarazos" id="g_embarazos" type="checkbox" value="1" onchange="javascript:showContent()"
                            @if (isset($historial)&&$historial->g_embarazos == "si")
                                checked
                            @endif
                        >
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%" class="align-left">
                        <label > &nbsp; Gestante</label>
                    </td>
                    <td style="width: 30%" class="align-left">
                        <input name="g_gestante" id="g_gestante" type="checkbox" value="1" onchange="javascript:showContent()"
                            @if (isset($historial)&&$historial->g_gestante == "si")
                                checked
                            @endif
                        >
                    </td>
                </tr>
                <tr>
                    <td class="align-left" cellpadding="10px">
                        <label > &nbsp; Cancer de Mama</label>
                    </td>
                    <td class="align-left">
                        <input name="g_c_mama" id="g_c_mama" type="checkbox" value="1" onchange="javascript:showContent()"
                            @if (isset($historial)&&$historial->g_c_mama == "si")
                                checked
                            @endif
                        >
                    </td>
                </tr>
            </table>
            <label class="purple center"><b>Detalles</b></label>
            <div class="col-sm-12 center">
                <textarea class="form-control" id="g_detalles" name="g_detalles" rows="3" maxlength="500" required>{{old('g_detalles', $historial->g_detalles ?? '')}}</textarea>
            </div>
        </div>
    @else
        <div class="col-xs-12 col-sm-4 center" style="display: none">
            <div class="form-group align-center">
                <label class="pink"><b>Antecedentes Ginecológicos</b></label>
            </div>
            <table class="col-xs-12">
                <tr>
                    <td style="width: 70%" class="align-left">
                        <label > &nbsp; Embarazos</label>
                    </td>
                    <td style="width: 30%" class="align-left">
                        <input name="g_embarazos" id="g_embarazos" type="checkbox" value="1" onchange="javascript:showContent()"
                            @if (isset($historial)&&$historial->g_embarazos == "si")
                                checked
                            @endif
                        >
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%" class="align-left">
                        <label > &nbsp; Gestante</label>
                    </td>
                    <td style="width: 30%" class="align-left">
                        <input name="g_gestante" id="g_gestante" type="checkbox" value="1" onchange="javascript:showContent()"
                            @if (isset($historial)&&$historial->g_gestante == "si")
                                checked
                            @endif
                        >
                    </td>
                </tr>
                <tr>
                    <td class="align-left" cellpadding="10px">
                        <label > &nbsp; Cancer de Mama</label>
                    </td>
                    <td class="align-left">
                        <input name="g_c_mama" id="g_c_mama" type="checkbox" value="1" onchange="javascript:showContent()"
                            @if (isset($historial)&&$historial->g_c_mama == "si")
                                checked
                            @endif
                        >
                    </td>
                </tr>
            </table>
            <label class="purple center"><b>Detalles</b></label>
            <div class="col-sm-12 center">
                <textarea class="form-control" id="g_detalles" name="g_detalles" rows="3" maxlength="500" required>{{old('g_detalles', $historial->g_detalles ?? '')}}</textarea>
            </div>
        </div>
    @endif
</div>
<br>
<div class="col-xs-12" >
    <div class="col-xs-12 col-sm-3">
    </div>
    <div class="col-xs-12 col-sm-2">
        <button class="btn btn-success" type="button" id="btnGuardar_H" style="display: block;"><i class="fa fa-plus"> Guardar</i></button>
    </div>
    <div class="col-xs-12 col-sm-2">
        <button class="btn btn-primary" type="button" id="btnActualizar_H" style="display: none;"><i class="fa fa-wrench"> Actualizar</i></button>
    </div>
    <div class="col-xs-12 col-sm-2">
        <form action="{{route('imprimir_historial', ['id'=>$paciente->id])}}" target="{{$paciente->id}}">
            <button class="btn btn-warning" type="submit" id="btnImprimir_H" style="display: none;"><i class="fa fa-print"> IMPRIMIR</i></button>
        </form>
    </div>
</div>
