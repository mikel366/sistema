<?php

require_once 'conexion.php';

class CategoriasModelo
{

    /*=============================================
MOSTRAR DATOS
=============================================*/
    static public function mdlMostrarCategorias($tabla, $item, $valor)
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

    static public function mdlAgregarCategoria($tabla, $dato)
    {
        try 
        {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                nombre_categoria) VALUES (:nombre_categoria)");
                $stmt->bindParam(":nombre_categoria", $dato["nombre_categoria"], PDO::PARAM_STR);
                if ($stmt->execute()) 
                {
                    return "ok";
                } 
                else 
                {
                    return "error";
                }
        } 
        catch (Exception $e) 
        {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarCategoria($tabla, $dato)
    {
        try
        {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_categoria = :nombre_categoria WHERE id_categoria = :id_categoria");
            $stmt->bindParam(":nombre_categoria", $dato["nombre_categoria"], PDO::PARAM_STR);
            $stmt->bindParam(":id_categoria", $dato["id_categoria"], PDO::PARAM_INT);
            if ($stmt->execute())
            {
                return "ok";
            }
            else
            {
                return "error";
            }
        }
        catch (Exception $e)
        {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEliminarCategoria($tabla, $dato)
    {
        try
        {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_categoria = :id_categoria");
            $stmt->bindParam(":id_categoria", $dato, PDO::PARAM_INT);
            if ($stmt->execute())
            {
                return "ok";
            }
            else
            {
                return "error";
            }
        }
        catch (Exception $e)
        {
            return "Error: " . $e->getMessage();
        }
        
    }
}