$(".tablaRoles").DataTable({
    ajax: $("#url").val() + "ajax/tablaRoles.ajax.php",
    deferRender: true,
    retrieve: true,
    processing: true,
    language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ rol",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar rol:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: "Siguiente",
            sPrevious: "Anterior",
        },
        oAria: {
            sSortAscending:
                ": Activar para ordenar la columna de manera ascendente",
            sSortDescending:
                ": Activar para ordenar la columna de manera descendente",
        },
    },
});


$(".tablaRoles tbody, .roles").on("click", ".btnBoton", function () {
    let id_rol = $(this).attr("idRol");
    let tipo = $(this).attr("tipo");
    
    console.log(id_rol);

    if (tipo == "editar") {
    }
    if (tipo == "nuevo") {
    }
    console.log(tipo);

    let datos = new FormData();

    datos.append("id_rol", id_rol);

    $.ajax({
        url: $("#url").val() + "ajax/roles.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            //console.log(respuesta);
            $("#editarRol .editar_id_rol").val(
                respuesta["id_rol"]
            );
            $("#editarRol .nombre_rol").val(
                respuesta["nombre_rol"]
            );
              
        },
    });
});

$(".tablaRoles tbody").on("click", ".btnEliminarRol", function () {
    let idEliminarRol = $(this).data("id_rol");
    console.log(idEliminarRol);
    Swal.fire({
        title: "¿Está seguro de borrar esta rol?",
        text: "¡Si no lo está puede cancelar la acción!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar rol!",
    }).then(function (result) {
        if (result.value) {
            window.location =
                $("#url").val() +
                "index.php?ruta=roles&idEliminarRol=" +
                idEliminarRol;
        }
    });
});