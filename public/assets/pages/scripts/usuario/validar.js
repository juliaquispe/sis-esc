$(document).ready(function(){
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

    const reglas = {
        re_password:
        {
            equalTo: "#password"
        }
    };
    const mensajes = {
        re_password:
        {
            equalTo:'Las contraseñas no son iguales'
        }
    };
    SIS.validacionGeneral('form-general', reglas, mensajes); //form general porq con ese id lo creamos al form de crear y editar
    $('#password').on('change', function(){
        const valor = $(this).val();
        if(valor != ''){
            $('#re_password').prop('required', true);
        }else{
            $('#re_password').prop('required', false);
        }
    });
});
