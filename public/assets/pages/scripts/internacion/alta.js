$(document).ready(function(){
    SIS.validacionGeneral('form-general'); //form general porq con ese id lo creamos al form
});

$('#foto').fileinput({
    language: 'es',     //lenguaje
    allowedFileExtensions: ['jpg', 'jpeg', 'png'], //archivos permitidos
    maxFileSize: 3000,  //tamaño maximo 3mb
    showUpload: false,  //no mostratra el boton upload
    showClose: false,   //no mostratra el boton close
    initialPreviewAsData: true,     //mostrar una imagen previa
    dropZoneEnabled: true,     //permitir arrastrar imagenes
    theme: "fa",    //para llamar iconos fa
});

var f=new Date();
var a=f.getFullYear();
var m=f.getMonth()+1;
var d=f.getDate();
    m=(m<10)?"0"+m:m;
    d=(d<10)?"0"+d:d;
var fechaactual=a+"-"+m+"-"+d;
$('#fecha_salida').flatpickr({
    dateFormat: "Y-m-d",
    minDate: $('#fecha_ingreso').val(),
    maxDate: fechaactual
});

function showContent() {
    $div_forzado = document.getElementById("div_forzado");
    check = document.getElementById("forzado");
    if (check.checked) {
        $div_forzado.style.display='block';
        $('#nombre_resp').prop('required', true);
        $('#ci_resp').prop('required', true);
    }
    else {
        $div_forzado.style.display='none';
        $('#nombre_resp').prop('required', false);
        $('#ci_resp').prop('required', false);
    }
}

