var $btnGuardar_R = document.getElementById("btnGuardar_R")
var $btnActualizar_R = document.getElementById("btnActualizar_R")
var $btnImprimir_R = document.getElementById("btnImprimir_R")
var $receta=""
$btnGuardar_R.addEventListener("click", (event)=>{
    var data = {
        consulta_id:$('#consulta_id').val(),
        receta :$("#recetas").val(),
        indicacion:$('#indicacion').val(),
        _token: $('input[name=_token]').val()
    };

    ajaxRequest2('/admin/receta', data, 'POST');
})

function ajaxRequest2 (url, data, metodo) {
    $.ajax({
        url: url,
        type: metodo,
        data: data,
        success: function (respuesta) {
            if (respuesta.mensaje == "ok") {
                SIS.notificaciones('Receta Médica guardada correctamente', '', 'success');
                $receta=respuesta.receta; //TIENE EL ID CON EL QUE SE CREO LA Receta
                $btnActualizar_R.style.display='block';
                $btnGuardar_R.style.display='none';
                $btnImprimir_R.style.display='block';
            }
            else {
                if(respuesta.mensaje == "actualizar"){
                    SIS.notificaciones('Receta Médica actualizada correctamente', '', 'info');
                    $receta=respuesta.receta; //TIENE EL ID CON EL QUE SE CREO LA Receta
                    $btnActualizar_R.style.display='block';
                    $btnGuardar_R.style.display='none';
                    $btnImprimir_R.style.display='block';
                }
                else
                SIS.notificaciones('Debe llenar el campo Receta', '', 'error');
            }
        }
    });
}

$btnActualizar_R.addEventListener("click", (event)=>{
    //console.log($consulta);
    var data = {
        receta_id:$receta,
        consulta_id:$('#consulta_id').val(),
        receta:$('#recetas').val(),
        indicacion:$('#indicacion').val(),
        _token: $('input[name=_token]').val()
    };
    ajaxRequest2('/admin/receta/actualizar', data, 'put');
})
