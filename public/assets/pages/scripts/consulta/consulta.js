var $btnGuardar_C = document.getElementById("btnGuardar_C")
var $btnActualizar_C = document.getElementById("btnActualizar_C")
var $btnImprimir_C = document.getElementById("btnImprimir_C")
var $consulta=""
$btnGuardar_C.addEventListener("click", (event)=>{
    var data = {
        signos_vitales_id:$('#signos_vitales_id').val(),
        consulta_id:$('#consulta_id').val(),
        ficha_id:$('#ficha_id').val(),
        paciente_id:$('#paciente_id').val(),
        motivo: $('#motivo').val(),
        sintoma: $('#sintoma').val(),
        diagnostico: $('#diagnostico').val(),
        altura: $('#altura').val(),
        peso: $('#peso').val(),
        temperatura: $('#temperatura').val(),
        p_a: $('#p_a').val(),
        f_c: $('#f_c').val(),
        f_r: $('#f_r').val(),
        _token: $('input[name=_token]').val()
    };

    ajaxRequest1('/admin/consulta', data, 'put');
})
function ajaxRequest1 (url, data, metodo) {
    $.ajax({
        url: url,
        type: metodo,
        data: data,
        success: function (respuesta) {
            if (respuesta.mensaje == "ok") {
                SIS.notificaciones('Consulta Médica guardada correctamente', '', 'success');
                $btnActualizar_C.style.display='block';
                $btnGuardar_C.style.display='none';
                $btnImprimir_C.style.display='block';
            } else {
                if(respuesta.mensaje == "actualizar"){
                    SIS.notificaciones('Consulta Médica actualizada correctamente', '', 'info');
                    $btnActualizar_C.style.display='block';
                    $btnGuardar_C.style.display='none';
                    $btnImprimir_C.style.display='block';
                }
                else
                SIS.notificaciones('Debe llenar los campos motivo y diagnostico', '', 'error');
            }
        }

    });
}
$btnActualizar_C.addEventListener("click", (event)=>{
    //console.log($consulta);
    var data = {
        signos_vitales_id:$('#signos_vitales_id').val(),
        consulta_id:$('#consulta_id').val(),
        ficha_id:$('#ficha_id').val(),
        paciente_id:$('#paciente_id').val(),
        motivo: $('#motivo').val(),
        sintoma: $('#sintoma').val(),
        diagnostico: $('#diagnostico').val(),
        altura: $('#altura').val(),
        peso: $('#peso').val(),
        temperatura: $('#temperatura').val(),
        p_a: $('#p_a').val(),
        f_c: $('#f_c').val(),
        f_r: $('#f_r').val(),
        _token: $('input[name=_token]').val()
    };

    ajaxRequest1('/admin/consulta/actualizar', data, 'put');
})
