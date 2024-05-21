$(".tablaMarcas").DataTable({
    ajax: $("#url").val() + "ajax/tablaMarcas.ajax.php",
    deferRender: true,
    retrieve: true,
    processing: true,
    language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ productos",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar producto:",
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


$(".tablaMarcas tbody, .marcas").on("click", ".btnBoton", function () {
    let id_marca = $(this).attr("idMarca");
    let tipo = $(this).attr("tipo");
    
    console.log(id_marca);

    if (tipo == "editar") {
    }
    if (tipo == "nuevo") {
    }
    console.log(tipo);

    let datos = new FormData();

    datos.append("id_marca", id_marca);

    $.ajax({
        url: $("#url").val() + "ajax/marcas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            //console.log(respuesta);
            $("#editarMarca .editar_id_marca").val(
                respuesta["id_marca"]
            );
            $("#editarMarca .nombre_marca").val(
                respuesta["nombre_marca"]
            );
              
        },
    });
});

$(".tablaMarcas tbody").on("click", ".btnEliminarMarca", function () {
    let idEliminarMarca = $(this).data("id_marca");
    console.log(idEliminarMarca);
    Swal.fire({
        title: "¿Está seguro de borrar esta marca?",
        text: "¡Si no lo está puede cancelar la acción!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar marca!",
    }).then(function (result) {
        if (result.value) {
            window.location =
                $("#url").val() +
                "index.php?ruta=marcas&idEliminarMarca=" +
                idEliminarMarca;
        }
    });
});