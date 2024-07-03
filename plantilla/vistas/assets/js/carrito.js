$(".tablaCarrito tbody").on("click", ".btnEliminarCarrito", function () {
    let idProductoEliminar = $(this).attr("id_producto");

    console.log(idProductoEliminar);

    Swal.fire({
        title: "¿Está seguro de eliminar el producto?",
        text: "¡Si no lo está puede cancelar la acción!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, eliminar producto!",
    }).then(function (result) {
        if (result.value) {
            window.location =
                $("#url").val() +
                "index.php?pagina=acciones-carrito&idProductoEliminar=" +
                idProductoEliminar;
        }
    });
});