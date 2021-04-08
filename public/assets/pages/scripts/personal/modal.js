$(document).ready(function () {
    $('.ver-personal').on('click', function (event) { //.ver-personal es el nombre de la clase del icono de foto
        event.preventDefault();
        const url = $(this).attr('href');
        const data = {
            _token: $('input[name=_token]').val()
        }
        ajaxRequest(data, url, 'verPersonal');
    });

    function ajaxRequest(data, url, funcion, form = false) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (funcion == 'verPersonal') {
                    $('#modal-ver-personal .modal-body').html(respuesta)
                    $('#modal-ver-personal').modal('show');
                }
            },
            error: function () {
            }
        });
    }
});
