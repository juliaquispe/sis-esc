{{-- @extends("theme.$theme.layout")
@section('titulo')
    Fichas
@endsection
@section('scripts')
<script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/ficha/validar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
    @if(Auth::user()->rol->añadir ==1)
    <span class="blue"> <h3>Lista de Servicios</h3></span>
    <div class="row">
        <div class="col-xs-12">
            <div style="text-align: center">
                <h5 class="center">
                <ul class="ace-thumbnails clearfix">
                    @foreach ($servicios as $servicio)
                        <div class="ace-thumbnails clearfix col-lg-2">
                            <span class="blue">{{$servicio->nombre}}</span><br>
                            <li>
                                <a href="{{route('crear_ficha', ['id' => $servicio->id])}}">
                                    @if ($servicio->foto==null)
                                        <img width="160" height="120" src="{{asset("assets/$theme/assets/images/avatars/servicio.jpg")}}"/>
                                    @else
                                        <img width="160" height="120" src="{{Storage::url("Datos/Servicio/Foto/$servicio->foto")}}"/>
                                    @endif
                                    <div class="text">
                                        <div class="inner">Registrar {{$servicio->nombre}}</div>
                                    </div>
                                </a>
                            </li>
                        </div>
                    @endforeach
                </ul>
                </h5>
            </div>
        </div>
    </div>
    @endif <br><br>
    @php
        setlocale(LC_ALL,"es_CO.utf8");
        $data =strtotime($fecha_actual);
        $formato_fecha = strtolower(strftime("%A %d de %B", $data));

        $aux = new \DateTime();
        $aux=$aux->format('Y-m-d');
    @endphp
    <span class="blue center">
        <h3><b>Nómina de Atención para: {{$formato_fecha}}</b>
            <button  class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#VerFecha" title="Ir a Fecha">
                <i class="fas fa fa-calendar"> Ver Por Fecha</i>
            </button>
            @if ($aux!=$fecha_actual)
                <button  class="btn btn-xs btn-primary pull-right " title="Volver" onclick="location.href='{{route('ficha')}}'">
                    <i class="fa fa-faw fa-reply-all bigger-120"></i>
                </button>
            @endif
        </h3>
    </span>
    <div class="modal modal-info fade in" id="VerFecha" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" style="background: #f1f5db">
                <div class="modal-header " style="background: #192953">
                    <button type="button" class="white close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="white modal-title" style="text-align: center"><b>Seleccionar la Fecha</b></h4>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Fecha</u>:</div>
                            <div class="profile-info-value">
                                <input type="date"class="form-control" name="ver_fecha" id="ver_fecha" value="{{old('fecha', $aux)}}" required/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background: #192953">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Mostrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            @include('mensajes.correcto')
            @include('mensajes.incorrecto')
            <div class="box-body">
                <table id="tabla-data" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="col-lg-1" style="text-align: center;">Expediente</th>
                            <th class="col-lg-3" style="text-align: center;">Paciente</th>
                            <th class="col-lg-2" style="text-align: center;">Especielidad</th>
                            <th class="col-lg-3" style="text-align: center;">Edad</th>
                            <th class="col-lg-1" style="text-align: center;">Hora</th>
                            <th class="col-lg-1" style="text-align: center;">Estado</th>
                            <th class="col-lg-1" style="text-align: center;">Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $ficha)
                            <tr>
                                <td style="text-align: center;">{{$ficha->paciente->id}}</td>
                                <td style="text-align: center;">{{$ficha->paciente->nombre}} {{$ficha->paciente->apellido_p}} {{$ficha->paciente->apellido_m}}</td>
                                <td style="text-align: center;">{{$ficha->servicio->nombre}}</td>
                                <td style="text-align: center;">
                                    {{$edad=MyHelper:: Edad_Paciente($ficha->paciente->fecha_nac, "index")}}
                                </td>
                                <td style="text-align: center;">
                                    @php
                                        $aux=strtotime($ficha->hora);
                                        $hora=date("H:i", $aux)
                                    @endphp
                                        {{$hora}}
                                </td>
                                <td style="text-align: center;">
                                    @if ($ficha->estado==1)
                                        <span class="label label-lg label-success arrowed-in arrowed-in-right">Atendido</span>
                                    @else
                                        <span class="label label-lg label-danger arrowed-in arrowed-in-right">En Espera</span>
                                        @endif
                                </td>
                                <td style="text-align: center;">
                                    @if(Auth::user()->rol->editar ==1)
                                        @if ($ficha->estado==0)
                                            <div class="hidden-sm hidden-xs btn-group">
                                                <button  class="btn btn-xs btn-warning" data-toggle="modal" data-target="#EditarFicha{{$ficha->id}}" title="registrar ficha">
                                                    <i class="fas fa fa-pencil-square-o bigger-120"></i>
                                                </button>
                                                <div class="modal modal-info fade in" id="EditarFicha{{$ficha->id}}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="background: #f1f5db">
                                                            <div class="modal-header " style="background: #192953">
                                                                <button type="button" class="white close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="white modal-title" style="text-align: center"><b>Editar Ficha</b></h4>
                                                            </div>
                                                            <form class="form-horizontal" role="form" id="form-general"  action="{{route ('actualizar_ficha', ['id'=>$ficha->id])}}"  method="POST">
                                                                @csrf @method("put")
                                                                <div class="modal-body">
                                                                    @php
                                                                        $paciente=MyHelper:: Datos_Paciente($ficha->paciente_id);
                                                                        $servicio=MyHelper:: Datos_Servicio($ficha->servicio_id);
                                                                    @endphp
                                                                        @include('admin/ficha/form')
                                                                </div>
                                                                <div class="modal-footer" style="background: #192953">
                                                                    @include('botones/actualizar')
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    @if(Auth::user()->rol->eliminar ==1)
                                        @if ($ficha->estado==0)
                                            <form action="{{route('eliminar_ficha', ['id' => $ficha->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
                                                @csrf @method("delete")
                                                <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Ficha">
                                                    <i class="fa fa fw fa-close"></i>
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
 --}}
 @extends("theme.$theme.layout")
 @section('titulo')
     Crear_Ficha
 @endsection
 @section('scripts')
 <script src="{{asset("assets/pages/scripts/ficha/validar.js")}}" type="text/javascript"></script>
 <script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
 <script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
 <script>
     function mostrar(id) {
         if (id !=null) {
             $("#buscar").show();
         }
         else
             $("#buscar").hide();
     }
 </script>
 @endsection
 @section('contenido')
 <div class="page-header">
     <h1>
         <h3 style="color: rgb(30, 80, 109)" class=" center">Registro de Fichas
             <button class="btn btn-purple pull-right" onclick="location.href='{{route('calendario')}}'"><i class="fa fa-calendar"></i> Agenda de Atención</button>
         </h3>
     </h1>
 </div>
 @include('mensajes.incorrecto')
 @include('mensajes.correcto')
 <div class="row">
     <div class="col-xs-12">
         @include('mensajes.error')
         <div class="col-xs-12">
             <form class="form-inline ml-3">
                 <div class="col-xs-4">
                    <b>Buscar Paciente Por:</b>
                    <select id="seleccion" name="seleccion" onChange=mostrar(this.value);>
                        <option value="">Elija una Opción</option>
                        <option value="apellido_p">Apellido Paterno</option>
                        <option value="apellido_m">Apellido Materno</option>
                        <option value="ci">N° de Carnet</option>
                        <option value="id">N° de Expediente</option>
                        <option value="celular">Telf/Cel</option>
                    </select>
                 </div>
                 <div class="col-xs-4">
                     <div id="buscar" style="display: none;">
                         <div class="input-group">
                             <input type="search" name="search" class="form-control" placeholder="Buscar..." aria-label="search" value="{{$search}}" autocomplete="off">
                             <span class="input-group-btn">
                                 <button type="submit" class="btn btn-flat">
                                     <i class="fa fa-search"></i>
                                 </button>
                             </span>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
         @if ($datos)
             @if ( $datos->count()==0)
                 <div class="col-xs-12">
                     <div class="alert alert-danger">
                         <i class="ace-icon fa fa-hand-o-right"></i>
                        Búsqueda sin resultados
                         <a href="{{route('fichaje')}}" class="btn btn-primary btn-xs tooltipC pull-right" title="volver">
                             <i class="glyphicon glyphicon-ok"></i>
                         </a>
                     </div>
                 </div>
                 @if(Auth::user()->rol->añadir ==1)
                     <div class="col-xs-12 center">
                         <button  class="btn btn-xl btn-success" onclick="location.href='{{route('crear_paciente')}}'" title="Crear Nuevo Paciente">
                             <i class="fas fa fa-plus bigger-120"><b> Registrar Nuevo Paciente</b></i>
                         </button>
                     </div>
                 @endif
             @else
                 <div class="col-xs-12">
                     <div class="alert alert-info">
                         <i class="ace-icon fa fa-hand-o-right"></i>
                         Los resultados de tu búsqueda <b>'{{$search}}'</b> son:
                         <a href="{{route('fichaje')}}" class="btn btn-primary btn-xs tooltipC pull-right" title="volver">
                             <i class="glyphicon glyphicon-ok"></i>
                         </a>
                     </div>
                 </div>
                 <span class="blue center"><h3>RESULTADO DE LA BÚSQUEDA</h3></span>
                 <div class="box-body">
                     <table id="tabla-data" class="table  table-bordered table-hover">
                         <thead>
                             <tr>
                                 <th class="col-lg-2" style="text-align: center;">Expediente</th>
                                 <th class="col-lg-4" style="text-align: center;">Nombres y Apellidos</th>
                                 <th class="col-lg-2" style="text-align: center;">Número de Carnet</th>
                                 <th class="col-lg-2" style="text-align: center;">Edad</th>
                                 <th class="col-lg-2" style="text-align: center;">Opción</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($datos as  $paciente)
                                 <tr>
                                     <td style="text-align: center;">
                                         {{$expediente= MyHelper::num_expediente($paciente->id)}}
                                     </td>
                                     <td style="text-align: center;">{{$paciente->apellido_p}} {{$paciente->apellido_m}} {{$paciente->nombre}}</td>
                                     <td style="text-align: center;">{{$paciente->ci}}</td>
                                     <td style="text-align: center;">{{$edad= MyHelper::Edad_Paciente($paciente->fecha_nac,"index")}}</td>
                                     <td style="text-align: center;">
                                         <div class="hidden-sm hidden-xs btn-group">
                                             @if(Auth::user()->rol->añadir ==1)
                                                 <button  class="btn btn-xs btn-info" onclick="location.href='{{route('registrar_ficha', ['id' => $paciente->id])}}'" title="registrar ficha">
                                                     <i class="fa fa-book bigger-120"></i>
                                                 </button>
                                             @endif
                                         </div>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             @endif
         @else <br><br>
             @php
                 setlocale(LC_ALL,"es_CO.utf8");
                 $data =strtotime($fecha_actual);
                 $formato_fecha = strtolower(strftime("%A %d de %B", $data));

                 $aux = new \DateTime();
                 $aux=$aux->format('Y-m-d');
             @endphp
             <span class="blue center">
                 <h3>
                    @if(Auth::user()->rol->añadir ==1)
                        <div class="col-xs-3 center">
                            <button  class="btn btn-sm btn-success" onclick="location.href='{{route('crear_paciente')}}'" title="Crear Nuevo Paciente">
                                <i class="fas fa fa-plus"><b> Registrar Nuevo Paciente</b></i>
                            </button>
                        </div>
                    @endif
                    <b>Fichas Para: {{$formato_fecha}}</b>
                     <button  class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#VerFecha" title="Ir a Fecha">
                         <i class="fas fa fa-calendar"> Ver Por Fecha</i>
                     </button>
                     @if ($aux!=$fecha_actual)
                         <button  class="btn btn-xs btn-primary pull-right " title="Volver" onclick="location.href='{{route('fichaje')}}'">
                             <i class="fa fa-faw fa-reply-all bigger-120"></i>
                         </button>
                     @endif
                 </h3><br>
             </span>
             <div class="modal modal-info fade in" id="VerFecha" tabindex="-1">
                 <div class="modal-dialog">
                     <div class="modal-content" style="background: #f1f5db">
                         <div class="modal-header " style="background: #192953">
                             <button type="button" class="white close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                             <h4 class="white modal-title" style="text-align: center"><b>Seleccionar la Fecha</b></h4>
                         </div>
                         <form class="form-horizontal">
                             <div class="modal-body">
                                 <div class="profile-info-row">
                                     <div class="profile-info-name"><u>Fecha</u>:</div>
                                     <div class="profile-info-value">
                                         <input type="date"class="form-control" name="ver_fecha" id="ver_fecha" value="{{old('fecha', $aux)}}" required/>
                                     </div>
                                 </div>
                             </div>
                             <div class="modal-footer" style="background: #192953">
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                 <button type="submit" class="btn btn-success">Mostrar</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
             <div class="box-body">
                 <table id="tabla-data" class="table  table-bordered table-hover">
                     <thead>
                         <tr>
                            <th class="col-lg-1.5" style="text-align: center;">Hora</th>
                             <th class="col-lg-2" style="text-align: center;">Expediente</th>
                             <th class="col-lg-3.5" style="text-align: center;">Nombres y Apellidos</th>
                             <th class="col-lg-1.5" style="text-align: center;">Edad</th>
                             <th class="col-lg-2" style="text-align: center;">Estado</th>
                             <th class="col-lg-1.5" style="text-align: center;">Opción</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($fichas as $ficha)
                             <tr>
                                <td style="text-align: center;">
                                    @php
                                        $aux=strtotime($ficha->hora);
                                        $hora=date("H:i", $aux)
                                    @endphp
                                        {{$hora}}
                                </td>
                                 <td style="text-align: center;">
                                     {{$expediente= MyHelper::num_expediente($ficha->paciente->id)}}
                                 </td>
                                 <td style="text-align: center;">{{$ficha->paciente->apellido_p}} {{$ficha->paciente->apellido_m}} {{$ficha->paciente->nombre}}</td>
                                 <td style="text-align: center;">
                                     {{$edad=MyHelper:: Edad_Paciente($ficha->paciente->fecha_nac, "index")}}
                                 </td>
                                 <td style="text-align: center;">
                                     @if ($ficha->estado==1)
                                         <span class="label label-lg label-success arrowed-in arrowed-in-right"> Atendido</span>
                                     @else
                                         @if ($ficha->estado==2)
                                             <span class="label label-lg label-danger arrowed-in arrowed-in-right"> Faltó</span>
                                         @else
                                             <span class="label label-lg label-danger arrowed-in arrowed-in-right"> En espera</span>
                                         @endif
                                     @endif
                                 </td>
                                 <td style="text-align: center;">
                                     @if(Auth::user()->rol->editar ==1)
                                         @if ($ficha->estado==0)
                                             <button  class="btn btn-xs btn-warning" onclick="location.href='{{route('editar_ficha', ['id'=>$ficha->id])}}'" title="Editar Ficha">
                                                 <i class="fas fa fa-pencil-square-o bigger-120"></i>
                                             </button>
                                         @endif
                                     @endif
                                     {{--@if(Auth::user()->rol->editar ==1)
                                         @if ($ficha->estado==0)
                                             <div class="hidden-sm hidden-xs btn-group">
                                                 <button  class="btn btn-xs btn-warning" data-toggle="modal" data-target="#EditarFicha{{$ficha->id}}" title="registrar ficha">
                                                     <i class="fas fa fa-pencil-square-o bigger-120"></i>
                                                 </button>
                                                 <div class="modal modal-info fade in" id="EditarFicha{{$ficha->id}}" tabindex="-1">
                                                     <div class="modal-dialog">
                                                         <div class="modal-content" style="background: #f1f5db">
                                                             <div class="modal-header " style="background: #192953">
                                                                 <button type="button" class="white close" data-dismiss="modal" aria-label="Close">
                                                                     <span aria-hidden="true">&times;</span>
                                                                 </button>
                                                                 <h4 class="white modal-title" style="text-align: center"><b>Editar Ficha</b></h4>
                                                             </div>
                                                             <form class="form-horizontal" role="form" id="form-general"  action="{{route ('actualizar_ficha', ['id'=>$ficha->id])}}"  method="POST">
                                                                 @csrf @method("put")
                                                                 <div class="modal-body">
                                                                     @php
                                                                         $paciente=MyHelper:: Datos_Paciente($ficha->paciente_id);
                                                                         $servicio=MyHelper:: Datos_Servicio($ficha->servicio_id);
                                                                     @endphp
                                                                         @include('admin/ficha/form')
                                                                 </div>
                                                                 <div class="modal-footer" style="background: #192953">
                                                                     @include('botones/actualizar')
                                                                 </div>
                                                             </form>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endif
                                     @endif--}}
                                     @if(Auth::user()->rol->eliminar ==1)
                                         @if ($ficha->estado==0)
                                             <form action="{{route('eliminar_ficha', ['id' => $ficha->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
                                                 @csrf @method("delete")
                                                 <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Ficha">
                                                     <i class="fa fa fw fa-close"></i>
                                                 </button>
                                             </form>
                                         @endif
                                     @endif
                                     @if ($ficha->estado==0)
                                         <form action="{{route('imprimir_ficha', ['id' => $ficha->id])}}" target="{{$ficha->id}}" class="d-inline">
                                             <button type="submit" class="btn btn-success btn-xs eliminar tooltipsC" title="Imprimir Ficha">
                                                 <i class="fa fa fw fa-download"></i>
                                             </button>
                                         </form>
                                     @endif
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         @endif
     </div>
 </div>
 @endsection

