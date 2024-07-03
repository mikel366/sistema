<?php

require_once 'conexion.php';

class PlantillaModelo
{

    //METODO PARA TRAER INFORMACION
    static public function mdlMostrarConfiguracion($tabla, $item, $valor)
    {
        try
        {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
            $stmt->execute();
            //fetch muesta un solo registro
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e)
        {
            return "Error ". $e->getMessage();
        }
    }

    static public function mdlActualizarInformacion($tabla, $datos, $id)
    {
        try
        {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET empresa_configuracion = :empresa_configuracion, email_configuracion = :email_configuracion, telefono_configuracion = :telefono_configuracion WHERE id_configuracion = :id_configuracion");
            $stmt->bindParam(":empresa_configuracion", $datos["empresa_configuracion"], PDO::PARAM_STR);
            $stmt->bindParam(":email_configuracion", $datos["email_configuracion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono_configuracion", $datos["telefono_configuracion"], PDO::PARAM_STR);
            $stmt->bindParam(":id_configuracion", $id, PDO::PARAM_INT);

            if($stmt->execute())
            {
                return "ok";
            }
            else
            {
                return print_r(Conexion::conectar()->errorInfo());
            }
        }
        catch(Exception $e)
        {
            return "Error " . $e->getMessage();
        }
    }
}