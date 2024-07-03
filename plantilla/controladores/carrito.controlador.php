<?php

class ControladorCarrito
{

    //Método para traer carrito
    static public function ctrMostrarCarrito($item, $valor)
    {
        $tabla     = "carrito";
        $respuesta = ModeloCarrito::mdlMostrarCarrito($tabla, $item, $valor);

        return $respuesta;
    }

    //Agregar productos al carrito
    static public function ctrAgregarCarrito($id_producto)
    {
        $tabla = "carrito"; //nombre de la tabla

        $datos = array(
            "id_producto" => $id_producto,
            "cantidad" => 1,
            "estado" => 0
        );

        //print_r($datos);

        //podemos volver a la página de datos
        $url = PlantillaControlador::url() . "carrito";

        //Comprobar existe producto en el carrito       

        $producto = ControladorCarrito::ctrMostrarCarrito("id_producto", $id_producto);

        if ($producto == "") {

            $respuesta = ModeloCarrito::mdlAgregarCarrito($tabla, $datos);
        } else {

            $cantidad = $producto["cantidad"];

            $cantidad = $cantidad + 1;

            $respuesta = ModeloCarrito::mdlActualizarCarrito($tabla,  $id_producto, $cantidad);
        }

        //print_r($respuesta);

        if ($respuesta == "ok") {
            echo '<script>
                     fncSweetAlert("success","El producto se agregó correctamente", "' . $url . '"
                     );
                     </script>';
        }
    }

    /*=============================================
ELIMINAR
=============================================*/
    static public function ctrEliminarCarrito()
    {
        $url = PlantillaControlador::url() . "carrito";
        if (isset($_GET["idProductoEliminar"])) {

            $tabla = "carrito";
            $dato = $_GET["idProductoEliminar"];

            $respuesta = ModeloCarrito::mdlEliminarCarrito($tabla, $dato);

            if ($respuesta == "ok") {
                echo '<script>
 fncSweetAlert("success", "El producto se eliminó correctamente", "' . $url . '");
 </script>';
            }
        }
    }
}