let ciclos = $('#fct_ciclo');
ciclos.change(function () {
    let form = $(this).closest('form');
    let datos = {};
    datos[ciclos.attr('name')] = ciclos.val();
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: datos,
        success: function (html) {
            $('#fct_alumno').replaceWith(
                $(html).find('#fct_alumno')
            );
            $('#fct_profesor').replaceWith(
                $(html).find('#fct_profesor')
            );
        }
    });
});