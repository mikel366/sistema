$(".tablaUsuarios").DataTable({
    ajax: {
        url: $("#url").val() + "ajax/tablaUsuarios.ajax.php",
        dataSrc: "data"
    },
    deferRender: true,
    retrieve: true,
    processing: true,
    language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ usuarios",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando usuarios del _START_ al _END_ de un total de _TOTAL_",
        sInfoEmpty: "Mostrando usuarios del 0 al 0 de un total de 0",
        sInfoFiltered: "(filtrado de un total de _MAX_ usuarios)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: '<i class="fa-solid fa-angle-right"></i>',
            sPrevious: '<i class="fa-solid fa-angle-left"></i>',
        },
        oAria: {
            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
            sSortDescending: ": Activar para ordenar la columna de manera descendente",
        },
    },
});



$(".tablaUsuarios tbody").on("click", ".btnExportarUsuario", function () {
    
    let idUsuarioExportar = $(this).attr("id_usuario");
    console.log(idUsuarioExportar);
    Swal.fire({
        title: "¿Está seguro de borrar este usuario?",
        text: "¡Si no lo está puede cancelar la acción!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar usuario!",
    }).then(function (result) {
        if (result.value) {
            window.location =
                $("#url").val() +
                "index.php?ruta=usuarios&idUsuarioExportar=" +
                idUsuarioExportar;
        }
    });
});



$(".tablaUsuarios tbody, .usuarios").on("click", ".btnBoton", function () {
    let id_usuario = $(this).attr("idUsuario");
    let roles = $("#roles");
    let estado = $("#estado");
    let tipo = $(this).attr("tipo");
    
    console.log(id_usuario);

    if (tipo == "editar") {
    }
    if (tipo == "nuevo") {
    }
    console.log(tipo);

    let datos = new FormData();

    datos.append("id_usuario", id_usuario);

    $.ajax({
        url: $("#url").val() + "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            //console.log(respuesta);
            $("#editarUsuarioModal .editar_id_usuario").val(
                respuesta["id_usuario"]
            );
            $("#editarUsuarioModal .nombre_usuario").val(
                respuesta["nombre_usuario"]
            );
            $("#editarUsuarioModal .email_usuario").val(
                respuesta["email_usuario"]
            );
            
            let id_rol = respuesta["estado_usuario"];

            roles
                .find('option[value="' + id_rol + '"]')
                .prop("selected", true);
        
            
            let id_estado = respuesta["estado_usuario"];

            estado
                .find('option[value="' + id_estado + '"]')
                .prop("selected", true);

              
        },
    });

    //console.log("Hiciste click en el producto " + id_producto);
});

/*-----------------------------TABLA DE USUARIOS ELIMINADOS-----------------------------------*/
$(".tablaUsuariosEliminados").DataTable({
    ajax: {
        url: $("#url").val() + "ajax/tablaUsuariosEliminados.ajax.php",
        dataSrc: "data"
    },
    deferRender: true,
    retrieve: true,
    processing: true,
    language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ usuarios",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando usuarios del _START_ al _END_ de un total de _TOTAL_",
        sInfoEmpty: "Mostrando usuarios del 0 al 0 de un total de 0",
        sInfoFiltered: "(filtrado de un total de _MAX_ usuarios)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: '<i class="fa-solid fa-angle-right"></i>',
            sPrevious: '<i class="fa-solid fa-angle-left"></i>',
        },
        oAria: {
            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
            sSortDescending: ": Activar para ordenar la columna de manera descendente",
        },
    },
});

$(".tablaUsuariosEliminados tbody").on("click", ".btnEliminarUsuario", function () {
    let idUsuarioEliminar = $(this).data("id_usuario");
    console.log(idUsuarioEliminar);
    Swal.fire({
        title: "¿Está seguro de borrar este usuario?",
        text: "¡Si no lo está puede cancelar la acción!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar usuario!",
    }).then(function (result) {
        if (result.value) {
            window.location =
                $("#url").val() +
                "index.php?ruta=usuarios_eliminados&idUsuarioEliminar=" +
                idUsuarioEliminar;
        }
    });
});

$(".tablaUsuariosEliminados tbody").on("click", ".btnRestablecerUsuario", function () {
    let idUsuarioRestabler = $(this).data("id_usuario");
    console.log(idUsuarioRestabler);
    Swal.fire({
        title: "¿Está seguro de restablecer este usuario?",
        text: "¡Si no lo está puede cancelar la acción!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, restablecer usuario!",
    }).then(function (result) {
        if (result.value) {
            window.location =
                $("#url").val() +
                "index.php?ruta=usuarios_eliminados&idUsuarioRestabler=" +
                idUsuarioRestabler;
        }
    });
});

/*=============================================
REVISAR SI EL USUARIO YA EXISTE
=============================================*/

$("#validarUsuario").change(function () {
    $(".alert").remove();

    let usuario = $(this).val();

    let datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url: $("#url").val() + "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta != false) {
                $("#validarUsuario")
                    .parent()
                    .after(
                        '<div class="alert alert-danger">El usuario ya existe en la base de datos</div>'
                    );
                $("#validarUsuario").val("");
            }
        },
    });
});