@php
    $aux = new \DateTime();
    $aux=$aux->format('Y-m-d');
@endphp
<input type="hidden" id="fecha" name="fecha" value="{{$aux}}">
<input type="hidden" id="paciente_id" name="paciente_id" value="{{$paciente->id}}">
<div class="col-lg-12">
    <div class="col-lg-6">
        <div class="profile-user-info profile-user-info-striped">
            <div class="profile-info-row">
                <div class="profile-info-name"><u>Nombres </u>:</div>
                <div class="profile-info-value">
                    <span class="editable"><i>{{$paciente->nombre}}</i></span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"><u>Apellidos </u>:</div>
                <div class="profile-info-value">
                    <span class="editable"><i>{{$paciente->apellido_p}} {{$paciente->apellido_m}}</i></span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"><u>Edad </u>:</div>
                <div class="profile-info-value">
                    <span class="editable"><i>{{$edad=MyHelper:: Edad_Paciente($paciente->fecha_nac, "j")}}</i></span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"><u>Doctor o lugar previo</u>:</div>
                <div class="profile-info-value col-lg-12">
                    <input type="text" class="form-control" minlength="2" maxlength="50" placeholder="Ingrese Doctor o en lugar en el que fue atendido" id="previo" name="previo" value="{{old('previo', $data->previo ?? '')}}" onkeyup="PrvioMayus()"/>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div id="user-profile-2" class="user-profile">
            <div class="tabbable">
                <ul class="nav nav-tabs padding-18">
                    <li class="active">
                        <a data-toggle="tab" href="#curacion">
                            <i class="red ace-icon fa fa-plus-circle bigger-120"></i>
                            Curaciones
                        </a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#inyectable">
                            <i class="blue ace-icon fa fa-info-circle bigger-120"></i>
                            Inyectables
                        </a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#suero">
                            <i class="pink ace-icon fa fa-flask bigger-120"></i>
                            Sueros
                        </a>
                    </li>
                </ul>
                <div class="tab-content no-border padding-24">
                    <div id="curacion" class="tab-pane in active">
                        <div class="col-lg-12 center">
                            <div class="col-sm-12">
                                <label class="blue"><b>Detalles</b></label> <br>
                                <div class="form-group center">
                                        <textarea class="form-control" placeholder="Ingrese los detalles" id="detalles_c" name="detalles_c" rows="4" maxlength="500">{{old('detalles_c', $data->detalles_c ?? '')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="inyectable" class="tab-pane">
                        <div class="form-group">
                            <label for="tipo_i" class="col-lg-3 control-label blue"><b>Tipo de Inyección</b></label>
                            <div class="col-lg-8">
                                <select name="tipo_i" id="tipo_i" class="form-control">
                                    <option value="">Seleccione su Opción</option>
                                    <option value="Intramuscular" {{old("tipo_i",$data->tipo_i?? "")=="intramuscular" ? "selected":""}}>Intramuscular</option>
                                    <option value="Intravenosa" {{old("tipo_i",$data->tipo_i?? "")=="intravenosa" ? "selected":""}}>Intravenosa</option>
                                    <option value="Intradérmica" {{old("tipo_i",$data->tipo_i?? "")=="Intradérmica" ? "selected":""}}>Intradérmica</option>
                                    <option value="Subcutánea" {{old("tipo_i",$data->tipo_i?? "")=="Subcutánea" ? "selected":""}}>Subcutánea</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 center">
                            <div class="col-sm-12">
                                <label class="blue"><b>Medicamento</b></label> <br>
                                <div class="form-group center">
                                        <textarea class="form-control" placeholder="Ingrese medicamentos" id="medicamento_i" name="medicamento_i" rows="4" maxlength="500">{{old('medicamento_i', $data->medicamento_i ?? '')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 center">
                            <div class="col-sm-12">
                                <label class="blue"><b>Detalles</b></label> <br>
                                <div class="form-group center">
                                        <textarea class="form-control" placeholder="Ingrese los detalles" id="detalles_i" name="detalles_i" rows="4" maxlength="500">{{old('detalles_i', $data->detalles_i ?? '')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="suero" class="tab-pane">
                        <div id="inyectable" class="tab-pane">
                            <div class="form-group">
                                <label for="tipo_s" class="col-lg-3 control-label blue"><b>Tipo de Suero</b></label>
                                <div class="col-lg-8">
                                    <select name="tipo_s" id="tipo_s" class="form-control">
                                        <option value="">Seleccione su Opción</option>
                                        <option value="Solucion salina normal" {{old("tipo_s",$data->tipo_s?? "")=="solucion salina normal" ? "selected":""}}>Solución Salina Normal</option>
                                        <option value="Solucion salina hipertonica" {{old("tipo_s",$data->tipo_s?? "")=="solucion salina hipertonica" ? "selected":""}}>Solución Salina Hipertónica</option>
                                        <option value="Solucion salina hipotonica" {{old("tipo_s",$data->tipo_s?? "")=="solucion salina hipotonica" ? "selected":""}}>Solución Salina Hipotónica</option>
                                        <option value="Solucion de ringer con lactado" {{old("tipo_s",$data->tipo_s?? "")=="solucion de ringer con lactado" ? "selected":""}}>Solución de Ringer con Lactado</option>
                                        <option value="Solucion de tipo plasmalyte" {{old("tipo_s",$data->tipo_s?? "")=="solucion de tipo plasmalyte" ? "selected":""}}>Solución de tipo Plasmalyte</option>
                                        <option value="Solucion de dextrosa al 5%" {{old("tipo_s",$data->tipo_s?? "")=="solucion de dextrosa al 5%" ? "selected":""}}>Solución de Dextrosa al 5%</option>
                                        <option value="Suero glucosado hipertonico" {{old("tipo_s",$data->tipo_s?? "")=="suero glucosado hipertonico" ? "selected":""}}>Suero Glucosado Hipertónico</option>
                                        <option value="Suero glucosalino" {{old("tipo_s",$data->tipo_s?? "")=="suero glucosalino" ? "selected":""}}>Suero Glucosalino</option>
                                        <option value="Suero natural" {{old("tipo_s",$data->tipo_s?? "")=="suero natural" ? "selected":""}}>Suero Natural</option>
                                        <option value="Suero artificial" {{old("tipo_s",$data->tipo_s?? "")=="suero artificial" ? "selected":""}}>Suero Artificial</option>                                </select>
                                </div>
                            </div>
                            <div class="col-lg-12 center">
                                <div class="col-sm-12">
                                    <label class="blue"><b>Detalles</b></label> <br>
                                    <div class="form-group center">
                                            <textarea class="form-control" placeholder="Ingrese detalles" id="detalles_s" name="detalles_s" rows="4" maxlength="500">{{old('detalles_s', $data->detalles_s ?? '')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

var apellido = document.getElementById('apellido');  //instanciamos el elemento input
    function ApeMayus() {            //función que capitaliza la primera letra
    var palabra = apellido.value;                    //almacenamos el valor del input
    if(!apellido.value) return;                      //Si el valor es nulo o undefined salimos
    var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
    if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
        var minuscula = palabra.substring(1);
    }
    apellido.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
}

var previo = document.getElementById('previo');  //instanciamos el elemento input
    function PrevioMayus() {            //función que capitaliza la primera letra
    var palabra = previo.value;                    //almacenamos el valor del input
    if(!previo.value) return;                      //Si el valor es nulo o undefined salimos
    var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
    if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
        var minuscula = palabra.substring(1).toLowerCase();
    }
    previo.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
}
</script>

