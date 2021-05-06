var $btnGuardar_H = document.getElementById("btnGuardar_H")
var $btnActualizar_H = document.getElementById("btnActualizar_H")
var $btnImprimir_H = document.getElementById("btnImprimir_H")
function showContent(){
    aux1=document.getElementById("agua")
    aux2=document.getElementById("luz")
    aux3=document.getElementById("alcantarillado")
    aux4=document.getElementById("p_h_a")
    aux5=document.getElementById("p_varices")
    aux6=document.getElementById("p_diabetes")
    aux7=document.getElementById("p_renal")
    aux8=document.getElementById("p_pulmonar")
    aux9=document.getElementById("p_hepatopatia")
    aux10=document.getElementById("p_mamaria")
    aux11=document.getElementById("p_genitales")
    aux12=document.getElementById("p_cardiopatias")
    aux13=document.getElementById("p_gastrointestinal")
    aux14=document.getElementById("p_its")
    aux15=document.getElementById("p_chagas")
    aux16=document.getElementById("f_h_a")
    aux17=document.getElementById("f_varices")
    aux18=document.getElementById("f_diabetes")
    aux19=document.getElementById("f_renal")
    aux20=document.getElementById("f_pulmonar")
    aux21=document.getElementById("f_hepatopatia")
    aux22=document.getElementById("f_mamaria")
    aux23=document.getElementById("f_genitales")
    aux24=document.getElementById("f_cardiopatias")
    aux25=document.getElementById("f_gastrointestinal")
    aux26=document.getElementById("f_its")
    aux27=document.getElementById("f_chagas")
    aux28=document.getElementById("np_fisica")
    aux29=document.getElementById("np_alcoholismo")
    aux30=document.getElementById("np_tabaquismo")
    aux31=document.getElementById("np_sustancias")
    aux32=document.getElementById("o_alergias")
    aux33=document.getElementById("o_cirugias")
    aux34=document.getElementById("o_traumatismos")
    aux35=document.getElementById("o_medicamentos")
    aux36=document.getElementById("o_transfusionales")
    aux37=document.getElementById("g_embarazos")
    aux38=document.getElementById("g_gestante")
    aux39=document.getElementById("g_c_mama")
    if (aux1.checked) {x1="si";} else{x1="no";}
    if (aux2.checked) {x2="si";} else{x2="no";}
    if (aux3.checked) {x3="si";} else{x3="no";}
    if (aux4.checked) {x4="si";} else{x4="no";}
    if (aux5.checked) {x5="si";} else{x5="no";}
    if (aux6.checked) {x6="si";} else{x6="no";}
    if (aux7.checked) {x7="si";} else{x7="no";}
    if (aux8.checked) {x8="si";} else{x8="no";}
    if (aux9.checked) {x9="si";} else{x9="no";}
    if (aux10.checked) {x10="si";} else{x10="no";}
    if (aux11.checked) {x11="si";} else{x11="no";}
    if (aux12.checked) {x12="si";} else{x12="no";}
    if (aux13.checked) {x13="si";} else{x13="no";}
    if (aux14.checked) {x14="si";} else{x14="no";}
    if (aux15.checked) {x15="si";} else{x15="no";}
    if (aux16.checked) {x16="si";} else{x16="no";}
    if (aux17.checked) {x17="si";} else{x17="no";}
    if (aux18.checked) {x18="si";} else{x18="no";}
    if (aux19.checked) {x19="si";} else{x19="no";}
    if (aux20.checked) {x20="si";} else{x20="no";}
    if (aux21.checked) {x21="si";} else{x21="no";}
    if (aux22.checked) {x22="si";} else{x22="no";}
    if (aux23.checked) {x23="si";} else{x23="no";}
    if (aux24.checked) {x24="si";} else{x24="no";}
    if (aux25.checked) {x25="si";} else{x25="no";}
    if (aux26.checked) {x26="si";} else{x26="no";}
    if (aux27.checked) {x27="si";} else{x27="no";}
    if (aux28.checked) {x28="si";} else{x28="no";}
    if (aux29.checked) {x29="si";} else{x29="no";}
    if (aux30.checked) {x30="si";} else{x30="no";}
    if (aux31.checked) {x31="si";} else{x31="no";}
    if (aux32.checked) {x32="si";} else{x32="no";}
    if (aux33.checked) {x33="si";} else{x33="no";}
    if (aux34.checked) {x34="si";} else{x34="no";}
    if (aux35.checked) {x35="si";} else{x35="no";}
    if (aux36.checked) {x36="si";} else{x36="no";}
    if (aux37.checked) {x37="si";} else{x37="no";}
    if (aux38.checked) {x38="si";} else{x38="no";}
    if (aux39.checked) {x39="si";} else{x39="no";}
}

var $historial=""
$btnGuardar_H.addEventListener("click", (event)=>{
    showContent();
    var data = {
        historial_id:$('#historial_id').val(),
        paciente_id:$('#paciente_id').val(),
        consulta_id:$('#consulta_id').val(),
        _token: $('input[name=_token]').val(),
        t_sangre:$('#t_sangre').val(),
        vivienda:$('#vivienda').val(),
        agua:x1,
        luz:x2,
        alcantarillado:x3,
        p_h_a:x4,
        p_varices:x5,
        p_diabetes:x6,
        p_renal:x7,
        p_pulmonar:x8,
        p_hepatopatia:x9,
        p_mamaria:x10,
        p_genitales:x11,
        p_cardiopatias:x12,
        p_gastrointestinal:x13,
        p_its:x14,
        p_chagas:x15,
        p_detalles:$('#p_detalles').val(),
        f_h_a:x16,
        f_varices:x17,
        f_diabetes:x18,
        f_renal:x19,
        f_pulmonar:x20,
        f_hepatopatia:x21,
        f_mamaria:x22,
        f_genitales:x23,
        f_cardiopatias:x24,
        f_gastrointestinal:x25,
        f_its:x26,
        f_chagas:x27,
        f_detalles:$('#f_detalles').val(),
        np_fisica:x28,
        np_alcoholismo:x29,
        np_tabaquismo:x30,
        np_sustancias:x31,
        np_detalles:$('#np_detalles').val(),
        o_alergias:x32,
        o_cirugias:x33,
        o_traumatismos:x34,
        o_medicamentos:x35,
        o_transfusionales:x36,
        o_detalles:$('#o_detalles').val(),
        g_embarazos:x37,
        g_gestante:x38,
        g_c_mama:x39,
        g_detalles:$('#g_detalles').val(),
    };
    //console.log(data);
    ajaxRequest3('/admin/historial', data, 'POST');
})
function ajaxRequest3 (url, data, metodo) {
    $.ajax({
        url: url,
        type: metodo,
        data: data,
        success: function (respuesta) {
            if (respuesta.mensaje == "ok") {
                SIS.notificaciones('Historial Médico guardado correctamente', '', 'success');
                $historial= respuesta.historial; //tiene el id con el q se creo la historial
                $btnGuardar_H.style.display='none';
                $btnActualizar_H.style.display='block';
                $btnImprimir_H.style.display='block';

            } else {
                if(respuesta.mensaje == "actualizar"){
                    SIS.notificaciones('Historial Médico Actualizado correctamente', '', 'info');
                    $historial= respuesta.historial; //tiene el id con el q se creo la consulta
                    $btnGuardar_H.style.display='none';
                    $btnActualizar_H.style.display='block';
                    $btnImprimir_H.style.display='block';
                }
            }
        }

    });
}
$btnActualizar_H.addEventListener("click", (event)=>{
    showContent();
    var data = {
        historial_id:$historial,
        paciente_id:$('#paciente_id').val(),
        consulta_id:$('#consulta_id').val(),
        _token: $('input[name=_token]').val(),
        t_sangre:$('#t_sangre').val(),
        vivienda:$('#vivienda').val(),
        agua:x1,
        luz:x2,
        alcantarillado:x3,
        p_h_a:x4,
        p_varices:x5,
        p_diabetes:x6,
        p_renal:x7,
        p_pulmonar:x8,
        p_hepatopatia:x9,
        p_mamaria:x10,
        p_genitales:x11,
        p_cardiopatias:x12,
        p_gastrointestinal:x13,
        p_its:x14,
        p_chagas:x15,
        p_detalles:$('#p_detalles').val(),
        f_h_a:x16,
        f_varices:x17,
        f_diabetes:x18,
        f_renal:x19,
        f_pulmonar:x20,
        f_hepatopatia:x21,
        f_mamaria:x22,
        f_genitales:x23,
        f_cardiopatias:x24,
        f_gastrointestinal:x25,
        f_its:x26,
        f_chagas:x27,
        f_detalles:$('#f_detalles').val(),
        np_fisica:x28,
        np_alcoholismo:x29,
        np_tabaquismo:x30,
        np_sustancias:x31,
        np_detalles:$('#np_detalles').val(),
        o_alergias:x32,
        o_cirugias:x33,
        o_traumatismos:x34,
        o_medicamentos:x35,
        o_transfusionales:x36,
        o_detalles:$('#o_detalles').val(),
        g_embarazos:x37,
        g_gestante:x38,
        g_c_mama:x39,
        g_detalles:$('#g_detalles').val(),
    };
    //console.log(data);


    ajaxRequest3('/admin/historial/actualizar', data, 'put');
})

