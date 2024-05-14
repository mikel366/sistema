<?php

require_once 'conexion.php';

class ProductosModelo
{

    //Método para traer información
    static public function mdlMostrarProductos($tabla, $item, $valor)
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
    static public function mdlAgregarProducto($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                nombre_producto, 
                precio_producto,
                cantidad_producto,
                descripcion_producto,
                categoria_producto,
                marca_producto,
                estado_producto,
                imagen_producto,
                fecha_creacion_producto) VALUES (:nombre_producto, :precio_producto, :cantidad_producto, :descripcion_producto, :categoria_producto, :marca_producto, :estado_producto, :imagen_producto, NOW())");

            // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
            $stmt->bindParam(":nombre_producto", $datos["nombre_producto"], PDO::PARAM_STR);            
            $stmt->bindParam(":precio_producto", $datos["precio_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":cantidad_producto", $datos["cantidad_producto"], PDO::PARAM_INT);
            $stmt->bindParam(":descripcion_producto", $datos["descripcion_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":categoria_producto", $datos["categoria_producto"], PDO::PARAM_INT);
            $stmt->bindParam(":marca_producto", $datos["marca_producto"], PDO::PARAM_INT);
            $stmt->bindParam(":estado_producto", $datos["estado_producto"], PDO::PARAM_INT);
            $stmt->bindParam(":imagen_producto", $datos["imagen_producto"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarProducto($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
            nombre_producto = :nombre_producto, 
            precio_producto = :precio_producto, 
            cantidad_producto = :cantidad_producto, 
            descripcion_producto = :descripcion_producto, 
            categoria_producto = :categoria_producto, 
            marca_producto = :marca_producto, 
            estado_producto = :estado_producto, 
            imagen_producto = :imagen_producto,
            fecha_edicion_producto = NOW()
             WHERE id_producto = :id_producto");
            //UN ENLACE DE PARAMETRO POR DATO, IGUAL A INSERTAR, IMPORTANTE SEGUIR EL ORDEN
            $stmt->bindParam(":nombre_producto", $datos["nombre_producto"], PDO::PARAM_STR);            
            $stmt->bindParam(":precio_producto", $datos["precio_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":cantidad_producto", $datos["cantidad_producto"], PDO::PARAM_INT);
            $stmt->bindParam(":descripcion_producto", $datos["descripcion_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":categoria_producto", $datos["categoria_producto"], PDO::PARAM_INT);
            $stmt->bindParam(":marca_producto", $datos["marca_producto"], PDO::PARAM_INT);
            $stmt->bindParam(":estado_producto", $datos["estado_producto"], PDO::PARAM_INT);
            $stmt->bindParam(":imagen_producto", $datos["imagen_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_INT);
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
    static public function mdlEliminarProducto($tabla, $dato)
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