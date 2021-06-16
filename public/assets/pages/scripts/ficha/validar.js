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



