@extends("theme.$theme.layout")
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="">
                    <div class="panel-heading clearfix" style="background-color: rgb(128, 154, 226)">
                        <h3 class="panel-title pull-left" ><b>Datos del Personal</b></h3>
                        <div class="box-tools pull-right">
                            <a href="{{route('personal')}}" class="btn btn-block btn-info btn-sm">{{-- boton para ir a otra tabla --}}
                                <style type="text/css">
                                    .btn{
                                    padding: 5px;
                                    font-weight: 500;
                                    font-size: 15px;
                                    border-radius: 10px;
                                    }
                                </style>
                                <i class="fa fa-fw fa-reply-all"></i>Volver a Lista de Personales
                            </a>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @if(Auth::user()->rol->editar ==1)
                            <div class="box-tools pull-right">
                                <a href="{{route('editar_personal', ['id' => $personal->id])}}" class="btn btn-block btn-warning btn-sm">
                                    <i class="fa fa-fw fa-wrench"></i> Editar
                                </a>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @endif
                    </div>
                    <div class="panel-body" >
                        <div class="col-md-4" style="width: 25%; float:left">
                            @if ($personal->foto==null)
                            <img src="{{asset("assets/$theme/assets/images/avatars/dos.jpg")}}" class="img-square" width="230px" eight="230px" alt="No tiene Fotografia">
                            @else
                            <img src="{{Storage::url("Datos/Personal/Fotos/$personal->foto")}}" class="msg-photo" alt="fotografia" width="230px" eight="230px">
                            @endif &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="col-md-9" >
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Nombre:</b></p>
                                </div>
                                <div class="col-md-9">
                                    <i><p>{{$personal->nombre}} {{$personal->apellido}}</p></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>CI:</b></p>
                                </div>
                                <div class="col-md-9">
                                    <i><p>{{$personal->ci}}</p></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Celular:</b></p>
                                </div>
                                @if($personal->celular==null)
                                    <div class="col-md-9">
                                        <i><p>No cuenta con celular</p></i>
                                    </div>
                                @endif
                                @if($personal->celular!=null)
                                    <div class="col-md-9">
                                        <i><p>{{$personal->celular}}</p></i>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Género</b></p>
                                </div>
                                <div class="col-md-9">
                                    <i><p>{{$personal->genero}}</p></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Dirección:</b></p>
                                </div>
                                @if($personal->direccion==null)
                                    <div class="col-md-9">
                                        <i><p>No tiene una dirección</p></i>
                                    </div>
                                @endif
                                @if($personal->direccion!=null)
                                    <div class="col-md-9">
                                        <i><p>{{$personal->direccion}}</p></i>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Fecha Ingreso:</b></p>
                                </div>
                                <div class="col-md-9">
                                    <i><p>{{$personal->fecha_ing}}</p></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Unidad:</b></p>
                                </div>
                                <div class="col-md-9">
                                    <i><p>{{$personal->unidad->nombre}}</p></i><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
