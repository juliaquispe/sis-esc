document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var $fecha="";
    var $id="";
    var f=new Date();
    var a=f.getFullYear();
    var  m=f.getMonth()+1;
    var d=f.getDate();
        m=(m<10)?"0"+m:m;
        d=(d<10)?"0"+d:d;
    var fechaactual=a+"-"+m+"-"+d;
    var $div_intervalo=document.getElementById('div_intervalo');
    var $div_hora_inicio=document.getElementById('div_hora_inicio');
    var $div_hora_fin=document.getElementById('div_hora_fin');
    var $btn_agendar=document.getElementById('btn_agendar');
    var $btn_editar=document.getElementById('btn_editar');
    var $btn_eliminar=document.getElementById('btn_eliminar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid','interaction','timeGrid', 'list' ],
      //defaultView:'timeGridDay'
      titleFormat: { // will produce something like "Tuesday, September 18, 2018"
        year: 'numeric', month: 'long'
      },
      header:{
        left:'prev,next,today',
        center:'title',
        right:'dayGridMonth,timeGridWeek,timeGridDay'
      },
      dateClick:function(info){//cuando hacemos click en un dia del calendario (crear)
        $fecha=info.dateStr;
        $('#intervalo').val("30");
        $('#hora_inicio').val("08:00");
        $('#hora_fin').val("22:00");
        if ($fecha>=fechaactual) {
            $.ajax({
                type: "GET",
                url: '/admin/calendario/verificar',
                data: data={
                    fecha: $fecha
                },
                success: function (respuesta) {
                    if (respuesta.mensaje == "si") {
                        SIS.notificaciones('Esta fecha ya fue asignada', '', 'error');
                    }else{
                        $btn_agendar.style.display='block';
                        $btn_editar.style.display='none';
                        $btn_eliminar.style.display='none';
                        $date=$fecha+" "+"08:00";
                        var f=new Date($date);
                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                        var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
                        var titulo=diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear()
                        $('#title').html(titulo);
                        $('#modal-agenda').modal();
                        $div_intervalo.style.display='none';
                        $div_hora_inicio.style.display='none';
                        $div_hora_fin.style.display='none';
                    }
                }
            });
        } else {
            SIS.notificaciones('No puede crear en fecha pasada', '', 'error');
        }
      },
        eventClick:function(info){
            //console.log(info.event.extendedProps.fecha);
          $id=info.event.id;
          dia=(info.event.start.getDate());
          mes=(info.event.start.getMonth()+1);
          año=(info.event.start.getFullYear());
            mes=(mes<10)?"0"+mes:mes;
            dia=(dia<10)?"0"+dia:dia;
            $fecha=año+"-"+mes+"-"+dia;
            if ($fecha<fechaactual) {
                SIS.notificaciones('No puedes editar fechas pasadas', '', 'error');
            } else {
                $div_intervalo.style.display='none';
                $div_hora_inicio.style.display='none';
                $div_hora_fin.style.display='none';
                $('#intervalo').val(info.event.extendedProps.intervalo);
                hora=(info.event.start.getHours());
                minuto=(info.event.start.getMinutes());
                    hora=(hora<10)?"0"+hora:hora;
                    minuto=(minuto<10)?"0"+minuto:minuto;
                    hrs=hora+":"+minuto;
                $('#hora_inicio').val(hrs);
                hora=(info.event.end.getHours());
                minuto=(info.event.end.getMinutes());
                    hora=(hora<10)?"0"+hora:hora;
                    minuto=(minuto<10)?"0"+minuto:minuto;
                    hrs=hora+":"+minuto;
                $('#hora_fin').val(hrs);
                $btn_agendar.style.display='none';
                $btn_editar.style.display='block';
                $btn_eliminar.style.display='block';
                var f=info.event.start;
                var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
                var titulo=diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear()
                $('#title').html(titulo);
                $('#modal-agenda').modal();
            }
        },
        displayEventTime: false,
        events:url_show

    });

    calendar.setOption('locale','es')
    calendar.render();

    $('#btn_agendar').click(function(){ //cuando damos click en boton crea
        if($('#intervalo').val()==""||$('#hora_inicio').val()==""||$('#hora_fin').val()==""){
          SIS.notificaciones('Es necesario llenar todos los campos', '', 'error');
          if($('#intervalo').val()==""){
            $('#intervalo').focus();
            $div_intervalo.style.display='block';
          }else $div_intervalo.style.display='none';
          if($('#hora_inicio').val()==""){
            $('#hora_inicio').focus();
            $div_hora_inicio.style.display='block';
          }else $div_hora_inicio.style.display='none';
          if($('#hora_fin').val()==""){
            $('#hora_fin').focus();
            $div_hora_fin.style.display='block';
          }else $div_hora_fin.style.display='none';
        }
        else{
            $div_intervalo.style.display='none';
            $div_hora_inicio.style.display='none';
            $div_hora_fin.style.display='none';

            var $date_ini=$fecha+" "+$('#hora_inicio').val();
            var x=new Date($date_ini);
            var x_minutos=x.getMinutes();
            var x_horas=x.getHours();
            var $date_fin=$fecha+" "+$('#hora_fin').val();
            var y=new Date($date_fin);
            var y_minutos=y.getMinutes();
            var y_horas=y.getHours();
            if (( x_minutos==0 ||  x_minutos==30)&&( y_minutos==0 ||  y_minutos==30)) {
                if ((x_horas>=7&&y_horas<=22)&&(x_horas<y_horas)) {
                    var data = {
                        fecha: $fecha,
                        title: 'Día Hábil',
                        color:"green",
                        textColor:"white",
                        inicio: $fecha+" "+$('#hora_inicio').val(),
                        fin: $fecha+" "+$('#hora_fin').val(),
                        intervalo:$('#intervalo').val(),
                        _token: $('input[name=_token]').val()
                    };
                    ajaxRequest1('/admin/calendario/guardar', data, 'POST');
                } else {
                    if (x_horas>y_horas) {
                        SIS.notificaciones('La hora de inicio debe ser menor a la hora final', '', 'error');
                    } else {
                        SIS.notificaciones('La hora de inicio debe ser mayor a 07:00 \n Y la hora final debe ser menor a 22:30', '', 'error');
                    }
                }

            }else{
                SIS.notificaciones('Hora no válida', '', 'error');
                if ( x_minutos!=0 &&  x_minutos!=30) {
                    $('#hora_inicio').focus();
                    $div_hora_inicio.style.display='block';
                }
                else $div_hora_inicio.style.display='none'
                if( y_minutos!=0 &&  y_minutos!=30) {
                    $('#hora_fin').focus();
                    $div_hora_fin.style.display='block';
                }
                else $div_hora_fin.style.display='none';
            }
        }
      });

    function ajaxRequest1 (url, data, metodo) {
        $.ajax({
            url: url,
            type: metodo,
            data: data,
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    $('#modal-agenda').modal('toggle');//en modal se cerrara
                    calendar.refetchEvents();// Actualiza/recarga el calendario
                    SIS.notificaciones('Día de Atención Habilitado', '', 'success');
                    console.log(respuesta.datos);
                }else{
                    $('#modal-agenda').modal('toggle');//en modal se cerrara
                    SIS.notificaciones('Usted no tiene Permisos de Crear', '', 'error');
                }
            }
        });
    }

    $('#btn_editar').click(function(){ //cuando damos click en boton editar
        if($('#intervalo').val()==""||$('#hora_inicio').val()==""||$('#hora_fin').val()==""){
          SIS.notificaciones('Es necesario llenar todos los campos', '', 'error');
          if($('#intervalo').val()==""){
            $('#intervalo').focus();
            $div_intervalo.style.display='block';
          }
          else $div_intervalo.style.display='none';
          if($('#hora_inicio').val()==""){
            $('#hora_inicio').focus();
            $div_hora_inicio.style.display='block';
          }
          else $div_hora_inicio.style.display='none';
          if($('#hora_fin').val()==""){
            $('#hora_fin').focus();
            $div_hora_fin.style.display='block';
          }
          else $div_hora_fin.style.display='none';
        }
        else{
            $div_intervalo.style.display='none';
            $div_hora_inicio.style.display='none';
            $div_hora_fin.style.display='none';
            var $date_ini=$fecha+" "+$('#hora_inicio').val();
            var x=new Date($date_ini);
            var x_minutos=x.getMinutes();
            var x_horas=x.getHours();
            var $date_fin=$fecha+" "+$('#hora_fin').val();
            var y=new Date($date_fin);
            var y_minutos=y.getMinutes();
            var y_horas=y.getHours();
            if (( x_minutos==0 ||  x_minutos==30)&&( y_minutos==0 ||  y_minutos==30)) {
                if ((x_horas>=7&&y_horas<=22)&&(x_horas<y_horas)) {
                    var data = {
                        id:$id,
                        fecha: $fecha,
                        title: 'Día Hábil',
                        color:"green",
                        textColor:"white",
                        inicio: $fecha+" "+$('#hora_inicio').val(),
                        fin: $fecha+" "+$('#hora_fin').val(),
                        intervalo:$('#intervalo').val(),
                        _token: $('input[name=_token]').val()
                    };
                    ajaxRequest2('/admin/calendario/actualizar', data, 'PUT');
                }
                else {
                    if (x_horas>y_horas) {
                        SIS.notificaciones('La hora de inicio debe ser menor a la hora final', '', 'error');
                    } else {
                        SIS.notificaciones('La hora de inicio debe ser mayor a 07:00 \n Y la hora final debe ser menor a 22:30', '', 'error');
                    }
                }
            }else{
                SIS.notificaciones('Hora no válida', '', 'error');
                if ( x_minutos!=0 &&  x_minutos!=30) {
                    $('#hora_inicio').focus();
                    $div_hora_inicio.style.display='block';
                }
                else $div_hora_inicio.style.display='none'
                if( y_minutos!=0 &&  y_minutos!=30) {
                    $('#hora_fin').focus();
                    $div_hora_fin.style.display='block';
                }
                else $div_hora_fin.style.display='none';
            }
        }
      });

    function ajaxRequest2 (url, data, metodo) {
        $.ajax({
            url: url,
            type: metodo,
            data: data,
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    $('#modal-agenda').modal('toggle');//en modal se cerrara
                    calendar.refetchEvents();// Actualiza/recarga el calendario
                    SIS.notificaciones('Datos Actualizados', '', 'success');
                    //console.log(respuesta.datos);
                }else{
                    if (respuesta.mensaje == "no") {
                        SIS.notificaciones('Los datos no pueden ser modificados, ya tiene fichas designadas en esta fecha', '', 'error');
                    } else {
                        $('#modal-agenda').modal('toggle');//en modal se cerrara
                        SIS.notificaciones('Usted no tiene permisos de Editar', '', 'error');
                    }
                }
            }
        });
    }

    $('#btn_eliminar').click(function(){ //cuando damos click en boton eliminar
        swal({
            title: '¿ Está seguro de eliminar el registro?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
              var data = {
                id:$id,
                fecha:$fecha,
                _token: $('input[name=_token]').val()
            };
            ajaxRequest3('/admin/calendario/eliminar', data, 'DELETE');
            }
        });
      });

    function ajaxRequest3 (url, data, metodo) {
        $.ajax({
            url: url,
            type: metodo,
            data: data,
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    $('#modal-agenda').modal('toggle');//en modal se cerrara
                    calendar.refetchEvents();// Actualiza/recarga el calendario
                    SIS.notificaciones('Datos Eliminados correctamente', '', 'success');
                    //console.log(respuesta.datos);
                }else{
                    if (respuesta.mensaje == "no") {
                        SIS.notificaciones('No es posible eliminar , ya tiene fichas designadas en esta fecha', '', 'error');
                    } else {
                        $('#modal-agenda').modal('toggle');//en modal se cerrara
                        SIS.notificaciones('Usted no tiene permisos de Eliminar', '', 'error');
                    }
                }
            }
        });
    }
  });
