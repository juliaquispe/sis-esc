var $Guardar_g = document.getElementById("Guardar_g")
var $Actualizar_g = document.getElementById("Actualizar_g")
var $Imprimir_g = document.getElementById("Imprimir_g")
var $gabinete=""
$Guardar_g.addEventListener("click", (event)=>{
    var data = {
        consulta_id:$('#consulta_id').val(),
        estudio_g: $('#estudio_g').val(),
        indicacion_g: $('#indicacion_g').val(),
        _token: $('input[name=_token]').val()
    };

    ajaxRequest4('/admin/gabinete', data, 'POST');
})
function ajaxRequest4 (url, data, metodo) {
    $.ajax({
        url: url,
        type: metodo,
        data: data,
        success: function (respuesta) {
            if (respuesta.mensaje == "ok") {
                SIS.notificaciones('Estudio de Gabinete guardado correctamente', '', 'success');
                $gabinete=respuesta.gabinete; //tiene la id con el que e creo el gabinete
                $Actualizar_g.style.display='block';
                $Guardar_g.style.display='none';
                $Imprimir_g.style.display='block';
            } else {
                if(respuesta.mensaje == "actualizar"){
                    SIS.notificaciones('Estudio de Gabinete actualizado correctamente', '', 'info');
                    $gabinete=respuesta.gabinete;
                    $Actualizar_g.style.display='block';
                    $Guardar_g.style.display='none';
                    $Imprimir_g.style.display='block';
                }
                else
                SIS.notificaciones('Debe llenar el tipo de estudio', '', 'error');
            }
        }

    });
}
$Actualizar_g.addEventListener("click", (event)=>{
    //console.log($consulta);
    var data = {
        gabinete_id:$gabinete,
        consulta_id:$('#consulta_id').val(),
        estudio_g: $('#estudio_g').val(),
        indicacion_g: $('#indicacion_g').val(),
        _token: $('input[name=_token]').val()
    };

    ajaxRequest4('/admin/gabinete/actualizar', data, 'put');
})
