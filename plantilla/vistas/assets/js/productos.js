/*=============================================
    TABLA DEL LADO DEL SERVIDOR
    =============================================*/
    $(".tablaProductos").DataTable({
        ajax: $("#url").val() + "ajax/tablaProductos.ajax.php",
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
    
    /*=============================================
       SUBIR IMÁGENES AL SERVIDOR
        =============================================*/
    
    $("#subirImagen").change(function () {
        let imagenProducto = this.files[0];
    
        //console.log(imagenProducto);
    
        /*=============================================
        VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
        =============================================*/
        if (
            imagenProducto["type"] != "image/jpeg" &&
            imagenProducto["type"] != "image/png"
        ) {
            $("#subirImagen").val("");
            Swal.fire({
                title: "Error al subir la imagen",
                text: "¡La imagen debe estar en formato JPG o PNG!",
                icon: "error",
                confirmButtonText: "¡Cerrar!",
            });
            /*=============================================
        VALIDAMOS EL TAMAÑO DE LA IMAGEN
        =============================================*/
        } else if (imagenProducto["size"] > 1000000) {
            $("#subirImagen").val("");
            Swal.fire({
                title: "Error al subir la imagen",
                text: "¡La imagen no debe pesar más de 1MB!",
                icon: "error",
                confirmButtonText: "¡Cerrar!",
            });
    
            /*=============================================
        PREVISUALIZAR IMAGEN
        =============================================*/
        } else {
            let datosImagen = new FileReader();
            datosImagen.readAsDataURL(imagenProducto);
            $(datosImagen).on("load", function (event) {
                let rutaImagen = event.target.result;
                $(".previsualizarImagen").attr("src", rutaImagen);
            });
        }
    });
    
    $(".tablaProductos tbody, .productos").on("click", ".btnBoton", function () {
        let id_producto = $(this).attr("idProducto");
        let categoria = $("#categoria");
        let marca = $("#marca");
        let estado = $("#estado");
        let tipo = $(this).attr("tipo");
        $(".previsualizarImg").html("");
        console.log(id_producto);
    
        if (tipo == "editar") {
        }
        if (tipo == "nuevo") {
        }
        console.log(tipo);
    
        let datos = new FormData();
    
        datos.append("id_producto", id_producto);
    
        $.ajax({
            url: $("#url").val() + "ajax/productos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                //console.log(respuesta);
                $("#editarProductoModal .editar_id_producto").val(
                    respuesta["id_producto"]
                );
                $("#editarProductoModal .nombre_producto").val(
                    respuesta["nombre_producto"]
                );
                $("#editarProductoModal .precio_producto").val(
                    respuesta["precio_producto"]
                );
                $("#editarProductoModal .cantidad_producto").val(
                    respuesta["cantidad_producto"]
                );
                $("#editarProductoModal .descripcion_producto").val(
                    respuesta["descripcion_producto"]
                );
                let id_categoria = respuesta["categoria_producto"];
    
                categoria
                    .find('option[value="' + id_categoria + '"]')
                    .prop("selected", true);
                
                let id_marca = respuesta["marca_producto"];
    
                marca
                    .find('option[value="' + id_marca + '"]')
                    .prop("selected", true);
                
                let id_estado = respuesta["estado_producto"];
    
                estado
                    .find('option[value="' + id_estado + '"]')
                    .prop("selected", true);
    
                /*=============================================
              CARGAMOS LA FOTO
              =============================================*/
    
                if (
                    respuesta["imagen_producto"] == null ||
                    respuesta["imagen_producto"] == ""
                ) {
                    $(".previsualizarImagen").attr(
                        "src",
                        "vistas/imagenes/productos/default.png"
                    );
                } else {
                    $(".imagen_actual").val(respuesta["imagen_producto"]);
    
                    $(".previsualizarImagen").attr(
                        "src",
                        "" + respuesta["imagen_producto"]
                    );
                }
            },
        });
    
        //console.log("Hiciste click en el producto " + id_producto);
    });
    
    /*=============================================
    EDITAR PRODUCTO
        =============================================*/
    
    /*=============================================
    ELIMINAR PRODUCTO
    =============================================*/
    $(".tablaProductos tbody").on("click", ".btnExportarProducto", function () {
    
        let idProductoExportar = $(this).data("id_producto");
        console.log(idProductoExportar);
        Swal.fire({
            title: "¿Está seguro de borrar el producto?",
            text: "¡Si no lo está puede cancelar la acción!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si, borrar producto!",
        }).then(function (result) {
            if (result.value) {
                window.location =
                    $("#url").val() +
                    "index.php?ruta=productos&idProductoExportar=" +
                    idProductoExportar;
            }
        });
    });
    

    //---------------------------VER DETALLES DEL PRODUCTO----------------------------------\\

    $(".tablaProductos tbody").on("click", ".btnVerDetalleProducto", function () {
        let idProducto = $(this).data("id-producto");
    
        let datos = new FormData();
        datos.append("id_producto", idProducto);
    
        $.ajax({
            url: $("#url").val() + "ajax/productos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                console.log(respuesta);
    
                $("#detalleProductoModal .nombre_producto").html(respuesta["nombre_producto"]);
                $("#detalleProductoModal .precio_producto").html(respuesta["precio_producto"]);
                $("#detalleProductoModal .cantidad_producto").html(respuesta["cantidad_producto"]);
                $("#detalleProductoModal .descripcion_producto").html(respuesta["descripcion_producto"]);
                if(respuesta["estado_producto"] == 1)
                    {
                        $("#detalleProductoModal .estado_producto").html("Inactivo");
                    }else{
                        $("#detalleProductoModal .estado_producto").html("Activo");
                    }
                
                $("#detalleProductoModal .fecha_creacion_producto").html(respuesta["fecha_creacion_producto"]);
                $("#detalleProductoModal .fecha_edicion_producto").html(respuesta["fecha_edicion_producto"]);
    
    
                /*=============================================
                CARGAMOS LA FOTO
                =============================================*/
    
                if (respuesta["imagen_producto"] == null || respuesta["imagen_producto"] == "") {
                    $(".previsualizarImagen").attr("src", "vistas/imagenes/productos/default.png");
                } else {
                    $(".previsualizarImagen").attr("src", respuesta["imagen_producto"]);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    

    /*-----------------------------TABLA DE PRODUCTOS ELIMINADOS-----------------------------------*/
$(".tablaProductosEliminados").DataTable({
    ajax: {
        url: $("#url").val() + "ajax/tablaProductosEliminados.ajax.php",
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

$(".tablaProductosEliminados tbody").on("click", ".btnEliminarProducto", function () {
    let idProductoEliminar = $(this).data("id_producto");
    console.log(idProductoEliminar);
    Swal.fire({
        title: "¿Está seguro de borrar este producto?",
        text: "¡Si no lo está puede cancelar la acción!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar producto!",
    }).then(function (result) {
        if (result.value) {
            window.location =
                $("#url").val() +
                "index.php?ruta=productos_eliminados&idProductoEliminar=" +
                idProductoEliminar;
        }
    });
});

$(".tablaProductosEliminados tbody").on("click", ".btnRestablecerProducto", function () {
    let idProductoRestabler = $(this).data("id_producto");
    console.log(idProductoRestabler);
    Swal.fire({
        title: "¿Está seguro de restablecer este producto?",
        text: "¡Si no lo está puede cancelar la acción!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, restablecer producto!",
    }).then(function (result) {
        if (result.value) {
            window.location =
                $("#url").val() +
                "index.php?ruta=productos_eliminados&idProductoRestabler=" +
                idProductoRestabler;
        }
    });
});
