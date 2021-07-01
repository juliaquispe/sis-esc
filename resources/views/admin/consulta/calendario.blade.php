@extends("theme.$theme.layout")
@section('titulo')
Calendario
@endsection
@section("styles")
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/core/main.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/daygrid/main.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/list/main.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/timegrid/main.css")}}">
@endsection
@section("scripts")
  <script src="{{asset("assets/js/fullcalendar/core/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/daygrid/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/timegrid/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/list/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/interaction/main.js")}}" type="text/javascript"></script>
  <script>
    var url_="{{url('eventos')}}";
    var url_show="{{ url('admin/eventos/show') }}";
  </script>
  <script src="{{asset("assets/pages/scripts/calendario/index.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
    <div class="row">
        @include('mensajes.incorrecto')
        @include('mensajes.correcto')
        @include('mensajes.error')
        <div class="box-tools pull-right">
            <a href="{{route('fichaje')}}" class="btn btn-block btn-info btn-sm">{{-- boton para ir a otra tabla --}}
                <style type="text/css">
                    .btn{
                    padding: 5px;
                    font-weight: 500;
                    font-size: 15px;
                    border-radius: 10px;
                    }
                </style>
                <i class="fa fa-fw fa-reply-all"></i><b> Volver</b>
            </a>
        </div>
        <h3 class="box-title center" style="color: rgb(78, 52, 102)"><b>Calendario</b></h3>
        <div class="col-lg-2"></div>
        <div class="col-lg-8" style=" background-color: rgb(192, 188, 192)">
            <div class="box-header with-border box box-primary" id="calendar"></div>
        </div>
    </div>
    <div class="modal modal-info fade in" id="modal-agenda" tabindex="-1" >
        <div class="white modal-dialog">
            <div class="modal-content"  style="background: #bbbbb7">
                <div class="modal-header" style="background:#111d3b">
                    <button type="button" class="close white" data-dismiss="modal" aria-label="Close"  style="background:#97cae2">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" align="center" id="title"><b>Agenda</b></h4>
                </div>
                <form>
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-5" style="text-align: right">
                                    <label class="control-label requerido" for="form-field-1"> Intervalo de Atención</label>
                                </div>
                                <div class="col-sm-5">
                                    <select class="form-control" id="intervalo">
                                        <option value="">Elija una Opción</option>
                                        <option value="15">15 minutos</option>
                                        <option value="30">30 minutos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6" id="div_intervalo" style="display: none;">
                                <span class="Brick red bolder">Elija una opción</span>
                            </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                              <div class="col-sm-5" style="text-align: right">
                                <label class="control-label requerido" for="form-field-1"> Hora Inicio</label>
                              </div>
                            <div class="col-sm-5">
                              <input type="time" min="07:00" class="form-control" step="1800" id="hora_inicio" name="hora" value="{{old('hora', $ficha->hora ?? '08:00')}}" required/>
                            </div>
                          </div>
                          <div class="col-lg-6"></div>
                          <div class="col-lg-6" id="div_hora_inicio" style="display: none;">
                              <span class="Brick red bolder">seleccione una hora válida</span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                              <div class="col-sm-5" style="text-align: right">
                                <label class="control-label requerido" for="form-field-1"> Hora Fin</label>
                              </div>
                            <div class="col-sm-5">
                              <input type="time" min="07:00" class="form-control" step="1800" id="hora_fin" name="hora_fin" value="{{old('hora', $ficha->hora ?? '22:00')}}" required/>
                            </div>
                          </div>
                          <div class="col-lg-6"></div>
                          <div class="col-lg-6" id="div_hora_fin" style="display: none;">
                              <span class="Brick red bolder">seleccione una hora válida</span>
                          </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer" style="background:#111d3b">
                    <button type="button" class="btn btn-success pull-right" id="btn_agendar" style="display: block;"><b>Agendar</b></button>
                    <button type="button" class="btn btn-danger pull-right" id="btn_eliminar" style="display: none;"><b>Eliminar</b></button>
                    <button type="button" class="btn btn-warning pull-right" id="btn_editar" style="display: none;"><b>Actualizar</b></button>
                </div>
            </div>
        </div>
    </div>
@endsection
