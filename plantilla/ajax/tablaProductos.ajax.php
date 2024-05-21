<?php

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelo.php';
require_once '../controladores/categorias.controlador.php';
require_once "../controladores/marcas.controlador.php";

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
                $estado = "<span class='badge text-bg-danger'>Inactivo</span>";
            } else {
                $estado = "<span class='badge text-bg-success'>Activo</span>";
            }

            $categorias= CategoriasControlador::ctrobtenerNombreCategoria($productos[$i]["categoria_producto"]);

            $marcas= MarcasControlador::ctrObtenerNombreMarcas($productos[$i]["marca_producto"]);
            
            //Traemos las acciones
            $acciones = "<button type='button' class='btn btn-info btnVerDetalleProducto' data-id-producto='" . $productos[$i]["id_producto"] . "' data-bs-toggle='modal' data-bs-target='#detalleProductoModal'><i class='fas fa-eye'></i></button> <button type='button' class='btn btn-warning btnBoton' data-bs-toggle='modal' data-bs-target='#editarProductoModal' tipo='editar' idProducto='" . $productos[$i]["id_producto"] . "'><i class='fas fa-edit'></i></button> <button type='button' data-id_producto = '" . $productos[$i]["id_producto"] . "' class='btn btn-danger btnExportarProducto'><i class='fas fa-trash'></i></button>";

            
            

            $datosJson .= '[
                        "' . $productos[$i]["nombre_producto"] . '",
                        "' . $categorias . '",
                        "' . $marcas . '",
                        "' . $productos[$i]["precio_producto"] . '",
                        "' . $productos[$i]["cantidad_producto"] . '",    
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