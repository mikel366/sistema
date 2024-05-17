<?php

class MarcasControlador
{
    //$item -> campo de la BD (id_producto, email_usuario)
    //$valor -> valor del registro (2, pablo@pablo.com)

    static public function ctrMostrarMarcas($item, $valor)
    {
        $tabla = "marcas";
        $respuesta = MarcasModelo::mdlMostrarMarcas($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrObtenerNombreMarcas($marca_producto)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT nombre_marca FROM marcas WHERE id_marca = :id_marca");
            $stmt->bindParam(":id_marca", $marca_producto, PDO::PARAM_INT);
            $stmt->execute();
            $marca = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($marca) {
                return $marca["nombre_marca"];
            } else {
                return "No se encontró ninguna marca con el ID proporcionado";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function ctrAgregarMarca()
    {
        if (isset($_POST["nombre_marca"])) 
        {
            $tabla = "marcas";
            $nombre_marca = $_POST["nombre_marca"];
            $datos = array("nombre_marca" => $nombre_marca);
            $url = PlantillaControlador::url() . "productos";
            $respuesta = MarcasModelo::mdlAgregarMarca($tabla, $datos);
            
            if ($respuesta == "ok") {
                echo '<script>
                     fncSweetAlert("success","La marca se agregó correctamente", "' . $url . '"
                     );
                     </script>';
            }
        }
    }
}