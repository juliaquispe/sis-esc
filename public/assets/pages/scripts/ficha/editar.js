$(document).ready(function(){
    SIS.validacionGeneral('form-general'); //form-general porq con ese id lo creamos al form
});
    var f=new Date();
    var a=f.getFullYear();
    var m=f.getMonth()+1;
    var d=f.getDate();
        m=(m<10)?"0"+m:m;
        d=(d<10)?"0"+d:d;
    var fechaactual=a+"-"+m+"-"+d;
    var aux=a+1;
    var fechalimite=aux+"-"+m+"-"+d;
    $('.fecha').flatpickr({
        dateFormat: "Y-m-d",
        minDate: fechaactual,
        maxDate: fechalimite,
    });

    $('#ver_fecha').flatpickr({
        dateFormat: "Y-m-d",
    });

var $horario = document.getElementById("horario");
var $div_hidden = document.getElementById("div_hidden")
$horario.addEventListener("click", (event)=>{
    $horario.style.display='none';
    recargarLista();
});
var $div_select_horario = document.getElementById("div_select_horario")
$('#fecha').change(function(){
    if ($('#fecha').val()=="") {
        $div_select_horario.style.display='none';
    } else {
        $horario.style.display='block';
        $div_select_horario.style.display='none';
        $div_hidden.style.display='block';
        $('#hidden').prop('required', true)
    }
});
function recargarLista(){

    $.ajax({
        type:"GET",
        url:'/admin/ficha/horario',
        data:data = {
            fecha: $('#fecha').val()
        },
        success:function(respuesta){
            if(respuesta.mensaje=='si'){
                console.log(respuesta.horario);
                //console.log($('#fecha').val());
                $div_select_horario.style.display='block';
                $('#div_select_horario').html(respuesta.horario);
                $div_hidden.style.display='none';
                $('#hidden').prop('required', false)
            }
            else{
                $div_select_horario.style.display='block';
                $('#div_select_horario').html(respuesta.horario);
                $div_hidden.style.display='none';
                $('#hidden').prop('required', true)
            }
        }
    });
}

var $btn_modificar = document.getElementById("btn_modificar");
var $div_fecha = document.getElementById("div_fecha")
var $div_hora = document.getElementById("div_hora")
$btn_modificar.addEventListener("click", (event)=>{
    $div_fecha.style.display='block';
    $div_hora.style.display='block';
    $btn_modificar.style.display='none';
    $('#hidden').prop('required', true)
    $('#fecha').prop('required', true)
});

var $btn_cancel = document.getElementById("btn_cancel");
$btn_cancel.addEventListener("click", (event)=>{
    $div_fecha.style.display='none';
    $div_hora.style.display='none';
    $btn_modificar.style.display='block';
    $('#hidden').prop('required', false)
    $('#fecha').prop('required', false)
});
