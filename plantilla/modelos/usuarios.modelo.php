<?php

require_once 'conexion.php';

class UsuariosModelo
{
    //Método para traer información
    static public function mdlMostrarUsuarios($tabla, $item, $valor)
    {
        //verdadero si null viene con datos
        if ($item != null) {
            try {
                //Pedimos a la BD, un solo registro
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                //enlace de parametros
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $stmt->execute();
                //fetch muestra un solo registro
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt->execute();
                //fecthall muestra todos los registros
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                "Error: " . $e->getMessage();
            }
        }
    }

    //Método para guardar información
    static public function mdlAgregarUsuario($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_usuario, email_usuario, password_usuario, id_rol_usuario, estado_usuario) VALUES (:nombre_usuario, :email_usuario, :password_usuario, :id_rol_usuario, :estado_usuario)");

            // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
            $stmt->bindParam(":nombre_usuario", $datos["nombre_usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":email_usuario", $datos["email_usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":password_usuario", $datos["password_usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":id_rol_usuario", $datos["id_rol_usuario"], PDO::PARAM_INT);
            $stmt->bindParam(":estado_usuario", $datos["estado_usuario"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

}