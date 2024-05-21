<?php

class RolesControlador
{
    //$item -> campo de la BD (id_producto, email_usuario)
    //$valor -> valor del registro (2, pablo@pablo.com)

    //Método para traer información
    static public function ctrMostrarRoles($item, $valor)
    {
        $tabla = "roles";
        $respuesta = RolesModelo::mdlMostrarRoles($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrObtenerNombreRol($id_rol)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT nombre_rol FROM roles WHERE id_rol = :id_rol");
            $stmt->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)["nombre_rol"];
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function ctrAgregarRol()
    {
        if (isset($_POST["nombre_rol"])) {
            $tabla = "roles";
            $nombre_rol = $_POST["nombre_rol"];
            $datos = array("nombre_rol" => $nombre_rol);
            $url = PlantillaControlador::url() . "roles";
            $respuesta = RolesModelo::mdlAgregarRol($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                     fncSweetAlert("success","El rol se agregó correctamente", "' . $url . '"
                     );
                     </script>';
            }
        }
    }

    static public function ctrEditarRol()
    {
        if(isset($_POST["editar_nombre_rol"]))
        {
            $roles = RolesControlador::ctrMostrarRoles("id_rol", $_POST["editar_id_rol"]);

            if($roles)
            {
                $datos = array(
                "nombre_rol" => $_POST["editar_nombre_rol"],
                "id_rol" => $_POST["editar_id_rol"] 
                );
            }
            
    
            $tabla = "roles";
    
            $url = PlantillaControlador::url() . "roles";
            
            $respuesta = RolesModelo::mdlEditarRol($tabla, $datos);

            if($respuesta == "ok")
            {
                echo '<script>
                     fncSweetAlert("success","El rol se edito correctamente", "' . $url . '"
                     );
                     </script>';
            }
        }
    }

    static public function ctrEliminarRol()
    {
        $url = PlantillaControlador::url() . "roles";
        if (isset($_GET["idEliminarRol"])) {
            $tabla = "roles";
            $dato = $_GET["idEliminarRol"];
            $respuesta = RolesModelo::mdlEliminarRol($tabla, $dato);
            if ($respuesta == "ok") {
                echo '<script>
fncSweetAlert("success", "El rol se eliminó correctamente", "' . $url . '");
</script>';
            }
        }
    }
}
