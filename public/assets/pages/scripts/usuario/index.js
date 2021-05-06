$(document).ready(function () {
    $("#tabla-data").on('submit', '.form-eliminar', function (event) {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro que desea eliminar el registro ?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form.serialize(), form.attr('action'), 'eliminarUsuario', form);//cuando aceptamos eliminar, la funcion se llamara eliminarPersonal
            }
        });
    });

    $('.ver-usuario').on('click', function (event) { //.ver-usuario es el nombre de la clase del icono de foto
        event.preventDefault();
        const url = $(this).attr('href');
        const data = {
            _token: $('input[name=_token]').val()
        }
        ajaxRequest(data, url, 'verUsuario');
    });

    function ajaxRequest(data, url, funcion, form = false) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (funcion == 'eliminarUsuario') {
                    if (respuesta.mensaje == "ok") {
                        form.parents('tr').remove();
                        SIS.notificaciones('El registro fue eliminado correctamente', 'Clínica Santa Teresa', 'success');
                    } else {
                        SIS.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Clínica Santa Teresa', 'error');
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
