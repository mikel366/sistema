<?php

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelo.php';
require_once '../controladores/categorias.controlador.php';
require_once "../controladores/marcas.controlador.php";

class TablaProductosEliminados
{
    /*========================
    MOSTRAR TABLA DE PRODUCTOS
    =============================================*/

    public function mostrarTablaProductosEliminados()
    {
        $productos = ProductosControlador::ctrMostrarProductosEliminados(null, null);

        //print_r(count($productos));

        if (count($productos) == 0) {

            echo '{"data": []}';

            return;
        }

        $datosJson = '{"data" : [';

        for ($i = 0; $i < count($productos); $i++) {
            if ($productos[$i]["estado_producto_eliminado"] == 1) {
                $estado = "<span class='badge text-bg-danger'>Inactivo</span>";
            } else {
                $estado = "<span class='badge text-bg-success'>Activo</span>";
            }

            $categorias= CategoriasControlador::ctrobtenerNombreCategoria($productos[$i]["categoria_producto_eliminado"]);

            $marcas= MarcasControlador::ctrObtenerNombreMarcas($productos[$i]["marca_producto_eliminado"]);
            
            //Traemos las acciones
            $acciones = "<button type='button' class='btn btn-warning btnRestablecerProducto' data-id_producto='" . $productos[$i]["id_producto_eliminado"] . "'><i class='mdi mdi-restore-alert'></i></button> <button type='button' data-id_producto='" . $productos[$i]["id_producto_eliminado"] . "' class='btn btn-danger btnEliminarProducto'><i class='fas fa-trash'></i></button>";

            
            

            $datosJson .= '[
                        "' . $productos[$i]["nombre_producto_eliminado"] . '",
                        "' . $categorias . '",
                        "' . $marcas . '",
                        "' . $productos[$i]["precio_producto_eliminado"] . '",
                        "' . $productos[$i]["cantidad_producto_eliminado"] . '",    
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
$activarproductos = new TablaProductosEliminados();
$activarproductos->mostrarTablaProductosEliminados();