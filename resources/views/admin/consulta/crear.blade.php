@extends("theme.$theme.layout")
@section('titulo')
Consulta
@endsection
@section('contenido')
@section('scripts')
<script src="{{asset("assets/pages/scripts/consulta/consulta.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/consulta/receta_input.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/consulta/receta.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/consulta/historial.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/consulta/gabinete.js")}}" type="text/javascript"></script>
@endsection
<div class="row">
    <div class="col-xs-12">
        <div class="page-header align-center">
            <h1>
                <b>Consulta Médica</b>
                <button class="btn btn-pink pull-right" onclick="location.href='{{route('terminar_consulta', ['id' => $ficha->id])}}'">
                    <i class="fa fa-save">
                        Terminar Consulta
                    </i>
                </button> &nbsp;&nbsp;&nbsp;
                <button class="btn btn-inverse pull-right" onclick="location.href='{{route('crear_internacion', ['id' => $ficha->id])}}'">
                    <i class="fa fa-bed">
                        Pasar a Internación
                    </i>
                </button>
            </h1>
        </div>
        <div class="clearfix">
            <div class="col-xs-12 col-sm-2 center">
                <div>
                    <span class="profile-picture">
                        @if ($paciente->foto==null)
                        <img src="{{asset("assets/$theme/assets/images/avatars/dos.jpg")}}" height="130px" width="130px"/>
                        @else
                        <img src="{{Storage::url("Datos/Paciente/Foto/$paciente->foto")}}" height="130px" width="150px"/>
                        @endif
                    </span>
                    <span class="blue"><b>{{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}</b></span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="profile-user-info">
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Edad </div>
                        <div class="profile-info-value">
                            <span>{{$edad=MyHelper::Edad_Paciente($paciente->fecha_nac,"completo")}}</span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Dirección </div>
                        <div class="profile-info-value">
                            <span>
                                @if($paciente->direccion==null)
                                    No Registrado
                                @else
                                    {{$paciente->direccion}}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Contacto </div>
                        <div class="profile-info-value">
                            <span>
                                @if($paciente->celular==null)
                                    No Registrado
                                @else
                                    {{$paciente->celular}}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"> T. Sangre </div>
                        <div class="profile-info-value">
                            <span>
                                @if($paciente->t_sangre==null)
                                    No Registrado
                                @else
                                    {{$paciente->t_sangre}}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Género </div>
                        <div class="profile-info-value">
                            <span>
                                {{$paciente->genero}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="">
                    <div class="align-center">
                        @if ($SVM==NULL)
                            <label for="" class="blue">Últimos Signos Vitales</label>
                        @else
                            <label for="" class="blue">Últimos Signos Vitales ({{$aux_fecha}})</label>
                        @endif
                    </div>
                    <table id="tabla" class="table  table-bordered table-hover" >
                        <tr style="background: rgb(237, 243, 247)">
                            <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-arrow-up" style="color: darkviolet"></i> <br>Altura</th>
                            <th style="text-align: center; width: 14%"><i class="fa fa-tachometer" style="color: rgb(100, 149, 237)"></i> <br>Peso</th>
                            {{-- <th style="text-align: center; width: 10%"><i class="glyphicon glyphicon-piggy-bank" style="color: rgb(121, 170, 132)"></i> <br>IMC</th> --}}
                            <th style="text-align: center; width: 16%"><i class="glyphicon glyphicon-fire" style="color: rgb(240, 161, 15)"></i> <br>Tem</th>
                            <th style="text-align: center; width: 20%"><i class="glyphicon glyphicon-time blue"></i> <br>P.A.</th>
                            <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-heart-empty" style="color: red"></i> <br>F.C</th>
                            <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-flash" style="color: saddlebrown"></i> <br>F.R</th>
                        </tr>
                        @if ($SVM==null)
                            <tr>
                                <td colspan="6" class="center">
                                    <span style="color: red">Esta es su primera consulta</span>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td style="text-align: center;">
                                    <i>
                                        @if ($SVM->altura==null)
                                            <span style="color: red">Sin Reg.</span>
                                        @else
                                            {{$SVM->altura}} cm
                                        @endif
                                    </i>
                                </td>
                                <td style="text-align: center;">
                                    <i>
                                        @if ($SVM->peso==null)
                                            <span style="color: red">Sin Reg.</span>
                                        @else
                                            {{$SVM->peso}} kg
                                        @endif
                                    </i>
                                </td>
                                {{-- <td style="text-align: center;"><i>0.0 mb</i></td> --}}
                                <td style="text-align: center;">
                                    <i>
                                        @if ($SVM->temperatura==null)
                                            <span style="color: red">Sin Reg.</span>
                                        @else
                                            {{$SVM->temperatura}} °C
                                        @endif
                                    </i>
                                </td>
                                <td style="text-align: center;">
                                    <i>
                                        @if ($SVM->p_a==null)
                                            <span style="color: red">Sin Reg.</span>
                                        @else
                                            {{$SVM->p_a}} mmHg
                                        @endif
                                    </i>
                                </td>
                                <td style="text-align: center;">
                                    <i>
                                        @if ($SVM->f_c==null)
                                            <span style="color: red">Sin Reg.</span>
                                        @else
                                            {{$SVM->f_c}} lat/min
                                        @endif
                                    </i>
                                </td>
                                <td style="text-align: center;">
                                    <i>
                                        @if ($SVM->f_r==null)
                                            <span style="color: red">Sin Reg.</span>
                                        @else
                                            {{$SVM->f_r}} r/min
                                        @endif
                                    </i>
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        <div class="">
            <div id="user-profile-2" class="user-profile">
                <div class="tabbable">
                    <ul class="nav nav-tabs padding-18">
                        <li>
                        <a data-toggle="tab" href="#historia">
                            <i class="green ace-icon fa fa-folder-o bigger-120"></i>

                            Historia Clínica
                        </a>
                        </li>

                        <li class="active">
                        <a data-toggle="tab" href="#consulta">
                            <i class="orange ace-icon fa fa-stethoscope bigger-120"></i>
                            Consulta Médica
                        </a>
                        </li>

                        <li>
                        <a data-toggle="tab" href="#receta">
                            <i class="blue ace-icon fa fa-file bigger-120"></i>
                            Receta Médica
                        </a>
                        </li>

                        <li>
                        <a data-toggle="tab" href="#gabinete">
                            <i class="pink ace-icon fa fa-book bigger-120"></i>
                            Est. Gabinete
                        </a>
                        </li>
                    </ul>
                    <div class="tab-content no-border padding-24">
                        <div id="historia" class="tab-pane">
                            @include('admin.consulta.historia')
                        </div>

                        <div id="consulta" class="tab-pane in active">
                            @include('admin.consulta.consulta')
                        </div>

                        <div id="receta" class="tab-pane">
                            @include('admin.consulta.receta')
                        </div>

                        <div id="gabinete" class="tab-pane">
                            @include('admin.consulta.gabinete')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
