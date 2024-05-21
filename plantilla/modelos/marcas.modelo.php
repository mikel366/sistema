<?php

require_once 'conexion.php';

class MarcasModelo
{

    /*=============================================
    MOSTRAR DATOS
    =============================================*/
    static public function mdlMostrarMarcas($tabla, $item, $valor)
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
                return "Error: " . $e->getMessage();
            }
        }
    }

    static public function mdlAgregarMarca($tabla, $dato)
    {
        try 
        {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                nombre_marca) VALUES (:nombre_marca)");
                $stmt->bindParam(":nombre_marca", $dato["nombre_marca"], PDO::PARAM_STR);
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

    static public function mdlEditarMarca($tabla, $dato)
    {
        try
        {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_marca = :nombre_marca WHERE id_marca = :id_marca");
            $stmt->bindParam(":nombre_marca", $dato["nombre_marca"], PDO::PARAM_STR);
            $stmt->bindParam(":id_marca", $dato["id_marca"], PDO::PARAM_INT);
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

    static public function mdlEliminarMarca($tabla, $dato)
    {
        try
        {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_marca = :id_marca");
            $stmt->bindParam(":id_marca", $dato, PDO::PARAM_INT);
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
