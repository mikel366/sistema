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

}