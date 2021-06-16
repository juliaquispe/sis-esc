var $btn_mas = document.getElementById("btn_mas");
var $btn_menos = document.getElementById("btn_menos");
var $div_valor = document.getElementById("div_valor");

$btn_mas.addEventListener("click", (event)=>{

    recargarLista("mas");
});
$btn_menos.addEventListener("click", (event)=>{

    recargarLista("menos");
});

function recargarLista($accion){

    $.ajax({
        type:"GET",
        url:'/admin/internacion/num_camas',
        data:data = {
            accion: $accion
        },
        success:function(respuesta){
            if(respuesta.mensaje=='si'){
                SIS.notificaciones('Datos actualizados correctamente', '', 'success');
                $div_valor.style.display='none';
                $('#div_cama').html(respuesta.cadena);
            }
            else{
                if(respuesta.mensaje=='no')
                    SIS.notificaciones('Actualmente esa cama esta en uso', '', 'error');
                else
                    SIS.notificaciones('todas las camas se han eliminado', '', 'error');
            }
        }
    });
}
