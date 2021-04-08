$(document).ready(function(){
    SIS.validacionGeneral('form-general'); //form-general porq con ese id lo creamos al form

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

    $('#documento').fileinput({
        language: 'es',     //lenguaje
        allowedFileExtensions: ['pdf'], //archivos permitidos
        maxFileSize: 3000,  //tamaño maximo 10mb
        showUpload: false,  //no mostratra el boton upload
        showClose: false,   //no mostratra el boton close
        initialPreviewFileType: 'pdf',
        initialPreviewAsData: true,     //mostrar una imagen previa
        dropZoneEnabled: true,     //permitir arrastrar imagenes
        theme: "fa",    //para llamar iconos fa
        //initialPreviewFileType: true,
        //previewFileType: false,
    });

    var f=new Date();
    var a=f.getFullYear();
    var m=f.getMonth()+1;
    var d=f.getDate();
        m=(m<10)?"0"+m:m;
        d=(d<10)?"0"+d:d;
    var fechaactual=a+"-"+m+"-"+d;
    $('#fecha_ing').flatpickr({
        dateFormat: "Y-m-d",
        minDate: "1950-01-01",
        maxDate: fechaactual
    });
});
