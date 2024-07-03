$("#guardarConfiguracion").click(function () {
    let empresa_configuracion = $(".empresa_configuracion").val();
    let email_configuracion = $(".email_configuracion").val();
    let telefono_configuracion = $(".telefono_configuracion").val();

    let datos = new FormData();

    datos.append("empresa_configuracion", empresa_configuracion);
    datos.append("email_configuracion", email_configuracion);
    datos.append("telefono_configuracion", telefono_configuracion);

    $.ajax({
        url: $("#url").val() + "ajax/configuracion.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta == "ok") {
                Swal.fire({
                    title: "OK",
                    text: "¡Se guardó correctamente!",
                    icon: "success",
                    confirmButtonText: "¡Cerrar!",
                });
            }
        },
    });
});