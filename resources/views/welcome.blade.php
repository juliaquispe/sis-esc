@extends("theme.$theme.layout")
@section('titulo')
    puebaaaa
@endsection
@section('contenido')
<div class="row">
    <div class="col-xs-5">
        <div class="col-sm-12" id="default-buttons">
            <a class="boton_personalizado" href="https://vinkula.com">Actualizar</a>
            <style type="text/css">
                .boton_personalizado{
                text-decoration: none;
                padding: 5px;
                font-weight: 500;
                font-size: 17px;
                color: #e5eeed;
                background-color: #3b75ac;
                border-radius: 10px;
                border: 2px solid #144288;
                }
                .boton_personalizado:hover{
                color: #144288;
                background-color: #79aff5;
                }
            </style>
            <a class="boton_guardar" href="https://vinkula.com">Guardar</a>
            <style type="text/css">
                .boton_guardar{
                text-decoration: none;
                padding: 5px;
                font-weight: 500;
                font-size: 17px;
                color: #e5eeed;
                background-color: #119781;
                border-radius: 10px;
                border: 2px solid #135a51;
                }
                .boton_guardar:hover{
                color: #135a51;
                background-color: #adebd7;
                }
            </style>
            <a class="boton_cancelar" href="https://vinkula.com">Cancelar</a>
            <style type="text/css">
                .boton_cancelar{
                text-decoration: none;
                padding: 5px;
                font-weight: 500;
                font-size: 17px;
                color: #e5eeed;
                background-color: #5f7572;
                border-radius: 10px;
                border: 2px solid #3c4b4b;
                }
                .boton_cancelar:hover{
                color: #3c4b4b;
                background-color: #aeb4b3;
                }
            </style>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text Field </label>
            <div class="col-sm-6">
                <input type="text" id="1" placeholder="Username" class="form-control" onkeyup="NombreMayus()" />
            </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Password Field </label>
            <div class="col-sm-6">
                <input type="password" id="form-field-2" placeholder="Password" class="form-control" />
            </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text Field </label>
            <div class="col-sm-6">
                <input type="text" id="form-field-1" placeholder="Username" class="form-control" />
            </div>
        </div>
    </div>
</div>
@endsection
