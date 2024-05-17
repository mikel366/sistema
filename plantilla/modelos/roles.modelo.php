<?php

require_once 'conexion.php';

class RolesModelo
{

    //Método para traer información
    static public function mdlMostrarRoles($tabla, $item, $valor)
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

    static public function mdlAgregarRol($tabla, $dato)
    {
        try 
        {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                nombre_rol) VALUES (:nombre_rol)");
                $stmt->bindParam(":nombre_rol", $dato["nombre_rol"], PDO::PARAM_STR);
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