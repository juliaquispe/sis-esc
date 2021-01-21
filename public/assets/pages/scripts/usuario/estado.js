$(document).ready(function () {
    $("#tabla-data").on('submit', '.form-estado', function (event) {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro realizar esta Accion ?',
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form.serialize(), form.attr('action'), 'estadoUsuario', form);//cuando aceptamos eliminar, la funcion se llamara eliminarPersonal
            }
        });
    });

    function ajaxRequest(data, url, funcion, form = false) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (funcion == 'estadoUsuario') {
                    if (respuesta.mensaje == "ok") {
                        form.parents('tr').remove();
                        SIS.notificaciones('La accion fue realizado correctamente', 'SIS', 'success');
                    } else {
                        SIS.notificaciones('No se pudo realizar esta accion', 'SIS', 'error');
                    }
                } else if (funcion == 'verUsuario') {
                    $('#modal-ver-usuario .modal-body').html(respuesta)
                    $('#modal-ver-usuario').modal('show');
                }
            },
            error: function () {
            }
        });
    }
});
