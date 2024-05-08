<?php

class ProductosControlador
{
    //$item -> campo de la BD (id_producto, email_usuario)
    //$valor -> valor del registro (2, pablo@pablo.com)

    //Método para traer información
    static public function ctrMostrarProductos($item, $valor)
    {
        $tabla     = "productos";
        $respuesta = ProductosModelo::mdlMostrarProductos($tabla, $item, $valor);

        return $respuesta;
    }

    //Método para guardar información
    public function ctrAgregarProducto()
    {
        if (isset($_POST["editar_nombre_producto"])) {


            $producto = ProductosControlador::ctrMostrarProductos("id_producto", $_POST["editar_id_producto"]);

            if ($producto["imagen_producto"] == "") {

                $imagen = "";
            } else {

                $imagen = $producto["imagen_producto"];
            }

            //Comprobar que enviamos imagen

            if (isset($_FILES["editar_imagen_producto"]["tmp_name"]) && $_FILES["editar_imagen_producto"]["name"] != "") {
                //var_dump($_FILES);

                list($ancho, $alto) =
                    getimagesize($_FILES["editar_imagen_producto"]["tmp_name"]);
                $nuevoAncho         = $ancho;
                $nuevoAlto          = $alto;

                /*=============================================
                DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS
                FUNCIONES POR DEFECTO DE PHP
                =============================================*/
                if ($_FILES["editar_imagen_producto"]["type"] == "image/jpeg") {

                    /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/
                    //Usar time para fechas
                    //$nombre = time();
                    $nombre  = funciones::generar_url($_POST["editar_nombre_producto"]);
                    $imagen  =
                        "vistas/imagenes/productos/" . $nombre . ".jpg";
                    $origen  =
                        imagecreatefromjpeg($_FILES["editar_imagen_producto"]["tmp_name"]);
                    $destino = imagecreatetruecolor(
                        $nuevoAncho,
                        $nuevoAlto
                    );
                    imagecopyresized(
                        $destino,
                        $origen,
                        0,
                        0,
                        0,
                        0,
                        $nuevoAncho,
                        $nuevoAlto,
                        $ancho,
                        $alto
                    );
                    imagejpeg($destino, $imagen);
                }
                if ($_FILES["editar_imagen_producto"]["type"] == "image/png") {
                    /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO              
                =============================================*/
                    $nombre = funciones::generar_url($_POST["editar_nombre_producto"]);

                    $imagen  =
                        "vistas/imagenes/productos/" . $nombre . ".png";
                    $origen  =
                        imagecreatefrompng($_FILES["editar_imagen_producto"]["tmp_name"]);
                    $destino = imagecreatetruecolor(
                        $nuevoAncho,
                        $nuevoAlto
                    );
                    imagecopyresized(
                        $destino,
                        $origen,
                        0,
                        0,
                        0,
                        0,
                        $nuevoAncho,
                        $nuevoAlto,
                        $ancho,
                        $alto
                    );
                    imagepng($destino, $imagen);
                }
            }

            $tabla = "productos"; //nombre de la tabla

            $datos = array(
                "nombre_producto" => $_POST["editar_nombre_producto"],
                "categoria_producto" => $_POST["editar_categoria_producto"],
                "precio_producto" => $_POST["editar_precio_producto"],
                "imagen_producto" => $imagen,
                "id_producto" => $_POST["editar_id_producto"]
            );

            //podemos volver a la página de datos
            $url = PlantillaControlador::url() . "productos";

            $respuesta = ProductosModelo::mdlEditarProducto($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert("success","El producto se modificó correctamente", "' . $url . '"
                    );
                    </script>';
            }
        }
    }

    //Método para editar información
    public function ctrEditarProducto()
    {
        if (isset($_POST["nombre_producto"])) {
            $imagen = "";

            //Comprobar que enviamos imagen

            if (isset($_FILES["imagen_producto"]["tmp_name"]) && $_FILES["imagen_producto"]["name"] != "") {
                //var_dump($_FILES);

                list($ancho, $alto) =
                    getimagesize($_FILES["imagen_producto"]["tmp_name"]);
                $nuevoAncho         = $ancho;
                $nuevoAlto          = $alto;

                /*=============================================
                 DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS
                 FUNCIONES POR DEFECTO DE PHP
                 =============================================*/
                if ($_FILES["imagen_producto"]["type"] == "image/jpeg") {

                    /*=============================================
                 GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                 =============================================*/
                    //Usar time para fechas
                    //$nombre = time();
                    $nombre  = funciones::generar_url($_POST["nombre_producto"]);
                    $imagen  =
                        "vistas/imagenes/productos/" . $nombre . ".jpg";
                    $origen  =
                        imagecreatefromjpeg($_FILES["imagen_producto"]["tmp_name"]);
                    $destino = imagecreatetruecolor(
                        $nuevoAncho,
                        $nuevoAlto
                    );
                    imagecopyresized(
                        $destino,
                        $origen,
                        0,
                        0,
                        0,
                        0,
                        $nuevoAncho,
                        $nuevoAlto,
                        $ancho,
                        $alto
                    );
                    imagejpeg($destino, $imagen);
                }
                if ($_FILES["imagen_producto"]["type"] == "image/png") {
                    /*=============================================
                 GUARDAMOS LA IMAGEN EN EL DIRECTORIO              
                 =============================================*/
                    $nombre = funciones::generar_url($_POST["nombre_producto"]);

                    $imagen  =
                        "vistas/imagenes/productos/" . $nombre . ".png";
                    $origen  =
                        imagecreatefrompng($_FILES["imagen_producto"]["tmp_name"]);
                    $destino = imagecreatetruecolor(
                        $nuevoAncho,
                        $nuevoAlto
                    );
                    imagecopyresized(
                        $destino,
                        $origen,
                        0,
                        0,
                        0,
                        0,
                        $nuevoAncho,
                        $nuevoAlto,
                        $ancho,
                        $alto
                    );
                    imagepng($destino, $imagen);
                }
            }

            $tabla = "productos"; //nombre de la tabla

            $datos = array(
                "nombre_producto" => $_POST["nombre_producto"],
                "categoria_producto" => $_POST["categoria_producto"],
                "precio_producto" => $_POST["precio_producto"],
                "estado_producto" => 1,
                "imagen_producto" => $imagen
            );

            //podemos volver a la página de datos
            $url = PlantillaControlador::url() . "productos";

            $respuesta = ProductosModelo::mdlAgregarProducto($tabla, $datos);

            print_r($respuesta);

            if ($respuesta == "ok") {
                echo '<script>
                     fncSweetAlert("success","El producto se agregó correctamente", "' . $url . '"
                     );
                     </script>';
            }
        }
    }

    /*=============================================
ELIMINAR
=============================================*/
    static public function ctrEliminarProducto()
    {
        $url = PlantillaControlador::url() . "productos";
        if (isset($_GET["idProductoEliminar"])) {
            $tabla = "productos";
            $dato = $_GET["idProductoEliminar"];
            $respuesta = ProductosModelo::mdlEliminarProducto($tabla, $dato);
            if ($respuesta == "ok") {
                if ($respuesta == "ok") {
                    echo '<script>
     fncSweetAlert("success", "El producto se eliminó correctamente", "' . $url . '");
     </script>';
                }
            }
        }
    }
}