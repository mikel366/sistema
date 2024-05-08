<?php

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelo.php';

class TablaProductos
{
    /*========================
    MOSTRAR TABLA DE PRODUCTOS
    =============================================*/

    public function mostrarTablaProductos()
    {
        $productos = ProductosControlador::ctrMostrarProductos(null, null);

        //print_r(count($productos));

        if (count($productos) == 0) {

            echo '{"data": []}';

            return;
        }

        $datosJson = '{"data" : [';

        for ($i = 0; $i < count($productos); $i++) {
            if ($productos[$i]["estado_producto"] == 1) {
                $estado = "<span class='badge text-bg-success'>Activo</span>";
            } else {
                $estado = "<span class='badge text-bg-danger'>Inactivo</span>";
            }

            //Traemos las acciones
            $acciones = "<button type='button' class='btn btn-warning btnBoton editarProducto' tipo='editar' idProducto='" . $productos[$i]["id_producto"] . "' data-bs-toggle='modal' data-bs-target='#editarProductoModal'><i class='fas fa-edit'></i></button> <button type='button' id_producto='" . $productos[$i]["id_producto"] . "' class='btn btn-danger btnEliminarProducto'><i class='fas fa-trash'></i></button>";


            $datosJson .= '[
                        "' . $productos[$i]["nombre_producto"] . '",
                        "' . $productos[$i]["precio_producto"] . '",
                        "' . $estado . '",
                        "' . $acciones . '"
                    ],';
        }
        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
        }';

        echo $datosJson;
    }
}

/*========================
    ACTIVAR TABLA DE PRODUCTOS
    =============================================*/
$activarproductos = new TablaProductos();
$activarproductos->mostrarTablaProductos();