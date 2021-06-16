$(document).ready(function(){
    SIS.validacionGeneral('form-general'); //form general porq con ese id lo creamos al form
});
var f=new Date();
var a=f.getFullYear();
var m=f.getMonth()+1;
var d=f.getDate();
    m=(m<10)?"0"+m:m;
    d=(d<10)?"0"+d:d;
var fechaactual=a+"-"+m+"-"+d;
    $('#fecha_esp').flatpickr({
        dateFormat: "Y-m-d",
        minDate: 1990-01-01,
        maxDate: fechaactual,
    });
    $('#fecha_ini').flatpickr({
        dateFormat: "Y-m-d",
        minDate: 1990-01-01,
        maxDate: fechaactual
    });
    $('#fecha_fin').flatpickr({
        dateFormat: "Y-m-d",
        maxDate: fechaactual,
    });
var $div_t_paciente = document.getElementById("div_t_paciente")
var $div_t_consulta = document.getElementById("div_t_consulta")
var $div_t_enfermeria = document.getElementById("div_t_enfermeria")
$('#informe').change(function(){
    if ($('#informe').val()=="") {
        $div_t_paciente.style.display='none';
        $div_t_consulta.style.display='none';
        $div_t_enfermeria.style.display='none';
    } else {
        $('#fecha_esp').val("");
        $('#fecha_ini').val("");
        $('#fecha_fin').val("");
        if ($('#informe').val()=="paciente") {
            $div_t_paciente.style.display='block';
            $div_t_consulta.style.display='none';
            $div_t_enfermeria.style.display='none';
            $('#t_paciente').prop('required', true);
            $('#t_consulta').prop('required', false);
            $('#t_enfermeria').prop('required', false);
        } else {
            if ($('#informe').val()=="consulta") {
                $div_t_paciente.style.display='none';
                $div_t_consulta.style.display='block';
                $div_t_enfermeria.style.display='none';
                $('#t_paciente').prop('required', false);
                $('#t_consulta').prop('required', true);
                $('#t_enfermeria').prop('required', false);
            } else {
                $div_t_paciente.style.display='none';
                $div_t_consulta.style.display='none';
                $div_t_enfermeria.style.display='block';
                $('#t_paciente').prop('required', false);
                $('#t_consulta').prop('required', false);
                $('#t_enfermeria').prop('required', true);
            }
        }
    }
});

var $div_fecha_esp = document.getElementById("div_fecha_esp")
var $div_rango = document.getElementById("div_rango")
$('#t_fecha').change(function(){
    if ($('#t_fecha').val()=="") {
        $div_fecha_esp.style.display='none';
        $div_rango.style.display='none';
    } else {
        $('#fecha_esp').val("");
        $('#fecha_ini').val("");
        $('#fecha_fin').val("");
        if ($('#t_fecha').val()=="especifico") {
            $div_fecha_esp.style.display='block';
            $div_rango.style.display='none';
            $('#fecha_esp').prop('required', true);
            $('#fecha_ini').prop('required', false);
            $('#fecha_fin').prop('required', false);
        } else {
                $div_fecha_esp.style.display='none';
                $div_rango.style.display='block';
                $('#fecha_esp').prop('required', false);
                $('#fecha_ini').prop('required', true);
                $('#fecha_fin').prop('required', true);
        }
    }
});

$('#fecha_ini').change(function(){
    if ($('#fecha_ini').val()!="") {
        $('#fecha_fin').flatpickr({
            dateFormat: "Y-m-d",
            minDate: $('#fecha_ini').val(),
            maxDate: fechaactual,
        });
    }
});
