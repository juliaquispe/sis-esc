$(document).ready(function(){
    SIS.validacionGeneral('form-general'); //form-general porq con ese id lo creamos al form

    $('#nestable').nestable().on('change', function(){
        const data = {
            menu: window.JSON.stringify($('#nestable').nestable('serialize')),
            _token: $('input[name=_token]').val()
        };
        $.ajax({
            url: '/admin/menu/guardar-orden',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (respuesta) {
            }
        });
    });
    $('.eliminar-menu').on('click', function(event){
        event.preventDefault();
        const url =$(this).attr('href');
        swal({
            title: '¿ Está seguro de eliminar el registro?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                window.location.href=url;
            }
        });
    })
    $('#nestable').nestable('expandAll');   //para q la lista se muestre desplegada
});
