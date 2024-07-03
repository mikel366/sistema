<?php

require_once 'conexion.php';

class ModeloCarrito
{
    //Método para traer información
    static public function mdlMostrarCarrito($tabla, $item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                //enlace de parametros
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
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
    static public function mdlAgregarCarrito($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                 id_producto, 
                 cantidad, 
                 estado) VALUES (:id_producto, :cantidad, :estado)");

            // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
            $stmt->bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_INT);
            $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);


            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    //Método para actualizar carrito
    static public function mdlActualizarCarrito($tabla, $producto, $cantidad)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cantidad = :cantidad WHERE id_producto = :id_producto");
            //UN ENLACE DE PARAMETRO POR DATO, IGUAL A INSERTAR, IMPORTANTE SEGUIR EL ORDEN
            $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
            $stmt->bindParam(":id_producto", $producto, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    /*=============================================
ELIMINAR DATO

=============================================*/
    static public function mdlEliminarCarrito($tabla, $dato)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_producto = :id_producto");
            $stmt->bindParam(":id_producto", $dato, PDO::PARAM_INT);
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
