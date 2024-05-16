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

    static public function mdlEliminarUsuario($tabla, $dato)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario_eliminado = :id_usuario_eliminado");
            $stmt->bindParam(":id_usuario_eliminado", $dato, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarUsuario($tabla, $datos)
{
    try {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
        nombre_usuario = :nombre_usuario, 
        email_usuario = :email_usuario, 
        password_usuario = :password_usuario, 
        id_rol_usuario = :id_rol_usuario,
        estado_usuario = :estado_usuario
        WHERE id_usuario = :id_usuario");
        $stmt->bindParam(":nombre_usuario", $datos["nombre_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":email_usuario", $datos["email_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password_usuario", $datos["password_usuario"], PDO::PARAM_STR); // Corregido el nombre del campo
        $stmt->bindParam(":id_rol_usuario", $datos["id_rol_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":estado_usuario", $datos["estado_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return print_r(Conexion::conectar()->errorInfo());
        }
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}

static public function mdlExportarUsuario($tabla, $dato)
{
    try {
        // Obtener los datos del usuario a eliminar
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :id_usuario");
        $stmt->bindParam(":id_usuario", $dato, PDO::PARAM_INT);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Insertar el usuario eliminado en la tabla usuarios_eliminados
        $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios_eliminados (
            id_usuario_eliminado,
            nombre_usuario_eliminado, 
            email_usuario_eliminado, 
            password_usuario_eliminado, 
            id_rol_usuario_eliminado, 
            estado_usuario_eliminado,
            fecha_eliminacion_usuario
        ) VALUES (
            :id_usuario, 
            :nombre_usuario, 
            :email_usuario, 
            :password_usuario, 
            :id_rol_usuario, 
            :estado_usuario, 
            NOW()
        )");
        
        $stmt->bindParam(":id_usuario", $usuario["id_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre_usuario", $usuario["nombre_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":email_usuario", $usuario["email_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password_usuario", $usuario["password_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":id_rol_usuario", $usuario["id_rol_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":estado_usuario", $usuario["estado_usuario"], PDO::PARAM_INT);
        $stmt->execute();

        // Eliminar el usuario de la tabla usuarios
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id_usuario");
        $stmt->bindParam(":id_usuario", $dato, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}

static function mdlRestablecerUsuario($tabla, $dato)
{
    try {
        // Obtener los datos del usuario a restablecer
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario_eliminado = :id_usuario_eliminado");
        $stmt->bindParam(":id_usuario_eliminado", $dato, PDO::PARAM_INT);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Insertar el usuario restablecido en la tabla usuarios
        $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios (
            id_usuario, 
            nombre_usuario, 
            email_usuario, 
            password_usuario, 
            id_rol_usuario, 
            estado_usuario
        ) VALUES (
            :id_usuario_eliminado,
            :nombre_usuario_eliminado, 
            :email_usuario_eliminado, 
            :password_usuario_eliminado, 
            :id_rol_usuario_eliminado, 
            :estado_usuario_eliminado
        )");
        
        $stmt->bindParam(":id_usuario_eliminado", $usuario["id_usuario_eliminado"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre_usuario_eliminado", $usuario["nombre_usuario_eliminado"], PDO::PARAM_STR);
        $stmt->bindParam(":email_usuario_eliminado", $usuario["email_usuario_eliminado"], PDO::PARAM_STR);
        $stmt->bindParam(":password_usuario_eliminado", $usuario["password_usuario_eliminado"], PDO::PARAM_STR);
        $stmt->bindParam(":id_rol_usuario_eliminado", $usuario["id_rol_usuario_eliminado"], PDO::PARAM_INT);
        $stmt->bindParam(":estado_usuario_eliminado", $usuario["estado_usuario_eliminado"], PDO::PARAM_INT);
        $stmt->execute();

        // Verificar si se insertó correctamente antes de eliminar
        if ($stmt->rowCount() > 0) {
            // Eliminar el usuario de la tabla usuarios_eliminados
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario_eliminado = :id_usuario_eliminado");
            $stmt->bindParam(":id_usuario_eliminado", $dato, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error al eliminar usuario eliminado";
            }
        } else {
            return "error al insertar usuario restablecido";
        }
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}

        

}